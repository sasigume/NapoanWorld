<?php

//カテゴリ情報から関連記事を10個ランダムに呼び出す
if (is_single()){
  $categories = get_the_category($post->ID);
  $category_ID = array();
  foreach($categories as $category):
    array_push( $category_ID, $category -> cat_ID);
  endforeach ;
  $args = array(
    'post__not_in' => array($post -> ID),
    'posts_per_page'=> 2,
    'category__in' => $category_ID,
    'orderby' => 'rand',
    'date_query' => array(
      array(
        'after'     => 'October 1st, 2014',
        'inclusive' => true,
      ),
    ),
  );
}
if (is_category()){
  $category = get_category($cat);
  $category_id   = $category->cat_ID;
  $args = array(
    'posts_per_page'=> 2,
    'category__in' => $category_id,
    'orderby' => 'rand',
    'date_query' => array(
      array(
        'after'     => 'October 1st, 2014',
        'inclusive' => true,
      ),
    ),
  );
}
if (is_tag()){
  $current_tag_id   = get_query_var('tag_id');
  $args = array(
    'posts_per_page'=> 2,
    'orderby' => 'rand',
    'date_query' => array(
      array(
        'after'     => 'October 1st, 2014',
        'inclusive' => true,
      ),
    ),
  );
}
if (is_tax()){
  $taxonomy = $wp_query->get_queried_object();
  $taxonomy_slug = $taxonomy->slug;
  $args = array(
    'posts_per_page'=> 2,
    'orderby' => 'rand',
    'date_query' => array(
      array(
        'after'     => 'October 1st, 2014',
        'inclusive' => true,
      ),
    ),
    'tax_query' => array(
      array(
        'taxonomy' => 'editions',
        'field' => 'slug',
        'terms' => $taxonomy_slug
      )
    )
  );
}
$query = new WP_Query($args); ?>
<?php if( $query -> have_posts() ): ?>
  <?php while ($query -> have_posts()) : $query -> the_post(); ?>
    <div class="related-entry">
      <a class="related-entry-link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" onclick="ga('send', 'event', 'relatedposts', 'click', '<?php the_title();?>');">
        <?php if ( has_post_thumbnail() ): // サムネイルを持っているとき ?>
          <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
        <?php else: // サムネイルを持っていないとき ?>
          <img alt="NO IMAGE" title="NO IMAGE" width="290px" height="163px"/>
        <?php endif; ?>
        <?php the_title();?>
      </a>
    </div>
  <?php endwhile;?>
  
<?php else:?>
  <p>関連記事が見つかりませんでした。</p>
<?php
    endif;
    wp_reset_postdata();
?>