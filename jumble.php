<?php

/**
 * @link              http://www.giorgiorutigliano.it
 * @since             1.0.0
 * @package           Jumble
 *
 * @wordpress-plugin
 * Plugin Name:       Jumble
 * Plugin URI:        http://www.i8zse.eu/jumble
 * Description:       'Sentence jumble' game for primary school.
 * Version:           1.0.2
 * Author:            Giorgio Rutigliano
 * Author URI:        http://www.giorgiorutigliano.it
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jumble
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'JUMBLE_VERSION', '1.0.0' );

function run_jumble() {

	$plugin = new Jumble();
	$plugin->run();

}

function jumble_func( $atts ) {
     extract( shortcode_atts( array(
	      'txt' => '???',
     ), $atts ) );
	 $pezzi = explode("|", $txt);
	 $html.="<div class='jmbdiv'><ul id='jmbul'>";
	 $ord=0;
	 foreach ($pezzi as $pezzo) {
		$html.="<li class='jmbblock' ord='".$ord."'>".$pezzo."</li>";
		$ord+=1;
		}
	 $html.="</ul></div><audio id='jmbsnd' src='".plugin_dir_url( __FILE__ )."files/applause.mp3'></audio>"; 
     return $html;
}
add_shortcode( 'jumble', 'jumble_func' );
add_action('wp_enqueue_scripts','zjs');

function zjs() {
   wp_enqueue_script('jquery');
   wp_enqueue_script('jquery-ui-sortable');
   wp_enqueue_script('jquery-touch-punch');
   wp_enqueue_script('jumblejs', plugins_url('/files/jumble.js', __FILE__ ), '1.0');
   wp_enqueue_style( 'jumblecss', plugins_url( '/files/jumble.css', __FILE__ ), false, '1.0', 'all');
}

