<?php
    if(is_category()){
        $category = get_category($cat);
        $cat_id   = $category->cat_ID;
        $cat_name = $category->cat_name;
        $cat_slug = $category->slug;
    }
    if(is_tag()){
        $tag_name = single_tag_title("", false);
    }
    if(is_tax()){
        $taxonomy = $wp_query->get_queried_object();
        $tax_name = $taxonomy->name;
        $tax_slug = $taxonomy->slug;
    }
    if(is_search()){
        $search_word = get_search_query();
    }
    if(is_month()){
        $year = get_query_var('year');
        $month = get_query_var('monthnum');
        $month_title = $year . "年" . $month . "月";
    }
?>
<div id="hero" class="
    <?php
        if(is_single()){
            echo "singlehero";
        }
        if(is_category()){
            echo $cat_slug;
        }
        if(is_tag()){
            echo "tag " . $tag_name;
        }
        if(is_tax()){
            echo $tax_slug;
        }
        if(is_search()){
            echo "search";
        }
        if(is_month()){
            echo "month";
        }
    ?>">

    <div id="hero-inner">
    <?php if(is_category()||is_tax()||is_tag()||is_search()||is_month()): ?>
    <div id="hero-left">
        <h1>
            <?php
                if(is_category()){
                    echo $cat_name;
                }
                if(is_tag()){
                    echo $tag_name;
                }
                if(is_tax()){
                    echo $tax_name;

                    if(is_search()){
                        echo " / ";
                    }
                }
                if(is_search()){
                    echo "「" . $search_word . "」" . "を含む記事";
                }
                if(is_month()){
                    echo $month_title . "の記事";
                }
            ?>
        </h1>
        <div id="hero-border"></div>
        <?php
            if(is_category()){
                echo category_description();
            }
            if(is_tax()){
                echo term_description();
            }
            if(is_search()){
                echo "<p>" . $wp_query->found_posts . "件の記事が見つかりました。</p>";
            }
            if(is_tag()){
                echo "<p>「" . $tag_name . "」タグが付けられた記事は" . $wp_query->found_posts . "件あります。</p>";
            }
            if(is_month()){
                echo "<p>" . $month_title . "に投稿された記事は" . $wp_query->found_posts . "件あります</p>";
            }
        ?>
    </div>
    <?php endif; ?>

    <?php if(is_single()||is_category()||is_tax()): ?>
        <div id="hero-rp">
            <?php get_template_part(relatedposts); ?>
        </div>
    <?php endif; ?>
    </div>
    <?php if(is_single()): ?>
        <!-- 
        <div id="hero-sense">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-9812573632041546"
            data-ad-slot="7870428319"
            data-ad-format="rectangle"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div> -->
    <?php endif; ?>
</div>