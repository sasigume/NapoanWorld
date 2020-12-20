<header id="header-menu-zone">
    <nav id="header-menu-inner">
        <?php if(! (is_404() || is_page('privacy-policy')) ): ?>
            <a id="menu-button">
                <span><!-- 三本線 --></span>
            </a>
        <?php endif; ?>
        <label id="menu-cat-button" class="menu-expand-button" for="menu-cat-check">
            <span class="icon-font icon-folder"></span>カテゴリー<span class="icon-font expandIcon"></span>
        </label>
        <input class="menu-check" id="menu-cat-check" type="checkbox" />
        <div class="menu-expand menu-expand-cat">
            <ul class="cattag catlist">
                <?php 
                $args = array(
                'orderby'            => 'term_order', // ←並び替えを適用
                'show_count'         => 0, // カウントは無し
                'hide_empty'         => 1,
                'hierarchical'       => 1, // 1で入れ子、0で同じ階層
                'use_desc_for_title' => 1, // カテゴリの説明をtitle属性に
                'title_li'           => __( '' ), // 外側のliタグを消す
                'show_option_none'   => __( 'カテゴリがありません' ),
                'echo'               => 1 // 全体のON/OFF
                );
                wp_list_categories( $args );
                ?>
            </ul>
        </div>
        <?php if(is_single()): ?>
            <?php if(has_tag()==true) : ?>
                <label class="menu-expand-button" id="menu-tags-button" for="menu-tags-check">
                    <span class="icon-font icon-tag2"></span>タグ<span class="icon-font expandIcon"></span>
                </label>
                <input class="menu-check" id="menu-tags-check" type="checkbox" />
                <div class="menu-expand menu-expand-tags">
                    <?php the_tags( '<ul class="cattag taglist"><li>', '</li><li>', '</li></ul>' ); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <a href="/" id="toplogo">
            <svg xmlns="//www.w3.org/2000/svg" width="600" height="75" viewBox="0 0 600 80">
                <title>ナポアンのマイクラ</title>
                <use xmlns:xlink="//www.w3.org/1999/xlink" xlink:href="#logo-svg-sprite"></use>
                <foreignObject display="none">
                    <img src="//napoan.com/wp-content/themes/NapoanWorld/img/newlogo.png" alt="ナポアンのマイクラ" width="300px" height="38px">
                </foreignObject>
            </svg>
        </a>
        <div id="menu-search">
            <label id="search-expand-button" for="menu-search-button">
                <span class="icon-font"></span>
            </label>
            <input id="menu-search-button" type="checkbox" />
            <form action="<?php bloginfo('home'); ?>" method="get">
                <dl class="search-box">
                    <dt><input type="text" name="s" value="" placeholder="記事を検索" required /></dt>
                    <dd id="editionselect">
                        <input type="radio" name="editions" value="pc" /><label>PC版</label>
                        <input type="radio" name="editions" value="pe" /><label>マイクラPE</label>
                        <br>
                        <input type="radio" name="editions" value="" /><label>指定なし</label>
                    </dd>
                    <dd id="sbutton"><button type="submit"><span class="icon-font icon-arrow-right"></span></button></dd>
                </dl>
            </form>
        </div>
</header>