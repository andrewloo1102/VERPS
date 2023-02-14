<?php
include 'readFile2.php';
require 'addInput_frame.php'; //this file creates new target forms 

readText();
if (!function_exists('json_encode'))
{
function json_encode($a=false)
{
if (is_null($a)) return 'null';
if ($a === false) return 'false';
if ($a === true) return 'true';
if (is_scalar($a))
{
if (is_float($a))
{
// Always use "." for floats.
return floatval(str_replace(",", ".", strval($a)));
}
 if (is_string($a))
 {
 static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
 return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
 }
 else
 return $a;
 }
 $isList = true;
 for ($i = 0, reset($a); $i < count($a); $i++, next($a))
 {
 if (key($a) !== $i)
 {
 $isList = false;
 break;
 }
 }
 $result = array();
 if ($isList)
 {
 foreach ($a as $v) $result[] = json_encode($v);
 return '[' . join(',', $result) . ']';
 }
 else
 {
 foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
 return '{' . join(',', $result) . '}';
 }
 }
 }

echo "<script type='text/javascript'>";
if ($_POST['error'])
{
echo "errors =" .$_POST['error'] . ";";
}
else
{
echo "errors =0;";
}

//checks if text file is entered
echo "parent.saveLoad=0;";
echo "if (errors == 1)";
echo "{";
echo "alert('Please enter a text file');";
echo "}";
echo "else if (errors == 2)";
echo "{";
echo "alert('File must be text');";
echo "}";
echo "else";
echo "{";
echo "parent.saveLoad = 1;";
echo "}";
print "parent.saved_form=". json_encode($savedForm) . ";";
echo "alert('test');";

echo "</script>";


?>
