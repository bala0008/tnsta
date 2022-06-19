<?php
    include_once("connection.php");
    $query = "SELECT id, label, link, parent FROM menus ORDER BY  sort ASC, label";
    $result = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));
    // Create an array to conatin a list of items and parents
    $menus = array(
        'items' => array(),
        'parents' => array()
    );
    // Builds the array lists with data from the SQL result
    while ($items = mysqli_fetch_assoc($result)) {
        // Create current menus item id into array
        $menus['items'][$items['id']] = $items;
        // Creates list of all items with children
        $menus['parents'][$items['parent']][] = $items['id'];
    
        //echo  $items;
    }



// function to create dynamic treeview menus
function createMenu($parent, $menu)
{
    
    $html = "";
    if (isset($menu['parents'][$parent])) {
        // $html .= '<ul class="sina-menu sina-menu-right" data-in="fadeInLeft" data-out="fadeInOut">';
        foreach ($menu['parents'][$parent] as $itemId) {
            if (!isset($menu['parents'][$itemId])) {
                $html .= "<li > 
                         <a  href='" . $menu['items'][$itemId]['link'] . "'>" . $menu['items'][$itemId]['label'] . "</a> 
                     </li>";
            }
            if (isset($menu['parents'][$itemId])) {
                $html .= "<li class='dropdown'> 
                  <a class='dropdown-toggle' data-toggle='dropdown' href='" . $menu['items'][$itemId]['link'] . "'>" . $menu['items'][$itemId]['label'] .  "</a>";
                $html .= '<ul class="dropdown-menu">';
                $html .= createMenu($itemId, $menu);
                $html .= '</ul>';

                $html .= "</li>";
            }
        }
        // $html .= "</ul>";
    }
    return $html;
}
