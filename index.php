<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <!-- Ana Slider/Banner -->
        <section class="main-slider">
            <?php 
            if( function_exists('SmartSlider3') ) {
                SmartSlider3( array( 'slider' => 2 ) ); // 1 yerine kendi slider ID'nizi yazın
            }
            ?>
        </section>

        <!-- Kategori Grid -->
        <section class="category-grid">
            <h2>Popüler Kategoriler</h2>
            <div class="category-boxes">
                <?php
                $product_categories = get_terms('product_cat', array(
                    'hide_empty' => false,
                    'parent' => 0,
                    'number' => 8
                ));

                if (!empty($product_categories)) {
                    foreach ($product_categories as $category) {
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $image = wp_get_attachment_url($thumbnail_id);
                        ?>
                        <div class="category-box">
                            <a href="<?php echo get_term_link($category); ?>">
                                <?php if ($image) : ?>
                                    <img src="<?php echo $image; ?>" alt="<?php echo $category->name; ?>">
                                <?php endif; ?>
                                <h3><?php echo $category->name; ?></h3>
                            </a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </section>

        <!-- Öne Çıkan Ürünler -->
        <section class="featured-products">
            <h2>Öne Çıkan Ürünler</h2>
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
            );
            $featured_query = new WP_Query($args);

            if ($featured_query->have_posts()) :
                echo '<div class="products-grid">';
                while ($featured_query->have_posts()) : $featured_query->the_post();
                    wc_get_template_part('content', 'product');
                endwhile;
                echo '</div>';
                wp_reset_postdata();
            endif;
            ?>
        </section>

        <!-- Promosyon Banner'ları -->
        <section class="promo-banners">
            <?php
            if (function_exists('dynamic_sidebar')) {
                dynamic_sidebar('home-promotions');
            }
            ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>