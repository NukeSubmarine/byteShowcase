<?php
require_once 'includes/functions.php';
require_once 'includes/showCode.php';

$title = "Lab Practice 5";
$mainHeading = htmlHeading("London Landmarks Task 2", 1);

# *****************************************************************

# associative (key => value) nav array: key is used in  ?view=, value is shown on screen
$navItems = [
	'home' => 'Home',
	'parliament' => 'Houses of Parliament',
	'abbey' => 'Westminster Abbey',
	'eye' => 'London Eye',
	'palace' => 'Buckinham Palace',
];

# call function to generate the main nav links 
$mainNAV = htmlNAV($navItems, 'view');

# associative (key => value) subnav array: key is used in  ?view=, value is shown on screen
$subNavItems = [
	'towerBridge' => 'Tower Bridge',
	'stPauls' => 'St Pauls Cathedral',
];

# call function to generate sub nav links
$subNAV = htmlNAV($subNavItems, 'sub');


# Set default view
# logic to check if 'view' is set. if not check is 'sub' is set. if neither is set, then load home.
if (isset($_GET['view'])) { # If the URL contains ?view= (e.g., index.php?view=eye)
	$view = $_GET['view']; # Then set $view to the value passed in ?view=
} else if (isset($_GET['sub'])) { # If no ?view= is set, check for ?sub= (e.g., index.php?sub=towerBridge)
	$view = $_GET['sub']; #Then set $view to the value passed in ?sub=
} else { #If neither ?view= nor ?sub= is present in the URL
	$view = 'home'; # Use 'home' as the default value (this matches 'home.php' model)
}

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
$html = str_replace('[+subNAV+]',        $subNAV,      $html);
$html = str_replace('[+showCode+]',      $showCode,      $html);
$html = str_replace('[+content+]',       $content,       $html);
$html = str_replace('[+footer+]',        $footer,        $html);
$html = str_replace('[+addEmptyLine+]',	 $addEmptyLine,  $html);

#read the HTML template file and assing to a variable
echo $html;
