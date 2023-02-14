<?php 
require_once 'DB.php';
include 'Mail.php';
include 'Mail/mime.php';
require("fpdf17/fpdf.php");
require('phpmailer/phpmailer/class.phpmailer.php');
//require_once 'Mail.php';
//require_once 'Mail/mime.php';

// this is necessary to generate the PDF file for the cover letter - FPDF libary ??


//This reads the whole form and enters information into the database
/////////////////***************************************************************************
//USE A LOOP FOR EACH TARGET

//Connect to the database - MAMP
//$db = DB::connect('mysql://root:root@localhost/VERITAS_Proposal');

$db = DB::connect('');
$_POST['title'] = mysql_real_escape_string($_POST['title']);
$_POST['Abstract'] = mysql_real_escape_string($_POST['Abstract']);
$_POST['PI_first'] = mysql_real_escape_string($_POST['PI_first']);
$_POST['PI_last'] = mysql_real_escape_string($_POST['PI_last']);
$_POST['PI_email'] = mysql_real_escape_string($_POST['PI_email']);
$_POST['PI_institution'] = mysql_real_escape_string($_POST['PI_institution']);
	foreach ($_POST["coInputs"] as $eachcoInput) 
		{
		$_POST['coName'][$eachcoInput] = mysql_real_escape_string($_POST['coName'][$eachcoInput]);
        $_POST['coName'][$eachcoInput] = mysql_real_escape_string($_POST['coName'][$eachcoInput]);
        $_POST['coLast'][$eachcoInput] = mysql_real_escape_string($_POST['coLast'][$eachcoInput]);
        $_POST['coEmail'][$eachcoInput] = mysql_real_escape_string($_POST['coEmail'][$eachcoInput]);
        $_POST['coInstitution'][$eachcoInput] = mysql_real_escape_string($_POST['coInstitution'][$eachcoInput]);
		}

$_POST['analysis'] = mysql_real_escape_string($_POST['analysis']);
if ($_POST['mw'])
{
$_POST['mw'] = mysql_real_escape_string($_POST['mw']);
}
if ($_POST['thesis'])
{
$_POST['thesis'] = mysql_real_escape_string($_POST['thesis']);
}
if ($_POST['trigger_cond'])
{
$_POST['trigger_cond'] = mysql_real_escape_string($_POST['trigger_cond']);
}
if ($_POST['trigger_ratepyr'])
{
$_POST['trigger_ratepyr'] = mysql_real_escape_string($_POST['trigger_ratepyr']);
}
if ($_POST['min_obshrsptrigger'])
{
$_POST['min_obshrsptrigger'] = mysql_real_escape_string($_POST['min_obshrsptrigger']);
}

        foreach ($_POST["count"] as $eachInput) 
		{
$_POST['Source'][$eachInput] = mysql_real_escape_string($_POST['Source'][$eachInput]);
$_POST['Min_Elev'][$eachInput] = mysql_real_escape_string($_POST['Min_Elev'][$eachInput]);
$_POST['Max_Exposure'][$eachInput] = mysql_real_escape_string($_POST['Max_Exposure'][$eachInput]);
$_POST['Min_Exposure'][$eachInput] = mysql_real_escape_string($_POST['Min_Exposure'][$eachInput]);
$_POST['Begin_Obs'][$eachInput] = mysql_real_escape_string($_POST['Begin_Obs'][$eachInput]);
$_POST['End_Obs'][$eachInput] = mysql_real_escape_string($_POST['End_Obs'][$eachInput]);
$_POST['comments'][$eachInput] = mysql_real_escape_string($_POST['comments'][$eachInput]);
		}

if (DB::isError($db)) {die ("Can't connect: " . $db->getMessage());}
//Set up automatic error handling
$db->setErrorHandling(PEAR_ERROR_DIE);

//Access the global variable $db inside this function
global $db;

define("CYCLE", 6);

//Set the value of $Fermi based on the radio button
if ($_POST['Fermi'] == 'yes') {
    $Fermi = 1;
} elseif ($_POST['Fermi'] == 'no') {
    $Fermi = 0;
}

if ($_POST['mw_radio'] == 'yes') {
    $Mw_radio= 1;
} elseif ($_POST['mw_radio'] == 'no') {
    $Mw_radio= 0;
}

if ($_POST['thesis_radio'] == 'yes') {
    $Thesis_radio= 1;
} elseif ($_POST['thesis_radio'] == 'no') {
    $Thesis_radio = 0;
}

if ($_POST['multi_year'] == 'yes') {
    $multi_year= 1;
} elseif ($_POST['multi_year'] == 'no') {
    $multi_year= 0;
}

if ($_POST['opportunity_radio'] == 'yes') {
    $opportunity_radio = 1;
} elseif ($_POST['opportunity_radio'] == 'no') {
    $opportunity_radio = 0;
}

define("CURRENT_CYCLE", 5);

//compares submitted form to forms inside of the database by saving any similar forms in the database in the array $list
$list = $db->getAll("SELECT proposal_id, working_group, title, PI_first, PI_last, PI_email, PI_institution, Fermi, analyzer, mw, mw_info, thesis, thesis_info, abstract, source, RA, decl, min_elev, max_exposure, min_exposure, obs_mode, obs_mode_info, noTels, moonlight, weather, begin_obs, end_obs, comments FROM tblObserving_Proposals WHERE working_group = '". $_POST['working_group'] ."' AND title = '". $_POST['title'] ."' AND PI_first = '". $_POST['PI_first'] ."' AND PI_last = '". $_POST['PI_last'] ."' AND PI_email = '". $_POST['PI_email'] ."' AND PI_institution = '". $_POST['PI_institution'] ."' AND Fermi = '". $Fermi ."' AND analyzer = '". $_POST['analysis'] ."' AND mw = '". $Mw_radio ."' AND thesis = '". $Thesis_radio ."' AND abstract = '". $_POST['Abstract'] ."' AND cycle = '". CURRENT_CYCLE. "'");

// $themes, $multi_year, $_POST['title'], $_POST['Abstract'], $_POST['PI_first'], $_POST['PI_last'], $_POST['PI_email'], $_POST['PI_institution'], $coLast, $Fermi, $_POST['analysis'], $Mw_radio,$_POST['mw'], $Thesis_radio, $_POST['thesis'], $opportunity_radio, $_POST['trigger_cond'], $_POST['trigger_ratepyr'], $_POST['min_obshrsptrigger'], $_POST['Source'][$eachInput], $RA_deg, $Dec_deg, $_POST['RA'][$eachInput], $_POST['Dec'][$eachInput], $_POST['Min_Elev'][$eachInput], $_POST['Max_Exposure'][$eachInput], $_POST['Min_Exposure'][$eachInput], $_POST['menu'][$eachInput], $_POST['Obs_mode' . $eachInput][0], $telNum, $Moonlight_radio, $weather, $_POST['Begin_Obs'][$eachInput], $_POST['End_Obs'][$eachInput], $_POST['comments'][$eachInput]));
//checks to see if the array $list is empty
//if $list is empty, form is submitted to the database
// if not, the form is not submitted and user is given the message that this form has already been submitted
if (empty($list))
{
print <<<HTMLBLOCK
  <html>
  <title> VERITAS - Barnard College, Columbia University </title>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

      <meta name="author" content="Created by Interspire // www.interspire.com" />

        <link rel="stylesheet" type="text/css" href="styles2.css" />

</head>
        
        <div id="wrap">
        <div id="nav"> <span class="class1">  <center> <font size="3"> <a href="http://www.astro.columbia.edu/veritas/index.html"> Home </a> | <a href="http://www.astro.columbia.edu/veritas/people.html"> People </a> | <a href="http://www.astro.columbia.edu/veritas/research.html"> Research </a> | <a href="http://www.astro.columbia.edu/veritas/meetings.html"> Meetings </a> | <a href="http://www.astro.columbia.edu/veritas/pictures.html"> Pictures </a> | <a href="http://www.astro.columbia.edu/veritas/links.html"> Useful Links </a></center> </font> </span> </div>

        <div id="main">
        <img align="left" hspace=30  src="Veritas-logo-drop-shadow.png" width="200"> 
        <br/>
        <br/>
        <br/>
        <font size="6">
        <center> The VERITAS </font> </center> </font>
        <font size="6">
        <center><font> Remote Proposal System  </font></center>
        <center> (VERPS)</font></center>
        <hr size="4" width="80%" color="black">
        <font size="5">
        <center> Call for proposals 2012-2013 </font> </center> </font> 
        <hr size="4" width="80%" color="black">

        <br/> <center>
  <font size="4" color="red"> <blink> Deadline: Friday September 7th 2012 at 5:00 pm EST </blink> </center> </font>
        <br/>
        <br/> <center>
        <font size="4">
        <a href="veritasRPSHelp.html" target='_blank'> General Instructions </a> </font></center>
        <br/>
        <br/> <center>
        <font size="4">
        <a href="proposals/proposals.html" target='_blank'> Other Years Proposals </a> </font></center>
        <br/>
        <br/>

        <hr size="1" align="center" width="100%" color="grey">
        
</html>
HTMLBLOCK;

if(isset($_COOKIE['proposal_id']))
{
  $proposal_id = $_COOKIE['proposal_id'];
}
else
{
  $proposal_id = $db->nextID('tblObserving_Proposals');
}


        read();

$total_time = 0;

$themes_array = $_POST["themes"];
        foreach ($themes_array as $eachTheme) {
        $themes .= $eachTheme;
        $themes .= ',';
        }

        $themes = substr($themes, 0, strlen($themes)-1);

$coInputs = $_POST["coInputs"];
        foreach ($coInputs as $eachcoInput) {
        $coString .= "First Name: ". $_POST['coName'][$eachcoInput];
        $coString .= ',';
        $coString .= " Last Name: " . $_POST['coLast'][$eachcoInput];
        $coString .= ',';
        $coString .= " Email: " . $_POST['coEmail'][$eachcoInput];
        $coString .= ',';
        $coString .= " Institution: " . $_POST['coInstitution'][$eachcoInput];
        $coString .= ';';
        }

        $coString = substr($coString, 0, strlen($coString)-1);
        echo $coString;

$myInputs = $_POST["count"];
        foreach ($myInputs as $eachInput) {

if ($_POST['Moonlight' . $eachInput] == 'yes') {
    $Moonlight_radio= 1;
} elseif ($_POST['Moonlight' . $eachInput] == 'no') {
    $Moonlight_radio = 0;
}

$telescopes = $_POST['noTels' . $eachInput];
$telNum = implode(", ", $telescopes);
        
$weather_array = $_POST['weather' . $eachInput];
$weather= implode(", ", $weather_array);
        
$total_time = $total_time + $_POST['Max_Exposure'][$eachInput];

if ((substr($_POST['RA'][$eachInput],0,1) == '+') || (substr($_POST['RA'][$eachInput],0,1) == '-'))
{
    $RA_hours = substr($_POST['RA'][$eachInput], 1, 2);
    $RA_min = substr($_POST['RA'][$eachInput], 4, 2);
    $RA_sec = substr($_POST['RA'][$eachInput], 7);
}
else
{
    $RA_hours = substr($_POST['RA'][$eachInput], 0, 2);
    $RA_min = substr($_POST['RA'][$eachInput], 3, 2);
    $RA_sec = substr($_POST['RA'][$eachInput], 6);
}

$RA_deg = ($RA_sec / 60);
$RA_deg = ($RA_deg + $RA_min) / 60;
$RA_deg = ($RA_deg + $RA_hours) * 15;

$RA_deg = round($RA_deg, 6);

if (substr($_POST['RA'][$eachInput],0,1) == '+')
{
$RA_deg = '+' . $RA_deg;
} else if (substr($_POST['RA'][$eachInput],0,1) == '-')
{
$RA_deg = '-' . $RA_deg;
}

if ((substr($_POST['Dec'][$eachInput],0,1) == '+') || (substr($_POST['Dec'][$eachInput],0,1) == '-'))
{
$Dec_hours = substr($_POST['Dec'][$eachInput], 1, 2);
$Dec_min = substr($_POST['Dec'][$eachInput], 4, 2);
$Dec_sec = substr($_POST['Dec'][$eachInput], 7);
}
else
{
$Dec_hours = substr($_POST['Dec'][$eachInput], 0, 2);
$Dec_min = substr($_POST['Dec'][$eachInput], 3, 2);
$Dec_sec = substr($_POST['Dec'][$eachInput], 6);
}

$Dec_deg = ($Dec_sec / 60);
$Dec_deg = ($Dec_deg + $Dec_min) / 60;
$Dec_deg = ($Dec_deg + $Dec_hours);

$Dec_deg = round($Dec_deg, 6);

if (substr($_POST['Dec'][$eachInput],0,1) == '+')
{
$Dec_deg = '+' . $Dec_deg;
} else if (substr($_POST['Dec'][$eachInput],0,1) == '-')
{
$Dec_deg = '-' . $Dec_deg;
}

//Insert new data into table
$db->query('INSERT INTO tblObserving_Proposals (proposal_id, cycle, working_group, themes, multi_year, title, abstract, PI_first, PI_last, PI_email, PI_institution, coPI, Fermi, analyzer, mw, mw_info, thesis, thesis_info, opportunity, trigger_cond, trigger_ratepyr, min_obshrsptrigger, source, RA_deg, decl_deg, RA, decl, min_elev, max_exposure, min_exposure, obs_mode, obs_mode_info, noTels, moonlight, weather, begin_obs, end_obs, comments)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            Array($proposal_id, CYCLE, $_POST['working_group'], $themes, $multi_year, $_POST['title'], $_POST['Abstract'], $_POST['PI_first'], $_POST['PI_last'], $_POST['PI_email'], $_POST['PI_institution'], $coString, $Fermi, $_POST['analysis'], $Mw_radio,$_POST['mw'], $Thesis_radio, $_POST['thesis'], $opportunity_radio, $_POST['trigger_cond'], $_POST['trigger_ratepyr'], $_POST['min_obshrsptrigger'], $_POST['Source'][$eachInput], $RA_deg, $Dec_deg, $_POST['RA'][$eachInput], $_POST['Dec'][$eachInput], $_POST['Min_Elev'][$eachInput], $_POST['Max_Exposure'][$eachInput], $_POST['Min_Exposure'][$eachInput], $_POST['menu'][$eachInput], $_POST['Obs_mode' . $eachInput][0], $telNum, $Moonlight_radio, $weather, $_POST['Begin_Obs'][$eachInput], $_POST['End_Obs'][$eachInput], $_POST['comments'][$eachInput]));
                }
//Tell the user that we added new data
print '<font size=3>You have submitted your proposal successfully! You will be receiving a notification by email in the next minutes. This proposal is number ' . $proposal_id . '. Keep this number for your records.</font>';
}
else
{

print <<<HTMLBLOCK
  <html>
  <title> VERITAS - Barnard College, Columbia University </title>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

      <meta name="author" content="Created by Interspire // www.interspire.com" />

        <link rel="stylesheet" type="text/css" href="styles2.css" />

</head>
        
        <div id="wrap">
        <div id="nav"> <span class="class1">  <center> <font size="3"> <a href="http://www.astro.columbia.edu/veritas/index.html"> Home </a> | <a href="http://www.astro.columbia.edu/veritas/people.html"> People </a> | <a href="http://www.astro.columbia.edu/veritas/research.html"> Research </a> | <a href="http://www.astro.columbia.edu/veritas/meetings.html"> Meetings </a> | <a href="http://www.astro.columbia.edu/veritas/pictures.html"> Pictures </a> | <a href="http://www.astro.columbia.edu/veritas/links.html"> Useful Links </a></center> </font> </span> </div>

        <div id="main">
        <img align="left" hspace=30  src="Veritas-logo-drop-shadow.png" width="200"> 
        <br/>
        <br/>
        <br/>
        <font size="6">
        <center> The VERITAS </font> </center> </font>
        <font size="6">
        <center><font> Remote Proposal System  </font></center>
        <center> (VERPS)</font></center>
        <hr size="4" width="80%" color="black">
        <font size="5">
        <center> Call for proposals 2012-2013 </font> </center> </font> 
        <hr size="4" width="80%" color="black">
	
        <br/> <center>
  <font size="4" color="red"> <blink> Deadline: Friday September 7th 2012 at 5:00 pm EST </blink> </center> </font>
        <br/>
        <br/> <center>
        <font size="4">
        <a href="veritasRPSHelp.html" target='_blank'> General Instructions </a> </font></center>
        <br/>
        <br/> <center>
        <font size="4">
        <a href="proposals/proposals.html" target='_blank'> Other Years Proposals </a> </font></center>
        <br/>
        <br/>

        <hr size="1" align="center" width="100%" color="grey">
        
</html>
HTMLBLOCK;

print '<font size=3>You have already submitted your proposal.</font>';
//print "SUBMIT_ALL == FALSE";
}

?>

<?php

/*
$titles = $_POST['title'];
$working_group = $_POST['working_group'];
$input = $eachInput + 1;
$email = $_POST['PI_email'];


$mail_body=<<<_TXT_
The VERITAS proposal described below has been received by the VERITAS RPS. Thanks for your participation! 
Proposal ID: $proposal_id
Title: $titles
Science Working Group: $working_group
Number of Targets: $input
Total Time: $total_time
_TXT_;
//send the email
$mail_sent = @mail($email,'VERITAS RPS Receipt', $mail_body);
//if  message is sent successfully do nothing. Otherwise print "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";
*/

function read()
{

    global $proposal_id;

    if ((($_FILES["file_tar"]["error"]) == 4) || (empty($_FILES["file_tar"]["error"])))
    {
    }
    else 
    {
        //echo $_FILES["file_tar"]["error"];
        if ($_FILES["file_tar"]["type"] == "text/plain") 
        {
        if ($_FILES["file_tar"]["error"] > 0)
          {
          echo "Error: " . $_FILES["file_tar"]["error"] . "<br />";
          }
        else
          {
      //    echo "Upload: " . $_FILES["file_tar"]["name"] . "<br />";
     //     echo "Type: " . $_FILES["file_tar"]["type"] . "<br />";
     //     echo "Size: " . ($_FILES["file_tar"]["size"] / 1024) . " Kb<br />";
     //     echo "Stored in: " . $_FILES["file_tar"]["tmp_name"];
          }

          $Upload = $_FILES["file_tar"]["name"];
          $Type = $_FILES["file_tar"]["type"];
          $Size = ($_FILES["file_tar"]["size"] / 1024);
          $Stored = $_FILES["file_tar"]["tmp_name"];

        $target_path = "uploads/";

        $target_path = $target_path . basename( $_FILES['file_tar']['name']); 


        if(move_uploaded_file($_FILES['file_tar']['tmp_name'], $target_path)) {
            //echo "<br />The file ".  basename( $_FILES['file_tar']['name']). 
           // " has been uploaded<br />";
        } else{
            echo "There was an error uploading the file, please try again! (1)";
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


        $ourFileName = $target_path;
        $fh = fopen($ourFileName, 'r') or die("Can't open file");
            $i = 0;
        while (! feof($fh)) {
            if ($s = fgets($fh)) {
            $words = preg_split('/\s+/',$s,-1,PREG_SPLIT_NO_EMPTY);
            $_POST['count'][] = $i;
            $_POST['Source'][] = $words[0];
            $_POST['RA'][] = $words[1];
            $_POST['Dec'][] = $words[2];
            $_POST['Min_Elev'][] = $words[3];
            $_POST['Max_Exposure'][] = $words[4];
            $_POST['Min_Exposure'][] = $words[5];
            $_POST['menu'][] = $words[6];
            $_POST['Obs_mode'][] = $words[7];
            $_POST['Moonlight'][] = $words[8];
            $_POST['Begin_Obs'][] = $words[9];
            $_POST['End_Obs'][] = $words[10];



    /*
            print $name;
            print $RA;
            print $Dec;
            print $Min_Elev;
            print $Req_Exp;
            print $Min_Exp;
            print $Obs_mod;
            print $Obs_opt;
            print $Moonlight;
            print $Obs_from;
            print $Obs_to;
            print "<br />";
            print "<br />";
            print $i;
            print "<br />";
            print "<br />";
           // print_r($_POST);
    */
            $i++;

        }
        }

        fclose($fh);
        }
        else
        {
        echo "Invalid file";
        echo "test";
        }
        //process_form();
       // print '$_POST: ';
      //  print_r($_POST);
    }


       //print '$_POST: ';
      // print_r($_POST);

    ///////////////////------------------------------------------------
    if (($_FILES["file"]["error"]) == 4)
    {
    }
    else {
      if (($_FILES["file"]["size"] < 10000000))// && ($_FILES['file']['type'] == "application/pdf")) 
    {
    if ($_FILES["file"]["error"] > 0)
      {
      echo "Error: " . $_FILES["file"]["error"] . "<br />";
      }
    else
      {
    //  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
     // echo "Type: " . $_FILES["file"]["type"] . "<br />";
     // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
     // echo "Stored in: " . $_FILES["file"]["tmp_name"];
      }

      $Upload = $_FILES["file"]["name"];
      $Type = $_FILES["file"]["type"];
      $Size = ($_FILES["file"]["size"] / 1024);
      $Stored = $_FILES["file"]["tmp_name"];

    //echo "THIS IS PROPOSAL" . $proposal_id;
    $target_path = "uploads/";
    $newname = $_POST['PI_last'] . "_" . $proposal_id . ".pdf";

    $target_path = $target_path . $newname;


    //basename( $_FILES['file']['name']); 


    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
        //echo "<br />The file ". $newname . " has been uploaded<br />";
    } else{
        echo "<br />There was an error uploading the file, please try again! (2)";
    }
        $ourFileName = $target_path;
        //$fh = fopen($ourFileName, 'r') or die("Can't open file");

    $fp = @fopen(preg_replace("/\[(.*?)\]/i", "",$ourFileName),"r");
    $max=0;
    while(!feof($fp)) 
    {
        $line = fgets($fp,255);
        if (preg_match('/\/Count [0-9]+/', $line, $matches))
        {
            preg_match('/[0-9]+/',$matches[0], $matches2);
            if ($max<$matches2[0]) $max=$matches2[0];
            
        }
    }
    fclose($fp);


    /*
            if($max==0){
                    $im = new imagick($filepath);
                    $max=$im->getNumberImages();
            }
     */       
            
            //echo "Max: " . $max;


    //fclose($fh);
    }
    else
    {
        echo "File size too large";
    }
    }

    

    // $oldcoverfile= "/var/www/html/VERPS/uploads/temp_covers/" . $_POST['PI_last'] . "_" .$proposal_id . "_cover.pdf";
    $oldcoverfile= "/var/www/html/VERPS/VERPS_TEST_2012/uploads/temp_covers/" . $_POST['PI_last'] . "_cover_temp.pdf";
    $newcoverfile="/var/www/html/VERPS/VERPS_TEST_2012/uploads/" . $_POST['PI_last'] . "_" .$proposal_id . "_cover.pdf";
    rename($oldcoverfile, $newcoverfile);

    $fullfile="/var/www/html/VERPS/VERPS_TEST_2012/uploads/" . $_POST['PI_last'] . "_" . $proposal_id . "_full.pdf";
    $pdfjustif="/var/www/html/VERPS/VERPS_TEST_2012/uploads/" . $_POST['PI_last'] . "_" . $proposal_id . ".pdf";
    $filename=$_POST['PI_last'] . "_" . $proposal_id . ".pdf";

    // $cmd = "/usr/local/bin/pdftk $newcoverfile $pdfjustif cat output $fullfile";
    $cmd = "pdftk $newcoverfile $pdfjustif cat output $fullfile";
    exec($cmd, &$execarray, &$execstatus);

/*
$titles  = $_POST['title'];
$working_group = $_POST['working_group'];
$input = $eachInput + 1;
$email = $_POST['PI_email'];

$mail_body=<<<_TXT_
The VERITAS proposal described below has been received by the VERITAS RPS. Thanks for your participation! 
Proposal ID: $proposal_id
Title: $titles
Science Working Group: $working_group
Number of Targets: $input
Total Time: $total_time
_TXT_;
mail($email,'VERITAS RPS Receipt', $mail_body);
*/

// using PHP mailer
$to = $_POST['PI_email'];
$from = "VERPS"; 
$subject = "VERITAS RPS receipt"; 
$message = "The proposal attached in this email has been received by the VERITAS RPS. Thanks for your participation! \n\n The VERITAS RPS Team";

$mail = new PHPMailer();
$mail->IsMail();

$mail->FromName="VERPS Team";
$mail->AddReplyTo="ealiu@astro.columbia.edu";

$mail->AddAddress($to);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAttachment($fullfile, $filename);

if(!$mail->Send())
{
   echo "Error sending: " . $mail->ErrorInfo;;
}
else
{
  // echo "Letter is sent";
}

}
?>
