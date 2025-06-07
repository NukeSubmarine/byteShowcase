<?php

$title = htmlHeading("Westminster Abbey", 2);
$paragDescription = htmlParagraph("Westminster Abbey, London church that is the site of coronations and other ceremonies of national significance. It stands just west of the Houses of Parliament in the Greater London borough of Westminster. Situated on the grounds of a former Benedictine monastery, it was refounded as the Collegiate Church of St. Peter in Westminster by Queen Elizabeth I in 1560. In 1987 Westminster Abbey, St. Margaret’s Church, and the Houses of Parliament were collectively designated a UNESCO World Heritage site.");
$image = '<img src="images/westminsterAbbey.jpg" alt="Westminster Abbey" width="400">';
$addEmptyLine = addEmptyLine();

# Adding all to the $content as index.php expects a model file to set the $content  to be passed to the [+content+] placeholder in the html file
$content = $title . $image . $paragDescription ;