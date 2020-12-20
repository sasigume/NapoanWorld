<?php
/*
Template Name: Search Page
*/
?>

<?php get_template_part(common); ?>

<div id="wrapper">
<?php get_header(); ?>
<?php get_template_part(hero); ?>
<div id="container">

<div id="column">
    <main id="main" role="main" data-title="検索結果">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php get_template_part('post'); ?>
    <?php endwhile; endif; ?>
    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
    </main>
    <div id="side">
        <?php get_sidebar(); ?>
        <?php get_template_part('drawer'); ?>
    </div>
</div><!-- /#column -->
<?php get_template_part('floatshare'); ?>
</div><!-- /#container -->

<?php get_footer(); ?>