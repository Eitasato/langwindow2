<?php get_header(); ?>
        <!--トップ画像-->
        <div id="top_image">
            <p><img src="images/top4.jpg" alt="言語相談窓口"></p>
        </div>
        <!--/トップ画像-->

        <!--wrapperー-->
        <div id="wrapper">

            <!--メイン-->

            <div id="main">
              <div id="breadcrumb">
                  <ol>
                      <li><a href="index.html">トップ</a></li>
                  </ol>
              </div>

                <!--仕事メニューのリスト-->
                <article>
                  <section>
                    <h2>得意なこと</h2>
                    <p>言語化相談窓口では、ヒアリング・ライティング・コーチングのスキルを組み合わせてお仕事をします。未だ発見できていない課題や可能性を発掘し、個人や組織の成長をお手伝いします。</p>
                  </section>
                  <section class="menu">
                    <div class="menu_item">
                          <img src="images/strangth1_1.jpg" alt="ヒアリング"/>
                          <h3>ヒアリング</h3>
                          <p>「相談している間に悩みごとが解決した」という体験をしたことはありませんか。ヒアリングによって悩みごとを明確にし、依頼者のアタマの中がクリアになっていくことを目指します。</p>
                    </div>
                    <div class="menu_item">
                            <img src="images/strangth2.jpg" alt="ライティング"/>
                            <h3>ライティング</h3>
                            <p>ヒアリングによって明らかになった課題をライティングによって解決します。1000本以上のコンテンツ制作経験や20名以上の編集指導経験を活かし、読み手の心を引き付けます。</p>
                    </div>
                    <div class="menu_item">
                            <img src="images/strangth3.jpg" alt="コーチング"/>
                                <h3>コーチング</h3>
                                <p>読み書きの基礎力向上を支援します。文章力を向上させたい、情報発信の仕組みを社内で構築したい、コミュニケーションコストを削減したい、といった課題の解決にも役立ちます。</p>
                    </div>
                  </section>
                </article>
                <!--仕事メニューのリスト-->
            </div>
            <!--/メイン-->
            <?php get_sidebar(); ?>
          </div>
        <!--/wrapperー-->
        <!--contents-->
        <div id="contents">
		<!--news -->
			<div id="news" class="box">
			<div class="section-header">
			<h2>News</h2>
			</div>
			<?php if(have_posts()): ?>
			<dl>
			<?php while(have_posts()): the_post(); ?>
				<dt><?php the_time('Y/m/d'); ?></dt>
				<?php
					$cats = get_the_category();
					$cats = $cats[0];
				?>
				<dd class="<?php echo $cats->category_nicename; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></dd>
			<?php endwhile; ?>
			</dl>
			<?php endif; ?>
			</div>
		<!--/news -->
        </div>
        <!--/contents-->
        <!--フッター-->
<?php get_footer(); ?>