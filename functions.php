<?php

$ip_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$ua = $_SERVER['HTTP_USER_AGENT'];

if((strpos($ip_host, 'ipngn') !== false && strpos($ip_host, 'okayama') !== false && strpos($ip_host, 'ocn') !== false) || strpos($ua,'SO-01J') !== false){
    $disableAd = true;
}

require_once locate_template('functions/admin.php'); // 管理画面に関する設定
require_once locate_template('functions/control.php'); // 全体的な機能の有効化や無効化に関する設定
require_once locate_template('functions/taxonomy.php'); // カスタムタクソノミー
require_once locate_template('functions/editor.php'); // 編集画面・記事内容関連
require_once locate_template('functions/widget.php'); // ウィジェット関連
require_once locate_template('functions/etcs.php'); // 便利な関数たち
?>