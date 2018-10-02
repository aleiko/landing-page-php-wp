<?php
/**
 * Template name: Front page
 */

get_header(); ?>

<?php if(have_posts()):?>
    <?php while(have_posts()): the_post();?>

        <?php get_template_part('template-parts/slider-banner');?>

		<?php if( have_rows('flex_sections') ):

			// loop through the rows of data
            $section_counter = 1;

			$menu_identifier = '';

			while ( have_rows('flex_sections') ) : the_row();

				if( get_row_layout() == 'heading' ):
                    $text = get_sub_field('text');?>

                    <header class="heading" id="heading-<?php echo $section_counter;?>">
                        <div class="container">
                            <h2><?php echo $text;?></h2>
                        </div><!-- / container -->
                    </header><!-- / heading -->

                <?php elseif( get_row_layout() == 'about' ):
					$columns = get_sub_field('column');
                    if($columns):?>
                        <div class="container" id="about-<?php echo $section_counter;?>">
                            <hr>
                            <div class="row">
                        <?php foreach ($columns as $column):?>
                            <?php if($column['column_type'] == 'image'):?>
                            <?php if($column['image']):?>
                                <div class="col-md-4 col-lg-6">
                                    <figure class="full-size"><img src="<?php echo $column['image']['sizes']['about-size']?>" alt="<?php echo $column['image']['alt']?>"></figure>
                                </div><!-- / col -->
                            <?php endif;?>
                            <?php else:?>
                                <?php if($column['text']):?>
                                <div class="col-md-4 col-lg-3">
                                    <?php echo $column['text'] ;?>
                                </div><!-- / col -->
                                <?php endif;?>
                            <?php endif;?>
                        <?php endforeach;?>
                            </div>
                        </div><!-- / container -->
                    <?php endif;?>

				<?php elseif( get_row_layout() == 'menu' ):?>
                    <div class="container menu-section" id="menu-<?php echo $section_counter;?>">
                        <?php echo $menu_identifier != 'menu' ? '<hr>' : '';?>
                        <div class="menu-block">
                            <div class="row">
								<?php $title = get_sub_field('title');
								$col = '12';
								if ($title['text'] || $title['image']):
									$col = '9';?>
                                    <div class="col-md-3">
                                        <hr>
										<?php if($title['text']):?>
                                            <h2><?php echo $title['text'];?></h2>
										<?php endif;?>
										<?php if($title['image']):?>
                                            <figure class="full-size"><img src="<?php echo $title['image']['sizes']['menu-size'];?>" alt="<?php echo $title['image']['alt'];?>"></figure>
										<?php endif;?>
                                    </div><!-- / col -->
								<?php endif;?>
								<?php if($menus = get_sub_field('menu')):?>
                                    <div class="col-md-<?php echo $col;?>">
										<?php if($menus['menu_width'] == 'full'):?>
                                            <hr>
										<?php endif;?>
                                        <div class="<?php echo $menus['menu_width'] == 'full' ? 'cols' : 'row';?>">
											<?php if(!empty($menus['sub_menus'])):
//                                                $j = $menus['amount_in_col'];
                                                    $j = 1;
											    $i = 0;
												foreach ($menus['sub_menus'] as $k => $sub_menu):
													if($sub_menu['append'] > 1){
														$j = $sub_menu['append'];
                                                    }
                                                    $i += 1;?>
													<?php if($menus['menu_width'] !== 'full' && $i == 1):?>
                                                        <div class="col-sm-4">
                                                        <hr>
													<?php endif;?>

													<?php echo ($k > 0 && $menus['menu_width'] == 'full') ? '<hr>' : '';?>

													<?php if($sub_menu['title']):?>
                                                        <h3><?php echo $sub_menu['title'];?></h3>
													<?php endif;?>

													<?php if($sub_menu['items']):?>
                                                        <ul class="menu-list">
															<?php foreach ($sub_menu['items'] as $item):?>
																<?php if($item['name'] || $item['html'] || $item['table'] || !empty($item['note']['text'])):?>
                                                                    <li>
                                                                        <div class="menu-descr">
																			<?php if($item['name'] ):?>
                                                                                <span class="name"><?php echo $item['name'] ;?></span>
																			<?php endif;?>
																			<?php if($item['price']):?>
                                                                                <span class="price"><?php echo $item['price'];?></span>
																			<?php endif;?>
                                                                        </div>

																		<?php // HTML
																		if($item['add_html'] == 'html' && !empty($item['html'])):?>
																			<?php echo $item['html'];?>
																		<?php endif;?>

																		<?php //Table
																		if($item['add_html'] == 'table' && !empty($item['table'])):?>

                                                                            <table border="0">

																				<?php if ( $item['table']['header'] ):?>

                                                                                    <thead><tr>

																						<?php foreach ( $item['table']['header'] as $th ):?>
                                                                                            <th><?php echo $th['c'];?></th>
																						<?php endforeach;?>

                                                                                    </tr></thead>
																				<?php endif;?>

                                                                                <tbody>

																				<?php foreach ( $item['table']['body'] as $tr ) :?>

                                                                                    <tr>
																						<?php foreach ( $tr as $td ) :?>

                                                                                            <td><?php echo $td['c'];?></td>
																						<?php endforeach;?>
                                                                                    </tr>
																				<?php endforeach;?>

                                                                                </tbody>
                                                                            </table>

																		<?php endif;?>

																		<?php if($item['note']['text']):?>
																			<?php if($item['note']['italick']):?>
                                                                                <em><?php echo $item['note']['text'];?></em>
																			<?php else:?>
                                                                                <span class="str"><?php echo $item['note']['text'];?></span>
																			<?php endif;?>
																		<?php endif;?>
                                                                    </li>
																<?php endif;?>
															<?php endforeach;?>
                                                        </ul>
													<?php endif;?>

                                                    <!--     Download Links    -->
													<?php if($k+1 == count($menus['sub_menus'])):?>
														<?php if($menus['download_links']):?>
                                                            <ul class="links">
																<?php foreach ($menus['download_links'] as $link):?>
																	<?php if($link['link']['url'] && $link['link']['title']):?>
                                                                        <li><a href="<?php echo $link['link']['url'];?>" target="<?php echo $link['link']['target'];?>"><?php echo $link['link']['title'];?></a></li>
																	<?php endif;?>
																<?php endforeach;?>
                                                            </ul>
														<?php endif;?>
													<?php endif;?>
                                                    <!--    End Download Links    -->
													<?php if($menus['menu_width'] !== 'full' && ($i%$j == 0 || $k+1 == count($menus['sub_menus']))):?>
                                                        </div>
													<?php endif;?>
												<?php
                                                    if($i == $j){$i = 0;}
                                                endforeach;
											endif;?>
                                        </div><!-- / row -->
                                    </div><!-- / col -->
								<?php endif;?>
                            </div><!-- / row -->
                        </div><!-- / menu-block -->
                    </div><!-- / container -->
				<?php elseif( get_row_layout() == 'gallery' ):
                    $images = get_sub_field('gallery');
				    if($images):?>
                        <div class="container" id="gallery-<?php echo $section_counter;?>">
                            <div class="photo-block">
                            <hr>
                            <?php if($title = get_sub_field('title')):?>
                                <h2><?php echo $title;?></h2>
                            <?php endif;?>
                                <div class="photo-carousel">
                                <?php foreach ($images as $key => $image):?>
                                    <div class="slide-item">
                                        <a href="<?php echo $image['sizes']['gallery-size'];?>" data-fancybox="carousel-<?php echo $key;?>">
                                            <figure class="bg-img"><img src="<?php echo $image['sizes']['gallery-size'];?>" alt="<?php echo $image['alt'];?>"></figure>
                                        </a>
                                    </div><!-- / slide-item -->
                                <?php endforeach;?>
                                </div><!-- / photo-carousel -->
                            </div><!-- / photo-block -->
                        </div><!-- / container -->
                    <?php endif;?>
				<?php endif;
            $section_counter += 1;
			$menu_identifier = get_row_layout();
            endwhile;

		endif;?>

    <?php endwhile;?>
<?php else:?>
	<?php get_template_part('template-parts/content', 'none');?>
<?php endif;?>

<?php get_footer();