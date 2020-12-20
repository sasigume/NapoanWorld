<?php
//編集画面のCSS
add_editor_style("editor-style.css");

// 自動整形を無効化
add_action('init', function() {
    remove_filter('the_title', 'wptexturize');
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_excerpt', 'wptexturize');
    remove_filter('the_title', 'wpautop');
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_editor_content', 'wp_richedit_pre');
});

// オートフォーマット関連の無効化 TinyMCE
add_filter('tiny_mce_before_init', function($init) {
    $init['wpautop'] = false;
    $init['apply_source_formatting'] = ture;
    return $init;
});

//画像はpタグで囲まない、無駄なpタグを改行に
function filter_contents($content){
return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
return preg_replace('/<p>&nbsp;<\/p>/iU', '<br>', $content);
}
add_filter('the_content', 'filter_contents');


// 画像URLをアドレスに合わせる
function delete_host_from_attachment_url( $url ) {
    $regex = '/^http(s)?:\/\/[^\/\s]+(.*)$/';
    if ( preg_match( $regex, $url, $m ) ) {
        $url = '//napoan.com' . $m[2];
    }
    return $url;
}
add_filter( 'wp_get_attachment_url', 'delete_host_from_attachment_url' );
?>