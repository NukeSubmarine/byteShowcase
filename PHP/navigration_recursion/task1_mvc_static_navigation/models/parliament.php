<?php

$title = htmlHeading("Houses of Parliament", 2);
$paragDescription = htmlParagraph("Houses of Parliament, also called Palace of Westminster, in the United Kingdom of Great Britain and Northern Ireland, the seat of the bicameral Parliament, including the House of Commons and the House of Lords. It is located on the left bank of the River Thames in the borough of Westminster, London.");
$paragDescription .= htmlParagraph("Big Ben, tower clock, famous for its accuracy and for its massive bell. Strictly speaking, the name refers to only the great hour bell, which weighs 15.1 tons (13.7 metric tons), but it is commonly associated with the whole clock tower at the northern end of the Houses of Parliament.");
$image = '<img src="images/housesOfParliamentBigBen.jpg" alt="Houses Of Parliament" width="400">';
$addEmptyLine = addEmptyLine();

# Adding all to the $content as index.php expects a model file to set the $content  to be passed to the [+content+] placeholder in the html file
$content = $title . $image . $paragDescription ;