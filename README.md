# WP User Frontend Pro Unread Message Count Function

##### Pro version OR private message module is required.

Plugin: [wp-user-frontend-pro](https://wedevs.com/wp-user-frontend-pro/)

Add function to your theme functions.php than you can call.

```php
function get_unread_message_count(){

    global $wpdb;

    $sql = "SELECT count(*) as count FROM " . $wpdb->prefix . "wpuf_message WHERE ";
    $sql .= !empty( $args['s'] ) ? "`message` LIKE '%" . $args['s'] . "%' AND " : '';
    $sql .= "`to` = %d and `status` = 0 ORDER BY `created` DESC";
    $sql = $wpdb->prepare( $sql, get_current_user_id());
    $results = $wpdb->get_var( $sql );

    return (intval($results));
}
```
#### Usage example

```php
<?php

$messsageCount = get_unread_message_count();
if ($messsageCount) { ?>

<span class="badge badge-light">(<?= $messsageCount ?>)</span>

<?php } ?>
```