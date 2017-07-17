<?php
/*
Plugin Name: Preload Fullpage Cache
Version: 1.0
Plugin URI: https://www.tinywp.in
Author: pothi
Author URI: https://www.tinywp.in
Description: Preloads any new or recently updated post into fullpage cache.
*/

// disable executing this script directly
defined( 'ABSPATH'  ) or die( 'No script kiddies please!' );

if( !class_exists('PRELOAD_FULLPAGE_CACHE') ) {
    class PRELOAD_FULLPAGE_CACHE
    {
		function __construct() {
			add_action( 'save_post', array( $this, 'preload_desktop' ),  900, 3 ); // let's fetch the post very late
			add_action( 'save_post', array( $this, 'preload_mobile' ),   990, 3 ); // let's fetch mobile version even later
			add_action( 'save_post_post', array( $this, 'preload_amp' ), 999, 3 ); // let's fetch AMP version at last; only works on posts
		}

		function preload_desktop( $post_ID, $post, $update ) {
			$desktop_url = get_permalink( $post_ID );
			$desktop_url_args = array(
				'httpversion' => '1.1',
				'user-agent'  => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36',
			);
			wp_remote_get( $desktop_url, $desktop_url_args );
		}

		function preload_mobile( $post_ID, $post, $update ) {
			$mobile_url = get_permalink( $post_ID );
			$mobile_url_args = array(
				'httpversion' => '1.1',
				'user-agent'  => 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4',
			); 
			wp_remote_get( $mobile_url, $mobile_url_args );
		}

		function preload_amp( $post_ID, $post, $update ) {
			$amp_url = get_permalink( $post_ID ) . 'amp/';
			$amp_url_args = array(
				'httpversion' => '1.1',
				'user-agent'  => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36',
			);
			wp_remote_get( $amp_url, $amp_url_args );
		}
    } // class PRELOAD_FULLPAGE_CACHE

	// initialize the plugin by creating a new object
    $GLOBALS['preload-fullpage-cache'] = new PRELOAD_FULLPAGE_CACHE();

} // if class_exists PRELOAD_FULLPAGE_CACHE
