<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once QLIGG_PLUGIN_DIR . 'includes/api/api.php';

class QLIGG_API_Business extends QLIGG_API {


	protected static $_instance;
	public $client_id    = '834353156975525';
	public $graph_url    = 'https://graph.facebook.com';
	public $redirect_uri = 'https://socialfeed.quadlayers.com/facebook.php';

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function renewAccessToken( $access_token, $renew_count = 0 ) {
		global $qliggAPI;

		$url = "https://socialfeed.quadlayers.com/renew_facebook.php?access_token={$access_token}&renew_count={$renew_count}";

		return (array) $qliggAPI->BASIC->validate_response( wp_remote_get( $url ) );
	}

	function getAccessTokenLink() {
		$state = admin_url( 'admin.php' );
		// $scope = 'instagram_basic,instagram_manage_insights,instagram_manage_comments,manage_pages,pages_read_engagement';
		// $scope = 'instagram_basic,instagram_manage_insights,instagram_manage_comments,pages_read_engagement';
		// $scope = 'instagram_basic,instagram_manage_insights,instagram_manage_comments,manage_pages,pages_read_engagement';
		$scope = 'pages_show_list,instagram_basic,instagram_manage_comments,instagram_manage_insights,pages_read_engagement';

		return "https://www.facebook.com/dialog/oauth?client_id={$this->client_id}&redirect_uri={$this->redirect_uri}&response_type=code&scope={$scope}&state={$state}";
	}

	function getUserProfile( $account_id, $access_token ) {
		$response = $this->remoteGet(
			"https://graph.facebook.com/{$account_id}",
			array(
				'media_type'   => 'REELS',
				'fields'       => 'id,username,website,biography,name,followers_count,media_count,profile_picture_url',
				'access_token' => $access_token,
			)
		);

		return (array) $response;
	}

	/**
	 * https://developers.facebook.com/docs/instagram-api/reference/ig-media
	 */

	function getUserMedia( $account_id, $access_token, $after = null ) {

		// D $access_token = 'EAAL21vuJ66UBANfHW7BPzayczZAO33HgLGSR96fBAbVeTp0WGppv6JadOvIi3USfp2oxFp9ZCdjYSp1me9uSZCrONuwpke7PFH2Om560WXhCVfWrKiZCSK2sM2lnInWMiUmIggQZA1tDsWjHZCPzdQevaE7COgJdUfHiW7g6q7mwZDZD';
		$limit = 50; // $num = min( $num, 200 );

		$response = $this->remoteGet(
			"{$this->graph_url}/{$account_id}/media",
			array(
				'after'        => $after,
				'limit'        => $limit,
				// (#12) introduce IGTV to instagram graph api requires version v10.0 or higher
				// 'fields'       => 'caption,comments_count,id,ig_id,is_comment_enabled,is_shared_to_feed,like_count,media_product_type,media_type,media_url,owner,permalink,shortcode,thumbnail_url,timestamp,username,video_title',
				'fields' => 'media_url,thumbnail_url,caption,id,media_type,timestamp,username,comments_count,like_count,permalink,children{media_url,id,media_type,timestamp,permalink,thumbnail_url}',
				'access_token' => $access_token,
			)
		);

		return (array) $response;
	}

	function getTagId( $account_id, $access_token, $hashtag = null ) {
		$response = $this->remoteGet(
			"{$this->graph_url}/ig_hashtag_search",
			array(
				'user_id'      => $account_id,
				'q'            => urlencode( $hashtag ),
				'access_token' => $access_token,
			)
		);

		if ( isset( $response['data'][0]['id'] ) ) {
			return $response['data'][0]['id'];
		}
	}

	function getTagMedia( $account_id, $hashtag = null, $order_by = 'recent_media', $after = null ) {
		global $qliggAPI;

		if ( ! $hashtag ) {
			$qliggAPI->FEED->setMessage( esc_html__( 'Please update Instagram Tag in the feed settings.', 'insta-gallery' ) );
			return;
		}

		if ( ! $account_id ) {
			$qliggAPI->FEED->setMessage( esc_html__( 'Please update Instagram Account in the feed settings.', 'insta-gallery' ) );
			return;
		}

		$account_model = new QLIGG_Account();

		$account = $account_model->get_account( $account_id );

		if ( ! isset( $account['access_token'] ) ) {
			$qliggAPI->FEED->setMessage( esc_html__( 'Please update Instagram Access Token in the account and feed settings.', 'insta-gallery' ) );
			return;
		}

		if ( ! isset( $account['token_type'] ) || $account['token_type'] != 'BUSINESS' ) {
			$qliggAPI->FEED->setMessage( esc_html__( 'Please use a business Instagram Access Token to display tags.', 'insta-gallery' ) );
			return;
		}

		if ( ! $hashtag_id = $this->getTagId( $account['id'], $account['access_token'], $hashtag ) ) {
			$qliggAPI->FEED->setMessage( sprintf( esc_html__( 'Can\'t find the tag %s.', 'insta-gallery' ), $hashtag ) );
			return;
		}

		$limit    = 50; // $num = min( $num, 200 );
		$order_by = $order_by == 'top_media' ? 'top_media' : 'recent_media';

		$response = $this->remoteGet(
			"{$this->graph_url}/{$hashtag_id}/{$order_by}",
			array(
				'after'        => $after,
				'user_id'      => $account['id'],
				'limit'        => $limit,
				'fields'       => 'media_url,caption,id,media_type,comments_count,like_count,permalink,children{media_url,id,media_type,permalink}',
				'access_token' => $account['access_token'],
			)
		);

		return (array) $response;
	}
}
