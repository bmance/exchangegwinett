<?php
/**
 * Template Name: Directory Category
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage ExchangeGwinnett
 * @since 1.0
 */

get_header(); ?>


<?php
	$catSize;
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
	if( $terms ): ?>
		<?php $i = 0; ?>
		<?php foreach( $terms as $term ): ?>

			<?php 
				//FOR GENERATING THE POST LIST 
				if($i > 0){
					$termsList .= ', '.$term->term_id; 
				}else{
					$termsList .= $term->term_id; 
				}
				
				//FOR CREATING THE CHOSEN CATEGORY BUTTONS
				$dcatList[$i]['catNames'] = $term->name;
				$dcatList[$i]['catSlug'] = $term->slug;

				$i++;
			?>

		<?php endforeach; ?>

	<?php endif; ?>

<?php
	$catSize = sizeof($dcatList);	
?>


<div id="dircatTop">
	
	<?php
		$pageTitle = get_field('page_title');
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
		$dircoDisplay = get_field('display_callout');
		$dircoImg = get_template_directory_uri().'/images/xchangeDefault.jpg';
		$cotImg = get_field('callout_left_image');
		$coAlt = $defaultAlt;

		if($cotImg != '' && $cotImg != NULL){
			$dircoImg = $cotImg['url'];
			if(wp_is_mobile()){
				$dircoImg = $cotImg['sizes']['medium_large'];
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

	<?php if($dircoDisplay == 'yes'){ ?>

		<div id="dirCllout">
			<?php if($coLink != '' && $coLink != NULL){ ?>
				<a href="<?php echo $coLink;?>" <?php echo $colCustom;?>>
			<?php }?>
			<div id="drcLft">
				<img class="imageAbove" src="<?php echo $dircoImg;?>" alt="<?php echo $coAlt;?>" />
				<div class="bgImage" style="background-image: url('<?php echo $dircoImg;?>');"></div>
				<div class="drlftxt">
					<?php if($lftSubtitle != '' && $lftSubtitle != NULL){?>
						<span class="drTitles"><?php echo $lftSubtitle;?></span>
					<?php }?>
					<?php if($lftMtitle != '' && $lftMtitle != NULL){?>
						<span class="drSubtxt"><?php echo $lftMtitle;?></span>
					<?php }?>
				</div>
			</div>
			<div id="drcRght" class="effect2" style="background-image: url('<?php echo get_template_directory_uri();?>/images/dirleftbckgrd.jpg');">
				<div id="drcInner">
					<div class="rel">
						<?php if($rghtSubtle != '' && $rghtSubtle != NULL){?>
							<span class="drTitles"><?php echo $rghtSubtle;?></span>
						<?php }?>
						<?php if($rghtTxt != '' && $rghtTxt != NULL){?>
							<span class="drghTxt"><?php echo $rghtTxt;?></span>
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


</div><!-- END OF DIRCATTOP -->

<div class="xchngTitles">
	<?php if($dirfatitle != '' && $dirfatitle != NULL){?>
		<h2><?php echo $dirfatitle;?></h2>
	<?php }?>
</div><!-- END OF XCHNGTITLES -->

<div id="dircatFA">

	<?php
		$i = 0;
		$totalFA;
		$dfabTxt = 'See More';
		$dftemp = get_field('featured_directory_button_text');
		if($dftemp != '' && $dftemp != NULL){
			$dfabTxt = $dftemp;
		}
	?>

	<div class="swiper-container">

		<div class="swiper-wrapper">

			<?php foreach($dfeatures as $features): ?>

				<?php
					// Setup this post for WP functions (variable must be named $post).
					//setup_postdata($features);

					
					$dfaLink = get_permalink( $features->ID );


					$dfaImg = get_field('directory_featured_image',$features->ID);
					$dfaTtle = get_field('directory_featured_title',$features->ID);
					$dfaTxt = get_field('directory_featured_text',$features->ID);
					$dfaLnk = get_field('directory_featured_link',$features->ID);

					//FOR CUSTOM FEATURE DIRECTORY TITLE
					if($dfaTtle != '' && $dfaTtle != NULL){
						$dfaTitle = $dfaTtle;
					}else{
						$dfaTitle = get_the_title( $features->ID );
					}

					//FOR CUSTOM FEATURE DIRECTORY LINK
					if($dfaLnk != '' && $dfaLnk != NULL){
						$dfaLink = $dfaLnk;
					}else{
						$dfaLink = get_permalink( $features->ID );
					}

					//FOR CUSTOM FEATURE DIRECTORY IMAGE
					if($dfaImg != '' && $dfaImg != NULL){
						$dfaFeaturedImage = $dfaImg['url'];
						if(wp_is_mobile()){
							$dfaFeaturedImage = $dfaImg['sizes']['medium_large'];
						}
						$faAlt = $dfaImg['alt'];
					}else{
						$dfaFeaturedImage = get_the_post_thumbnail_url($features->ID);
						if(wp_is_mobile()){
							$dfaFeaturedImage = get_the_post_thumbnail_url($features->ID,'medium_large');
						}
						$faAlt = get_the_post_thumbnail_caption();
					}
					if (!$dfaFeaturedImage) {
						//set default image when post has no featured image
						$dfaFeaturedImage = get_template_directory_uri().'/images/dirDefault.jpg';
					}

					if($faAlt == '' || $faAlt == NULL) {
					    $faAlt = get_the_title();
					}

				?>

				<div class="swiper-slide">
					
					<div class="dLSlide">
						<div class="bgImage" style="background-image: url('<?php echo $dfaFeaturedImage;?>')" ></div>
						<img src="<?php echo $dfaFeaturedImage;?>" class="imageAbove" alt="<?php echo $faAlt;?>" />
					</div>

					<div class="dRSlide">

						<div class="rel">
							<span class="dTitles"><?php echo $dfaTitle?></span><br/>
							<div class="dTxt">
								<?php echo $dfaTxt;?>
							</div>

							<a class="dfaBtns xchngBtns" href="<?php echo $dfaLink;?>">
								<?php echo $dfabTxt;?>
							</a>

							<div class="dfpBlock">
								<div class="swiper-pagination"></div>
							</div>

						</div>

					</div>

					<div class="clear"></div>

				</div>

			<?php 
					$i++;
				endforeach;
				$totalFA = $i;
			?>

		</div>

	</div>

	<?php //wp_reset_postdata(); ?>

	<?php //var_dump($dfeatures);?>

	<?php if($totalFA > 1) {?>

		<style type="text/css">
			#dircatFA .swiper-slide{
				z-index: 998 !important;
			}

			#dircatFA .swiper-slide-active{
				z-index: 999 !important;
			}

			/* IN ORDER TO MAKE THE TEXT AND THE CONTENT ON THE RIGHT DISAPPEAR */
			#dircatFA .swiper-slide{
				opacity: 0 !important;
				filter: alpha(opacity=0) !important;
			}

			#dircatFA .swiper-slide-active{
				opacity: 1 !important;
				filter: alpha(opacity=100) !important;
			}
		</style>

		<script type="text/javascript">

			var dfaSlider;

		    $(document).ready(function(){

		    	dfaSlider = new Swiper('#dircatFA .swiper-container',{
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
				dfaSlider.update();
			});

			$(window).resize(function() {
				dfaSlider.update();
			});

		</script>

	<?php }?>

</div><!-- END OF DIRCATFA -->

<div class="xchngTitles">
	<?php if($dirSortitle != '' && $dirSortitle != NULL){?>
		<h3><?php echo $dirSortitle;?></h3>
	<?php }?>
</div><!-- END OF XCHNGTITLES -->

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shuffle.js"></script>

<?php

	$pageTitle = get_the_title();

	$cuName = htmlspecialchars($_GET["category"]);

	$i = 0;
	$j = 0;
	$k = 0;
	$dirList = array(array());
	$catList = array();
	$catSlug = array();
	$catgList = array(array());

	$args = array('post_type' => 'directories', 'cat' => $termsList, 'posts_per_page' => -1, 'orderby'=>'date', 'order'=>'DESC');

	$cats = get_categories($args);

	$list_of_posts = new WP_Query( $args );
	//sort($list_of_posts);
	while ( $list_of_posts->have_posts() ) :
		
		$list_of_posts->the_post();

		$category = get_the_terms($post->ID, 'category');
		$terms_string = join(', ', wp_list_pluck($category, 'name'));

		foreach($category as $cat){ //CREATES THE CATEGORY LIST FOR POST
			if(in_array($cat->name, $catList)) {
				continue;
			}else{
				$catList[$j] .= $cat->name;

				$catgList[$j]['catNames'] .= $cat->name;
				$catgList[$j]['catSlug'] .= $cat->slug;
				$j++;
			}
		}
		
		//SORTS THE CATEGORIES FOR THE BUTTONS
		array_multisort($catgList);

		$post_categories = get_the_terms( $post->ID, 'category' );
		if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
		    //$dirList[$i]['cateSeparate'] = wp_list_pluck( $post_categories, 'name' );
		    $dirList[$i]['catNames'] = join(', ', wp_list_pluck($post_categories, 'name'));
		    //TO REMOVE ALL INSTANCES OF ALL DINING FROM THE DIR CAT TITLES
		    $dirList[$i]['catNames'] = str_replace("All Dining, ","",$dirList[$i]['catNames']);
		}


		//FOR THE CATEGORY LIST
		$dirList[$i]['postTerms'] = '"all"';
		$dirList[$i]['ctList'] = 'all';

		$termList = wp_get_object_terms( $post->ID,  'category' );

		if ( ! empty( $termList ) ) {
		    if ( ! is_wp_error( $termList ) ) {	       
		    	foreach( $termList as $term ) {
		     		//$dirList[$i]['termList2'] .= esc_html( $term->name );
		     		$dirList[$i]['postTerms'] .= ',"'.esc_html( $term->slug ).'"';
		     		$dirList[$i]['ctList'] .= ' / '.esc_html( $term->name );
		        }
		    }
		}

		$dirList[$i]['subText'] = get_field('directory_subtext');
		if($dirList[$i]['subText'] == '' || $dirList[$i]['subText'] == NULL){
			$dirList[$i]['subText'] = 'Visit';
		}

		$dirList[$i]['postLink'] = get_post_permalink();
		$dirList[$i]['title'] = get_the_title();
		$dirList[$i]['postAlt'] = $pcthLogo_Alt;
		$dirList[$i]['postImg'] = get_template_directory_uri().'/images/dirDefault.jpg';

		if(has_post_thumbnail()){
			$dirList[$i]['postImg'] = get_the_post_thumbnail_url();
			if(wp_is_mobile()){
				$dirList[$i]['postImg'] = get_the_post_thumbnail_url($post->ID,'medium_large');
			}
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
			if($dirList[$i]['postImg'] == ''){
				$dirList[$i]['postImg'] = get_template_directory_uri().'/images/dirDefault.jpg';
			}
			//$dirList[$i]['postAlt'] = get_bloginfo('name');
			if($alt != ''){
				//$dirList[$i]['postAlt'] = esc_html ( $alt );
			}else{
				//$dirList[$i]['postAlt'] = $pcthLogo_Alt;
			} 
		}

		$i++;

	endwhile;

	$total = $i;

	wp_reset_postdata();

?>

<div id="xchngdirContainer">

	<div id="directBtns">
		
		<a id='allBtn' class="dirCategories" data-group="all" href="javascript:updateDirct('all','allBtn');">
			<?php echo $catAllbtn;?><br/>
		</a>

		<?php if($catSize > 1){//FOR MULTIPLE SELECTED CATEGORIES ?>

			<?php
				$i = 1;
				foreach($dcatList as $category){
					$catItem = $category['catSlug'];
			?>

				<a id="<?php echo $catItem;?>Btn" class="dirCategories" data-group="<?php echo $catItem;?>" href="javascript:updateDirct('<?php echo $catItem;?>','<?php echo $catItem;?>Btn');"><?php echo $category['catNames'];?></a>

			<?php
					$i++;
				}
			?>

		<?php }?>

	</div><!-- END OF DIRECTBTNS -->

	<div style="position:relative;" class="slctContainer" id="dirSelect">
		<select id="dircatSelect" class="catSelect" onChange="updateDirct(this.value);">
			<option value="all"><?php echo $catAllbtn;?></option> 
            <?php foreach($catgList as $category){ ?>
            <option value="<?php echo $category['catSlug'];?>"><?php echo $category['catNames'];?></option>
            <?php }?>
        </select>  
	</div>


	<div id="xchngDlist" class="grid">
		
		<?php
			$j = 1; 
			foreach($dirList as $listItem){ 
		?>

			<div id="dirItem<?php echo $j;?>" class="dirItems itemCols" data-groups='[<?php echo $listItem['postTerms'];?>]'>
				<a href="<?php echo $listItem['postLink'];?>">
					<div class="flexCenter">
						<div class="bgImage effect2" style="background-image: url('<?php echo $listItem['postImg'];?>');"></div>
						<img class="imageAbove" src="<?php echo $listItem['postImg'];?>" alt="<?php echo $listItem['postAlt'];?>" />
						<div class="dirItemtxt rel">
							<span class="dirCat"><?php echo $listItem['catNames'];?></span>
							<span class="dirName"><?php echo $listItem['title'];?></span>
							<span class="dirSubtxt"><?php echo $listItem['subText'];?></span>
						</div><!-- END OF DIRITEMTXT -->
					</div>
				</a>
			</div><!-- END OF DIRITEM -->

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
	  itemSelector: '.dirItems',
	  columnWidth: 0,
	  sizer: sizer // could also be a selector: '.my-sizer-element'
	});

	$(document).ready(function(){
		winWidth = $(window).width();
		winHeight = $(window).height();
		//updateDirct('all','allBtn');
		<?php if($_GET['category'] == true){ ?>

			updateDirct('<?php echo $cuName;?>');

		<?php }else{ ?>

			dirctSet('all');

		<?php }?>
		shuffleInstance.update();
	});

	function updateDirct(category){
		$('#directBtns a').removeClass('active');
		$('#dircatSelect').val(category);
		shuffleInstance.filter(category);
		$('#'+category+'Btn').addClass('active');
		if(winWidth < 768){
			//$('html, body').animate({'scrollTop': $(window).height()}, 1000);
			//alert(topContainheight);
			$('html, body').animate({scrollTop: $('#xchngDlist').offset().top - 137 }, 'slow');
		}
	}

	function dirctSet(category){
		$('#directBtns a').removeClass('active');
		$('#dircatSelect').val(category);
		shuffleInstance.filter(category);
		$('#'+category+'Btn').addClass('active');
	}

	$(window).resize(function(){
		shuffleInstance.update();
	});

</script>

<?php
	$footerTop = get_field('footer_top_display');
	if($footerTop == 'yes'){
		get_sidebar('leasing');
	}
?>

<?php get_footer(); ?>
