<?php
if (post_password_required()) {
    return;
} ?>


    <?php if (have_comments()): ?>
        <hr class="h-px my-8 bg-gray-200 border-0">

<div id="comments" class="comments-area space-y-8">
        <h3 class="mt-3 text-xl font-bold text-center">
            <?php $comment_count = get_comments_number(); ?>
            
            <?php if ($comment_count == 1) {
                echo '1 Comment';
            } else {
                echo $comment_count . ' Comments';
            } ?>
        </h3>

        <ol class="comment-list space-y-4">
            <?php wp_list_comments([
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
                'callback' => 'custom_comment_callback',
            ]); ?>
        </ol>

        <?php the_comments_pagination([
            'prev_text' => '&laquo; Previous',
            'next_text' => 'Next &raquo;',
        ]); ?>

        </div>

    <?php endif; ?>

    <?php
    $required_text = ' ' . __('Required fields are marked *');
    comment_form([
        'title_reply_before' =>
            '<h3 id="reply-title" class="comment-reply-title mt-8 mb-4 text-xl font-bold text-center">',
        'title_reply_after' => '</h3>',
        'comment_field' =>
            '<p class="comment-form-comment"><label for="comment">' .
            _x('Comment', 'noun') .
            '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required="required"></textarea></p>',
        'comment_notes_before' =>
            '<p class="comment-notes mb-4">' .
            __('Your email address will not be published.') .
            ($req ? $required_text : '') .
            '</p>',
        'comment_notes_after' => '',
        'class_submit' => 'btn btn-primary mt-4 bg-sky-700',
        'label_submit' => __('Submit'),
        'cancel_reply_link' => __('Cancel reply'),
    ]);
    ?>

<?php function custom_comment_callback($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>

    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-body flex flex-row bg-slate-100 p-8 space-x-4">
            <div class="shrink-0">
                <?php if (0 != $args['avatar_size']) {
                    echo get_avatar($comment, $args['avatar_size']);
                } ?>
            </div>
            <div class="space-y-2">
                <div class="flex flex-row justify-between">
                    <div>
                        <b class="fn"><?php echo get_comment_author_link(); ?></b>
                        <span class="text-slate-400 ml-2 text-xs tracking-wider"><?php echo get_comment_date(
                            'd.m.Y'
                        ); ?>, <?php echo date('H:i', strtotime(get_comment_time())); ?></<span>
                    </div>
                    <div class="text-slate-400 text-xs flex"><?php edit_comment_link(
                        'Edit',
                        '<span class="edit-link self-center">',
                        '</span>'
                    ); ?></div>
                </div>
                <div>
                    <?php comment_text(); ?>
                </div>
            </div>
        </div>
        <?php if ('0' == $comment->comment_approved): ?>
            <div class="bg-blue-100 border-t border-b  text-sky-900 px-4 py-3" role="alert">
                <p class="text-sm">Your comment is awaiting moderation.</p>
            </div>
        <?php endif; ?>
    </li>   
    <?php
}
?>
