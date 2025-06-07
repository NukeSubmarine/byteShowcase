<?php
    # Part 1: to initialize an empty buffer
    $showCode = ''; 

    # Part 2: only add the highlighte source code when “See Code” is pressed
    if (isset($_POST["seeCode"])) {

        # append a paragraph and the highlighted functions.php
		$showCode .= '<p>The user defined PHP functions are separate in \includes</p>';
		$showCode .= show_source('includes/functions.php');

        # append a paragraph and the highlighted HTML template
		$showCode .= '<p>The HTML template is a separate file in \html</p>';
		$showCode .= show_source('html/pageTemplate.html');

        # append a paragraph and the highlighted showCode.php itself
		$showCode .= '<p>The main index.php file contains only PHP</p>';
		$showCode .= show_source(__FILE__);

        # include your library so the page still works
		require_once 'includes/functions.php'; #read and include the user defined function library
	}

	# if “Hide Code” is pressed, just reload the page (wiping out $showCode)
	if (isset($_POST["hideCode"])) {
		header("Refresh:0"); #refresh page
	}

?>