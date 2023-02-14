<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javafunctions.js"></script>
<?php

$send=0;
require 'functions.php'; //contains functions for creating html elements
//require 'readFile.php'; //reads textfiles and submits whole form
require 'addInput_frame.php'; //this file creates new target forms 

//require_once 'serverTime.php';


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
//-------------------------------------------------------------------------------------------------------------

//process_form();

//echo print_r($GLOBALS['savedForm']);
//echo print_r($GLOBALS);

// <tr><td><h2><img src="closed.png" id="cover_image" alt="" onmousedown="cover_toggleDiv('cover_div');"/><a onmousedown="cover_toggleDiv('cover_div');">Cover</a> <font size=2> - <a href="veritasRPSHelp.html#cover" target='_blank'>help</a></font></h2></td></tr>
//puts in saved cookie data into form if cookies exist
if ($_COOKIE) 
{
    $defaults = $_COOKIE;

}
else
{
    $defaults = array( 'Abstract' => 'Enter Comments Here',
                       'Justification' => 'Enter Comments Here');
}

?>
<form id="main_form" method="post"
enctype="multipart/form-data">

<div id='form_main'>
<table>
<tr><td><h2><img src="closed.png" id="cover_image" alt=""/><a id="Cover_text">Cover</a> <font size=2> - <a href="veritasRPSHelp.html#cover" target='_blank'>help</a></font></h2></td></tr>

</table>
<div id="cover_div" style="display:none">

<table>
<tr><td colspan="2"> Science Working Group </td></tr>
<td colspan="2">
<?php input_select ('working_group', $defaults, $GLOBALS['groups']); ?> <font color=red><span id="working_group_span" style="border: 0px solid red;display:none"><b id='working_group_msg'></b></span></font></td></tr>
</table>
<table>
<tr><td> Which of the four major themes of scientific exploration endorsed by the ESAC does this proposal address? 
</tr></td>

<tr><td>
<input type="checkbox" name="themes[]" value='1' id="themes1">1. Particle Physics and Fundamental Laws
<input type="checkbox" name="themes[]" value='2' id="themes2">2. Cosmology
<input type="checkbox" name="themes[]" value='3' id="themes3">3. Black Holes
<input type="checkbox" name="themes[]" value='4' id="themes4">4. Galactic Tevatrons and Pevatrons

<font color=red><span id="themes_span" style="border: 0px solid red;display:none"><b id='themes_msg'></b></span></font></td></tr>

</tr></td>
<tr><td>Is this a Multi-Year Project?  </td></tr>
<tr><td><?php input_radiocheck('radio','multi_year', $defaults, 'yes', 'multi_year1'); ?> yes 
<?php input_radiocheck('radio','multi_year', $defaults, 'no', 'multi_year2'); ?> no 
<font color=red><span id="multi_year_span" style="border: 0px solid red;display:none"><b id='multi_year_msg'></b></span></font></td></tr>
</table>
<table>
<tr><td > Title: </td>
<td><?php input_text ("title",$defaults, 100, 100); ?> <font size="2">(max char: 40) </font> <font color=red> <span id="title_span" style="border: 0px solid red;display:none"><b id='title_msg'></b></span></font></td></tr>
</table>
<table>
<tr><td colspan="2">Abstract: <font size="2">(max char: 400) </font></td></tr>
<tr><td>
<font color=red><span id="abstract_span" style="border: 0px solid red;display:none"><b id='Abstract_msg'></b></span></font>
</td></tr>
<tr><td><?php input_textarea("Abstract", $defaults, "cleartextarea(this)", 400); ?>
</script>
</td></tr>

<tr><td colspan="2"> Principal Investigator</td></tr>
</table>

<script language='javascript'>
//window.onload=get_themes();
//function get_themes()
//{
    //alert(getCookie('themes1'));
    //alert(parent.document.getElementById('themes1'));


    //PDF STUFF?
    if (getCookie('themes1') == 'false')
    {
       // alert('false');
        document.getElementById('themes1').checked = false;
    }
    else if (getCookie('themes1') == 'true')
    {
        //alert('true');
        document.getElementById('themes1').checked = true;
    }

    if (getCookie('themes2') == 'false')
    {
        //alert('false');
        document.getElementById('themes2').checked = false;
    }
    else if (getCookie('themes2') == 'true')
    {
        //alert('true');
        document.getElementById('themes2').checked = true;
    }

    if (getCookie('themes3') == 'false')
    {
        //alert('false');
        document.getElementById('themes3').checked = false;
    }
    else if (getCookie('themes3') == 'true')
    {
        //alert('true');
        document.getElementById('themes3').checked = true;
    }

    if (getCookie('themes4') == 'false')
    {
        //alert('false');
        document.getElementById('themes4').checked = false;
    }
    else if (getCookie('themes4') == 'true')
    {
        //alert('true');
        document.getElementById('themes4').checked = true;
    }


   // alert('hi');
//}
function getSaved(data,id)
{
    while (window.saved_form[0].indexOf(data) == -1)
    {
        saved_form.splice(0,1);
    }

    document.getElementById(id).value = trim(window.saved_form[0].substring(data.length + window.saved_form[0].indexOf(data)));
    saved_form.splice(0,1);
    while((window.saved_form[0] !== undefined) && (trim(window.saved_form[0]) != ""))
    {
    document.getElementById(id).value += " " + trim(window.saved_form[0]);
    saved_form.splice(0,1);
    }

}


function getSavedChecked(data,id1,id2)
{

    while (window.saved_form[0].indexOf(data) == -1)
    {
        saved_form.splice(0,1);
    }

    if (trim(window.saved_form[0].substring(data.length + window.saved_form[0].indexOf(data)))== "yes")
    {
        document.getElementById(id1).checked = true;
    }
    else if (trim(window.saved_form[0].substring(data.length + window.saved_form[0].indexOf(data)))== "no")
    {
        document.getElementById(id2).checked = true;
    }
    else 
    {
        alert("ERROR CHECKED");
    }
        saved_form.splice(0,1);

}

function opportunity(){

        var trigger_cond_value = "<?= $defaults['trigger_cond'] ?>";
        var trigger_ratepyr_value = "<?= $defaults['trigger_ratepyr'] ?>";
        var min_obshrsptrigger_value = "<?= $defaults['min_obshrsptrigger'] ?>";

				//alert("opportunity should open");


            if (document.getElementById('opportunity1').checked)
            {
                if (document.getElementById('opportunity_text') == null)
                {

                    var newdiv = document.createElement('div');
                    newdiv.setAttribute('id', 'opportunity_text');
                
                    newdiv.innerHTML = "Trigger condition: " + "<input type='text' id='trigger_cond' value='" + trigger_cond_value + "' name='trigger_cond' size='40'>" ;
                    newdiv.innerHTML += " <font color=red><span id='trigger_cond_span' style='border: 0px solid red;'><b id='trigger_cond_msg'></b></span></font> <br />";
                    newdiv.innerHTML += "Anticipated rate of triggers per year: " + "<input type='text' id='trigger_ratepyr' value='" + trigger_ratepyr_value + "' name='trigger_ratepyr' size='40'>" ;
                    newdiv.innerHTML += " <font color=red><span id='trigger_ratepyr_span' style='border: 0px solid red;'><b id='trigger_ratepyr_msg'></b></span></font> <br />";
                    newdiv.innerHTML += "Minimum observation-hours per trigger: " + "<input type='text' id='min_obshrsptrigger' value='" + min_obshrsptrigger_value + "' name='min_obshrsptrigger' size='40'>" ;
                    newdiv.innerHTML += " <font color=red><span id='min_obshrsptrigger_span' style='border: 0px solid red;'><b id='min_obshrsptrigger_msg'></b></span></font> <br />";
                    
                    document.getElementById('opportunity_check').appendChild(newdiv);
                }
            }
    } 

function opportunity_remove() 
{
            if (document.getElementById('opportunity_text'))
            {
                document.getElementById('opportunity_check').removeChild(document.getElementById('opportunity_text'));
            }

}
function thesis(){

        var thesis_value = "<?= $defaults['thesis'] ?>";

            if (document.getElementById('thesis1').checked) 
            {
                if (document.getElementById('thesis_text') == null)
                {

                    var newdiv = document.createElement('div');
                    newdiv.setAttribute('id', 'thesis_text');
                
                    newdiv.innerHTML = "Whom: " + "<input type='text' id='thesis' value='" + thesis_value + "' name='thesis' size='40'>";
                    newdiv.innerHTML += " <font color=red><span id='thesis_span' style='border: 0px solid red;'><b id='thesis_msg'></b></span></font>";
                    
                    document.getElementById('thesis_check').appendChild(newdiv);
                }
            }
    } 

function thesis_remove() 
{
            if (document.getElementById('thesis_text'))
            {
                document.getElementById('thesis_check').removeChild(document.getElementById('thesis_text'));
            }

}

function getMultiSaved(data, data1,data2, data3, data4, id1,id2,id3,id4)
{
    var dataArray = new Array();
    var idArray = new Array();
    var dataHitArray = 0;
    dataArray[0] = data1;
    dataArray[1] = data2;
    dataArray[2] = data3;
    dataArray[3] = data4;
    idArray[0] = id1;
    idArray[1] = id2;
    idArray[2] = id3;
    idArray[3] = id4;

    while(window.saved_form[0].indexOf(data) == -1)
    {

        saved_form.splice(0,1);
    }

    for(i=0;i<dataArray.length;i++)
    {
        if (window.saved_form[0].indexOf(dataArray[i])!= -1)
        {
            document.getElementById(idArray[i]).checked = true;
        }
        
    }

        saved_form.splice(0,1);
}

if(window.saved_form)
{
    var savedTargets = 0;

    getSaved("Science Working Group: ",'working_group');
    getMultiSaved("Theme(s): ", "1", "2", "3", "4", "themes1", "themes2", "themes3", "themes4");
    getSavedChecked("Multi-Year Project?: ", "multi_year1", "multi_year2");
    getSaved("Title: ","title");
    getSaved("Abstract: ", "Abstract");
    getSaved("First name: ", "PI_first");
    getSaved("Last name: ", "PI_last");
    getSaved("Email: ", "PI_email");
    getSaved("Institution: ", "PI_institution");
    getSavedChecked("Fermi-GI award? ", "Fermi1", "Fermi2");
    getSaved("Who will analyze and when: ", "analysis");
    getSavedChecked("Multiwavelength requirement: ", "mw1", "mw2");
    if (document.getElementById("mw1").checked == true)
    {
    }
    getSavedChecked("Thesis: ", "thesis1", "thesis2");
    if (document.getElementById("thesis1").checked == true)
    {
        thesis();
        getSaved("Whom: ", "thesis");
    }
    if (document.getElementById("opportunity1").checked == true)
    {
        opportunity();
        getSaved("Trigger condition: ", "trigger_cond");
        getSaved("Anticipated rate of triggers per year: ", "trigger_ratepyr");
        getSaved("Minimum observation-hours per trigger: ", "min_obshrsptrigger");
    }

    for(i=0;i<saved_form.length;i++)
    {
        if (window.saved_form[i].indexOf("Source: ") != -1)

        savedTargets++;

    }
    for (j=0;j<savedTargets;j++)
    {
        addTarget();
		//setTimeout(function(){
        getSaved("Source: ", "Source" + j);
		//alert(j);
        getSaved("RA: ", "RA" + j);
        getSaved("dec: ", "Dec" + j);
        getSaved("Minimum Elevation: ", "Min_Elev" + j);
        getSaved("Requested Exposure (hours): ", "Max_Exposure" + j);
        getSaved("Minimum Exposure (hours): ", "Min_Exposure" + j);
        getSaved("Observation Mode: ", "menu" + j);
        madeSelection();
        if (document.getElementById("menu" +j).value == "Wobble")
        {
            

        }
        else if (document.getElementById("menu" +j).value == "On/Off")
        {


        }
        getMultiSaved("No. Tels: ", "1", "2","3","4", "noTels1_" + j, "noTels2_" + j, "noTels3_" + j, "noTels4_" + j);
        getSavedChecked("Moonlight: ", "Moonlight_term1" + j, "Moonlight_term2" + j);
        getMultiSaved("Weather: ", "A", "B","C","D", "weatherA_" + j, "weatherB_" + j, "weatherC_" + j, "weatherD_" + j);
        getSaved("Observation from: ", "Begin_Obs" + j);
        getSaved("to: ", "End_Obs" + j);
		//alert(window.saved_form);
        getSaved("Comments: ", "comments" + j);
		//alert(window.saved_form);
		//}, 1000); 
		//alert(j);
	}
        window.saved_form = 0;
}
/////////////////////////////////////////////////////

var data;
//READ TEXT IN HERE
//uses jQuery to get string from read_database, splits it, and puts values into the form
$(document).ready(function(){
if (window.read_database)
{
window.data = window.read_database.split("//");
//alert(data);
setCookie('proposal_id', data[0], 7);
document.getElementById('working_group').value = data[1];
document.getElementById('title').value = data[2];
document.getElementById('PI_first').value = data[3];
document.getElementById('PI_last').value = data[4];
document.getElementById('PI_email').value = data[5];
document.getElementById('PI_institution').value = data[6];

if (data[7] == 1)
{
    document.getElementById('Fermi1').checked = true;
}
else if (data[7] == 0)
{
    document.getElementById('Fermi2').checked = true;
}

document.getElementById('analysis').value = data[8];

if (data[9] == 1)
{
    document.getElementById('mw1').checked = 1;
    mw();
    document.getElementById('mw').value = data[10];
}
else if (data[9] == 0)
{
    document.getElementById('mw2').checked = 1;
}

if (data[11] == 1)
{
    document.getElementById('thesis1').checked = 1;
    thesis();
    document.getElementById('thesis').value = data[12];
    
}
else if (data[11] == 0)
{
    document.getElementById('thesis2').checked = 1;
}


document.getElementById('Abstract').value = data[13];

    if (data[14].indexOf("1") != -1)
    {
        document.getElementById('themes1').checked = true;
    }    

    if (data[14].indexOf("2") != -1)
    {
        document.getElementById('themes2').checked = true;
    }    

    if (data[14].indexOf("3") != -1)
    {
        document.getElementById('themes3').checked = true;
    }    

    if (data[14].indexOf("4") != -1)
    {
        document.getElementById('themes4').checked = true;
    }    
    
    if (data[15] == 1)
    {
    document.getElementById('multi_year1').checked = true;
    }
    else if (data[15] == 0)
    {
    document.getElementById('multi_year2').checked = true;
    }

    if (data[16] == 1)
    {
    document.getElementById('opportunity1').checked = true;
	}
	toggleDiv("cover_div");
    opportunity();
	if (document.getElementById('opportunity_text'))
	{
    document.getElementById('trigger_cond').value = data[17];
    document.getElementById('trigger_ratepyr').value = data[18];
    document.getElementById('min_obshrsptrigger').value = data[19];
	}

    else if (data[16] == 0)
    {
    document.getElementById('opportunity2').checked = true;
    }

/*
var imgs=Array("closed.png", "open.png");
var cover=0;
*/
function toggleDiv(divid){

//document.getElementById("cover_image").src=imgs[++cover];
document.getElementById("cover_image").src="open.png";
/*
if (cover==1) {
cover=-1;
}

if (!imgs[cover+1]) {
cover=-1;
}
*/
//if(document.getElementById(divid).style.display == 'none')
//{
document.getElementById(divid).style.display = 'block';
window.location.hash=divid;
/*
}
else
{
document.getElementById(divid).style.display = 'none';
}
*/

}

//var data_source = data.toString();


//window.read_database.split("//");
//alert(data_source);
var temp = read_database.split("||");
//alert(temp);
temp.pop();
//alert(temp.length);
window.data_arrays = [];
for (var i = 0; i < temp.length ;i++)
{
    window.data_arrays[i] = temp[i].split("//");
    //alert(window.data_arrays[0]);
               
}
}
else if (getCookie('proposal_id'))
{
delCookie('proposal_id');
}

});

//displays the open and closed tabs
//Can I do this once for all three parts?
/*
$(document).ready(function(){
  $("#cover_image, #Cover_text").click(function(){
    $("#cover_div").toggle();
    var src = ($("#cover_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
    $("#cover_image").attr('src', src);
    window.location.hash = 'cover_div';
  });
});
*/

</script>

<div id="PI" style="border: 0px solid black; padding: 10px;"> 
<table>
<tr><td> First Name: </td>
<td><?php input_text ("PI_first", $defaults, 25); ?> <font color=red><span id="first_span" style="border: 0px solid red;display:none"><b id='First'></b></span></font></td></tr>
<tr><td> Last Name: </td>
<td><?php input_text ("PI_last", $defaults, 25); ?> <font id 'Last' color=red><span id="last_span" style="border: 0px solid red;display:none"><b id='Last'></b></span></font></td></tr>
<tr><td>  Email: </td>
<td><?php input_text ("PI_email", $defaults, 25); ?> <font color=red><span id="email_span" style="border: 0px solid red;display:none"><b id='Email'></b></span></font></td></tr>
<tr><td>  Institution:</td>
<td><?php input_text ("PI_institution", $defaults, 25); ?> <font color=red><span id="institution_span" style="border: 0px solid red;display:none"><b id='University'></b></span></font></td></tr>
</table>
</div>

<table>
No. of CoPIs: (Note: Some issues need to be fixed related to CoPIs. You just need to write their last names, the only info stored in the database up to now and you will need to write them everytime you resubmit your proposal (to be fixed) - if coPIs appear in the PDF cover, they are also stored in the DB and you are fine)
<div id="CoPI">
</div>
<input type="button" value="Add" onClick="addCoPI('CoPI');">

<tr><td colspan='2'>Is this proposal related to a Fermi-GI award?</td></tr>
<tr><td><?php input_radiocheck('radio','Fermi', $defaults, 'yes', 'Fermi1'); ?> yes 
<?php input_radiocheck('radio','Fermi', $defaults, 'no', 'Fermi2'); ?> no 
<font color=red><span id="Fermi_span" style="border: 0px solid red;display:none"><b id='Fermi_msg'></b></span></font>
</td></tr>
<tr><td>  Who will analyze data & when:</td>
<td><?php input_textarea("analysis", $defaults, "cleartextarea(this)" , 400, 4, 75); ?> <font color=red><span id="analysis_span" style="border: 0px solid red;display:none"><b id='analysis_msg'></b></span></font></td></tr>
</table>

<div id= 'mw_check'>
<table>
<tr><td colspan='2'>Multiwavelength requirement:</td></tr>

<tr><td><?php input_radiocheck('radio','mw_radio', $defaults, 'yes', 'mw1'); ?> yes
<?php input_radiocheck('radio','mw_radio', $defaults, 'no', 'mw2'); ?> no 
<font color=red><span id="mw_radio_span" style="border: 0px solid red;display:none"><b id='mw_msg'></b></span></font>
</td></tr>
</table>
<script type='text/javascript'>
//adds and removes the mw text based on whether 'yes' or 'no' is clicked
document.getElementById('mw1').onclick = mw;
document.getElementById('mw2').onclick = mw_remove;
window.onload = mw();

function mw(){
        
        var mw_value = "<?= $defaults['mw'] ?>";

        if (document.getElementById('mw1').checked)
        {
            if (document.getElementById('mw_text') == null)
            {
                var newdiv = document.createElement('div');
                newdiv.setAttribute('id', 'mw_text');

                newdiv.innerHTML = "<input type='text' id='mw' value='" + mw_value + "' name='mw' size='40'>" ;

                newdiv.innerHTML += " <font color=red><span id='mw_span' style='border: 0px solid red;display:none'><b id='mw_msg'></b></span></font>";


                document.getElementById('mw_check').appendChild(newdiv);
            }
        }
    } 

function mw_remove() {

               if (document.getElementById('mw_text')) 
               {
                   document.getElementById('mw_check').removeChild(document.getElementById('mw_text')); 

               }
    }

</script>
</div>

<div id='thesis_check'>
<table>
<tr><td colspan='2'>Thesis:</td></tr>
<tr><td><?php input_radiocheck('radio','thesis_radio', $defaults, 'yes', 'thesis1'); ?> yes
<?php input_radiocheck('radio','thesis_radio', $defaults, 'no', 'thesis2'); ?> no 
<font color=red><span id="thesis_radio_span" style="border: 0px solid red;display:none"><b id='thesis_msg'></b></span></font>
</td></tr>
</table>
<script type='text/javascript'>

//adds or removes thesis text box based on whether user clicks 'yes' or 'no'
document.getElementById('thesis1').onclick = thesis;
document.getElementById('thesis2').onclick = thesis_remove;
window.onload = thesis();

function thesis(){

        var thesis_value = "<?= $defaults['thesis'] ?>";

            if (document.getElementById('thesis1').checked) 
            {
                if (document.getElementById('thesis_text') == null)
                {

                    var newdiv = document.createElement('div');
                    newdiv.setAttribute('id', 'thesis_text');
                
                    newdiv.innerHTML = "Whom: " + "<input type='text' id='thesis' value='" + thesis_value + "' name='thesis' size='40'>";
                    newdiv.innerHTML += " <font color=red><span id='thesis_span' style='border: 0px solid red;'><b id='thesis_msg'></b></span></font>";
                    
                    document.getElementById('thesis_check').appendChild(newdiv);
                }
            }
    } 

function thesis_remove() 
{
            if (document.getElementById('thesis_text'))
            {
                document.getElementById('thesis_check').removeChild(document.getElementById('thesis_text'));
            }

}

</script>
</div>
<?php
//WORK ON THIS !!!!!!!!!!!
?>
<div id='opportunity_check'>
<table>
<tr><td colspan='2'>Target of Opportunity observations? </td></tr>
<tr><td><?php input_radiocheck('radio','opportunity_radio', $defaults, 'yes', 'opportunity1'); ?> yes
<?php input_radiocheck('radio','opportunity_radio', $defaults, 'no', 'opportunity2'); ?> no 
<font color=red><span id="opportunity_radio_span" style="border: 0px solid red;display:none"><b id='opportunity_msg'></b></span></font>
</td></tr>
</table>
<script type='text/javascript'>

//adds or removes opportunity text box based on whether user clicks 'yes' or 'no'
document.getElementById('opportunity1').onclick = opportunity;
document.getElementById('opportunity2').onclick = opportunity_remove;
window.onload = opportunity();

function opportunity(){

        var trigger_cond_value = "<?= $defaults['trigger_cond'] ?>";
        var trigger_ratepyr_value = "<?= $defaults['trigger_ratepyr'] ?>";
        var min_obshrsptrigger_value = "<?= $defaults['min_obshrsptrigger'] ?>";


            if (document.getElementById('opportunity1').checked)
            {
                if (document.getElementById('opportunity_text') == null)
                {

                    var newdiv = document.createElement('div');
                    newdiv.setAttribute('id', 'opportunity_text');
                
                    newdiv.innerHTML = "Trigger condition: " + "<input type='text' id='trigger_cond' value='" + trigger_cond_value + "' name='trigger_cond' size='40'>" ;
                    newdiv.innerHTML += " <font color=red><span id='trigger_cond_span' style='border: 0px solid red;'><b id='trigger_cond_msg'></b></span></font> <br />";
                    newdiv.innerHTML += "Anticipated rate of triggers per year: " + "<input type='text' id='trigger_ratepyr' value='" + trigger_ratepyr_value + "' name='trigger_ratepyr' size='40'>" ;
                    newdiv.innerHTML += " <font color=red><span id='trigger_ratepyr_span' style='border: 0px solid red;'><b id='trigger_ratepyr_msg'></b></span></font> <br />";
                    newdiv.innerHTML += "Minimum observation-hours per trigger: " + "<input type='text' id='min_obshrsptrigger' value='" + min_obshrsptrigger_value + "' name='min_obshrsptrigger' size='40'>" ;
                    newdiv.innerHTML += " <font color=red><span id='min_obshrsptrigger_span' style='border: 0px solid red;'><b id='min_obshrsptrigger_msg'></b></span></font> <br />";
                    
                    document.getElementById('opportunity_check').appendChild(newdiv);
                }
            }
    } 

function opportunity_remove() 
{
            if (document.getElementById('opportunity_text'))
            {
                document.getElementById('opportunity_check').removeChild(document.getElementById('opportunity_text'));
            }

}

</script>
</div>



<table>
<tr><td> <input type='button' onclick="cover_validate()" value='Validate' /> </td>
<script type='text/javascript'>
//checks whether all of cover section is filled; later this is used to find out whether everything has been filled and so 'Make Cover' can be enabled
function cover_filled() {

    var a;
    var b;
    var c; 
    var d;
    var e;
    var f;
    var g;
    var h;
    var i;
    var j;
    var k;
    var l;
    var m;
    var n;
    var o;
    var p;
    var q;
    var r;
    var s;

    a = validate_filled_select('working_group', 'working_group_msg', 'Please select a working group'); 
    b = validate_filled('title', 'title_msg', 'Please enter a title');
    c = validate_filled('PI_first', 'First','Please enter a valid first name');
    d = validate_filled('PI_last', 'Last', 'Please enter a valid last name');
    e = email_validate_filled();
    f = validate_filled('PI_institution', 'University', 'Please enter a valid institution');
    g = validate_filled_radio('Fermi1', 'Fermi2', 'Fermi_msg', 'Please check with Fermi');
    h = validate_filled_radio('mw1', 'mw2', 'mw_msg', 'Please check mw');
    i = validate_filled_radio('thesis1', 'thesis2', 'thesis_msg', 'Please check thesis');
    j = validate_filled('analysis', 'analysis_msg', 'Please enter who wil analyze');
    m = validate_filled_textarea('Abstract', 'Abstract_msg', 'Please enter an Abstract');
    s = validate_filled_radio('opportunity1', 'opportunity2', 'opportunity_msg', 'Please check whether target of opportunity', 'opportunity_radio_span');
    
    

    if (document.getElementById('mw_text') != null)
    {
    k = validate_filled('mw', 'mw_msg', 'Please enter an MW message');
        
    }

    if (document.getElementById('thesis_text') != null)
    {
    l = validate_filled('thesis', 'thesis_msg', 'Please enter an thesis message');
        
    }


    n = validate_filled_radio('multi_year1', 'multi_year2', 'multi_year_msg', 'Please check whether multi-year','multi_year_span');
    o = validate_filled_check('themes1', 'themes2', 'themes3', 'themes4', 'themes_msg', 'Please check at least one of the major four themes', 'themes_span');

    if (document.getElementById('opportunity_text') != null)
    {
    p = validate_filled('trigger_cond', 'trigger_cond_msg', 'Please enter the trigger condition','trigger_cond_span');
    q = validate_filled('trigger_ratepyr', 'trigger_ratepyr_msg', 'Please enter antipcated rate of trigger per year','trigger_ratepyr_span');
    r = validate_filled('min_obshrsptrigger', 'min_obshrsptrigger_msg', 'Please enter the minimum observation-hours per trigger','min_obshrsptrigger_span');
        
    }
    

if ((a == 1) || (b == 1) || (c == 1) || (d == 1) || (e == 1) || (f == 1) || (g == 1) || (h == 1) || (i == 1) || (j == 1) || (k == 1) || (l == 1) || (m == 1)|| (n == 1) || (o == 1) || (p == 1) || (q == 1)|| (r == 1) || (s == 1))
{
    return 1;
}
else
{
    return 0;
}

}

//checks to see whether everything necessary in cover has been filled and alerts the user if something is missing/in the wrong format; cookies are saved for filled in cover information
function cover_validate() {

    validate_select('working_group', 'working_group_msg', 'Please select a Science Working Group.', 'working_group_span');
    validate('title', 'title_msg', 'Please enter a title','title_span');
    validate('PI_first', 'First','Please enter a valid first name','first_span');
    validate('PI_last', 'Last', 'Please enter a valid last name','last_span');
    email_validate();
    //validate('PI_email', 'Email', 'Please enter a valid email');
    validate('PI_institution', 'University', 'Please enter a valid university','institution_span');
    validate_radio('Fermi1', 'Fermi2', 'Fermi_msg', 'Please check with Fermi','Fermi_span');
    validate_radio('mw1', 'mw2', 'mw_msg', 'Please check mw','mw_radio_span');
    validate_radio('thesis1', 'thesis2', 'thesis_msg', 'Please check thesis','thesis_radio_span');
    validate('analysis', 'analysis_msg', 'Please enter who will analyze','analysis_span');
    validate_textarea('Abstract', 'Abstract_msg', 'Please enter an Abstract','abstract_span');
    validate_radio('multi_year1', 'multi_year2', 'multi_year_msg', 'Please check whether multi-year', 'multi_year_span');
    validate_radio('opportunity1', 'opportunity2', 'opportunity_msg', 'Please check whether target of opportunity', 'opportunity_radio_span');
    validate_check('themes1', 'themes2', 'themes3', 'themes4', 'themes_msg', 'Please check at leat one of the four major themes', 'themes_span');
    
    

    if (document.getElementById('mw_text') != null)
    {
        validate('mw', 'mw_msg', 'Please enter an MW message','mw_span');
        
    }

    if (document.getElementById('opportunity_text') != null)
    {
        validate('trigger_cond', 'trigger_cond_msg', 'Please enter the trigger condition','trigger_cond_span');
        validate('trigger_ratepyr', 'trigger_ratepyr_msg', 'Please enter antipcated rate of trigger per year','trigger_ratepyr_span');
        validate('min_obshrsptrigger', 'min_obshrsptrigger_msg', 'Please enter the minimum observation-hours per trigger','min_obshrsptrigger_span');
        
    }

    if (document.getElementById('thesis_text') != null)
    {
        validate('thesis', 'thesis_msg', 'Please enter an thesis message','thesis_span');
        
    }

    setCookie('working_group', document.getElementById('working_group').value , 7);
    setCookie('title', document.getElementById('title').value , 7);
    setCookie('PI_first', document.getElementById('PI_first').value , 7);
    setCookie('PI_last', document.getElementById('PI_last').value , 7);
    setCookie('PI_email', document.getElementById('PI_email').value , 7);
    setCookie('PI_institution', document.getElementById('PI_institution').value , 7);
    setCookie('Abstract', document.getElementById('Abstract').value , 7);
    
    if (document.getElementById('Fermi1').checked)
     {
     setCookie('Fermi', 'yes' , 7);
     }
    else if (document.getElementById('Fermi2').checked)
    {
    setCookie('Fermi', 'no', 7);
    }

    if (document.getElementById('multi_year1').checked)
     {
     setCookie('multi_year', 'yes' , 7);
     }
    else if (document.getElementById('multi_year2').checked)
    {
    setCookie('multi_year', 'no', 7);
    }

     setCookie('themes1', document.getElementById('themes1').checked , 7);

     //alert(document.getElementById('themes1').checked);
     setCookie('themes2', document.getElementById('themes2').checked , 7);
     setCookie('themes3', document.getElementById('themes3').checked , 7);
     setCookie('themes4', document.getElementById('themes4').checked , 7);
     
    
    

    if (document.getElementById('mw1').checked)
     {
     setCookie('mw_radio', 'yes' , 7);
     }
    else if (document.getElementById('mw2').checked)
    {
    setCookie('mw_radio', 'no', 7);
    }

    if (document.getElementById('thesis1').checked)
     {
     setCookie('thesis_radio', 'yes' , 7);
     }
    else if (document.getElementById('thesis2').checked)
    {
    setCookie('thesis_radio', 'no', 7);
    }

    if (document.getElementById('opportunity1').checked)
     {
     setCookie('opportunity_radio', 'yes' , 7);
     }
    else if (document.getElementById('opportunity2').checked)
    {
    setCookie('opportunity_radio', 'no', 7);
    }

    if (document.getElementById('mw_text')) 
    {
    setCookie('mw', document.getElementById('mw').value, 7);
    }

    if (document.getElementById('opportunity_text')) 
    {
    setCookie('trigger_cond', document.getElementById('trigger_cond').value, 7);
    setCookie('trigger_ratepyr', document.getElementById('trigger_ratepyr').value, 7);
    setCookie('min_obshrsptrigger', document.getElementById('min_obshrsptrigger').value, 7);
    }

    if (document.getElementById('thesis_text')) 
    {
    setCookie('thesis', document.getElementById('thesis').value, 7);
    }

    
    
    
    //setCookie('', document.getElementById('').value , 7);
    setCookie('analysis', document.getElementById('analysis').value , 7);
    
    
}

</script>

<td><input type="button" value="Clear" onClick="cover_clear()"></td><td></td></tr>
</table>
<script type='text/javascript'>
//clears all filled in cover elements and sets them to the default if it exists
function cover_clear()
{
    document.getElementById('working_group').value='Select';
    document.getElementById('title').value='';
    document.getElementById('Abstract').value='Enter Comments Here';
    document.getElementById('Abstract').style.backgroundColor = "#FFFFFF";
    
    document.getElementById('PI_first').value='';
    document.getElementById('PI_last').value='';
    document.getElementById('PI_email').value='';
    document.getElementById('PI_institution').value='';

    document.getElementById('working_group').style.backgroundColor = "#FFFFFF";
    document.getElementById('title').style.backgroundColor = "#FFFFFF";
    document.getElementById('PI_first').style.backgroundColor = "#FFFFFF";
    document.getElementById('PI_last').style.backgroundColor = "#FFFFFF";
    document.getElementById('PI_email').style.backgroundColor = "#FFFFFF";
    document.getElementById('PI_institution').style.backgroundColor = "#FFFFFF";
    document.getElementById('analysis').style.backgroundColor = "#FFFFFF";
    

    document.getElementById('working_group_msg').innerHTML = '';
    document.getElementById('title_msg').innerHTML = '';
    document.getElementById('Abstract_msg').innerHTML = '';
    document.getElementById('First').innerHTML = '';
    document.getElementById('Last').innerHTML = '';
    document.getElementById('Email').innerHTML = '';
    document.getElementById('University').innerHTML = '';
    document.getElementById('Fermi_msg').innerHTML = '';
    document.getElementById('mw_msg').innerHTML = '';
    document.getElementById('thesis_msg').innerHTML = '';
    document.getElementById('analysis_msg').innerHTML = '';

    if (document.getElementById('opportunity_text'))
    {
    document.getElementById('trigger_cond').value='';
    document.getElementById('trigger_ratepyr').value='';
    document.getElementById('min_obshrsptrigger').value='';
    document.getElementById('trigger_cond').style.backgroundColor = "#FFFFFF";
    document.getElementById('trigger_ratepyr').style.backgroundColor = "#FFFFFF";
    document.getElementById('min_obshrsptrigger').style.backgroundColor = "#FFFFFF";
    }
    
    
    //COPIS NEED TO INSERT
    document.getElementById('Fermi1').checked = false;
    document.getElementById('Fermi2').checked = false;
    
    document.getElementById('analysis').value = '';
    document.getElementById('mw1').checked = false;
    document.getElementById('mw2').checked = false;
    document.getElementById('thesis1').checked = false;
    document.getElementById('thesis2').checked = false;
    document.getElementById('themes1').checked = false;
    document.getElementById('themes2').checked = false;
    document.getElementById('themes3').checked = false;
    document.getElementById('themes4').checked = false;
    document.getElementById('multi_year1').checked = false;
    document.getElementById('multi_year2').checked = false;
    document.getElementById('opportunity1').checked = false;
    document.getElementById('opportunity2').checked = false;
    opportunity_remove();
    mw_remove();
    thesis_remove();
}
</script>

<hr size="1" align="center" width="100%" color="grey">
</div>

<tr><td><h2><img src="closed.png" id="target_image" alt=""/><a id="target_text">Target Form</a><font size=2> - <a href="veritasRPSHelp.html#cover" target='_blank'>help</a></font></h2></td></tr>



<div id="target_div" style="display:none">
<table>

<!--<tr><td> Do you want to enter your source information by hand or through a text file?</td></tr>
<tr><td> (The latter is only recommended for many sources - <a href="veritasRPSHelp.html#target" target='_blank'>see example</a>) </td></tr>
<tr><td><?php input_radiocheck('radio','target_form', $defaults, 'hand', 'hand'); ?> by hand</td></tr>
<tr><td><?php input_radiocheck('radio','target_form', $defaults, 'text', 'text'); ?> through text </td></tr>
<tr><td><iframe id="upload_target" name="upload_target" src="" style="width:0px;height:0px;border:0px solid #ccc;"> </iframe></td></tr> -->

<tr><td> Do you want to enter your source information by hand or through a text file (this Cycle 6 we only allow to use -by hand-let us know if you would prefer otherwise for next round)?</td></tr>
<tr><td><?php input_radiocheck('radio','target_form', $defaults, 'hand', 'hand'); ?> by hand</td></tr>
<tr><td><iframe id="upload_target" name="upload_target" src="" style="width:0px;height:0px;border:0px solid #ccc;"> </iframe></td></tr> 

</table>
<font id 'Target_msg' color=red><span style="border: 0px solid red;"><b id='Target_msg'></b></span></font>

<div id='Target_form'> <div id='Targets'> </div> <div id='simbad_div'> </div></div>

<script language="javascript">
function target_validate() {
if (document.getElementById('hand').checked)
{
//setCookie('target_form', 'hand', 7);
}
else if (document.getElementById('text').checked)
{
//setCookie('target_form', 'text', 7);
}

}
//opens and closes target section as well as changes the icon associated with the section
/*
$(document).ready(function(){
  $("#target_image, #target_text").click(function(){
    $("#target_div").toggle();
    var src = ($("#target_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
    $("#target_image").attr('src', src);
    window.location.hash = 'target_div';
  });
});
*/
</script>


</table>
<hr />
</div>
<table>
<tr><td><h2><img src="closed.png" id="proposal_image" alt=""/><a id="proposal_text">Science Proposal</a><font size=2> - <a href="veritasRPSHelp.html#justification" target='_blank'>help</a></font></h2>
</td></tr>

</table>
<div id="proposal_div" style="display:none">

<script language="javascript">
//opens and closes the proposal section as well as changes the icon associated
/*
$(document).ready(function(){
  $("#proposal_image, #proposal_text").click(function(){
    $("#proposal_div").toggle();
    var src = ($("#proposal_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
    $("#proposal_image").attr('src', src);
    window.location.hash = 'proposal_div';
  });
});
*/
</script>
<table>

<tr><td>Scientific Justification:</td></tr>
<tr><td><font color=red><span style="border: 0px solid red;"><b id='Justification_msg'></b></span></font>
</td></tr>
<tr><td><font size="2">Attach a .pdf file.<br /></font> </td></tr>
<tr><td><?php //input_textarea("Justification",$defaults, "cleartextarea(this)"); ?></td></tr>
<br />
<tr><td>
<label for="file">.pdf file</label><input type="file" name="file" id="file" /> 

<font color=red><span id="file_span" style="border: 0px solid red;display:none"><b id='file_msg'></b></span></font> 
</td></tr>
</table>
<script type='text/javascript'>

//document.getElementById('upload_pdf').setAttribute('onclick', 'setAction("upload_pdf")');

var proposal_fill = 1;

//checks whether proposal is filled for later use in checking whether everything has been filled and whether make cover can be enabled
function proposal_filled() {

return window.proposal_fill;
}

//checks whether proposal is filled and alerts user if it has not
//WHEN IS THIS USED?
/*
function proposal_validate() {

    //validate_file('file', 'file_msg', 'Please insert a Justification','file_span'); 
    
    //setCookie('Justification', document.getElementById('Justification').value , 7);
    

}
*/

//checks to see if textarea has been filled for later use in checking whether everything has been filled and whether 'make Cover' can be enabled
function validate_filled_textarea(form_elem, msg_name, msg) {
   if ((document.getElementById(form_elem).value.length == 0) || (document.getElementById(form_elem).value == "Enter Comments Here")){
       return 1;
   } else {
        return 0;
   }
}

//checks to see if textarea has been filled and alerts user if it has not
function validate_textarea(form_elem, msg_name, msg, span_elem) {
   if ((document.getElementById(form_elem).value.length == 0) || (document.getElementById(form_elem).value == "Enter Comments Here")){
       document.getElementById(msg_name).innerHTML = msg;
       document.getElementById(msg_name).style.border="1px solid red";
       document.getElementById(form_elem).focus();
        document.getElementById(form_elem).style.backgroundColor = "#F9A7B0";
        parent.document.getElementById(span_elem).style.display = 'inline';
        
       
   } else {
       document.getElementById(msg_name).innerHTML = '';
        document.getElementById(form_elem).style.backgroundColor = "#B5EAAA";
   }
}


</script>
<td><input type="button" value="Clear" onClick="proposal_clear()"> </td><td></td></tr>
</table>
<script type='text/javascript'>
//clears the proposal
function proposal_clear()
{
    document.getElementById('file').value='';
    document.getElementById('file_msg').innerHTML ='';
}
</script>
<hr size="1" align="center" width="100%" color="grey">

</div>

<?php
//<tr><td><center><input style="background-color:#002752;color: white" type="button" value="Preview"> <input style="background-color:#002752; color: white" type="button" value="Save">
?>

<tr><td><center>
<input type="button" onclick='clearInterval(submit_preview);clearInterval(submit_test);' id='main_back' value="Back">
<input type="submit" id="save" name="save" value="Save" >
<input type="submit" id="preview" name="preview" value="Make Cover"> 
<input type="submit" id="submit_all" name="submit_all" value="Submit" >
</center></tr></td>
</div>
</form>
<script type="text/javascript">






//document.getElementById('form_main').style.display='none';


//checks whether 'Make Cover' can be enabled every 500 ms
var submit_preview= setInterval("preview_enable()",500);

        
var submit_test_var;
//this function checks whether 'Submit' button should be enabled every 500ms
function submit_test()
{
submit_test_var = setInterval("submit_enable()",500);

}


//submit_enable();


 //  document.getElementById('submit_all').setAttribute('onclick', 'setAction("submit_all")');


function preview_enable() 
{

   //alert(window.proposal_fill);
   //checks whether everything has been filled and thus 'Make Cover' can be enabled or not
   if ((cover_filled() == 0) && (targets_filled() == 0) && (proposal_filled() == 0))

  {
        document.getElementById('preview').disabled = false;
        document.getElementById('preview').style.color = "white";
        document.getElementById('preview').style.backgroundColor="#002752";
        document.getElementById('main_form').target = '_blank';
        document.getElementById('preview').setAttribute('onclick', 'setAction("preview");submit_test();');

  }
 else
  {
    document.getElementById('preview').disabled = true;
    document.getElementById('preview').style.color = "";
    document.getElementById('preview').style.backgroundColor="";
    document.getElementById('submit_all').disabled = true;
    document.getElementById('submit_all').style.color = "";
    document.getElementById('submit_all').style.backgroundColor="";
    clearInterval(submit_test_var);
    
   
  }
/*
        document.getElementById('preview').disabled = false;
        document.getElementById('preview').style.color = "white";
        document.getElementById('preview').style.backgroundColor="#002752";
        document.getElementById('main_form').target = '_blank';
        document.getElementById('preview').setAttribute('onclick', 'setAction("preview")');
        */
  

}
function submit_enable() 
{
//enables the 'Submit' button only if everything has been filled

   if ((cover_filled() == 0) && (targets_filled() == 0) && (proposal_filled() == 0))

  {
        document.getElementById('submit_all').disabled = false;
        document.getElementById('submit_all').style.color = "white";
        document.getElementById('submit_all').style.backgroundColor="#002752";
        document.getElementById('main_form').target = '_self';
        document.getElementById('submit_all').setAttribute('onclick', 'setAction("submit_all")');

  }
 else
  {
    document.getElementById('submit_all').disabled = true;
    document.getElementById('submit_all').style.color = "";
    document.getElementById('submit_all').style.backgroundColor="";
   
  }

        document.getElementById('submit_all').disabled = false;
        document.getElementById('submit_all').style.color = "white";
        document.getElementById('submit_all').style.backgroundColor="#002752";
        document.getElementById('main_form').target = '_self';
        document.getElementById('submit_all').setAttribute('onclick', 'setAction("submit_all")');
  

}

//because there are multiple times when form is submitted; this function sets the action for each
function setAction(submit_elt)
{
    //main submit
    if (submit_elt == 'submit_all')
    {
        document.getElementById('main_form').submit();
        document.getElementById('main_form').target = '_self';
        document.getElementById('main_form').action = 'readFile.php';
    }
    //when user uploads targets using a textfile; information is submitted to an iframe
    else if (submit_elt == 'upload')
    {

        document.getElementById('main_form').target = 'upload_target'; //'upload_target' is the name of the iframe
        document.getElementById('main_form').action = 'upload.php';
        //document.getElementById('main_form').action = 'this.disabled=true';
        //document.getElementById('main_form').action = "javascript:document.getElementById('upload').disabled=true";
        //document.getElementById('main_form').action = "javascript:alert(document.getElementById('upload'));";
        document.getElementById('main_form').submit();
    }
    //when user uploads pdf file it is submitted and thus one can validate
    else if (submit_elt == 'upload_pdf')
    {
        document.getElementById('main_form').target = 'upload_target';
        document.getElementById('main_form').action = 'upload_pdf.php';
        document.getElementById('main_form').submit();
    }
    else if (submit_elt == 'save')
    {
        //document.getElementById('main_form').target = '';
        document.getElementById('main_form').action = 'process-form-data.php';
        document.getElementById('main_form').submit();
    }
    //when everything has been filled out one can 'Make Cover' which allows for a new pdf page
    if (submit_elt == 'preview')
    {
        document.getElementById('main_form').submit();
        document.getElementById('main_form').target = '_blank';
        document.getElementById('main_form').action = 'makeCoverPDF.php';
    }
    

}

document.getElementById('file').onchange = file_submit;
//document.getElementById('file').= file_submit;


//when the element 'file' has changed, this function is called which uploads the file temporarily to validate the pdf file
function file_submit()
{
        document.getElementById('main_form').target = 'upload_target';
        document.getElementById('main_form').action = 'upload_pdf.php';
        document.getElementById('main_form').submit();
        //var pdf_status = "<?= $pdf_status ?>";
        //alert(pdf_status);
}


$(document).ready(function(){
 /*
 //   alert('hi');
  $("#hand").click(function(){
    target = 0;
    $("#Targets").html('');
    $("#Targets").html(addTarget());
    window.location.hash='Target0';
    $("#Target_form").append('<tr><td><input id="Target_add" type="button" value="Add" ></td></tr>');

    $("#Target_add").click(function() {
    $("#Targets").append(addTarget());
    window.location.hash='Target' + (target - 1);
    
    });
    
  });

  $("#text").click(function(){
    target = 0;
    if (document.getElementById('Target_add')) 
    {
        document.getElementById('Target_add').parentNode.removeChild(document.getElementById('Target_add'));
    }

    $("#Targets").html(' <tr><td> <label for="file_tar">text file</label><input name="file_tar" id="file_tar" size="27" type="file" /><br /> <input type="submit" id="upload" name="upload" value="Upload" /><br /> ');

    $("#Targets").delegate("#upload", "click", function () {

    setAction("upload");
    });

  });

  */
  document.getElementById("save").setAttribute('onclick', 'setAction("save")');
  
});


  /*$("#save").click(function(){
        alert("test");
        ("#save").attr('onclick', 'setAction("save")');
  });
  */
/*
    $("Target0").delegate("#Duplicate0", "click", function () {
    alert("test");
    //$("#Duplicate0").parent().clone();
    //$("#Targets").append(addTarget());
   // window.location.hash='Target' + (target - 1);
    });
    */

</script>
