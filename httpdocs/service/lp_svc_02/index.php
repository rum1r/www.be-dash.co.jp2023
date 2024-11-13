<?php
session_start();
require_once('library/InputCheck.php');


$next = $_POST['next'];
if(!$next && $_SESSION['inputFlg'] != 1 && $_SESSION['inputFlg'] != 2){
	$_SESSION = array();
	session_destroy();
}

if(isset($next)){

/*============================================
	お名前					 $_POST['name']
	会社名					 $_POST['c_name']
	mail						$_POST['email']
	mailc						$_POST['emailc']
	電話						 $_POST['tel']
	連絡方法				 $_POST['c_method']
	問い合わせ種別	 $_POST['c_inquiry']
	内容						 $_POST['msg']
===========================================*/
/*--- 名前 check ---*/
	if(!tb_chk($_POST['name'],$error)){
		$nameE = $error;
		$eflg = 1;
	}
/*--- mail check ---*/
	if(!mail_chk($_POST['email'],$error)){
		$mailE = $error;
		$eflg = 1;
	}

/*--- mail(確認) check ---*/
	if(!agree_chk($_POST['email'],$_POST['emailc'],$error)){
		$mailcE = $error;
		$eflg = 1;
	}

	$_SESSION['name'] = $_POST['name'];
	$_SESSION['c_name'] = $_POST['c_name'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['emailc'] = $_POST['emailc'];
	$_SESSION['tel'] = $_POST['tel'];
	$_SESSION['c_method'] = $_POST['c_method'];
	$_SESSION['c_inquiry'] = $_POST['c_inquiry'];
	$_SESSION['msg'] = $_POST['msg'];
	$_SESSION['inputFlg'] = 1;

	if($eflg){
		$message = "<p class='errMsg'>※&nbsp;入力内容に誤りがあります。該当箇所を訂正後、「確認画面へ」ボタンをクリックしてください。</p>";
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
		<header id="headerWrap">
			<div id="headerInWrap">
				<div id="header" class="clearfix">
					<p>格安ランディングページ制作おまかせください！</p>
					<h1><img src="images/logo.png" width="236" height="36" alt="Be-DASH Inc." /></h1>
					<h2><img src="images/header_R.png" width="260" height="75" alt="Be-DASH Inc." /></h2>
				</div>
			</div>
		</header>

		<div class="navWrap">
			<div id="nav" class="wide">
				<div class="wide960">
					<ul class="navIn clearfix">
						<li class="flLeft"><a href="#sec1" class="scroll"><img src="images/nav_01_off.png" width="94" height="50" alt="6万円に含まれる制作物" class="imgover" /></a></li>
						<li class="flLeft"><a href="#sec2_01" class="scroll"><img src="images/nav_02_off.png" width="108" height="50" alt="ご準備いただきたい資料" class="imgover" /></a></li>
						<li class="flLeft"><a href="#onegaiAnc" class="scroll"><img src="images/nav_03_off.png" width="51" height="50" alt="お願い" class="imgover" /></a></li>
						<li class="flLeft"><a href="#sec3" class="scroll"><img src="images/nav_04_off.png" width="61" height="50" alt="安い理由" class="imgover" /></a></li>
						<li class="flLeft"><a href="#sec4" class="scroll"><img src="images/nav_06_off.png" width="69" height="50" alt="オプションいっぱい" class="imgover" /></a></li>
						<li class="flLeft"><a href="#sec5" class="scroll"><img src="images/nav_05_off.png" width="117" height="50" alt="参考ランディングページ" class="imgover" /></a></li>
						<li class="flLeft"><a href="#sec6" class="scroll"><img src="images/nav_07_off.png" width="82" height="50" alt="制作の流れとポイント" class="imgover" /></a></li>
						<li class="contBtn"><a href="#form" class="scroll"><img src="images/nav_btn_off.png" width="232" height="50" alt="制作の流れとポイント" class="imgover" /></a></li>
					</ul>
				</div>
			</div>
		</div>

		<section id="mainWrap">
			<h1>格安ランディングページ制作ランディングページ、キャンペーンページを格安で制作します！オリジナルデザインHTMLコーディングなんと6万円ぽっきり最短7日で制作します！！</h1>
		</section>

		<section id="sec1" class="wide960 clearfix">
			<h1 class="tp40"><img src="images/sec1_title.png" width="960" height="105" alt="6万円ですが、お仕事はちゃんとします！" /></h1>
			<div class="sec1_l">
				<h2>6万円の制作費の中に含まれる制作物一覧
				</h2>
				<ul>
					<li>・完全オリジナルのページデザイン</li>
					<li>・HTML5＋CSS3のHTMLコーディング<br />
					（W3Cのバリデーションチェックあり）</li>
					<li>・SEO意識したタグの設定（METAタグ設定）</li>
					<li>・Google Analyticsなどのアクセスログ取得タグの設定</li>
					<li>・口コミでページを紹介するSNSボタンの設定<br />
				（Facebookボタン、Google＋、twitter）<br />すぐにインターネット上に公開して、集客することができます！！

				</li>
				</ul>
				<h3>すみません。この作業は含まれていません。
				</h3>
				<ul>
					<li>・<span>ホームページの原稿制作</span><div class="liInBox">
					ホームページの原稿はご準備ください。ランディングページ用にリライトが必要な場合、別途費用が発生します。
					<br />原稿も含め制作することも可能です。ご相談ください。</div></li>
					<li>・<span>商品写真などの撮影費</span><div class="liInBox">
					商品以外の写真は当社の素材を無料でご利用いただけます。</div></li>
				</ul>
			</div>
			<div class="sec1_r">
				<img src="images/sec1_img.jpg" width="450" height="337" alt="" />
			</div>
		</section>

		<section id="sec2_01" class="wide960 clearfix contFade">
			<h1 class="tp60"><img src="images/sec2_title.png" width="960" height="105" alt="制作依頼時にご準備いただきたいもの一覧です。" /></h1>

			<div class="sec2Txt01 tp20">
				<h2>ランディングページの原稿</h2>
				<p>ワード、エクセルもしくはパワーポイントのファイルでご準備ください。</p>
			</div>

			<div class="sec2Txt02 tp20">
				<h2>商品やサービスの写真などの素材</h2>
				<P>なるべく高解像度の写真をご準備ください。また、ページ内に使用したい写真がございましたら、ご用意ください。</p>
			</div>

			<a id="onegaiAnc"></a>
			<div class="sec2Txt03 tp20">
				<h2>こんなページに仕上げたいというご要望</h2>
				<P>サンプルサイトからお選びいただくか、参考になるページのURLをご連絡ください。</P>
			</div>
		</section>


		<section id="sec2_02" class="wide960 clearfix">
			<div class="sec2Txt04">
				<h3>ご理解ください。制作時のお願い。</h3>
				<ul>
					<li>・すべての素材が揃ってから制作開始となります。</li>
					<li>・制作するページは縦の長さを4000px以内とさせていただきます。</li>
					<li>・いただく素材（原稿、写真）の内容に不備がある場合、制作をお断りさせていただくことがございます。<br />
					（情報量が足りなく、ランディングページとして成立しない場合など）</li>
					<li>・ 公序良俗に反する内容のページは制作をお断りさせていただきます。</li>
				</ul>
			</div>
		</section>

		<section id="sec3" class="wide960">
			<h1 class="tp60"><img src="images/sec3_title.png" width="960" height="105" alt="なぜこんなに安いの？何か理由があるの？" /></h1>

			<div id="sec3Box" class="clearfix tm20">

				<div id="reason1" class="tp50 clearfix">
					<div class="reason1_l">
				        <h2><img src="images/sec3_ren01.jpg" width="600" height="70" alt="reason1インターンが対応" /></h2>
				        <table class="reasonTbl">
				        	<tr>
				        		<th>・</th>
				        		<td>ご依頼いただくページは、学生のインターンが対応します。</td>
				        	</tr>
				        	<tr>
				        		<th>・</th>
				        		<td>そのため、通常の制作と比べコストを削減することが可能となりました。</td>
				        	</tr>
				        	<tr>
				        		<th>・</th>
				        		<td>でも、ご安心ください。デザインは当社のベテランデザイナー（アートディレクター）のチェック、修正を経てお客様にご提出いたします。</td>
				        	</tr>
				        </table>
					</div>
					<div class="reason1_r">
						<img src="images/sec3_img01.jpg" width="300" height="225" alt="" />
					</div>
				</div>

				<div id="reason2" class="clearfix">
					<div class="reason2_l">
				        <h2><img src="images/sec3_ren02.jpg" width="600" height="70" alt="reason2電話とメールでのみ対応" /></h2>
				        <table class="reasonTbl">
				        	<tr>
				        		<th>・</th>
				        		<td>ランディングページ制作サービスには営業マンがおりません。</td>
				        	</tr>
				        	<tr>
				        		<th>・</th>
				        		<td>営業コストを削減し、制作費だけの価格設定を行っているため、このような金額でご提供できます。</td>
				        	</tr>
				        </table>

					</div>
					<div class="reason2_r">
						<img src="images/sec3_img02.jpg" width="300" height="225" alt="" />
					</div>
				</div>

				<div id="reason3" class="clearfix">
					<div class="reason3_l" >
				        <h2><img src="images/sec3_ren03.jpg" width="600" height="70" alt="reason3制作に集中する環境" /></h2>
				        <table class="reasonTbl">
				        	<tr>
				        		<th>・</th>
				        		<td>ランディングページ制作サービスのデザイナーは、同時に複数の案件を制作することはありません。</td>
				        	</tr>
				        	<tr>
				        		<th>・</th>
				        		<td>1つのデザインに集中して制作するため、良いデザインを素早く仕上げることが可能です。</td>
				        	</tr>
				        	<tr>
				        		<th>・</th>
				        		<td>制作時間が短いため、コストを押さえることが可能になりました。</td>
				        	</tr>

				        </table>

					</div>
					<div class="reason3_r">
						<img src="images/sec3_img03.jpg" width="300" height="225" alt="" />
					</div>
				</div>
			</div>
				<div id="sec3TxtBox" class="clearfix">
					<div class="sec3Txt">
					<h3><img src="images/sec03_title04.gif" width="528" height="135" alt="【学生やインターンにデザインのチャンスをください！】" /></h3>
					<p>一般的なインターンでは、デザイン業務のごく一部しか経験することができず、本当のWebデザイナーとしての喜びを感じることができません。<br />ビーダッシュでは、インターンに本当の仕事を経験させ、お客様からのお褒めの言葉や厳しい言葉をいただき、それでもWebデザイナーとして活躍する覚悟のある人材を育てていきたいと考えております。<br />当社のインターンシップ制度にご理解いただける企業様からのご依頼をメンバー一同、お待ちしています。</p>
					</div>
				</div>
		</section>

		<section id="sec4" class="wide960">
			<h1 class="tp10"><img src="images/sec4_title.png" width="960" height="105" alt="さまざまなご要望にもお答えします！！" /></h1>
			<table class="sec4Tbl">
				<tr>
					<td class="td01 bg_g">・原稿リライト作業</td>
					<td class="td02 bg_g">＋20,000円</td>
				</tr>
				<tr>
					<td class="td01 bg_w">・ABテスト用ページ（追加デザイン）</td>
					<td class="td02 bg_w">＋50,000円</td>
				</tr>
				<tr>
					<td class="td01 bg_g">・大サイズオプション</td>
					<td class="td02 bg_g">4000px以上のサイズの場合、追加デザイン費をいただきます<br />5000px以内　＋10,000円<br />
					6000px以内　＋20,000円</td>
				</tr>
				<tr>
					<td class="td01 bg_w">・問い合わせフォーム設定</td>
					<td class="td02 bg_w">ページ下部に設定する場合</td>
				</tr>
				<tr>
					<td class="td01 bg_g">・パララックス対応</td>
					<td class="td02 bg_g">内容によって別途お見積もりとなります</td>
				</tr>
				<tr>
					<td class="td01 bg_w">・スマホページ同時制作</td>
					<td class="td02 bg_w">＋40,000円</td>
				</tr>
			</table>
			   <p>&#x2a;その他のご要望については、電話、フォームにてお問い合わせください。</p>


			<div id="sec4_02">
				<p>ご要望をお持ちの代理店様からのお問い合わせは大歓迎です！！<br />
					大量の制作もお受けできます。</p>
			</div>

		</section>

		<section  id="sec5" class="wide960">
			<h1 class="tp60"><img src="images/sec5_title.png" width="960" height="135" alt="参考にしてください。ディレクターが選ぶ良いランディングページの一覧。" /></h1>
				<div id="sec5Box">
					<div class="sec5Box01 clearfix">
						<div class="sec5BoxL">
							<img src="images/sec5_img01.jpg" width="304" height="407" alt="" />
						</div>
						<div class="sec5BoxR">
							<h2>ランディングページまとめサイト</h2>
							<p>ランディングページのデザインを厳選したサイトを集めました。<br />WEB担当者様、マーケティング担当者様等幅広くご活用頂けると<br />幸いです。</p>
							<div style="background:#fff; width:488px;"><a href="http://www.lp-matome.com/" target="_blank"><img src="images/sec5_btn01.jpg" width="489" height="60" alt="ランディングページ一覧サイトを開く" class="imgopacity" /></a></div>
						</div>
					</div>
				</div>
		</section>
		<!-- <section  id="sec5_02" class="wide960">
			<h1 class="tp60"><img src="images/sec5_title02.png" width="960" height="135" alt="こんなに作りました。制作実際の一覧です。" /></h1>
				<div id="sec5Box">
					<div class="sec5Box01">
						<div class="sec5Boximg clearfix">
							<img src="images/sec5_img01.jpg" width="210" height="247" alt="" />
							<img src="images/sec5_img02.jpg" width="210" height="247" alt="" />
							<img src="images/sec5_img03.jpg" width="210" height="247" alt="" />
							<img src="images/sec5_img04.jpg" width="210" height="247" alt="" />
						</div>
						<div class="tm30 center">
							<a href=""><img src="images/sec5_btn02.jpg" width="491" height="62" alt="ランディングページ一覧サイトを開く" class="imgopacity" /></a>
						</div>
					</div>
				</div>
		</section> -->

		<section id="sec6" class="wide960">
			<h1 class="tp60"><img src="images/sec6_title.png" width="960" height="135" alt="こんな流れて制作します。制作の流れとポイント" /></h1>

			<div class="sec6_Bg01">
				<p class="sec6Txt01">電話、お問い合わせフォームにてご連絡ください。</p>
			</div>
			<div class="sec6_Bg02">
				<p class="sec6Txt02">お電話、メール、ご希望の方法にて当社の担当からご連絡いたします。<br />ご準備いただく素材および制作スケジュールについて確認させていただきます。</p>
			</div>
			<div class="sec6_Bg03">
				<p class="sec6Txt02">制作に必要な原稿および写真などの素材をご準備ください。<br />足りない情報、素材がある場合、すぐに制作に取り掛かれない場合がございます。</p>
			</div>
			<div class="sec6_Bg04">
				<p class="sec6Txt02">ご準備いただいた素材（原稿、写真など）を確認し、デザイン案についてご相談させていただきます。<br />サンプルサイトなどをご覧いただきながら、イメージに近いページをベースに細かな部分までご確認させていただきます。<br />ご要望に応じて制作スケジュールが変更になる場合がございます。<br />同時にランディングページのコーディング時に必要な<br />・SEO意識したタグの設定（METAタグ設定）<br />・Google Analyticsなどのアクセスログ取得タグの設定<br />・口コミでページを紹介するSNSボタンの設定<br />についてもご確認させていただきます。</p>
			</div>
			<div class="sec6_Bg05">
				<p class="sec6Txt03">ご相談させていただいたデザインイメージを元に制作を進めます。<br />デザイン完成まで、少々お待ちください。</p>
			</div>
			<div class="sec6_Bg06">
				<p class="sec6Txt02">デザインの最初の案をご提出いたします。<br />メールにてお送りさせていただいたのち、お電話でご説明させていただきます。</p>
			</div>
			<div class="sec6_Bg07">
				<p class="sec6Txt02">デザイン初校をご確認いただき、修正点をご連絡ください。</p>
			</div>
			<div class="sec6_Bg08">
				<p class="sec6Txt02">ご指示いただいた修正を反映した修正案をご提出いたします。<br />再度ご確認いただき、追加修正がある場合はお申し付けください。</p>
			</div>
			<div class="sec6_Bg09">
				<p class="sec6Txt02">最終案のご確認になります。<br />最終のご確認の後、HTMLのコーディング作業に入りますが、コーディング後のデザインの修正は別途費用が発生することがございます。<br />予めご了承ください。</p>
			</div>
			<div class="sec6_Bg10">
				<p class="sec6Txt02">Windows、Macで最適に表示されるようランディングページをコーディングいたします。</p>
			</div>
			<div class="sec6_Bg11">
				<p class="sec6Txt03">HTMLページを納品いたします。<br />当社にてお客様のWebサーバにアップすることも可能です。<br />（オプションサービス）</p>
			</div>
		</section>

		<section id="form" class="wide960">
			<h1 class="tp60"><img src="images/form_title.png" width="960" height="135" alt="お問い合わせフォーム" /></h1>
			<form id="form" action="index.php#form" method="post">
				<table class="formTb">
					<tr>
						<th class="bg_g">お名前<span>※必須</span></th>
							<td>
							<input type="text" class="text" placeholder="お名前を入力してください" name="name" value="<?php print $_SESSION['name']; ?>" />
							<?php if($nameE) {print '<br /><span class="errFont">'.$nameE."</span>";} ?></td>
					</tr>
					<tr>
						<th class="bg_g">会社名</th>
							<td><input type="text" class="text" placeholder="会社名を入力してください" name="c_name" value="<?php print $_SESSION['c_name']; ?>" /></td>
					</tr>
					<tr>
						<th class="bg_g">メールアドレス<span>※必須</span></th>
							<td><input type="text" class="text" placeholder="メールアドレスを入力してください" name="email" size="50" value="<?php print $_SESSION['email']; ?>" />
							<?php if($mailE) {print '<br /><span class="errFont">'.$mailE."</span>";} ?></td>
					</tr>
					<tr>
						<th class="bg_g">メールアドレス(確認)<span>※必須</span></th>
							<td><input type="text" class="text" placeholder="メールアドレス(確認)を入力してください" name="emailc" size="50" value="<?php print $_SESSION['emailc']; ?>" />
							<?php if($mailcE) {print '<br /><span class="errFont">'.$mailcE."</span>";} ?><td>
					</tr>
					<tr>
						<th class="bg_g">電話番号</th>
							<td><input type="text" class="text" placeholder="090-1234-5678" value="<?php print $_SESSION['tel']; ?>" /></td>
					</tr>
					<tr>
						<th class="bg_g">ご連絡方法</th>
							<td>
								<input type="radio" id="c_method-1" name="c_method" class="radio" checked="checked" value="メール" /><label for="c_method-1">メール</label>
								<input type="radio" id="c_method-2" name="c_method" class="radio" value="電話" /><label for="c_method-2">電話</label>
							</td>
					</tr>
					<tr>
						<th class="bg_g">お問い合わせの内容</th>
							<td>
								<input type="radio" id="c_inquiry-1" class="radio" name="c_inquiry" checked="checked" value="制作依頼" />
								<label for="c_inquiry-1">制作依頼</label>
								<input type="radio" id="c_inquiry-2" class="radio" name="c_inquiry" value="業務提携" />
								<label for="c_inquiry-2">業務提携</label>
								<input type="radio" id="c_inquiry-3" class="radio" name="c_inquiry" value="ご質問" />
								<label for="c_inquiry-3">ご質問</label>
								<input type="radio" id="c_inquiry-4" class="radio" name="c_inquiry" value="その他" />
								<label for="c_inquiry-4">その他</label>
							</td>
					</tr>
					<tr>
						<th class="bg_g">お問い合わせの詳細</th>
							<td><textarea name="msg" cols="50" rows="10"><?php print $_SESSION['msg']; ?></textarea></td>
					</tr>
				</table>
				<input type="hidden" name="next" value="1" />
				<div class="tm30 taCtr">
					<input type="image" src="images/form_btn01.jpg" width="491" height="62" alt="確認画面へ" class="imgopacity" />
					<!-- <input type="submit" value="確認する" /> -->
				</div>
			</form>
				<!-- <div class="tm30 taCtr">
					<a href="confirm.html"><img src="images/form_btn01.jpg" width="491" height="62" alt="確認画面" class="imgopacity" /></a>
				</div> -->
		</section>

		<section  id="to-top" class="wide960">
			<h3><a href="#all" class="scroll"><img src="images/to-top_off.png" width="43" height="81" alt="topへ" class="imgover" /></a></h3>
		</section>





<footer id="footer">
	<div id="copy">
		Copyright(C)2008-2014 Be-DASH Inc, All Rights Reserved.
	</div>
</footer>
	</div><!-- #all closed -->
</body>
</html>
