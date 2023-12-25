<?php
//connect db via config.php
@include 'config.php';

//check the url of user contaid id parameter to identify the data we want to delete
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    //sql command for deleting a row 
    $sql1 = "DELETE FROM `eventdetails` WHERE id = $id";
    //excute sql command
    $query1 = mysqli_query($conn, $sql1);
    //redirect into home page
    header('Location: index.php');
}

?>