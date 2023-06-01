<?php
get_header(); ?>

<div id="main-content" class="my-16">

    <?php if (have_posts()): ?>
        <?php while (have_posts()) {
            the_post();
            get_template_part('template-parts/content');
        } ?>
    <?php endif; ?>

</div>

<?php get_footer();
?>
