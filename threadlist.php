

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
    .height {
        min-height: 450px;
    }
    </style>
</head>

<body>
    <!-- navbar-start -->
    <?php
    include 'partials/_navbar.php';
    include "partials/_dbconnect.php";
?>

    <?php
    $catid=$_GET['cat_id'];
    $sql="SELECT * FROM `categories` WHERE `cat_id`= '$catid'";
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $cat_name=$row["cat_name"];
            $cat_desc=$row["cat_discription"];
        }
       
    }
?>

<?php
    include "partials/_dbconnect.php";
    if($_SERVER["REQUEST_METHOD"]=='POST'){
        // echo "yes";
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $catid=$_GET['cat_id'];
        $sql="INSERT INTO `threads` (`thread_title`,`thread_desc`,`thread_cat_id`) values ('$title','$desc','$catid')";
        $result=mysqli_query($con,$sql);
        // if($result){
        //     exit;
        // }
        
    }
?>


    <div class="container col-md-8">
        <div class="jumbotron my-2">
            <h1 class="display-5">Welcome to <?php echo $cat_name; ?> forums</h1>
            <p class="lead"><?php echo $cat_desc; ?></p>
            <hr class="my-4">
            <!-- <p>This is peer to peer forum for sharing knowledge with each other. No Spam / Advertising / Self-promote in
                the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Do not cross post questions. ...
                Do not PM users asking for help. ...
                Remain respectful of other members at all times.</p> -->
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>

    </div>

    <div class="container col-md-8">
    <h3 class="py-2">Ask a question</h3>
        <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method='POST'>
            <div class="form-group">
                <label for="title">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                    placeholder="enter your question">
                <small id="emailHelp" class="form-text text-muted">please enter problem title as short as possible...</small>
            </div>
            <div class="form-group">
                <label for="desc">Describe your problem</label>
               <textarea id="desc" class="form-control" name="desc" placeholder="describe problem.."></textarea>
            </div>
           
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <div class="container col-md-8 height">
        <h3 class="py-2">Browse Questions</h3>

        <?php
        $id=$_GET['cat_id'];
        $sql="SELECT * FROM `threads` WHERE `thread_cat_id`= '$id'";
        $result=mysqli_query($con,$sql);
        $noresult=true;
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $noresult=false;
                $id=$row["thread_id"];
                $title=$row["thread_title"];
                $desc=$row["thread_desc"];
                echo '<div class="media my-3 py-3">
                <img class="mr-3" src="img/userdefault.png" width="55px" alt="Generic placeholder image" style="border-radius:50%">
                <div class="media-body">
                    <h5 class="mt-0"><a href="thread.php?threadid='.$id.'">'.$title.'</a></h5>
                '.$desc.'
        </div>
    </div>';
            }
        
        
        }
        // echo var_dump($noresult)
        if($noresult){
            // echo "be the first person to ask a question... ";

            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No result found</p>
              <p class="lead">be the first person to ask a question... </p>
            </div>
          </div>';
        }
    ?>


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