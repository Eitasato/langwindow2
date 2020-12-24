<?php get_header(); ?>
        <!--wrapperー-->
        <div id="wrapper">

            <!--メイン-->

            <div id="main">
                <!--仕事メニューのリスト-->
                <article>
                  <section>
                    <h3>得意なこと</h3>
                    <p>言語化相談窓口では、ヒアリング・ライティング・コーチングのスキルを組み合わせてお仕事をします。未だ発見できていない課題や可能性を発掘し、個人や組織の成長をお手伝いします。</p>
                  </section>
                  <section class="menu">
                    <div class="menu_item">
                          <img src="<?php bloginfo('template_url'); ?>/images/strangth1_1.jpg" alt="ヒアリング"/>
						<h4>ヒアリング</h4>
                          <p>「相談している間に悩みごとが解決した」という体験をしたことはありませんか。ヒアリングによって悩みごとを明確にし、依頼者のアタマの中がクリアになっていくことを目指します。</p>
                    </div>
                    <div class="menu_item">
                            <img src="<?php bloginfo('template_url'); ?>/images/strangth2.jpg" alt="ライティング"/>
                            <h4>ライティング</h4>
                            <p>ヒアリングによって明らかになった課題をライティングによって解決します。1000本以上のコンテンツ制作経験や20名以上の編集指導経験を活かし、読み手の心を引き付けます。</p>
                    </div>
                    <div class="menu_item">
                            <img src="<?php bloginfo('template_url'); ?>/images/strangth3.jpg" alt="コーチング"/>
                                <h4>コーチング</h4>
                                <p>読み書きの基礎力向上を支援します。文章力を向上させたい、情報発信の仕組みを社内で構築したい、コミュニケーションコストを削減したい、といった課題の解決にも役立ちます。</p>
                    </div>
                  </section>
                </article>
                <!--仕事メニューのリスト-->
				        <!--contents-->
    <div itemscope itemtype="http://schema.org/mainContentOfPage">
        <div id="contents">
		<!--blogs -->
			<section class="container">
			<article>
			<div class ="blog">
			<h3>ブログ</h3>
			<p>どのようなことを考えて仕事に取り組んでいるのか、上記の得意を組み合わせて携わった業務、過去にいただいた質問への回答などを書いています。ご依頼の仕方や実際の業務のススメ方などを浮かべることにお役立て下さい。</p>
			</div>
			</article>
				<div class="row row-cols-1 row-cols-md-3">
					<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post(); ?>
						<div class="col">
						<div class="card">
							<div class="card-body">
								<div>
								<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5><span style="float: right" class="card-text"><?php the_time('Y/m/d'); ?></span>
								</div>
								<p style="clear: right" class="card-text"><?php the_excerpt(); ?></p>
								<span style="float:right"><a href="<?php the_permalink(); ?>" class="card-link">この記事を読む</a></span>
							</div>
						</div>
				</div>
		<?php endwhile; ?>
		<?php endif; ?>
				</div>
		</section>
		<!--/news -->
        </div>
    </div>
        <!--/contents-->

            </div>
            <!--/メイン-->
			<?php get_sidebar(); ?>
          </div>
        <!--/wrapperー-->
        <!--フッター-->
<?php get_footer(); ?>
