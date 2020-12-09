<!--フッター-->
<footer>
    <div id="footer_nav">
		<!-- Navigation -->
			<?php wp_nav_menu(
			array (
				//カスタムメニュー名
				'theme_location' => 'fnav',
				//コンテナを表示しない
				'container' => false,
				//カスタムメニューを設定しない際に固定ページでメニューを作成しない
				'fallback_cb' => false,
				//出力されるulに対してidやclassを表示しない
				'items_wrap' => '<ul>%3$s</ul>',
			)
	); ?>
    </div>
    <small>&copy; 2018 言語化相談窓口</small>
</footer>
<!--/フッター-->
<?php wp_footer(); ?>
</body>
</html>
