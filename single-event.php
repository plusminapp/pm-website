<?php get_header(); ?>

<section class="container content-page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class('reveal'); ?>>
            <h1><?php the_title(); ?></h1>
            <div class="ph ph-gradient" style="min-height: 220px;"></div>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
