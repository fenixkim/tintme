<?php

define('CACHE_DIR', 'i/');
define('DEFAULT_COLOR', '0xF5F5F5');
define('DEFAULT_IMAGE', 'default.png');
define('EXT', '.png');


// Validate de color
$color = '0x'.$_GET['c'];
if (!filter_var($color, FILTER_VALIDATE_INT, array('flags' => FILTER_FLAG_ALLOW_HEX))) {
  //exit('Wrong color format, use a hex value like FF0000 for red');
  $color = DEFAULT_COLOR;
}
// Replace 0x by #
$color = str_replace('0x', '#', $color);

// Validate the url image
$imageURL = filter_input(INPUT_GET, 'u', FILTER_VALIDATE_URL);
if (!$imageURL) {
  $imageURL = DEFAULT_IMAGE;
}

// Validate if plain text or image
$plain = filter_input(INPUT_GET, 'p', FILTER_VALIDATE_BOOLEAN);

// Create the output name
$outputName = CACHE_DIR .md5($color . '_' . $imageURL) . EXT;

if (file_exists($outputName)) {
  
  // Return the file from cache if exits
  $im = new Imagick($outputName);

} else {
  
  // Proccess the image with imagemagick
  $im = new Imagick($imageURL);
  $im->setImageAlphaChannel(Imagick::ALPHACHANNEL_EXTRACT);
  $im->setImageBackgroundColor($color);
  $im->setImageAlphaChannel(Imagick::ALPHACHANNEL_SHAPE);
  $im->writeImage($outputName);
  
}

// Show the image
if ($plain) {
  
  require_once('lib.php');
  
  header("Content-Type: text/plain");
  echo url_origin($_SERVER).'/'.$outputName;
  
} else {
  
  header('Content-type: image/png');
  echo $im;
  
}

// Destroy
$im->destroy();