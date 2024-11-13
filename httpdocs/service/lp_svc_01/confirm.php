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
<script type="text/javascript" src="js/jquery1.10.2.min.js"></script>
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
		<section>
		<div id="content-8">
			<div class="title-h1">
				<h1 id="conf">【内容確認】　お問い合わせフォーム</h1>
			</div>
			<div class="content-inner">
				<div>
					<p>下記の内容をご確認の上、送信するボタンを押してください。</p>
					<p>後ほど、担当よりご連絡させていただきます。<br />
						お急ぎの場合は、03-6382-9604（担当：佐伯）までご連絡ください。</p>
					<p>2営業日以内に当社からのご連絡が無い場合、入力いただいてメールアドレスの間違いが考えられます。<br />
						お手数ですが、再度お問い合わせいただきますよう、お願いいたします。</p>
				</div>
			</div>
			<form action="complete.php" method="post">
				<table>
					<tr>
						<th>お名前</th>
						<td><?php print $_SESSION['name']; ?></td>
					</tr>
					<tr>
						<th>会社名</th>
						<td><?php print $_SESSION['c_name']; ?></td>
					</tr>
					<tr>
						<th>メールアドレス</th>
						<td><?php print $_SESSION['email']; ?></td>
					</tr>
					<tr>
						<th>電話番号</th>
							<td><?php print $_SESSION['tel']; ?></td>
					</tr>
					<tr>
						<th>ご連絡方法</th>
						<td><?php print $_SESSION['c_method']; ?></td>
					</tr>
					<tr>
						<th>お問い合わせの内容</th>
						<td><?php print $_SESSION['c_inquiry']; ?></td>
					</tr>
					<tr>
						<th>お問い合わせの詳細</th>
						<td><?php print $_SESSION['msg']; ?></td>
					</tr>
				</table>
				<div id="area-btn">
					<a href="index.php#form"><img src="images/btn-back_off.gif" alt="入力画面に戻る" class="imgover" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="complete.php"><img src="images/btn-comp_off.gif" alt="送信する" class="imgover" /></a>
				</div>
			</form>
		</div>
		</section>
	</div><!-- #all closed -->
</body>
</html>
