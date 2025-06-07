<?php

$title = htmlHeading("Buckingham Palace", 2);
$paragDescription = htmlParagraph("Buckingham Palace, palace and London residence of the British sovereign. It is situated within the borough of Westminster. The palace takes its name from the house built (c. 1705) for John Sheffield, duke of Buckingham.");
$image = '<img src="images/buckinghamPalace.jpg" alt="Buckingham Palace" width="400">';
$addEmptyLine = addEmptyLine();

# Adding all to the $content as index.php expects a model file to set the $content  to be passed to the [+content+] placeholder in the html file
$content = $title . $image . $paragDescription ;