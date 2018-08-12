<?php
/**
 * Created by PhpStorm.
 * User: nalin
 * Date: 7/10/2018
 * Time: 4:17 PM
 */

include('inc/header.php');

?>
<style>
    .oops{
        font-size: 88px;
        font-weight: bold;
    }
    .e404{
    font-weight:bold;
    }
    .back{
        width:30%;
        height:20%;
    }

</style>
<body>

<!--Include header from another file-->
<?php include('inc/navbar.php')?>

<section id="users" class="">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h1 class=" oops">Oops!</h1><br/>
                <h1 class=" e404">404 NOT FOUND</h1><br/>
                <h2>Sorry an error has occurred, Request page not found.</h2>

                <br/>
                <br/>
                <br/>
                <a href="login.php" class="btn btn-info btn-lg" >Back to Home</a>
            </div>

        </div>
    </div>
</section>
    <!--Footer section-->
<?php include('inc/footer.php')?>