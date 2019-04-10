<?php
//Include Twitter config file && User class
session_start();//starting a session
require "config.php";/*library to config.php*/
require "twitteroauth/autoload.php"; /*Library must be in twitteroauth*/

use Abraham\TwitterOAuth\TwitterOAuth; /*this is a namespace*/

?>
    <!-- HTML5 Tags-->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">

        <!-- Page title-->
        <title>Top Bait</title>

        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Link to all script & API files requried-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script async src="https://platform.twitter.com/widgets.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCd05EWgr6VxmKZ2Xw8f0phvvSNRWNDMn8&callback=initMap"
                async defer></script>
        <script src="assets/scripts/script.js"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
              crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>


    </head>
<body>

<?php
//PHP code to run if statement if access_token is empty
if (!isset($_SESSION['access_token'])) {

    ?>

    <!--If user is not logged in it will show them this page which shows no topbait information
     but suggests user to log into twitter -->
    <nav class="navbar navbar-expand navbar-dark bg-dark" id="navBar">
        <a href="#" class="navbar-brand">Top Bait</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <!-- 1 Container  -->
    <div class="container-fluid bg-1 text-center">
        <h1 class="margin">Welcome</h1>
    </div>

    <!-- 2 Container  -->
    <div class="container-fluid bg-2 text-center">
        <h3>We just need to verify you first before proceeding to the great food festival!!</h3>
        <h4><br>Click the button below!</h4>
    </div>

    <!-- 3 Container  -->
    <div class="container-fluid bg-4 text-center">
        <a href="twitter_login.php" class="btn btn-outline-success"> Click Me</a>
    </div>


    <?php
} else {
//Else if the user is logged into twitter and authorised it will show the following?>

    <!-- nav bar with logout button  -->
    <nav class="navbar navbar-expand navbar-dark bg-dark" id="navBar">
        <a href="#" class="navbar-brand">Top Bait</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <a href="logout.php" class="nav-item active nav-link">Logout</a>
            </ul>
        </div>
    </nav>


    <!-- div to generate google map  -->
    <div id="map"></div>

    <!-- 1 Container -->
    <div class="container-fluid bg-2 text-center">
        <h3 class="margin">Distance Matrix</h3>
        <p>Discover the walking distance from any of these restaurants, just enter your current postcode below.
            <br>Then try click on any restaurant marker on the map.</p>

        <form action="#" method="post" class="form-inline my-2 mylg-0 justify-content-center">
            <input type="search" name="buscar" id="address" class="form-control mr-sm-2"
                   placeholder="E.g Newcastle"
                   aria-label="Buscar">
            <button class="btn btn-outline-success" type="button" id="submit" value="search ">Search</button>
        </form>

        <div class='row'>
            <!-- div containing all business info for restaurants  -->
            <div class='col-sm-6' id="business-info"></div>
            <!-- div which will show the distance matrix  -->
            <div class='col-sm-6' id="distance-info"></div>
        </div>
    </div>


    <!-- 2 Container -->
    <div class="container-fluid text-center bg-1">
        <h2 class="margin">Tweet Deck</h2>
        <div class="row" id="tweet-list"></div>
    </div>


    <div class="container-fluid centre text-center bg-4">
        <div class="row">

            <!-- div will contain the twitter box  -->
            <div class='col-sm-4'>
                <h3>Tweet Us</h3>
                <div id="tweetboxapp">
                    <?php
                    //uses access_token and new connection to TwitterOAuth to obtain user data
                    $access_token = $_SESSION['access_token'];
                    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET,
                        $access_token['oauth_token'], $access_token['oauth_token_secret']);
                    $user = $connection->get("account/verify_credentials");
                    ?>

                    <div class="card" style="margin-bottom: 20px; padding: 20px; background: #898989;">
                        <div class="centre"><img class="card-img-top img-responsive" style="width:30%;height:35%;"
                                                 src="<?php echo $user->profile_image_url; ?>" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">  <?php echo "@" . $user->screen_name; ?><p><?php $user->name; ?></p>
                            </h5>
                        </div>
                        <div class="alert alert-success card-body" id="error-msg" style="display: none;"></div>
                        <form class="form-horizontal" method="post" id="status-form">
                            <div class="form-group">
                                <div class="col"><textarea class="form-control" rows="3" name="status" id="status"
                                                           placeholder="#CM0677 Top Bait">#CM0677 Top Bait</textarea>
                                </div>
                                <br>
                                <div class="col">
                                    <button type="submit" class="btn btn-success" style="padding: 13.4px;">Tweet
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Code below places a quote to help the website look more homely -->
                <div class='col-sm-8'>
                    <div class="box">
                        <i class="fa fa-quote-left fa2" aria-hidden="true"></i>
                        <div class="text">
                            <i class="fa fa-quote-right fa1" aria-hidden="true"></i>
                            <div>
                                <h1>Top Bait</h1>
                                <p>"Every tweet helps us grow. So please keep spreading the love"</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </body>
    </html>
    <?php
}
?>