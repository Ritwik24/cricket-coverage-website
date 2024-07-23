<?php

$url = 'https://api.cricapi.com/v1/series_info?apikey=8ae3825f-bed3-43d8-a232-606b53d76b7e&id=76ae85e2-88e5-4e99-83e4-5f352108aebc';
$response = file_get_contents($url);

if ($response === false) {
    die('Failed to fetch data from the API');
}

$data = json_decode($response, true);

if (!isset($data['data'])) {
    die('No series data found');
}

$seriesInfo = $data['data']['info'];
$matchList = $data['data']['matchList'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPL</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #e1cbb8;
}
        .match-details {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .match-details img {
            max-width: 100px;
            max-height: 100px;
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
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px; /* Added padding to create space around the content */
            background-color: #fff; /* Added background color for the container */
            border-radius: 8px; /* Added border radius for the container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added box shadow for the container */
        }
    </style>
</head>
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
<body>
<div class="container">
<h1><?php echo $seriesInfo['name']; ?></h1>
<p><strong>Start Date:</strong> <?php echo $seriesInfo['startdate']; ?></p>
<p><strong>End Date:</strong> <?php echo $seriesInfo['enddate']; ?></p>
<p><strong>Number of ODIs:</strong> <?php echo $seriesInfo['odi']; ?></p>
<p><strong>Number of T20s:</strong> <?php echo $seriesInfo['t20']; ?></p>
<p><strong>Number of Tests:</strong> <?php echo $seriesInfo['test']; ?></p>
<p><strong>Number of Squads:</strong> <?php echo $seriesInfo['squads']; ?></p>
<p><strong>Number of Matches:</strong> <?php echo $seriesInfo['matches']; ?></p>

<h2>Matches</h2>
<?php foreach ($matchList as $match) : ?>
    <div class="match-details">
        <h3><?php echo $match['name']; ?></h3>
        <p><strong>Status:</strong> <?php echo $match['status']; ?></p>
        <p><strong>Venue:</strong> <?php echo $match['venue']; ?></p>
        <p><strong>Date:</strong> <?php echo $match['date']; ?></p>
        <p><strong>Time:</strong> <?php echo date('H:i', strtotime($match['dateTimeGMT'])); ?> GMT</p>
    </div>
<?php endforeach; ?>
</div>
</body>
</html>
