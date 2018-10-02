<?php
/**
 * The template for displaying archive pages
 */

get_header();?>

<?php if(have_posts()):?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
					<?php while ( have_posts() ) : the_post();?>
						<?php get_template_part('template-parts/content', 'loop');?>
					<?php endwhile;?>
                </ul>
				<?php the_posts_pagination();?>
            </div>
        </div><!-- end row -->
    </div><!-- container -->
<?php else:?>
	<?php get_template_part('template-parts/content', 'none');?>
<?php endif;?>

<?php get_footer();