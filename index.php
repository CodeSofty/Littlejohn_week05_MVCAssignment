<?php
require('model/database.php');
require('model/item_db.php');
require('model/category_db.php');

$itemNum = filter_input(INPUT_POST, "ItemNum", FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

$categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
if(!$categoryID) {
    $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT); 
}

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

    if(!$action) {
        $action = 'list_items';
    }
}

switch($action) {

    case "list_items":
            $categoryName = get_category_name($categoryID);
            $categories = get_categories();
            $items = get_items_by_category($categoryID);
            include('view/item_list.php');
            break;


    case "list_categories":
        $categories = get_categories();
        include('view/category_list.php');
        break;

    case "add_category":
        add_category($categoryName);
        header("Location: .?action=list_categories");
        break;

    case "add_item":
        if($description && $categoryID && $title) {
            add_item($categoryID, $description, $title);
        } else {
            $error = "Invalid item data. Check all fields.";
            include('view/error.php');
            exit();
        }
        header("Location: .?action=list_items");
        break;

    case "delete_category":
        if($categoryID) {
            try {
                delete_category($categoryID);
            } catch (PDOexception $e) {
                $error = "You cannot delete a category if items exist in that category.";
                include('view/error.php');
                exit();
            }
            header('Location: .?action=list_items');
        }
        break;

        

        case "delete_item":
            if($itemNum) {
                delete_item($itemNum);
                header("Location: .?categoryID=$categoryID");
            } else {
                $error = "Missing or incorrect ItemNum.";
                include('view/error.php');
            }
            break;

    default:
        $categoryName = get_category_name($categoryID);
        $categories = get_categories();
        $items = get_items_by_category($categoryID);
        include('view/item_list.php');
}


?>