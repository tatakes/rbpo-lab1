<?php
if(isset($_GET['Submit'])) {

    $id = $_GET['id'];
    
    $conn = mysqli_connect("localhost", "root", "", "dvwa");
    
    $getid = "SELECT first_name, last_name FROM users WHERE user_id = '" . $id . "';";
    
    $result = mysqli_query($conn, $getid);
    
    if($result && mysqli_num_rows($result) > 0) {
        echo '<pre>User ID exists in the database.</pre>';
    } else {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '<pre>User ID is MISSING from the database.</pre>';
    }
}
