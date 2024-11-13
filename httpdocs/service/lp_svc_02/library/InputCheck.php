<?php 

/*================ 必須テキスト共通チェック ================*/
function tb_chk($str, &$error) {
	$len = mb_strlen ($str);
	if ($len <= 0) {
		$error = '入力して下さい';
		return false;
	}
	return true;
}
/*================ 名前チェック（テキストボックスが2つの場合） ================*/

function name_chk($last, $first, &$error) {
	$llen = mb_strlen ($last);
	$flen = mb_strlen ($first);
	
	if ($flen <= 0 && $llen <= 0) {
		$error = "「姓・名」を入力して下さい";
		return false;
	}
		
	if ($flen <= 0) {
		$error = '「名」を入力して下さい';
		return false;
	}
	if ($flen > 30) {
		$error = '「名」は30文字以内で入力して下さい';
		return false;
	}
	if (preg_match ("/[<>\"']+/", $first)) {
		$error = '「名」に記号は使用できません';
		return false;
	}
	
	if ($llen <= 0) {
		$error = '「姓」を入力して下さい';
		return false;
	}
	if ($llen > 30) {
		$error = '「姓」は30文字以内で入力して下さい';
		return false;
	}
	if (preg_match ("/[<>\"']+/", $first)) {
		$error = '「姓」に記号は使用できません';
		return false;
	}
	return true;
}	

/*================ 名前全角カナチェック(utf-8)================*/

function zenkana_chk1($last, $first, &$error) {
	$llen = mb_strlen ($last);
	$flen = mb_strlen ($first);
	
	
	if ($flen <= 0 && $llen <= 0) {
		$error = "「姓・名」を入力して下さい";
		return false;
	}
	if ($llen <= 0) {
		$error = '「姓」を入力して下さい';
		return false;
	}	
	if ($flen <= 0) {
		$error = '「名」を入力して下さい';
		return false;
	}
	
	if (!preg_match("/^(?:\xe3\x82[\xa1-\xbf]|\xe3\x83[\x80-\xbe])+$/",$last) && 
		!preg_match("/^(?:\xe3\x82[\xa1-\xbf]|\xe3\x83[\x80-\xbe])+$/",$first)) {
		$error = '「姓・名」に全角カタカナ以外の文字が含まれています';
		return false;
	}
	
	if ($flen > 100) {
		$error = '「名」は100文字以内で入力して下さい';
		return false;
	}
	if (!preg_match("/^(?:\xe3\x82[\xa1-\xbf]|\xe3\x83[\x80-\xbe])+$/",$first)) {
		$error = '「名」に全角カタカナ以外の文字が含まれています';
		return false;
	}
	
	if ($llen > 100) {
		$error = '「姓」は100文字以内で入力して下さい';
		return false;
	}
	if (!preg_match("/^(?:\xe3\x82[\xa1-\xbf]|\xe3\x83[\x80-\xbe])+$/",$last)) {
		$error = '「姓」に全角カタカナ以外の文字が含まれています';
		return false;
	}
	
	return true;
}

/*================ 全角カナチェック(utf-8) ================*/

function zenkana_chk2($str, &$error) {
	$len = mb_strlen ($str);
	
	if ($len <= 0) {
		$error = '入力して下さい';
		return false;
	}
	
	// if (!preg_match("/^(?:\xe3\x82[\xa1-\xbf]|\xe3\x83[\x80-\xbe])+$/",$str)){
	// if(!preg_match("/^(\xe3(\x82[\xa1-\xbf]|\x83[\x80-\xb6]|\x83\xbc|\x80\x80))*$/",$str)){
	if(!preg_match("/^[ァ-ヶー　 ]+$/u",$str)){
		$error = '全角カナを入力してください';
		return false;
	}
	
	return true;
}


/*================ セレクトボックスチェック ================*/

function select_chk($str,&$error){
	if($str == "▼選択してください▼"){
		$error = "選択して下さい";
		return false;
	}
	return true;
}


/*================ ラジオボタンチェック ================*/

function radio_chk($str,&$error){
	if(!$str){
		$error = "選択して下さい";
		return false;
	}
	return true;
}

/*================ メールアドレスチェック ================*/

function mail_chk ($str, &$error) {
	$len = mb_strlen ($str);
	if ($len <= 0) {
		$error = '入力して下さい';
		return false;
	}
	if ($len > 255) {
		$error = '255文字以内で入力して下さい';
		return false;
	}
	
	if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $str)) {
		$error = '無効なメールアドレスです';
		return false;
	}
	return true;
}


/*================ メールアドレス(確認)チェック ================*/

function agree_chk ($eml,$emlc, &$error) {
	$len = mb_strlen ($emlc);
	if ($len <= 0) {
		$error = '入力して下さい';
		return false;
	}
	if($eml != $emlc){
		$error = 'アドレスが一致しません';
		return false;
	}
	return true;
}


/*================ 電話番号チェック ================*/

function tel_chk ($tel1,$tel2,$tel3, &$error) {
	$len1 = mb_strlen ($tel1);
	$len2 = mb_strlen ($tel2);
	$len3 = mb_strlen ($tel3);
	
	if ($len1 <= 0 || $len2 <= 0 || $len3 <= 0) {
		$error = '入力して下さい';
		return false;
	}
/*	if ($len1 != 3 || $len2 != 4 || $len3 != 4) {
		$error = '無効な電話番号です';
		return false;
	}*/
	if (preg_match ("/[^\d０-９]+/", $tel1) ||
		preg_match ("/[^\d０-９]+/", $tel2) ||
		preg_match ("/[^\d０-９]+/", $tel3)) {
		$error = '数字を入力して下さい';
		return false;
	}
	return true;
}
	
	
/*================ 数字(入力必須)チェック ================*/
function suji_chk1 ($str, &$error) {
	$len = mb_strlen ($str);
	if ($len <= 0) {
		$error = '入力して下さい';
		return false;
	}
	if (preg_match ("/[^\d０-９]+/", $str)) {
		$error = '数字を入力して下さい';
		return false;
	}
	return true;
}	
	
/*================ 数字(入力任意)チェック ================*/
function suji_chk2 ($str, &$error) {
	$len = mb_strlen ($str);
	if($len !=""){
		if (preg_match ("/[^\d０-９]+/", $str)) {
			$error = '数字を入力して下さい';
			return false;
		}
	}
	return true;
}	
	
	
/*================ 郵便番号チェック ================*/

function zip_chk ($str, &$error) {
	$len = mb_strlen ($str);
	if ($len <= 0) {
		$error = '入力して下さい';
		return false;
	}
	if (preg_match ("/[^\d０-９]+/", $str)){
		$error = '数字を入力して下さい';
		return false;
	}
	if ($len != 7) {
		if($len != 0) {
			$error = '無効な郵便番号です';
			return false;
		}
	}
	return true;
}

?>