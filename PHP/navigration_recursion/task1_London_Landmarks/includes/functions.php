<?php

#*************************************************
#*************************************************
# htmlParagraph — wrap sanitized text in a <p> tag
function htmlParagraph($text)
{
	$html = htmlentities(trim($text));
	return "<p>$html</p>";
}

#*************************************************
#*************************************************

# htmlHeading — wrap sanitized text in a heading tag
function htmlHeading($text, $level)
{
	# 1. Sanitize and normalize: trim whitespace, convert to lowercase, then escape HTML entities. 
	$heading = htmlentities(trim(strtolower($text)));
	# 2. Format the text according to heading level
	switch ($level) {
		# Levels 1 & 2: capitalize each word, wrap in <strong>
		case 1:
		case 2:
			$heading = '<strong>' . ucwords($heading) . '</strong>';
			break;
		# Levels 3 & 4: uppercase only first character, wrap in <strong>
		case 3:
		case 4:
			$heading = '<strong>' . ucfirst($heading) . '</strong>';
			break;
		# Levels 5 & 6: uppercase first character, wrap in <em>
		case 5:
		case 6:
			$heading = '<em>' . ucfirst($heading) . '</em>';
			break;
		# Default handler: invalid level, show an error message instead
		default:
			$heading = "Unknown heading level: $level";
	}
	# 3. Wrap the formatted heading text in the appropriate <h1>–<h6> tag and return
	return "<h{$level}>{$heading}</h{$level}>";
}


#*************************************************
#*************************************************

# To add an empty line to produce a simple line break (<br>)
function addEmptyLine()
{
	return "<br><br>";
}

#*************************************************
#*************************************************

# Print a PHP array
function displayArray($arrName)
{
	return '<pre>' . print_r($arrName, true) . '</pre>';
}

#*************************************************
#*************************************************

# Convert an array of strings into a series of unordered HTML list items
function htmlUList($listItems)
{
	$items = '';
	$items .= '<ul>';
	foreach ($listItems as $loopPassVariable) {
		# Sanitize text from the array listItems and add to the variable items. ucwords capitalize the first letter of each word in the string
		$items .= '<li>' . htmlentities(trim(ucwords($loopPassVariable))) . '</li>';
	}
	$items .= '</ul>';
	# After the loop return $items to show the list
	return $items;
}

#*************************************************
#*************************************************

# Convert an array of strings into a series of HTML ordered list items
function htmlOList($listItems, $numType = 1, $startNum = 1)
{
	$items = ''; # Initialize an empty string to accumulate our list HTML
	$items .= '<ol type="'  . $numType  . '" start="' . $startNum . '">'; # Open the <ol> tag with the specified numbering style and start value
	foreach ($listItems as $loopPassVariable) # Loop through each element in the array
	{
		# Trim whitespace, convert to title case, escape HTML entities
		# Wrap the sanitized text in an <li> and append to our output
		$items .= '<li>' . htmlentities(trim(ucwords($loopPassVariable))) . '</li>';
	}
	$items .= '</ol>'; # Close the ordered list
	return $items;
}

#*************************************************
#*************************************************

# GenerateMainNAV - creates HTML navigatin links
function generateMainNAV($navItems)
{
	$navHTML = '<nav><ul>'; #open nav and unordered list
	foreach ($navItems as $key => $label)
	{
		$navHTML .= '<li><a href="index.php?view=' . $key . '">' . htmlentities($label) . '</a></li>';
	}
	$navHTML .= '</ul></nav>'; #close nav and unordered list
	return $navHTML;
}
