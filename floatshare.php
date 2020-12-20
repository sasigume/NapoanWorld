<div id="right-share-box" <?php if(is_home()): ?>class="home"<?php endif; ?>>
  <?php
    $page_title=trim(wp_title( '', false));
    if (is_home()) {
        $page_url = home_url();
    }
    if (is_category()) {
        $current_cat = single_cat_title('',false);
        $current_cat_id = get_cat_ID($current_cat);
        $page_url = get_category_link($current_cat_id);
    }
    if (is_tax()) {
        $current_tax = $wp_query->get_queried_object();
        $page_url = get_term_link($current_tax, '');
    }
    if (is_tag()) {
        $current_tag = get_query_var('tag_id');
        $page_url = get_tag_link($current_tag);
    }
    if (is_single()) {
        $page_url = get_permalink();
    }
    if (is_page()) {
      $page_url = get_permalink();
    }
  ?>
  <?php if(!is_home()): ?>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    get_social_count_twitter("<?php echo $page_url; ?>", "socialarea_twitter_0");
  });
  </script>
  <span class="tw-count socialarea_twitter_0">
    <a href="//twitter.com/search?q=<?php echo $page_url; ?>" target="_blank" title="この<?php if(is_single()): ?>記事<?php else: ?>ページ<?php endif; ?>に対する 皆さんのツイート一覧へ">
      <span class="count"></span>
    </a>
  </span>
  <?php endif; ?>
  <ul>
    <li class="flattwitter"><a href="" target="_blank" onclick="window.open('//twitter.com/intent/tweet?text=<?php echo $page_title; ?>&amp;url=<?php echo $page_url ?>&amp;via=napoan', '', 'width=500,height=400,left=400,top=100'); ga('send', 'event', 'rightsharebox', 'click', 'ツイート'); return false;" title="ツイートしてね"><span class="flattext">ツイート</span><span class="flaticon-span icon-font icon-twitter"></span></a></li>
    <li class="flatgoogle"><a href="" onclick="window.open('https://plusone.google.com/_/+1/confirm?hl=ja&amp;url=<?php echo $page_url ?>&amp;title=<?php echo $page_title; ?>', '', 'width=500,height=400,left=400,top=100'); return false;" title="共有って楽しい。"><span class="flattext">Google+</span><span class="flaticon-span icon-font icon-google"></span></a></li>
    <li class="flathatebu"><a href="" onclick="window.open('//b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo $page_url ?>&amp;title=<?php echo $page_title; ?>', '', 'width=500,height=400,left=400,top=100'); return false;" title="覚えておこう!"><span class="flattext">はてブ</span><span class="flaticon-span icon-font icon-hatebu"></span></a></li>
  </ul>
  <div id="right-go-top">
    <a href="" onclick="$('body,html').animate({scrollTop: 0},600);return false;">一番上へ<span class="icon-font icon-arrow-up"></span></a>
  </div>
</div>