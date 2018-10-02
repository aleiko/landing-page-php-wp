<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Idl
 */
?>

<?php get_template_part('template-parts/content-contact');?>

<footer id="footer">
    <div class="container">
        <div class="row row-flex">
            <div class="col-md-3 col-sm-6">
                <strong class="logo"  style="background-image: url(<?php echo get_theme_mod( 'idl_theme_footer_logo' ) ?>);"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="sr-only"><?php echo get_bloginfo('name');?></span></a></strong>
            </div><!-- / col -->
            <?php if($address = get_field('address', 'options')):?>
            <div class="col-md-3 col-sm-6">
                <address>
                    <?php echo $address;?>
                </address>
            </div><!-- / col -->
            <?php endif;?>
	        <?php if($links = get_field('links', 'options')):?>
            <div class="col-md-3 col-sm-6">
                <div class="group">
                    <?php foreach ($links as $link):?>
                    <p><a href="<?php echo $link['link']['url'];?>" target="<?php echo $link['link']['target'];?>"><?php echo $link['link']['title'];?></a></p>
                    <?php endforeach;?>
                </div>
            </div><!-- / col -->
	        <?php endif;?>
	        <?php if($socials = get_field('socials', 'options')):?>
            <div class="col-md-3 col-sm-6">
                <ul class="socials">
                    <?php foreach ($socials as $social):?>
                    <li><a href="<?php echo $social['link']['url'];?>" target="<?php echo $social['link']['target'];?>">
                            <span class="ico">
                                <img src="<?php echo $social['image']['url'];?>" alt="<?php echo $social['image']['alt'];?>">
                            </span><?php echo $social['link']['title'];?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div><!-- / col -->
            <?php endif;?>
        </div><!-- / row -->
    </div><!-- / container-fluid -->
</footer><!-- / footer -->
<?php wp_footer(); ?>
</body>
</html>