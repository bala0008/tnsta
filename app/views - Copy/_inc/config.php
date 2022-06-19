
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
$query = 'SELECT menu_id,tn_menu_name, en_menu_name, parent_id, level_id, is_redirect_popup, menu_link,  menu_page,
menu_attachment, menu_type, status
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
        // $html .= '<ul class="sina-menu sina-menu-right" data-in="fadeInLeft" data-out="fadeInOut">';
        foreach ($menu['parents'][$parent] as $itemId) {
            if (!isset($menu['parents'][$itemId])) {
                if ($menu['items'][$itemId]['menu_type'] == '1') {
                    $menu_full_url = base64_encode($menu['items'][$itemId]['menu_page']);

                    $html .= "<li > 
                    <a class='nav-link' href='Indexes/page/$menu_full_url'> " . $menu['items'][$itemId][$menu_name_lang] . " </a>
                         </li>";
                }
                else if ($menu['items'][$itemId]['menu_type'] == '2') {
                    if($menu['items'][$itemId]['is_redirect_popup'] == '0')
                    {
                    $menu_full_url = $menu['items'][$itemId]['menu_link'];
                    $html .= "<li > 
                    <a class='nav-link' href='" . $menu_full_url . "'> " . $menu['items'][$itemId][$menu_name_lang] . " </a>
                         </li>";
                    }
                    else{
                        $menu_full_url = $menu['items'][$itemId]['menu_link'];
                        $html .= "<li > 
                        <a class='nav-link' target='_blank' onclick='preventProp(event)' href='" . $menu_full_url . "'> " . $menu['items'][$itemId][$menu_name_lang] . " </a>
                             </li>";
                    }
                } else if ($menu['items'][$itemId]['menu_type'] == '3') {
                    $menu_full_url = 'upload/' .$menu['items'][$itemId]['menu_attachment'] ;

                    $html .= "<li > 
                    <a target='_blank' class='nav-link' href='" . $menu_full_url . "'> " . $menu['items'][$itemId][$menu_name_lang] . " </a>
                         </li>";
                } else {
                    $menu_full_url = $menu['items'][$itemId]['menu_link'];
                    $html .= "<li > 
                    <a class='nav-link' href='" . $menu_full_url . "'> " . $menu['items'][$itemId][$menu_name_lang] . " </a>
                         </li>";
                }
         
            }
            if (isset($menu['parents'][$itemId])) {
                $html .= "<li class='dropdown'> 
                  <a class='dropdown-toggle' data-toggle='dropdown' href='" . $menu['items'][$itemId]['menu_link'] . "'>" . $menu['items'][$itemId][$menu_name_lang] .  "</a>";
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