<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<?php if(have_posts()):?>
		<?php while(have_posts()): the_post();?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<figure>
						<?php if($img = get_the_post_thumbnail()):?>
							<div class="img">
								<?php echo $img;?>
							</div><!-- end img -->
						<?php endif;?>
						<figcaption>
							<h3><?php the_title();?></h3>
							<?php if($content = get_the_content()):?>
							<?php endif;?>
						</figcaption>
					</figure><!-- end route-info -->
					<?php if($content = get_the_content()):?>
						<?php the_content();?>
					<?php endif;?>
				</div>
			</div>
		</div>
		<?php endwhile;?>
<?php else:?>
	<?php get_template_part('template-parts/content', 'none');?>
<?php endif;?>

<?php get_footer();
