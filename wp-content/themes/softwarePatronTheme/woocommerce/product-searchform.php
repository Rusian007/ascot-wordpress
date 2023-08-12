<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (!defined('ABSPATH')) {
	exit;
}

?>
		
		<style>

.search-box {
	width: fit-content;
	height: fit-content;
	position: relative;
	border-radius: 50%;
}

.input-search {
	height: 40px;
	width: 250px !important;
	border-style: none;
	padding: 5px;
	font-size: 14px;
	letter-spacing: 2px;
	outline: none;
	border-radius: 25px;
	transition: all .5s ease-in-out;
	background-color: white;
	
	color: black;
}

.input-search::placeholder {
	color: black;
	font-size: 14px;
	letter-spacing: 2px;
	font-weight: 100;
}

.btn-search {
	width: 40px;
	height: 40px;
	border-style: none;
	font-size: 12px;
	font-weight: bold;
	outline: none;
	cursor: pointer;
	border-radius: 50%;
	position: absolute;
	right: 0px;
	color: #dd7d00;
	background-color: white;
	pointer-events: painted;
}


</style>

<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
	<label class="screen-reader-text"
		for="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>" "><?php esc_html_e('Search for:', 'woocommerce'); ?></label>
	<div class=" search-box shadow">
		<button class="btn-search"><i class="fas fa-search"></i></button>
		<input type="search" id="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>"
			class="input-search search-field"
			placeholder="<?php echo esc_attr__('Type to search &hellip;', 'woocommerce'); ?>"
			value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" value="<?php echo esc_attr_x('Search', 'submit button', 'woocommerce'); ?>"
			class="<?php echo esc_attr(wc_wp_theme_get_element_class_name('button')); ?> d-none"><?php echo esc_html_x('Search', 'submit button', 'woocommerce'); ?></button>
	</div>
		<input type="hidden" name="post_type" value="product" />


</form>