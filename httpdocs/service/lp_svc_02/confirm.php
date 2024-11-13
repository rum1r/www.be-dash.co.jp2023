<?php
session_start();

if($_SESSION['inputFlg'] == 1){
	$_SESSION['inputFlg'] = 2;
}else if($_SESSION['inputFlg'] != 1 && $_SESSION['inputFlg'] != 2){
	header("Location: ./index.php#form");
	exit;
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

		<section id="confirm" class="wide960">
			<h1 class="tp60"><img src="images/confirm_title.png" width="960" height="135" alt="お問い合わせフォーム【内容確認】" /></h1>
			<form action="" method="post" >
				<table class="formTb">
					<tr>
						<th class="bg_g">お名前</th>
							<td><?php print $_SESSION['name']; ?></td>
					</tr>
					<tr>
						<th class="bg_g">会社名</th>
							<td><?php print $_SESSION['c_name']; ?></td>
					</tr>
					<tr>
						<th class="bg_g">メールアドレス</th>
							<td><?php print $_SESSION['email']; ?></td>
					</tr>
					<tr>
						<th class="bg_g">電話番号</th>
							<td><?php print $_SESSION['tel']; ?></td>
					</tr>
					<tr>
						<th class="bg_g">ご連絡方法</th>
							<td><?php print $_SESSION['c_method']; ?></td>
					</tr>
					<tr>
						<th class="bg_g">お問い合わせの内容</th>
							<td><?php print $_SESSION['c_inquiry']; ?></td>
					</tr>
					<tr>
						<th class="bg_g">お問い合わせの詳細</th>
							<td><?php print $_SESSION['msg']; ?></td>
					</tr>
				</table>
			</form>
				<div id="confirmBtn" class="tm50 clearfix">
					<div class="flLeft"><a href="index.php#form"><img src="images/form_btn02.jpg" width="276" height="62" alt="戻る" class="imgopacity" /></a></div>
					<div class="flRight"><a href="complete.php"><img src="images/form_btn03.jpg" width="276" height="62" alt="送信する" class="imgopacity" /></a></div>
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
