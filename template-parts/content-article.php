<div class="container mx-auto space-y-8" data-aos="fade-up">
    <div class="text-center w-3/4 mx-auto space-y-6">
        <div class="text-slate-400 text-xs uppercase tracking-wider"><span><?php echo get_the_date(
            'd.m.Y'
        ); ?></span> | <span><?php the_category(', '); ?></span></div>
        <h1 class="text-3xl md:text-5xl font-bold"><?php the_title(); ?></h1>
    </div>
    <?php if (has_post_thumbnail()): ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>
    <div class="px-8 md:px-0 w-full md:w-3/4 mx-auto">

        <div class="space-y-6">
            <?php the_content(); ?>
        </div>

        <?php
        $tags = get_the_tags();

        if ($tags) {
            // Check if there are tags
            echo '<div class="tag-list pt-8 space-x-4">'; // Start a container for the tags

            foreach ($tags as $tag) {
                $tag_link = get_tag_link($tag->term_id); // Get the tag's permalink
                $tag_name = $tag->name; // Get the tag's name

                // Output the tag with a custom CSS class
                echo '<div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 rounded-full bg-white text-gray-700 border"><a href="' .
                    esc_url($tag_link) .
                    '" class="custom-tag-class">' .
                    esc_html($tag_name) .
                    '</a></div>';
            }

            echo '</div>';
        }
        ?>

        <div>
            <?php comments_template(); ?>
        </div>
    </div>
</div>