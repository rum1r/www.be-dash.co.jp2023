<?php
session_start();
mb_internal_encoding("utf-8");

	$name = $_SESSION['name'];
	$c_name = $_SESSION['c_name'];
	$email = $_SESSION['email'];
	$tel = $_SESSION['tel'];
	$c_method = $_SESSION['c_method'];
	$c_inquiry = $_SESSION['c_inquiry'];
	$msg = $_SESSION['msg'];
	//▼名と代表アドレスを記述
	$from = "From:" .mb_encode_mimeheader("ビーダッシュ株式会社") ."<lp_svc@be-dash.co.jp>";


if($_SESSION['inputFlg'] != 2){
	$name = "";
	$c_name = "";
	$email = "";
	$tel = "";
	$c_method = "";
	$c_inquiry = "";
	$msg = "";

	$c_madr = "";
	$u_madr = "";
	$sbj = "";
	$sbj2 = "";
	$a_msg = "";
	$b_msg = "";
	$from = "";

	// セッション変数を解除
	$_SESSION = array();

	// セッションを破棄
	session_destroy();

	header("Location: ./index.php");
	exit;
}else if($_SESSION['inputFlg'] == 2){

/*-------------------------------------------------
担当者メール送信用処理
-------------------------------------------------*/

	//$u_madr = "lp_svc@be-dash.co.jp";
	$u_madr = $email;//本番は上のアドレスで設定
$sbj = "ランディングページ制作02からの問い合わせ";

$a_msg =<<< BODY
お名前▼
{$name}

会社名▼
{$c_name}

メールアドレス▼
{$email}

電話番号▼
{$tel}

ご連絡方法▼
{$c_method}

お問い合わせの内容▼
{$c_inquiry}

お問い合わせの詳細▼
{$msg}

BODY;


mb_send_mail($u_madr,$sbj,$a_msg,$from);



/*-------------------------------------------------
お客様メール送信用処理
-------------------------------------------------*/

$c_madr = $email;


$sbj2 = "【ビーダッシュ株式会社】お問い合わせ内容の確認";
$b_msg =<<< BODY
※このメールには自動返信メールです。
この度はお問い合わせをいただき、誠にありがとうございます。
お問い合わせいただきました内容は、下記の通りです。

お名前▼
{$name}

会社名▼
{$c_name}

メールアドレス▼
{$email}

電話番号▼
{$tel}

ご連絡方法▼
{$c_method}

お問い合わせの内容▼
{$c_inquiry}

お問い合わせの詳細▼
{$msg}

遅くとも2営業日以内にはご返信をさせていただきます。
※本メールに心当たりの無い方は、
下記までお問い合わせいただきますようお願いいたします。

ビーダッシュ株式会社
〒151-0072
東京都渋谷区幡ヶ谷2-21-4
幡ヶ谷ファーストビルディング8F
e-mail: lp_svc@be-dash.co.jp
TEL: 03-6382-9604
FAX: 03-6382-9605

BODY;

mb_send_mail($c_madr,$sbj2,$b_msg,$from);


	$name = "";
	$c_name = "";
	$age = "";
	$email = "";
	$tel = "";
	$type = "";
	$msg = "";

	$c_madr = "";
	$u_madr = "";
	$sbj = "";
	$sbj2 = "";
	$a_msg = "";
	$b_msg = "";
	$from = "";


$_SESSION['inputFlg'] = 3;

// セッション変数を解除
$_SESSION = array();

// セッションを破棄
session_destroy();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=100" />
<meta name="viewport" content="maximum-scale=1.1, user-scalable=yes" />
<meta name="format-detection" content="telephone=no">
<meta name="description" content="オリジナルデザイン&amp;HTMLコーディング合わせてなんと！6万円ぽっきり!!最短7日で制作します!!" />
<meta name="keywords" content="格安,制作,ランディングページ,キャンペーンページ,ビーダッシュ,Be-DASH" />
<title>ランディングページ、キャンペーンページを格安で制作します！｜ビーダッシュ株式会社</title>
<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/common.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/setting.css" />
<!--[if IE 6]>
	<script type="text/javascript" src="js/DD_belatedPNG.js"></script>
	<script>
		DD_belatedPNG.fix('img, .png_bg');
	</script>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="js/jquery1.8.2.min.js"></script>
<script type="text/javascript" src="js/function.js"></script>
</head>
<body>
	<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5MRNKX"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-5MRNKX');</script>
	<!-- End Google Tag Manager -->
	<div id="all">
		<header id="headerWrap">
			<div id="headerInWrap">
				<div id="header" class="clearfix">
					<p>格安ランディングページ制作はおまかせください！</p>
					<h1><img src="images/logo.png" width="236" height="36" alt="Be-DASH Inc." /></h1>
					<h2><img src="images/header_R.png" width="260" height="75" alt="Be-DASH Inc." /></h2>
				</div>
			</div>
		</header>

		<section id="complete" class="wide960">
			<h1 class="tp60"><img src="images/complete_title.png" width="960" height="135" alt="お問い合わせフオーム【送信完了】" /></h1>

			<div class="formText">
				<p><span>お問い合わせが完了致しました。</span><br /><br />確認のため、入力いただいたメールアドレス宛てに、<br />お問い合わせ内容の確認メールを送信しております。<br />万が一メールが届かない場合は再度お問い合わせください。</p>
			</div>

			<div class="tm50 taCtr">
				<a href="index.php"><img src="images/form_btn04.jpg" width="491" height="62" alt="topへ戻る" class="imgopacity" /></a>
			</div>
		</section>

<footer id="footer">
	<div id="copy">
		Copyright(C)2008-2014 Be-DASH Inc, All Rights Reserved.
	</div>
</footer>
	</div><!-- #all closed -->
</body>
</html>
