<?php
/**
 * The template for displaying single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header(); ?>

<?php
	$dirTitle = get_the_title();
	$defaultAlt = $dirTitle;
?>

<?php
	$dirGallery = get_field('directory_gallery');

	$unidLink = '/directory';
	$udlTemp = get_field('universal_directory_page_link','options');
	if($udlTemp != '' && $udlTemp != NULL){
		$unidLink = $udlTemp;
	}

	$unidText = 'See Full Directory';
	$udtTemp = get_field('universal_directory_page_link_text','options');
	if($udtTemp != '' && $udtTemp != NULL){
		$unidText = $udtTemp;
	}

	$dirHeader = get_template_directory_uri().'/images/xchangeDefault.jpg';
	$dirAlt = $defaultAlt;
	$dirLogo;
	$dirlAlt;

	$dirhTemp;
	$dtClass = 'dftMde';

	if(have_rows('directory_top')){
		while(have_rows('directory_top')):
			the_row();
			$dirhTemp = get_sub_field('directory_header_image');
			$dirLogo = get_sub_field('directory_logo'); 
		endwhile;
	}

	if($dirhTemp != '' && $dirhTemp != NULL){
		$dirHeader = $dirhTemp['url'];
		if(wp_is_mobile()){
			$dirHeader = $dirhTemp['sizes']['medium_large'];
		}
		$dirAlt = $dirhTemp['alt'];
	}

	if($dirhTemp != '' && $dirhTemp != NULL){
		$dirHeader = $dirhTemp['url'];
		if(wp_is_mobile()){
			$dirHeader = $dirhTemp['sizes']['medium_large'];
		}
		$dirAlt = $dirhTemp['alt'];
	}

	$logoImg = $dirLogo['url'];
	if(wp_is_mobile()){
		$logoImg = $dirLogo['sizes']['medium_large'];
	}
	$logoAlt = $dirLogo['alt'];

	if($dirLogo != '' && $dirLogo != NULL){
		$dtClass = 'lgMde';
	}
?>

<div id="dirTop" class="<?php echo $dtClass;?>">
	
	<div class="bgImage" style="background-image: url('<?php echo $dirHeader;?>');"></div>
	<img class="imageAbove" src="<?php echo $dirHeader;?>" alt="<?php echo $dirlAlt;?>" />

	<?php if($dirLogo != '' && $dirLogo != NULL){ ?>
		<div id="directLogo">
			<img src="<?php echo $logoImg;?>" alt="<?php echo $logoAlt;?>" />
		</div>
	<?php }?>

</div><!-- END OF DIRTOP -->

<div id="dmWrapper">

	<div id="dirMid">
		
		<?php
			$dirAdvisi = get_field('display_address');
			$dirAddress = get_field('directory_address');
			$dirCity = get_field('directory_city');
			$dirState = get_field('directory_state');
			$dirZip = get_field('directory_zip_code');

			$dirPhone = get_field('directory_phone');
			$dirHours = get_field('directory_hours');

			$dirWeb = get_field('directory_website');
			$webFormat = 'http://';
			$pos = strpos($dirWeb, $webFormat);

			/*if ($pos === false) {
				$dirWeb = 'http://'.$dirWeb;
			}*/

			$dcpTxt = 'See In Directory';
			$tcpTxt = get_field('directory_category_page_text');
			if($tcpTxt != '' && $tcpTxt != NULL){
				$dcpTxt = $tcpTxt;
			}

			$dcpLink = '/directory';
			$tcpLink = get_field('directory_category_page_link');
			if($tcpLink != '' && $tcpLink != NULL){
				$dcpLink = $tcpLink;
			}
		?>

		<div id="dirlftInfo">

			<div class="rel">

				<h1><?php echo $dirTitle;?></h1>

				<?php if($dirAdvisi == 'yes'){ ?>
					<div class="infoSecs">
						<span class="dinfoTtles">Address</span>
						<span><?php echo $dirAddress;?></span><br/>
						<span><?php echo $dirCity;?></span><span>, <?php echo $dirState;?></span><span>, <?php echo $dirZip;?></span>
					</div>
				<?php }?>

				<?php if($dirPhone != '' && $dirPhone != NULL){?>
					<div class="infoSecs">
						<span class="dinfoTtles">Phone</span>
						<span>
							<a href="tel:<?php echo $dirPhone;?>"><?php echo $dirPhone;?></a>
						</span>
					</div>
				<?php }?>

				<?php if($dirHours != '' && $dirHours != NULL){?>
					<div class="infoSecs">
						<span class="dinfoTtles">Hours</span>
						<span><?php echo $dirHours;?></span>
					</div>
				<?php }?>

				<?php if(have_rows('directory_social_media')){ ?>
					<div class="isContainer">
						<?php 
							while(have_rows('directory_social_media')){
								the_row();
								$disImg = get_sub_field('image');
								$disAlt = $disImg['alt'];
								if(wp_is_mobile()){
									$disImg = $disImg['sizes']['medium_large'];
								}else{
									$disImg = $disImg['url'];
								}
								$disType = get_sub_field('social_type');
								$disLink = get_sub_field('social_link');
						?>
						<span class="dcsicons">
							<?php if($disLink != '' && $disLink != NULL){ ?>
								<a href="<?php echo $disLink;?>" target="_blank">
							<?php }?>

								<?php if($disImg != '' && $disImg != NULL){?>
									<img src="<?php echo $disImg;?>" alt="<?php echo $disAlt;?>" />
								<?php }else{ ?>
									<i class="icon-<?php echo $disType;?>"></i>
								<?php }?>

							<?php if($disLink != '' && $disLink != NULL){ ?>
								</a>
							<?php }?>
						</span>
						<?php
							} 
						?>
					</div>
				<?php }?>

				<?php if($dirWeb != '' && $dirWeb != NULL){ ?>
					<div class="dibWrappers">
						<a class="dinfBtns xchngBtns" href="<?php echo $dirWeb;?>" target="_blank">
							Website
						</a>
					</div>
				<?php }?>

				<div class="dibWrappers">
					<a class="dinfBtns xchngBtns" href="<?php echo $dcpLink;?>">
						<?php echo $dcpTxt;?>
					</a>
				</div>

			</div>

		</div><!-- END OF DIRLFTINFO -->

		<div id="diRghtxt">
			<div class="rel">
				<?php
					if(have_posts()){
						while(have_posts()):
							the_post();
							the_content();
						endwhile;
					}
				?>
			</div>
		</div><!-- END OF DIRGHTXT -->

		<div class="clear"></div>

	</div><!-- END OF DIRMIDINFO -->

	<?php if($dirGallery){ ?>

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shuffle.js"></script>

		<div id="dirBtmn">
			
			<div id="dirgWrapper" class="grid">
				
				<?php
					$k = 1; 
					foreach($dirGallery as $gallery):
						$drGallery = $gallery['url'];
						$drGAlt = $gallery['alt'];
						if(wp_is_mobile()){
							$drGallery = $gallery['sizes']['medium_large'];
						} 
				?>

					<div id="dgItem<?php echo $j;?>" class="dgItems itemCols">
						<a href="<?php echo $drGallery;?>" data-fancybox="images">
							<img src="<?php echo $drGallery;?>" alt="<?php echo $drGAlt;?>" />
						</a>
					</div>

				<?php
						$k++; 
					endforeach; 
				?>

				<div class="itemCols sizer"></div>

			</div>

		</div><!-- END OF DIRBTM -->

		<script type="text/javascript">
			
			var Shuffle = window.Shuffle;
			var element = document.querySelector('.grid');
			var sizer = element.querySelector('.sizer');
			var winWidth = $(window).width();
			var winHeight = $(window).height();

			var shuffleInstance = new Shuffle(element, {
			  itemSelector: '.dgItems',
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

	<div id="dbmbWrapper" class="dibWrappers">
		<a class="dinfBtns xchngBtns" href="<?php echo $unidLink;?>">
			<?php echo $unidText;?>
		</a>
	</div>

</div><!-- END OF DMWRAPPER -->

<?php get_footer(); ?>
