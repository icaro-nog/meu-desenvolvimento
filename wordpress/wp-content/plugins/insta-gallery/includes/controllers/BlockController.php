<?php

require_once QLIGG_PLUGIN_DIR . 'includes/models/Feed.php';
require_once QLIGG_PLUGIN_DIR . 'includes/models/Account.php';
require_once QLIGG_PLUGIN_DIR . 'includes/controllers/QLIGG_Controller.php';

class QLIGG_Block_Controller extends QLIGG_Controller {


	protected static $instance;
	protected static $slug = QLIGG_DOMAIN . '_feeds';

	function init() {
		add_action( 'admin_print_scripts-post-new.php', array( $this, 'add_js' ), 11 );
		add_action( 'admin_print_scripts-post.php', array( $this, 'add_js' ), 11 );

		add_filter( 'block_categories_all', array( $this, 'register_block_category' ), 11 );

		register_block_type(
			'qligg/box',
			array(
				'attributes'      => $this->get_attributes(),
				'render_callback' => array( $this, 'render_callback' ),
			)
		);
	}


	public function register_block_category( $categories ) {
		$categories = array_merge(
			$categories,
			array(
				array(
					'slug'  => 'qligg',
					'title' => QLIGG_PLUGIN_NAME,
				),
			)
		);
		return $categories;
	}

	function sanitize_value( &$value, $key ) {
		if ( $key === 'username' ) {
			$value = $value;
		} elseif ( $value === 'true' ) {
			$value = true;
		} elseif ( $value === 'false' ) {
			$value = false;
		} elseif ( is_numeric( $value ) ) {
			$value = (int) $value;
		}
	}

	function render_callback( $feed, $content, $block = array() ) {
		$block = (object) $block;
		array_walk_recursive( $feed, array( $this, 'sanitize_value' ) );
		$this->get_name_accounts();
		return QLIGG_Frontend::create_shortcut( $feed );
	}


	function get_attributes() {
		$feed_model = new QLIGG_Feed();
		$feed_arg   = $feed_model->get_args();

		$attributes = array();
		foreach ( $feed_arg as $id => $value ) {
			$attributes[ $id ] = array(
				'type'    => array( 'string', 'object', 'array', 'boolean', 'number', 'null' ),
				'default' => $value,
			);

			if ( $id === 'username' ) {
				$attributes[ $id ] = array(
					'type'    => array( 'string', 'object', 'array', 'boolean', 'number', 'null' ),
					'default' => (string) array_key_first( $this->get_name_accounts() ),
				);
			}
		}

		return $attributes;
	}


	function get_name_accounts() {
		$profile = array();

		$account  = new QLIGG_Account();
		$accounts = $account->get_accounts();

		if ( $accounts ) {
			foreach ( $accounts as $account_id => $account ) {
				$profile[ $account_id ] = qligg_get_user_profile( $account_id );
			}
		}

		return $profile;
	}


	function add_js() {
		$gutenberg = include_once QLIGG_PLUGIN_DIR . 'build/gutenberg/js/index.asset.php';
		wp_enqueue_style( 'insta-gallery' );
		wp_enqueue_script( 'insta-gallery' );
		wp_enqueue_style( 'magnific-popup' );
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_style( 'swiper' );
		wp_enqueue_script( 'swiper' );
		wp_enqueue_script( 'masonry' );
		wp_enqueue_style( 'qligg-admin-gutenberg', plugins_url( '/build/gutenberg/css/style.css', QLIGG_PLUGIN_FILE ), array(), QLIGG_PLUGIN_VERSION );
		wp_enqueue_script( 'qligg-admin-gutenberg', plugins_url( '/build/gutenberg/js/index.js', QLIGG_PLUGIN_FILE ), $gutenberg['dependencies'], $gutenberg['version'], true );
		wp_localize_script(
			'qligg-admin-gutenberg',
			'qligg_gutenberg',
			array(
				'nonce'          => array(),
				'attributes'     => $this->get_attributes(),
				'accounts'       => $this->get_name_accounts(),
				'image_url'      => plugins_url( '/assets/backend/img', QLIGG_PLUGIN_FILE ),
				'create_account' => admin_url( 'admin.php?page=qligg_account' ),
			)
		);

		wp_localize_script(
			'qlttf-admin-gutenberg',
			'qligg',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
			)
		);
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->init();
		}
		return self::$instance;
	}
}

QLIGG_Block_Controller::instance();
