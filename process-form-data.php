<?php
header('Content-Type: text/plain');         # its a text file
header('Content-Disposition: attachment; filename="VERITAS.txt"');  # hit to trigger external mechanisms 

//$name = $_POST['name'];
//$email = $_POST['email'];
#$formdata = "forms/formdata_" . $_POST['name'] . ".txt";
$fp = fopen("forms/formdata.txt", "w") or die("ERROR WITH SAVING");


$themes_array = $_POST["themes"];
        foreach ($themes_array as $eachTheme) {
        $themes .= $eachTheme;
        $themes .= ',';
        }

        $themes = substr($themes, 0, strlen($themes)-1);

$weather_array = $_POST['weather' . $eachInput];
$weather= implode(", ", $weather_array);




$targetstring = "TARGET FORM";

$targetCount = $_POST["count"];
    foreach ($targetCount as $targetNo) {

    $targetstring .= "\n**********************\n    Source: " . $_POST['Source'][$targetNo] . "\n
    RA: " . $_POST['RA'][$targetNo] . "\n
    dec: " . $_POST['Dec'][$targetNo] . "\n
    Minimum Elevation: " . $_POST['Min_Elev'][$targetNo] . "\n
    Requested Exposure (hours): " . $_POST['Max_Exposure'][$targetNo] . "\n
    Minimum Exposure (hours): " . $_POST['Min_Exposure'][$targetNo] . "\n
    Observation Mode: " . $_POST['menu'][$targetNo] . "\n
        specs: " . $_POST['Obs_mode' . $targetNo][0] . "\n
    No. Tels: " . implode(", ", $_POST['noTels' . $targetNo]) . "\n
    Moonlight: " . $_POST['Moonlight'. $targetNo] . "\n
    Weather: " . implode(", ", $_POST['weather' . $targetNo]) . "\n
    Observation from: " . $_POST['Begin_Obs'][$targetNo] . "\n
    to: " . $_POST['End_Obs'][$targetNo] . "\n
    Comments: " . $_POST['comments'][$targetNo]. "\n";
    
    }

$savestring = "COVER FORM\n
    Science Working Group: " . $_POST['working_group']. "\n
    Theme(s): " . $themes. "\n
    Multi-Year Project?: " . $_POST['multi_year']. "\n
    Title: " . $_POST['title']. "\n
    Abstract: " . $_POST['Abstract']. "\n
    PI INFORMATION\n
        First name: " . $_POST['PI_first']. "\n
        Last name: " . $_POST['PI_last']. "\n
        Email: " . $_POST['PI_email']. "\n
        Institution: " . $_POST['PI_institution']. "\n
    Fermi-GI award? " . $_POST['Fermi']. "\n
    Who will analyze and when: " . $_POST['analysis']. "\n
    Multiwavelength requirement: " . $_POST['mw_radio']. "\n
        " . $_POST['mw'] . "\n
    Thesis: " . $_POST['thesis_radio'] . "\n
        Whom: " . $_POST['thesis'] . "\n
    Target of Opportunity observations? " . $_POST['opportunity_radio'] . "\n
        Trigger condition: " . $_POST['trigger_cond'] . "\n
        Anticipated rate of triggers per year: " . $_POST['trigger_ratepyr'] . "\n
        Minimum observation-hours per trigger: " . $_POST['min_obshrsptrigger'] . "\n\n"
. $targetstring;

fwrite($fp, $savestring);
fclose($fp);
readfile('forms/formdata.txt');

?>
