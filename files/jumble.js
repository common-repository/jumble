/**
 * @link              http://www.giorgiorutigliano.it
 * @since             1.0.0
 * @package           Jumble
 *
 * @wordpress-plugin
 * Plugin Name:       Jumble
 * Plugin URI:        http://www.i8zse.eu/jumble
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Giorgio Rutigliano
 * Author URI:        http://www.giorgiorutigliano.it
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jumble
 */
 
 jQuery(document).ready(function($){
	// get objects in page
	var srtl=jQuery("[id=jmbul]") 
	for(var i = 0; i < srtl.length; i++) {
		$( srtl[i] ).sortable();
		$( srtl[i] ).disableSelection();
		var cld=$( srtl[i] ).children();
	    var k=cld.length;
		// shuffle elements
	    for (l=0;l<k;l++) {
			j = Math.floor(Math.random() * k);		
			$( cld[j] ).appendTo($( srtl[i] ));
		}	
		// check for correct order
		$( srtl[i] ).sortable({
			update: function() {
				fl=true;
				var cld=$(this).children();
				for(var j = 0; j < cld.length; j++) {
					var ord=parseInt($( cld[j] ).attr('ord'));
					if (ord!=j) {
						fl=false;
					}
				}
				if (fl) {
					// change back color p
					for(var j = 0; j < cld.length; j++) {
						$( cld[j] ).removeClass('jmbblock').addClass('jmbblock2');
					}
					// block elements
					$(this).sortable( "disable" );
					$('#jmbsnd').trigger("play");
				}
			}
		})	
	}
});
