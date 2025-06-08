<?php

$title = htmlHeading("The London Eye", 2);
$paragDescription = htmlParagraph("London Eye, formerly Millennium Wheel, revolving observation wheel, or Ferris wheel, in London, on the South Bank of the River Thames in the borough of Lambeth. At an overall height of 443 feet (135 metres), the London Eye was the world’s tallest Ferris wheel from 1999, when it was built, until 2006, when it was surpassed by the Star of Nanchang, in Nanchang, China. It is one of London’s most popular tourist attractions for which an admission fee is charged and is sometimes credited with sparking a worldwide revival of Ferris wheel construction.");
$image = '<img src="images/londonEye.jpg" alt="London Eye" width="400">';
$addEmptyLine = addEmptyLine();

# Adding all to the $content as index.php expects a model file to set the $content  to be passed to the [+content+] placeholder in the html file
$content = $title . $image . $paragDescription ;