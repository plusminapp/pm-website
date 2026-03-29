<?php get_header(); ?>

<section class="archive-wrap container">
    <h1><?php the_archive_title(); ?></h1>
    <p><?php the_archive_description(); ?></p>

    <?php if (have_posts()) : ?>
        <div class="post-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('post-card reveal'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <a class="post-card-media" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(the_title_attribute(array('echo' => false))); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    <?php else : ?>
                        <div class="ph ph-sand"></div>
                    <?php endif; ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo esc_html(get_the_excerpt()); ?></p>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination-wrap"><?php the_posts_pagination(); ?></div>
    <?php else : ?>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
