<?php
require_once 'includes/functions.php';
require_once 'includes/showCode.php';

$title = "PHP Dynamic NAV example Lab Practice 5";
$mainHeading = htmlHeading("London Landmarks Task 3", 1);

# *****************************************************************

$mainNAVoptions = ['file' => 'File', 'print' => 'Print', 'edit' => 'Edit'];
$fileNAVoptions = ['save' => 'Save', 'saveAs' => 'Save As', 'close' => 'Close'];

#add your two new sub menu arrays here...
$editNAVoptions = ['copy' => 'Copy', 'paste' => 'Paste', 'undo' => 'Undo']; # submenue for Edit options
$printNAVoptions = ['portrait' => 'Portrait', 'landscape' => 'Landscape', 'preview' => 'Preview']; # submenue for print options


$subNAV = '';
$content = htmlParagraph("No options have been selected from the NAV menus.");
$mainNAV = htmlNAV($mainNAVoptions, 'mainNAVselected'); #build main NAV html with links

#decide whether a sub NAV should be displayed
if (isset($_GET['mainNAVselected'])) { #mainNAV option has been selected
	#remember the mainNAV selected URL parameter and add to sub menu URL parameter links
	$subNAVurlParams = "mainNAVselected=$_GET[mainNAVselected]&subNAVselected";
	if ($_GET['mainNAVselected'] == 'file') { #detect and add File sub NAV
		$subNAV = htmlHeading("$_GET[mainNAVselected] : sub NAV menu...", 3);
		$subNAV .= htmlNAV($fileNAVoptions, $subNAVurlParams);
	} else if ($_GET['mainNAVselected'] == 'edit') {
		$subNAV = htmlHeading("$_GET[mainNAVselected] : sub NAV menu...", 3);
		$subNAV .= htmlNAV($editNAVoptions, $subNAVurlParams);
	} else if ($_GET['mainNAVselected'] == 'print') {
		$subNAV = htmlHeading("$_GET[mainNAVselected] : sub NAV menu...", 3);
		$subNAV .= htmlNAV($printNAVoptions, $subNAVurlParams);
	}
}
#content placeholder simply displays what the user has selected from NAV menus...
if (isset($_GET['mainNAVselected'])) { #display what has been selected from the main NAV
	$content = htmlParagraph("$_GET[mainNAVselected] was selected from the Main NAV menu");
}
if (isset($_GET['subNAVselected'])) { #display what has been selected from the sub NAV
	$content .= htmlParagraph("$_GET[subNAVselected] was selected from the File sub menu");
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



$htmlPage = file_get_contents('html/pageTemplate.html'); #get html page template
$placeHolders = ['[+title+]', '[+mainNAV+]', '[+subNAV+]', '[+content+]', '[+footer+]', '[+addEmptyLine+]', '[+showCode+]']; #placeholder array
$contentData = [$title, $mainNAV, $subNAV, $content, $footer, $addEmptyLine, $showCode]; #data content array


#replace [+placeholders+] with content data in the HTML template and echo to browser
echo str_replace($placeHolders, $contentData, $htmlPage);
