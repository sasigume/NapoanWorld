<?php
// ウィジェット有効化
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => '左側のウィジェット',
        'id' => 'sidebar-left',
        'before_widget' => '<div id="%1$s" class="sidebar-block">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => '右側のウィジェット',
        'id' => 'sidebar-right',
        'before_widget' => '<div id="%1$s" class="sidebar-block">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'ドロワーメニューのウィジェット',
        'id' => 'drawer-widget',
        'before_widget' => '<div id="%1$s" class="drawer-block">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}
?>