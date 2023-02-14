<?php 
// require once becuase several files need DB.php and it was not working before
require_once 'DB.php';

//this function is called in upload.php to read the target textfile. It saves the target information in the textfile as arrays in $_POST which is later used in upload.php

//THIS FILE IS CALLED TO INPUT TARGET TEXT CHANGE THE NAME OF THIS FILE

$savedForm = Array();

function read() {

global $proposal_id;

if (($_FILES["file_tar"]["error"]) == 4)
{
$_POST['error'] = 1;
}
else 
{
    if ($_FILES["file_tar"]["type"] == "text/plain") 
    {
    if ($_FILES["file_tar"]["error"] > 0)
      {
      echo "Error: " . $_FILES["file_tar"]["error"] . "<br />";
      }
    else
      {
      }

        unset($_POST['Source']);
        unset($_POST['RA']);
        unset($_POST['Dec']);
        unset($_POST['Min_Elev']);
        unset($_POST['Max_Exposure']);
        unset($_POST['Min_Exposure']);
        unset($_POST['menu']);
        unset($_POST['Obs_mode']);
        unset($_POST['Moonlight']);
        unset($_POST['Begin_Obs']);
        unset($_POST['End_Obs']);
        unset($_POST['count']); 


    $ourFileName = $_FILES['file_tar']['tmp_name'];
    $fh = fopen($ourFileName, 'r') or die("Can't open file");
        $i = 0;
    while (! feof($fh)) {
        if ($s = fgets($fh)) {
        $sources = preg_split('/[\'"]/',$s,-1,PREG_SPLIT_NO_EMPTY);
        $words = preg_split('/[\s,]+/',$sources[1] ,-1,PREG_SPLIT_NO_EMPTY);
        $_POST['count'][] = $i;
        echo "WORDS: ";
        echo "Source: " . $sources[0];
        echo "RA: " . $words[0];
        echo $words[1];
        echo $words[2];

        echo "Dec: " . $words[3];
        echo $words[4];
        echo $words[5];
        

        $_POST['Source'][] = $sources[0];
        $_POST['RA'][] = $words[0] . ' ' . $words[1] . ' ' . $words[2];
        $_POST['Dec'][] = $words[3] . " " . $words[4] . " " . $words[5];

        $i++;

    }
    }

    fclose($fh);
    }
    else
    {

    $_POST['error'] = 2;
    
    echo "Invalid file";
    }
}
}


function readText() {

    global $savedForm;

if (($_FILES["file_saved"]["error"]) == 4)
{
$_POST['error'] = 1;
}
else 
{
    if ($_FILES["file_saved"]["type"] == "text/plain") 
    {
        if ($_FILES["file_saved"]["error"] > 0)
          {
          echo "Error: " . $_FILES["file_saved"]["error"] . "<br />";
          }
        else
          {

          //unset($_POST['working_group']);
    /*
            unset($_POST['Source']);
            unset($_POST['RA']);
            unset($_POST['Dec']);
            unset($_POST['Min_Elev']);
            unset($_POST['Max_Exposure']);
            unset($_POST['Min_Exposure']);
            unset($_POST['menu']);
            unset($_POST['Obs_mode']);
            unset($_POST['Moonlight']);
            unset($_POST['Begin_Obs']);
            unset($_POST['End_Obs']);
            unset($_POST['count']); 
            */


        $ourFileName = $_FILES['file_saved']['tmp_name'];
        $fh = fopen($ourFileName, 'r') or die("Can't open file");

        while (! feof($fh)) {
            if ($s = fgets($fh)) {
            $savedForm[] = $s;
            //$_POST['savedForm']=$s;
            //$savedForm[] = htmlentities($s);
            //$_POST['hidden_form'] = htmlspecialchars($savedForm);
        }

        }
          //  array_unshift($_POST['hidden_form'], count($_POST['hidden_form']));
        //$_POST['hidden_form'] = $savedForm;
        fclose($fh);
        //echo ($savedForm);

       //print_r($_POST['hidden_form']); 


        //echo "TEST";
       print_r($savedForm);
       //print_r($['savedForm']);
           //print_r($savedForm); 
           //echo $_POST['hidden_form'][0];
           // print_r($_POST['hidden_form']);
            //$_POST['working_group'] = substr($savedForm[2], strlen("Science Working Group: "));
            //$testing = strpos($savedForm[2], );
            //echo $testing;
        }
    }
    else
    {

    $_POST['error'] = 2;
    
    echo "Invalid file";
    }
}
}

