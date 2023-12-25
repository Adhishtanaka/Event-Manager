<?php
//connect database with config.php
@include 'config.php';

//check for submit 
if(isset($_POST["submit"])){

    //add data from form into variables
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    //check for any records for matching username & password
   $sql = "SELECT * FROM `userdetails` WHERE email = '$email' AND password = '$password'";


   //execute that sql query
    $result = mysqli_query($conn, $sql);

    //check that query return anything
    if(mysqli_num_rows($result) > 0){
        /*javascript code for save a file called user_logged_in & user email in localstorage & after that it will redireect page 
        into dashboard.html*/
        echo "<script>
                localStorage.setItem('user_logged_in', 'true');
                localStorage.setItem('email', '$email');
                window.location.href = 'dashboard.html';
            </script>";
    }else{
        //if query return nothing then it will show alertbox to check Email & password & redirect page again in to signin.html
        echo "<script>
       alert('Check Email & password Again');
       window.location.href = 'signin.html';
        </script>";
    }

}

?>