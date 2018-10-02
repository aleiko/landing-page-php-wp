<div class="container">
	<hr>
	<div class="contact-info" id="contact">
		<div class="row">
			<div class="col-md-6">
				<?php if($title = get_field('contacts_title', 'options')):?>
				<h2><?php echo $title;?></h2>
				<?php endif;?>
				<div class="row">
					<div class="col-sm-6">
						<?php if($title = get_field('opening_hours_text', 'options')):?>
						<h3><?php echo $title;?></h3>
						<?php endif;?>
						<?php if($hours = get_field('opening_hours', 'options')):?>
							<?php foreach ($hours as $hour):?>
							<div class="group">
								<?php if($hour['day']):?>
								<span class="str"><?php echo $hour['day'];?></span>
								<?php endif;?>
								<?php if($hour['hour']):?>
								<em class="str"><?php echo $hour['hour'];?></em>
								<?php endif;?>
							</div><!-- / group -->
							<?php endforeach;?>
						<?php endif;?>
					</div><!-- / col -->
					<div class="col-sm-6">
						<h3><?php _e('Address','idl');?></h3>
						<?php if($address = get_field('address', 'options')):?>
						<div class="group">
							<?php echo $address;?>
						</div><!-- / group -->
						<?php endif;?>
						<h3><?php _e('Contact','idl');?></h3>
						<?php if($phones = get_field('phones', 'options')):?>
						<?php foreach ($phones as $phone):?>
						<span class="str"><?php _e('T.', 'idl');?> <a href="<?php echo $phone['phone']['url'];?>"><?php echo $phone['phone']['title'];?></a></span>
						<?php endforeach;?>
						<?php endif;?>
						<?php if($links = get_field('links', 'options')):?>
							<?php foreach ($links as $link):?>
							<span class="str">
								<a href="<?php echo $link['link']['url'];?>" target="<?php echo $link['link']['target'];?>"><?php echo $link['link']['title'];?></a>
							</span>
							<?php endforeach;?>
						<?php endif;?>
						<?php if($socials = get_field('socials', 'options')):?>
						<hr>
						<ul class="socials">
							<?php foreach ($socials as $social):?>
							<li><a href="<?php echo $social['link']['url'];?>" target="<?php echo $social['link']['target'];?>">
								<span class="ico">
                                <img src="<?php echo $social['image']['url'];?>" alt="<?php echo $social['image']['alt'];?>">
								</span><?php echo $social['link']['title'];?></a></li>
							<?php endforeach;?>
						</ul>
						<?php endif;?>
					</div><!-- / col -->
				</div><!-- / row -->
			</div><!-- / col -->
			<?php

			$location = get_field('map', 'options');

			if( !empty($location) ):
			?>
			<div class="col-md-6">
				<div class="map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
			</div><!-- / col -->
			<?php endif;?>
		</div><!-- / row -->
	</div><!-- / contact-info -->
</div>