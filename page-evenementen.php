<?php
/*
Template Name: Evenementen
*/
get_header();
?>

<section class="container content-page">
    <h1><?php the_title(); ?></h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in tellus ac sapien faucibus fermentum.</p>

    <div class="post-grid">
        <article class="post-card reveal">
            <div class="ph ph-coral"></div>
            <h2>Lorem Ipsum Event</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in posuere lorem.</p>
        </article>
        <article class="post-card reveal">
            <div class="ph ph-cyan"></div>
            <h2>Dolor Sit Amet Event</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in posuere lorem.</p>
        </article>
        <article class="post-card reveal">
            <div class="ph ph-sand"></div>
            <h2>Consectetur Event</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in posuere lorem.</p>
        </article>
    </div>
</section>

<?php get_footer(); ?>
