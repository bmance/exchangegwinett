<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
			</main>

			<style type="text/css">
				
				

			</style>

			<footer id="xchngFooter" role="contentinfo">

				<?php
					$curYear = date('Y');
					$blogName = get_bloginfo('name');
					$defaultAlt = $blogName;
					$flAlt = $defaultAlt;
					$footerLogo = get_template_directory_uri().'/images/fuqua-logo-white.png';
					$tempLogo = get_field('footer_logo','options');

					if($tempLogo != '' && $tempLogo != NULL){
						$footerLogo = $tempLogo['url'];
						if(wp_is_mobile()){
							$footerLogo = $tempLogo['sizes']['medium_large'];
						}
						$flAlt = $tempLogo['alt'];
					}
				?>

				<div id="footerMid">
					
					<?php 
						if(have_rows('footer_mid','options')){

							$i = 1;

							while(have_rows('footer_mid','options')):
								the_row();
								$ftImage = get_sub_field('footer_info_image','options');
								$fiLink = get_sub_field('footer_info_image_link','options');
								$fiText = get_sub_field('footer_info_text','options');

								echo '<div id="footerMid'.$i.'" class="ftBoxes">';

									if($ftImage != '' && $ftImage != NULL){
										echo '<div class="ftImage">';
										if($fiLink != '' && $fiLink != NULL){
											echo '<a href="'.$fiLink.'" target="_blank">';
										}
										echo '<img src="'.$ftImage['url'].'" alt="'.$ftImage['alt'].'" />';
										if($fiLink != '' && $fiLink != NULL){
											echo '</a>';
										}
										echo '</div>';
									}

									if($fiText != '' && $fiText != NULL){
										echo '<div class="ftText">';
										echo $fiText;
										echo '</div>';
									}

								echo '</div>';//END OF FOOTERMID

								$i++;

							endwhile;

							echo '<div class="clear"></div>';
						}
					?>


				</div><!-- END OF FOOTERMID -->

				<div id="footerBtm">

					<span class="fbInfo">&copy;<?php echo $curYear;?> <?php echo $blogName;?></span> 
					<span class="fbmbrk"></span>
					<div class="fbDivide dskDivide">|</div>
					<span class="fbInfo">All Rights Reserved</span>
					<span class="fbmbrk"></span>
					<div class="fbDivide dskDivide">|</div>
					<span class="fbInfo">This website was created by <a href="https://clementinecreativeagency.com/" target="_blank">Clementine Creative Agency</a></span>

					<br/>

					<span class="fbInfo">
						<?php
							$termsType = get_field('terms_type','options');
							if($termsType == 'link'){
								$termsLink = get_field('terms_link','options');
								echo '<a data-fancybox data-type="iframe" data-src="'.$termsLink.'" href="javascript:;">';
							}else{
								$termsText = get_field('terms_text','options');
								echo '<div id="xchgterms" class="policyTerms">'.$termsText.'</div>';
								echo '<a data-fancybox data-src="#xchgterms" href="javascript:;">';
							}
						?>

							Terms of Use

						</a>

					</span>

					<span class="fbDivide">|</span>

					<span class="fbInfo">
						<?php
							$privacyType = get_field('privacy_type','options');
							if($privacyType == 'link'){
								$privacyLink = get_field('privacy_link','options');
								echo '<a data-fancybox data-type="iframe" data-src="'.$privacyLink.'" href="javascript:;">';
							}else{
								$privacyText = get_field('privacy_text','options');
								echo '<div id="xchngPrivacy" class="policyTerms">'.$privacyText.'</div>';
								echo '<a data-fancybox data-src="#xchngPrivacy" href="javascript:;">';
							}
						?>

						Privacy Policy

						</a>

					</span>

				</div><!-- END OF FOOTERBTM -->

			</footer><!-- #site-footer -->

			<?php if(get_field('custom_footer_code','options')){?>
			
				<!-- CUSTOM FOOTER CODE -->
				<?php echo '<div class="invisiContainer">'.get_field('custom_footer_code','options').'</div>';?>
			
			<?php }?>

		<?php wp_footer(); ?>

	</body>

	<script type="text/javascript">
		
		$(window).on('load', function(){ // WAITS TILL THE WHOLE PAGE LOADS
			imageDefer();
			backgroundDefer();
		});

		$('[data-fancybox="gallery"]').fancybox({
			protect: true,
		});

		function backgroundDefer() {
			var totalBgImage = $(".bgImage").length;
		    for (var i = 0; i < totalBgImage; i++) {
				if($(".bgImage").eq(i).attr('data-src')) {
		        	$(".bgImage").eq(i).css('background-image',  "url('"+$(".bgImage").eq(i).attr('data-src')+"')");
				}
		    }
		}

		function imageDefer() {
		    var imgDefer = document.getElementsByTagName('img');
		    for (var i=0; i<imgDefer.length; i++) {
		        if(imgDefer[i].getAttribute('data-src')) {
		            imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
		        }

				// ADDS THE BLOG NAME BY DEFAULT TO ALL THE IMAGE ALT TAG
				var altstring = '<?php echo get_bloginfo('name'); ?> ' + imgDefer[i].getAttribute('alt');
				imgDefer[i].setAttribute('alt', altstring);
		    }
		}

	</script>

</html>
