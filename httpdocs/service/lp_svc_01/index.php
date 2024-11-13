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
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
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
<a id="tl2" name="tl2" class="tl"></a>
	<div id="all">
		<nav>
		<div id="menu">
			<div id="nav">
				<h1>ご相談・ご質問はお気軽にお電話ください。</h1>
				<ul>
					<li id="tel">
						<span>03-6382-9604<br />
						担当：佐伯（さえき）</span></li>
					<li>
						<a href="#content-8" id="to_form" class="scroll"><span>問い合わせフォーム</span></a>
					</li>
					<li>
						<a href="#content-1" id="nav1" class="scroll"><span>6万円に含まれる制作物</span></a>
					</li>
					<li>
						<a href="#content-2" id="nav2" class="scroll"><span>ご準備いただきたい資料</span></a>
					</li>
					<li>
						<a href="#content-3" id="nav3" class="scroll"><span>格安で制作できる理由</span></a>
					</li>
					<li>
						<a href="#content-4" id="nav4" class="scroll"><span>充実したオプション一覧</span></a>
					</li>
					<li>
						<a href="#content-7" id="nav7" class="scroll"><span>制作の流れとポイント</span></a>
					</li>
				</ul>
			</div>
		</div>
		</nav>

		<section>
		<div id="content-1">
			<div class="title-h1">
				<h1>ランディングページ、キャンペーンページを格安で制作します！</h1>
			</div>
			<div class="title-h2">
				<h2><img src="images/title_h2-1.png" alt="オリジナルデザイン&amp;HTMLコーディング合わせてなんと！6万円ぽっきり!!最短7日で制作します!!" id="img_h2-1" /></h2>
			</div>
			<div class="content-inner">
				<h3>6万円でも完璧なページを仕上げます！</h3>
				<p><span>6万円の制作費の中に含まれる制作物一覧</span></p>
				<ul>
					<li>完全オリジナルのページデザイン</li>
					<li>SEO意識したタグの設定（METAタグ設定）</li>
					<li>HTML5＋CSS3のHTMLコーディング（W3Cのバリデーションチェックあり）</li>
					<li>Google Analyticsなどのアクセスログ取得タグの設定</li>
					<li>口コミでページを紹介するSNSボタンの設定（Facebookボタン、Google＋、twitter）<br />
					すぐにインターネット上に公開して、集客することができます！！</li>
				</ul>
				<img src="images/nana1.png" alt="" id="nana1" />
				<img src="images/nana2.png" alt="" id="nana2" />
			</div>
			<div class="title-sub">
				<h4>すみません。この作業は含まれていません。</h4>
			</div>
			<div class="content-sub">
				<dl>
					<dt class="dt-1_1">ホームページの原稿制作</dt>
						<dd class="tp10"><span>ホームページの原稿はご準備ください。<br />
							ランディングページ用にリライトが必要な場合、別途費用が発生します。<br />
							原稿も含め制作することも可能です。ご相談ください。</span></dd>
					<dt class="dt-1_2">商品写真などの撮影費</dt>
						<dd class="last tp10"><span>商品以外の写真は当社の素材を無料でご利用いただけます。</span></dd>
				</dl>
			</div>
		</div>
		</section>

		<section>
		<div id="content-2">
			<div class="title-h1">
				<h1>制作依頼時にご準備いただきたいもの一覧です。</h1>
			</div>
			<div class="content-inner">
				<h2 id="title-h2_1">ランディングページの原稿</h2>
				<p><span>ワード、エクセルもしくはパワーポイントのファイルでご準備ください。</span></p>
				<h2 id="title-h2_2">商品やサービスの写真などの素材</h2>
				<p><span>なるべく高解像度の写真をご準備ください。<br />
					また、ページ内に使用したい写真がございましたら、<br />
					ご用意ください。</span></p>
				<h2 id="title-h2_3">こんなページに仕上げたいというご要望</h2>
				<p class="last"><span>サンプルサイトからお選びいただくか、<br />
					参考になるページのURLをご連絡ください。</span></p>
				<img src="images/nana3.png" alt="" id="nana3" />
			</div>
			<div class="title-sub">
				<h3>ご理解ください。制作時のお願い。</h3>
			</div>
			<div class="content-sub">
				<div>
				<ul>
					<li>すべての素材が揃ってから制作開始となります。</li>
					<li>制作するページは縦の長さを4000px以内とさせていただきます。</li>
					<li>いただく素材（原稿、写真）の内容に不備がある場合、制作をお断りさせていただくことがございます。<br />
						（情報量が足りなく、ランディングページとして成立しない場合など）</li>
					<li>公序良俗に反する内容のページは制作をお断りさせていただきます。</li>
				</ul>
				</div>
			</div>
		</div>
		</section>

		<section>
		<div id="content-3">
			<div class="title-h1">
				<h1>なぜこんなに安いの？何か理由があるの？</h1>
			</div>
			<div class="content-inner">
				<h2 id="title-h2_1">理由その1 インターンが対応</h2>
				<div>
					<p>ご依頼いただくページは、学生のインターンが対応します。</p>
					<p>そのため、通常の制作と比べコストを削減することが可能となりました。</p>
					<p>でも、ご安心ください。デザインは当社のベテランデザイナー<br />
					（アートディレクター）のチェック、修正を経てお客様にご提出いたします。</p>
				</div>
				<h2 id="title-h2_2">電話とメールでのみ対応</h2>
				<div>
					<p>ランディングページ制作サービスには営業マンがおりません。</p>
					<p>営業コストを削減し、制作費だけの価格設定を行っているため、<br />
						このような金額でご提供できます。</p>
				</div>
				<h2 id="title-h2_3">制作に集中する環境</h2>
				<div>
					<p>ランディングページ制作サービスのデザイナーは、同時に複数の案件を<br />
						制作することはありません。</p>
					<p>1つのデザインに集中して制作するため、良いデザインを素早く仕上げ<br />
						ることが可能です。</p>
					<p>制作時間が短いため、コストを押さえることが可能になりました。</p>
				</div>
				<img src="images/nana4.png" alt="" id="nana4" />
			</div>
			<div class="content-sub">
				<div>
					<h3>【学生やインターンにデザインのチャンスをください！】</h3>
					<p>一般的なインターンでは、デザイン業務のごく一部しか経験することができず、本当のWebデザイナーとしての喜びを感じることができません。<br />
						ビーダッシュでは、インターンに本当の仕事を経験させ、お客様からのお褒めの言葉や厳しい言葉をいただき、それでもWebデザイナーとして活躍する覚悟のある人材を育てていきたいと考えております。<br />
					当社のインターンシップ制度にご理解いただける企業様からのご依頼をメンバー一同、お待ちしています。</p>
				</div>
			</div>
		</div>
		</section>

		<section>
		<div id="content-4">
			<div class="title-h1">
				<h1>さまざまなご要望にもお答えします！！</h1>
			</div>
			<div class="content-inner">
				<ul>
					<li id="img-content-4_1">
						<dl>
							<dt>原稿リライト作業</dt>
								<dd>＋20,000円</dd>
						</dl>
					</li>
					<li id="img-content-4_2">
						<dl>
							<dt>ABテスト用ページ</dt>
								<dd>（追加デザイン）</dd>
								<dd>＋50,000円</dd>
						</dl>
					</li>
					<li id="img-content-4_3">
						<dl>
							<dt>大サイズオプション</dt>
								<dd>(4000px以上のサイズの場合)</dd>
								<dd>5000px以内 ＋10,000円</dd>
								<dd>6000px以内 ＋20,000円</dd>
						</dl>
					</li>
					<li id="img-content-4_4">
						<dl>
							<dt>問い合わせフォーム設定</dt>
								<dd>ページ下部に設定する場合</dd>
						</dl>
					</li>
					<li id="img-content-4_5">
						<dl>
							<dt>パララックス対応</dt>
								<dd>内容によって別途お見積もりとなります。</dd>
						</dl>
					</li>
					<li id="img-content-4_6">
						<dl>
							<dt>スマホページ同時制作</dt>
								<dd>＋40,000円</dd>
						</dl>
					</li>
				</ul>
				<p>その他のご要望については、電話、フォームにてお問い合わせください。</p>
				<img src="images/nana5.png" alt="" id="nana5" />
				<img src="images/nana6.png" alt="" id="nana6" />
			</div>
			<div class="title-sub clearfix">
				<h2>代理店様からのお問い合わせ歓迎です！！</h2>
			</div>
			<div class="content-sub">
				<div>
					<dl>
						<dt class="dt-1_1">安価にランディングページを作りたい</dt>
						<dt class="dt-1_2">複数パターンのランディングページを作りたい</dt>
							<dd>などのご要望をお持ちの代理店様からのお問い合わせは<br />
								大歓迎です！！</dd>
							<dd>大量の制作もお受けできます。</dd>
					</dl>
				</div>
			</div>
		</div>
		</section>

		<section style="margin-bottom:2.6em;">
		<div id="content-5">
			<div class="title-h1">
				<h1>参考にしてください。ディレクターが選ぶ良いランディングページの一覧。</h1>
			</div>
			<div class="content-inner">
			<div>
			<ul>
				<li><a href="http://www.lp-matome.com/" target="_blank"><img src="images/lp-1.jpg"></a></li>
				<li><a href="http://www.lp-matome.com/" target="_blank"><img src="images/lp-2.jpg"></a></li>
				<li><a href="http://www.lp-matome.com/" target="_blank"><img src="images/lp-3.jpg"></a></li>
				<li><a href="http://www.lp-matome.com/" target="_blank"><img src="images/lp-4.jpg"></a></li>
			</ul>
			<p><a href="http://www.lp-matome.com/" target="_blank">ランディングページ一覧サイトを開く</a></p>
			</div>
			</div>
		</div>
		</section>

		<section>
		<div id="content-7">
			<div class="title-h1">
				<h1>こんな流れで制作します。制作の流れとポイント。</h1>
			</div>
			<div class="content-inner">
				<ul>
					<li>
						<dl>
							<dt id="title_dt-7_1">1.お客様からのご連絡</dt>
								<dd><span>電話、お問い合わせフォームにてご連絡ください。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_2">2.当社の担当からご連絡</dt>
								<dd><span>お電話、メール、ご希望の方法にて当社の担当からご連絡いたします。<br />
								ご準備いただく素材および制作スケジュールについて確認させていただきます。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_3">3.制作のための素材のご準備</dt>
								<dd><span>制作に必要な原稿および写真などの素材をご準備ください。<br />
								足りない情報、素材がある場合、すぐに制作に取り掛かれない場合がございます。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_4">4.デザイン案＆スケジュールの調整</dt>
								<dd><span>ご準備いただいた素材（原稿、写真など）を確認し、デザイン案についてご相談させていただきます。<br />
								サンプルサイトなどをご覧いただきながら、イメージに近いページをベースに細かな部分までご確認させていただきます。ご要望に応じて制作スケジュールが変更になる場合がございます。<br />
								同時にランディングページのコーディング時に必要な
									<ul>
										<li>SEO意識したタグの設定（METAタグ設定）</li>
										<li>Google Analyticsなどのアクセスログ取得タグの設定</li>
										<li>口コミでページを紹介するSNSボタンの設定</li>
									</ul>
								についてもご確認させていただきます。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_5">5.制作開始</dt>
								<dd><span>ご相談させていただいたデザインイメージを元に制作を進めます。<br />
								デザイン完成まで、少々お待ちください。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_6">6.デザイン初校ご提出</dt>
								<dd><span>デザインの最初の案をご提出いたします。<br />
								メールにてお送りさせていただいたのち、お電話でご説明させていただきます。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_7">7.ご確認、修正指示</dt>
								<dd><span>デザイン初校をご確認いただき、修正点をご連絡ください。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_8">8.修正案ご提出</dt>
								<dd><span>ご指示いただいた修正を反映した修正案をご提出いたします。<br />
								再度ご確認いただき、追加修正がある場合はお申し付けください。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_9">9.最終案ご提出</dt>
								<dd><span>最終案のご確認になります。<br />
								最終のご確認の後、HTMLのコーディング作業に入りますが、コーディング後のデザインの修正は別途費用が発生することがございます。予めご了承ください。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_10">10.HTMLコーディング作業</dt>
								<dd><span>Windows、Macで最適に表示されるようランディングページをコーディングいたします。</span></dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt id="title_dt-7_11">11.HTMLページ納品</dt>
								<dd><span>HTMLページを納品いたします。<br />
								当社にてお客様のWebサーバにアップすることも可能です。（オプションサービス）</span></dd>
						</dl>
					</li>
				</ul>
			</div>
		</div>
		</section>

		<section>
		<div id="content-8">
			<div class="title-h1">
				<h1>【ご相談・ご質問・ご依頼】　お問い合わせフォーム</h1>
			</div>
			<div class="content-inner">
				<div>
					<p>必要な項目を入力の上、確認するボタンを押してください。</p>
					<p>後ほど、担当よりご連絡させていただきます。<br />
						お急ぎの場合は、03-6382-9604（担当：佐伯）までご連絡ください。</p>
					<p>2営業日以内に当社からのご連絡が無い場合、入力いただいてメールアドレスの間違いが考えられます。<br />
						お手数ですが、再度お問い合わせいただきますよう、お願いいたします。</p>
				</div>
			</div>
			<form id="form" action="index.php#form" method="post">
				<table>
					<tr>
						<th>お名前<span>※必須</span></th>
							<td>
								<input type="text" class="text" name="name" value="<?php print $_SESSION['name']; ?>" />
								<?php if($nameE) {print '<br /><span class="errFont">'.$nameE."</span>";} ?>
							</td>
					</tr>
					<tr>
						<th>会社名</th>
							<td>
								<input type="text" class="text" name="c_name" value="<?php print $_SESSION['c_name']; ?>" />
							</td>
					</tr>
					<tr>
						<th>メールアドレス<span>※必須</span></th>
							<td>
								<input type="text" class="text" name="email" size="50" value="<?php print $_SESSION['email']; ?>" />
								<?php if($mailE) {print '<br /><span class="errFont">'.$mailE."</span>";} ?>
							</td>
					</tr>
					<tr>
						<th>メールアドレス(確認)<span>※必須</span></th>
							<td>
								<input type="text" class="text" name="emailc" size="50" value="<?php print $_SESSION['emailc']; ?>" />
								<?php if($mailcE) {print '<br /><span class="errFont">'.$mailcE."</span>";} ?>
							</td>
					</tr>
					<tr>
						<th>電話番号</th>
							<td>
								<input name="tel" class="text" type="text" value="<?php print $_SESSION['tel']; ?>" />
							</td>
					</tr>
					<tr>
						<th>ご連絡方法</th>
							<td>
								<input type="radio" name="c_method" id="c_method-1" class="radio" value="メール" checked="checked" /><label for="c_method-1">メール</label>
								<input type="radio" name="c_method" id="c_method-2" class="radio" value="電話" /><label for="c_method-2">電話　</label>
							</td>
					</tr>
					<tr>
						<th>お問い合わせの内容</th>
							<td>
								<input type="radio" name="c_inquiry" id="c_inquiry-1" class="radio" value="制作依頼" checked="checked" /><label for="c_inquiry-1">制作依頼</label>
								<input type="radio" name="c_inquiry" id="c_inquiry-2" class="radio" value="見積もり" /><label for="c_inquiry-2">見積もり</label>
								<input type="radio" name="c_inquiry" id="c_inquiry-3" class="radio" value="業務提携" /><label for="c_inquiry-3">業務提携</label><br />
								<input type="radio" name="c_inquiry" id="c_inquiry-4" class="radio" value="ご質問" /><label for="c_inquiry-4">ご質問　</label>
								<input type="radio" name="c_inquiry" id="c_inquiry-5" class="radio" value="ご相談" /><label for="c_inquiry-5">ご相談　</label>
								<input type="radio" name="c_inquiry" id="c_inquiry-6" class="radio" value="その他" /><label for="c_inquiry-6">その他　</label>
							</td>
					</tr>
					<tr>
						<th class="last">お問い合わせの詳細</th>
							<td>
								<textarea name="msg" cols="50" rows="10"><?php print $_SESSION['msg']; ?></textarea>
							</td>
					</tr>
				</table>
				<input type="hidden" name="next" value="1" />
				<div id="area-btn">
					<input type="image" src="images/btn-conf_off.gif" alt="確認する" />
					<!--<input type="submit" value="確認する" />-->
				</div>
			</form>
		</div>
		</section>

		<footer>
		<div id="foot">
			<div>
				<h1>ビーダッシュ株式会社</h1>
				<ul>
					<li><a href="http://www.be-dash.co.jp/company/outline.html" target="_blank">会社概要</a></li>
				</ul>
			</div>
			<address class="clearfix">Copyright &copy; 2008-2014 Be-DASH Inc. All Right Reserved.</address>
		</div>
		</footer>


	</div><!-- #all closed -->
</body>
</html>
