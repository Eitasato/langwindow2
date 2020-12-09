<?php get_header(); ?>
<!--wrapperー-->
<div id="wrapper">
  <!--メイン-->
  <div id="other">
<!--blogs -->
  <section class="container">
  <article>
  <h3>支援実績</h3>
  <p>ライティング・コーチング・コンサルティング業務によって支援したメディア・事業さまと担当業務をご紹介します。</p>
  </article>
	  <?php
	  $cat_posts = get_posts(array(
		  'post_type' => 'works', // 投稿タイプ
		  'posts_per_page' => 6, // 表示件数
		  'orderby' => 'date', // 表示順の基準
		  'order' => 'DESC' // 昇順・降順
	  ));?>
	  <?php global $post; ?>
	  <div class="row row-cols-1 row-cols-md-3"> 	  
	  <?php if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>
	  <!-- ループはじめ -->
	  <div class="col">
		  <div class="card">
			  <div class="card-body">
				  <div>
            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5><span style="float: right" class="card-text"><?php the_time('Y/m/d'); ?></span>
				  </div>
            <p style="clear: right" class="card-text"><?php the_excerpt(); ?></p>
            <span style="float:right"><a href="<?php the_permalink(); ?>" class="card-link">詳細を読む</a></span>
			  </div>
		  </div>
		  </div>
	   
	  <!-- ループおわり --> 
<?php endforeach; endif; wp_reset_postdata(); ?>
</div>		  
</section>
<!--/news -->

  </div>
  <!--/メイン-->
</div>
<!--/wrapperー-->
<!--フッター-->
<?php get_footer(); ?>
