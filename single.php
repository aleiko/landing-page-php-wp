<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

<?php if(have_posts()):?>
    <div class="main-area">
		<?php while(have_posts()): the_post();
			//Flex content start
			if(have_rows('flex_content_section')) {
				get_template_part( 'template-parts/flex-content' );
			}
		endwhile;?>
		<?php if(get_the_content()):?>
            <section class="legal-area">
                <div class="container">
					<?php the_content();?>
                </div>
            </section>
		<?php endif;?>
    </div><!-- end main-area -->
<?php else:?>
	<?php get_template_part('template-parts/content', 'none');?>
<?php endif;?>

<?php get_footer();
