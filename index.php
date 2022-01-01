<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>iDiscuss- coding forum</title>

    <style>
        .height{
            min-height:450px;
        }
    </style>
</head>

<body>
    <!-- navbar-start -->
    <?php
    include 'partials/_navbar.php';
    include "partials/_dbconnect.php";
?>

    <!-- slider-start -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/slider-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider-2.jpg"
                    alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider-4.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- slider-end -->


    <div class="container col-md-8 height">
        <h2 class='text-center my-4'>idiscuss- categories</h2>
        <div class="row">
            <!-- fetch all categories -->
            <?php
    $sql="SELECT * FROM `categories`";
    $result=mysqli_query($con,$sql);
    if($result){
      // <!-- using loop to iterate -->
      while($row=mysqli_fetch_assoc($result)){
        // echo $row['cat_id'];
        // echo "<br>";
        $cid=$row["cat_id"];
        $cat=$row["cat_name"];
        $cat_desc=$row["cat_discription"];
        echo ' <div class="col-md-4 my-2">
        <div class="card" style="width: 15rem;">
        <img class="card-img-top" src="img/card-'.$cid.'.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><a href="threadlist.php?cat_id='.$cid.'">'. $cat .'</a></h5>
          <p class="card-text">'. substr($cat_desc,0,80) .'....</p>
          <a href="threadlist.php?cat_id='.$cid.'" class="btn btn-primary">View Threads</a>
        </div>
        </div>
     </div>';
      }
    }
    ?>
           

        </div>

    </div>



    <?php
    include 'partials/_footer.php';
?>
    <!-- navbar-end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>