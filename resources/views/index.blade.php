<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


    <title>Platin Gaming - Syed Noman Ghani</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/app.css') }}">


  </head>
  <body>

    <div class="">
        <div class="row">
        
        <div class="col">

        <div class="nav-side-menu">
        <div class="brand">Platin Gaming - Syed Noman Ghani</div>
            <div class="menu-list">
    
                <ul id="menu-content" class="menu-content collapse out">
                    <?php
                        foreach ($categories as $category) {
                        $categoryName = $category['name'];
                    ?>
                    <li  data-toggle="collapse" data-target="#<?php echo strtolower($categoryName); ?>" class="collapsed active">
                    <a href="#"><?php echo $category['name']; ?> <span class="arrow"></span></a>
                    </li>

                    <?php 
                        if (sizeof($category['categories']) > 0) { 
                            ?>
                            <ul class="sub-menu collapse" id="<?php echo strtolower($categoryName); ?>">
                            <?php 
                            foreach ($category['categories'] as $subCat) {
                            ?>
                                <li><a href="?query=<?php echo $subCat['name']; ?>"><?php echo $subCat['name']; ?></a></li>
                            <?php 
                            }  // eof sub cat loop
                            ?>
                            </ul>
                            <?php   
                        }
                    } // end of $category loop ?>

                

                </ul>
        </div>
</div>

        </div>
        <div class="col-8">

            <?php if (sizeof($venues) > 0) { ?>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Venue</th>
                    <th scope="col">Location</th>
                    </tr>  </thead>
              
                <?php foreach ($venues as $venue) {
                        $address = isset($venue['venue']['location']['address'])? $venue['venue']['location']['address'] : "";
                    ?>
                    <tr>
                    <td><?php echo $venue['venue']['name']; ?></td>
                    <td><?php echo $address; ?></td>
                    </tr>

                <?php } ?>
            </table>
            <?php } else if  (isset($_GET['query'])) { 
                 echo '<br>No venue found for the selected category';

            } else {

                echo '<br>Select any catogory to begin';
            } ?>      
        </div>
    </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>