<?php

require_once 'GithubScoreCalculator.php';
require_once 'GithubEventsClient.php';

$githubScoreCalculator = new GithubScoreCalculator();
$githubEventsClient = new GithubEventsClient();

$events = $githubEventsClient->forUser('badchoice');
$totalPoints = $githubScoreCalculator->calculate($events);

echo "GitHub score: {$totalPoints}\n";
