<?php

$title = htmlHeading("Tower Bridge", 2);
$paragDescription = htmlParagraph("Tower Bridge, a combined bascule and suspension bridge in London, spans the River Thames near the Tower of London in the borough of Southwark. Completed in 1894, the bridge is renowned for its two Gothic-style towers and its central section that lifts to allow ships to pass. Tower Bridge was designed to ease road traffic while maintaining river access to the busy Pool of London docks. Today, it remains one of the city’s most iconic landmarks, attracting tourists with its panoramic walkways and Victorian engineering exhibitions.");
$image = '<img src="images/towerBridge.jpg" alt="Tower Bridge" width="400">';
$addEmptyLine = addEmptyLine();

# Adding all to the $content as index.php expects a model file to set the $content  to be passed to the [+content+] placeholder in the html file
$content = $title . $image . $paragDescription;
