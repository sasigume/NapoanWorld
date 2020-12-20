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

<?php $this_slag = $post->post_name;
if($this_slag !== 'pe-alpha-015'): ?>
<?php endif; ?>

<!-- 記事全体 -->

<article class="" id="<?php the_ID(); ?>">
<ul class="post-editions">
    <?php
    $terms = get_the_terms( $post->ID, 'editions' );
    if ($terms && ! is_wp_error($terms)): ?>
        <?php foreach($terms as $term): ?>
        <li class="<?php echo $term->slug; ?>" data-sort="<?php echo $term->term_id; ?>">
            <a href="<?php echo get_term_link( $term->slug, 'editions'); ?>">
                <?php echo $term->name; ?>
            </a>
        </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

<small class="article-date">
  <?php if($this_slag == 'pe-alpha-015'): ?>
  <!-- PEのアップデート記事なら最終更新日にする -->
    <time datetime="<?php echo get_the_modified_date('Y年m月d日 H:i'); ?>" pubdate="pubdate">最終更新: <?php echo get_the_modified_date('Y年m月d日 H:i'); ?></time> 
  <?php else: ?>
    <time datetime="<?php echo get_the_date('Y年m月d日'); ?>" pubdate="pubdate"><?php echo get_the_date('Y年m月d日'); ?></time>
  <?php endif; ?>
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
  <!-- 記事内リード文下レスポンシブ -->
  <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9812573632041546"
     data-ad-slot="7431416716"
     data-ad-format="auto"></ins>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
</div>
<?php endif; ?>

<?php
    if( date('U') - get_the_time('U') > 60*60*24*365 && in_category('36') ) { ?>
    <div class="old-message">
        お待ち! この記事は<b>最後の更新から1年以上経過している古い記事</b>だ。新しいバージョンに合わせて装置を作り直してスクショを取り直して解説を書き直す面倒臭さが君には分かるかい? 分からないなら読まないほうがいいぜ。
    </div>
<?php } ?>

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

<div id="sharearea">
<div id="share-inner">
<script>
document.addEventListener('DOMContentLoaded', function() {
    get_social_count_twitter("<?php echo get_permalink(); ?>", "socialarea_twitter_<?php echo get_the_ID(); ?>");
});
</script>
  <div id="bottom-tweet-button">
  <a href="" onclick="window.open('//twitter.com/share?url=<?php echo get_permalink(); ?>&text=<?php the_title(); ?>&via=napoan', '', 'width=500,height=400,left=400, top=100'); return false;"><span class="icon-font icon-twitter"></span><b>ツイート</b></a>
  <span class="tw-count socialarea_twitter_<?php the_ID(); ?>"><span class="count"></span></span>
  </div>
  <div id="share-right">
    <p>毎度毎度ツイート、コメント等ありがとうございます。Twitterではブログの更新状況など色々呟いてます。気軽にフォロー下さい。</p>
    <a href="https://twitter.com/napoan" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @napoan</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  </div>
</div>
</div>
<div id="bottom-recommend">
    <h2>気まぐれピックアップ</h2>
    <div id="bottom-rp">
    <?php get_template_part(relatedposts); ?>
    </div>
</div>

<div class="article-pager">
<ul>
<?php $prevpost = get_adjacent_post(false, '', true); if ($prevpost) : ?>
  <?php if( has_post_thumbnail($prevpost->ID)): ?>
    <?php
      $image_id = get_post_thumbnail_id($prevpost->ID);
      $image_url = wp_get_attachment_image_src($image_id, 'aside-nav-img');
    ?>
  <?php endif; ?>
<li class="prev">
  <a href="<?php echo get_permalink($prevpost->ID); ?>">
    <span class="pager-title"><?php echo esc_attr($prevpost->post_title); ?></span>
  </a>
  <div class="bg" style="background-image: url(<?php echo $image_url[0]; ?>)"></div>
</li>
<?php else: ?>
<li class="prev none">
前の記事はありません
</li>
<?php endif; ?>

<?php $nextpost = get_adjacent_post(false, '', false); if ($nextpost) : ?>
  <?php if( has_post_thumbnail($nextpost->ID)): ?>
    <?php
      $image_id = get_post_thumbnail_id($nextpost->ID);
      $image_url = wp_get_attachment_image_src($image_id, 'aside-nav-img');
    ?>
  <?php endif; ?>
<li class="next">
  <a href="<?php echo get_permalink($nextpost->ID); ?>">
    <?php echo esc_attr($nextpost->post_title); ?>
  </a>
  <div class="bg" style="background-image: url(<?php echo $image_url[0]; ?>)"></div>
</li>
<?php else: ?>
<li class="next none">
次の記事はまだありません
</li>
<?php endif; ?>

</ul>
</div>

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

<section id="comments">
<h1 class="article-option-title" id="commentform">コメント</h1>
<?php
    if( date('U') - get_the_time('U') > 60*60*24*365 && in_category('36') ) { ?>
    <div class="old-message">
        お待ち! この記事は<b>最後の更新から1年以上経過している古い記事</b>だ。新しいバージョンに合わせて装置を作り直してスクショを取り直して解説を書き直す面倒臭さが君には分かるかい?
    </div>
<?php } ?>
<?php comments_template(); ?>

</section>

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