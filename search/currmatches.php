<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matches</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    h1 {
    margin-bottom: 100px; /* Adjust the value as needed */
    font-size: 36px;
    line-height: 42px;
    margin: 50px 0 0 50px; /* Adjust as needed */
    text-align: center; /* Center the heading horizontally */
    }
    .profile-icon {
            position: absolute;
            top: 10px; 
            left: 15px; 
        }
        .profile-icon img {
            width: 35px; 
            height: 35px; 
            border-radius: 50%; 
        }
    html{scroll-behavior: smooth;} body{background:#f0e0d1; font-family: helvetica,"Segoe UI",Arial,sans-serif;color:#222;font-size:14px; line-height: 1.5; margin:0;} .container{width:980px;margin:0 auto;} .page{max-width: 1200px;margin: 0 auto;position: relative;} .cb-col-8 {width:8%;} .cb-col-10 {width:10%;} .cb-col-14 {width:14%;} .cb-col-16 {width:16%;} .cb-col-20 {width:20%;} .cb-col-25 {width:25%;} .cb-col-27 {width:27%;} .cb-col-30 {width:30%;} .cb-col-33 {width:33%;} .cb-col-40 {width:40%;} .cb-col-46 {width:46%;} .cb-col-47 {width:47%;} .cb-col-50 {width:50%;} .cb-col-60 {width:60%;} .cb-col-65 {width:65%;} .cb-col-66 {width:66%;} .cb-col-67 {width:67%;} .cb-col-73 {width:73%;} .cb-col-75 {width:75%;} .cb-col-70 {width:70%;} .cb-col-84 {width:84%;} .cb-col-80 {width:80%;} .cb-col-90{width:90%;} .cb-col-100 {width:100%;} .cb-col {display: inline-block;box-sizing: border-box;float: left; min-height: 1px;} h1 {font-size: 36px;line-height: 42px; margin:0;} h2 {font-size: 24px; margin:0; line-height: 30px;} h3 {font-size: 18px;line-height: 24px; margin:0; } h4 {font-size: 16px; margin:0; } h5 {font-size: 14px; margin: 0;} .cb-font-18 {font-size:18px;} img{border-radius: 4px;} a {text-decoration: none; color:#222;} a, a:hover, a:active, a:focus {outline: medium none;} .text-center {text-align: center;} .cb-nws-lft-col{padding:15px 20px;} .cb-nws-dtl-lft-col {padding: 10px 30px 0 30px;border-right: 1px solid #ecebeb ;} .cb-nws-lst-rt{padding-left: 10px;} .cb-srs-lst-itm {padding: 10px 0;} .cb-lst-itm-sm{padding:10px 0 5px;} .cb-scrd-lft-col{padding:15px 10px;} .cb-col-rt{padding: 10px;} .text-white{color: #fff;} .cb-text-apple-red{color: #E90B37;} .cb-color-light-sec{color: #464646;} .cb-scrd-hdr-rw, .cb-nav-pill-1.active {background: #028062 ;color: #fff;} .cb-nav{position:relative; height:48px;background: #009270;} .cb-hm-mnu-itm{padding: 16px 6px 11px; color:#fff; display:inline-block;} .cb-hm-text{padding:10px ;}
    </style>

</head>
<body>
<header>
        <nav>
            <div class="container1">
                <nav>
                    <ul class="nav navbar-nav">
                    <li class="profile-icon">
                        <a class="profile-link" href="http://localhost:8080/test/profile.jsp">
                            <img src="profile-icon.jpg" alt="Profile Icon">
                        </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/cricscore.php">HOME</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/currmatches.php">MATCHES</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/player_search.html">PLAYERS</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/ipl.php">IPL</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost:8080/test/glossary.html">GLOSSARY</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost:8080/test/about.html">ABOUT</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/admin.php">ADMIN PORTAL</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </header>
<h1 style="margin-bottom: 20px;"> MATCHES </h1>
<div class="container">
<?php
$api_key = '8ae3825f-bed3-43d8-a232-606b53d76b7e';
$url = 'https://api.cricapi.com/v1/currentMatches?apikey=' . $api_key . '&offset=0';

$json_result = file_get_contents($url);
$data = json_decode($json_result, true);

if ($data['status'] === 'success') {
    $matches = $data['data'];
    // Display matches
    if (!empty($matches)) {
        foreach ($matches as $match) {
            echo '<div class="cb-col cb-col-100 cb-plyr-tbody cb-rank-hdr cb-lv-main" style="margin-bottom: 20px;">';
            echo '<div class="itm" style="margin-bottom: 20px;">';
            echo '<div class="cb-col-100 cb-col cb-schdl cb-billing-plans-text">';
            echo '<div>';
            echo '<h3 class="cb-lv-scr-mtch-hdr inline-block">';
            echo '<a class="text-hvr-underline text-bold" href="' . $match['id'] . '" title="' . $match['name'] . '">' . $match['name'] . ',</a>';
            echo '</h3>';
            echo '<div class="text-gray">';
            echo '<span> - </span>';
            echo '<span>' . date("M d", strtotime($match['date'])) . '</span>';
            echo '<span>&nbsp;•&nbsp;</span>';
            echo '<span>' . date("h:i A", strtotime($match['dateTimeGMT'])) . '</span>';
            echo '<span class="text-gray"> at ' . $match['venue'] . '</span>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="cb-col-100 cb-col cb-schdl">';
            
            // Check if match has started
            if ($match['status'] === 'Match not started') {
                echo '<span class="cb-lv-scrs-well cb-lv-scrs-well-preview">' . $match['status'] . '</span>';
            } else {
                // Display score if match has started
                echo '<a class="cb-lv-scrs-well cb-lv-scrs-well-live" href="' . $match['id'] . '" title="' . $match['name'] . '">';
                echo '<span class="cb-text-live">' . $match['score'][0]['inning'] . ': ' . $match['score'][0]['r'] . '-' . $match['score'][0]['w'] . '</span>';
                echo '<span class="cb-ico cb-lv-scr-chvrn-sml"></span>';
                echo '</a>';
            }
            
            echo '</div>';
            echo '<nav class="cb-col-100 cb-col padt5">';
            echo '</nav>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'No current matches found.';
    }
} else {
    echo 'Failed to fetch data from the API.';
}
?>
</div>
</body>
</html>
