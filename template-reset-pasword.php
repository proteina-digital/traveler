<?php
/**
 * Template Name: Reset Password
 */
get_header("full");
?>
<div class="pd-single-form-reset">
    <form action="" class="form-reset-password" method="post">
        <?php 
            while( have_posts() ): the_post();
        ?>
            <h3 class="text-center"><?php the_title(); ?></h3>
            <div class="description"><?php the_content(); ?></div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo STInput::request('email', ''); ?>">
            </div>
            <div class="form-group">
                <?php wp_nonce_field( 'security', 'security_field' ); ?>
                <input type="hidden" name="action" value="reset_password">
                <input class="btn btn-primary form-control" type="submit" name="submit" value="<?php echo __('Reset', 'traveler'); ?>">
            </div>
            <div class="form-group">
                <?php echo STTemplate::message(); ?>
            </div>
            <div class="form-group">
                <a class="link-logins" href="<?php echo home_url( '/' ); ?>"><i class="fa fa-long-arrow-left mr5"></i><?php echo __('back to Homepage', 'traveler'); ?></a>
            </div>
        <?php endwhile; ?>
    </form>
</div>
<?php  get_footer('full'); ?>
