
    <?php if (is_front_page()): ?>
         <footer class="bg-slate-800 text-slate-300 before:bg-gray-300 before:h-8 md:before:h-28 before:block">
    <?php else: ?>
         <footer class="bg-slate-800 text-slate-300 before:bg-white before:h-8 md:before:h-28 before:block">
    <?php endif; ?>
        <div class="-skew-y-[4deg] relative h-32 max-h-none w-full top-0 left-0 bg-slate-800 overflow-hidden origin-left p-24"></div>
        <div class="pb-8 md:pb-16 md:pt-8 -mt-32 relative z-10">
            
            <div class="container mx-auto px-8 md:px-0 flex flex-col md:flex-row justify-between space-y-8 md:space-y-0">
                <div class="space-y-8 basis-1/3">
                    <?php if (function_exists('the_custom_logo')) {

                        $custom_logo_id = get_theme_mod(
                            'custom_logo'
                        );
                        $logo = wp_get_attachment_image_src(
                            $custom_logo_id
                        );
                        ?>
                            <img src=<?php echo $logo[0]; ?> class="max-h-8"></img>
                    <?php
                    } ?>
                    <?php wp_nav_menu([
                        'menu' => 'footer',
                        'container' => '',
                        'theme_location' => 'footer',
                        'items_wrap' =>
                            '<ul id="" class="nav-items flex flex-col space-y-2">%3$s</ul>',
                    ]); ?>
                </div>
                <?php
                $column_2_title = get_theme_mod(
                    'theme_footer_column_2_title'
                );
                $column_2_body = get_theme_mod(
                    'theme_footer_column_2_body'
                );
                if ($column_2_title || $column_2_body): ?>
                    <div class="basis-1/3">
                        <?php if ($column_2_title): ?>
                        <h3 class="mt-3 text-xl font-bold"><?php echo $column_2_title; ?></h3>
                        <?php endif; ?>
                        <?php if ($column_2_body): ?>
                        <p><?php echo nl2br(
                            esc_html($column_2_body)
                        ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif;
                ?>
                <?php
                $column_3_title = get_theme_mod(
                    'theme_footer_column_3_title'
                );
                $column_3_body = get_theme_mod(
                    'theme_footer_column_3_body'
                );
                if ($column_3_title || $column_3_body): ?>
                    <div class="basis-1/3">
                        <?php if ($column_3_title): ?>
                        <h3 class="mt-3 text-xl font-bold"><?php echo $column_3_title; ?></h3>
                        <?php endif; ?>
                        <?php if ($column_3_body): ?>
                        <p><?php echo nl2br(
                            esc_html($column_3_body)
                        ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif;
                ?>
            </div>
        </div>
        <hr class="h-px md:mx-16 bg-slate-700 border-0">

        <?php $copyright_text = get_theme_mod(
            'theme_footer_copyright'
        ); ?>
        <div class="bg-slate-800 text-slate-400 text-xs py-4 tracking-wider">
            <div class="container mx-auto text-center">
                &copy; <?php echo date(
                    'Y'
                ); ?> <?php echo $copyright_text; ?>
            </div>
        </div>
    </footer>
    	
    <?php wp_footer(); ?>
</body>

</html>
