<?php get_header(); ?>	
<?php $shortname = "pixel_theme"; ?>
<div id="slideshow_cont">
	<div class="flicker-example fullplate" data-block-text="false">
		
		<ul>			
			<?php
			$slider_arr = array();
			$x = 0;
			$args = array(
				 //'category_name' => 'blog',
				 'post_type' => 'post',
				 'meta_key' => 'ex_show_in_slideshow',
				 'meta_value' => 'Yes',
				 'posts_per_page' => 99
				 );
			query_posts($args);
			while (have_posts()) : the_post(); 
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
				//$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
				$img_url = $thumb['0']; 
			?>		
				<li data-background="<?php echo $img_url; ?>" onclick="location.href='<?php the_permalink(); ?>';" style="cursor:pointer;">
				
					
				</li>		
			<?php array_push($slider_arr,get_the_ID()); ?>
			<?php $x++; ?>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>                                    		
	
		</ul>
		
	</div>
</div> <!-- //slideshow_cont -->
<div id="content">
	<div class="container">
		<div class="home_featured">
			<?php echo stripslashes(stripslashes(get_option($shortname.'_featured_text',''))); ?>
		</div> <!-- //home_featured -->
		<div class="clear"></div>
	</div> <!-- //container -->
	<div id="home_cont">
		<div id="stalac_cont">
		
			<?php
			$category_ID = get_category_id('blog');
			$args = array(
			'category_name' => 'noposts',
				 'post_type' => 'post',
				 'posts_per_page' => 3,
				 'post__not_in' => $slider_arr,
				 'cat' => '-' . $category_ID
				 );
			query_posts($args);
			while (have_posts()) : the_post(); ?>	
			
				<div class="item stalac_box">
					<span class="stalac_box_img">
						<?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>
							<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>" frameborder="0" allowfullscreen></iframe>
						<?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>
							<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=03b3fc" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
						<?php } else { ?>
							<?php //the_post_thumbnail('stalac-image'); ?>
							<?php the_post_thumbnail('large'); ?>
							<a class="stalac_box_hover" href="<?php the_permalink(); ?>">
								<span class="stalac_box_hover_inside_tbl">
									<span class="stalac_box_hover_inside_row"><span class="stalac_box_hover_inside_cell stalac_box_hover_inside_cell2"></span></span>
									<span class="stalac_box_hover_inside_row">
										<span class="stalac_box_hover_inside_cell stalac_box_hover_inside_cell3"></span>
										<span class="stalac_box_hover_inside_cell">
											<h3><?php the_title(); ?></h3>
											
										</span> <!-- //stalac_box_hover_inside_cell -->
										<span class="stalac_box_hover_inside_cell stalac_box_hover_inside_cell3"></span>
									</span> <!-- //stalac_box_hover_inside_row -->
									<span class="stalac_box_hover_inside_row"><span class="stalac_box_hover_inside_cell stalac_box_hover_inside_cell2"></span></span>
								</span> <!-- //stalac_box_hover_tbl -->
							</a> <!-- //stalac_box_hover -->
						<?php } ?>												
					</span> <!-- //stalac_box_img -->
					
				</div> <!-- //stalac_box -->
			
			<?php endwhile; ?>
			 <?php wp_reset_query(); ?>                                   				
		
		</div><!--//stalac_cont-->	
	</div> <!-- //home_cont -->
</div> <!-- //content -->
<?php get_footer(); ?> 		