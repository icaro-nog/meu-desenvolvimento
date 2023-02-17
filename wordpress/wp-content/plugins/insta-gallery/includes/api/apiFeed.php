<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once QLIGG_PLUGIN_DIR . 'includes/models/Account.php';
require_once QLIGG_PLUGIN_DIR . 'includes/models/Feed.php';

class QLIGG_API_Feed {

	protected static $_instance;
	public $messages      = array();
	public $instagram_url = 'https://www.instagram.com';

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function setupMediaItems( $data, $last_id = null ) {

		static $load = false;
		static $i    = 1;
		if ( ! $last_id ) {
			$load = true;
		}

		$instagram_items = array();

		if ( is_array( $data ) && ! empty( $data ) ) {

			foreach ( $data as $item ) {

				if ( $load ) {

					$hashtags = $this->getItemHashtags( $item );

					$media_url     = $this->getItemMediaURL( $item );
					$thumbnail_url = $this->getItemThumbnailURL( $item );

					if ( ! $media_url || ! $thumbnail_url ) {
						continue;
					}

					$date = $this->getItemDate( $item );

					$file_type = $this->getFileType( $thumbnail_url );

					$instagram_items[] = array(
						'i'         => $i,
						'id'        => $item['id'],
						'type'      => $this->getItemType( $item ),
						'file_type' => $file_type,
						'media'     => $media_url,
						'images'    => array(
							'standard' => $thumbnail_url,
							'medium'   => $thumbnail_url,
							'small'    => $thumbnail_url,
						),
						'videos'    => array(
							'standard' => $media_url,
							'medium'   => $media_url,
							'small'    => $media_url,
						),
						'likes'     => isset( $item['like_count'] ) ? $item['like_count'] : false,
						'comments'  => isset( $item['comments_count'] ) ? $item['comments_count'] : false,
						'caption'   => preg_replace( '/(?<!\S)#([0-9a-zA-Z]+)/', "<a href=\"{$this->instagram_url}/explore/tags/$1\">#$1</a>", htmlspecialchars( @$item['caption'] ) ),
						'hashtags'  => $hashtags, // array_map('utf8_encode', (array) @$hashtags[1]), // issue with uft 8 encode breakes json_encode
						'link'      => $item['permalink'],
						'date'      => $date,
					);
				}

				if ( $last_id && ( $last_id == $i ) ) {
					$i    = $last_id;
					$load = true;
				}
				$i++;
			}
		}

		return $instagram_items;
	}

	function getFileType( $media_url ) {
		$type = parse_url( $media_url );

		$file_type = pathinfo( $type['path'], PATHINFO_EXTENSION );

		if ( $file_type == 'mp4' ) {
			return 'video';
		}
		return 'image';
	}

	function getItemMediaURL( array $item = array() ) {
		if ( isset( $item['media_type'] ) ) {
			switch ( $item['media_type'] ) {
				case 'IMAGE':
					if ( isset( $item['media_url'] ) ) {
						return $item['media_url'];
					}
					break;
				case 'VIDEO':
					if ( isset( $item['media_url'] ) ) {
						return $item['media_url'];
					}
					break;
				case 'CAROUSEL_ALBUM':
					if ( isset( $item['children']['data'][0]['media_url'] ) ) {
						return $item['children']['data'][0]['media_url'];
					}
					break;
			}
		}

		return false;
	}

	function getItemThumbnailURL( array $item = array() ) {

		if ( isset( $item['media_type'] ) ) {
			switch ( $item['media_type'] ) {
				case 'IMAGE':
					if ( isset( $item['media_url'] ) ) {
						return $item['media_url'];
					}
					break;
				case 'VIDEO':
					if ( isset( $item['thumbnail_url'] ) ) {
						return $item['thumbnail_url'];
					} elseif ( isset( $item['media_url'] ) ) {
						return $item['media_url'];
					}
					break;
				case 'CAROUSEL_ALBUM':
					if ( isset( $item['thumbnail_url'] ) ) {
						return $item['thumbnail_url'];
					} elseif ( isset( $item['media_url'] ) ) {
						return $item['media_url'];
					} elseif ( isset( $item['children']['data'][0]['thumbnail_url'] ) ) {
						return $item['children']['data'][0]['thumbnail_url'];
					} elseif ( isset( $item['children']['data'][0]['media_url'] ) ) {
						return $item['children']['data'][0]['media_url'];
					}
					break;
			}
		}

		return false;
	}

	function getItemType( array $item = array() ) {

		if ( isset( $item['media_type'] ) ) {
			switch ( $item['media_type'] ) {
				case 'IMAGE':
					return 'image';
				case 'VIDEO':
					return 'video';
				case 'CAROUSEL_ALBUM':
					return 'carousel';
			}
		}

		return 'image';
	}

	function getItemDate( array $item = array() ) {
		if ( isset( $item['timestamp'] ) ) {
			return date_i18n( 'j F, Y', strtotime( trim( str_replace( array( 'T', '+', ' 0000' ), ' ', $item['timestamp'] ) ) ) );
		}

		return false;
	}

	function getItemHashtags( array $item = array() ) {
		if ( isset( $item['caption'] ) ) {

			preg_match_all( '/(?<!\S)#([0-9a-zA-Z]+)/', $item['caption'], $hashtags );

			if ( isset( $hashtags[1] ) ) {
				return $hashtags[1];
			}
		}
	}

	// Return messages
	// ---------------------------------------------------------------------------
	public function getMessages() {
		return $this->messages;
	}

	public function setMessage( $message = '' ) {
		$this->messages[] = $message;
	}
}
