<?php
/**
 * Template for blog page
 */
get_header(); ?>

<div id="main-content" class="my-16">
    <div class="container mx-auto text-center space-y-4">
        <h1 class="mb-8 md:mb-16 text-3xl md:text-5xl font-bold"><?php single_post_title(); ?></h1>
        <div class="mx-8 md:-mx-4 text-left relative flex flex-col flex-wrap md:flex-row space-y-8 md:space-y-0">
            <?php if (have_posts()): ?>
                <?php while (have_posts()) {
                    the_post();

                    get_template_part(
                        'template-parts/content',
                        'archive'
                    );
                } ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
