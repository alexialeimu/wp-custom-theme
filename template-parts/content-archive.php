<div class="blog-card w-full md:w-1/3 mx-auto md:mx-0 relative px-4">
    <div class="w-full h-full">
        <a href="<?php echo esc_url(
            get_permalink()
        ); ?>" class="absolute w-full h-full top-0 left-0 z-10" aria-label="Open '<?php the_title(); ?>'"></a>
        <div class="w-100 h-100">
            <div class="h-42 overflow-hidden">
                <?php if (has_post_thumbnail()): ?>
                    <?php $thumbnail_url = get_the_post_thumbnail_url(
                        get_the_ID(),
                        'large'
                    ); ?>
                    <img src="<?php echo esc_url(
                        $thumbnail_url
                    ); ?>" alt="" />
                <?php else: ?>
                    <?php $image_url = get_theme_file_uri(
                        'assets/images/background.jpeg'
                    ); ?>
                    <img src="<?php echo esc_url(
                        $image_url
                    ); ?>" alt="Reference Image">
                <?php endif; ?>
            </div>
            <h3 class="mt-3 text-xl font-bold"><?php the_title(); ?></h3>
            <div class="text-slate-400 mt-6 text-xs uppercase tracking-wider">
                <?php echo get_the_date('d.m.Y'); ?>
                    |
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        $category_name = $categories[0]->name;
                        echo $category_name;
                    }
                    ?>
            </div>
        </div>
    </div>
</div>