<?php
/**
 * Template Name: Home
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage ExchangeGwinnett
 * @since 1.0
 */

$blogName = get_bloginfo('name');
$defaultAlt = $blogName;
$pageTitle = get_the_title();

get_header(); ?>

<!--<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/shuffle.js"></script>-->

<div id="homeWrapper">

	<div id="homeTop">
		
		<?php
			$homeLogo = get_field('home_logo_image');
			$homeLgAlt = $homeLogo['alt'];
			if(wp_is_mobile()){
				$homeLogo = $homeLogo['sizes']['medium_large'];
			}else{
				$homeLogo = $homeLogo['url'];
			}
			if($homeLogo != '' && $homeLogo != NULL){
				echo '<div id="htLogo">';
					echo '<img src="'.$homeLogo.'" alt="'.$homeLgAlt.'" />';
				echo '</div>';
			}
		?>

		<div id="homeText">
			
			<h1><?php echo $pageTitle;?></h1>

			<?php
				if(have_posts()){
					while(have_posts()):
						the_post();
						the_content();
					endwhile;
				}
			?>

		</div>

	</div><!-- END OF HOME TOP -->


	<div id="homeFeatures">

		<?php

			//HOME FEATURE PHOTO CALLOUT 1
			$hfmPhoto1 = get_template_directory_uri().'/images/home-features-1.jpg';
			$hfmPhoto1_Alt = $defaultAlt;

			$faTitle1 = 'Retail Therapy';
			$faSubtitle1 = 'All the Shops';

			$fslCustom1;
			$fslType1 = get_field('home_feature_link_type_1');
			if($fslType1 == 'external'){
				$fslCustom1 = 'target="_blank"';
			}else if($fslType1 == 'iframe'){
				$fslCustom1 = 'data-fancybox=""';
			}else{
				$fslCustom1 = '';
			}

			$fmTitle1 = get_field('home_feature_main_title_1');
			$fsTitle1 = get_field('home_feature_sub_title_1');
			$fsLink1 = get_field('home_feature_link_1');

			$tempPhoto1 = get_field('home_feature_image_1');

			if($tempPhoto1 != '' && $tempPhoto1 != NULL){
				$hfmPhoto1 = $tempPhoto1['url'];
				if(wp_is_mobile()){
					$hfmPhoto1 = $tempPhoto1['sizes']['medium_large'];
				}
				$hfmPhoto1_Alt = $tempPhoto1['alt'];
			}


			//HOME FEATURE PHOTO CALLOUT 2
			$hfmPhoto2 = get_template_directory_uri().'/images/home/home-features-2.jpg';
			$hfmPhoto2_Alt = $defaultAlt;

			$faTitle2 = 'Table For...';
			$faSubtitle2 = 'You, Me, Us.';

			$fslCustom2;
			$fslType2 = get_field('home_feature_link_type_2');
			if($fslType2 == 'external'){
				$fslCustom2 = 'target="_blank"';
			}else if($fslType2 == 'iframe'){
				$fslCustom2 = 'data-fancybox=""';
			}else{
				$fslCustom2 = '';
			}

			$fmTitle2 = get_field('home_feature_main_title_2');
			$fsTitle2 = get_field('home_feature_sub_title_2');
			$fsLink2 = get_field('home_feature_link_2');

			$tempPhoto2 = get_field('home_feature_image_2');

			if($tempPhoto2 != '' && $tempPhoto2 != NULL){
				$hfmPhoto2 = $tempPhoto2['url'];
				if(wp_is_mobile()){
					$hfmPhoto2 = $tempPhoto2['sizes']['medium_large'];
				}
				$hfmPhoto2_Alt = $tempPhoto2['alt'];
			}


			//HOME FEATURE PHOTO CALLOUT 3
			$hfmPhoto3 = get_template_directory_uri().'/images/home/home-features-3.jpg';
			$hfmPhoto3_Alt = $defaultAlt;

			$faTitle3 = 'Thrills';
			$faSubtitle3 = 'Playtime';

			$fslCustom3;
			$fslType3 = get_field('home_feature_link_type_3');
			if($fslType3 == 'external'){
				$fslCustom3 = 'target="_blank"';
			}else if($fslType3 == 'iframe'){
				$fslCustom3 = 'data-fancybox=""';
			}else{
				$fslCustom3 = '';
			}

			$fmTitle3 = get_field('home_feature_main_title_3');
			$fsTitle3 = get_field('home_feature_sub_title_3');
			$fsLink3 = get_field('home_feature_link_3');

			$tempPhoto3 = get_field('home_feature_image_3');

			if($tempPhoto3 != '' && $tempPhoto3 != NULL){
				$hfmPhoto3 = $tempPhoto3['url'];
				if(wp_is_mobile()){
					$hfmPhoto3 = $tempPhoto3['sizes']['medium_large'];
				}
				$hfmPhoto3_Alt = $tempPhoto3['alt'];
			}


			//HOME FEATURE PHOTO CALLOUT 4
			$hfmPhoto4 = get_template_directory_uri().'/images/home/home-features-4.jpg';
			$hfmPhoto4_Alt = $defaultAlt;

			$faTitle4 = 'Enjoy';
			$faSubtitle4 = 'The Time of Your Life';

			$fslCustom4;
			$fslType4 = get_field('home_feature_link_type_4');
			if($fslType4 == 'external'){
				$fslCustom4 = 'target="_blank"';
			}else if($fslType4 == 'iframe'){
				$fslCustom4 = 'data-fancybox=""';
			}else{
				$fslCustom4 = '';
			}

			$fmTitle4 = get_field('home_feature_main_title_4');
			$fsTitle4 = get_field('home_feature_sub_title_4');
			$fsLink4 = get_field('home_feature_link_4');

			$tempPhoto4 = get_field('home_feature_image_4');

			if($tempPhoto4 != '' && $tempPhoto4 != NULL){
				$hfmPhoto4 = $tempPhoto4['url'];
				if(wp_is_mobile()){
					$hfmPhoto4 = $tempPhoto4['sizes']['medium_large'];
				}
				$hfmPhoto4_Alt = $tempPhoto4['alt'];
			}


			//HOME FEATURE PHOTO CALLOUT 5
			$hfmPhoto5 = get_template_directory_uri().'/images/home/home-features-5.jpg';
			$hfmPhoto5_Alt = $defaultAlt;

			$faTitle5;
			$faSubtitle5;

			$fslCustom5;
			$fslType5 = get_field('home_feature_link_type_5');
			if($fslType5 == 'external'){
				$fslCustom5 = 'target="_blank"';
			}else if($fslType5 == 'iframe'){
				$fslCustom5 = 'data-fancybox=""';
			}else{
				$fslCustom5 = '';
			}

			$fmTitle5 = get_field('home_feature_main_title_5');
			$fsTitle5 = get_field('home_feature_sub_title_5');
			$fsLink5 = get_field('home_feature_link_5');

			$tempPhoto5 = get_field('home_feature_image_5');

			if($tempPhoto5 != '' && $tempPhoto5 != NULL){
				$hfmPhoto5 = $tempPhoto5['url'];
				if(wp_is_mobile()){
					$hfmPhoto5 = $tempPhoto5['sizes']['medium_large'];
				}
				$hfmPhoto5_Alt = $tempPhoto5['alt'];
			}


			//HOME FEATURE PHOTO CALLOUT 6
			$hfmPhoto6 = get_template_directory_uri().'/images/home/home-features-6.jpg';
			$hfmPhoto6_Alt = $defaultAlt;

			$faTitle6;
			$faSubtitle6;

			$fslCustom6;
			$fslType6 = get_field('home_feature_link_type_6');
			if($fslType6 == 'external'){
				$fslCustom6 = 'target="_blank"';
			}else if($fslType6 == 'iframe'){
				$fslCustom6 = 'data-fancybox=""';
			}else{
				$fslCustom6 = '';
			}

			$fmTitle6 = get_field('home_feature_main_title_6');
			$fsTitle6 = get_field('home_feature_sub_title_6');
			$fsLink6 = get_field('home_feature_link_6');

			$tempPhoto6 = get_field('home_feature_image_6');

			if($tempPhoto6 != '' && $tempPhoto6 != NULL){
				$hfmPhoto6 = $tempPhoto6['url'];
				if(wp_is_mobile()){
					$hfmPhoto6 = $tempPhoto6['sizes']['medium_large'];
				}
				$hfmPhoto6_Alt = $tempPhoto6['alt'];
			}


			// HOME FEATURE PHOTO CALLOUT 7
			$hfmPhoto7 = get_template_directory_uri().'/images/home/home-features-7.jpg';
			$hfmPhoto7_Alt = $defaultAlt;

			$faTitle7;
			$faSubtitle7;

			$fslCustom7;
			$fslType7 = get_field('home_feature_link_type_7');
			if($fslType7 == 'external'){
				$fslCustom7 = 'target="_blank"';
			}else if($fslType7 == 'iframe'){
				$fslCustom7 = 'data-fancybox=""';
			}else{
				$fslCustom7 = '';
			}

			$fmTitle7 = get_field('home_feature_main_title_7');
			$fsTitle7 = get_field('home_feature_sub_title_7');
			$fsLink7 = get_field('home_feature_link_7');


			$tempPhoto7 = get_field('home_feature_image_7');

			if($tempPhoto7 != '' && $tempPhoto7 != NULL){
				$hfmPhoto7 = $tempPhoto7['url'];
				if(wp_is_mobile()){
					$hfmPhoto7 = $tempPhoto7['sizes']['medium_large'];
				}
				$hfmPhoto7_Alt = $tempPhoto7['alt'];
			}
		?>

		<div id="hfmGrid" class="grid">
			
			<div id="hfmItem1" class="hmfItems cols2">
				<?php if($fsLink1 != '' && $fsLink1 != NULL){ ?>
					<a href="<?php echo $fsLink1;?>" <?php echo $fslCustom1;?>>
				<?php }?>
				<img class="xchngEmblems" src="<?php echo get_template_directory_uri();?>/images/xchngEmblem.png" alt="" />
				<img class="placement" src="<?php echo get_template_directory_uri();?>/images/home/hfplacement1.png" alt="<?php echo $hfmPhoto1_Alt;?>" />
				<div class="bgImage effect2" style="background-image: url('<?php echo $hfmPhoto1;?>')" ></div>
				<img class="imageAbove" src="<?php echo $hfmPhoto1;?>" alt="<?php echo $hfmPhoto1_Alt;?>" />
				<div class="hfmText">
					<div class="rel">
						<?php if($fmTitle1 != '' && $fmTitle1 != NULL){ ?>
						<span class="fmTitles"><?php echo $fmTitle1;?></span>
						<?php }?>

						<?php if($fsTitle1 != '' && $fsTitle1 != NULL){ ?>
						<span class="fsTitles"><?php echo $fsTitle1;?></span>
						<?php }?>
					</div>
				</div>
				<div class="drkOverlay effect2"></div>
				<?php if($fsLink1 != '' && $fsLink1 != NULL){ ?>
					</a>
				<?php }?>
			</div><!-- END OF HFMITEM1 -->

			<div id="hfmItem2" class="hmfItems cols2">
				<?php if($fsLink2 != '' && $fsLink2 != NULL){ ?>
					<a href="<?php echo $fsLink2;?>" <?php echo $fslCustom2;?>>
				<?php }?>
				<img class="xchngEmblems" src="<?php echo get_template_directory_uri();?>/images/xchngEmblem.png" alt="" />
				<img class="placement" src="<?php echo get_template_directory_uri();?>/images/home/hfplacement2.png" alt="<?php echo $hfmPhoto1_Alt;?>" />
				<div class="bgImage effect2" style="background-image: url('<?php echo $hfmPhoto2;?>')" ></div>
				<img class="imageAbove" src="<?php echo $hfmPhoto2;?>" alt="<?php echo $hfmPhoto2_Alt;?>" />
				<div class="hfmText">
					<div class="rel">
						<?php if($fmTitle2 != '' && $fmTitle2 != NULL){ ?>
						<span class="fmTitles"><?php echo $fmTitle2;?></span>
						<?php }?>

						<?php if($fsTitle2 != '' && $fsTitle2 != NULL){ ?>
						<span class="fsTitles"><?php echo $fsTitle2;?></span>
						<?php }?>
					</div>
				</div>
				<div class="drkOverlay effect2"></div>
				<?php if($fsLink2 != '' && $fsLink2 != NULL){ ?>
					</a>
				<?php }?>
			</div><!-- END OF HFMITEM2 -->

			<div id="hfmItem3" class="hmfItems cols2">
				<?php if($fsLink3 != '' && $fsLink3 != NULL){ ?>
					<a href="<?php echo $fsLink3;?>" <?php echo $fslCustom3;?>>
				<?php }?>
				<img class="xchngEmblems" src="<?php echo get_template_directory_uri();?>/images/xchngEmblem.png" alt="" />
				<img class="placement" src="<?php echo get_template_directory_uri();?>/images/home/hfplacement3.png" alt="<?php echo $hfmPhoto1_Alt;?>" />
				<div class="bgImage effect2" style="background-image: url('<?php echo $hfmPhoto3;?>')" ></div>
				<img class="imageAbove" src="<?php echo $hfmPhoto3;?>" alt="<?php echo $hfmPhoto3_Alt;?>" />
				<div class="hfmText">
					<div class="rel">
						<?php if($fmTitle3 != '' && $fmTitle3 != NULL){ ?>
						<span class="fmTitles"><?php echo $fmTitle3;?></span>
						<?php }?>

						<?php if($fsTitle3 != '' && $fsTitle3 != NULL){ ?>
						<span class="fsTitles"><?php echo $fsTitle3;?></span>
						<?php }?>
					</div>
				</div>
				<div class="drkOverlay effect2"></div>
				<?php if($fsLink3 != '' && $fsLink3 != NULL){ ?>
					</a>
				<?php }?>
			</div><!-- END OF HFMITEM3 -->

			<div id="hfmItem4" class="hmfItems cols2">
				<?php if($fsLink4 != '' && $fsLink4 != NULL){ ?>
					<a href="<?php echo $fsLink4;?>" <?php echo $fslCustom4;?>>
				<?php }?>
				<img class="xchngEmblems" src="<?php echo get_template_directory_uri();?>/images/xchngEmblem.png" alt="" />
				<img class="placement" src="<?php echo get_template_directory_uri();?>/images/home/hfplacement4.png" alt="<?php echo $hfmPhoto1_Alt;?>" />
				<div class="bgImage effect2" style="background-image: url('<?php echo $hfmPhoto4;?>')" ></div>
				<img class="imageAbove" src="<?php echo $hfmPhoto4;?>" alt="<?php echo $hfmPhoto4_Alt;?>" />
				<div class="hfmText">
					<div class="rel">
						<?php if($fmTitle4 != '' && $fmTitle4 != NULL){ ?>
						<span class="fmTitles"><?php echo $fmTitle4;?></span>
						<?php }?>

						<?php if($fsTitle4 != '' && $fsTitle4 != NULL){ ?>
						<span class="fsTitles"><?php echo $fsTitle4;?></span>
						<?php }?>
					</div>
				</div>
				<div class="drkOverlay effect2"></div>
				<?php if($fsLink4 != '' && $fsLink4 != NULL){ ?>
					</a>
				<?php }?>
			</div><!-- END OF HFMITEM4 -->

			<div id="hfmItem5" class="hmfItems cols2">
				<?php if($fsLink5 != '' && $fsLink5 != NULL){ ?>
					<a href="<?php echo $fsLink5;?>" <?php echo $fslCustom5;?>>
				<?php }?>
				<img class="xchngEmblems" src="<?php echo get_template_directory_uri();?>/images/xchngEmblem.png" alt="" />
				<img class="placement" src="<?php echo get_template_directory_uri();?>/images/home/hfplacement5.png" alt="<?php echo $hfmPhoto1_Alt;?>" />
				<div class="bgImage effect2" style="background-image: url('<?php echo $hfmPhoto5;?>')" ></div>
				<img class="imageAbove" src="<?php echo $hfmPhoto5;?>" alt="<?php echo $hfmPhoto5_Alt;?>" />
				<div class="hfmText">
					<div class="rel">
						<?php if($fmTitle5 != '' && $fmTitle5 != NULL){ ?>
						<span class="fmTitles"><?php echo $fmTitle5;?></span>
						<?php }?>

						<?php if($fsTitle5 != '' && $fsTitle5 != NULL){ ?>
						<span class="fsTitles"><?php echo $fsTitle5;?></span>
						<?php }?>
					</div>
				</div>
				<div class="drkOverlay effect2"></div>
				<?php if($fsLink5 != '' && $fsLink5 != NULL){ ?>
					</a>
				<?php }?>
			</div><!-- END OF HFMITEM5 -->

			<div id="hfmItem6" class="hmfItems cols2">
				<?php if($fsLink6 != '' && $fsLink6 != NULL){ ?>
					<a href="<?php echo $fsLink6;?>" <?php echo $fslCustom6;?>>
				<?php }?>
				<img class="xchngEmblems" src="<?php echo get_template_directory_uri();?>/images/xchngEmblem.png" alt="" />
				<img class="placement" src="<?php echo get_template_directory_uri();?>/images/home/hfplacement6.png" alt="<?php echo $hfmPhoto1_Alt;?>" />
				<div class="bgImage effect2" style="background-image: url('<?php echo $hfmPhoto6;?>')" ></div>
				<img class="imageAbove" src="<?php echo $hfmPhoto6;?>" alt="<?php echo $hfmPhoto6_Alt;?>" />
				<div class="hfmText">
					<div class="rel">
						<?php if($fmTitle6 != '' && $fmTitle6 != NULL){ ?>
						<span class="fmTitles"><?php echo $fmTitle6;?></span>
						<?php }?>

						<?php if($fsTitle6 != '' && $fsTitle6 != NULL){ ?>
						<span class="fsTitles"><?php echo $fsTitle6;?></span>
						<?php }?>
					</div>
				</div>
				<div class="drkOverlay effect2"></div>
				<?php if($fsLink6 != '' && $fsLink6 != NULL){ ?>
					</a>
				<?php }?>
			</div><!-- END OF HFMITEM6 -->

			<div id="hfmItem7" class="hmfItems cols2">
				<?php if($fsLink7 != '' && $fsLink7 != NULL){ ?>
					<a href="<?php echo $fsLink7;?>" <?php echo $fslCustom7;?>>
				<?php }?>
				<img class="xchngEmblems" src="<?php echo get_template_directory_uri();?>/images/xchngEmblem.png" alt="" />
				<img class="placement" src="<?php echo get_template_directory_uri();?>/images/home/hfplacement7.png" alt="<?php echo $hfmPhoto1_Alt;?>" />
				<div class="bgImage effect2" style="background-image: url('<?php echo $hfmPhoto7;?>')" ></div>
				<img class="imageAbove" src="<?php echo $hfmPhoto7;?>" alt="<?php echo $hfmPhoto7_Alt;?>" />
				<div class="hfmText">
					<div class="rel">
						<?php if($fmTitle7 != '' && $fmTitle7 != NULL){ ?>
						<span class="fmTitles"><?php echo $fmTitle7;?></span>
						<?php }?>

						<?php if($fsTitle7 != '' && $fsTitle7 != NULL){ ?>
						<span class="fsTitles"><?php echo $fsTitle7;?></span>
						<?php }?>
					</div>
				</div>
				<div class="drkOverlay effect2"></div>
				<?php if($fsLink7 != '' && $fsLink7 != NULL){ ?>
					</a>
				<?php }?>
			</div><!-- END OF HFMITEM7 -->

			<div class="cols2 sizer"></div>

		</div>

		<script type="text/javascript">
			
			var Shuffle = window.Shuffle;
			var element = document.querySelector('.grid');
			var sizer = element.querySelector('.sizer');
			var winWidth = $(window).width();
			var winHeight = $(window).height();

			var shuffleInstance = new Shuffle(element, {
			  itemSelector: '.hmfItems',
			  columnWidth: 0,
			  sizer: sizer 
			});

			$(document).ready(function(){
				winWidth = $(window).width();
				winHeight = $(window).height();
				shuffleInstance.update();
			});

			$(window).resize(function(){
				shuffleInstance.update();
			});

		</script>


	</div><!-- END OF HOME FEATURES -->


	<div id="homeNews">
		
		<?php
			$hnTitle = 'What\'s New?';
			$hntmpTitle = get_field('home_news_title');

			$nbText = 'All News';
			$nbtempText = get_field('news_button_text');
			$blogLink = get_field('news_page_link');

			if($hntmpTitle != '' && $hntmpTitle != NULL){
				$hnTitle = $hntmpTitle;
			}

			/*if($nbtempText != '' && $nbtempText != NULL){
				$nbText = $nbtempText;
			}*/
		?>
		<div class="xchngTitles">
			<h2><?php echo $hnTitle;?></h2>
		</div>

		<?php

			$cuName = htmlspecialchars($_GET["category"]);

			$i = 0;
			$j = 0;
			$k = 0;
			$blogTotal = 0;
			$blog = array(array());
			$catList = array();
			$catSlug = array();
			$catgList = array(array());

			$args = array('posts_per_page' => 3, 'orderby'=>'date', 'order'=>'DESC');

			$cats = get_categories($args);

			$list_of_posts = new WP_Query( $args );
			//sort($list_of_posts);
			while ( $list_of_posts->have_posts() ) :
				
				$list_of_posts->the_post();

				$blog[$i]['postLink'] = get_post_permalink();
				$blog[$i]['title'] = get_the_title();
				$blog[$i]['postAlt'] = $pcthLogo_Alt;
				$blog[$i]['postImg'] = get_template_directory_uri().'/images/postDefault.png';

				//FOR THE BLOG EXCERPT
				//$blog[$i]['excerpt'] = substr(get_the_content(), 0, 120).'...<a href="'.get_post_permalink().'">Read More</a>';
				$blog[$i]['excerpt'] = get_field('news_post_excerpt').'...<a href="'.get_post_permalink().'">Read More</a>';

				$blog[$i]['content'] = '<span class="newsTitle">'.$blog[$i]['title'].'</span>';
				$blog[$i]['content'] .= '<div class="hnTxt">'.$blog[$i]['excerpt'].'</div>';
				$blog[$i]['content'] .= '<div class="hnpBlock"><div class="swiper-pagination"></div></div>';
				$blog[$i]['content'] .= '<a class="newsButton xchngBtns" href="'.$blogLink.'">'.$nbText.'</a>';

				

				if(has_post_thumbnail()){
					$blog[$i]['postImg'] = get_the_post_thumbnail_url();
					if(wp_is_mobile()){
						$blog[$i]['postImg'] = get_the_post_thumbnail_url($post->ID,'medium_large');
					}
					$thumbnail_id = get_post_thumbnail_id( $post->ID );
					$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
					if($blog[$i]['postImg'] == ''){
						$blog[$i]['postImg'] = get_template_directory_uri().'/images/postDefault.png';
					}
					//$blog[$i]['postAlt'] = get_bloginfo('name');
					if($alt != ''){
						//$blog[$i]['postAlt'] = esc_html ( $alt );
					}else{
						//$blog[$i]['postAlt'] = $pcthLogo_Alt;
					} 
				}

				$i++;

			endwhile;

			$blogTotal = $i;

			wp_reset_postdata();

			//FOR MAIN PAGE CONTENT
			if(have_posts()){
				while(have_posts()):
					the_post();
					$content = get_the_content();
				endwhile; 
			}

		?>

		<div id="hnContainer">

			<div class="swiper-container">

				<div class="swiper-wrapper">

					<?php foreach($blog as $listItem){ ?>

						<div class="swiper-slide">
							
							<div class="nlSlide effect2">
								<div class="bgImage" style="background-image: url('<?php echo $listItem['postImg'];?>')" ></div>
								<img src="<?php echo $listItem['postImg'];?>" class="imageAbove" alt="<?php echo $listItem['postAlt'];?>" />
							</div>

							<div class="nRSlide effect2">
								<div class="rel">
									<?php //echo $listItem['title'];?>
									<?php //echo $listItem['excerpt'];?>

									<?php echo $listItem['content'];?>

									<!--<span class="newsTitle"><?php echo $listItem['title'];?></div>
									<div><?php echo $listItem['excerpt'];?></div>
									<div class="swiper-pagination"></div>-->
								</div>
							</div>

							<div class="clear"></div>

						</div>

					<?php }?>

				</div>

			</div>

			<?php if($blogTotal > 1) {?>

				<style type="text/css">
					
					/* IN ORDER TO MAKE THE TEXT AND THE CONTENT ON THE RIGHT DISAPPEAR */
					#hnContainer .swiper-slide .nRSlide{
						opacity: 0;
						filter: alpha(opacity=0);
					}

					#hnContainer .swiper-slide-active .nRSlide{
						opacity: 1;
						filter: alpha(opacity=100);
					}
					
				</style>

				<script type="text/javascript">

					var blogSlider;

				    $(document).ready(function(){

				    	blogSlider = new Swiper('#hnContainer .swiper-container',{
							speed: 1100,
							autoplay: {
								delay: 4000,
								disableOnInteraction: false,
							},
							pagination: {
					        	el: '.swiper-pagination',
					        	clickable: true,
					        },
							//preloadImages: true,
							//lazy: false,
							effect: 'fade',
							autoHeight: true,
							roundLengths: true,
							loop: true
						});

				    });

				    $(window).on('load', function(){ // WAITS TILL THE WHOLE PAGE LOADS
						blogSlider.update();
					});

					$(window).resize(function() {
						blogSlider.update();
					});

				</script>

			<?php }?>

		</div><!-- END OF HNCONTAINER -->

	</div><!-- END OF HOME NEW SECTION -->


	<div id="hclContainer">
		
		<?php
			$hcTitle = 'All Your Faves...';
			$titleTemp = get_field('home_client_title');

			if($titleTemp != '' && $titleTemp != NULL){
				$hcTitle = $titleTemp;
			}

			$clientLogos = get_field('client_logos');
		?>

		<div class="xchngTitles"></div>

		

		<div id="hclWrapper">
			
			<h3><?php echo $hcTitle?></h3>

			<div class="swiper-container" dir="rtl">
				
				<div class="swiper-wrapper">
					
					<?php 
						foreach($clientLogos as $logos):
							$logoImg = $logos['url'];
							$logoAlt = $logos['alt'];
							if(wp_is_mobile()){
								$logoImg = $logos['sizes']['medium_large'];
							}
					?>

						<div class="swiper-slide">
							
							<img class="placement" src="<?php echo get_template_directory_uri();?>/images/logoPlacement.png" alt="<?php echo $defaultAlt;?>" />

							<div class="bgImage" style="background-image: url('<?php echo $logoImg;?>');"></div>

							<img class="imageAbove" src="<?php echo $logoImg;?>" alt="<?php echo $logoAlt;?>" />

						</div>

					<?php endforeach;?>

				</div>

			</div>

		</div>

		<script type="text/javascript">
						
			var clientSwiper;
			var width = $(window).width();

			$(document).ready(function(){

				width = $(window).width();

				clientSwiper = new Swiper('#hclWrapper .swiper-container',{
					speed: 1100,
					//centeredSlides: true,
					autoplay: {
						delay: 4000,
						disableOnInteraction: false,
						reverseDirection: true,
					},
					breakpoints: {
					    // when window width is >= 320px
					    533: {
					      slidesPerView: 1,
					      //spaceBetween: 40
					    },
					    // when window width is >= 480px
					    768: {
					      slidesPerView: 2,
					      //spaceBetween: 70
					    },
					    // when window width is >= 640px
					    980: {
					      slidesPerView: 3,
					      //spaceBetween: 70
					    },
					    1024: {
					      slidesPerView: 4,
					      //spaceBetween: 80
					    },
					    1200: {
					      slidesPerView: 5,
					      //spaceBetween: 80
					    }
					},
					autoHeight: true,
					roundLengths: true,
					// Disable preloading of all images
				    preloadImages: false,
				    // Enable lazy loading
				    lazy: true,
					loop: true
				});

			});

			$(window).on('load', function(){ // WAITS TILL THE WHOLE PAGE LOADS
				//clientSwiper.update();
			});

			$(window).resize(function() {
				width = $(window).width();
				
				clientSwiper.update();
			});


		</script>


	</div><!-- END OF HCLCONTAINER -->

	<?php
		$hbTitle = 'All In One Place.';
		$hbTemp = get_field('home_footer_title');

		if($hbTemp != '' && $hbTemp != NULL){
			$hbTitle = $hbTemp;
		} 
	?>

	<div id="hbContact">
		<div id="hbTitle">
			<h4><?php echo $hbTitle;?></h4>
		</div>

		<?php
			$footerTop = get_field('footer_top_display');
			if($footerTop == 'yes'){
				get_sidebar('leasing');
			}
		?>
	</div><!-- END OF HBCONTACT -->

	<?php if(have_rows('home_footer_banner')){ ?>

		<div id="hbtmBnner">
			
			<?php
				$pmcLogo = get_template_directory_uri().'/images/fuqua-logo-white.png';
				$pmclAlt = $defaultAlt;
				$tempLogo;

				$pmcText; 
				while(have_rows('home_footer_banner')){
					the_row();

					$pmcText = get_sub_field('footer_banner_left_text'); 

					$tempLogo = get_sub_field('footer_banner_right_image');
					if($tempLogo != '' && $tempLogo != NULL){
						$pmcLogo = $tempLogo['url'];
						if(wp_is_mobile()){
							$pmcLogo = $tempLogo['sizes']['medium_large'];
						}
						$pmclAlt = $tempLogo['alt'];
					}

			?>

				<div id="hbnnerRight">
				
					<div class="rel">
						<img src="<?php echo $pmcLogo;?>" alt="<?php echo $pmclAlt;?>" />
					</div>

				</div>

				<div id="hbnnerLeft">
					<div class="rel">
						<?php echo $pmcText;?>
					</div>
				</div>

				<div class="clear"></div>

			<?php }?>

		</div><!-- END OF HBTMBNNER -->

	<?php }?>

</div><!-- END OF HOME WRAPPER -->

<?php get_footer(); ?>
