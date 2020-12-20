<article id="<?php the_ID(); ?>"  
<?php if (is_first()) :?>
class="first"
<?php else : ?>
<?php endif; ?>
>

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
  <?php $this_slag = $post->post_name;
  if($this_slag == 'pe-alpha-015'): ?>
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


<!-- /記事ヘッダー、記事タイトル -->

<!-- 記事本文 -->
<section class="article-inner">
<?php the_content('',FALSE,''); ?>

</section>
<!-- /記事本文 -->

<div class="moreread">
<script>
document.addEventListener('DOMContentLoaded', function() {
    get_social_count_twitter("<?php echo get_permalink(); ?>", "socialarea_twitter_<?php echo get_the_ID(); ?>");
});
</script>
<div class="moreread-left">
<a class="moreread-tw" target="_blank" href="" onclick="window.open('http://twitter.com/share?url=<?php echo get_permalink(); ?>&text=<?php the_title(); ?>&via=napoan', '', 'width=500,height=400,left=400, top=100'); return false;"><span class="icon-font icon-twitter"></span>ツイート</a>
<div class="tw-count-box socialarea_twitter_<?php the_ID(); ?>"><a href="http://twitter.com/search?q=<?php echo get_permalink(); ?>" target="_blank" title="この記事に対する 皆さんのツイート一覧へ"><span class="count"></span></a></div>
</div>

<?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
<a class="moreread-link" href="<?php echo get_permalink(); ?>">続きを読む</a>
<?php else : ?>
<?php endif; ?>
</div>

</article>
<!-- /記事全体 -->

<?php if (is_first()) :?>

<?php global $disableAd;
    if($disableAd == false): ?>
<div id="first-article-under-ad" class="sense">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9812573632041546"
     data-ad-slot="7983336310"
     data-ad-format="rectangle"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php endif; ?>

<?php else: ?>
<?php endif; ?>