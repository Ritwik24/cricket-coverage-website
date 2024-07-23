<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Search Results</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .stats-table {
            border-collapse: collapse;
            width: 100%;
        }

        .stats-table th,
        .stats-table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .spacing {
            padding: 10px;
        }
        body {
            background-color: #f0e0d1; /* Set your desired background color here */
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
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px; /* Added padding to create space around the content */
            background-color: #fff; /* Added background color for the container */
            border-radius: 8px; /* Added border radius for the container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added box shadow for the container */
        }
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
    <div class="container">
<?php
// Check if player_name parameter is set
if (isset($_GET['player_name'])) {
    $player_name = $_GET['player_name'];
    $api_key = '8ae3825f-bed3-43d8-a232-606b53d76b7e'; // Replace 'YOUR_API_KEY' with your actual API key
    
    // Construct the API endpoint URL
    $url = 'https://api.cricapi.com/v1/players?apikey=' . $api_key . '&offset=0&search=' . urlencode($player_name);

    // Fetch player data from API
    $json_result = file_get_contents($url);

    // Decode JSON response
    $data = json_decode($json_result, true);

    // Check if API request was successful
    if ($data['status'] === 'success') {
        $players = $data['data'];
        
        // Display player search results
        if (!empty($players)) {
            foreach ($players as $player) {
                $player_id = $player['id'];
                $player_info_url = 'https://api.cricapi.com/v1/players_info?apikey=' . $api_key . '&id=' . $player_id;
                $player_info_json = file_get_contents($player_info_url);
                $player_info_data = json_decode($player_info_json, true);
                
                if ($player_info_data['status'] === 'success') {
                    $player_info = $player_info_data['data'];
                    echo '<div style="display: flex;">';
                        // Display player image
                        echo '<img src="' . $player_info['playerImg'] . '" alt="Player Image" style="max-width: 200px; align-self: flex-start;">';
                        
                        // Display additional player information
                        echo '<div style="margin-left: 20px;">';
                        echo '<h2>' . $player_info['name'] . '</h2>';
                        echo '<p><strong>Role:</strong> ' . $player_info['role'] . '</p>';
                        echo '<p><strong>Batting Style:</strong> ' . $player_info['battingStyle'] . '</p>';
                        echo '<p><strong>Place of Birth:</strong> ' . $player_info['placeOfBirth'] . '</p>';
                        echo '<p><strong>Country:</strong> ' . $player_info['country'] . '</p>';
                        echo '</div>'; // end of div for player details
                        echo '</div>'; // end of div for flex container
                    // Separate batting and bowling stats
                    $batting_stats = [];
                    $bowling_stats = [];
                    foreach ($player_info['stats'] as $stat) {
                        if ($stat['fn'] === 'batting') {
                            $batting_stats[] = $stat;
                        } elseif ($stat['fn'] === 'bowling') {
                            $bowling_stats[] = $stat;
                        }
                    }
                    
                    // Display batting stats
                    echo '<h3>Batting Stats</h3>';
                    echo '<table class="stats-table">';
                    echo '<tr><th>Format</th><th>Matches</th><th>Innings</th><th>NO</th><th>Runs</th><th>High Score</th><th>Average</th><th>BF</th><th>Strike Rate</th><th>100s</th><th>200s</th><th>50s</th><th>4s</th><th>6s</th></tr>';
                    echo '<tr>';
                    echo '<td>Test</td>';
                    foreach ($batting_stats as $stat) {
                        if($stat['matchtype'] == 'test')
                        echo '<td class="spacing">' . $stat['value'] . '</td>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>ODI</td>';
                    foreach ($batting_stats as $stat) {
                        if($stat['matchtype'] == 'odi')
                        echo '<td class="spacing">' . $stat['value'] . '</td>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>T20I</td>';
                    foreach ($batting_stats as $stat) {
                        if($stat['matchtype'] == 't20i')
                        echo '<td class="spacing">' . $stat['value'] . '</td>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>IPL</td>';
                    foreach ($batting_stats as $stat) {
                        if($stat['matchtype'] == 'ipl')
                        echo '<td class="spacing">' . $stat['value'] . '</td>';
                    }
                    echo '</tr>';
                    echo '</table>';
                    
                    // Display bowling stats
                    echo '<h3>Bowling Stats</h3>';
                    echo '<table class="stats-table">';
                    echo '<tr><th>Format</th><th>Matches</th><th>Innings</th><th>Balls</th><th>Runs</th><th>Wickets</th><th>BBI</th><th>BBM</th><th>Economy</th><th>Average</th><th>SR</th><th>5W</th><th>10W</th></tr>';
                    echo '<tr>';
                    echo '<td>Test</td>';
                    foreach ($bowling_stats as $stat) {
                        if($stat['matchtype'] == 'test')
                        echo '<td class="spacing">' . $stat['value'] . '</td>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>ODI</td>';
                    foreach ($bowling_stats as $stat) {
                        if($stat['matchtype'] == 'odi')
                        echo '<td class="spacing">' . $stat['value'] . '</td>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>T20I</td>';
                    foreach ($bowling_stats as $stat) {
                        if($stat['matchtype'] == 't20i')
                        echo '<td class="spacing">' . $stat['value'] . '</td>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>IPL</td>';
                    foreach ($bowling_stats as $stat) {
                        if($stat['matchtype'] == 'ipl')
                        echo '<td class="spacing">' . $stat['value'] . '</td>';
                    }
                    echo '</tr>';
                    echo '</table>';
                } else {
                    echo 'Failed to fetch player information.';
                }
            }
        } else {
            echo 'No players found.';
        }
    } else {
        echo 'Failed to fetch data from the API.';
    }
} else {
    echo 'Player name parameter is missing.';
}
?>
    </div>
</body>
</html>