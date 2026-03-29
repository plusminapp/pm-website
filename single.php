<?php get_header(); ?>

<section class="container content-page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class('reveal'); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <figure class="single-post-media">
                    <?php the_post_thumbnail('large'); ?>
                </figure>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
            <div class="meta">Geplaatst op <?php echo esc_html(get_the_date()); ?> door <?php $auteur = trim(get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name')); echo esc_html($auteur ?: get_the_author()); ?></div>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
