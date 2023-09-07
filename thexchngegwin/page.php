<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Clementine Creative Agency
 * @since Clementine Showcase 1.0
 */

get_header(); ?>

<?php
	$pageTitle = get_the_title();
?>

<style type="text/css">
	
	#defaultWrapper{
		position: relative;
		width: 90%;
		height: auto;
		margin: 0px auto;
		font-family: 'Inter Regular';
	}
	
	#defaultWrapper h1, #defaultWrapper h2,
	#defaultWrapper h3, #defaultWrapper h4,
	#defaultWrapper h5, #defaultWrapper h6{
		text-align: center;
	}

</style>

<div id="defaultWrapper">

	<div id="defaultContainer">
		
		<h1><?php echo $pageTitle;?></h1>

		<?php
			if(have_posts()){
				while(have_posts()):
					the_post();
					the_content();
				endwhile;
			}
		?>

	</div><!-- END OF DEFAULT CONTAINER -->

</div><!-- END OF DEFAULT WRAPPER -->


<?php get_footer();?>
