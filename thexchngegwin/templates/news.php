<?php
/**
 * Template Name: News
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
	$pageTitle = get_the_title(); 
?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shuffle.js"></script>

<?php
	$i = 0;
	$blogList = array(array());

	$args = array('posts_per_page' => -1, 'orderby'=>'date', 'order'=>'DESC');

	$cats = get_categories($args);

	$list_of_posts = new WP_Query( $args );
	//sort($list_of_posts);
	while ( $list_of_posts->have_posts() ) :
		
		$list_of_posts->the_post();

		$blogList[$i]['link'] = get_post_permalink();
		$blogList[$i]['postitle'] = get_the_title();
		$blogList[$i]['postDate'] = get_the_date( 'F j, Y' );
		
		$preview = get_field('news_post_excerpt');
		//$blogList[$i]['excerpt'] = get_field('news_post_excerpt').'...<a href="'.get_post_permalink().'">Read More</a>';
		$blogList[$i]['excerpt'] = substr($preview , 0, 200).'...<a href="'.get_post_permalink().'">Read More</a>';
		
		$blogList[$i]['postImg'];
		$thumbnail_id;
		$blogList[$i]['postAlt'] = get_bloginfo('name');
		$alt;

		if(has_post_thumbnail()){
			$blogList[$i]['postImg'] = get_the_post_thumbnail_url();
			if(wp_is_mobile()){
				$blogList[$i]['postImg'] = get_the_post_thumbnail_url($post->ID,'medium_large');
			}
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
			if($blogList[$i]['postImg'] == ''){
				$blogList[$i]['postImg'] = get_template_directory_uri().'/images/dirDefault.jpg';
			}

			if($alt != ''){
				$blogList[$i]['postAlt'] = esc_html ( $alt );
			}
		}

		$i++;

	endwhile;

	$total = $i;

	wp_reset_postdata();
?>

<style type="text/css">
	


</style>


<div id="nwsContainer">
	
	<div id="nwsTop">
		<h1><?php echo $pageTitle;?></h1>
		<?php
			if(have_posts()){
				while(have_posts()):
					the_post();
					the_content();
				endwhile;
			} 
		?>
	</div><!-- END OF NWSTOP -->

	<div id="nwsList" class="grid">
		
		<?php
			$i = 0;
			foreach ($blogList as $post):
		?>

			<div id="xpstItem<?php echo $i;?>" class="xpstItems itemCols">
				<a href="<?php echo $post['link'];?>">
					<div class="rel">
						<div class="pstiTop">
							<img src="<?php echo $post['postImg'];?>" alt="<?php echo $post['postAlt'];?>" />
						</div>
						<div class="pstiBtm">
							<div class="rel">
								<span class="pstiTtle"><?php echo $post['postitle'];?></span>
								<span class="pstiDate"><?php echo $post['postDate'];?></span>
								<div class="pstiContent"><?php echo $post['excerpt'];?></div>
							</div>
						</div>
					</div>
				</a>
			</div>

		<?php
				$i++; 
			endforeach;
		?>

		<div class="itemCols sizer"></div>

	</div><!-- END OF NWSLIST -->

</div><!-- END OF NWSCONTAINER -->

<script type="text/javascript">
			
	var Shuffle = window.Shuffle;
	var element = document.querySelector('.grid');
	var sizer = element.querySelector('.sizer');
	var winWidth = $(window).width();
	var winHeight = $(window).height();

	var shuffleInstance = new Shuffle(element, {
	  itemSelector: '.xpstItems',
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

<?php
	$footerTop = get_field('footer_top_display');
	if($footerTop == 'yes'){
		get_sidebar('leasing');
	}
?>

<?php get_footer(); ?>
