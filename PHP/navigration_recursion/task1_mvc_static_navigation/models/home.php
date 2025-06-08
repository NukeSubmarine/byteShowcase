<?php

$paragDescription = htmlParagraph("London, the capital of England and the United Kingdom, is a 21st-century city with history stretching back to Roman times. At its centre stand the imposing Houses of Parliament, the iconic ‘Big Ben’ clock tower and Westminster Abbey, site of British monarch coronations. Across the Thames River, the London Eye observation wheel provides panoramic views of the South Bank cultural complex, and the entire city.");
$image = '<img src="images/londonSilhouette.jpg" alt="London" width="400">';
$addEmptyLine = addEmptyLine();

# Adding all to the $content as index.php expects a model file to set the $content  to be passed to the [+content+] placeholder in the html file
$content = $image . $paragDescription ;