<?php get_header(); ?>
<!--<div class="container">-->
	<div id="wrapper" class="contents">
		<div id="main">
		<?php if(have_posts()) : ?>
		<article class="single-post">
			<?php while(have_posts()) : the_post(); ?>
			<?php
				$cats = get_the_category();
				$cats = $cats[0];
			?>
			<h3><span class="ttl-<?php echo $cats->category_nicename;?>"><?php the_title(); ?></span></h3>
			<p class="date">
				更新日： <?php the_time('Y/m/d'); ?>
			</p>
			<?php the_content(); ?>
		<?php endwhile; ?>	
		</article>
		<?php endif; ?>
		<div class="single-recommend">
			<span class="alignleft"><?php previous_post_link('&laquo; %link', '前の情報を見る' , TRUE); ?></span>		
			<span class="alignright"><?php next_post_link('%link &raquo;', '次の情報を見る' , TRUE) ?></span>		
		</div>
		</div>
	<!--end contents-->
	<?php get_sidebar(); ?>	
	</div>	
<!--</div>--><!--end container-->
<?php get_footer(); ?>