<?php
function file_get_the_contents($url) {
  $ch = curl_init();
  $timeout = 0; // set to zero for no timeout
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $file_contents = curl_exec($ch);
  curl_close($ch);
  return $file_contents;
}

$simbadCount = $_POST["count"];
foreach($simbadCount as $simbadEachCount) {
//echo 'test';
if (isset($_POST['simbadid' . $simbadEachCount]))
{
echo $_POST['Source'][$simbadEachCount];
$simbadhit = $simbadEachCount;
break;
}
}
$simbadstring = 'http://simbad.u-strasbg.fr/simbad/sim-id?output.format=ASCII&Ident=' . str_replace("+", "%2B", str_replace(" ", "%20", $_POST['Source'][$simbadhit]));
//echo $simbadstring;
//echo $_POST['Source'][$simbadhit];
// now start your data harvesting
$text = file_get_the_contents($simbadstring);
//$text = file_get_the_contents('http://simbad.u-strasbg.fr/simbad/sim-id?output.format=ASCII&Ident=CTA%201');
// scrape page into variable
//STEPS------
//1) look for ICRS
//2) look for +/-
//echo $text;
$simbad_array = preg_split('/\n/', $text);
print_r(preg_grep('/ICRS/', $simbad_array));

//-1, PREG_SPLIT_OFFSET_CAPTURE);

//$text = "Coordinates  asdfdsfdf Coordinates \n sdfdfdfdf Coordinates";

//preg_match("/Coordinat?/",$text, $simbadmatches);

//preg_match("/<!--start product-->([^`]*?)<!--end product-->/", $text, $temp); // get data out of the page

//print_r($simbad_array);
//print_r($simbad_array);

//echo ($temp[0]);
//echo htmlentities($temp[0]) ; // spits out the 1st occurance of your data
//echo "test";

?>
