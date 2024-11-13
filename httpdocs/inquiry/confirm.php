<?php
session_start();

if($_SESSION['inputFlg'] == 1){
	$_SESSION['inputFlg'] = 2;
}else if($_SESSION['inputFlg'] != 1 && $_SESSION['inputFlg'] != 2){
	header("Location: index.html#form");
	exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-4054480-3"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-4054480-3');
		</script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=yes ,initial-scale=1.0" />
		<meta name="robots" content="noindex,nofollow" />
		<title>お問い合わせ｜IT企業・IT業界専門のマーケティング＆制作会社 - ビーダッシュ株式会社</title>
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
		<!-- Global site tag (gtag.js) - Google AdWords: 996286524 -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=AW-996286524"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'AW-996286524');
		</script>
	</head>
	<body>
		<!-- Google Tag Manager -->
			<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5MRNKX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
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
				<p>Contact</p>
				<h2>お問い合わせ</h2>
			</div>
			<div class="inquiry_menu">
				<ul>
					<li>お問い合わせ</li>
					<li class="mr0"><a href="//www.be-dash.co.jp/estimate/">見積り依頼</a></li>
				</ul>
			</div>
		</section>
		<section>
			<div class="inquiry_innner">
				<p>
					以下の入力内容をご確認の上、間違いがなければ「送信」ボタンを押してください。<br />
					内容を訂正する場合は「入力画面に戻る」ボタンで前のページへお戻りください。
				</p>
				<!-- form -->
				<form id="form" method="post">
					<input type="hidden" name="f_item_name_last" value="<?php print $_SESSION['f_item_name_last']; ?>">
					<input type="hidden" name="f_item_name_first" value="<?php print $_SESSION['f_item_name_first']; ?>">
					<input type="hidden" name="f_item_company_name" value="<?php print $_SESSION['f_item_company_name']; ?>">
					<input type="hidden" name="f_item_tel" value="<?php print $_SESSION['f_item_tel']; ?>">
					<input type="hidden" name="f_item_mail" value="<?php print $_SESSION['f_item_mail']; ?>">
					<input type="hidden" name="f_item_mail_chk" value="<?php print $_SESSION['f_item_mail_chk']; ?>">
					<input type="hidden" name="f_item_radio5[]" value="<?php print $_SESSION['f_item_radio5']; ?>">
					<input type="hidden" name="f_item_free3" value="<?php print $_SESSION['f_item_free3']; ?>">
					<!--<input type="hidden" name="red" value="https://www.be-dash.co.jp/inquiry/complete.php" />-->
					<!--<input type="hidden" name="red_error" value="https://www.be-dash.co.jp/inquiry/error.php" />-->
					<!--<input type="hidden" name="api_key" value="a07449675e666386f5cd9652460ebe48e081bb13" />-->
					<!--<input type="hidden" name="opt" value="1" />-->
					<div class="input_item">
						<dl class="clearfix">
							<dt>名前</dt>
							<dd class="right">
								<ul>
									<li>
										<?php print $_SESSION['f_item_name_last']; ?>
									</li>
									<li class="mr0">
										<?php print $_SESSION['f_item_name_first']; ?>
									</li>
								</ul>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt>会社名</dt>
							<dd>
								<?php print $_SESSION['f_item_company_name']; ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt>電話番号（半角数字）</dt>
							<dd>
								<?php print $_SESSION['f_item_tel']; ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt>メールアドレス</dt>
							<dd>
								<?php print $_SESSION['f_item_mail']; ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt>メールアドレス（確認用）</dt>
							<dd>
								<?php print $_SESSION['f_item_mail_chk']; ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt>サービスカテゴリ</dt>
							<dd>
								<?php print $_SESSION['f_item_radio5']; ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt>お問い合わせ内容</dt>
							<dd>
								<?php print $_SESSION['f_item_free3']; ?>
							</dd>
						</dl>
<style>

.transmissionRight {
	width: 158px;
	float: right;
	padding-right:200px;
}
.transmissionLeft{
	width: 158px;
	float: left;
}

</style>

						<div class="transmission">
							<div class="transmissionLeft"><a name="back_input" id="btn_back" class="btn_S_bl" href="index.php#form">入力画面に戻る</a></div>
              				<div class="transmissionRight"><a class="btn_S_bl" href="complete.php">送信</a></div>
			            </div>
					</div>
				</form>
				<!-- /form -->
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
						<a href="../index.html" itemtype="https://schema.org/Thing" itemprop="item"><span itemprop="name">トップページ</span></a>
					<meta itemprop="position" content="1" />
					</li>
					<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="ma0">
						<span itemprop="name">お問い合わせ</span>
					<meta itemprop="position" content="2" />
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