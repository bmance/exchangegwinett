<?php
/**
 * Template Name: Directory
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage ExchangeGwinnett
 * @since 1.0
 */

/*$blogTitle = get_bloginfo('name');
$slideAlt = $blogTitle;

$directMap = '';
$directMap = get_field('directory_map_shortcode');*/

get_header(); ?>

<?php
	$blogTitle = get_bloginfo('name');
	$slideAlt = $blogTitle;

	$directMap = '';
	$directMap = get_field('directory_map_shortcode'); 
?>

<div id="dirHeader">
	<?php echo do_shortcode($directMap); ?>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shuffle.js"></script>

<?php

	$pageTitle = get_the_title();
	$uniAllbtn = 'All';
	$uaTemp = get_field('universal_directory_all_button_text','options');
	if($uaTemp != '' && $uaTemp != NULL){
		$uniAllbtn = $uaTemp;
	}


	$cuName = htmlspecialchars($_GET["category"]);

	$i = 0;
	$j = 0;
	$k = 0;
	$dirList = array(array());
	$catList = array();
	$catSlug = array();
	$catgList = array(array());

	$args = array('post_type' => 'directories', 'posts_per_page' => -1, 'orderby'=>'date', 'order'=>'DESC');

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

<div id="xchngdirTop">
	
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

<div id="xchngdirContainer">

	<div id="directBtns">
		
		<a id='allBtn' class="dirCategories" data-group="all" href="javascript:updateDirct('all','allBtn');">
			<?php echo $uniAllbtn;?>
		</a>

		<?php
			$i = 1;
			foreach($catgList as $category){
				$catItem = $category['catSlug'];
		?>

			<a id="<?php echo $catItem;?>Btn" class="dirCategories" data-group="<?php echo $catItem;?>" href="javascript:updateDirct('<?php echo $catItem;?>','<?php echo $catItem;?>Btn');"><?php echo $category['catNames'];?></a>

		<?php
				$i++;
			}
		?>

	</div><!-- END OF DIRECTBTNS -->

	<div style="position:relative;" class="slctContainer" id="dirSelect">
		<select id="dircatSelect" class="catSelect" onChange="updateDirct(this.value);">
			<option value="all"><?php echo $uniAllbtn;?></option> 
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
