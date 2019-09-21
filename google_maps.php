<?php
/*
Plugin Name: Philosophy Google Maps ShortCode
Plugin URL:
Description: ShortCode for google maps
Version: 1.0
Author: Imtiaz Epu
Author URI: https://imtiazepu.com
License: GPLv2 or later
Text Domain: philosophy-google-maps
Domain Path: /languages/
*/
require_once dirname(__FILE__)."/google_map_ui.php";
function google_map_load_text_domain() {
	load_plugin_textdomain( "philosophy-google-maps", false, dirname( __FILE__ ) . "/languages" );
}

add_action( "plugin_loaded", "google_map_load_text_domain" );

function philosophy_google_map( $attributes ) {
	$default = array(
		'place'  => 'Narayanganj',
		'width'  => '100%',
		'height' => '400',
		'zoom'   => '15',
	);
	$params  = shortcode_atts( $default, $attributes );
	$map     = <<<EOD
<div>
    <div>
        <iframe width="{$params['width']}" height="{$params['height']}" id="gmap_canvas"
            src="https://maps.google.com/maps?q={$params['place']}&t=&z={$params['zoom']}&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe>
    </div>
</div>
EOD;

	return $map;
}

add_shortcode( "google_map", "philosophy_google_map" );
