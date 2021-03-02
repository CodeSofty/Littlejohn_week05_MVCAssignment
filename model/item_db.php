<?php
    function get_items_by_category($categoryID) {
        global $db;

        if($categoryID) {
            $query = 'SELECT todoitems.title, todoitems.description, categories.categoryName
            FROM todoitems LEFT JOIN categories
            ON todoitems.categoryID = categories.categoryID
            WHERE todoitems.categoryID = :categoryID 
            ORDER BY todoitems.title';
        } else {
            $query = 'SELECT todoitems.title, todoitems.description, categories.categoryName
            FROM todoitems LEFT JOIN categories
            ON todoitems.categoryID = categories.categoryID
            ORDER BY categories.categoryID';
        }
        $statement = $db->prepare($query);
        if($categoryID){
            $statement->bindValue(':categoryID', $categoryID);
        }
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }


    function get_items($itemNum) {
        global $db;
        $query = 'SELECT *
                FROM todoitems
                WHERE ItemNum = :ItemNum';
            $statement = $db->prepare($query);
            $statement->bindValue(':ItemNum', $itemNum);
            $statement->execute();
            $items = $statement->fetch();
            $statement->closeCursor();
            return $items;
    }

    function delete_item($itemNum) {
        global $db;
        $query = 'DELETE FROM todoitems
                WHERE ItemNum = :ItemNum';
            $statement = $db->prepare($query);
            $statement->bindValue(':ItemNum', $itemNum);
            $statement->execute();
            $statement->closeCursor();
    }


    function add_item($categoryID, $description, $title) {
        global $db;
        $query = 'INSERT INTO todoitems (title, description, categoryID)
        VALUES (:title, :description, :categoryID)';
            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':categoryID', $categoryID);
            $statement->execute();
            $statement->closeCursor();
    }


?>