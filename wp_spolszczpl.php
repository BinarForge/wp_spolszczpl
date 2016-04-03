<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * @package wp_spolszczpl
 * @version 0.1
 */
/*
Plugin Name: SpolszczPL
Plugin URI: http://kuzniabinarna.pl
Description: Plugin consumes spolszcz.pl API to correct content with polish special characters.
Author: Bart Karalus
Version: 1.0
Author URI: http://kuzniabinarna.pl
*/


add_action( 'add_meta_boxes', 'on_add_meta_boxes' );
function on_add_meta_boxes(){
    add_meta_box('spolszcz_pl', 'Polskie Znaki', 'wp_spolszczpl_meta', 'post', 'side');
}

function wp_spolszczpl_meta( $post ) {
    ?>
    <button class="button">Dodaj polskie znaki</button>
    <div class="clear"></div>
    <?php
}
