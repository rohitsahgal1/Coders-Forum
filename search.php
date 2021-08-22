<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
    #maincontainer {
        min-height: 100vh;
    }
    </style>
    <title>iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <div class="container my-3" id="maincontainer">
        <h1 class="py-2">Search results for <em> " <?php echo $_GET['search']?> " </em></h1>
        <?php
        $noresult=true;
        $query = $_GET['search'];
        $sql= "SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$query')";
        $result = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noresult=false;
             $id = $row['thread_id'];
             $title = $row['thread_title'];
             $desc = $row['thread_desc'];
             $url ="thread.php?threadid=$id";
            echo '<div class="result">

                <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
                <p>'.$desc.'</p>

                </div>';
              
          }
         if($noresult) {
             echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                 <p class="display-4"> No Results found</p>
                 <p class="lead">Suggestions:-
                 <ul>
                <li>Make sure that all words are spelled correctly.</li>
                <li>Try different keywords.</li>
                <li>Try more general keywords.</li>
                </ul></p>
                </div>
                </div>';
         }
        ?>
        
    </div>

    <?php include 'partials/_footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>