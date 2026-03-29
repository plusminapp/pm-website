<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container nav-wrap">
        <div class="brand-wrap">
            <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('PlusMin home', 'plusmin-redzaamheid'); ?>">
                <img src="<?php echo esc_url(plusmin_logo_url()); ?>" alt="PlusMin logo">
            </a>
            <?php if (!is_front_page()) : ?>
                <p class="header-payoff"><?php esc_html_e('Op weg naar financiële redzaamheid', 'plusmin-redzaamheid'); ?></p>
            <?php endif; ?>
        </div>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-menu" aria-label="<?php esc_attr_e('Menu', 'plusmin-redzaamheid'); ?>">
            <svg class="icon-hamburger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="3" y1="6" x2="21" y2="6"/>
                <line x1="3" y1="12" x2="21" y2="12"/>
                <line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
            <svg class="icon-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="4" y1="4" x2="20" y2="20"/>
                <line x1="20" y1="4" x2="4" y2="20"/>
            </svg>
        </button>

        <nav id="site-menu" class="site-nav" aria-label="Hoofdnavigatie">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'    => 'plusmin_fallback_menu',
                'menu_class'     => 'menu-list',
            ));
            ?>
        </nav>
    </div>
</header>

<main id="content" class="site-content">
