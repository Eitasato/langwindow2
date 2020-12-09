<!--サイドバー-->
               <aside id="sidebar">
                   <section id="profile">
                     <img src="<?php bloginfo('template_url'); ?>/images/profile.jpg" alt="">
                   <h4>運営者</h4>
                   <p>佐藤英太（さとうえいた）</p>
                   <p>2014年よりWebライターとして活動開始。ライティング・編集・編集指導（コーチング）の業務に携わる。読みやすく、内容が伝わりやすいライティングが得意。記事制作数は1000本ほどで、編集指導経験は20名程度。趣味はHip-Hopダンスと読書。興味関心の幅が比較的広く「話が早くて助かる」という評価をいただくことも。</p>
                   </section>
				   <!-- secondary -->
				   <aside id="secondary">
					   <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
					   <?php dynamic_sidebar( 'sidebar' ); ?>
					   <?php endif; ?>
				   </aside>
				   <!-- secondary -->
               </aside>
           <!--/サイドバー-->
