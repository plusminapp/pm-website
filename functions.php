<?php
if (!defined('ABSPATH')) {
    exit;
}

function plusmin_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('align-wide');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Achtergrond', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-bg',
            'color' => '#f7f5ef',
        ),
        array(
            'name'  => __('Papier', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-paper',
            'color' => '#fffdfa',
        ),
        array(
            'name'  => __('Inkt', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-ink',
            'color' => '#18222f',
        ),
        array(
            'name'  => __('Gedempt', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-muted',
            'color' => '#4c5b68',
        ),
        array(
            'name'  => __('Lijn', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-line',
            'color' => '#d7ddd8',
        ),
        array(
            'name'  => __('Menu Mint', 'plusmin-redzaamheid'),
            'slug'  => 'menu-mint',
            'color' => '#0f766e',
        ),
        array(
            'name'  => __('Koraal', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-coral',
            'color' => '#de6d4f',
        ),
        array(
            'name'  => __('Zand', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-sand',
            'color' => '#dfcfa9',
        ),
        array(
            'name'  => __('Marine', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-navy',
            'color' => '#18354a',
        ),
        array(
            'name'  => __('Subtiel blauwgrijs', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-soft-slate',
            'color' => '#5f6f7a',
        ),
        array(
            'name'  => __('Footer donker', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-footer-dark',
            'color' => '#0f1f2d',
        ),
        array(
            'name'  => __('Footer licht', 'plusmin-redzaamheid'),
            'slug'  => 'plusmin-footer-light',
            'color' => '#d8e5e3',
        ),
    ));

    register_nav_menus(array(
        'primary' => __('Hoofdmenu', 'plusmin-redzaamheid'),
        'footer'  => __('Footer menu', 'plusmin-redzaamheid'),
    ));
}
add_action('after_setup_theme', 'plusmin_theme_setup');

function plusmin_enqueue_assets() {
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'plusmin-fonts',
        'https://fonts.bunny.net/css?family=dm-sans:400,500,700|fraunces:600,700',
        array(),
        null
    );

    wp_enqueue_style(
        'plusmin-main-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array('plusmin-fonts'),
        $version
    );

    wp_enqueue_script(
        'plusmin-main-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        $version,
        true
    );
}
add_action('wp_enqueue_scripts', 'plusmin_enqueue_assets');

function plusmin_logo_url() {
    return 'https://www.plusmin.org/wp-content/uploads/2026/03/plusmin.png';
}

function plusmin_excerpt_length() {
    return 22;
}
add_filter('excerpt_length', 'plusmin_excerpt_length', 999);

function plusmin_fallback_menu() {
    echo '<ul class="menu-list">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'plusmin-redzaamheid') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/over-ons/')) . '">' . esc_html__('Over ons', 'plusmin-redzaamheid') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . esc_html__('Contact', 'plusmin-redzaamheid') . '</a></li>';
    echo '</ul>';
}

function plusmin_allow_ico_uploads($mimes) {
    $mimes['ico'] = 'image/x-icon';

    return $mimes;
}
add_filter('upload_mimes', 'plusmin_allow_ico_uploads');

function plusmin_fix_ico_filetype($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);

    if ($filetype['ext'] === 'ico') {
        $data['ext'] = 'ico';
        $data['type'] = 'image/x-icon';
        $data['proper_filename'] = $filename;
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'plusmin_fix_ico_filetype', 10, 4);

function plusmin_home_pattern_hero() {
    return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group hero"><!-- wp:group {"className":"container hero-grid","layout":{"type":"constrained"}} -->
<div class="wp-block-group container hero-grid"><!-- wp:group {"className":"hero-copy reveal","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero-copy reveal"><!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">Op weg naar financiele redzaamheid</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque feugiat, nunc non porta fermentum, nibh lorem sagittis erat, sed faucibus tortor lorem a enim.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#werkwijze">Lees meer</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#contact">Doe mee</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
HTML;
}

function plusmin_home_pattern_process_item() {
    return <<<'HTML'
<!-- wp:group {"className":"process-step"} -->
<div class="wp-block-group process-step"><!-- wp:paragraph -->
<p><strong>01</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Lorem ipsum</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc efficitur commodo ex.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
HTML;
}

function plusmin_home_pattern_impact() {
    return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"impact container reveal","layout":{"type":"constrained"}} -->
<section class="wp-block-group impact container reveal"><!-- wp:group {"className":"impact-copy","layout":{"type":"constrained"}} -->
<div class="wp-block-group impact-copy"><!-- wp:heading {"level":2} -->
<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at augue lacinia, semper ipsum eu, vulputate magna.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus massa ut neque interdum, ac malesuada ante posuere.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"impact-visual ph ph-stripes","layout":{"type":"constrained"}} -->
<div class="wp-block-group impact-visual ph ph-stripes"><!-- wp:spacer {"height":"280px"} -->
<div style="height:280px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
HTML;
}

function plusmin_home_pattern_cta() {
    return <<<'HTML'
<!-- wp:group {"tagName":"section","anchor":"contact","className":"cta","layout":{"type":"constrained"}} -->
<section id="contact" class="wp-block-group cta"><!-- wp:group {"className":"container cta-wrap reveal","layout":{"type":"constrained"}} -->
<div class="wp-block-group container cta-wrap reveal"><!-- wp:heading {"level":2} -->
<h2>Financiele redzaamheid begint met een eerste stap</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat purus sit amet lorem faucibus, non volutpat ipsum tincidunt.</p>
<!-- /wp:paragraph -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Neem contact op</a></div>
<!-- /wp:button --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
HTML;
}

function plusmin_home_pattern_complete() {
    return implode("\n\n", array(
        plusmin_home_pattern_hero(),
        plusmin_home_pattern_impact(),
        plusmin_home_pattern_cta(),
    ));
}

function plusmin_home_pattern_process_section() {
    $item = plusmin_home_pattern_process_item();
    return <<<HTML
<!-- wp:group {"tagName":"section","align":"full","anchor":"werkwijze","className":"process","layout":{"type":"constrained"}} -->
<section id="werkwijze" class="wp-block-group alignfull process">

<!-- wp:group {"className":"container","layout":{"type":"constrained"}} -->
<div class="wp-block-group container">

<!-- wp:heading {"level":2} -->
<h2>Werkwijze</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">

<!-- wp:column -->
<div class="wp-block-column">{$item}</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">{$item}</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">{$item}</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">{$item}</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

</section>
<!-- /wp:group -->
HTML;
}

function plusmin_seed_front_page_content_once() {
    if (!is_admin() || wp_doing_ajax()) {
        return;
    }

    $front_page_id = (int) get_option('page_on_front');
    if (!$front_page_id) {
        return;
    }

    $seed_flag = '_plusmin_home_seeded';
    if (get_post_meta($front_page_id, $seed_flag, true)) {
        return;
    }

    $front_page = get_post($front_page_id);
    if (!$front_page || $front_page->post_type !== 'page') {
        return;
    }

    if (trim((string) $front_page->post_content) === '') {
        wp_update_post(array(
            'ID'           => $front_page_id,
            'post_content' => plusmin_home_pattern_complete(),
        ));
    }

    update_post_meta($front_page_id, $seed_flag, '1');
}
add_action('admin_init', 'plusmin_seed_front_page_content_once');

function plusmin_image_lightbox_pattern() {
    return '<!-- wp:image {"className":"pm-lightbox","sizeSlug":"medium","linkDestination":"media"} -->' . "\n" .
           '<figure class="wp-block-image size-medium pm-lightbox"><img alt=""/></figure>' . "\n" .
           '<!-- /wp:image -->';
}

function plusmin_register_block_patterns() {
    if (!function_exists('register_block_pattern')) {
        return;
    }

    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'plusmin-homepage',
            array('label' => __('PlusMin Homepage', 'plusmin-redzaamheid'))
        );
        register_block_pattern_category(
            'plusmin-media',
            array('label' => __('PlusMin Media', 'plusmin-redzaamheid'))
        );
    }

    register_block_pattern(
        'plusmin/afbeelding-lightbox',
        array(
            'title'       => __('PlusMin: Afbeelding met lightbox', 'plusmin-redzaamheid'),
            'description' => __('Kleine afbeelding in de tekst met lightbox. Voeg dit blok in, selecteer daarna een afbeelding en stel in de werkbalk "Link naar" in op "Mediabestand". De lightbox-overlay wordt dan automatisch geactiveerd.', 'plusmin-redzaamheid'),
            'categories'  => array('plusmin-media', 'media'),
            'keywords'    => array('lightbox', 'foto', 'vergroten', 'overlay', 'afbeelding'),
            'content'     => plusmin_image_lightbox_pattern(),
        )
    );

    register_block_pattern(
        'plusmin/home-complete',
        array(
            'title'       => __('PlusMin: Complete Homepage', 'plusmin-redzaamheid'),
            'description' => __('Volledige homepage opgebouwd uit PlusMin-secties.', 'plusmin-redzaamheid'),
            'categories'  => array('plusmin-homepage'),
            'content'     => plusmin_home_pattern_complete(),
        )
    );

    register_block_pattern(
        'plusmin/home-hero',
        array(
            'title'       => __('PlusMin: Hero', 'plusmin-redzaamheid'),
            'description' => __('Hero-sectie met titel, intro en knoppen.', 'plusmin-redzaamheid'),
            'categories'  => array('plusmin-homepage'),
            'content'     => plusmin_home_pattern_hero(),
        )
    );

    register_block_pattern(
        'plusmin/home-process-section',
        array(
            'title'       => __('PlusMin: Werkwijze Sectie (donkere band)', 'plusmin-redzaamheid'),
            'description' => __('Donkere band met koptekst en vier kolommen voor werkwijze-stappen.', 'plusmin-redzaamheid'),
            'categories'  => array('plusmin-homepage'),
            'content'     => plusmin_home_pattern_process_section(),
        )
    );

    register_block_pattern(
        'plusmin/home-process-item',
        array(
            'title'       => __('PlusMin: Enkele Werkwijze Stap', 'plusmin-redzaamheid'),
            'description' => __('Een losse werkwijze-stap om in een kolom te plaatsen.', 'plusmin-redzaamheid'),
            'categories'  => array('plusmin-homepage'),
            'content'     => plusmin_home_pattern_process_item(),
        )
    );

    register_block_pattern(
        'plusmin/home-impact',
        array(
            'title'       => __('PlusMin: Impact', 'plusmin-redzaamheid'),
            'description' => __('Impact-sectie met tekst en visual placeholder.', 'plusmin-redzaamheid'),
            'categories'  => array('plusmin-homepage'),
            'content'     => plusmin_home_pattern_impact(),
        )
    );

    register_block_pattern(
        'plusmin/home-cta',
        array(
            'title'       => __('PlusMin: Call To Action', 'plusmin-redzaamheid'),
            'description' => __('Afsluitende call-to-action voor contact of deelname.', 'plusmin-redzaamheid'),
            'categories'  => array('plusmin-homepage'),
            'content'     => plusmin_home_pattern_cta(),
        )
    );
}
add_action('init', 'plusmin_register_block_patterns');
