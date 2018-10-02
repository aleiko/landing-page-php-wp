<li>
	<a href="<?php the_permalink()?>">
		<figure>
			<?php if($img = get_the_post_thumbnail()):?>
				<div class="img">
					<?php echo $img;?>
				</div><!-- end img -->
			<?php endif;?>
			<figcaption>
				<h3><?php the_title();?></h3>
				<?php if($content = get_the_content()):?>
					<p><?php echo custom_excerpt(147, $content);?></p>
				<?php endif;?>
			</figcaption>
		</figure><!-- end route-info -->
		<div class="btn-row">
			<span class="btn btn-primary"><?php _e('Ver mais', 'idl');?></span>
		</div><!-- end btn-row -->
	</a><!-- end route-box -->
</li>