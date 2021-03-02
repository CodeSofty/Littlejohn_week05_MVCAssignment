<?php 

function get_categories(){
    global $db;
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchALL();
    $statement->closeCursor();
    return $categories;
}



function get_category_name($categoryID){

    if(!$categoryID) {
        return "All Categories";
    }
    global $db;
    $query = 'SELECT * FROM categories 
    WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $categoryName = $category['categoryName'];
    return $categoryName;
}

function delete_category($categoryID) {
    global $db;
    $query = 'DELETE FROM categories WHERE categoryID = :categoryID';
            $statement = $db->prepare($query);
            $statement->bindValue(':categoryID', $categoryID);
            $statement->execute();
            $statement->closeCursor();
}


function add_category($categoryName) {
    global $db;
    $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
            $statement = $db->prepare($query);
            $statement->bindValue(':categoryName', $categoryName);
            $statement->execute();
            $statement->closeCursor();
}

?>