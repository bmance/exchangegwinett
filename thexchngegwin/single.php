<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header(); 

//$postImage = get_template_directory_uri().'/images/postDefault.jpg';
$postImage = get_template_directory_uri().'/images/xchangeDefault.jpg';
$pAlt = get_bloginfo('name');

if(get_the_post_thumbnail_url()){
	if(wp_is_mobile()){
		$postImage = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
	}else{
		$postImage = get_the_post_thumbnail_url();
	}
	
}

$blgBtntxt = 'See Our Blog';
$blgBtn = '/blog';

$tempBtntxt = get_field('universal_blog_button_text','options');
$tempBtn = get_field('universal_blog_page_link','options');

if($tempBtntxt != '' && $tempBtntxt != NULL){
	$blgBtntxt = $tempBtntxt;
}

if($tempBtn != '' && $tempBtn != NULL){
	$blgBtn = $tempBtn;
}


$bpHeader = get_template_directory_uri().'/images/xchangeDefault.jpg';

?>

<div id="bpTop" class="<?php echo $btClass;?>">
	
	<div class="bgImage" style="background-image: url('<?php echo $postImage;?>');"></div>
	<img class="imageAbove" src="<?php echo $postImage;?>" alt="<?php echo $pAlt;?>" />

</div><!-- END OF DIRTOP -->

<div id="bpContainer">
	
	<?php
		$blgTitle = get_the_title();
		$date = get_the_date( 'F j, Y' );
		$current_url = home_url( add_query_arg( array(), $wp->request ) );
		
		$blogUrl = get_page_link(225);
		$tmpblgurl = get_field('universal_blog_page_link','options');
		if($tmpblgurl != '' && $tmpblgurl != NULL){
			$blogUrl = $tmpblgurl;
		}

		$blgAllbtn = 'All News';
		$tmpAllbtn = get_field('universal_blog_page_link_text','options');
		if($tmpAllbtn != '' && $tmpAllbtn != NULL){
			$blgAllbtn = $tmpAllbtn;
		}
	?>

	<div id="bpInfo">
		<div class="rel">
			<h1><?php echo $blgTitle;?></h1>
			<!--<span class="bipSecs"><?php echo $date;?></span>-->
		</div>
	</div><!-- END OF BPINFO -->

	<div id="bpContent">
		<?php
			if(have_posts()){
				while(have_posts()){
					the_post();
					the_content();
				}
			}
		?>
	</div><!-- END OF BPCONTENT -->

	<div class="clear"></div>

	<div id="bpBttm">
		
		<div id="bpmbWrapper" class="dibWrappers">
			<a class="bpBtns xchngBtns" href="<?php echo $blogUrl;?>">
				<?php echo $blgAllbtn;?>		
			</a>
		</div>

	</div><!-- END  OF BPBTTM -->

</div><!-- END OF BPCONTAINER -->

<?php get_footer(); ?>
