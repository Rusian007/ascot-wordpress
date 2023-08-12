<?php get_header(); ?>
<div class="container">

    <div class="row">
        <div class="col-md-9 height-custom-carousel">
            <?php if (is_active_sidebar('ad_bar')): ?>
                <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-inner ">

                        <?php
                        // Get all widget instances for the 'ad_bar' sidebar
                        $widget_instances = get_option('widget_ad_bar');

                        // Check if there are any widget instances
                        if (!empty($widget_instances)) {
                            // Loop through each widget instance
                            foreach ($widget_instances as $widget_instance) {
                                // Check if the widget is active (has image URL)
                                if (!empty($widget_instance['image_url'])) {
                                    // Display your custom format for each widget instance
                                    echo '<div class="carousel-item active">';
                                    echo '<img class="d-block height-custom-carousel w-100 img-fluid rounded" src="' . esc_url($widget_instance['image_url']) . '" alt="Advertisement">';
                                    // You can add more content here based on your desired format
                                    echo '</div>';
                                }
                            }
                        }
                        ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-3 py-sm-2 py-md-1 px-2 d-flex flex-column justify-content-between">
            <div>
                <h2 class="text-custom">More than just a store</h2>
                <p class=" lh-1 mt-3">Quality goods for all your needs, It's time to upgrade your ride !</p>
                <div class="mt-2 mb-3">

                    <?php if (is_active_sidebar('social_links')): ?>
                        <div class="social-links-widget-area">
                            <?php dynamic_sidebar('social_links'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <img class="img img-fluid rounded"
                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fbc%2Fb2%2Ff4%2Fbcb2f4c81fca6abf637f788d166d1e24.jpg&f=1&nofb=1&ipt=23d2ca3baf7f6d2ed6768fda2a7b1837278ef7218793dd97895744cf3910f6ef&ipo=images"
                alt="">
        </div>
    </div>



</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5 text-center">
            <h4>Our Categories</h4>
            <p>Check out our categories and find your products <i class="fa-solid fa-heart text-warning"></i></p>
        </div>
        <div class="col-md-12 d-flex flex-wrap justify-content-start">
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


                    echo '<a class="nav-link bg-white p-3 m-2 text-center shadow-sm rounded-custom hover-custom" href="' . get_term_link($category) . '">';
                    echo '<i class="fa-solid fa-bomb text fs-3 mb-1 text-warning"></i>';
                    echo "<p class='text-capitalize'>" . $category->name;
                    echo "</p>";
                    echo '</a>';

                }

            } else {
                echo 'No product categories found.';
            }
            ?>
        </div>
    </div>
</div>


<div class="container">

 
    <div class="col-md-12 mt-5 mb-5 text-center">
        <h4>Our Latest Products</h4>
        <p>Here is all our products, happy shopping <i class="fa-solid fa-face-smile text-info"></i></p>
    </div>
    <?php
    // Get the latest products
    $args = array(
        'status' => 'publish',
        // Show only published products
        'limit' => 10,
        // Number of products to display
        'orderby' => 'date',
        // Sort products by date added
        'order' => 'DESC',
        // Sort in descending order (newest first)
        'return' => 'objects', // Return product objects
    );

    $latest_products = wc_get_products($args);

    // Check if there are products to display
    if (!empty($latest_products)) {
        echo '<div class="row latest-products">';
        foreach ($latest_products as $product) {
            $product_image_url = get_the_post_thumbnail_url($product->get_id(), 'medium');
            $product_name = $product->get_name();
            $product_price = $product->get_price_html();

            echo '<div class="col-md-3 mb-4">';
            echo '<div class="card" style="width: 15rem;">';
            echo '<img src="' . esc_url($product_image_url) . '" class="card-img-top img-fluid h-custom" alt="' . esc_attr($product_name) . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . esc_html($product_name) . '</h5>';
            echo '<p class="card-text">' . $product_price . '</p>';
            echo '<a href="' . esc_url($product->get_permalink()) . '" class="btn btn-outline-primary btn-sm">View Product</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo 'No latest products found.';
    }
    ?>

</div>



<div class="container-fluid bg">
    <div class="row h-100 justify-content-center align-items-center ">
        <div class="col-md-6 blurry-bg py-5">

            <div class="row text-center">

                <div class="col-md-4 p-2">
                    <i class="fa-solid fa-print text-light text fs-2"></i>
                    <h4 class="text-light fw-light">Printers</h4>
                </div>

                <div class="col-md-4 p-2">
                    <i class="fa-solid fa-tv text-light text fs-2"></i>
                    <h4 class="text-light fw-light">Monitors</h4>
                </div>

                <div class="col-md-4 p-2">
                    <i class="fa-solid fa-headset text-light text fs-2 "></i>
                    <h4 class="text-light fw-light">Headsets</h4>
                </div>


                <div class="col-md-4 p-2 mt-2">
                    <i class="fa-solid fa-up-down text-light text fs-2 "></i>
                    <h4 class="text-light fw-light">Storage</h4>
                </div>

                <div class="col-md-4 p-2 mt-2">
                    <i class="fa-solid fa-microchip text-light text fs-2 "></i>
                    <h4 class="text-light fw-light">Processors</h4>
                </div>

                <div class="col-md-4 p-2 mt-2">
                    <i class="fa-solid fa-computer-mouse text-light text fs-2 "></i>
                    <h4 class="text-light fw-light">Mouse</h4>
                </div>

            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>