<?php

function webbird_permissions_gravity_forms() {
    $role = get_role('editor');
    $role->add_cap('gform_full_access');
    $role = get_role('shop_manager');
    $role->add_cap('gform_full_access');
}
add_action('admin_init','webbird_permissions_gravity_forms');

?>