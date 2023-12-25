<?php
//connect db via config.php
@include 'config.php';

//check for submit 
if(isset($_POST["submit"]))
{

    //get data & add it into variables
    $email = $_POST["hiddenuseremail"];
    $title = $_POST["eventti"];
    $desc  = $_POST["eventdis"];
    $tag = $_POST["tag"];
    $date = $_POST["datepicker"];


    $uploadDirectory = 'uploads/'; //add a path for file save
    $fname = $_FILES["formFile"]["name"];
    $ftmpname = $_FILES["formFile"]["tmp_name"];
    $fpath = $uploadDirectory . basename($fname); //crete variable to save file with its name & path

    if(move_uploaded_file($ftmpname, $fpath)){ //move files in to the path we chose before

    //sql command to add data into database
    $sql = "INSERT INTO `eventdetails` (email,title,dis,cat,dates,files) VALUES('$email','$title','$desc','$tag','$date','$fpath')";

    //excuet sql command
    $result = mysqli_query($conn,$sql);
    //run a javascript to show alert box & redirect into dashboard.html
    echo "<script>
    alert('Event Successfully Created');
    window.location.href = 'dashboard.html';
    
    </script>";

   
}}




?>