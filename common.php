<!DOCTYPE html>
<html lang="ja">

<!--
WordPress Original Theme "NapoanWorld"
Responsive & Material Design
Designed by napoan.
-->

<?php
error_reporting(E_ALL & ~E_NOTICE);
?>

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />


<!-- レスポンシブ -->
<meta name="viewport" content="width=device-width, initial-scale=1">


<meta name="mobile-web-app-capable" content="yes">

<meta name="format-detection" content="telephone=no,address=no,email=no">

<!-- アイコン　-->
<link rel="icon" sizes="192x192" href="<?php bloginfo('template_directory'); ?>/img/icon.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="ナポアンのマイクラ">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/img/icon.png">
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/img/icon.png">
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/icon.png">
<link rel="icon" sizes="192x192" href="<?php bloginfo('template_directory'); ?>/img/icon.png">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/img/icon.png">
<meta name="msapplication-TileColor" content="#2687E8">

<meta name="author" content="ナポアン">

<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>?20170528">
<?php if(get_post_meta($post->ID,'tw-emoji',true)): ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/twemoji-awesome.css">
<?php endif; ?>


<title>
<?php if(is_home()): ?>
<?php bloginfo('name'); ?><?php if(get_query_var('paged')): ?><?php echo ' - ページ'.get_query_var('paged'); ?><?php endif; ?>

<?php elseif(is_page()): ?>
<?php wp_title(''); ?> ｜ <?php bloginfo('name'); ?>

<?php elseif(is_single()): ?>
<?php wp_title(''); ?> ｜ <?php bloginfo('name'); ?>

<?php elseif(is_category()): ?>
<?php single_cat_title() ?> ｜ <?php bloginfo('name'); ?>

<?php elseif(is_tag()): ?>
<?php single_tag_title() ?> ｜ <?php bloginfo('name'); ?>

<?php elseif(is_tax()): ?>
    <?php 
        $taxonomy = $wp_query->get_queried_object();
        $tax_name = $taxonomy->name;
        echo $tax_name;
    ?> | <?php bloginfo('name'); ?>

<?php elseif(is_month()): ?>
<?php the_time("Y年m月") ?>の記事一覧 ｜ <?php bloginfo('name'); ?>

<?php elseif(is_year()): ?>
<?php the_time("Y年") ?>の記事一覧 ｜ <?php bloginfo('name'); ?>

<?php elseif(is_search()): ?>
<?php echo get_search_query(); ?> を含む記事 ｜ <?php bloginfo('name'); ?>

<?php elseif(is_404()): ?>
404 Not found - お探しのページは見つかりませんでした | <?php bloginfo('name'); ?>

<?php else: ?>
<?php bloginfo('name'); ?>

<?php endif; ?>
</title>

<?php wp_deregister_script( 'jquery' ); ?>
<?php wp_head(); ?>
<?php get_template_part('script'); ?>

<!-- Norton認証 -->
<meta name="norton-safeweb-site-verification" content="0v-isxogs8yv8kgmd0kquoqrujlsrhk332spvwwj53gvu95l9a4focispljtihhnl-jznwgdbrpr3ds0ix1jdir62bjmxyycm57mayfcg1lgrdd9etcmojfn0thf5619" />

</head>

<?php
	$catSlug='';
	if(is_single()) {
		$catCache = get_the_category();
		$catSlug .= $category[0]->slug;
	}
?>
<body <?php body_class($catSlug); ?>>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WPT2KT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WPT2KT');</script>
<!-- End Google Tag Manager -->

<svg style="display:none;" version="1.1" xmlns="//www.w3.org/2000/svg">
<defs>
  <symbol id="logo-svg-sprite">
    <path d="M4.3 34c-1.3 0-2.3-.4-3-1.5-1-.7-1.3-1.8-1.3-3.3V27c0-1.3.4-2.4 1.3-3.3 1-1 1.8-1.3 3-1.3h22c.3 0 .5-.3.5-.7v-11c0-2 .5-3.6 1.3-5 1-1.3 2-2 3-2h4.4c1.2 0 2.2.7 3 2 .8 1.4 1.2 3 1.2 5v11c0 .4.3.7.7.7h18.4c1.2 0 2.2.4 3 1.4.8 1 1.2 2.2 1.2 3.3v2.3c0 1.5-.6 2.6-1.5 3.4-.8 1-1.8 1.5-3 1.5h-18c-.5 0-.7.2-.7.8-.2 20.7-9 33.5-26 38.7-1 .3-2.2.2-3.3-.4-1-.7-1.7-1.7-2-3l-1-2.5c-.3-1-.2-2.2.4-3.3.4-1 1.2-2 2.3-2.5 5.6-2 9.8-5.2 12.5-9.5 2.6-4.5 4-10 4-17.4 0-.2 0-.6-.5-.6zM124 16.5c1 1 2 1.5 3.3 1.5 1.3 0 2.5-.6 3.5-1.7.8-1 1.3-2.2 1.3-3.8 0-1.6-.4-3-1.4-4-1-1-2-1.5-3.4-1.5s-2.5.5-3.5 1.5-1.5 2.3-1.5 4c0 1.2.5 2.6 1.4 3.6zm-4.7-12.7c2.2-2.6 5-4 8-4s5.8 1.2 8 4c2.2 2 3.3 5 3.3 8.5 0 2.4-.6 4.7-1.8 6.6-1.3 2.2-3 3.8-4.8 4.8-.3.2-.5.5-.5 1v.5c0 1.2-.3 2.3-1 3-.8.8-1.7 1-2.7 1h-19.2c-.4 0-.7.4-.7 1v35.8c0 1.5-.4 2.8-.7 4-.4 1.2-.8 2-1.4 2.8-.6.5-1.4 1-2.6 1.4-1 .5-2.4.7-3.6.8h-5.4c-1.8 0-3.7 0-5.8-.2-1.2 0-2.2-.7-3-1.8-.7-1-1-2.2-1-3.3v-2.2c.2-1.5.6-2.5 1.5-3.3 1-.8 2-1 3-1l3.7.2c1.2 0 2-.3 2.2-.7.2-.3.3-1.3.3-3V30c0-.6-.2-.8-.6-.8H74.5c-1.2 0-2.2-.3-3-1.3-1-1-1.3-2.2-1.3-3.3v-1.8c0-1 .5-2.4 1.3-3.3 1-1 2-1.4 3-1.4H95c.4 0 .6-.4.6-.8v-7c0-1.4.4-2.5 1.3-3.4.6-1 1.6-1.5 3-1.5h4c1 0 2 .5 3 1.5.6 1 1 2 1 3.3v7c0 .7.3 1 .7 1h7.7c.2 0 .3 0 .4-.3v-.3c-.6-1.8-1-3.3-1-5 0-3.4 1.2-6.5 3.4-8.7zm-48 59.7c-1-.4-1.8-1.3-2.2-2.4-.4-1-.3-2.5 0-3.7 2.4-5.2 4.8-11.5 7.5-19 .5-1 1.2-2.2 2.3-2.7 1-.6 2-.7 3.3-.3l2.7 1c1 .2 1.8 1 2.3 2 .5 1.4.5 2.7 0 4-1.8 5-4.3 11.8-7.6 20-.5 1.2-1.3 2-2.4 2.5-1 .5-2.2.5-3.4-.2zm56.4 1.4c-1 .5-2.2.5-3.3 0-1-.5-1.8-1.4-2.2-2.5l-7.5-20c-.4-1-.4-2.3 0-3.6.4-1 1.2-2.2 2.3-2.5l2.7-1c1-.4 2.2-.4 3.3 0 1 .6 1.8 1.4 2.4 2.7 2.4 6 5 12.6 7.5 19.8.2 1 .2 2.2-.3 3.5-.5 1-1.3 2-2.4 2.4zm21-43c-1 0-2-.4-3-1.4-.8-.8-1.2-2-1.2-3v-2.6c0-1 .4-2.2 1.3-3.3.7-1 1.7-1.3 3-1.3h51.5c1.2 0 2.2.4 3 1.3 1 1 1.3 2.2 1.3 3.3V22c-1.3 4-3.2 8-5.8 12.2-2.7 4-5.7 7.7-9 11-1 1-2 1.2-3.2 1.2-1.2 0-2.2-.7-3-1.7L181 42c-.7-1-1-2.3-1-3.4.3-1.3.7-2.4 1.6-3.3 4-4 7-8 9.3-12.6v-.4s0-.3-.3-.3zm17.8 6.5h3.6c1.3 0 2.3.6 3 1.5 1 1 1.3 2 1.3 3.3-.2 7.3-1 13.4-2 17.8-1.2 4.8-3 8.8-5.3 11.8-2.3 3.4-5.5 6-9.6 8.7-1 .7-2.2 1-3.4.6-1.2-.4-2-1.2-2.8-2.3l-1.7-2.6c-.6-1-.7-2.2-.4-3.5.4-1 1-2.2 2-2.7 4-2.8 7-6 8.6-10 1.5-4 2.4-9.7 2.6-17.7.2-1 .6-2 1.5-3.2.8-.8 2-1 3-1zm101.8-9c1.2.4 2 1 2.6 2.4.5 1 .7 2.2.4 3.7-3.4 13.8-9.4 24.8-17.6 32.3-8.4 7.7-19.7 12.3-34 14.3-1.2 0-2.2-.2-3.2-1-1-.7-1.5-1.8-1.6-3.2l-.5-3.3c0-1 .2-2.4 1-3.3.6-1 1.6-1.7 2.7-2C230 57.6 239 54 245.5 48S257 33 260 21.5c.4-1 1-2.2 2-2.8 1-.6 2.2-.8 3.3-.4zM216 21.8c-1-.7-1.6-1.5-2-3-.2-1 0-2.3.6-3.4l1.6-2.7c.6-1 1.5-1.8 2.7-2.2 1-.3 2 0 3 .6 4.7 3 9.6 6.4 14.7 10 1 1 1.5 2 1.7 3.4.2 1 0 2.2-.7 3.3l-1.6 2.7c-.6 1-1.5 1.8-2.7 2-1.2.3-2.2 0-3.2-.6-4.2-3.3-9-6.7-14-10z" font-size="90" font-family="Rounded Mgen+ 2pp heavy"/>
    <path d="M303.6 32.8c-4 1-7 3-9.3 6-2.2 3-3.4 6.7-3.4 11 0 2.4.2 4.6 1 6.5 1 1.6 1.7 2.5 2.6 2.5 1 0 2-.8 3-2.3 1-1.4 2-4.2 3.2-8 1-4 2-9 3-15.2V33h-.4zm-9 36.5c-3.4 0-6.4-2-9-5.6-2.7-3.6-4-8-4-13.2 0-8.3 2.5-15 7.6-20.2 5-5 12-7.7 20.5-7.7 7 0 13 2.2 17.4 6.8 4.7 4.5 7 10.3 7 17.4 0 6-1.5 11.3-4.3 15.5-2.8 4.4-6.8 7.4-12 9.3-1 .3-2 .2-2.7-.3-1-.4-1.6-1-2-2.3l-.5-1.8c-.3-1-.2-2 .2-3 .4-.8 1-1.5 2-2 6.3-3 9.4-8 9.4-15.4 0-3.6-.6-6.6-2.4-9-1.8-2.5-4.2-4.3-7-5-.4 0-.6 0-.7.3-3.5 24.2-10 36-19.5 36z" font-size="72"/>
    <path d="M348 22.4c-1 0-2-.5-3-1.5s-1.3-2-1.3-3.4v-2.2c0-1.3.4-2.4 1.3-3.3.8-1 2-1.4 3-1.4h52.5c1 0 2.2.5 3 1.5 1 1 1.3 2 1.3 3.4v6.3c0 .6 0 1-.3 1.3-5 11.5-14 21.6-27 30-.3.3-.4.7 0 1l5.5 9.5c.6 1 .8 2.2.5 3.3-.2 1.4-1 2.2-2 3l-2.3 1.8c-1 .7-2 1-3.2.7-1.2-.5-2-1.2-2.7-2.3-5.3-9-11-17.7-16.6-25.7-.7-1-1-2.2-1-3.3.2-1.4.8-2.3 1.8-3l2.2-2.2c1-.7 2-1 3.3-.8 1.2 0 2.2.6 3 1.7l2 3 1.8 2.5c.2.3.5.3.8.2 9.5-6.6 16-13 19.8-20v.2l-.4-.2zm62 26l-1-3c0-1 0-2.3.7-3.5.7-1.2 1.6-2 2.8-2.3 17.6-5.2 32.8-16 45.6-29.8 1-1 2-1.5 3.3-1.6 1.2 0 2.2.5 3 1.5l2.4 2.5c.8 1 1.2 2.2 1.3 3.3 0 1.6-.5 2.7-1.4 3.6-5.2 5.5-11 10.5-17.8 15-.4.2-.6.6-.5 1v33.3c0 1.5-.4 2.6-1.2 3.3-.7 1-1.7 1.6-3 1.6h-4c-1 0-2-.5-3-1.5-.6-1-1-2-1-3.2V42.5s0-.2-.3-.2h-.4c-7 3.3-13.7 8.2-20.3 10-1.3.2-2.4 0-3.3-.7-1-.8-1.6-1.8-2-3zm68.7-3.2l-1.6-1.8c-.7-.8-1.2-2-1.2-3 0-1.4.3-2.7 1-3.7 6.2-8 10.2-16.5 12.2-26.3.2-1 .8-2.2 1.8-3 1-1 2-1.2 3.3-1.2h3c1.4.2 2.4.8 3 1.7 1 1 1 2 1 3.2 0 .8-.4 1.8-.6 3.3 0 .5 0 .7.4.7H526c1.3 0 2.3.5 3.2 1.4.8 1 1.2 2.2 1.2 3.3v6.6c-1.6 14.4-6 25-12.8 32.4-7 7.2-17.6 12-32 14.7-1.3.2-2.4 0-3.4-1-1-.7-1.5-1.8-1.8-3.2L480 67c-.4-1 0-2.2.5-3.3.7-1 1.6-1.6 2.7-1.8 11-2 19.3-5.7 24.7-11 5.3-5.5 8.6-13.3 10-23.8 0-.5 0-.7-.7-.7H497c-.3 0-.6.2-.8.5-2.5 6-6.3 11.7-11.3 17.7-1 1-2 1.4-3 1.4-1.5 0-2.5-.2-3.4-1zm67-3.8c-1.3 0-2.3-.4-3-1.4-1-1.2-1.4-2.3-1.4-3.4v-2c0-1.3.4-2.5 1.3-3.3.8-1 1.8-1.5 3-1.5h50c1.3 0 2.3.4 3.2 1.4.8 1 1.2 2 1.2 3.3v2c0 3.6-.4 6.6-1.2 9.2-2.7 8.2-7 14.4-13.3 19-6 4.5-14.5 7.6-25.2 9.3-1.2.2-2.3 0-3.3-1-1-.7-1.6-2-1.8-3l-.3-2.3c-.4-1.3 0-2.4.5-3.3.6-1 1.5-1.8 2.7-2 8.5-1.5 15-4 19.7-7.3 4.6-3.2 8-7.6 9.6-13.2 0-.4 0-.6-.4-.6zM552 9h38c1.2 0 2.2.4 3 1.4 1 1 1.3 2 1.3 3.3v2c0 1.2-.4 2.4-1.3 3.2-.7 1-1.7 1.4-3 1.4h-38c-1.2 0-2.3-.5-3-1.5-1-1-1.3-2-1.3-3.4v-2c0-1.2.4-2.3 1.2-3.2.7-1 1.7-1.5 3-1.5z" font-size="90" font-family="Rounded Mgen+ 2pp heavy"/>
  </symbol>
</defs>
</svg>