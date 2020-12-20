<div id="footer">
  <div id="footer-inner">
    <ul class="icon-buttons" id="footer-buttons">
      <li><a href="https://twitter.com/napoan" target="_blank" data-hover="Twitter"><span class="icon-font icon-twitter"></span></a></li>
      <li><a href="https://www.youtube.com/channel/UCBVFh_pGrysolohOzXMGqIA" target="_blank" data-hover="YouTube"><span class="icon-font icon-youtube"></span></a></li>
      <li><a href="http://feedly.com/i/subscription/feed/https://napoan.com/feed/" target="_blank" data-hover="Feedly"><span class="icon-font icon-feedly"></span></a></li>
      <li><a href="/feed/" target="_blank" data-hover="RSS"><span class="icon-font icon-rss"></span></a></li>
    </ul>
    <a href="/" id="footer-logo">
      <svg xmlns="//www.w3.org/2000/svg" width="300" height="38" viewBox="0 0 600 80">
          <use xlink:href="#logo-svg-sprite"></use>
          <foreignObject display="none">
            <img src="<?php echo get_template_directory_uri(); ?>/img/newlogo.png" alt="ナポアンのマイクラ" width="300px" height="38px"/>
          </foreignObject>
      </svg>
    </a>
    <ul class="icon-buttons" id="footer-editions">
      <li><a href="/editions/pc/" data-hover="PC版"><span class="icon-font icon-desktop"></span></a></li>
      <li><a href="/editions/pe/" data-hover="マイクラPE"><span class="icon-font icon-mobile"></span></a></li>
      <li><a href="/editions/console/" data-hover="ゲーム機版"><span class="icon-font icon-game"></span></a></li>
      <li><a href="/editions/win10/" data-hover="Win10版"><span class="icon-font icon-windows"></span></a></li>
    </ul>
  </div>
</div>
<div id="grand-footer">
  <p><small>画像/文章を引用する際は該当ページへのリンクをお願いします。記事を利用したことによる如何なる損害も管理人は責任を負いません。<br />表示が崩れる場合は、Google ChromeやFirefoxなどのモダンブラウザで閲覧頂くことをおすすめします。<br />アンテナサイトに登録する際は元記事へのリンクをお願いします。</small>
  </p>
  <small class="copyright">Copyright 2013-2017 ナポアンのマイクラ.  <a href="/privacy-policy/">(プライバシーポリシー)</a></small>
</div>

</div><!-- /#wrapper -->

<?php wp_deregister_script( 'jquery' ); ?>
<?php wp_footer(); ?>
<?php get_template_part('script','footer'); ?>

<?php $string = $post->post_content;
// 記事中にpreタグがあったらhighlight.jsとCSSを読み込み
if(strpos($string,'<pre>') === false): ?>
<?php else: ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/styles/ir_black.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js"></script>
<script>
  $(function() {
    $('pre').each(function(i, block) {
      hljs.highlightBlock(block);
    });
  });
</script>
<?php endif; ?>

<?php $string = $post->post_content;
// 記事中にツールチップがあったらsimptipのCSSを読み込み
if(strpos($string,'simptip') === false): ?>
<?php else: ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/script/simptip.min.css" />
<?php endif; ?>

<?php global $disableAd;
      if($disableAd == true): ?>
      <style>.sense{display:none!important;}</style>
<?php endif; ?>

</body>
</html>