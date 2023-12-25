<?php
//connect database using config.php
@include 'config.php';

//check for any post request 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //add data of form into variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    //sql command for select user from email
    $check = "SELECT * FROM `userdetails` WHERE email = '$email'";


    //excute that sql query
    $result = mysqli_query($conn, $check);

    //check if sql query return something 
    if (mysqli_num_rows($result) > 0) {
        //js code for alert user if it return something & redirect him into signin.html
        echo "<script>alert('Email Already Exists');
         window.location.href = 'signin.html';
        </script>";
       

    }else{

        //if it dosent return anything 

        //sql code for adding data to database
        $add = "INSERT INTO `userdetails` (email, password) VALUES ('$email', '$password')";

      // excute that sql query 
        if (mysqli_query($conn, $add)) {

            //todo:check what this code snippet do because i have no idea
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];

        /*javascript code for save a file called user_logged_in & user email in localstorage & after that it will redireect page 
        into dashboard.html*/
            echo "<script>
                localStorage.setItem('user_logged_in', 'true');
                localStorage.setItem('email', '$email');
                window.location.href = 'dashboard.html';
            </script>";
           
            exit();
        }
    
    
}}

?>
