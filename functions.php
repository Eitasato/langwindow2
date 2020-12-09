<?php
function my_scripts() {
  wp_enqueue_style( 'style-name', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all' );
//wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/setting.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

function new_excerpt_length($length) {
     return 50; //抜粋する文字数を50文字に設定
}
add_filter('excerpt_length', 'new_excerpt_length',999);

?>

<?php 
	// サイトナビゲーションメニュー
	register_nav_menus(array(
							'nav' => 'グロナビ',
							'snav' => 'サイドナビ'));
	register_nav_menus(array('fnav' => 'フッターナビ'));

	//エディタ用スタイルシート
	add_editor_style();
?>

<?php
/**
* ウィジェットの登録
*
* @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
*/
function my_widget_init() {
register_sidebar(
array(
'name' => 'サイドバー', //表示するエリア名
'id' => 'sidebar', //id
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<div class="widget-title">',
'after_title' => '</div>',
)
);
}
add_action( 'widgets_init', 'my_widget_init' );
?>

<?php
// カスタム投稿タイプの追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
	$labels =array(
		'name' => '実績', //管理画面上で表示する投稿タイプ名
		'singular_name' =>'works' //カスタム投稿の識別名
	);
	
	$args = array(
	'labels' => $labels,
	'public'        => true,  // 投稿タイプをpublicにするか
	'has_archive'   => false, // アーカイブ機能ON/OFF
	'menu_position' => 5,     // 管理画面上での配置場所
	'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
	);
	register_post_type( 'works', $args);
}

// URL構造のリセット
global $wp_rewrite;
$wp_rewrite->flush_rules();

?>

<?php

function is_mobile(){
$useragents = array(
 'iPhone', // iPhone
 'iPod', // iPod touch
 'Android.*Mobile' , // 1.5+ Android *** Only mobile
 'Windows.*Phone', // *** Windows Phone
 'dream', // Pre 1.5 Android
 'CUPCAKE', // 1.5+ Android
 'blackberry9500', // Storm
 'blackberry9530', // Storm
 'blackberry9520', // Storm v2
 'blackberry9550', // Storm v2
 'blackberry9800', // Torch
 'webOS', // Palm Pre Experimental
 'incognito', // Other iPhone browser
 'webmate' // Other iPhone browser

);
$pattern = '/'.implode( '|' , $useragents).'/i' ;
return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}
?>