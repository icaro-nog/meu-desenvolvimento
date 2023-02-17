<?php

require_once QLIGG_PLUGIN_DIR . 'includes/models/Account.php';
require_once QLIGG_PLUGIN_DIR . 'includes/models/Feed.php';
require_once QLIGG_PLUGIN_DIR . 'includes/controllers/QLIGG_Controller.php';

class QLIGG_Account_Controller extends QLIGG_Controller {


	protected static $instance;
	protected static $slug = 'qligg_account';

	// protected static $slug = QLIGG_DOMAIN . '_account';

	public static function instance() {
		// print_r($_REQUEST);

		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->init();
		}
		return self::$instance;
	}

	function init() {
		add_action( 'admin_init', array( $this, 'init_add_account' ) );
		add_action( 'wp_ajax_qligg_add_account', array( $this, 'ajax_add_account' ) );
		add_action( 'wp_ajax_qligg_delete_account', array( $this, 'ajax_delete_account' ) );
		add_action( 'wp_ajax_qligg_renew_access_token', array( $this, 'ajax_renew_access_token' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_js' ) );
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
	}

	function add_menu() {
		add_submenu_page( QLIGG_DOMAIN, esc_html__( 'Accounts', 'insta-gallery' ), esc_html__( 'Accounts', 'insta-gallery' ), 'qligg_manage_feeds', self::$slug, array( $this, 'add_panel' ) );
	}

	function add_panel() {
		global $submenu, $qliggAPI;
		$account_model = new QLIGG_Account();
		$accounts      = $account_model->get_accounts();

		include QLIGG_PLUGIN_DIR . '/includes/view/backend/pages/parts/header.php';
		include QLIGG_PLUGIN_DIR . '/includes/view/backend/pages/accounts.php';
	}

	function ajax_add_account() {
		$account_model = new QLIGG_Account();

		$account_data = array(
			'id'           => sanitize_text_field( $_REQUEST['account_data']['id'] ),
			'access_token' => sanitize_text_field( $_REQUEST['account_data']['access_token'] ),
		);

		if ( $access_token = $account_model->renew_access_token( $_REQUEST['account_data']['access_token'] ) ) {

			if ( substr( $access_token['access_token'], 0, 4 ) === 'IGQV' ) {
				$account_data['token_type'] = 'PERSONAL';
			} else {
				$account_data['token_type'] = 'BUSINESS';
			}

			$account_data['expires_in'] = intval( $access_token['expires_in'] );

			$account = $this->add_account( $account_data );

			if ( isset( $account['id'] ) ) {
				parent::success_ajax( esc_html__( 'The token has been updated successfully', 'insta-gallery' ) );
			}

			if ( isset( $account['error']['message'] ) ) {
				parent::error_ajax( esc_html( $account['error']['message'] ) );
			}
			if ( isset( $account['message'] ) ) {
				parent::error_ajax( esc_html( $account['message'] ) );
			}
		}
	}

	function ajax_renew_access_token() {
		if ( ! isset( $_REQUEST['account_id'] ) ) {
			return;
		}
		$account_model = new QLIGG_Account();

		if ( $account = $account_model->renew_account_token( sanitize_key( $_REQUEST['account_id'] ) ) ) {

			if ( isset( $account['id'] ) ) {
				parent::success_ajax( esc_html__( 'The token has been updated successfully', 'insta-gallery' ) );
			}

			if ( isset( $account['error']['message'] ) ) {
				parent::error_ajax( esc_html( $account['error']['message'] ) );
			}
			if ( isset( $account['message'] ) ) {
				parent::error_ajax( esc_html( $account['message'] ) );
			}
		}

		parent::error_ajax( esc_html__( 'Unknow error', 'insta-gallery' ) );
	}

	function add_account( array $account_data = array() ) {
		if (
		isset( $account_data['id'] ) &&
		isset( $account_data['access_token'] ) &&
		isset( $account_data['token_type'] ) &&
		isset( $account_data['expires_in'] )
		) {

			$account_model = new QLIGG_Account();

			delete_transient( "insta_gallery_v2_user_profile_{$account_data['id']}" );

			$feed_model = new QLIGG_Feed();

			$tk = "%%insta_gallery_v2_user_media_{$account_data['id']}_%%";

			$feed_model->clear_cache( $tk );

			$id           = sanitize_text_field( $account_data['id'] );
			$access_token = sanitize_text_field( $account_data['access_token'] );
			$token_type   = sanitize_text_field( $account_data['token_type'] );
			$expires_in   = sanitize_text_field( $account_data['expires_in'] );

			return $account_model->add_account(
				array(
					'id'           => $id,
					'access_token' => $access_token,
					'token_type'   => $token_type,
					'expires_in'   => $expires_in,
				)
			);
		}
	}

	function init_add_account() {
		if ( isset( $_REQUEST['accounts'][0]['id'] ) ) {

			foreach ( $_REQUEST['accounts'] as $account_data ) {

				if (
				isset( $account_data['id'] ) &&
				isset( $account_data['access_token'] ) &&
				isset( $account_data['token_type'] ) &&
				isset( $account_data['expires_in'] )
				) {
					$this->add_account( $account_data );
				}
			}

			if ( wp_safe_redirect( admin_url( 'admin.php?page=qligg_account' ) ) ) {
				exit;
			}
		}
	}

	function ajax_delete_account() {
		if ( ! empty( $_REQUEST['account_id'] ) && current_user_can( 'qligg_manage_feeds' ) && check_ajax_referer( 'qligg_delete_account', 'nonce', false ) ) {

			$account_model = new QLIGG_Account();

			$account_id = sanitize_text_field( $_REQUEST['account_id'] );

			$account_model->delete_account( $account_id );

			delete_transient( "insta_gallery_v2_user_profile_{$account_id}" );

			$feed_model = new QLIGG_Feed();

			$tk = "%%insta_gallery_v2_user_media_{$account_id}_%%";

			$feed_model->clear_cache( $tk );

			parent::success_ajax( esc_html__( 'Account removed successfully', 'insta-gallery' ) );
		}

		parent::error_access_denied();
	}

	function add_js() {

		wp_localize_script(
			'qligg-backend',
			'qligg_account',
			array(
				'nonce'   => array(
					'qligg_add_account'        => wp_create_nonce( 'qligg_add_account' ),
					'qligg_delete_account'     => wp_create_nonce( 'qligg_delete_account' ),
					'qligg_renew_access_token' => wp_create_nonce( 'qligg_renew_access_token' ),
				),
				'message' => array(
					'confirm_delete' => esc_html__( 'Do you want to delete the account?', 'insta-gallery' ),
				),
			)
		);
	}
}

QLIGG_Account_Controller::instance();
