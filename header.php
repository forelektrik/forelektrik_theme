<?php
/**
 * Header template
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

<!-- Kampanya Duyuru Çubuğu -->
<div class="announcement-bar">
    <div class="container">
        <p class="text-center mb-0">Tüm Siparişlerde Ücretsiz Kargo!</p>
    </div>
</div>

<!-- Ana Site Container -->
<div class="site-container">
    <!-- Header Bölümü -->
    <header class="site-header">
        <div class="container">
            <div class="header-main py-4">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-md-3 text-center text-md-start">
                        <div class="site-branding">
                            <?php if (has_custom_logo()) : ?>
                                <?php the_custom_logo(); ?>
                            <?php else : ?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        E-Commerce Revolution
                                    </a>
                                </h1>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Arama Formu -->
                    <div class="col-md-6">
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="input-group">
                                <input type="search" 
                                       class="form-control search-field" 
                                       placeholder="Ürün ara..." 
                                       value="<?php echo get_search_query(); ?>" 
                                       name="s" />
                                <input type="hidden" name="post_type" value="product" />
                                <button type="submit" class="btn btn-primary">Ara</button>
                            </div>
                        </form>
                    </div>

                    <!-- Hesap ve Sepet -->
                    <div class="col-md-3">
                        <div class="header-actions">
                            <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="header-account">
                                <span>Hesabım</span>
                                <span class="account-count">0</span>
                            </a>
                            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="header-cart">
                                <span>Sepet</span>
                                <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigasyon Menüsü -->
        <div class="header-navigation">
            <div class="container">
                <div class="row">
                    <!-- Kategoriler Butonu -->
                    <div class="col-md-3">
                        <div class="categories-menu">
                            <button class="categories-menu-button">
                                <span>Kategoriler</span>
                            </button>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'categories_menu',
                                'menu_class' => 'categories-dropdown',
                                'container' => false,
                                'fallback_cb' => false,
                            ));
                            ?>
                        </div>
                    </div>

                    <!-- Ana Menü -->
                    <div class="col-md-9">
                        <nav class="main-navigation">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                                'menu_class' => 'primary-menu',
                                'container' => false,
                            ));
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>