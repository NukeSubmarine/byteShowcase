<?php
require_once 'includes/functions.php';
require_once 'includes/showCode.php';

$title = "Lab Practice 5";
$mainHeading = htmlHeading("London Landmarks", 1);

# *****************************************************************

# nav array: key is used in  ?view=, value is shown on screen
$navItems = [
	'home' => 'Home',
	'parliament' => 'Houses of Parliament',
	'abbey' => 'Westminster Abbey',
	'eye' => 'London Eye',
	'palace' => 'Buckinham Palace',
	'stPauls' => 'St Pauls Cathedral',
];

$mainNAV = generateMainNAV($navItems); # call function and assing to a variable

# Set default view
# Ternary operator to do:
# it there is a view value pased in the URL (index.php?view=eye) use that value and store it in the #view variable, otherwise, if no view is provided then set #view to 'home' as the default.
# isset() function checkts if is this variable set and not null
$view = isset($_GET['view']) ? $_GET['view'] : 'home';

# Build path to model file
$modelPath = "models/$view.php";
#echo "<pre>"; //debug line
#print_r(scandir('models')); //debug line
#echo "</pre>"; //debug line


# Check if the model file exist otherwise show the Error 404
if (file_exists($modelPath)) {
	require_once $modelPath; # this sets $content
} else {
	$content = htmlParagraph("Error 404: Page not found.");
}




# ******************************************************************

$addEmptyLine = addEmptyLine();
$footer = "PHP code is generating the above title, main heading and content.";
#to add an empty line to separte $footer to the $showCodeForm
$addEmptyLine = addEmptyLine();

#showCodeForm
$showCode = ''
	. '<form method="post">'
	. '	<button name="seeCode">See Code</button>'
	. '	<button name="hideCode">Hide Code</button>'
	. '</form>';

#replace the [+placeholders+] in html template with data form variables and echo to Browser
$html = file_get_contents('html/pageTemplate.html');

$html = str_replace('[+title+]',         $title,         $html);
$html = str_replace('[+mainHeading+]',   $mainHeading,   $html);
$html = str_replace('[+mainNAV+]',       $mainNAV,       $html);
$html = str_replace('[+showCode+]',      $showCode,      $html);
$html = str_replace('[+content+]',       $content,       $html);
$html = str_replace('[+footer+]',        $footer,        $html);
$html = str_replace('[+addEmptyLine+]',	 $addEmptyLine,  $html);

#read the HTML template file and assing to a variable
echo $html;
