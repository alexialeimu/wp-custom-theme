<div class="container mx-auto space-y-8">
    <div class="text-center w-3/4 mx-auto space-y-8">
        <h1 class="text-3xl md:text-5xl font-bold"><?php the_title(); ?></h1>
    </div>
    <?php if (has_post_thumbnail()): ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>
    <div class="w-3/4 mx-auto">
        <div class="space-y-6">
            <?php the_content(); ?>
        </div>
    </div>
</div>