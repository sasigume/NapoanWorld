<?php get_template_part(common); ?>

<div id="wrapper">
<?php get_header(); ?>
<?php get_template_part(hero); ?>
<div id="container">

<div id="column">
    <main id="main" role="main" data-title="ナポアンのマイクラ">
    <?php $counter = ""; ?>
    <?php if(have_posts()): while(have_posts()): the_post(); $counter++; ?>
        <?php get_template_part('post'); ?>
         <?php if ($counter == 4) { include (TEMPLATEPATH . '/archivead.php'); } ?>
    <?php endwhile; endif; ?>
    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
    </main>
    <div id="side">
        <?php get_sidebar(); ?>
        <?php get_template_part('drawer'); ?>
    </div>
</div><!-- /#column -->
<?php if(!is_month()):?>
<?php get_template_part('floatshare'); ?>
<?php endif; ?>
</div><!-- /#container -->

<?php get_footer(); ?>