<aside id="sidebar">
<?php global $disableAd;
      if($disableAd == false): ?>
<?php $randomAdNum = rand(0, 3); ?>
<!-- 0と1はAdsense、2/3がプロモ -->
<?php if( is_single()||is_page()): ?>
<!-- シングルページの場合 -->
<div id="sidebar-sense" class="sense">
<?php get_template_part('sidebarad', $randomAdNum); ?>
</div>
<div id="sidebar-sp-sense" class="sense">
<?php get_template_part('sidebarad', '2'); ?>
<?php get_template_part('sidebarad', '3'); ?>
</div>
<?php else: ?>
<!-- シングルページ以外の場合 -->
<div id="sidebar-sense" class="sense">
<?php get_template_part('sidebarad', $randomAdNum); ?>
</div>
<div id="sidebar-sp-sense" class="sense">
<?php get_template_part('sidebarad', '0'); ?>
</div>
<?php endif; ?>

<?php endif; ?>


<div id="sidebar-left" class="sidebar-row">
<?php dynamic_sidebar('sidebar-left'); ?>
</div>
<div id="sidebar-right" class="sidebar-row">
<?php dynamic_sidebar('sidebar-right'); ?>
</div>
</aside>