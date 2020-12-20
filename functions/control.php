<?php

// サムネイル機能を有効化
add_theme_support( 'post-thumbnails', array( 'post' ) );

// プロフィールでHTMLタグを使えるように
remove_filter('pre_user_description', 'wp_filter_kses');

// Webサイト全体の画像をResponsive images機能の対象から外す
add_filter( 'wp_calculate_image_srcset', '__return_false' );

// 絵文字を無効化
function disable_emoji() {
     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' );    
     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );    
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );

// RSSにアイキャッチ画像を含める
function post_thumbnail_in_feeds($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
        $content = '<div>' . get_the_post_thumbnail($post->ID) . '</div>' . $content;
    }
    return $content;
}
add_filter('the_excerpt_rss', 'post_thumbnail_in_feeds');
add_filter('the_content_feed', 'post_thumbnail_in_feeds');

// Yoast SEOのheadのog:imageを消す
add_filter('wpseo_pre_analysis_post_content', 'mysite_opengraph_content');
    function mysite_opengraph_content($val) {
    return preg_replace("/<img[^>]+>/i", "", $val);
}

//schema.orgのJSON-LD
add_action('wp_head','insert_json_ld');
function insert_json_ld (){
    if (is_single() || is_page()) {
        if (have_posts()) : while (have_posts()) : the_post();
              $context = 'http://schema.org';
              $type = 'Article';
              $name = get_the_title();
              $logo = 'https://napoan.com/wp-content/themes/NapoanWorld/img/logo-blue.png';
              $authorType = 'Person';
              $authorName = get_the_author();
              $datePublished = get_the_date('Y-n-j');
              $dateModified = get_the_modified_date('Y-n-j');
              $thumbnail_id = get_post_thumbnail_id($post->ID);
              $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
              $imageurl = $image[0];
              $imagewidth = $image[1];
              $imageheight = $image[2];
              $category_info = get_the_category();
              $articleSection = $category_info[0]->name;
              $articleBody = get_the_content();
              $url = get_permalink();
              $publisherType = 'Organization';
              $publisherName = get_bloginfo('name');
              $headline = mb_substr($name, 0, 110);
 
              $json= "
              \"mainEntityOfPage\": \"{$url}\",
              \"@context\" : \"{$context}\",
              \"@type\" : \"{$type}\",
              \"name\" : \"{$name}\",
              \"author\" : {
                   \"@type\" : \"{$authorType}\",
                   \"name\" : \"{$authorName}\"
                   },
              \"datePublished\" : \"{$datePublished}\",
              \"dateModified\": \"{$dateModified}\",
              \"image\": { 
                  \"@type\": \"ImageObject\",
                  \"url\": \"{$imageurl}\",
                  \"width\": \"{$imagewidth}\",
                  \"height\": \"{$imageheight}\"
                  },
              \"articleSection\" : \"{$articleSection}\",
              \"url\" : \"{$url}\",
              \"publisher\" : {
                   \"@type\" : \"{$publisherType}\",
                   \"name\" : \"{$publisherName}\",
                   \"logo\": { 
                        \"@type\": \"ImageObject\",
                        \"url\": \"{$logo}\",
                        \"width\": 310,
                        \"height\": 39
                        }
                   },
              \"headline\": \"{$headline}\"
              ";
            echo '<script type="application/ld+json">{'.$json.'}</script>';
        endwhile; endif;
        rewind_posts();
    }
}
?>