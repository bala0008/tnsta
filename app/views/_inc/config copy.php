
<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = msd_tnsta";
$credentials = "user = postgres password=nic123";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db) {
    echo "Error : Unable to open database\n";
} else {
    //   echo "Opened database successfully\n";
}
$query = 'SELECT menu_id, tn_menu_name, en_menu_name, parent_id, level_id, menu_link, status, menu_key, menu_page, menu_attachment, menu_type
FROM mst_menu';
$result = pg_query($query) or die('Error message: ' . pg_last_error());
$menus = array(
    'items' => array(),
    'parents' => array()
);

while ($items = pg_fetch_assoc($result)) {
    $menus['items'][$items['menu_id']] = $items;
    // Creates list of all items with children
    $menus['parents'][$items['parent_id']][] = $items['menu_id'];
}
// function to create dynamic treeview menus
function createMenu($parent, $menu)
{
    $menu_name_lang =  $_SESSION['lang'] . "_menu_name";
    $html = "";
    if (isset($menu['parents'][$parent])) {
        // echo "<pre>";
        // print_r($menu['parents'][$parent]);






        // $html .= '<ul class="sina-menu sina-menu-right" data-in="fadeInLeft" data-out="fadeInOut">';
        foreach ($menu['parents'][$parent] as $itemId) {
            //  echo ;
            if (!isset($menu['parents'][$itemId])) {
                if((!isset($menu['items'][$itemId]['menu_link'])) || (!isset($menu['items'][$itemId]['menu_link']))=='')
                {
                $html .= "<li>";
                $html .= "<a class='nav-link' href='hi'> " . $menu['items'][$itemId][$menu_name_lang] . " </a>";
                $html .= "</li>";
                }
               
              else if(!isset($menu['items'][$itemId]['menu_page']))
                {
                    $html .= "<li>";
                    $html .= "<a class='nav-link' href='page'> " . $menu['items'][$itemId][$menu_name_lang] . " </a>";
                    $html .= "</li>";
                }
                else 
                {
                $html .= "<li>";
                $html .= "<a class='nav-link' href='" . $menu['items'][$itemId]['menu_page'] . "'> " . $menu['items'][$itemId][$menu_name_lang] . " </a>";
                $html .= "</li>";
                }
            }
            if (isset($menu['parents'][$itemId])) {
                $html .= "<li class='dropdown'>";
                $html .= " <a class='dropdown-toggle' data-toggle='dropdown' href='" . $menu['items'][$itemId]['menu_link'] . "'>" . $menu['items'][$itemId][$menu_name_lang] .  "</a>";
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
?>