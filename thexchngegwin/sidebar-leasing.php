<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage The Exchange at Gwinnett
 * @since The Exchange at Gwinnette 1.0
 */


$blogName = get_bloginfo('name');
$defaultAlt = $blogName;

?>

<?php if(have_rows('default_page_footer_top')){ ?>

	<div id="footerTop">
		
		<?php

			$ftTitle = 'All In One Place.';
			$hbTemp = get_field('home_footer_title');

			if($hbTemp != '' && $hbTemp != NULL){
				$ftTitle = $hbTemp;
			} 

			while(have_rows('default_page_footer_top')): 
				
				the_row();

				$leftType;
				$leftMap;
				$leftImg = get_template_directory_uri().'/images/xchangeDefault.jpg';
				$leftImgAlt = $defaultAlt;
				$tempImg;

				if(have_rows('footer_top_left')){
					while(have_rows('footer_top_left')){
						the_row();
						$leftType = get_sub_field('footer_left_type');
						$leftMap = get_sub_field('footer_left_map');
						$tempImg = get_sub_field('footer_left_image');

						if($tempImg != '' && $tempImg != NULL){
							$leftImg = $tempImg['url'];
							if(wp_is_mobile()){
								$leftImg = $tempImg['sizes']['medium_large'];
							}
							$leftImgAlt = $tempImg['alt'];
						}
					}
				}

				$rightTitle = 'Location. Location. Location';
				$tempTitle;
				$rightText;

				if(have_rows('footer_top_right')){
					while(have_rows('footer_top_right')){
						the_row();
						$tempTitle = get_sub_field('footer_right_title');
						$rightText = get_sub_field('footer_right_text');

						if($tempTitle != '' && $tempTitle != NULL){
							$rightTitle = $tempTitle;
						}
					}
				}
		?>

			<!--<div id="ftTitle">
				<h4><?php echo $ftTitle;?></h4>
			</div>-->

			<div id="ftInner" class="<?php if($leftType == 'map'){?>mpfWrappers<?php }?><?php if($leftType == 'image'){?>imgfWrappers<?php }?>">
				
				<div id="ftiLft" class="<?php if($leftType == 'map'){?>lftMap<?php }?><?php if($leftType == 'image'){?>lftImage<?php }?>">

					<?php if($leftType == 'map'){?>

						<div class="rel">

							<div class="mapContainer" style="width: 100%; height: 100%;">

								<!--<div class="marker" data-lat="34.0514417" data-lng="-83.9939153">-->
								<div class="marker" data-lat="<?php echo $leftMap['lat'];?>" data-lng="<?php echo $leftMap['lng'];?>">

									<span class="mrkTitle"><?php echo $blogName;?></span>
									<div id="mpAddress">
										<?php echo $leftMap['address'];?>
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

						</div>

					<?php }?>

					<?php if($leftType == 'image'){?>

						<div class="bgImage" style="background-image: url('<?php echo $leftImg;?>');"></div>

						<img class="imageAbove" src="<?php echo $leftImg;?>" alt="<?php echo $leftImgAlt;?>" />

					<?php }?>

				</div><!-- END OF ftiLft -->

				<div id="ftiRght">
					
					<div class="rel">

						<?php if($rightText != '' && $rightText != NULL){?>
							<div><?php echo $rightText;?></div>
						<?php }?>

					</div>

					<div id="ftrTitle">
						<div class="rel">
							<?php echo $rightTitle;?>
						</div>		
					</div>

				</div><!-- END OF ftiRght -->

				<div class="clear"></div>

			</div>

		
		<?php endwhile; ?>

	</div><!-- END OF footerTop -->

<?php } ?>


