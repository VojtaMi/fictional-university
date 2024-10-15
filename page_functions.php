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
        // Adds the 'current_page_item' class if the child page is the current page.
        $class = ($child->ID == $page_ID) ? 'class="current_page_item"' : '';
        echo '<li ' . $class . '><a href="' . get_permalink($child->ID) . '">' . get_the_title($child->ID) . '</a></li>';
    }
}

function is_open_blog_page($link_page){
    $blog_page_id = get_option('page_for_posts');

     if ((is_home() || is_single() || is_archive()) && $link_page->ID == $blog_page_id) { // is_home() = function for blog_page home
        return true;
    }
    return false;
}

function is_current_page($link_page){
       if (is_page($link_page->ID)) {
        return true;
    }
    return false;
}

function is_child_page($link_page){
    $ancestors = get_post_ancestors(get_the_ID());
    if (in_array($link_page->ID, $ancestors)) {
        return true;
    }
    return false;
 }


function link_is_to_current_or_ancestor_page($link_page) {
   
    if (is_open_blog_page($link_page) || is_current_page($link_page) || is_child_page($link_page)){
        return 'current-menu-item';
    }

    return '';
}


function menu_link($url_ending, $link_title) {
    // Get the page by path
    $link_page = get_page_by_path($url_ending);

     // Initialize variables
     $current_menu_item = '';
     $full_url = '';

    if ($link_page){
        $current_menu_item = link_is_to_current_or_ancestor_page($link_page);
        $full_url = site_url($url_ending);
    }

    // Echo the list item with the appropriate class and link
    echo '<li class="' . esc_attr($current_menu_item) . '"><a href="' . esc_url($full_url) . '">' . esc_html($link_title) . '</a></li>';
}

