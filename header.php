<?php
/**
 * The header for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'forelektrik_theme'); ?></a>

    <header id="masthead" class="site-header">
        <!-- Kampanya Duyuru Çubuğu -->
        <div class="announcement-bar bg-primary text-white py-2">
            <div class="container">
                <div class="text-center">
                    <p class="mb-0">Tüm Siparişlerde Ücretsiz Kargo!</p>
                </div>
            </div>
        </div>

        <!-- Ana Header -->
        <div class="main-header py-4">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-md-3 text-center text-md-start">
                        <?php
                        if (has_custom_logo()) :
                            the_custom_logo();
                        else :
                            ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                        <?php endif; ?>
                    </div>

                    <!-- Arama Formu -->
                    <div class="col-md-6">
                        <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Ürün ara..." name="s">
                                <input type="hidden" name="post_type" value="product">
                                <button class="btn btn-primary" type="submit">Ara</button>
                            </div>
                        </form>
                    </div>

                    <!-- Header Sağ Aksiyonlar -->
                    <div class="col-md-3">
                        <div class="header-actions d-flex justify-content-end align-items-center">
                            <!-- Hesabım -->
                            <div class="account-link me-4">
                                <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">
                                    <i class="fas fa-user"></i>
                                    <span>Hesabım</span>
                                </a>
                            </div>
                            <!-- Sepet -->
                            <div class="cart-link">
                                <a href="<?php echo esc_url(wc_get_cart_url()); ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ana Menü -->
        <nav class="main-navigation bg-light">
            <div class="container">
                <div class="row">
                    <!-- Kategoriler Menüsü -->
                    <div class="col-md-3">
                        <div class="categories-menu">
                            <button class="btn btn-primary w-100 d-flex align-items-center">
                                <i class="fas fa-bars me-2"></i>
                                Kategoriler
                            </button>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'categories_menu',
                                'menu_class' => 'categories-dropdown',
                                'container' => false,
                            ));
                            ?>
                        </div>
                    </div>
                    <!-- Ana Menü -->
                    <div class="col-md-9">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                            'menu_class' => 'primary-menu d-flex justify-content-start',
                            'container' => false,
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>