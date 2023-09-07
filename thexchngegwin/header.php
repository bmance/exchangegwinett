<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <!-- FAVICONS -->
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">

		<!-- APPLE TOUCH ICONS -->
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png" />

		<!-- SITE MANIFEST -->
		<link rel="manifest" href="/site.webmanifest">
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#00587c">
		<meta name="msapplication-TileColor" content="#00587c">
		<meta name="theme-color" content="#ffffff">

		<?php if(is_single()){ ?>
		<?php }else{ ?>
		<!-- RICH PREVIEW: thumbnail for when site is shared on social media -->
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
		<?php }?>

		<!-- JAVASCRIPT -->
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.5.1.js"></script>
		<script async type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

		<!-- SHUFFLE.JS -->
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/shuffle.js"></script>

		<!-- IDANGEROUS SWIPER SLIDE -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/swiper-slider/swiper-slide.css">
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/swiper-slider/swiper-slide.js"></script>

		<!-- FONT ICONS -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/font-icons/xchg-icons.css" media="none" onload="this.media='all';">

		<!-- ADOBE FONT IMPORT -->
		<link rel="stylesheet" href="https://use.typekit.net/ltb2eqy.css" media="none" onload="this.media='all';">

		<!-- GOOGLE MAPS API KEY -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAe1XURM8FoBra_VKupkfkgM4StpHK0pn0" defer></script>
		<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAe1XURM8FoBra_VKupkfkgM4StpHK0pn0&callback=initMap&libraries=&v=weekly" defer></script>-->

		<!-- FANCYBOX -->
		<script async type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.js"></script>
		<link href="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css">

		<?php if(get_field('google_analytics','options')){ 
			$gaID = get_field('google_analytics','options');
		?>

			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gaID;?>"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', '<?php echo $gaID;?>');
			</script>

		<?php }?>

		<?php if(get_field(' second_google_analytics_tracker','options')){ 
				$gaID2 = get_field(' second_google_analytics_tracker','options');
		?>

			<!-- Global site tag (gtag.js) - Google Analytics Second Tracker -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gaID2;?>"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', '<?php echo $gaID2;?>');
			</script>

		<?php }?>

		<?php if(get_field('google_tag_manager_id','options')){ 
			$gtagID = get_field('google_tag_manager_id','options');
		?>
			<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','<?php echo $gtagID;?>');</script>
			<!-- End Google Tag Manager -->
		<?php }?>


		<!-- CUSTOM HEADER CODE -->
		<?php if(get_field('custom_header_code','options')){?>
		
			<?php echo '<div class="invisContainer">'.get_field('custom_header_code','options').'</div>';?>
		
		<?php }?>
		<!-- CUSTOM HEADER CODE -->

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<!-- CUSTOM BODY CODE -->
		<?php if(get_field('custom_body_code','options')){?>
		
			<?php echo '<div class="invisContainer">'.get_field('custom_body_code','options').'</div>';?>
		
		<?php }?>
		<!-- CUSTOM BODY CODE -->

		<?php

			$defaultAlt = get_bloginfo('name');
			$homeUrl = get_home_url();

			//LOGO
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			if(wp_is_mobile()){
				$xchgLogo = wp_get_attachment_image_src( $custom_logo_id , 'medium_large' );
			}else{
				$xchgLogo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			}
			$xchgLogo = $xchgLogo[0];
			if($xchgLogo == '' || $xchgLogo == NULL){
				$xchgLogo = get_template_directory_uri().'/images/xchngEmblem.png';
			} 
		?>


<style type="text/css">
			


</style>

		<?php
			$menuClass = 'defaultMenu';
			$tmClass = 'defaultTp';
			$shClass = 'defaultSH';
			if(is_page_template('templates/directory.php')){
				$menuClass = 'directMenu';
				$tmClass = 'directTp';
				$shClass = 'directSH';
			}
		?>


		<header id="topContainer" class="<?php echo $tmClass;?>">
			
			<div id="tpWrapper" class="rel">

				<a href="<?php echo $homeUrl;?>" id="logoContainer">
					<div class="rel">
						<img src="<?php echo $xchgLogo;?>" alt="<?php echo $defaultAlt;?> Home Logo" title="<?php echo $defaultAlt;?> Home Logo" aria-label="<?php echo $defaultAlt;?> Logo" />
					</div>
				</a>

				<a id="menuButton" href="javascript:mobileMenu();">
					<div id="iconLines">
						<span class="menuLines"></span>
						<span class="menuLines"></span>
						<span class="menuLines"></span>
						<span class="clear"></span>
					</div>
					<span id="menuTxt" class="effect2"></span>
				</a>

				<div id="menuContainer" class="<?php echo $menuClass;?>">

					<div id="menuWrapper">

						<div class="rel">

							<?php wp_nav_menu(array('menu' => 'Main Menu'));?>

							<?php if(have_rows('social_media','options')){ ?>

								<div id="msmContainer" class="<?php echo $shClass;?>">
									<?php 
										while(have_rows('social_media','options')): 
											the_row();
											$msmType = get_sub_field('social_type');
											$msmLink = get_sub_field('social_link');
											$msmIcon = get_sub_field('image');

											if(wp_is_mobile()){
												$msmImg = $msmIcon['sizes']['medium_large'];
											}else{
												$msmImg = $msmIcon['url'];
											}

											$msmAlt = $msmIcon['alt'];
									?>

										<span class="msmIcons">

											<?php if($msmLink != '' && $msmLink != NULL){?>
											<a href="<?php echo $msmLink;?>">
											<?php }?>

												<?php if($msmIcon != '' && $msmIcon != NULL){?>
													<img src="<?php echo $msmImg;?>" alt="<?php echo $msmAlt;?>" />
												<?php }else{ ?>
													<i class="icon-<?php echo $msmType;?>"></i>
												<?php }?>

											<?php if($msmLink != '' && $msmLink != NULL){?>
											</a>
											<?php }?>

										</span>

									<?php
										endwhile;
									?>

								</div><!-- END OF MSMCONTAINER -->

							<?php }?>

							<div class="clear"></div>

						</div>

					</div><!-- END OF MENUWRAPPER -->


				</div><!-- END OF MENUWRAPPER -->

				<div class="clear"></div>

			</div>

		</header><!-- END OF TOPCONTAINER -->

		<?php 
			if(is_single()){
				
			}else{
				if(is_page_template('templates/directory.php')){
					//get_sidebar('directTop');
				}else{
					get_sidebar('topslider');
				}
			} 
		?>

		<main id="xchngWrapper" role="main">
