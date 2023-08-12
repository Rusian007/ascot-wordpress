<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
	<link rel="icon" href="<?php echo esc_url( get_header_image() ); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body <?php body_class(); ?>>


	<header>
		<nav class="navbar navbar-expand-lg navbar-light ">
			<div class=" container-fluid shadow-sm py-2 bg-white mx-2">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="col-3">
						<a class="navbar-brand " href="<?php bloginfo('url'); ?>"><img class="w-custom"
								src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt=""></a>

					</div>

					<div class="col-8 text-center mt-3">
						<h6 class="text-center mb-remove-custom">ASCOT</h6>
						<p class="text">AUTO ELECTRICAL PARTS</p>
					</div>
				</div>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<div class="row mx-auto">

						<div class="col-md-12 ">
						<span class="text-center ">
							<p class="color-primary h-100 d-flex align-items-center align-self-center text-custom"><i class="fa-solid fa-phone-volume text-secondary custom-padding" ></i> 01799494115</p>
						</span>
						</div>

					</div>
					<?php
					wp_nav_menu(
						array(
							'theme location' => 'top-menu',

						)
					);
					?>

				</div>

			</div>
		</nav>

		<div class="container mt-2">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<div>
					<?php
						// Display the WooCommerce search form
						get_product_search_form();
						?>
					</div>
				
				</div>
			</div>
		</div>

		<div class="container-fluid d-flex flex-wrap justify-content-start mb-4 px-2">

			<?php
			// Get all product categories
			$product_categories = get_terms(
				array(
					'taxonomy' => 'product_cat',
					'hide_empty' => true,
					// Set to false if you want to include empty categories
				)
			);

			// Check if there are categories to display
			if (!empty($product_categories) && !is_wp_error($product_categories)) {

				foreach ($product_categories as $category) {
					echo '<p class="product-categories px-2 py-1 m-2 bg-color-primary-custom shadow-sm small" >';
					echo '<a class="nav-link" href="' . get_term_link($category) . '">' . $category->name . '</a>';
					echo '</p>';
				}

			} else {
				echo 'No product categories found.';
			}
			?>

		</div>
	</header>