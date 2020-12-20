<script>
(function(){
    var n = document.createElement('link');
    n.async = true;
    n.defer = true;
    n.type = 'text/css';
    n.rel  = 'stylesheet';
    n.href = '/wp-content/plugins/contact-form-7/includes/css/styles.css';
    var s = document.getElementsByTagName('script');
    var c = s[s.length - 1];
    c.parentNode.insertBefore(n, c);
})(document);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(function(){
    // 空のp/spanタグは消す
    $(".article-inner span:empty").remove();
    $(".article-inner p:empty").remove();

    $('ul.post-editions').each(function(){
        $(this).html(
            $(this).children().sort(function(a, b) {
                return parseInt($(a).attr('data-sort'), 10) - parseInt($(b).attr('data-sort'), 10);
            })
        );
    });

    /* ページ内ジャンプをクリックした際の滑らかスクロール */
    $('a[href^=#]').click(function(){
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        var scrollTargetId = target.attr("id");
        setTimeout(function(){
            location.hash = scrollTargetId;
            return false;
        },500);
    });

    var scTop = $(window).scrollTop();
    var menuShowing = false;
    var startPos;

    // リサイズ時だけ行う
    $(window).resize(function(){
        var winHeight = $(window).height();
        var winWidth = $(window).width();
    });

    if($("#header-menu-zone").length){
        var isHmz = true;
        var $headermenu = $("#header-menu-zone");
        var menuHeight = $headermenu.height();
        var $catTagButton = $(".menu-expand-button, #search-expand-button");
        $catTagButton.click(function() {
            $(this).toggleClass('pressed');
        });
        if($("#menu-button").length){
            var $menuButton = $("#menu-button");
        }
    }
    if($("#drawer").length){
        var isDrawer = true;
        var $drawer = $("#drawer");
        var drawerBottom = $drawer.offset().top + $drawer.outerHeight();
    }
    if($("#sidebar").length){
        var isSidebar = true;
        var $sidebar = $("#sidebar");
    }
    if($("#right-share-box").length){
        var isSharebox = true;
        var $shareBox = $("#right-share-box");
    }

    if($("#menu-button").length && $("#drawer").length){
        $menuButton.click(function() {
            $drawer.toggleClass('active');
            $menuButton.toggleClass('close');
            $("body").toggleClass('menuExpanded');
            if (!menuShowing) {
                // 開く時に行う処理
                menuShowing = true;
                $headermenu.removeClass('opacity');
            } else {
                // 閉じる時に行う処理
                menuShowing = false;
            }
            return false;
        });

        // メニューの範囲外をタップでメニュー閉じる
        $(document).click(function(){
            if (menuShowing) {
                $drawer.removeClass('active');
                $menuButton.removeClass('close');
                $("body").removeClass('menuExpanded');
                menuShowing = false;
                return false;
            }
        });
        $('#drawer').click(function() {
            // ドロワー内をクリックした際の不具合修正
            event.stopPropagation();
        });
    }

    //リサイズでもスクロールでも行う
    $(window).on('resize scroll', function(){
        var winHeight = $(window).height();
        var winWidth = $(window).width();
        var scTop = $(window).scrollTop();
        var currentPos = scTop;
        if(isHmz){
            if(scTop >= menuHeight) {
                if(!menuShowing) {
                    if (currentPos > startPos) {
                        // 下へスクロールした時の処理
                        $headermenu.css("top", "-" + menuHeight + "px");
                        if(isSharebox && winWidth < 901){
                            $shareBox.css("opacity", "0");
                        }
                    } else {
                        // 上へスクロールした時の処理
                        $headermenu.css("top", 0 + "px");
                        if(isSharebox){
                            $shareBox.css("opacity", "1");
                        }
                    }
                    startPos = currentPos;
                } else {
                    // ドロワーメニュー表示中は動かさない
                    }
            } else {
                $headermenu.css("top", 0 + "px");
            }
        }

        // PC表示
        if(winWidth > 1100){
            var scrollBottomPosition = scTop + $(window).height();

            if(isDrawer && isSidebar){
                var sidebarBottom = $sidebar.offset().top + $sidebar.outerHeight();
                $drawer.removeClass('active');
                $drawer.css({"height": "auto"});
                var drawerFixPosition = sidebarBottom + $drawer.outerHeight();
                // drawerBottomはロード時に定義済み
                if(scrollBottomPosition >= drawerFixPosition) {
                    $drawer.addClass('fixed');
                } else {
                    $drawer.removeClass('fixed');
                }
            }
            var footerTopPosition = $("#footer").offset().top;
            // スクロールの下端がフッターを越えたら
            if(scrollBottomPosition >= footerTopPosition) {
                var bottomMove = scrollBottomPosition - footerTopPosition;
                if(isDrawer){
                    $drawer.css('bottom' , bottomMove + "px");
                }
                if(isSharebox){
                    $shareBox.css('bottom' , 25 + bottomMove + "px");
                }
            } else {
                if(isDrawer){
                    $drawer.css('bottom', '0px');
                }
                if(isSharebox){
                    $shareBox.css('bottom', '25px');
                }
            }
            // メインカラムよりサイドバーが長い場合はclass付与
            if($("#main").length && $("#side").length){
                var mainHeight = $('#main').outerHeight();
                var sideHeight = $('#side').outerHeight();
                var mainSideDiffe = sideHeight - mainHeight;
                if (mainSideDiffe >= 1 && isDrawer) {
                    $drawer.addClass('longerThanMain');
                }
            }
        } else {
            // スマホ・タブレット表示
            var scrollBottomPosition = scTop + $(window).height();
            if(isDrawer){
                $drawer.removeClass('longerThanMain');
                $drawer.removeClass('fixed');
                $drawer.css({"height": winHeight - menuHeight - 40});
            }
            if(isSharebox){
                var footerTopPosition = $("#footer").offset().top;
                $shareBox.css('bottom', '0px');
                if(scrollBottomPosition >= footerTopPosition) {
                    var bottomMove = scrollBottomPosition - footerTopPosition;
                    $shareBox.css('bottom' , bottomMove + "px");
                } else {
                    $shareBox.css('bottom', '0');
                }
            }
        }
    });
});

/* ツイート数取得 */
function get_social_count_twitter(url, counterId) {
    $.ajax({
        url:'//jsoon.digitiminimi.com/twitter/count.json',
        dataType:'jsonp',
        data:{
            url:url
        },
        success:function(res){
            $('.' + counterId + ' .count').text( res.count || 0 );
        },
        error:function(){
            $('.' + counterId + ' .count').text('?');
        }
    });
}
</script>