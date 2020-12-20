<?php get_template_part(common); ?>

<?php if(get_post_meta($post->ID,'hide_adsense',true) == 'true'): ?>
<!-- この記事では広告非表示 -->
<style>.sense{display:none!important}</style>
<?php endif; ?>

<div id="wrapper">
<?php get_header(); ?>
<div id="container">

<div id="column">

<div id="main">

<!-- 記事全体 -->

<article class="" id="<?php the_ID(); ?>">

<ul class="post-editions">
    <?php
    $terms = get_the_terms( $post->ID, 'editions' );
    if ($terms && ! is_wp_error($terms)): ?>
        <?php foreach($terms as $term): ?>
        <li class="<?php echo $term->slug; ?>">
            <a href="<?php echo get_term_link( $term->slug, 'editions'); ?>">
                <?php echo $term->name; ?>
            </a>
        </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

<small class="article-date">
    <time datetime="<?php echo get_the_date('Y年m月d日'); ?>" pubdate="pubdate"><?php echo get_the_date('Y年m月d日'); ?></time>
</small>

<!-- 記事ヘッダー、記事タイトル -->
<header class="article-header">
    <h1 class="article-title" itemprop="name"><a href="<?php echo get_permalink(); ?>" itemprop="url"><?php the_title(); ?></a></h1>
<div class="title-bottom">
    <ul class="post-categories">
        <?php categories_label() ?>
    </ul>
</div>
<?php
if ( get_the_tag_list() ) {
    echo get_the_tag_list( '<dl class="article-tags"><dd>', '</dd><dd>', '</dd></dl>' );
}
?>
</header>
<!-- 記事本文 -->
<section class="article-inner">
<?php $current_page_number = get_query_var('page'); ?>
<?php if($current_page_number >= 1): ?>
    <?php $pages_defaults = array(
            'before'           => '<div class="pages-buttons" id="top-pages-buttons">' . __( '' ),
            'after'            => '</div>',
            'link_before'      => '<span>',
            'link_after'       => '</span>',
            'next_or_number'   => 'number',
            'separator'        => ' ',
            'nextpagelink'     => __( '前のページ' ),
            'previouspagelink' => __( '次のページ' ),
            'pagelink'         => '%',
            'echo'             => 1
        );
        wp_link_pages( $pages_defaults );
    ?>

    <?php global $disableAd;
      if($disableAd == false): ?>
    <div id="pager-top-sense" class="sense inner-sense">
    <small>スポンサーリンク</small>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-9812573632041546"
        data-ad-slot="3183302710"
        data-ad-format="rectangle"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </div>
    <?php endif; ?>

<?php endif; ?>
  <?php if(strpos(get_the_content(),'id="more-')) :
global $more; $more = 0;
the_content(''); ?>

<?php global $disableAd;
      if($disableAd == false): ?>
<div id="continue-sense" class="sense inner-sense">
  <small>スポンサーリンク</small>
  <br />
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <ins class="adsbygoogle leadAd"
    style="display:block;"
    data-ad-client="ca-pub-9812573632041546"
    data-ad-slot="7431416716"
    data-ad-format="rectangle"></ins>
  <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div>
<?php endif; ?>

<?php $more = 1;
the_content('', true );
else : the_content();
endif; ?>

<?php global $disableAd;
      if($disableAd == false): ?>
<div id="article-bottom-sense" class="sense inner-sense">
  <small>スポンサーリンク</small>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <ins class="adsbygoogle"
      style="display:block"
      data-ad-client="ca-pub-9812573632041546"
      data-ad-slot="6873013516"
      data-ad-format="rectangle"></ins>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
</div>
<?php endif; ?>

<?php
$pages_defaults = array(
  'before'           => '<div class="pages-buttons" id="bottom-pages-buttons"><p>この記事はページ分割されています</p>' . __( '' ),
  'after'            => '</div>',
  'link_before'      => '<span>',
  'link_after'       => '</span>',
  'next_or_number'   => 'number',
  'separator'        => ' ',
  'nextpagelink'     => __( '前のページ' ),
  'previouspagelink' => __( '次のページ' ),
  'pagelink'         => '%',
  'echo'             => 1
);
wp_link_pages( $pages_defaults );
?>

</section>

<?php global $disableAd;
      if($disableAd == false): ?>
<div id="before-comment-sense" class="sense">
    <small>スポンサーリンク</small>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-9812573632041546"
        data-ad-slot="5807305512"
        data-ad-format="rectangle">
    </ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>
<?php endif; ?>

</article>
<!-- /記事全体 -->

</div><!-- /#main -->

<div id="side">
        <?php get_sidebar(); ?>
        <?php get_template_part('drawer'); ?>
</div>

</div><!-- /#column -->
<?php get_template_part('floatshare'); ?>
</div><!-- /#container -->

<?php get_footer(); ?>