<?php

require_once 'src/Movie.php';
require_once 'src/MovieType.php';
require_once 'src/Rental.php';
require_once 'src/Customer.php';
require_once 'src/Statement/StatementFormatter.php';
require_once 'src/Statement/TextStatementFormatter.php';
require_once 'src/Statement/HtmlStatementFormatter.php';

$regularMovie = new Movie('The Matrix', MovieType::Regular);
$newReleaseMovie = new Movie('Dune: Part Three', MovieType::NewRelease);
$childrenMovie = new Movie('Frozen', MovieType::Children);

$regularMovieRental = new Rental($regularMovie, 3);
$newReleaseMovieRental = new Rental($newReleaseMovie, 2);
$childrenMovieRental = new Rental($childrenMovie, 5);

$customer = new Customer('Pau');
$customer->addRental($regularMovieRental);
$customer->addRental($newReleaseMovieRental);
$customer->addRental($childrenMovieRental);

echo $customer->statement(new TextStatementFormatter()) . "\n";

echo $customer->statement(new HtmlStatementFormatter()) . "\n";
