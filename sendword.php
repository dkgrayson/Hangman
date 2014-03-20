<?php
//Connects to database to send a random word back in xml form
$passw = file("password.txt");
$pw = rtrim($passw[0]);
$db = new mysqli('localhost', 'GraysonD', $pw, 'GraysonD');
if ($db->connect_error): 
    die ("Could not connect to db: " . $db->connect_error); 
endif;

$word_number = rand(0,1000);

$result = $db->query("select word from WORDS where id=".$word_number);
//$num_rows = $result->num_rows;
$words = $result->fetch_array();


?>
<?xml version="1.0" encoding='utf-8'?>
	<Word><value><?php echo $words[0]?></value></Word>