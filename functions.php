<?php
/*
 * Author: mervancanturk@me.com
 * Github: github.com/mervancanturk
 * */

function get_unread_message_count(){

    global $wpdb;

    $sql = "SELECT count(*) as count FROM " . $wpdb->prefix . "wpuf_message WHERE ";
    $sql .= !empty( $args['s'] ) ? "`message` LIKE '%" . $args['s'] . "%' AND " : '';
    $sql .= "`to` = %d and `status` = 0 ORDER BY `created` DESC";
    $sql = $wpdb->prepare( $sql, get_current_user_id());
    $results = $wpdb->get_var( $sql );

    return (intval($results));
}
