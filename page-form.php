<?php
//var_dump($_POST);
//変数の初期化
$page_flag =0;
$clean = array();
$error = array();

// サニタイズ
if( !empty($_POST) ) {
	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	}
}

if( !empty($_POST['btn_confirm'])){
  $error = validation($clean);

	if( empty($error) ) {
    $page_flag =1;

		// セッションの書き込み
		session_start();
		$_SESSION['page'] = true;
    }

}elseif( !empty($_POST['btn_submit'])){

	session_start();
	if( !empty($_SESSION['page']) && $_SESSION['page'] === true ) {

		// セッションの削除
		unset($_SESSION['page']);

    $page_flag = 2;

    //メール送信機能
    //変数とタイムゾーンを初期化
    $header = null;
		$body = null;
    $auto_reply_subject = null;
    $auto_reply_text = null;
    $admin_reply_subject = null;
    $admin_reply_text = null;

    date_default_timezone_set('Asia/Tokyo');

		//日本語の使用宣言
		mb_language("ja");
		mb_internal_encoding("UTF-8");


    //ヘッダー情報を設定
    $header = "MIME-Version: 1.0\n";
		$header = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
    $header .= "From: me@example.com\n";
    $header .= "Reply-To: me@example.com\n";

    //パラメータを指定
    $parameter="-f test@example.com";

    //件名を設定
    $auto_reply_subject = 'お問い合わせありがとうございます。';

    //本文を設定
    $auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。下記の内容でお問い合わせを受け付けました。\n\n";
    $auto_reply_text .= "お問い合わせ日時：" .date("Y-m-d H:i"). "\n";
    $auto_reply_text .= "お名前：" . $_POST['your_name'] . "さま"."\n";
    $auto_reply_text .= "メールアドレス：" . $_POST['email'] .  "\n\n";

$auto_reply_text .= "お問い合わせ内容：" . nl2br($_POST['contact']) . "\n\n";
    $auto_reply_text .= "＠言語化相談窓口". "\n\n";
		$auto_reply_text .= "※このメッセージは、自動返信メールです。担当より改めてご連絡差し上げます。";

		// テキストメッセージをセット
		$body = "--__BOUNDARY__\n";
		$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
		$body .= $auto_reply_text . "\n";
		$body .= "--__BOUNDARY__\n";

    //自動返信メール送信
    mb_send_mail( $_POST['email'], $auto_reply_subject, $body, $header);

    //運営側へのメール送信処理
    // 運営側へ送るメールの件名
    $admin_reply_subject = "お問い合わせを受け付けました";

    // 本文を設定
    $admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
    $admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
    $admin_reply_text .= "お名前：" . $_POST['your_name'] . "\n";
    $admin_reply_text .= "メールアドレス：" . $_POST['email'] . "\n\n";

		$admin_reply_text .= "お問い合わせ内容：" . nl2br($_POST['contact']) . "\n\n";

		// テキストメッセージをセット
		$body = "--__BOUNDARY__\n";
		$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
		$body .= $admin_reply_text . "\n";
		$body .= "--__BOUNDARY__\n";

    // 管理者へメール送信
    mb_send_mail( 'miyadeek@gmail.com', $admin_reply_subject, $admin_reply_text, $header);

	} else {
		$page_flag = 0;
	}
}

//バリデーション関数
function validation($data) {

	$error = array();

	// お名前のバリデーション
	if( empty($data['your_name']) ) {
		$error[] = "「お名前」は必ず入力してください。";
	}elseif( 20 < mb_strlen($data['your_name']) ) {
		$error[] = "「お名前」は20文字以内で入力してください。";
	}

  // メールアドレスのバリデーション
  if( empty($data['email']) ) {
  $error[] = "「メールアドレス」は必ず入力してください。";
}elseif( !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email']) ) {
		$error[] = "「メールアドレス」は正しい形式で入力してください。";
	}

  // お問い合わせ内容のバリデーション
  if( empty($data['contact']) ) {
    $error[] = "「お問い合わせ内容」は必ず入力してください。";
  }

	return $error;
}

?>

<!DOCTYPE>
<html lang="ja">
    <head>
			<meta charset="UTF-8">
			<title>言語化相談窓口</title>
			<link rel="stylesheet" href="css/style.css">
			<style rel="stylesheet" type"text/css">
			        input[type=text]{
			                padding: 5px 10px;
			                font-size: 86%;
			                border: none;
			                border-radius: 3px;
			                background: #ddf0ff;
											/*影をつける*/
											-moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2);
											-webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2);
											box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);

			            }

			        input[name=btn_confirm],
			            input[name=btn_submit],
			            input[name=btn_back] {
			                margin-top: 10px;
			                padding: 5px 20px;
			                font-size: 100%;
			                color: #fff;
			                cursor: pointer;
			                border: none;
			                border-radius: 3px;
			                box-shadow: 0 3px 0 #2887d1;
			                background: #4eaaf1;
											text-align: center;
			            }

			            input[name=btn_back] {
			                margin-right: 20px;
			                box-shadow: 0 3px 0 #777;
			                background: #999;
			            }

									.btn{
										display: block !important;
										text-align: center;
									}

			            .element_wrap {
			                margin-bottom: 10px;
			                padding: 10px 0;
			                border-bottom: 1px solid #ccc;
			                text-align: left;

			            }

			            label {
			                display: inline-block;
			                margin-bottom: 10px;
			                font-weight: bold;
			                width: 150px;
											vertical-align: middle;
			            }

			            .element_wrap p {
			                display: inline-block;
			                margin:  0;
			                text-align: left;
			            }
			            textarea[name=contact] {
			          	padding: 5px 10px;
			          	width: 60%;
			          	height: 100px;
			          	font-size: 86%;
			          	border: none;
			          	border-radius: 3px;
			          	background: #ddf0ff;
									/*影をつける*/
									-moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2);
									-webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2);
									box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);

			          }

			          .error_list {
			            padding: 10px 30px;
			            color: #ff2e5a;
			            font-size: 86%;
			            text-align: left;
			            border: 1px solid #ff2e5a;
			            border-radius: 5px;
			          }
			</style>

    </head>


<body>
	<!--ヘッダー-->
<?php get_header();?>
<?php /*	<header>
	<h1>言語化相談窓口</h1>
	<p>個人や組織の成長を「言葉の力」によって支援します。</p>
	<nav id="global_navi">
			<ul>
					<li class="current"><a href="index.html">トップ</a></li>
					<li><a href="menu.html">仕事メニュー</a></li>
					<li><a href="portfolio.html">実績一覧</a></li>
					<li><a href="form.php">お問い合わせ</a></li>
			</ul>
	</nav>
	</header>
	<!--/ヘッダー--> */?>

	<div id="wrapper">
		<!--メイン-->
			<div id="contact">
				<!--
				<div id="breadcrumb">
						<ol>
								<li><a href="index.html">トップ</a></li>
								<li><a href="form.php">お問い合わせ</a></li>
						</ol>
				</div>-->

    <h3>お問い合わせフォーム</h3>
    <?php if($page_flag === 1): ?>

    <!--確認ページのHTMLテキスト-->
		<p>ありがとうございます。下記内容でお間違いがなければ送信ボタンを押してください。</p>
    <form method="post" action="">
    	<div class="element_wrap">
    		<label>お名前</label>
    		<p><?php echo $_POST['your_name']; ?></p>
    	</div>
			<div class="element_wrap">
				<label>法人・団体名</label>
				<p><?php echo $_POST['company']; ?></p>
			</div>
    	<div class="element_wrap">
    		<label>メールアドレス</label>
    		<p><?php echo $_POST['email']; ?></p>
    	</div>
      <div class="element_wrap">
    		<label>お問い合わせ内容</label>
    		<p><?php echo nl2br($_POST['contact']); ?></p>
    	</div>
			<div class="btn">
				<input type="submit" name="btn_back" value="戻る">
				<input type="submit" name="btn_submit" value="送信">
			</div>
    	<input type="hidden" name="your_name" value="<?php echo		$_POST['your_name']; ?>">
    	<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
      <input type="hidden" name="contact" value="<?php echo $_POST['contact']; ?>">
    </form>
     <!--確認ページのHTMLテキスト-->

    <?php elseif( $page_flag === 2 ): ?>
    <p>送信が完了しました。</p>
		<p>基本的には24時間以内、遅くとも３営業日以内にはお返事いたします。</p>
		<p>引き続きよろしくお願いいたします。</p>

    <?php else: ?>
      <?php if( !empty($error) ): ?>
        <ul class="error_list">
          <?php foreach( $error as $value ): ?>
            <li><?php echo $value; ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

    <!--戻るボタン押したあとのページHTMLテキスト-->
		<p>お仕事のご依頼、ご質問・ご相談等お気軽にご連絡くださいませ。</p>
    <form method="post" action="">
        <div class="element_wrap">
            <label>お名前</label>
            <input type="text" name="your_name" value="<?php if( !empty($_POST['your_name']) ){ echo $_POST['your_name']; } ?>">
        </div>
				<div class="element_wrap">
						<label>法人・団体名</label>
						<input type="text" name="company" value="<?php if( !empty($_POST['company']) ){ echo $_POST['company']; } ?>">
				</div>
        <div class="element_wrap">
            <label>メールアドレス</label>
            <input type="text" name="email" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>">
        </div>
        <div class="element_wrap">
          <label>お問い合わせ内容</label>
          <textarea name="contact"><?php if( !empty($_POST['contact']) ){ echo $_POST['contact']; } ?></textarea>
        </div>
				<div class="btn">
					<input type="submit" name="btn_confirm" value="入力内容を確認する">
				</div>
    </form>
    <!--戻るボタン押したあとのページHTMLテキスト-->
    <?php endif; ?>
	</div>
</div>
</body>
</html>
