<?php
//connect database via config.php
@include 'config.php';
//request id from url 
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    //get data for that id via sql command
    $sql1 = "SELECT * FROM `eventdetails` WHERE id = $id";
   
    //excute sql query
    $query1 = mysqli_query($conn, $sql1);
}

?>

<!--code for html-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Event</title>
    <link rel="stylesheet" href="Global.css">
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <nav style="background-color: white;" class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <!--navbar-->
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php">Categories</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link" onclick="checklogin()"><ion-icon size="large" name="add-outline" style="color: white; background: #002147; font-size: 28px; border-radius: 50%; padding: 5px;" ></ion-icon></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

<br>
<br>
<!--fetch data for the query via loop & add it into bootstrap 5 card-->
<?php foreach ($query1 as $q) { ?> 
     <!--bootstrap5 card-->
    <h1 class="card-title"><?php echo $q['title']; ?></h1>
    <hr>
    <center>
    <div style="max-width: 500px;" class="card md-6">
        <div class="card-body">
            <?php $imageSource = $q['files']; ?>
            <img style="max-width: 100%; height: auto;" src="<?php echo $imageSource; ?>" class="card-img-top border border-dark img-fluid" alt="...">
            <br><br>
            <u><h6><?php echo $q['title']; ?></h6></u><br>
            <p><?php echo $q['dis']; ?></p><br>
            <b><p>This Event will be held on <?php echo substr($q['dates'], 0, 10); ?> at <?php echo substr($q['dates'], 11, 5); ?>.</p></b>

            <script>

                var userEmail = localStorage.getItem('email');
                if(userEmail){
                if (userEmail === '<?php echo $q['email']; ?>') {
                    document.write('<form method="post" action="delete.php?id=<?php echo $q['id']?>""> <input type="submit" class="btn btn-danger" value= "Delete Event "><form>');
                }}
            </script>

        </div>
    </div>
    <br>
    </center>
<?php } ?>

              </div><br>        
        
<!--model-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
          <a href="Signin.html"> <button type="button" class="btn btn-dark">Sign in</button></a>
          <a href="Signup.html"> <button type="button" class="btn btn-dark">Sign Up</button></a>
          </center>
        </div>
      </div>
    </div>
  </div>

  
<!--Bootstrap 5-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--Social Media Icons-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!--add main.js-->
<script type="text/javascript" src="./main.js"></script>

</body>
</html>