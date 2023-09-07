<?php
/**
 * Template Name: Leasing
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage ExchangeGwinnett
 * @since 1.0
 */

get_header(); ?>

<?php
	$blogTitle = get_bloginfo('name');
	$pageTitle = get_the_title();
	$defaultAlt = $blogTitle;

	$lsCode = get_field('leasing_shortcode_field'); 
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

<div id="xlwrapper">
	
	<div id="xlTxt">

		<h1><?php echo $pageTitle;?></h1>

		<?php
			if(have_posts()){ 
				while(have_posts()):
					the_post();
					the_content();
				endwhile;
			}
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

	</div><!-- END OF XLTXT -->

	<?php if($lsCode != '' && $lsCode != NULL){?>
		<div id="xlshrtcde">
			<?php echo do_shortcode($lsCode); ?>
		</div>
	<?php }?>

</div>

<?php
	$footerTop = get_field('footer_top_display');
	if($footerTop == 'yes'){
		get_sidebar('leasing');
	}
?>

<?php get_footer(); ?>
