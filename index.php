<?php
error_reporting(E_ALL & ~E_NOTICE);
?>

<?php get_template_part('common'); ?>
<div id="wrapper">
<?php get_header(); ?>

<div id="container">

<div id="column">
    <main id="main" role="main" data-title="ナポアンのマイクラ">
    <?php $counter = "";
        if(have_posts()): while(have_posts()): the_post(); $counter++; ?>
        <?php if ($counter <= 1): ?>
            <?php get_template_part('post','first'); ?>
        <?php else:?>
            <?php get_template_part('post'); ?>
        <?php endif;?>
        <?php if ($counter == 4) { include (TEMPLATEPATH . '/archivead.php'); } ?>
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