<?php
/*
Plugin Name: Quote Magic
Plugin URI: http://compica.com/#
Description: This plugins generate online quotes for les cedres marali.
Author: Martin Fournier
Version: 1.000
Author URI: http://martinfournier.com
*/
require_once(dirname(__FILE__) . '/inc/functions.php');
wp_register_style('quote_css', plugins_url('/css/quote.css',__FILE__ ));
wp_enqueue_style('quote_css');
add_action('init', 'load_quote_magic_javascript');

function load_quote_magic_javascript() { 
   $src = plugins_url('quote-magic.js', __FILE__);
   wp_register_script( 'quote-magic', $src );
   wp_enqueue_script( 'quote-magic' );
}


/* End of File */
