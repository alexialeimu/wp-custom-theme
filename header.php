<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
    
</head>
<body>
    <a class="skip-to-content-link" href="#main-content" tabindex="0">
        Skip to content
    </a>

        <!-- Navigation -->
        <nav class="bg-transparent">
        <?php if (is_front_page()): ?>
            <div class="absolute left-0 right-0 py-6 z-10 text-white">
        <?php else: ?>
            <div class="left-0 right-0 py-6 z-10 bg-slate-700 text-white">
        <?php endif; ?>
            
                <div class="flex md:container mx-8 md:mx-auto justify-between items-center">
                    <?php if (function_exists('the_custom_logo')) {

                        $custom_logo_id = get_theme_mod(
                            'custom_logo'
                        );
                        $logo = wp_get_attachment_image_src(
                            $custom_logo_id
                        );
                        ?>
                        <?php
                        $base_url = home_url();

                        if ($logo): ?>
                            <a href="<?php echo esc_url(
                                $base_url
                            ); ?>" tabindex="0"><img src=<?php echo $logo[0]; ?> class="max-h-8" alt="<?php bloginfo(
     'name'
 ); ?>"></img></a>
 <?php endif;

                    } ?>
                    <?php wp_nav_menu([
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' =>
                            '<ul id="" class="nav-items hidden md:flex flex-column space-x-8 font-bold">%3$s</ul>',
                    ]); ?>
                    <!-- Hamburger Icon -->
                    <a id="menu-btn" class="block hamburger cursor-pointer w-6 h-6 md:hidden focus:outline-none self-end">
                        <span class="hamburger-top absolute top-0 left-0 w-6 h-0.5 bg-white"></span>
                        <span class="hamburger-middle absolute top-0 left-0 w-6 h-0.5 bg-white"></span>
                        <span class="hamburger-bottom absolute top-0 left-0 w-6 h-0.5 bg-white"></span>
                    </a>
                </div>

                <!-- Mobile Menu -->
                <div class="md:hidden">
                    <div id="menu" class="absolute text-black hidden p-8 mt-10 space-y-6 font-bold bg-white sm:w-auto left-6 right-6 drop-shadow-md z-30">
                        <?php wp_nav_menu([
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            'items_wrap' =>
                                '<ul id="" class="flex flex-col space-y-4">%3$s</ul>',
                        ]); ?>
                    </div>
                </div>
                
            </div>
        </nav>