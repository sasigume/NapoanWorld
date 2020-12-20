<?php get_template_part(common); ?>

<div id="wrapper">
<?php get_header(); ?>
<div id="container">
    <div id="is404-black" style="background:url(<?php bloginfo('template_directory'); ?>/img/404background2.png);">
        <h1 id="error404-h1">404 Not found!<br><small>あなたは未知のページへのアクセスを試みた</small></h1>
        <div id="respawn-buttons">
            <a href="/">Respawn</a>
            <a href="/">Title screen</a>
        </div>
    </div>
    <div id="anshin">
        <img id="villager" alt="とにかく明るい村人" width="252" height="483" src="/wp-content/themes/NapoanWorld/img/とにかく明るい村人.png">
        <div id="anshin-right">
            <h1>安心して下さい。<br>ネットは繋がってますよ。</h1>
            <p>残念ながら、お探しのURLに該当するページは見つかりませんでした。</p>
            <p>URLが一部間違っている場合があります。スペルミスにご注意下さい。また、記事が諸事情で削除された可能性もあります。もしかすると<b>管理人のミスで、正しいリンクが繋がっていない可能性もあります。</b></p>
            <p>でも安心して下さい。履いてませんが書いてます。記事を。右上に検索欄がございますので、どうぞご利用下さい。また、以下にいくつかランダムに記事を表示しております。未知のURLにアクセスするほど強運なあなたなら、運命の記事に出会えるかもしれませんね。</p>
        </div>
    </div>
    <div id="is404-pickup">
        <?php
            $args = array(
                'post__not_in' => array($post -> ID),
                'posts_per_page'=> 3,
                'orderby' => 'rand',
                'date_query' => array(
                    array(
                        'after'     => 'September 5st, 2014',
                        'inclusive' => true,
                    ),
                ),
            );
            $query = new WP_Query($args);
        ?>
        <?php if( $query -> have_posts() ): ?>
            <h1>気まぐれピックアップ</h1>
            <div id="pickup-entries">
            <?php while ($query -> have_posts()) : $query -> the_post(); ?>
                <div class="related-entry">
                    <a class="related-entry-link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                        <?php if ( has_post_thumbnail() ): // サムネイルを持っているとき ?>
                            <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                        <?php else: // サムネイルを持っていないとき ?>
                            <img alt="NO IMAGE" title="NO IMAGE" width="290px" height="163px"/>
                        <?php endif; ?>
                        <?php the_title();?>
                    </a>
                </div>
            <?php endwhile;?>
            </div>
        <?php else:?>
            <p>記事が見つかりませんでした。</p>
        <?php
            endif;
            wp_reset_postdata();
        ?>
    </div>
</div><!-- /#container -->

<?php get_footer(); ?>