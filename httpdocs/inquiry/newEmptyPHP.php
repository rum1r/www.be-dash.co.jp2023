<?php

session_start();
mb_internal_encoding("utf-8");

$f_item_name_last = $_SESSION['f_item_name_last'];
$f_item_name_first = $_SESSION['f_item_name_first'];
$f_item_company_name = $_SESSION['f_item_company_name'];
$f_item_tel = $_SESSION['f_item_tel'];
$f_item_mail = $_SESSION['f_item_mail'];
$f_item_radio5 = $_SESSION['f_item_radio5'];
$f_item_free3 = $_SESSION['f_item_free3'];

//▼名と代表アドレスを記述
$from = "From:" . mb_encode_mimeheader("ビーダッシュ株式会社") . "<no-reply@be-dash.co.jp>";
$from .= "\n";
//$from .= "Cc: director@be-dash.co.jp";
$from .= "Cc: momotarouko@gmail.com";
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

  $sbj = "お問い合わせありがとうござます｜ビーダッシュ株式会社";

  $a_msg = <<< BODY

※このメールは自動返信メールです。

この度はお問い合わせをいただきましてありがとうございます。
お問い合わせいただきました内容は、下記の通りです。
------------------------------

【お名前】
{$f_item_name_last}
{$f_item_name_first}

【会社名】
{$f_item_company_name}

【電話番号】
{$f_item_tel}

【メールアドレス】
{$f_item_mail}

【サービスカテゴリ】
{$f_item_radio5}

【お問い合わせ内容】
{$f_item_free3}



------------------------------

2営業日以内にはご連絡をさせていただきます。

本メールに心当たりの無い方は、
下記までお問い合わせいただきますようお願いいたします。

---------------------------------------

■ ビーダッシュ株式会社 / Be-DASH Inc.
 
■ 住所:東京都渋谷区幡ヶ谷2-21-4幡ヶ谷ファーストビルディング8階
 
■ TEL：03-6382-9604 / FAX：03-6382-9605
 
■ E-mail:ginza@22club.net
 
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

