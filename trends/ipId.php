<?php 
 
  $ipadress = $_SERVER['REMOTE_ADDR'];
  $timestamp = "";
  $secret = ""; 

  //sha1を使ってハッシュ化
  $id_hash = hash_hmac("sha256", $timestamp.$ipadress, $secret);

  //base64の形式に変換
  $id_base64 = base64_encode($id_hash);

  //先頭の8文字だけ抜き取る
  $ip_id =  substr($id_base64, 0, 10);
  ?>