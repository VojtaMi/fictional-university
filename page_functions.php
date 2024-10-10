<?php

// submenu page = has a parent, or has children
function is_submenu_page($page_ID)
{
    $has_parent = wp_get_post_parent_id($page_ID);
    $has_children = get_pages(array('child_of' => $page_ID));
    
    return ($has_parent || !empty($has_children));
}

// title of the parent or own title, if it has children
function submenu_title($page_ID) {
    $parent_ID = wp_get_post_parent_id($page_ID);
    if ($parent_ID) {
        return get_the_title($parent_ID);
    } else {
        return get_the_title($page_ID);
    }
}

// permalink of the parent or own title, if it has children
function submenu_permalink($page_ID) {
    $parent_ID = wp_get_post_parent_id($page_ID);
    if ($parent_ID) {
        return get_permalink($parent_ID);
    } else {
        return get_permalink($page_ID);
    }
}

// subsections of the parent or own title, if it has children
function list_submenu_sections($page_ID) {
    $parent_ID = wp_get_post_parent_id($page_ID);
    
    if ($parent_ID) {
        // If the page has a parent, get siblings (including current page)
        $children = get_pages(array('child_of' => $parent_ID, 'sort_column' => 'menu_order'));
    } else {
        // If the page is a parent, get its children
        $children = get_pages(array('child_of' => $page_ID, 'sort_column' => 'menu_order'));
    }
    
    foreach ($children as $child) {
        echo '<li><a href="' . get_permalink($child->ID) . '">' . get_the_title($child->ID) . '</a></li>';
    }
}
