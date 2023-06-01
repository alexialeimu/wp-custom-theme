<?php
get_header(); ?>

<main id="main-content">
    <div class="my-16">

        <div class="container mx-8 md:mx-auto text-center space-y-8" data-aos="fade-up">
            
            <?php the_archive_title(
                '<h1 class="mb-8 md:mb-16 text-3xl md:text-5xl font-bold">',
                '</h1>'
            ); ?>

            <div class="text-left relative flex flex-col flex-wrap md:flex-row -mx-4">
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
</main>

<?php get_footer();
?>
