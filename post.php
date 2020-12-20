<article class="list-item" id="<?php the_ID(); ?>"  
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
</header>


<!-- /記事ヘッダー、記事タイトル -->

<a class="post-item-link" href="<?php echo get_permalink(); ?>">
    <?php if ( has_post_thumbnail() ): // サムネイルを持っているとき ?>
            <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
        <?php else: // サムネイルを持っていないとき ?>
            <img alt="NO IMAGE" title="NO IMAGE" width="300px" height="169px"/>
    <?php endif; ?>
    <p><?php the_excerpt(); ?></p>
    <span class="more">続きを読む</span>
</a>

</article>
<!-- /記事全体 -->

<?php if (is_second() && !is_home()) :?>

<?php global $disableAd;
    if($disableAd == false): ?>
<div id="first-article-under-ad" class="sense">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     
     data-ad-slot="7983336310"
     data-ad-format="rectangle"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php endif; ?>

<?php else: ?>
<?php endif; ?>