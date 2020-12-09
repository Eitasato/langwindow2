<DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
        <title>言語化相談窓口</title>
        <link rel="stylesheet" href="css/style.css">
		 <!-- Bootstrap CSS -->
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php wp_head(); ?>
    </head>
    <body>
        <!--ヘッダー-->
        <header>
      	<!--ハンバーガメニュー-->
			<?php if ( is_mobile() ) : ?>
			<div id="nav-drawer">
				<input id="nav-input" type="checkbox" class="nav-unshown">
				<label id="nav-open" for="nav-input"><span></span></label>
				<label class="nav-unshown" id="nav-close" for="nav-input"></label>
				<h2>言語化相談窓口</h2>
				<p>個人や組織の成長を「言葉の力」によって支援します。</p>
				<div id="nav-content">
					
						<?php wp_nav_menu(
						array (
							//カスタムメニュー名
							'theme_location' => 'nav',
							//コンテナを表示しない
							'container' => false,
							//カスタムメニューを設定しない際に固定ページでメニューを作成しない
							'fallback_cb' => false,
							//出力されるulに対してidやclassを表示しない
							'items_wrap' => '<ul>%3$s</ul>',
						)
					); ?>
			<!--
					<ul>
						<li class="current"><a href="index.html">トップ</a></li>
						<li><a href="http://langwindow.local/menu/">仕事メニュー</a></li>
						<li><a href="http://langwindow.local/portfolio/">実績一覧</a></li>
						<li><a href="http://langwindow.local/form/">お問い合わせ</a></li>
						<li><a href="http://eitasatou.com/">ブログ（外部サイト）</a></li>
					</ul>
-->
				</div>
			</div>
			<!--/ハンバーガメニュー-->
			<?php else: ?>
			<h2>言語化相談窓口</h2>
			<p>個人や組織の成長を「言葉の力」によって支援します。</p>
			<nav id="global_navi">
			<!-- Navigation -->
			<?php wp_nav_menu(
			array (
				//カスタムメニュー名
				'theme_location' => 'nav',
				//コンテナを表示しない
				'container' => false,
				//カスタムメニューを設定しない際に固定ページでメニューを作成しない
				'fallback_cb' => false,
				//出力されるulに対してidやclassを表示しない
				'items_wrap' => '<ul>%3$s</ul>',
			)
		); ?>
			</nav>
					<?php if(is_home()): ?>
			<img src="<?php bloginfo('template_url'); ?>/images/top4.jpg" alt="" />
			<?php else: ?>
				<!--<img src="<?php bloginfo('template_url'); ?>/images/gra_news.jpg" width="960" height="70" alt="" />-->
			<?php endif; ?>	
			<div class="breadcrumbs" vocab="https://schema.org/" typeof="BreadcrumbList" >
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
			<?php endif; ?>	
		</header>	
        <!--/ヘッダー-->
