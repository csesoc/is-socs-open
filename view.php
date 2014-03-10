<?php
    // $filename = 'post.log';
    // if (file_exists($filename)) {
    //     $last = "Last activity at " . date ("F d Y H:i:s.", filemtime($filename)+39600);
    //     $timesince = time() - filemtime($filename) < 300;
    //     $timesincestring = date ("H:i:s",time() - filemtime($filename)) . " since last active.";
    //     $open = $timesince ? "Open" : "Closed";
    //     if ($timesince) {
    //         $css = "splash-open";
    //     } else {
    //         $css = "splash-closed";
    //     }
    // }

    //date_default_timezone_set('Australia/Sydney');
    $devspace = $_GET['devspace'];
    $from = time()-60;

    if($devspace) {
        $url = 'https://api.ninja.is/rest/v0/device/3113BB009518_0_0_11/subdevice/RqJgj/data?user_access_token=8c3bb722bcc8b57feb7e574623652f4ed2b053c8&interval=1min&from=' . $from;
    } else {
        $url = "https://api.ninja.is/rest/v0/device/3113BB009518_0_0_11/subdevice/Q97MR/data?user_access_token=8c3bb722bcc8b57feb7e574623652f4ed2b053c8&interval=1min&from=" . $from;
    }
    //echo $url;
    $json = file_get_contents($url);
    $json_data = json_decode($json, true);
    //var_dump($json_data);
    $lastdata = end($json_data["data"]);

    $num = $lastdata["v"];
    $interval = time()-strtotime($lastdata["t"]);
    $open = ($interval < 80) ? "Open" : "Closed";
    $css = ($interval < 80) ? "splash-open" : "splash-closed";

    $timesincestring = date ("H:i:s",time()-strtotime($lastdata["t"])) . " since last active.";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example that shows off a responsive product landing page.">
<?php
    if($devspace) {
        echo '<title>Is Devspace Open?</title>';
    } else {
        echo '<title>Is Socs Office Open?</title>';
    }
?>

    






<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">



  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/main-grid.css">
    <!--<![endif]-->
  

  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/marketing.css">
    <!--<![endif]-->
  



<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">


    

    

    

</head>
<body>
<?php
    if($devspace) {
        echo '<h1>Devspace is:</h1>';
    } else {
        echo '<h1>Socs Office is:</h1>';
    }
?>









<div class="splash-container <?php echo $css; ?>">
    <div class="splash">
        <h1 class="splash-head"><?php echo $open; ?></h1>
        <p class="splash-subhead">
<?php echo $timesincestring; ?>
        </p>
       <!--  <p>
            <a href="http://purecss.io" class="pure-button pure-button-primary">Get Started</a>
        </p> -->
    </div>
</div>

<!-- <div class="content-wrapper">
    <div class="content">
        <h2 class="content-head is-center">Excepteur sint occaecat cupidatat.</h2>

        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-med-1 pure-u-lrg-1">

                <h3 class="content-subhead">
                    <i class="fa fa-rocket"></i>
                    Get Started Quickly
                </h3>
                <p>
                    <?php 

                        

                    ?>
                    
                </p>
            </div>
            
        </div>
    </div> -->

   <!-- <div class="ribbon l-box-lrg pure-g">
        <div class="l-box-lrg is-center pure-u-1 pure-u-med-1-2 pure-u-lrg-2-5">
            <img class="pure-img-responsive" alt="File Icons" width="300" src="img/common/file-icons.png">
        </div>
        <div class="pure-u-1 pure-u-med-1-2 pure-u-lrg-3-5">

            <h2 class="content-head content-head-ribbon">Laboris nisi ut aliquip.</h2>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor.
            </p>
        </div>
    </div>

    <div class="content">
        <h2 class="content-head is-center">Dolore magna aliqua. Uis aute irure.</h2>

        <div class="pure-g">
            <div class="l-box-lrg pure-u-1 pure-u-med-2-5">
                <form class="pure-form pure-form-stacked">
                    <fieldset>

                        <label for="email">Your Name</label>
                        <input id="email" type="text" placeholder="Your Name">


                        <label for="email">Your Email</label>
                        <input id="email" type="email" placeholder="Your Email">

                        <label for="password">Your Password</label>
                        <input id="password" type="password" placeholder="Your Password">

                        <button type="submit" class="pure-button">Sign Up</button>
                    </fieldset>
                </form>
            </div>

            <div class="l-box-lrg pure-u-1 pure-u-med-3-5">
                <h4>Contact Us</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>

                <h4>More Information</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>

    </div> 

    <div class="footer l-box is-center">
        View the source of this layout to learn more. Made with love by the YUI Team.
    </div>-->

</div>

<script src="http://yui.yahooapis.com/3.14.1/build/yui/yui.js"></script>
<script>
YUI().use('node-base', 'node-event-delegate', function (Y) {
    // This just makes sure that the href="#" attached to the <a> elements
    // don't scroll you back up the page.
    Y.one('body').delegate('click', function (e) {
        e.preventDefault();
    }, 'a[href="#"]');
});
</script>





</body>
</html>
