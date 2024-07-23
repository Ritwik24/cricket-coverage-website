<?php

$url = 'https://api.cricapi.com/v1/cricScore?apikey=8ae3825f-bed3-43d8-a232-606b53d76b7e';
$response = file_get_contents($url);

if ($response === false) {
    die('Failed to fetch data from the API');
}

$data = json_decode($response, true);

if (!isset($data['data'])) {
    die('No match data found');
}

$matches = $data['data'];

// Function to format date and time
function formatDateTime($dateTimeGMT) {
    return date('l, F j, Y g:i A', strtotime($dateTimeGMT));
}

$now = time();
$intervalStart = $now - (24 * 60 * 60); // One day before
$intervalEnd = $now + (24 * 60 * 60);   // One day after

$matchesInInterval = array_filter($matches, function ($match) use ($intervalStart, $intervalEnd) {
    $matchDateTime = strtotime($match['dateTimeGMT']);
    return $matchDateTime >= $intervalStart && $matchDateTime <= $intervalEnd && $match['series'] !== 'Mongolia tour of Japan, 2024';
});

// Sort matches by date and time (earliest to latest)
usort($matchesInInterval, function($a, $b) {
    return strtotime($a['dateTimeGMT']) - strtotime($b['dateTimeGMT']);
});

foreach ($matchesInInterval as $match) {
    echo '<div class="match">';
    echo '<h2>' . $match['series'] . '</h2>';
    echo '<p><strong>Match Type:</strong> ' . $match['matchType'] . '</p>';
    echo '<p><strong>Date & Time (GMT):</strong> ' . formatDateTime($match['dateTimeGMT']) . '</p>';
    echo '<p><strong>Teams:</strong> <img src="' . $match['t1img'] . '" alt="">' . $match['t1'] . ' vs <img src="' . $match['t2img'] . '" alt="">' . $match['t2'] . '</p>';
    echo '<p><strong>Status:</strong> ' . $match['status'] . '</p>';
    
    // Check if the match has started
    if ($match['status'] != 'Match not started') {
        echo '<p><strong>Team Scores:</strong><br> ' . $match['t1'] . ' - ' . $match['t1s'] . '<br>' . $match['t2'] . ' - ' . $match['t2s'] . '</p>';
    }
    
    echo '</div>';
}

?>
