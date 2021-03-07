<?php
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $username = 'root';

    try {
        $db = new PDO($dsn, $username);

    } catch (PDOException $e) {
        $error = 'Database Error: ';
        $error .= $e->getMessage();
        include(view/error.php);
        exit();
    }



// //Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);



?>



//HEROKU DATABASE CONNECTION
    
    $username = 'o5zwd89th0bp1tlx';
    $password = 'p16f6agy45od7l4l';


    try {
        $db = new PDO('mysql://o5zwd89th0bp1tlx:p16f6agy45od7l4l@pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/imes85fmrw4t7cfi;dbname=imes85fmrw4t7cfi', $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }
