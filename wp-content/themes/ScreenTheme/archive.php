<?php get_header(); ?>	
<div id="content">
	
	<div class="container">
		<?php if(is_category()) { ?>
		<div class="archive_title">
			
			<div class="clear"></div>
		</div><!--//archive_title-->
		<?php } ?>	
	</div> <!-- //container -->
	<div id="home_cont">
		<div id="stalac_cont">
		
			<?php
			global $wp_query;
			//if(is_paged()) {
				//$args = array_merge( $wp_query->query, array( 'posts_per_page' => 2 ) );
			//} else {
				$args = array_merge( $wp_query->query, array( 'posts_per_page' => -1 ) );
			//}
			query_posts( $args );        
			$x = 0;
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
		
		</div><!--//stalac_cont-->	
	</div> <!-- //home_cont -->
</div><!--//content-->
<?php get_footer(); ?> 		