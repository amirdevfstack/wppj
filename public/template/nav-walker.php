<?php
class Custom_Nav_Walker extends Walker_Nav_Menu
{
    // Start of the <ul>
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\"><ul>\n";
    }

    // End of the <ul>
    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }

    // Start of the <li>Copy code
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        // Check if the item is a dropdown
        if (in_array('menu-item-has-children', $classes)) {
            $class_names = ' class="nav-item dropdown"';
            $output .= $indent . '<li' . $class_names . '>';
            $output .= '<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">' . $item->title . '</a>';
        } else {
            $output .= $indent . '<li class="nav-item">';
            $output .= '<a class="nav-link" href="' . $item->url . '">' . $item->title . '</a>';
        }
    }

    // End of the <li>
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}
