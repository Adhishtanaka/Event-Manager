<?php
//connect database via config.php
@include 'config.php';

//get current date
$currentDate = date('Y-m-d');

//sql code for getting events by date in ascending order
$sql = "SELECT * FROM `eventdetails` WHERE `dates` >= '$currentDate' ORDER BY `dates` ASC";
//excute sql query
$query = mysqli_query($conn, $sql);

?>
<!--htmlcode-->
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
      <!--navbar-->
        <nav style="background-color: white;" class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
         
        <br><br>

<!-- Event Grid -->

<h3>Upcoming Events</h3><hr>
<br>

<div class="row">
<?php
$counter = 0;

//check that querie return something or not

if(mysqli_num_rows($query) <= 0){

  echo '<br><center><h5>There No event in this Category<h5></center><br>'
  ;}

//if it return something then fetch them into bootstrap5 cards
foreach ($query as $q) {
    if ($counter >= 18) { //this loop will stop when after fetching data for 18 cards
        break;
    }
    
?>
    <!--bootstrap5 card-->
    <div class="col-12 col-lg-4 d-flex justify-content-center mb-3">
        <br>
        <div class="card" style="width: 18rem; border: 1px solid black;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $q['title']; ?></h5>
                <p class="card-text"><?php echo substr($q['dates'], 0, 16); ?></p>
                <p class="card-text"><?php echo substr($q['dis'], 0, 100); ?>..</p>
                <a href="eventpost.php?id=<?php echo $q['id']?>" class="btn btn-dark">Read More..</a>
            </div>
        </div>
    </div>
<?php
    $counter++;
}
?>
</div>



</div>

<br><br>
<br><br>
 

<!-- Modal -->
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
<!--Main js File-->
<script type="text/javascript" src="./main.js"></script>

</body>
</html>