<?php
/*
Plugin Name: Copy in clipboard
Description: Small plugin that copy text into clipboard (onClick) from title tag using zeroclipboard.
Author: CoYoTe
Version: 0.8
Author URI: http://www.ivanherceg.in.rs
*/
	wp_register_script( 'jquery', WP_PLUGIN_URL . '/copy-in-clipboard/jquery-1.4.2.min.js' );
	wp_enqueue_script('jquery');
	add_action('wp_head', 'copyinclipboard', 15);
    wp_register_script( 'zeroclipboard', WP_PLUGIN_URL . '/copy-in-clipboard/zeroclipboard.js' );
    wp_enqueue_script( 'zeroclipboard' );

function copyinclipboard() {
echo '<script type="text/javaScript">
ZeroClipboard.setMoviePath( \''. WP_PLUGIN_URL . '/copy-in-clipboard/zeroclipboard.swf\' );
jQuery(document).ready(function() {
    jQuery(\'.copy\').mouseover(function() {
        var txt = jQuery(this).attr("title");
		var url = jQuery(this).attr("href");
        clip = new ZeroClipboard.Client();
		clip.setHandCursor(true);
        clip.setText(txt);
        clip.glue(this);
        clip.addEventListener(\'complete\', function(client, text) {
			alert("Address copied to clipboard!" );
			if (url!=undefined){							//this is for
				window.location=url;						//<a href links
			}												//to do it
        });
    });
});
</script>';
}
?>