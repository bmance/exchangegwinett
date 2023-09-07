<?php
/**
 * Template Name: Live
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage ExchangeGwinnett
 * @since 1.0
 */

get_header(); ?>


<?php
	$blogTitle = get_bloginfo('name');
	$slideAlt = $blogTitle;
	$defaultAlt = $blogTitle;
	
	$dfeatures = get_field('featured_directories');

	$dirfatitle = get_field('featured_directory_title');
	$dirSortitle = get_field('directory_category_title');

	$uniAllbtn = 'All Dining';
	$uaTemp = get_field('universal_directory_all_button_text','options');
	if($uaTemp != '' && $uaTemp != NULL){
		$uniAllbtn = $uaTemp;
	}

	$catAllbtn = $uniAllbtn;
	$tempAllbtn = get_field('cateogry_all_button');
	if($tempAllbtn != '' && $tempAllbtn != NULL){
		$catAllbtn = $tempAllbtn;
	}


	$dcatList = array(array()); //CHOSEN CATEGORY BUTTONS
	$termsList;  //FOR THE TERMS ID FOR THE QUERY
	$terms = get_field('directory_categories');


	$xclgallery = get_field('live_gallery');



?>


<div id="dirlvTop">
	
	<?php
		$pageTitle = get_the_title();
		if($pageTitle != '' && $pageTitle != NULL){
	?>
		<h1><?php echo $pageTitle;?></h1>

	<?php }?>

	<?php
		if(have_posts()){
			while(have_posts()):
				the_post();
				the_content();
			endwhile;
		}
	?>

	<?php
		$xchgcoDisplay = get_field('display_callout');
		$xchngcoImg = get_template_directory_uri().'/images/xchangeDefault.jpg';
		$cotImg = get_field('callout_left_image');
		$coAlt = $defaultAlt;

		if($cotImg != '' && $cotImg != NULL){
			$xchngcoImg = $cotImg['url'];
			if(wp_is_mobile()){
				$xchngcoImg = $cotImg['sizes']['medium_large'];
			}
			$coAlt = $cotImg['alt'];
		}

		$colType = get_field('callout_link_type');
		$coLink = get_field('callout_link');
		$colCustom;

		if($colType == 'external'){
			$colCustom = 'target="_blank"';
		}else if($colType == 'video'){
			$colCustom = 'data-fancybox=""';
		}else if($colType == 'iframe'){
			$colCustom = 'data-fancybox=""';
		}else{
			$colCustom = '';
		}

		$lftSubtitle = get_field('callout_left_sub_title');
		$lftMtitle = get_field('callout_left_main_title');

		$rghtSubtle = get_field('callout_right_title');
		$rghtTxt = get_field('callout_right_text');
	?>

	<?php if($xchgcoDisplay == 'yes'){ ?>

		<div class="xchngCllouts">
			<?php if($coLink != '' && $coLink != NULL){ ?>
				<a href="<?php echo $coLink;?>" <?php echo $colCustom;?>>
			<?php }?>
			<div id="xchgcoLft">
				<img class="imageAbove" src="<?php echo $xchngcoImg;?>" alt="<?php echo $coAlt;?>" />
				<div class="bgImage" style="background-image: url('<?php echo $xchngcoImg;?>');"></div>
				<div class="xchgcoltxt">
					<?php if($lftSubtitle != '' && $lftSubtitle != NULL){?>
						<span class="xchcorTitles"><?php echo $lftSubtitle;?></span>
					<?php }?>
					<?php if($lftMtitle != '' && $lftMtitle != NULL){?>
						<span class="xchgcorSubtxt"><?php echo $lftMtitle;?></span>
					<?php }?>
				</div>
			</div>
			<div id="xchgcoRght" class="effect2" style="background-image: url('<?php echo get_template_directory_uri();?>/images/dirleftbckgrd.jpg');">
				<div id="xchncorInner">
					<div class="rel">
						<?php if($rghtSubtle != '' && $rghtSubtle != NULL){?>
							<span class="xchcorTitles"><?php echo $rghtSubtle;?></span>
						<?php }?>
						<?php if($rghtTxt != '' && $rghtTxt != NULL){?>
							<span class="xchcorTxt"><?php echo $rghtTxt;?></span>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<?php if($coLink != '' && $coLink != NULL){ ?>
				</a>
			<?php }?>
		</div><!-- END OF DIRCLLOUT -->

	<?php }?>

</div><!-- END OF DIRLVTOP -->

<?php if($xclgallery){ ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shuffle.js"></script>

	<?php

	?>

	<div id="xdgContainer">


		<div id="xchlvGal" class="grid">
			
			<?php
				$j = 1; 
				foreach($xclgallery as $listtem){ 
					$galImage = $listItem['url'];
					if(wp_is_mobile()){
						$galImage = $listItem['sizes']['medium_large'];
					}
					$galAlt = $listItem['alt'];
			?>

				<div id="xlvgItem<?php echo $j;?>" class="xlvgItems itemCols">
					<a href="<?php echo $galImage;?>" data-fancybox="images">
						<img src="<?php echo $galImage;?>" alt="<?php echo $galAlt;?>" />
					</a>
				</div><!-- END OF XLVGITEM -->

			<?php 
					$j++;
				}
			?>
			
			<div class="itemCols sizer"></div>

		</div><!-- END OF XCHNGDLIST -->

	</div><!-- END OF XCHNGDIRCONTAINER -->


	<script type="text/javascript">

		var Shuffle = window.Shuffle;
		var element = document.querySelector('.grid');
		var sizer = element.querySelector('.sizer');
		var winWidth = $(window).width();
		var winHeight = $(window).height();

		var shuffleInstance = new Shuffle(element, {
		  itemSelector: '.xlvgItems',
		  columnWidth: 0,
		  sizer: sizer // could also be a selector: '.my-sizer-element'
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


<?php }?>

<?php
	$footerTop = get_field('footer_top_display');
	if($footerTop == 'yes'){
		get_sidebar('leasing');
	}
?>

<?php get_footer(); ?>
