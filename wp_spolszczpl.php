<?php

/**
 * @package wp_spolszczpl
 * @version 0.2
 */
/*
Plugin Name: SpolszczPL
Plugin URI: http://kuzniabinarna.pl
Description: Plugin consumes spolszcz.pl API to correct content with polish special characters.
Author: Bart Karalus
Author URI: http://kuzniabinarna.pl
*/


/* Plugin dashboard addition init */
add_action( 'add_meta_boxes', 'on_add_meta_boxes' );
function on_add_meta_boxes(){
    add_meta_box('spolszcz_pl', 'Polskie Znaki', 'wp_spolszczpl_meta', 'post', 'side');
}


/* Text correction utilities */
function get_ajax_path()
{
	return plugin_dir_url(__FILE__).'wp_spolszczpl_proxy.php';
}

function wp_spolszczpl_meta( $post ) {
	/* Output the java script part of plugin */
	/* TODO: move the js to the separate file later on */
    ?>
	    <button class="button" id="Spolszcz">Dodaj polskie znaki</button>
	    <div class="clear"></div>

		<script type="text/javascript">
			var proxyPath = "<?= get_ajax_path() ?>";

			function isTinyMCEEnabled()
			{
				var contentWrapper = jQuery('#wp-content-wrap');
				return !contentWrapper.hasClass('html-active');
			}

			function getContent()
			{
				if(isTinyMCEEnabled())
				{
					return tinyMCE.activeEditor.getContent();
				}
				else
				{
					return jQuery('#content').val();
				}
			}

			function setContent(newContent)
			{
				if(isTinyMCEEnabled())
				{
					tinyMCE.activeEditor.setContent(newContent);
				}
				else
				{
					jQuery('#content').val(newContent);
				}
			}

			function OnPluginButtonClick(e)
			{
				e.preventDefault();

				var postContent = getContent();
				jQuery.post(proxyPath, {txt:postContent}, setContent).fail(function(){ console.log('Failed to communicate with a proxy.'); });
			}

			jQuery('#Spolszcz').on('click', OnPluginButtonClick);
		</script>
    <?php
}