<?php
session_start();
require_once('../library/InputCheck.php');

$next = $_POST['next'];
if(!$next && $_SESSION['inputFlg'] != 1 && $_SESSION['inputFlg'] != 2){
	$_SESSION = array();
	session_destroy();
}
if(isset($next)){

/*======================================================================================
	姓						$_POST['f_item_name_last']
	名						$_POST['f_item_name_first']
	会社名					$_POST['f_item_company_name]
	mail					$_POST['f_item_mail']
	mailc					$_POST['f_item_mail_chk']
	電話						$_POST['f_item_tel']
	サービス					$_POST['f_item_radio5']
	内容						$_POST['f_item_free3']
======================================================================================*/

/*--- 姓 check ---*/
	if(!name_chk($_POST['f_item_name_last'],$error)){
		$l_nameE = $error;
		$eflg = 1;
	}
/*--- 名前 check ---*/
	if(!name2_chk($_POST['f_item_name_first'],$error)){
		$f_nameE = $error;
		$eflg = 1;
	}
/*--- 会社名 check ---*/
	if(!c_name_chk($_POST['f_item_company_name'],$error)){
		$c_nameE = $error;
		$eflg = 1;
	}
/*--- 電話番号 check ---*/
	if(!tel_chk($_POST['f_item_tel'],$error)){
		$telE = $error;
		$eflg = 1;
	}
/*--- mail check ---*/
	if(!mail_chk($_POST['f_item_mail'],$error)){
		$emailE = $error;
		$eflg = 1;
	}
/*--- mail(確認) check ---*/
	if(!agree_chk($_POST['f_item_mail'],$_POST['f_item_mail_chk'],$error)){
		$emailcE = $error;
		$eflg = 1;
	}
/*--- サービスカテゴリ check ---*/
	if(!radio_chk($_POST['f_item_radio5'],$error)){
		$itemE = $error;
		$eflg = 1;
	}
/*--- 内容確認 check ---*/
	if(!msg_chk($_POST['f_item_free3'],$error)){
		$msgE = $error;
		$eflg = 1;
	}

	$_SESSION['f_item_company_name'] = $_POST['f_item_company_name'];
	$_SESSION['f_item_name_last'] = $_POST['f_item_name_last'];
	$_SESSION['f_item_name_first'] = $_POST['f_item_name_first'];
	$_SESSION['f_item_mail'] = $_POST['f_item_mail'];
	$_SESSION['f_item_mail_chk'] = $_POST['f_item_mail_chk'];
	$_SESSION['f_item_tel'] = $_POST['f_item_tel'];
	$_SESSION['f_item_radio5'] = $_POST['f_item_radio5'];
	$_SESSION['f_item_free3'] = $_POST['f_item_free3'];
	$_SESSION['inputFlg'] = 1;

	if($eflg){
		$message = "<p class='err'>※&nbsp;入力内容に誤りがあります。該当箇所を訂正後、「確認画面へ」ボタンをクリックしてください。</p>";
	}
	if(!$eflg){
		header("Location: confirm.php");
		exit;
	}
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
		<meta name="keywords" content="ビーダッシュ,お問い合わせ,相談">
		<meta name="description" content="ビーダッシュ株式会社へのお問い合わせはこちらのページから。ビーダッシュ株式会社はIT企業・IT業界専門のマーケティング＆制作会社。Web/ランディングページ/パンフレット/カタログ/導入事例を提供。">
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
		<script>
			/* placeholder */
			$(function(){
				$(window).load(function(){
					$('input[type=text],input[type=password],textarea').each(function(){
						var thisTitle = $(this).attr('title');
						if(!(thisTitle === '')){
							$(this).wrapAll('<span style="text-align:left; display:inline-block; position:relative;"></span>');
							$(this).parent('span').append('<span class="placeholder">' + thisTitle + '</span>');
							$('.placeholder').css({top:'8px',left:'10px',fontSize:'14px',lineHeight:'20px',textAlign:'left',color:'#ccc',overflow:'hidden',position:'absolute',zIndex:'99'
							}).click(function(){$(this).prev().focus();});

							$(this).focus(function(){$(this).next('span').css({display:'none'});});

							$(this).blur(function(){
								var thisVal = $(this).val();
								if(thisVal === ''){$(this).next('span').css({display:'inline-block'});}
								else {$(this).next('span').css({display:'none'});}

								if(thisTitle == undefined){$(this).next('span').css({display:'none'});}
							});

							var thisVal = $(this).val();
							if(thisVal === ''){$(this).next('span').css({display:'inline-block'});}
							else {$(this).next('span').css({display:'none'});}

							if(thisTitle == undefined){$(this).next('span').css({display:'none'});}
						}
					});
				});
			});
		</script>
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
					サイトの内容やサービスについては「個人情報保護に関する同意事項」に同意の上、<br class="pcOnly" />以下のお問い合わせフォームよりお問い合わせください。<br />
					個人情報の取り扱いについては「<a href="/disclosure/">個人情報の取り扱いについて</a>」をご確認ください。<br />
					お問い合わせの内容によってはご返信しかねる場合がございますことをあらかじめご了承ください。
				</p>
				<!-- form -->
				<form id="form" action="index.php#form" method="post" name="form">
					<div class="input_item">
						<dl class="clearfix">
							<dt><span class="req">必須</span>名前</dt>
							<dd class="right">
								<ul>
									<li><input type="text" name="f_item_name_last" title="姓" value="<?php print $_SESSION['f_item_name_last']; ?>">
									<?php if($l_nameE) {print '<br /><span class="err">'.$l_nameE."</span>";} ?></li>
									<li class="mr0"><input type="text" name="f_item_name_first" title="名" value="<?php print $_SESSION['f_item_name_first']; ?>">
									<?php if($f_nameE) {print '<br /><span class="err">'.$f_nameE."</span>";} ?></li>
								</ul>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>会社名</dt>
							<dd>
								<input type="text" name="f_item_company_name" title="会社名" value="<?php print $_SESSION['f_item_company_name']; ?>">
								<?php if($c_nameE) {print '<br /><span class="err">'.$c_nameE."</span>";} ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>電話番号（半角数字）</dt>
							<dd>
								<input type="text" name="f_item_tel" title="電話番号" value="<?php print $_SESSION['f_item_tel']; ?>">
								<?php if($telE) {print '<br /><span class="err">'.$telE."</span>";} ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>メールアドレス</dt>
							<dd>
								<input type="text" name="f_item_mail" title="メールアドレス" value="<?php print $_SESSION['f_item_mail']; ?>">
								<?php if($emailE) {print '<br /><span class="err">'.$emailE."</span>";} ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>メールアドレス（確認用）</dt>
							<dd>
								<input type="text" name="f_item_mail_chk" title="メールアドレス（確認用）" value="<?php print $_SESSION['f_item_mail_chk']; ?>">
								<?php if($emailcE) {print '<br /><span class="err">'.$emailcE."</span>";} ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>サービスカテゴリ</dt>
							<dd>
								<ul id="radio-group">
									<li class="mr10">
										<input type="radio" name="f_item_radio5" id="inq_type01" class="radio" value="Web制作" checked="checked">
										<label for="inq_type01">
											Web制作
										</label>
									</li>
									<li class="mr10">
										<input type="radio" name="f_item_radio5" id="inq_type02" class="radio" value="パンフレット">
										<label for="inq_type02">
											パンフレット
										</label>
									</li>
									<li class="mr10">
										<input type="radio" name="f_item_radio5" id="inq_type03" class="radio" value="導入事例">
										<label for="inq_type03">
											導入事例
										</label>
									</li>
									<li class="mr10">
										<input type="radio" name="f_item_radio5" id="inq_type04" class="radio" value="マーケティング">
										<label for="inq_type04">
											マーケティング
										</label>
									</li>
								</ul>
								<ul id="radio-group">
									<li class="mr10">
										<input type="radio" name="f_item_radio5" id="inq_type06" class="radio" value="動く会社案内">
										<label for="inq_type06">
											動く会社案内
										</label>
									</li>
									<li>
										<input type="radio" name="f_item_radio5" id="inq_type05" class="radio" value="その他">
										<label for="inq_type05">
											その他
										</label>
									</li>
								</ul>
								<?php if($itemE) {print '<br /><span class="err">'.$itemE."</span>";} ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>お問い合わせ内容</dt>
							<dd>
								<textarea name="f_item_free3" rows="4" cols="50" maxlength="500" title="お問い合わせ内容をご記入ください"><?php print $_SESSION['f_item_free3']; ?></textarea>
								<?php if($msgE) {print '<br /><span class="err">'.$msgE."</span>";} ?>
							</dd>
						</dl>

						<h2 class="agree-tlt">個人情報保護に関する同意事項</h2>
						<div class="formAgrBox">
							<div class="formAgrBox_inner">
								<h3 style="margin-top: 0.5em !important">事業者の氏名または名称および個人情報保護管理責任者について</h3>
								<p>ビーダッシュ株式会社　代表取締役社長　田島 光敏</p>
								<h3>個人情報の利用目的について</h3>
								<ul>
									<li>お客さまからのご意見、ご感想をいただくため</li>
									<li>お客さまからのお問い合せや資料請求などに対応するため</li>
									<li>市場調査や新しい商品・サービスの開発のため</li>
									<li>各種イベント、セミナー、キャンペーン、会員制サービスなどの案内のため</li>
									<li>メールマガジンや刊行物などの発送のため</li>
									<li>弊社または提携先で取り扱っている商品やサービスに関する情報の提供のため</li>
									<li>その他弊社の事業に付帯・関連する事項のため</li>
								</ul>
								<h3>個人情報の第三者提供について</h3>
								<p>法令に基づく場合を除き、取得した個人情報を第三者に提供することはありません。</p>
								<h3>個人情報取扱の委託について</h3>
								<p>取得した個人情報の取扱いの全部又は一部を委託することはありません。</p>
								<h3>開示対象個人情報の開示等及びお問合わせ窓口について</h3>
								<p>開示等のお申し出は、下記の「お問合わせ先」にご申請ください。<br />
									協会が保有する開示対象個人情報の利用目的の通知・開示・内容の訂正・追加又は削除・利用の停止・消去及第三者への提供の停止（「開示等」といいます）に応じます。</p>
								<h3>【お問合わせ先】</h3>
								<p>〒151-0072<br />
									東京都渋谷区幡ヶ谷2-21-4 幡ヶ谷ファーストビルディング8F<br />
									ビーダッシュ株式会社<br />
									電話 03-6382-9604（代表）<br />
									個人情報の開示等の請求については、「<a href="/disclosure/">個人情報のお取扱いにつきまして</a>」をご覧ください。</p>
								<h3>任意性について</h3>
								<p>個人情報の入力は任意ですが、必須項目の入力がない場合は、お問合わせにご回答ができない場合がありますので、あらかじめご了承ください。</p>
								<h3>本人が容易に認識できない方法による個人情報の取得について</h3>
								<p>クッキーやウェブビーコン等を用いるなどして、本人が容易に認識できない方法によって個人情報の取得は行っております。</p>
								<h3>個人情報の安全管理措置について</h3>
								<p>取得した個人情報については、漏洩、減失またはき損の防止と是正、その他個人情報の安全管理のために必要かつ適切な措置を講じます。お問合わせへの回答後、取得した個人情報は当社内において削除いたします。</p>
								<h3>【認定個人情報保護団体の名称及び苦情の解決の申し出先】</h3>
								<p>一般財団法人日本情報経済社会推進協会　個人情報保護苦情相談室<br />〒106-0032<br />東京都港区六本木一丁目9番9号　六本木ファーストビル内<br />電話 03-5860-7565 / 0120-700-779</p>
							</div>
						</div>

						<div id="agree-btn">
							<p>個人情報保護に関する同意事項について同意しますか？<br />
								<input type="checkbox" name="agree_privacy" id="agree" value="" required="required" /><label for="agree">同意する</label></p>
						</div>
<script>
//チェックボックスをチェックすると、「入力内容を確認する」ボタンがactiveになる
$(function() {
	$('#submit').prop('disabled', true);
	$('#agree').on('click', function() {
		if ($(this).prop('checked') == false) {
			$('#submit').prop('disabled', true);
		} else {
			$('#submit').prop('disabled', false);
		}
	});
});
</script>
						<div class="area-submit">
							<input type="hidden" name="next" value="1" />
							<input type="submit" id="submit" value="内容確認へ進む" />
							<!-- <a id="btn_submit" class="btn_S_bl" name="check_input" href="javascript:void(0)" onclick="document.form.submit();return false;">内容確認へ進む</a> -->
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
    </footer>
		<!-- /フッター -->
		<!-- Google Tag Manager -->
			<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5MRNKX"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-5MRNKX');</script>
		<!-- End Google Tag Manager -->
	</body>
</html>