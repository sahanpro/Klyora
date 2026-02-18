<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
    <!-- Comment -->
<?php if ( have_comments() ) : ?>
<div class="col-md-6">
        <?php wp_list_comments('callback=perukar_theme_comment'); ?>
    </div>
<?php endif; ?>     
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
$aria_req = ( $req ? " aria-required='true'" : '' );
$comment_args = array(
        'id_form' => 'contact_form',        
        'class_form' => 'row',                         
        'title_reply'=> wp_specialchars_decode(esc_html__( 'Leave A Comment', 'perukar' ),ENT_QUOTES),
        'fields' => apply_filters( 'comment_form_default_fields', array(
              
            'author' => '
                        <div class="col-md-6">
                          <input type="text" name="author" placeholder="'.esc_attr__('Name *', 'perukar').'" required="'.esc_attr__('required', 'perukar').'" data-error="'.esc_attr__('Name is required.', 'perukar').'">
                         </div>',
            'email' => '
                        <div class="col-md-6">
                             <input type="email" name="email" placeholder="E-mail *" required="'.esc_attr__('required', 'perukar').'" data-error="'.esc_attr__('Valid email is required.', 'perukar').'">
                             <div class="help-block with-errors"></div>
                        </div>',
        ) ),   
          'comment_field' => '<div class="col-md-12">
                                <textarea id="message"  name="comment" id="message" cols="40" rows="4" placeholder="'.esc_attr__('Write A Comment', 'perukar').'" required="'.esc_attr__('required', 'perukar').'" data-error="'.esc_attr__('Please,leave us a message.', 'perukar').'"></textarea>
                                  <div class="help-block with-errors"></div>
                              </div>
                              ', 
                
         'label_submit' => esc_html__( 'Post A Comment', 'perukar' ),
         'submit_button' =>  '<button class="button-4 %3$s" name="%1$s" id="submit %2$s" type="submit"><span>%4$s</span></button>',
        'submit_field' => '<div class="col-md-12">
                                %1$s %2$s
                            </div>',
         'comment_notes_before' => '',
         'comment_notes_after' => '',               
)
?>
<div class="col-md-5 offset-md-1 mb-30">
    <?php if ( comments_open() ) : ?>
        <?php comment_form($comment_args); ?>
    <?php endif; ?> 
</div>