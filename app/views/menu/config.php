
<?php

$host = "localhost";
$user = "postgres";
$pass = "nic123";
$db = "msd_tnsta";

$con = pg_connect("host=$host  dbname=$db user=$user password=$pass")
    or die("Could not connect to server\n");

$query = "SELECT * FROM mst_menu";

$result = pg_query($con, $query) or die("Cannot execute query: $query\n");
$menus = array(
    'items' => array(),
    'parents' => array()
);
while ($row = pg_fetch_row($result)) {
    $menus['items'][$items['menu_id']] = $items;
    // Creates list of all items with children
    $menus['parents'][$items['parent_id']][] = $items['menu_id'];
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
                         <a  href='" . $menu['items'][$itemId]['menu_link'] . "'>" . $menu['items'][$itemId]['en_menu_name'] . "</a> 
                     </li>";
            }
            if (isset($menu['parents'][$itemId])) {
                $html .= "<li class='dropdown'> 
                  <a class='dropdown-toggle' data-toggle='dropdown' href='" . $menu['items'][$itemId]['menu_link'] . "'>" . $menu['items'][$itemId]['en_menu_name'] .  "</a>";
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

pg_close($con);

?>