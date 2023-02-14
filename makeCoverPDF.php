<?php

require_once 'DB.php';
//define('FPDF_FONTPATH','/Users/ealiu/Sites/fpdf17/font/');
define('FPDF_FONTPATH','/var/www/html/VERPS/VERPS_TEST_2012/fpdf17/font/');
require('fpdf17/fpdf.php');

//Connect to the database - MAMP
    // -- MAMP on our macosx computers 
    // $db = DB::connect('mysql://root:root@localhost/VERITAS_Proposal');
    // -- veritas offline database 
    $db = DB::connect('');
    if (DB::isError($db)) {die ("Can't connect: " . $db->getMessage());}
    //Set up automatic error handling
    $db->setErrorHandling(PEAR_ERROR_DIE);

//Access the global variable $db inside this function
global $db;

class PDF extends FPDF
{
 // Page header
 function Header()
 {
   // Position at 1.5 cm from bottom
    $this->SetY(25);
    // Logo
    $this->Image('Veritas-logo-drop-shadow.png',10,22,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
   $this->Cell(30,15,'Proposal for VERITAS - 2012/2013 (Cycle 6)',0,0,'C');
    // Project ID

    //$id = & $db->getOne('SELECT proposal_id FROM users');
    //echo "$id\n";
  
   // $this->SetFont('Arial','B',30);	
   // $this->Cell(150,5,'100',0,0,'C');
    // Line break
    $this->Ln(20);
 }

 // Page footer
 function Footer()
 {
    // Position at 1.5 cm from bottom
    $this->SetY(-20);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
 }

 // Simple table
 function BasicTable($header)
 {
    // Header
    foreach($header as $col)
        $this->Cell(190,7,$col,1);
    $this->Ln();
 }

 // Abstract table
 function AbstractTable($header)
 {
    // Header
    foreach($header as $col)
        $this->Multicell(190,10,$col,1);
    $this->Ln();
 }
 // Comments table
 function CommentsTable($header)
 {
    // Header
    foreach($header as $col)
        $this->Multicell(190,5,$col,0);
    // $this->Ln();
 }

 // Better table
 function TargetTable($header)
 {
    // Column widths
   //   $w = array(10, 30, 30, 30, 15, 20, 20, 20, 20, 15, 15, 15, 40);
   $w = array(5, 25, 20, 20, 10, 20, 20, 20, 10, 10, 10, 10, 10);
   //$w = array(10, 30, 20, 20, 10, 20, 20, 10, 10, 10);
    // Header
    for($i=0;$i<count($header);$i++)
      $this->Cell($w[$i],10,$header[$i],1,0,'C');
     $this->Ln();

    // Closing line
  //  $this->Cell(array_sum($w),0,'','T');
 }

} // ends class PDF


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',13);

$pdf->AddPage();


//print_r($_POST);

//// copied code from readFile() - this has to be better coded


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

if ($_POST['opportunity_radio'] == 'yes') {
    $opportunity_radio = 'Y';
} elseif ($_POST['opportunity_radio'] == 'no') {
    $opportunity_radio = 'N';
}

$themes_array = $_POST["themes"];
        foreach ($themes_array as $eachTheme) {
        $themes .= $eachTheme;
        $themes .= ',';
        }

        $themes = substr($themes, 0, strlen($themes)-1);

$coInputs = $_POST["coLast"];
        foreach ($coInputs as $eachcoInput) {
        $coLast .= $eachcoInput;
        $coLast .= ',';
        }

        $coLast = substr($coLast, 0, strlen($coLast)-1);

////


$pdf->SetFont('Arial','',9);


$header = array('Principal Investigator:    '.$_POST['PI_first'].' '.$_POST['PI_last']);
$pdf->BasicTable($header);

$header = array('Institution:               '.$_POST['PI_institution']);
$pdf->BasicTable($header);

$header = array('Email:                     '.$_POST['PI_email']);
$pdf->BasicTable($header);

$header = array('Co-I:                      '.$coLast);
$pdf->BasicTable($header);


///////////////////////////

$header = array('Title:   '.$_POST['title']);
$pdf->BasicTable($header);

$header = array('Short Abstract:   '.$_POST['Abstract']);
$pdf->AbstractTable($header);

///////////////////////////

$header = array('Science Working Group:      '.$_POST['working_group'] );
$pdf->BasicTable($header);

$header = array('Fundamental points addressed in the proposal:  '. $themes);
$pdf->BasicTable($header);

$header = array('Is this a multi-year project?            '.$_POST['multi_year']);
$pdf->BasicTable($header);

$header = array('Is this part of a Fermi-GI proposal?    '.$_POST['Fermi']);
$pdf->BasicTable($header);

$header = array('Target of opportunity observations?:                               '.$_POST['opportunity_radio']);
$pdf->BasicTable($header);

$header = array('Multiwavelength requirement:              '.$_POST['mw_radio'] ."  ". $_POST['mw']);
$pdf->BasicTable($header);

$header = array('Thesis:                                 '.$_POST['thesis_radio']);
$pdf->BasicTable($header);

$header = array('Analyzers:                               '.$_POST['analysis']);
$pdf->AbstractTable($header);

//$header = array('Target of opportunity observations?:                               '.$_POST['opportunity_radio'] ."\nTrigger condition: ". $_POST['trigger_cond'] .". \n". $_POST['trigger_ratepyr'] ." triggers per year anticipated.\n Minimum ". $_POST['min_obshrsptrigger'] ." hours of observations per trigger.");
//$pdf->AbstractTable($header);

/////////// Target List
#$pdf->AddPage("L");
//$pdf->AddPage();

//$header = array('Principal Investigator:    '.$_POST['PI_first'].' '.$_POST['PI_last']);
//$pdf->BasicTable($header);

//$header = array('Title:   '.$_POST['title']);
//$pdf->BasicTable($header);

$pdf->SetFont('Arial','',7);

//$header = array('No', 'Target Name', 'R.A.', 'Dec', 'El.', 'ReqExp', 'MinExp.', 'ObsMode', 'ObsMode', 'NTels', 'Moon', 'Sky');
$header = array('No', 'Target Name', 'R.A.', 'Dec', 'El', 'Tmax (Tmin)', 'ObsMode', 'Too (cond.)', 'Trig/yr' , 'Tmin/Trig','NTels', 'Moon', 'Sky');
//$header = array('No', 'Target Name', 'R.A.', 'Dec', 'El', 'Tmax (Tmin)', 'ObsMode','NTels', 'Moon', 'Sky');
$pdf->TargetTable($header);

//$var = '1';
//$header = array($var,$var,$var,$var,$var,$var,$var,$var,$var,$var,$var,$var);
//$pdf->TargetTable($header);

/// loop for each target
$myInputs = $_POST['count'];
//echo $myInputs;
//echo 'Hello';

foreach ($myInputs as $eachInput) {


if ($_POST['Moonlight' . $eachInput] == 'yes') {
    $Moonlight_radio= 'Y';
} elseif ($_POST['Moonlight' . $eachInput] == 'no') {
    $Moonlight_radio = 'N';
}

$telescopes = $_POST['noTels' . $eachInput];
$telNum = implode(", ", $telescopes);

//echo "TEST: ";
//echo $telNum;

$weather_array = $_POST['weather' . $eachInput];
$weather= implode(", ", $weather_array);

// $header = array($eachInput, $_POST['Source'][$eachInput], $_POST['RA'][$eachInput], $_POST['Dec'][$eachInput],$_POST['Min_Elev'][$eachInput],$_POST['Max_Exposure'][$eachInput], $_POST['Min_Exposure'][$eachInput], $_POST['menu'][$eachInput]." ".$_POST['Obs_mode'] . $eachInput][0] , $_POST['noTels' . $eachInput], $_POST['Moonlight' . $eachInput], $_POST['weather' . $eachInput], $_POST['comments'][$eachInput]);
$var=1;
// $header = array($eachInput+$var,$_POST['Source'][$eachInput],$_POST['RA'][$eachInput],$_POST['Dec'][$eachInput],$_POST['Min_Elev'][$eachInput],$_POST['Max_Exposure'][$eachInput],$_POST['Min_Exposure'][$eachInput],$_POST['menu'][$eachInput],$_POST['Obs_mode' . $eachInput][0], $telNum, $Moonlight_radio, $weather, $_POST['comments'][$eachInput]);
 $header = array($eachInput+$var,$_POST['Source'][$eachInput],$_POST['RA'][$eachInput],$_POST['Dec'][$eachInput],$_POST['Min_Elev'][$eachInput],$_POST['Max_Exposure'][$eachInput]."(".$_POST['Min_Exposure'][$eachInput].")",$_POST['menu'][$eachInput]."(".$_POST['Obs_mode' . $eachInput][0].")" , $opportunity_radio ."(".$_POST['trigger_cond'].")", $_POST['trigger_ratepyr'], $_POST['min_obshrsptrigger'], $telNum, $Moonlight_radio, $weather);
$pdf->TargetTable($header);
//$header = array('Comments:                     '.$_POST['comments'][$eachInput]);
//$pdf->AbstractTable($header);
 
}

///////////////////////////////////
// adding comments for each target
//////////////////////////////////
foreach ($myInputs as $eachInput) {
//$header = array('Comments:                     '.$_POST['comments'][$eachInput]);

if($_POST['comments'][$eachInput])
  {
    $header = array($eachInput+1 .') '. $_POST['comments'][$eachInput]);
    $pdf->CommentsTable($header);
  }
}


////////////////// this is also copied from readFile()
//Connect to the database - MAMP
//$db = DB::connect('mysql://root:root@localhost/VERITAS_Proposal');
$db = DB::connect('');
if (DB::isError($db)) {die ("Can't connect: " . $db->getMessage());}
//Set up automatic error handling
$db->setErrorHandling(PEAR_ERROR_DIE);

//Access the global variable $db inside this function
global $db;


//Get a unique ID for each user
//print_r($_POST);
//if(isset($_COOKIE['proposal_id']))
//{
//$proposal_id = $_COOKIE['proposal_id'];
//}
//else
//{
//$proposal_id = $db->nextID('tblObserving_Proposals');
//$proposal_id = $db->getOne('SELECT MAX(proposal_id) FROM tblObserving_Proposals')+1;
// if($proposal_id === NULL)
// {
// $proposal_id = 1;
//  }
//}

//$coverfile = "/var/www/html/VERPS/uploads/temp_covers/" . $_POST['PI_last'] . "_" .$proposal_id . "_cover.pdf";
$coverfile = "/var/www/html/VERPS/VERPS_TEST_2012/uploads/temp_covers/" . $_POST['PI_last'] . "_cover_temp.pdf";
//echo $coverfile ;

$coverfile_short = $_POST['PI_last'] . "_cover_temp.pdf";
$pdf->Output($coverfile, "f"); // save to disk, in a temporary file & directory
$pdf->Output($coverfile_short, "i");  // send it to the browser and will be saved with the given name when selecting "Save as"

?>
