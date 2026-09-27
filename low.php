<?php
if(isset($_GET['Submit'])) {
    $id = $_GET['id'];
    $getid = "SELECT first_name, last_name FROM users WHERE user_id = '$id';";
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $getid);
    $num = @mysqli_num_rows($result);
    if($num > 0) {
        $html .= '<pre>User ID exists in the database.</pre>';
    } else {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        $html .= '<pre>User ID is MISSING from the database.</pre>';
    }
    ((is_null($mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $mysqli_res);
}
?>
