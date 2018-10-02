<?php if($slides = get_field('slider')):?>
<div class="visual">
    <?php foreach ($slides as $slide):?>
	<div class="slide-item">
		<figure class="bg-img"><img src="<?php echo $slide['url']?>" alt="<?php echo $slide['alt']?>"></figure>
	</div><!-- / slide-item -->
    <?php endforeach;?>
</div><!-- / visual -->
<?php endif;?>