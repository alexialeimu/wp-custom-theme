<?php
get_header(); ?>

<!-- Main content -->
<main id="main-content">

    <!-- 
        HERO IMAGE
    -->
    <section id="hero">
        <?php
        $bg_image_url = '';
        $background_image = get_theme_mod('theme_background_image');
        if ($background_image) {
            $bg_image_url = esc_url($background_image);
        } else {
            $bg_image_url = get_theme_file_uri(
                'assets/images/background.jpeg'
            );
        }
        ?>
        <div class="parallax-window w-100 h-screen" data-parallax="scroll" data-image-src='<?php echo $bg_image_url; ?>'>
            <div class="dark-overlay absolute bg-slate-700 opacity-50 w-screen h-[calc(100vh+5rem)] -translate-y-20">
            </div>
            <div class="container mx-auto right-0 z-20">
                <div class="text-white absolute top-1/3 w-full text-center left-0 md:left-auto md:text-left">
                    <h1 class="text-4xl md:text-6xl font-bold"><?php echo get_theme_mod(
                        'theme_frontpage_title'
                    ); ?></h1>
                </div>
                <div class="absolute bottom-20 left-0 right-0 text-white scroll-arrow">
                    <a href="#about"><span></span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- 
        ABOUT SECTION
     -->
    <?php
    $about_title = get_theme_mod('theme_frontpage_about_title');
    $about_body = get_theme_mod('theme_frontpage_about_body');
    if ($about_title || $about_body) { ?>
            <section id="about" class="py-16">
                <div class="container mx-auto" data-aos="fade-up">
                    <div class="flex flex-col md:flex-row justify-between px-16 gap-4">
                        <?php
                        if ($about_title) { ?>
                            <div class="text-sky-800 font-bold text-2xl md:text-3xl basis-2/5"><?php echo $about_title; ?></div>
                        <?php }
                        if ($about_body) { ?>
                            <p class="basis-1/2">
                                <?php echo nl2br(
                                    esc_html($about_body)
                                ); ?>    
                            </p>
                        <?php }
                        ?>
                    </div>
                </div>
            </section>
        <?php }
    ?>

    <!-- 
        REFERENCES SECTION
     -->
    <?php
    $references_title = get_theme_mod('references_section_title');
    $references_body = get_theme_mod('references_section_body');
    $featured_reference_id = get_theme_mod('featured_reference_id');

    $arg = [
        'post_type' => 'references',
        'posts_per_page' => 4,
        'post__not_in' => [$featured_reference_id], // Exclude the featured reference
    ];
    $referencesQuery = new WP_Query($arg);

    if ($referencesQuery->have_posts()): ?>
            <section id="what-we-do" class="bg-sky-900 text-white pt-16 pb-8 md:py-16">
                <div class="container mx-auto text-center" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-8"><?php echo $references_title; ?>  </h2>
                    <div class="text-sky-100 text-serif text-xl w-2/3 mx-auto"><?php echo $references_body; ?></div>
                </div>
                <div class="mx-16 xl:max-w-screen-xl xl:mx-auto" data-aos="fade-up">
                    <div class="flex flex-col flex-wrap md:flex-row justify-between mt-16">
                    <?php while ($referencesQuery->have_posts()):
                        $referencesQuery->the_post(); ?>
                        <div class="w-full px-4 my-6 lg:my-0 sm:basis-1/2 lg:basis-1/4">
                            <?php if (has_post_thumbnail()): ?>
                                <?php $thumbnail_url = get_the_post_thumbnail_url(
                                    get_the_ID(),
                                    'large'
                                ); ?>
                                <img src="<?php echo esc_url(
                                    $thumbnail_url
                                ); ?>" class="w-100 mb-4" alt=""/>
                            <?php endif; ?>
                                <h3 class="text-xl font-bold mb-4 hover:text-gray-400"><a href="<?php echo esc_url(
                                    get_permalink()
                                ); ?>"><?php the_title(); ?></a></h3>
                            <p class="text-sky-100"><?= wp_trim_words(
                                get_the_content(),
                                20,
                                '...'
                            ) ?></p>
                        </div>
                    <?php
                    endwhile; ?>

                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
            </section>
        <?php endif;
    ?>

    <?php
    $featured_reference_id = get_theme_mod('featured_reference_id');

    if ($featured_reference_id) {

        $featured_reference_post = get_post($featured_reference_id);

        if ($featured_reference_post) {
            $post_title = $featured_reference_post->post_title;
            $post_content = $featured_reference_post->post_content;
            $post_thumbnail_url = get_the_post_thumbnail_url(
                $featured_reference_id,
                'large'
            );
            $post_permalink = get_permalink($featured_reference_id);
        }
        ?>
                <section id="reference" class="bg-sky-900 text-white py-8 md:py-16">
                    <div class="reference-card max-w-screen-lg mx-auto flex flex-col md:flex-row items-stretch relative">
                        <div class="w-full md:w-7/12" data-aos="fade-up">
                            <img src="<?php echo $post_thumbnail_url; ?>" alt="<?php echo $post_title; ?>" class="w-100" />
                        </div>
                        <div class="bg-gray-300 w-full md:w-7/12 md:absolute md:right-0 md:top-20 -bottom-14 text-black p-12 overflow-hidden" data-aos="fade-down">
                            <div class="overflow-hidden flex flex-col">
                                <h3 class="mt-3 text-xl font-bold hover:text-gray-400">
                                    <a href="<?php echo $post_permalink; ?>">
                                        <?php echo $post_title; ?>
                                    </a>
                                </h3>
                                <p><?= wp_trim_words(
                                    $post_content,
                                    60,
                                    '...'
                                ) ?></p>
                            </div>
                        </div>
                    </div>
                </section>

    <?php
    }
    ?>

    <?php
    $arg = [
        'posts_per_page' => 3,
    ];
    $latestPosts = new WP_Query($arg);
    ?>

    <?php if ($latestPosts->have_posts()): ?>
        <!-- Latest blogs -->
        <section id="latest-blogs" class="py-8 md:pt-20 md:pb-16">

            <div class="container mx-auto text-center" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-8">Latest blogs</h2>

                <div class="mx-16 text-left relative flex flex-col flex-wrap md:flex-row md:-mx-4 space-y-8 md:space-y-0">

                    <?php while ($latestPosts->have_posts()):

                        $latestPosts->the_post();
                        $categories = get_the_category();
                        ?>

                        <?php get_template_part(
                            'template-parts/content',
                            'archive'
                        ); ?>

                        
                    <?php
                    endwhile; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <section id="contact-us" class="pt-16 pb-8 bg-gray-300">
        <div class="container mx-auto text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-8">Contact us</h2>
            <div class="px-8 md:px-0 md:w-1/2 mx-auto">
                <?php echo do_shortcode(
                    '[wpforms id="101"]'
                ); ?>            
            </div>
        </div>
    </section>

</main>

<?php get_footer();
?>
