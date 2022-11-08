<?php

/**
 * Remove default blocks
 */
function remove_default_blocks($allowed_blocks){
    // Get all registered blocks
    $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

    // Disable default Blocks you want to remove individually
    unset($registered_blocks['core/calendar']);
    unset($registered_blocks['core/legacy-widget']);
    unset($registered_blocks['core/rss']);
    unset($registered_blocks['core/search']);
    unset($registered_blocks['core/tag-cloud']);


    // Get keys from array
    $registered_blocks = array_keys($registered_blocks);

    // Merge allowed core blocks with plugins blocks
    return $registered_blocks;
}

add_filter('allowed_block_types', 'remove_default_blocks');
