<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage ExchangeGwinnett
 * @since 1.0
 */

get_header(); ?>

<?php
	$blogName = get_bloginfo('name');
	$defaultAlt = $blogName;
	$pageTitle = get_the_title();

	$contMap = get_field('contact_map');
	$contForm = get_field('contact_form');

	//$contForm = '[contact-form-7 id="2169" title="Contact Form"]';
?>

<style type="text/css">
	
	/* ------------------------------- CONTACT ----------------------------------- */

	#xcntWrapper{
		position: relative;
		width: 90%;
		height: auto;
		margin: 0px auto;
	}

	@media(min-width: 768px){
		#xcntWrapper{
			width: 80%;
		}
	}

	#xconTop{
		position: relative;
		width: 100%;
		height: auto;
		padding: 20px 0px 0px;
		margin: 0px auto 20px;
	}

	#xconTop h1, #xconTop h2,
	#xconTop h3, #xconTop h4,
	#xconTop h5, #xconTop h6{
		display: block;
		text-align: center;
	}

	#xchngFCnter{
		position: relative;
		width: calc(100% - 20px);
		height: auto;
		margin: 0px auto;
	}

	#xchngMCnter{
		position: relative;
		width: 90%;
		height: 400px;
		margin: 0px auto;
	}

	@media(min-width: 768px){
		#xchngMCnter{
			width: 95%;
			height: 500px;
		}
	}

	@media(min-width: 980px){
		#xchngMCnter{
			width: 100%;
			height: 600px;
		}
	}

</style>

<div id="xcntWrapper">

	<div id="xconTop">
		
		<h1><?php echo $pageTitle;?></h1>

		<?php
			if(have_posts()){
				while(have_posts()):
					the_post();
					the_content();
				endwhile;
			}
		?>

	</div><!-- END OF xconTop -->

	<?php if($contForm != '' && $contForm != NULL){ ?>
		<div style="position: relative; width: 100%; height: auto; min-height: 200px; background: teal;">
			<?php echo do_shortcode(''.$contForm.'');?>
		</div>
	<?php }?>


</div><!-- END OF XCNTWRAPPER -->

<?php if($contMap != '' && $contMap != NULL){ ?>

	<div id="xchngMCnter">
		
		<div class="mapContainer" style="width: 100%; height: 100%;">

			<!--<div class="marker" data-lat="34.0514417" data-lng="-83.9939153">-->
			<div class="marker" data-lat="<?php echo $contMap['lat'];?>" data-lng="<?php echo $contMap['lng'];?>">

				<span class="mrkTitle"><?php echo $blogName;?></span>
				<div id="mpAddress">
					<?php echo $contMap['address'];?>
				</div>

			</div>

		</div>

		<script type="text/javascript">
				
			/*
			*  render_map
			*
			*  This function will render a Google Map onto the selected jQuery element
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	$el (jQuery element)
			*  @return	n/a
			*/
			var markerBg = '<?php echo get_template_directory_uri()."/images/markerHome.png"; ?>';

			function new_map( $el ) {

				// var
				var $markers = $el.find('.marker');
				
				
				// vars
				var args = {
					zoom		: 16,
					center		: new google.maps.LatLng(0, 0),
					mapTypeId	: google.maps.MapTypeId.ROADMAP
				};
				
				
				// create map	        	
				var map = new google.maps.Map( $el[0], args);
				
				
				// add a markers reference
				map.markers = [];
				
				
				// add markers
				$markers.each(function(){
					
			    	add_marker( $(this), map );
					
				});
				
				
				// center map
				center_map( map );
				
				
				// return
				return map;
				
			}

			/*
			*  add_marker
			*
			*  This function will add a marker to the selected Google Map
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	$marker (jQuery element)
			*  @param	map (Google Map object)
			*  @return	n/a
			*/

			function add_marker( $marker, map ) {

				// var
				var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

				// create marker
				var marker = new google.maps.Marker({
					position	: latlng,
					icon: markerBg,
					map			: map
				});

				// add to array
				map.markers.push( marker );

				// if marker contains HTML, add it to an infoWindow
				if( $marker.html() )
				{
					// create info window
					var infowindow = new google.maps.InfoWindow({
						content		: $marker.html()
					});

					// show info window when marker is clicked
					google.maps.event.addListener(marker, 'click', function() {

						infowindow.open( map, marker );

					});
				}

			}

			/*
			*  center_map
			*
			*  This function will center the map, showing all markers attached to this map
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	map (Google Map object)
			*  @return	n/a
			*/

			function center_map( map ) {

				// vars
				var bounds = new google.maps.LatLngBounds();

				// loop through all markers and create bounds
				$.each( map.markers, function( i, marker ){

					var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

					bounds.extend( latlng );

				});

				// only 1 marker?
				if( map.markers.length == 1 )
				{
					// set center of map
				    map.setCenter( bounds.getCenter() );
				    map.setZoom( 16 );
				}
				else
				{
					// fit to bounds
					map.fitBounds( bounds );
				}

			}

			/*
			*  document ready
			*
			*  This function will render each map when the document is ready (page has loaded)
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	5.0.0
			*
			*  @param	n/a
			*  @return	n/a
			*/
			// global var
			var map = null;

			$(document).ready(function(){

				$('.mapContainer').each(function(){
					map = new_map( $(this) );
				});

			});

		</script>

	</div><!-- END OF XCHNGMCNTER -->
	
<?php }?>

<?php
	$footerTop = get_field('footer_top_display');
	if($footerTop == 'yes'){
		get_sidebar('leasing');
	}
?>

<?php get_footer(); ?>
