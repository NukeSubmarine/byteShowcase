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

# Define a function to build a navigation bar. It will accept two inputs
# $navItems an associative array (key => value) like ['eye' => 'London Eye']
# $paramName the name of the query used in the url ('view')

function htmlNAV($navItems, $paramName)
{
	$navHTML = '<nav><ul>'; # start the nav structure. open nav and unordered list

	# loop trhough the array of navigation items
	foreach ($navItems as $key => $label) {
		# foreach item: $key (is the value to pass to the URL 'eye', 'abbey')
		# label is the user facing name like ('London Eye')
		# .=  append each link to the $navHTML string
		$navHTML .= '<li><a href="index.php?' . $paramName . '=' . $key . '">' . htmlentities($label) . '</a></li>';
	}
	$navHTML .= '</ul></nav>'; # close the unordered list and nav
	return $navHTML; # return the final HTML string
}
