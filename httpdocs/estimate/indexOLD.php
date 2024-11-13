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
	サービス					$_POST['f_item_radio7']
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
/*--- 電話番号 check ---*/
	if(!tel_chk($_POST['f_item_tel'],$error)){
		$telE = $error;
		$eflg = 1;
	}
/*--- サービスカテゴリ check ---*/
	if(!radio_chk($_POST['f_item_radio7'],$error)){
		$itemE = $error;
		$eflg = 1;
	}
/*--- 内容確認 check ---*/
	if(!msg_chk2($_POST['f_item_free3'],$error)){
		$msgE = $error;
		$eflg = 1;
	}
	$_SESSION['f_item_company_name'] = $_POST['f_item_company_name'];
	$_SESSION['f_item_name_last'] = $_POST['f_item_name_last'];
	$_SESSION['f_item_name_first'] = $_POST['f_item_name_first'];
	$_SESSION['f_item_mail'] = $_POST['f_item_mail'];
	$_SESSION['f_item_mail_chk'] = $_POST['f_item_mail_chk'];
	$_SESSION['f_item_tel'] = $_POST['f_item_tel'];
	$_SESSION['f_item_radio7'] = $_POST['f_item_radio7'];
	$_SESSION['f_item_free3'] = $_POST['f_item_free3'];
	$_SESSION['inputFlg'] = 1;
	if(!$eflg){
		header("Location: confirm.php");
		exit;
	}
}

?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=yes ,initial-scale=1.0" />		
		<meta name="keywords" content="ビーダッシュ,見積り">
		<meta name="description" content="ビーダッシュ株式会社への見積り依頼はこちらのページから。ビーダッシュ株式会社はIT企業・IT業界専門のマーケティング＆制作会社。Web/ランディングページ/パンフレット/カタログ/導入事例を提供。">
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
			<div class="inquiry_innner">
				<p>
					サイトの内容やサービスについては、以下のお問い合わせフォームよりお問い合わせください。<br />
					個人情報につきましては、当社の「<a href="../policy/index.html" target="_blank">プライバシーポリシー</a>」をご確認いただき、「当社の保有する個人情報について」同意の上、ご入力くださいますようお願いいたします。<br />
					ご連絡いただいた情報をもとに、見積りのご提示に必要な要件を後ほどヒアリングさせていただきます。
				</p>
				<!-- form -->
				<form id="form" action="index.php#form" method="post" name="form">
					<div class="input_item">
						<dl class="clearfix">
							<dt><span class="req">必須</span>名前</dt>
							<dd class="right">
								<ul>
									<li><input type="text" name="f_item_name_last" title="姓" value="<?php print $_SESSION['f_item_name_last']; ?>" />
									<?php if($l_nameE) {print '<br /><span class="err">'.$l_nameE."</span>";} ?></li>
									<li class="mr0"><input type="text" name="f_item_name_first" title="名" value="<?php print $_SESSION['f_item_name_first']; ?>" />
									<?php if($f_nameE) {print '<br /><span class="err">'.$f_nameE."</span>";} ?></li>
								</ul>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>会社名</dt>
							<dd>
								<input type="text" name="f_item_company_name" title="会社名" value="<?php print $_SESSION['f_item_company_name']; ?>" />
								<?php if($c_nameE) {print '<br /><span class="err">'.$c_nameE."</span>";} ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>電話番号（半角数字）</dt>
							<dd>
								<input type="text" name="f_item_tel" title="電話番号" value="<?php print $_SESSION['f_item_tel']; ?>" />
								<?php if($telE) {print '<br /><span class="err">'.$telE."</span>";} ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>メールアドレス</dt>
							<dd>
								<input type="text" name="f_item_mail" title="メールアドレス" value="<?php print $_SESSION['f_item_mail']; ?>" />
								<?php if($emailE) {print '<br /><span class="err">'.$emailE."</span>";} ?>
							</dd>
						</dl>
						<dl class="clearfix">
							<dt><span class="req">必須</span>メールアドレス（確認用）</dt>
							<dd>
								<input type="text" name="f_item_mail_chk" title="メールアドレス（確認用）" value="<?php print $_SESSION['f_item_mail_chk']; ?>" />
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
							<dt><span class="req">必須</span>見積り依頼内容</dt>
							<dd>
								<textarea name="f_item_free3" rows="4" cols="50" maxlength="500" title="制作物・サービスの概要や想定されている仕様をご記入ください"><?php print $_SESSION['f_item_free3']; ?></textarea>
								<?php if($msgE) {print '<br /><span class="err">'.$msgE."</span>";} ?>
							</dd>
						</dl>

						<div class="formAgrBox">
							<div class="formAgrBox_inner">
								<h2>当社の保有する個人情報について</h2>
								<p>ビーダッシュ株式会社（以下当社という）では当社への問い合わせおよび、当社が展開する事業に際しまして、お客様の個人情報をお預かりいたしております。お預かりした個人情報は下記の通りに厳粛に管理保護してまいります。<br />
								本同意書の内容を確認、ご理解いただき同意いただいた後送信をお願いします。</p>
								<h3>（本お問い合わせにおける個人情報の利用目的について）</h3>
								<ul>
									<li>当社へのお問い合わせおよび事業に関するご回答のため</li>
									<li>当社から提供する情報配信のため</li>
									<li>当社が提供するサービス等の情報提供のため</li>
								</ul>
								<h3>（第三者への提供について）</h3>
								<p>当社では法律・法令などに基づく場合を除きましては、お預かりしました個人情報は、本人の同意を得ずに、第三者への提供はいたしません。</p>
								<h3>（本業務の委託について）</h3>
								<p>個人情報の取扱いにつきましては、お客様へのサービス向上と業務の適正化などを行うためお預かりしました情報の業務委託を行う場合があります。委託を行う場合は個人情報保護の管理基準を十分満たしている委託先を選定し必要な契約などを取り交わした上安全レベルの管理向上に勤めます。</p>
								<h3>（個人情報提供の任意性について）</h3>
								<p>個人情報の提供は原則任意です。ただし、個人情報を提供いただけない場合は、該当事項につきまして当社からの情報やサービスなどのご提供が出来ない場合がございます。</p>
								<h3>（開示対象個人情報の「利用目的の通知」「開示」「訂正、追加又は削除」「利用又は提供の拒否」に関して）</h3>
								<p>個人情報を提供されたお客様は、該当情報に関して「利用目的の通知」、「開示」、「訂正、追加、削除」、「利用又は提供の拒否」を要求する権利を有しております。<br />
								必要に応じて窓口までご連絡ください。</p>

								<p>《個人情報相談窓口》　ビーダッシュ株式会社<br />
								個人情報相談窓口責任者：田島 光敏<br />
								個人情報保護管理者：田島 光敏<br />
								FAX：03-6382-9605<br />
								mail：<a href="mailto:privacy＠be-dash.co.jp">privacy＠be-dash.co.jp</a><br />
								※当社では、お電話の対応は行っておりませんので、申し訳ございませんがご了承ください。<br />
								（受付24時間　土日祝祭日は除く）</p>
							</div>
						</div>

						<div class="transmission">
							<input type="hidden" name="next" value="1" />
							<a id="btn_submit" class="btn_S_bl" name="check_input" href="javascript:void(0)" onclick="document.form.submit();return false;">内容確認へ進む</a>
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
					<span itemprop="name">見積り依頼</span>
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