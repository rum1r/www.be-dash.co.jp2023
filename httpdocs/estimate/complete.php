<?php

session_start();
mb_internal_encoding("utf-8");

$f_item_name_last = $_SESSION['f_item_name_last'];
$f_item_name_first = $_SESSION['f_item_name_first'];
$f_item_company_name = $_SESSION['f_item_company_name'];
$f_item_tel = $_SESSION['f_item_tel'];
$f_item_mail = $_SESSION['f_item_mail'];
$f_item_radio7 = $_SESSION['f_item_radio7'];
$f_item_free3 = $_SESSION['f_item_free3'];

//▼名と代表アドレスを記述
$from = "From:" . mb_encode_mimeheader("ビーダッシュ株式会社") . "<no-reply@be-dash.co.jp>";
$from .= "\n";
$from .= "Cc: director@be-dash.co.jp";
//$from .= "Cc: momotarouko@gmail.com";
$from .= "\n";
$from .= "Bcc: momotarouko@gmail.com";
if ($_SESSION['inputFlg'] != 2) {
  $f_item_name_last = "";
  $f_item_name_first = "";
  $f_item_company_name = "";
  $f_item_mail = "";
  $f_item_tel = "";
  $f_item_radio5 = "";
  $f_item_free3 = "";

  $sbj = "";
  $a_msg = "";
  $from = "";

  // セッション変数を解除
  $_SESSION = array();

  // セッションを破棄
  session_destroy();

  header("Location: ../");
  exit;
} else if ($_SESSION['inputFlg'] == 2) {

  /* -------------------------------------------------
    お客様メール送信用処理
    ------------------------------------------------- */

  $sbj = "見積り依頼ありがとうございます｜ビーダッシュ株式会社";

  $a_msg = <<< BODY

※このメールは自動返信メールです。

この度は見積もり依頼をいただきましてありがとうございます。
見積もり依頼いただきました内容は、下記の通りです。
------------------------------

【お名前】
{$f_item_name_last} {$f_item_name_first}

【会社名】
{$f_item_company_name}

【電話番号】
{$f_item_tel}

【メールアドレス】
{$f_item_mail}

【サービスカテゴリ】
{$f_item_radio7}

【見積もり依頼内容】
{$f_item_free3}



------------------------------

2営業日以内にはご連絡をさせていただきます。

本メールに心当たりの無い方は、
下記までお問い合わせいただきますようお願いいたします。

---------------------------------------

■ ビーダッシュ株式会社 / Be-DASH Inc.
 
■ 住所:東京都渋谷区幡ヶ谷2-21-4リードシー幡ヶ谷ビル8階
 
■ TEL：03-6382-9604 / FAX：03-6382-9605
 
■ E-mail:director@be-dash.co.jp
 
■ URL:https://www.be-dash.co.jp/

---------------------------------------
BODY;


  mb_send_mail($f_item_mail, $sbj, $a_msg, $from);

  $f_item_name_last = "";
  $f_item_name_first = "";
  $f_item_mail = "";
  $f_item_tel = "";
  $f_item_company_name = "";
  $f_item_free3 = "";

  $sbj = "";
  $a_msg = "";
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
		<meta name="viewport" content="width=device-width, user-scalable=yes ,initial-scale=1.0" />		
		<meta name="robots" content="noindex,nofollow" />
		<title>見積り依頼｜IT企業・IT業界専門のマーケティング＆制作会社 - ビーダッシュ株式会社</title>
		<!-- 共通 -->
		<link href="../img/common/favicon.ico" type="image/x-icon" rel="icon">
		<link href="../img/common/favicon.ico" type="image/x-icon" rel="shortcut icon">
		<!--[if IE 6]>
		<script type="text/javascript" src="../js/DD_belatedPNG.js"></script>
		<script>
			DD_belatedPNG.fix('img, .png_bg');
		</script>
		<![endif]-->
		<!--[if lt IE 9]>
			<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="../css/common/reset.css">
		<link rel="stylesheet" type="text/css" href="../css/common/common.css">
		<link rel="stylesheet" type="text/css" href="../css/inquiry.css">
		<script type="text/javascript" src="../js/common/jquery-1.11.3.js"></script>
		<script type="text/javascript" src="../js/common/common.js"></script>
		<!-- /共通 -->
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
		<!-- #header -->
		<!-- メニュー -->
		<?php $Path = "../"; include '../header.html'; ?>
		<!-- /メニュー -->
		<section>
			<div class="inquiry_hd">
				<p>Estimate</p>
				<h2>見積り依頼</h2>
			</div>
			<div class="inquiry_menu">
				<ul>
					<li><a href="//www.be-dash.co.jp/inquiry/">お問い合わせ</a></li>
					<li class="mr0">見積り依頼</li>
				</ul>
			</div>
		</section>
		<section>
			<div class="inquiry_innner innner_S">
			<h2>見積り依頼完了</h2>
				<p class="txt_center">
					見積り依頼内容の送信が完了いたしました。<br />
					ご連絡いただいた内容を確認次第、翌営業日中にご返答いたしますので、<br />
					今しばらくお待ちくださいますよう、お願い申し上げます。
				</p>
				<a href="../index.html" class="btn_S_bl">TOP PAGE</a>
			</div>
		</section>
		<!-- /#innner -->
		<!-- footer -->
		<footer>
			<div class="innner">
				<a href="#" id="pagetop">PAGE TOP</a>
			</div>
			<!-- パンくずリスト -->
			<div id="breadcrumbs" itemscope="" itemtype="https://schema.org/BreadcrumbList">
				<ul>
					<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<a href="../../index.html" itemtype="https://schema.org/Thing" itemprop="item"><span itemprop="name">トップページ</span></a>
					<meta itemprop="position" content="1" />
					</li>
					<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<a href="index.php" title="見積り依頼" itemtype="https://schema.org/Thing" itemprop="item"><span itemprop="name">見積り依頼</span></a>
					<meta itemprop="position" content="2" />
					</li>	
					<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="ma0">
					<span itemprop="name">見積り依頼完了</span>
					<meta itemprop="position" content="3" />
					</li>
				</ul>
			</div>
			<!-- /パンくずリスト -->
			<!-- フッター -->
			<?php $Path = "../"; include '../footer.html'; ?>
			<!-- /フッター -->
		</footer>
	</body>
</html>