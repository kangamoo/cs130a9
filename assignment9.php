<?php
$thisFile = basename(__FILE__);
/* Added to grab the querystring and reveal the php source if set */
if (isset($_GET['source'])) {
	highlight_file($thisFile);
	exit;
}

/******************************************************************************/
/*                                                                            */
/*      Assignment 9 - Northwoods University                                  */
/*                                                                            */
/******************************************************************************/

//include the common file, which contains the function
include("common.php");

/*
 * Database tables
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */



?>
<html>
<head>
	<title>CS130a - Assignment 9 - Jennifer Nason</title>
</head>
<body>
<a href="/~jnason1/cs130a/index.php">Index</a> | <a href="<?= $thisFile ?>?source" target="_blank">View Source</a>
<br/><br/>
<hr>
<h1>CS130a - Assignment 9 - Jennifer Nason</h1>

<form action='<?= $thisFile ?>' method='post'>
	<p>Select as many animals as you would like:<br/>
		<select name='animalNoise[]' size=5 multiple>
			<option value='pig:oink'>Pig
			<option value='duck:quack'>Duck
			<option value='cow:moo'>Cow
			<option value='sheep:baa'>Sheep
			<option value='horse:neigh'>Horse
			<option value='dog:woof'>Dog
			<option value='cat:meow'>Cat
			<option value='rooster:cock-a-doodle-doo'>Rooster
		</select></p>
	<input type='submit' value='Sing!' name="submit" id="submit">
</form>
<br/><br/>

<?php
// first check and see if the form has been submitted, and there is at least one animal selected
if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Sing!" && isset($_REQUEST['animalNoise']) && count($_REQUEST['animalNoise']) > 0) {
	//print_r($_REQUEST);
	//iterate through the results to print out all the verses
	foreach ($_REQUEST['animalNoise'] as $animalNoise) {
		$inputArr = explode(":", $animalNoise);
		$animal = $inputArr[0];
		$sound = $inputArr[1]; //these could just be written directly in the function args below, but it helps readability to assign them to variables that are only args.
		echo printOneVerse($animal, $sound);
	}
} else {
	echo "Please select one or more animals above, to see the verses";
}

?>
</body>
</html>


