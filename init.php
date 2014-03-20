<?php
//INITALIZATION PAGE TO INITIALIZE DATABASE OF WORDS
$passw = file("password.txt");
$pw = rtrim($passw[0]);
$db = new mysqli('localhost', 'GraysonD', $pw, 'GraysonD');
if ($db->connect_error): 
    die ("Could not connect to db: " . $db->connect_error); 
endif;

$result = $db->query("drop table WORDS");
$result = $db->query("create table WORDS (id int primary key not null, word char(100) not null)") 
			or die ("Invalid: " . $db->error);

$fp = fopen("morewords.txt", "r");//Open file containing list of hangman words
$i = 0; //primary int ID of each word
while(!feof($fp))
{
	$curr_word = rtrim(fgets($fp));
	$db->query("insert into WORDS values ('$i', '$curr_word')") or die ("Invalid insert " . $db->error);
	$i++;
}
fclose($fp);

header("Location: hangman.html");

?>