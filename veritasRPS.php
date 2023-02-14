<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javafunctions.js"></script>


<title> VERITAS - Barnard College, Columbia University </title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta name="author" content="Created by Interspire // www.interspire.com" />

<link rel="stylesheet" type="text/css" href="styles2.css" />

<?php
require 'fpdf17/fpdf.php'; //contains functions for creating pdf
require 'functions.php'; //contains functions for creating html elements
//require 'readFile.php'; //reads textfiles and submits whole form
require 'addInput_frame.php'; //this file creates new target forms 


?>
</head>

<body>

<div id="wrap">
<div id="nav"> <span class="class1">  <center> <font size="3"> <a href="http://www.astro.columbia.edu/veritas/index.html"> Home </a> | <a href="http://www.astro.columbia.edu/veritas/people.html"> People </a> | <a href="http://www.astro.columbia.edu/veritas/research.html"> Research </a> | <a href="http://www.astro.columbia.edu/veritas/meetings.html"> Meetings </a> | <a href="http://www.astro.columbia.edu/veritas/pictures.html"> Pictures </a> | <a href="http://www.astro.columbia.edu/veritas/links.html"> Useful Links </a></center> </font> </span> </div>

<div id="main">
<img align="left" hspace=30  src="Veritas-logo-drop-shadow.png" width="200"> 
<br/>
<br/>
<br/>
<br/>
<font size="6">
<center> The VERITAS </font> </center> </font>
<font size="6">
<center><font> Remote Proposal System  </font></center>
<center><font> (VERPS) </font></center>
</font>
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

<?php
//Beginning of PHP code
//-----------------------------------------------------------------------------------------------------------


$errors = array(); 
$groups = array( 'Select' => 'Select one', 
                 'Gamma' => 'Gamma Ray Bursts',
                 'ASPEN' => 'ASPEN',
                 'Blazar' => 'Blazar',
                 'Matter' => 'Dark Matter Physics',
                 'Galactic' => 'Galactic Sources',
                 'Engineer' => 'Engineering',
                 'Calibration' => 'Calibration',
                 'Other');
//define("CYCLE", 6);

//-------------------------------------------------------------------------------------------------------------

//asdfsdf

//--------MAIN FORM-------------------------------------------------------------------------------------------

//Jump out of PHP mode to make displaying all HTML tags easier
?>
<div id="loading">  
<img src="ajax-loader.gif" alt="Loading..." />
</div>  

        <hr size="1" align="center" width="100%" color="grey">

<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxtimeFunction(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
        //Creates a function that checks whether deadline has been reached
        //if deadline has been reached nothing is saved in window.timer
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
                        window.timer = ajaxRequest.responseText;
		}
	}
        //defines where the function gets the data from: serverTime.php
	ajaxRequest.open("GET", "serverTime.php", true);
	ajaxRequest.send(null); 
}
//every 500ms function gets data 
setInterval("ajaxtimeFunction()",500);


//-->
</script>


<div id='form0'>
<center><input class='new_proposal' type='button' id='new_proposal' value='New Proposal' >
<input class='saved' type='button' id='saved1' value='Continue Saved Proposal' >
<input type='button' class='revise' id='revise' value='Revise submitted Proposal'></center>
</div>




        <hr size="1" align="center" width="100%" color="grey">
If you have any comments, email me: <br \>
<b> ajl2174 at columbia.edu</b>
        <div id="footer"> <span class="class2">  <center> <font size="3"> <a href="http://www.astro.columbia.edu/veritas/index.html"> Home </a> | <a href="http://www.astro.columbia.edu/veritas/people.html"> People </a> | <a href="http://www.astro.columbia.edu/veritas/research.html"> Research </a>| <a href="http://www.astro.columbia.edu/veritas/meetings.html"> Meetings </a> | <a href="http://www.astro.columbia.edu/veritas/pictures.html"> Pictures </a> | <a href="http://www.astro.columbia.edu/veritas/links.html"> Useful Links </a> </font> </span> </div>
</div>
</div>
</body>

</html>
