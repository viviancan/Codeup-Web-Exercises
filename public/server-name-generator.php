<?php  

$adjectiveArray = array('new', 'good', 'important', 'bad', 'best', 'purple', 'human', 'hard', 'greatest', 'other');

$nounArray = array('book', 'eye', 'mother', 'money', 'night', 'world', 'study', 'time', 'school', 'system');


function randomElement($adjective, $noun)
{


	$randomAdj = array_rand($adjective);
	echo $adjective[$randomAdj] . " ";

	// $randomNoun = array_rand($noun);
	// echo $noun[$randomNoun];

}


randomElement($adjectiveArray, $nounArray);


function randomNameGen()
{



}









?>