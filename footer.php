<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>
</div> 
<div id= "footer">

			<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">Design by Sherrie Gonzalez</a>
			<a href="http://wordpress.org/" title="Semantic Personal Publishing Platform" rel="generator">| Powered by WordPress </a>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</div>
</div>
<script type="text/javascript">
			$.fn.stickyfloat = function(options, lockBottom) {
				var $obj 				= this;
				var parentPaddingTop 	= parseInt($obj.parent().css('padding-top'));
				var startOffset 		= $obj.parent().offset().top;
				var opts 				= $.extend({ startOffset: startOffset, offsetY: parentPaddingTop, duration: 200, lockBottom:true }, options);
				
				$obj.css({ position: 'absolute' });
				
				if(opts.lockBottom){
					var bottomPos = $obj.parent().height() - $obj.height() + parentPaddingTop; //get the maximum scrollTop value
					if( bottomPos < 0 )
						bottomPos = 0;
				}
				
				$(window).scroll(function () { 
					$obj.stop(); // stop all calculations on scroll event
 
					var pastStartOffset			= $(document).scrollTop() > opts.startOffset;	// check if the window was scrolled down more than the start offset declared.
					var objFartherThanTopPos	= $obj.offset().top > startOffset;	// check if the object is at it's top position (starting point)
					var objBiggerThanWindow 	= $obj.outerHeight() < $(window).height();	// if the window size is smaller than the Obj size, then do not animate.
					
					// if window scrolled down more than startOffset OR obj position is greater than
					// the top position possible (+ offsetY) AND window size must be bigger than Obj size
					if( (pastStartOffset || objFartherThanTopPos) && objBiggerThanWindow ){ 
						var newpos = ($(document).scrollTop() -startOffset + opts.offsetY );
						if ( newpos > bottomPos )
							newpos = bottomPos;
						if ( $(document).scrollTop() < opts.startOffset ) // if window scrolled < starting offset, then reset Obj position (opts.offsetY);
							newpos = parentPaddingTop;
			
						$obj.animate({ top: newpos }, opts.duration );
					}
				});
			};
 
			$('#sidebar').stickyfloat({ duration: 400 });
			 </script>
</body>
</html>