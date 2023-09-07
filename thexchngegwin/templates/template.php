<?php
/**
 * Template Name: Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage ExchangeGwinnett
 * @since 1.0
 */

get_header(); ?>


<?php
	$footerTop = get_field('footer_top_display');
	if($footerTop == 'yes'){
		get_sidebar('leasing');
	}
?>

<?php get_footer(); ?>
