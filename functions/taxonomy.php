<?php
add_action( 'init', 'edition_taxonomy', 0 );

function edition_taxonomy() {
    $labels = array(
        'name'                       => _x( '対応エディション', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( '対応エディション', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( '対応エディション', 'text_domain' ),
        'all_items'                  => __( '全てのエディション', 'text_domain' ),
        'parent_item'                => __( '親のエディション', 'text_domain' ),
        'parent_item_colon'          => __( '親のエディション:', 'text_domain' ),
        'new_item_name'              => __( '新しいエディション', 'text_domain' ),
        'add_new_item'               => __( '新しいエディションを追加', 'text_domain' ),
        'edit_item'                  => __( '対応エディションを編集', 'text_domain' ),
        'update_item'                => __( '対応エディションを更新', 'text_domain' ),
        'view_item'                  => __( '対応エディションを見る', 'text_domain' ),
        'separate_items_with_commas' => __( 'カンマで区切って書きます', 'text_domain' ),
        'add_or_remove_items'        => __( 'エディションを追加・編集', 'text_domain' ),
        'choose_from_most_used'      => __( 'よく使われるエディションから選択', 'text_domain' ),
        'popular_items'              => __( '人気のエディション', 'text_domain' ),
        'search_items'               => __( 'エディションを検索', 'text_domain' ),
        'not_found'                  => __( 'エディションが見つかりません', 'text_domain' ),
        'no_terms'                   => __( 'エディションがありません', 'text_domain' ),
        'items_list'                 => __( '対応エディション一覧', 'text_domain' ),
        'items_list_navigation'      => __( '対応エディションナビゲーション', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'editions', array('post'), $args );
}


?>