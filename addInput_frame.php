<script type='text/javascript'>
<?php require 'targets_array.js'?>
//This function appends a CoPI 'div' every time user clicks 'Add'

        var coPIcount = 0;
function addCoPI(divName){
        var newdiv = parent.document.createElement('div');
        newdiv.setAttribute('style', 'border: 1px solid black; padding: 10px;')

        newdiv.innerHTML = "First Name:"+ "<input type='text' size='25' maxlength='40' id='coName" + coPIcount + "' name='coName[]'> <br />" +"Last Name:" + "<input type='text' size='25' maxlength='40' id='coLast" + coPIcount + "' name='coLast[]'> <br />" + "Email:" + " <input type='text' size='25' maxlength='40' id='coEmail" + coPIcount + "' name='coEmail[]'> <br />" + "University:"+" <input type='text' size='25' maxlength='40' id='coInstitution" + coPIcount + "'coInstitution[]'> <br /> "+" <br>" + "<input type='button' value='Remove' onclick='this.parentNode.parentNode.removeChild(this.parentNode)' >";
        newdiv.innerHTML += "<input type ='hidden' name='coInputs[]' value='" + target +"'>";
        parent.document.getElementById(divName).appendChild(newdiv);
        coPIcount++;
}

//sets the default values for each target 'div'
//THIS CAN BE SIMPLIFIED
function init_select(digit)
{
            var newdiv = parent.document.createElement('div');
            if (parent.document.getElementById('menu' + digit).value == "Wobble")
            {
            newdiv.setAttribute('id', 'wob_Opt' + digit);
            newdiv.innerHTML = "<input type='radio' id='wobble1_" + digit + "' name='Obs_mode" + digit + "[]' CHECKED value='0.5'>" + "0.5\t" + " <input type='radio' id='wobble2_" + digit + "' name='Obs_mode" + digit + "[]' value='0.6'>" + "0.6\t";
            newdiv.innerHTML += "<input type='radio' id='wobble3_" + digit + "' name='Obs_mode" + digit + "[]' value='0.7'>" + "0.7\t" + " Other" + " <input type=text id='wobble4_" + digit + "' name='Obs_mode" + digit + "[]' >";


             setTimeout(function () {
            document.getElementById('wobble1_' + digit +'').onclick = function(){textRadioBind(document.getElementById('wobble1_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('wobble2_' + digit +'').onclick = function(){textRadioBind(document.getElementById('wobble2_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('wobble3_' + digit +'').onclick = function(){textRadioBind(document.getElementById('wobble3_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('wobble4_' + digit +'').onclick = function(){textRadioBind(document.getElementById('wobble4_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('wobble4_' + digit +'').onchange = function(){textRadioBind(document.getElementById('wobble4_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};
            }, 1000);

            }
            else if (parent.document.getElementById('menu' + digit).value == "On/Off")
            {
                newdiv.setAttribute('id', 'on_Opt' + (digit));
                newdiv.innerHTML = "<input type='radio' id='onoff1_" + digit+ "' name='Obs_mode" + digit + "[]' value='1:1'>" + "1:1\t" + " <input type='radio' id='onoff2_" + digit+ "' name='Obs_mode" + digit + "[]' value='1:2'>" + "1:2\t";
                newdiv.innerHTML += "<input type='radio' id='onoff3_" + digit+ "' name='Obs_mode" + digit + "[]' value='1:3'>" + "1:3\t" + " Other" + " <input type='text' id='onoff4_" + digit+ "' name='Obs_mode" + digit + "[]' >";


             setTimeout(function () {
            document.getElementById('onoff1_' + digit +'').onclick = function(){textRadioBind(document.getElementById('onoff1_' + digit +''),'onoff4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('onoff2_' + digit +'').onclick = function(){textRadioBind(document.getElementById('onoff2_' + digit +''),'onoff4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('onoff3_' + digit +'').onclick = function(){textRadioBind(document.getElementById('onoff3_' + digit +''),'onoff4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('onoff4_' + digit +'').onclick = function(){textRadioBind(document.getElementById('onoff4_' + digit +''),'onoff4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('onoff4_' + digit +'').onchange = function(){textRadioBind(document.getElementById('onoff4_' + digit +''),'onoff4_'+digit+'', 'Obs_mode' + digit+'[]');};
            }, 1000);

            }

            parent.document.getElementById('menu' + digit).parentNode.appendChild(newdiv);


            var init_holder = document.getElementsByName('Obs_mode' + digit+'[]');

/*
if (document.getElementById('wob_Opt' +digit))
{
            document.getElementById('wobble1_' + digit +'').onclick = function(){textRadioBind(document.getElementById('wobble1_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('wobble2_' + digit +'').onclick = function(){textRadioBind(document.getElementById('wobble2_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('wobble3_' + digit +'').onclick = function(){textRadioBind(document.getElementById('wobble3_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('wobble4_' + digit +'').onclick = function(){textRadioBind(document.getElementById('wobble4_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};
            document.getElementById('wobble4_' + digit +'').onchange = function(){textRadioBind(document.getElementById('wobble4_' + digit +''),'wobble4_'+digit+'', 'Obs_mode' + digit+'[]');};

}
*/

}
    
//dynamically changes options under Observation mode based on which observation mode picked
function madeSelection()
{

    //alert("madeSelection()");
    if (this.parentNode)
    {
    var identify = this.parentNode.parentNode.lastChild.value;
    }
    else
    {
    var identify = target -1;
    }

	if(document.getElementById('menu' + identify).value == "Wobble")
        {
            //adds wobble mode options only if it is not already displayed           

            if (parent.document.getElementById('wob_Opt' + (identify)) == null) 
            {

                var newdiv = parent.document.createElement('div');
                newdiv.setAttribute('id', 'wob_Opt' + (identify));

                newdiv.innerHTML = "<input type='radio' id='wobble1_" + identify + "' name='Obs_mode" + identify + "[]' value='0.5'>" + "0.5\t" + " <input type='radio' id='wobble2_" + identify + "' name='Obs_mode" + identify + "[]' value='0.6'>" + "0.6\t";
                newdiv.innerHTML += "<input type='radio' id='wobble3_" + identify + "' name='Obs_mode" + identify + "[]' value='0.7'>" + "0.7\t" + " Other" + " <input type=text id='wobble4_" + identify + "' name='Obs_mode" + identify + "[]' >";
                document.getElementById('menu' + identify).parentNode.appendChild(newdiv);
             setTimeout(function () {
            document.getElementById('wobble1_' + identify +'').onclick = function(){textRadioBind(document.getElementById('wobble1_' + identify +''),'wobble4_'+identify+'', 'Obs_mode' + identify+'[]');};
            document.getElementById('wobble2_' + identify +'').onclick = function(){textRadioBind(document.getElementById('wobble2_' + identify +''),'wobble4_'+identify+'', 'Obs_mode' + identify+'[]');};
            document.getElementById('wobble3_' + identify +'').onclick = function(){textRadioBind(document.getElementById('wobble3_' + identify +''),'wobble4_'+identify+'', 'Obs_mode' + identify+'[]');};
            document.getElementById('wobble4_' + identify +'').onclick = function(){textRadioBind(document.getElementById('wobble4_' + identify +''),'wobble4_'+identify+'', 'Obs_mode' + identify+'[]');};
            document.getElementById('wobble4_' + identify +'').onchange = function(){textRadioBind(document.getElementById('wobble4_' + identify +''),'wobble4_'+identify+'', 'Obs_mode' + identify+'[]');};
            }, 1000);
            }
            //if on/off options already displayed, it is removed
            if (parent.document.getElementById('on_Opt' + (identify)) != null) 
            {
            parent.document.getElementById('on_Opt' + (identify)).style.display="none";
            setTimeout(function() {
                document.getElementById('onoff1_' + identify +'').onclick = null;
                document.getElementById('onoff2_' + identify +'').onclick = null;
                document.getElementById('onoff3_' + identify +'').onclick = null;
                document.getElementById('onoff4_' + identify +'').onclick = null;
                document.getElementById('onoff4_' + identify +'').onchange = null;
                document.getElementById('menu' + identify).parentNode.removeChild(parent.document.getElementById('on_Opt' + (identify)));
            }, 200);
                
            }

        }
        else if (document.getElementById('menu' + identify).value == "On/Off") 
        {



            //adds on/off mode options only if it is not already displayed           
            if (parent.document.getElementById('on_Opt' + (identify)) == null) 
            {

                var newdiv = parent.document.createElement('div');
                newdiv.setAttribute('id', 'on_Opt' + (identify));

                newdiv.innerHTML = "<input type='radio' id='onoff1_" + identify+ "' name='Obs_mode" + identify + "[]' value='1:1'>" + "1:1\t" + " <input type='radio' id='onoff2_" + identify+ "' name='Obs_mode" + identify + "[]' value='1:2'>" + "1:2\t";
                newdiv.innerHTML += "<input type='radio' id='onoff3_" + identify+ "' name='Obs_mode" + identify + "[]' value='1:3'>" + "1:3\t" + " Other" + " <input type='text' id='onoff4_" + identify+ "' name='Obs_mode" + identify + "[]' >";
                document.getElementById('menu' + identify).parentNode.appendChild(newdiv);

//alert(document.getElementById('onoff4_' + identify +'').value);
             setTimeout(function () {
            document.getElementById('onoff1_' + identify +'').onclick = function(){textRadioBind(document.getElementById('onoff1_' + identify +''),'onoff4_'+identify+'', 'Obs_mode' + identify+'[]');};
            document.getElementById('onoff2_' + identify +'').onclick = function(){textRadioBind(document.getElementById('onoff2_' + identify +''),'onoff4_'+identify+'', 'Obs_mode' + identify+'[]');};
            document.getElementById('onoff3_' + identify +'').onclick = function(){textRadioBind(document.getElementById('onoff3_' + identify +''),'onoff4_'+identify+'', 'Obs_mode' + identify+'[]');};
            document.getElementById('onoff4_' + identify +'').onclick = function(){textRadioBind(document.getElementById('onoff4_' + identify +''),'onoff4_'+identify+'', 'Obs_mode' + identify+'[]');};
            document.getElementById('onoff4_' + identify +'').onchange = function(){textRadioBind(document.getElementById('onoff4_' + identify +''),'onoff4_'+identify+'', 'Obs_mode' + identify+'[]');};
            }, 1000);
            
            }

            //if wobble options already displayed, it is removed

            if (parent.document.getElementById('wob_Opt' + (identify)) != null)
            {
            //alert("test");
           // parent.document.getElementById('wob_Opt' + identify).focus();
            
            parent.document.getElementById('wob_Opt' + (identify)).style.display="none";
            setTimeout(function() {
            document.getElementById('wobble1_' + identify +'').onclick = null;
            document.getElementById('wobble2_' + identify +'').onclick = null;
            document.getElementById('wobble3_' + identify +'').onclick = null;
            document.getElementById('wobble4_' + identify +'').onclick = null;
            document.getElementById('wobble4_' + identify +'').onchange = null;
            document.getElementById('menu' + identify).parentNode.removeChild(parent.document.getElementById('wob_Opt' + (identify)));
            }, 1000);
            }

        }
        
        else if (document.getElementById('menu' + identify).value == "Tracking")
        {
            //if on/off options already displayed, it is removed


            if (parent.document.getElementById('on_Opt' + (identify)) != null) 
            {
            parent.document.getElementById('on_Opt' + (identify)).style.display="none";
            setTimeout(function() {
                document.getElementById('onoff1_' + identify +'').onclick = null;
                document.getElementById('onoff2_' + identify +'').onclick = null;
                document.getElementById('onoff3_' + identify +'').onclick = null;
                document.getElementById('onoff4_' + identify +'').onclick = null;
                document.getElementById('onoff4_' + identify +'').onchange = null;
                document.getElementById('menu' + identify).parentNode.removeChild(parent.document.getElementById('on_Opt' + (identify)));
            }, 200);
                
            }
            //if wobble options already displayed, it is removed
            else if (parent.document.getElementById('wob_Opt' + (identify)) != null) 
            {
            parent.document.getElementById('wob_Opt' + (identify)).style.display="none";
            setTimeout(function() {
            document.getElementById('wobble1_' + identify +'').onclick = null;
            document.getElementById('wobble2_' + identify +'').onclick = null;
            document.getElementById('wobble3_' + identify +'').onclick = null;
            document.getElementById('wobble4_' + identify +'').onclick = null;
            document.getElementById('wobble4_' + identify +'').onchange = null;
            document.getElementById('menu' + identify).parentNode.removeChild(parent.document.getElementById('wob_Opt' + (identify)));
            }, 200);
            }
        }

        else if (document.getElementById('menu' + identify).value == "Select one")
        {
            if (parent.document.getElementById('on_Opt' + (identify)) != null) 
            {
            parent.document.getElementById('on_Opt' + (identify)).style.display="none";
            setTimeout(function() {
                document.getElementById('onoff1_' + identify +'').onclick = null;
                document.getElementById('onoff2_' + identify +'').onclick = null;
                document.getElementById('onoff3_' + identify +'').onclick = null;
                document.getElementById('onoff4_' + identify +'').onclick = null;
                document.getElementById('onoff4_' + identify +'').onchange = null;
                document.getElementById('menu' + identify).parentNode.removeChild(parent.document.getElementById('on_Opt' + (identify)));
            }, 200);
                
            }
            //if wobble options already displayed, it is removed
            else if (parent.document.getElementById('wob_Opt' + (identify)) != null) 
            {
            parent.document.getElementById('wob_Opt' + (identify)).style.display="none";
            setTimeout(function() {
            document.getElementById('wobble1_' + identify +'').onclick = null;
            document.getElementById('wobble2_' + identify +'').onclick = null;
            document.getElementById('wobble3_' + identify +'').onclick = null;
            document.getElementById('wobble4_' + identify +'').onclick = null;
            document.getElementById('wobble4_' + identify +'').onchange = null;
            document.getElementById('menu' + identify).parentNode.removeChild(parent.document.getElementById('wob_Opt' + (identify)));
            }, 200);
            }
        }
            
        else if (document.getElementById('menu' + identify).value == "Orbit mode")
        {
            if (parent.document.getElementById('on_Opt' + (identify)) != null) 
            {
            parent.document.getElementById('on_Opt' + (identify)).style.display="none";
            setTimeout(function() {
                document.getElementById('onoff1_' + identify +'').onclick = null;
                document.getElementById('onoff2_' + identify +'').onclick = null;
                document.getElementById('onoff3_' + identify +'').onclick = null;
                document.getElementById('onoff4_' + identify +'').onclick = null;
                document.getElementById('onoff4_' + identify +'').onchange = null;
                document.getElementById('menu' + identify).parentNode.removeChild(parent.document.getElementById('on_Opt' + (identify)));
            }, 200);
                
            }
            //if wobble options already displayed, it is removed
            else if (parent.document.getElementById('wob_Opt' + (identify)) != null) 
            {
            parent.document.getElementById('wob_Opt' + (identify)).style.display="none";
            setTimeout(function() {
            document.getElementById('wobble1_' + identify +'').onclick = null;
            document.getElementById('wobble2_' + identify +'').onclick = null;
            document.getElementById('wobble3_' + identify +'').onclick = null;
            document.getElementById('wobble4_' + identify +'').onclick = null;
            document.getElementById('wobble4_' + identify +'').onchange = null;
            document.getElementById('menu' + identify).parentNode.removeChild(parent.document.getElementById('wob_Opt' + (identify)));
            }, 200);
            }

        }
        else 
        {
        }

}

        var target = 0;
        var limit = 10;
        var divName = 'Targets';
        //necessary variable?
        var test;
        //var data_count = 0;
        
//adds a new target 'div' each time user presses 'add'
function addTarget()
    {

    var newdiv = parent.document.createElement('div');
    newdiv.setAttribute('style', 'border: 1px solid black; padding: 10px');
    var newdivIdName = 'Target' + target;
    newdiv.setAttribute('id', newdivIdName);

        newdiv.innerHTML = "Source " + "<input type='text' size='25' maxlength='40' id='Source" + target + "' name='Source[]'> <font color=red><span id='source_span" +target + "' style='border: 1px solid red;display:none'><b id='Source_msg" + target + "'></b></span></font></td> <input type='button' id='simbad" + target+ "' value='get Coordinates'> </tr> <br />"+ "RA"+ "<input type='text' size='25' maxlength='40' id='RA" + target + "' name='RA[]'> <font size='2'>Please enter in this format (J2000 HH MM SS.SS)</font> <font color=red><span id='RA_span" + target + "' style='border: 1px solid red;display:none'><b id='RA_msg" + target + "'></b></span></font></td></tr> <br />";

        newdiv.innerHTML += "dec" + "<input type='text' size='25' maxlength='40' id='Dec" + target + "' name='Dec[]" + "'> "+ " <font size='2'>Please enter in this format (J2000 DD MM SS.S)</font> <font color=red><span id='Dec_span" + target + "' style='border: 1px solid red;display:none'><b id='Dec_msg" + target + "'></b></span></font></td></tr> <br />"+  "Minimum Elevation" + "<input type='text' size='5' maxlength='5' id='Min_Elev" + target + "'name='Min_Elev[]' value='55'> <font color=red><span id='min_elev_span" + target + "' style='border: 1px solid red;display:none'><b id='Min_Elev_msg" + target + "'></b></span></font></td></tr> <br />" + "Requested Exposure (hours)"+ "<input type='text' size='25' maxlength='40' id='Max_Exposure" + target + "' name='Max_Exposure[]" + "'> <font color=red><span id='max_exposure_span" + target + "' style='border: 1px solid red;display:none'><b id='Max_Exposure_msg" + target + "'></b></span></font></td></tr> <br />";
        newdiv.innerHTML += "Minimum Exposure (hours)"+ "<input type='text' size='25' maxlength='40' id='Min_Exposure" + target + "' name='Min_Exposure[]'>  <font color=red><span id='min_exposure_span" + target + "' style='border: 1px solid red;display:none'><b id='Min_Exposure_msg" + target + "'></b></span></font></td></tr> <br />"+ "Observation Mode " +  " <font color=red><span id='observation_mode_span" + target + "' style='border: 1px solid red;display:none'><b id='menu_msg" + target + "'></b></span></font></td></tr><br /> <div id='" + "Observation" + target + "'> <select name='menu[]' id='menu" +target +"' ><option>Select one</option> <option selected ='selected' >Wobble</option> <option>On/Off</option> <option>Tracking</option><option>Orbit mode</option></select> </div> "; 
        newdiv.innerHTML += "No. Tels<input type='radio' id='noTels1_" + target + "' name='noTels" + target + "[]' value='1'>" + "&#8805;1\t" + " <input type='radio'id='noTels2_" + target + "' name='noTels" + target + "[]' value='2'>" + "&#8805;2\t";
        newdiv.innerHTML += "<input type='radio' CHECKED id='noTels3_" + target + "' name='noTels" + target + "[]' value='3'>" + "&#8805;3\t" + " <input type='radio' id='noTels4_" + target + "'  name='noTels" + target + "[]' value ='4'>" + "&#8805;4 <br />"; 
        newdiv.innerHTML += "Moonlight" + "<input type='radio' id='Moonlight_term1" + target + "' name='Moonlight" + target + "' value='yes'>" + "Yes" + "<input type='radio' name='Moonlight" + target + "' id='Moonlight_term2" + target + "' CHECKED value='no'>" + "No" + " <font color=red><span id='moonlight_span" + target + "' style='border: 1px solid red;display:none'><b id='Moonlight_msg" + target + "'></b></span></font></td></tr> <br />"; 
        newdiv.innerHTML += "Weather<input type='radio' id='weatherA_" + target + "' name='weather" + target + "[]' value='A'>" + "&#8805;A\t" + " <input type='radio' id='weatherB_" + target + "' name='weather" + target + "[]' CHECKED value='B'>" + "&#8805;B\t";
        newdiv.innerHTML += "<input type='radio' id='weatherC_" + target + "' name='weather" + target + "[]' value='C'>" + "&#8805;C\t" + " <input type='radio' id='weatherD_" + target + "' name='weather" + target + "[]' value ='D'>" + "&#8805;D <br />"; 
        newdiv.innerHTML += "Observable from: " + "<input type='text' size='25' id='Begin_Obs" + target + "' maxlength='40' name='Begin_Obs[]'>" + " <font color=red><span id='obs_from_span" + target + "' style='border: 1px solid red;display:none'><b id='Begin_Obs_msg" + target + "'></b></span></font></td></tr> to" + " <input type='text' size='25' maxlength='40' id='End_Obs" + target + "' name='End_Obs[]'>" + " <font color=red><span id='obs_end_span" + target + "' style='border: 1px solid red;display:none'><b id='End_Obs_msg" + target + "'></b></span></font></td></tr>";
        newdiv.innerHTML += " <input type='button' id='tev" + target + "' value='TeVCat Visibility'>";
        //newdiv.innerHTML += " <input type='button' id='simbad" + target+ "' value='get Coordinates'>";
        newdiv.innerHTML += "<br />" + " Comments: <br /><textarea  rows='10' cols='50' wrap='physical' name='comments[]' id='comments" + target + "' onfocus='cleartextarea(this);'></textarea> ";
        newdiv.innerHTML += "<br /><input type='button' id='Clear" + target + "' value='Clear' onClick='target_clear(" + target + ")'>";
        
        newdiv.innerHTML += "<input type ='button' name='Validate" + target + "' onclick='targets_validate("+ target +")' value='Validate'>";
        //newdiv.innerHTML += "<input type='button' id='Duplicate" + target + "' value='Duplicate' name='Duplicate' onclick='addTarget()';>"
        newdiv.innerHTML += "<input type='button' id='Duplicate" + target + "' value='Duplicate' name='Duplicate'>"
        newdiv.innerHTML += "<input type='button' id='remove" + target + "' value='Remove' name='Target_Remove[]" + "' style='visibility:hidden' onclick='this.parentNode.parentNode.removeChild(this.parentNode); targetless()';>"
    
        newdiv.innerHTML += "<input type ='hidden' name='count[]' value='" + target +"'>";

        //var simbaddiv = parent.document.createElement('div');
       // simbaddiv.setAttribute('id', 'simbad_div' + target);

  //              newdiv.innerHTML = "<input type='radio' id='wobble1_" + identify + "' name='Obs_mode" + identify + "[]' value='0.5'>" + "0.5\t" + " <input type='radio' id='wobble2_" + identify + "' name='Obs_mode" + identify + "[]' value='0.6'>" + "0.6\t";
        

        parent.document.getElementById(divName).appendChild(newdiv);
        parent.document.getElementById('menu' + target).onchange= madeSelection;
        parent.document.getElementById('Duplicate' + target).onclick = duplicate;
         
        //when user wants to revise submitted proposal, this is ran to read and fill out the data
        if ((window.read_database) && (window.data_arrays[target]))
    {

        //alert(data_arrays[target][20]);
        data_arrays[target] = data_arrays[target].splice(20,data_arrays[target].length);
        
        document.getElementById('Source' + target).value = data_arrays[target][0];
        document.getElementById('RA' + target).value = data_arrays[target][1];
        document.getElementById('Dec' + target).value = data_arrays[target][2];
        document.getElementById('Min_Elev' + target).value =data_arrays[target][3];
        document.getElementById('Max_Exposure' + target).value =data_arrays[target][4];
        document.getElementById('Min_Exposure' + target).value =data_arrays[target][5];


        document.getElementById('menu' + target).value =data_arrays[target][6];

        //NECSSARY?
        parent.init_select(target);
        
        if (parent.document.getElementById('menu' + target).value == "Wobble")
        {
            
            if (data_arrays[target][7] == '0.5')
            {
                document.getElementById('wobble1_' + target).checked = 1;
            }
            else if (data_arrays[target][7] == '0.6')
            {
                document.getElementById('wobble2_' + target).checked = 1;
            }
            else if (data_arrays[target][7] == '0.7')
            {
                document.getElementById('wobble3_' + target).checked = 1;
            
            }
            else 
            {
                document.getElementById('wobble4_' + target).checked = 1;
            }
        
        } else if (parent.document.getElementById('menu' + target).value == "On/Off")
        {
            if (data_arrays[target][7] == '1:1')
            {
                document.getElementById('onoff1_' + target).checked = 1;
            }
            else if (data_arrays[target][7] == '1:2')
            {
                document.getElementById('onoff2_' + target).checked = 1;
            }
            else if (data_arrays[target][7] == '1:3')
            {
                document.getElementById('onoff3_' + target).checked = 1;
            
            }
            else 
            {
                document.getElementById('onoff4_' + target).checked = 1;
            }
            
        }

        var teles;
        teles = data_arrays[target][8].split(', ');
        for (var i = 0; i < teles.length; i++)
        {
            if (teles[i] == '1')
            {
                document.getElementById('noTels1_' + target).checked = true;
            }
            else if (teles[i] == '2')
            {
                document.getElementById('noTels2_' + target).checked = true;
            
            }
            else if (teles[i] == '3')
            {
                document.getElementById('noTels3_' + target).checked = true;
            
            }
            else if (teles[i] == '4')
            {
                document.getElementById('noTels4_' + target).checked = true;
            
            }
        }

        if (data_arrays[target][9] == 1)
        {
            document.getElementById('Moonlight_term1' + target).checked = true;
        }
        else if (data_arrays[target][9] == 0)
        {
            document.getElementById('Moonlight_term2' + target).checked = true;
        }


        var cloud;
        cloud = data_arrays[target][10].split(', ');
        for (var i = 0; i < teles.length; i++)
        {
            if (cloud[i] == 'A')
            {
                document.getElementById('weatherA_' + target).checked = true;
            }
            else if (cloud[i] == 'B')
            {
                document.getElementById('weatherB_' + target).checked = true;
            
            }
            else if (cloud[i] == 'C')
            {
                document.getElementById('weatherC_' + target).checked = true;
            
            }
            else if (cloud[i] == 'D')
            {
                document.getElementById('weatherD_' + target).checked = true;
            
            }
        }
        
        
        document.getElementById('Begin_Obs' + target).value =data_arrays[target][11];
        document.getElementById('End_Obs' + target).value =data_arrays[target][12];
        document.getElementById('comments' + target).value = data_arrays[target][13];

    }

        else 
    {
        //if cookies exist then they are used (???)
        if ((parent.document.getElementById('Source' + target).value == '') && (parent.document.getElementById('RA' + target).value == '') && (parent.document.getElementById('Dec' + target).value == ''))
        {
        if (getCookie('Source[' + target + ']'))
        {
        parent.document.getElementById('Source' + target).value = getCookie('Source[' + target + ']'); 
        }
        if (getCookie('RA[' + target + ']'))
        {
        parent.document.getElementById('RA' + target).value = getCookie('RA[' + target + ']'); 
        }
        if (getCookie('Dec[' + target + ']'))
        {
        parent.document.getElementById('Dec' + target).value = getCookie('Dec[' + target + ']'); 
        }
        if (getCookie('Min_Elev[' + target + ']'))
        {
        parent.document.getElementById('Min_Elev' + target).value = getCookie('Min_Elev[' + target + ']'); 
        }
        if (getCookie('Max_Exposure[' + target + ']'))
        {
        parent.document.getElementById('Max_Exposure' + target).value = getCookie('Max_Exposure[' + target + ']'); 
        }
        if (getCookie('Min_Exposure[' + target + ']'))
        {
        parent.document.getElementById('Min_Exposure' + target).value = getCookie('Min_Exposure[' + target + ']'); 
        }
        if (getCookie('menu[' + target + ']'))
        {
        parent.document.getElementById('menu' + target).value = getCookie('menu[' + target + ']'); 
        }

        parent.init_select(target);

        if (parent.document.getElementById('wob_Opt' + target))
        {
            if (getCookie('wobble1[' + target + ']'))
            {
            parent.document.getElementById('wobble1_' + target).checked = (getCookie('wobble1[' + target + ']')).toLowerCase() =="true"?1:0;
            }
            if (getCookie('wobble2[' + target + ']'))
            {
            parent.document.getElementById('wobble2_' + target).checked = (getCookie('wobble2[' + target + ']')).toLowerCase() =="true"?1:0;
            }
            if (getCookie('wobble3[' + target + ']'))
            {

            parent.document.getElementById('wobble3_' + target).checked = (getCookie('wobble3[' + target + ']')).toLowerCase() =="true"?1:0;
            }
            if (getCookie('wobble4[' + target + ']'))
            {
            parent.document.getElementById('wobble4_' + target).value = getCookie('wobble4[' + target + ']');
            }
        }
        else if (parent.document.getElementById('on_Opt' + target))
        {


            if (getCookie('onoff1[' + target + ']'))
            {
                parent.document.getElementById('onoff1_' + target).checked = (getCookie('onoff1[' + target + ']')).toLowerCase() =="true"?1:0;
                //parent.document.getElementById('onoff1_' + target).checked = false;

            }
            if (getCookie('onoff2[' + target + ']'))
            {
                parent.document.getElementById('onoff2_' + target).checked = (getCookie('onoff2[' + target + ']')).toLowerCase() =="true"?1:0;
                //parent.document.getElementById('onoff2_' + target).checked = false;
            }
            if (getCookie('onoff3[' + target + ']'))
            {
                parent.document.getElementById('onoff3_' + target).checked = (getCookie('onoff3[' + target + ']')).toLowerCase() =="true"?1:0;

            }
            if (getCookie('onoff4[' + target + ']'))
            {

                parent.document.getElementById('onoff4_' + target).value = getCookie('onoff4[' + target + ']');
            }
        }
        
        if (getCookie('noTels1[' + target + ']'))
        {
        parent.document.getElementById('noTels1_' + target).checked = (getCookie('noTels1[' + target + ']')).toLowerCase() =="true"?1:0;
        }

        if (getCookie('noTels2[' + target + ']'))
        {
        parent.document.getElementById('noTels2_' + target).checked = (getCookie('noTels2[' + target + ']')).toLowerCase() =="true"?1:0;
        }

        if (getCookie('noTels3[' + target + ']'))
        {
        parent.document.getElementById('noTels3_' + target).checked = (getCookie('noTels3[' + target + ']')).toLowerCase() =="true"?1:0;
        }

        if (getCookie('noTels4[' + target + ']'))
        {
        parent.document.getElementById('noTels4_' + target).checked = (getCookie('noTels4[' + target + ']')).toLowerCase() =="true"?1:0;
        }

        if (getCookie('moonlight1[' + target + ']'))
        {
        parent.document.getElementById('Moonlight_term1' + target).checked = (getCookie('moonlight1[' + target + ']')).toLowerCase() =="true"?1:0;
        }
        if (getCookie('moonlight2[' + target + ']'))
        {
        parent.document.getElementById('Moonlight_term2' + target).checked = (getCookie('moonlight2[' + target + ']')).toLowerCase() =="true"?1:0;
        }
        if (getCookie('weatherA[' + target + ']'))
        {
        parent.document.getElementById('weatherA_' + target).checked = (getCookie('weatherA[' + target + ']')).toLowerCase() =="true"?1:0;
        }
        if (getCookie('weatherB[' + target + ']'))
        {
        parent.document.getElementById('weatherB_' + target).checked = (getCookie('weatherB[' + target + ']')).toLowerCase() =="true"?1:0;
        }
        if (getCookie('weatherC[' + target + ']'))
        {
        parent.document.getElementById('weatherC_' + target).checked = (getCookie('weatherC[' + target + ']')).toLowerCase() =="true"?1:0;
        }
        if (getCookie('weatherD[' + target + ']'))
        {
        parent.document.getElementById('weatherD_' + target).checked = (getCookie('weatherD[' + target + ']')).toLowerCase() =="true"?1:0;
        }
        if (getCookie('Begin_Obs[' + target + ']'))
        {
        parent.document.getElementById('Begin_Obs' + target).value = getCookie('Begin_Obs[' + target + ']'); 
        }
        if (getCookie('End_Obs[' + target + ']'))
        {
        parent.document.getElementById('End_Obs' + target).value = getCookie('End_Obs[' + target + ']'); 
        }
        if (getCookie('comments[' + target + ']'))
        {
        parent.document.getElementById('comments' + target).value = getCookie('comments[' + target + ']');
        }

        }

        }

            if (parent.document.getElementById('Source' +(target)))
            {
                //every 100 ms program checks if tevcat can be initialized (necessary things filled)
                setInterval('tevcat('+(target+1)+')',100);
            }
            
        
        //remove Remove button
        if (target != 0) {
        //var olddiv = parent.document.getElementById('Target' + (target - 1)); 
        //var position = olddiv.childNodes.length;
        parent.document.getElementById('remove' + target).style.visibility='visible';
        var i = target - 1;
        //adds the remove button only for the last target 'div'
        for (i = target - 1; i > 0; i--)
            {
            parent.document.getElementById('remove' + i).style.visibility='hidden';
            }
        //olddiv.removeChild(olddiv.childNodes[position - 2]);
        }

        //alert(target);
        document.getElementById('simbad' + target).setAttribute('onclick', 'setSimbad(' + target + ')');
       
        target++;
        

}

function setSimbad(index)
{
        document.getElementById('main_form').target = 'upload_target';
        document.getElementById('main_form').action = 'readSimbad.php';
        for (i=0;i<target;i++)
        {
            if (document.getElementById('simbadid' + i)!= null)
            {
                document.getElementById('simbadid' + i).parentNode.removeChild(document.getElementById('simbadid' + i));
            }
        }
        parent.document.getElementById('simbad_div').innerHTML += "<input type='hidden' value='" + index +"' id='simbadid" + index + "' name='simbadid" + index + "' />";
        //alert(parent.document.getElementById('simbadid' + index));
        document.getElementById('main_form').submit();
        setTimeout(function () { 
        var extractcoordinates = parent.document.getElementById('upload_target').contentWindow.document.body.innerHTML;
        //alert(parent.document.getElementById('upload_target').contentWindow.document.body.innerHTML);
        var extractra = extractcoordinates.match(/:(.*)[\+\-]/);
        var extractdec = extractcoordinates.match(/[\+\-](.*)\(/);
        var RAarray = new Array();
        var decarray = new Array();
        var RAtemp = new Array();
        var dectemp = new Array();
        var RAfull;
        var decFull;
        RAarray = trim(extractra[1]).split(" ");
        if ((RAarray.length == 2) && (RAarray[1].indexOf(".") !== -1))
        {
            RAtemp = RAarray[1].split(".");
            RAarray.splice(1,1,RAtemp[0],RAtemp[1] * 6);
        }
        else if ((RAarray.length == 2) && (RAarray[1].indexOf(".") === -1))
        {
            RAarray.push("00.00");
        }

        RAarray[2] = parseFloat(RAarray[2]).toFixed(2);
        RAarray[2].toString();
        if (RAarray[2].indexOf(".") === 1)
        {
            RAarray[2] = '0' + RAarray[2]; 
        }
        RAfull = RAarray.join(" ");
        parent.document.getElementById('RA' + index).value = RAfull;

        if (RAfull.length != 11)
        {
            alert("error in RA length");
        }
        //alert(extractra);
        decarray = trim(extractdec[0]).split(" ");

        if (decarray[decarray.length - 1].indexOf("(") !== -1)
        {
            decarray.splice(decarray.length -1,1);
        }

        if ((decarray.length === 2) && (decarray[1].indexOf(".") === -1))
        {
        decarray.push("00.0");
        }
        else if ((decarray.length === 2) && (decarray[1].indexOf(".") !== -1))
        {
            dectemp = decarray[1].split(".");
            decarray.splice(1,1,dectemp[0],dectemp[1] * 6);
            //alert(decarray);
        }

        decarray[2] = parseFloat(decarray[2]).toFixed(1);
        decarray[2].toString();
        if (decarray[2].indexOf(".") === 1)
        {
            decarray[2] = '0' + decarray[2]; 
        }
        decfull = decarray.join(" ");
        parent.document.getElementById('Dec' + index).value = decfull;
        //alert(decarray);


        } , 2000);
}


//gets the cookie specified by name
function getCookie(NameOfCookie)
{ if (document.cookie.length > 0)
{ begin = document.cookie.indexOf(NameOfCookie+"=");
if (begin != -1)
{ begin += NameOfCookie.length+1;
end = document.cookie.indexOf(";", begin);
if (end == -1) end = document.cookie.length;
return unescape(document.cookie.substring(begin, end)); }
}
return null;
}

//removes the last target 'div'
function targetless()
{
target = target - 1;
if (target != 1) {
parent.document.getElementById('remove' + (target - 1)).style.visibility = 'visible';
//parent.location.hash='Target' + (target - 1);

}

}

//clears the target 'div'
function target_clear(target)
{

    var menus = parent.document.getElementById('menu' + target);

    parent.document.getElementById('Source' + target).value='';
    parent.document.getElementById('RA' + target).value='';
    parent.document.getElementById('Dec'+ target).value='';
    parent.document.getElementById('Min_Elev' + target).value='55'; // ???? really?
    parent.document.getElementById('Max_Exposure' + target).value='';
    parent.document.getElementById('Min_Exposure' + target).value='';
    parent.document.getElementById('menu' + target).value = 'Select one';

            if (parent.document.getElementById('on_Opt' + target) != null) 
            {
                menus.parentNode.removeChild(parent.document.getElementById('on_Opt' + target));
            }
            else if (parent.document.getElementById('wob_Opt' + target) != null) 
            {
                menus.parentNode.removeChild(parent.document.getElementById('wob_Opt' + target));
            }

    parent.document.getElementById('noTels1_' + target).checked = 0;
    parent.document.getElementById('noTels2_' + target).checked = 0;
    parent.document.getElementById('noTels3_' + target).checked = 0;
    parent.document.getElementById('noTels4_' + target).checked = 0;
    parent.document.getElementById('Moonlight_term1' + target).checked = 0;
    parent.document.getElementById('Moonlight_term2' + target).checked = 0;
    
    parent.document.getElementById('weatherA_' + target).checked = 0;
    parent.document.getElementById('weatherB_' + target).checked = 0;
    parent.document.getElementById('weatherC_' + target).checked = 0;
    parent.document.getElementById('weatherD_' + target).checked = 0;
    parent.document.getElementById('Begin_Obs' + target).value = '';
    parent.document.getElementById('End_Obs' + target).value = '';
    parent.document.getElementById('comments' + target).value = '';


    document.getElementById('Source' + target).style.backgroundColor = "#FFFFFF";
    document.getElementById('RA' + target).style.backgroundColor = "#FFFFFF";
    document.getElementById('Dec' + target).style.backgroundColor = "#FFFFFF";
    document.getElementById('Min_Elev' + target).style.backgroundColor = "#FFFFFF";
    document.getElementById('Max_Exposure' + target).style.backgroundColor = "#FFFFFF";
    document.getElementById('Min_Exposure' + target).style.backgroundColor = "#FFFFFF";
    document.getElementById('menu' + target).style.backgroundColor = "#FFFFFF";
    document.getElementById('Begin_Obs' + target).style.backgroundColor = "#FFFFFF";
    document.getElementById('End_Obs' + target).style.backgroundColor = "#FFFFFF";

    
    document.getElementById('Source_msg' + target).innerHTML = "";
    document.getElementById('RA_msg' + target).innerHTML = "";
    document.getElementById('Dec_msg' + target).innerHTML = "";
    document.getElementById('Min_Elev_msg' + target).innerHTML = "";
    document.getElementById('Max_Exposure_msg' + target).innerHTML = "";
    document.getElementById('Min_Exposure_msg' + target).innerHTML = "";
    document.getElementById('menu_msg' + target).innerHTML = "";
    document.getElementById('Begin_Obs_msg' + target).innerHTML = "";
    document.getElementById('End_Obs_msg' + target).innerHTML = "";
    document.getElementById('Moonlight_msg' + target).innerHTML = "";


}

//validates whether email has been filled and used in external.php to check that everything has been filled before allowing 'Make Cover' to be clicked
function email_validate_filled()
{
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
    
    var email = parent.document.getElementById('PI_email').value;
    
    if (emailPattern.test(trim(email)) == false)
    {
        return 1;
    } 
    else
    {
        return 0;
    }
}

//validate whether email has been filled to alert user if it is invalid/not filled
function email_validate()
{
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
    
    var email = parent.document.getElementById('PI_email').value;
    
    if (emailPattern.test(trim(email)) == false)
    {

        parent.document.getElementById('Email').innerHTML = 'Please enter a valid email';
        document.getElementById('Email').style.border="1px solid red";
        parent.document.getElementById('PI_email').focus();
        parent.document.getElementById('PI_email').style.backgroundColor = "#F9A7B0";
        parent.document.getElementById('email_span').style.display = 'inline';
        
    } 
    else
    {

    
        parent.document.getElementById('Email').innerHTML = '';
        parent.document.getElementById('PI_email').style.backgroundColor = "#B5EAAA";
    }
}

//this function either enables or disables the tevcat link based on whether necessary information has been filed
function tevcat(identifier)
{

    var which = this; 

    if (parent.document.getElementById('Target' + (identifier - 1)))
    {

        if ((parent.document.getElementById('Source' + (identifier - 1))).value && (validate_filled_RA('RA' + (identifier - 1)) == 0) && (validate_filled_Dec('Dec' + (identifier - 1))) == 0)

        {
        parent.document.getElementById('tev' + (identifier - 1)).disabled=false;
        parent.document.getElementById('tev' + (identifier - 1)).setAttribute('onclick', 'linking(' + identifier + ')');
        }
        else
        {
        parent.document.getElementById('tev' + (identifier - 1)).disabled=true;
        }
    }
}

//regular expression used to check whether RA and Dec are in proper format
    var regRA1 = /^([0-9]{2})+\s([0-9]{2})+\s([0-9]{2})+\.([0-9]{2})$/;
    var regRA2 = /^([\+,\-]{1})+([0-9]{2})+\s([0-9]{2})+\s([0-9]{2})+\.([0-9]{2})$/;
    var regDec1 = /^([0-9]{2})+\s([0-9]{2})+\s([0-9]{2})+\.([0-9]{1})$/;
    var regDec2 = /^([\+,\-]{1})+([0-9]{2})+\s([0-9]{2})+\s([0-9]{2})+\.([0-9]{1})$/;


    var RA; 

//tests that RA is in proper format and places it into proper format for tevcat link
function RA_linking(identifier)
{
    var RA_coordinate = parent.document.getElementById('RA' + identifier).value;
    
    if (regRA1.test(RA_coordinate) == true)
    {
        var RA_Length = RA_coordinate.length;
        var end_RAlength = RA_Length - 6 + 1;
    
        RA = "&ra=" + parent.document.getElementById('RA' + identifier).value.substr(0,2) +"%20" + parent.document.getElementById('RA' +  identifier).value.substr(3,2) + "%20" + parent.document.getElementById('RA' + identifier).value.substr(6,end_RAlength);
    
    } 
    else if (regRA2.test(RA_coordinate) == true)
    {
        var RA_Length = RA_coordinate.length;
        var end_RAlength = RA_Length - 7 + 1;
    
        RA = "&ra=" + parent.document.getElementById('RA' + identifier).value.substr(0,3) +"%20" + parent.document.getElementById('RA' +  identifier).value.substr(4,2) + "%20" + parent.document.getElementById('RA' + identifier).value.substr(7,end_RAlength);
    
    }
    
}


//tests that dec is in proper format and places it into proper format for tevcat link
var dec;

function dec_linking(identifier)
{

    var dec_coordinate = parent.document.getElementById('Dec' + identifier).value;

    
    if (regDec1.test(dec_coordinate) == true)
    {
        var dec_Length = dec_coordinate.length;
        var end_declength = dec_Length - 6 + 1; 
    
    dec = "&dec=" + parent.document.getElementById('Dec' + identifier).value.substr(0,2) + "%20" + parent.document.getElementById('Dec' + identifier).value.substr(3,2) + "%20" + parent.document.getElementById('Dec' + identifier).value.substr(6,end_declength);
    
    } 
    else if (regDec2.test(dec_coordinate) == true)
    {
        var dec_Length = dec_coordinate.length;
        var end_declength = dec_Length - 7 + 1;
    
        dec = "&ra=" + parent.document.getElementById('Dec' + identifier).value.substr(0,3) +"%20" + parent.document.getElementById('Dec' + identifier).value.substr(4,2) + "%20" + parent.document.getElementById('Dec' + identifier).value.substr(7,end_declength);
    
    }

}

//defines the the link for tevcat
function linking(identifier)
{
    RA_linking(identifier - 1);
    dec_linking(identifier - 1);

	var newdate = new Date();
	var full_year = newdate.getFullYear();

    window.open("http://tevcat.uchicago.edu/visplot.cgi?tname=" + parent.document.getElementById('Source' + (identifier - 1)).value + RA + dec + "&lat=31.68&date=1-9-" + full_year + "&lon=-110.86&mode=100");

}

function simbad()
{
    window.open("http://simbad.u-strasbg.fr/simbad/sim-id?output.format=ASCII&Ident=" + parent.document.getElementById('Source' + (target - 1)).value +"");
    
}

//validates RA to let user know if something is not in correct format or not filled
function validate_RA(form_elem, msg_name, msg, span_elem)
{
    var coordinate = parent.document.getElementById(form_elem).value;

    if (trim(coordinate).length == 0) 
    {
        parent.document.getElementById(msg_name).innerHTML = msg;
        parent.document.getElementById(form_elem).focus();
        parent.document.getElementById(form_elem).style.backgroundColor = "#F9A7B0";
        parent.document.getElementById(span_elem).style.display = 'inline';
        
    } 
    else if ((regRA1.test(coordinate) == false) && (regRA2.test(coordinate) == false))
    {
        parent.document.getElementById(msg_name).innerHTML = "Please enter correct format.";
        parent.document.getElementById(form_elem).focus();
        parent.document.getElementById(form_elem).style.backgroundColor = "#F9A7B0";
        parent.document.getElementById(span_elem).style.display = 'inline';
        
    } 
    else 
    {
        parent.document.getElementById(msg_name).innerHTML = '';
        parent.document.getElementById(form_elem).style.backgroundColor = "#B5EAAA";

    }

}

//validates dec to let user know if something is not in correct format or not filled
function validate_Dec(form_elem, msg_name, msg, span_elem)
{
    var coordinate = parent.document.getElementById(form_elem).value;

    if (trim(coordinate).length == 0) 
    {
        parent.document.getElementById(msg_name).innerHTML = msg;
        parent.document.getElementById(form_elem).focus();
        parent.document.getElementById(form_elem).style.backgroundColor = "#F9A7B0";
        parent.document.getElementById(span_elem).style.display = 'inline';
        
    } 
    else if ((regDec1.test(coordinate) == false) && (regDec2.test(coordinate) == false))
    {
        parent.document.getElementById(msg_name).innerHTML = "Please enter correct format.";
        parent.document.getElementById(form_elem).focus();
        parent.document.getElementById(form_elem).style.backgroundColor = "#F9A7B0";
        parent.document.getElementById(span_elem).style.display = 'inline';
        
    } 
    else 
    {
        parent.document.getElementById(msg_name).innerHTML = '';
        parent.document.getElementById(form_elem).style.backgroundColor = "#B5EAAA";

    }

}

//validates dec to check if everything has been filled
function validate_filled_Dec(form_elem)
{

    var coordinate = parent.document.getElementById(form_elem).value;

    if (trim(coordinate).length == 0) 
    {
        return 1;
    } 
    else if ((regDec1.test(coordinate) == false) && (regDec2.test(coordinate) == false))
    {
        return 1;
    } 
    else 
    {
        return 0;
    }


}

//validates RA to check if everything has been filled
function validate_filled_RA(form_elem)
{

    var coordinate = parent.document.getElementById(form_elem).value;

    if (trim(coordinate).length == 0) 
    {
        return 1;
    } 
    else if ((regRA1.test(coordinate) == false) && (regRA2.test(coordinate) == false))
    {
        return 1;
    } 
    else 
    {
        return 0;
    }


}

//checks that a text element has been filled to check if everything has been filled in external.php
function validate_filled(form_elem)
{
   if (trim(parent.document.getElementById(form_elem).value).length == 0) 
   {
       return 1;
   } 
   else 
   {
    return 0;
   }
}

//checks that text element has been filled to inform user
function validate(form_elem, msg_name, msg, span_elem) 
{
    if (trim(parent.document.getElementById(form_elem).value).length == 0) 
    {
        parent.document.getElementById(msg_name).innerHTML = msg;
        parent.document.getElementById(form_elem).focus();
        parent.document.getElementById(form_elem).style.backgroundColor = "#F9A7B0";
        parent.document.getElementById(span_elem).style.display = 'inline';
        parent.document.getElementById(msg_name).style.border="1px solid red";
        
    } 
    else 
    {
        parent.document.getElementById(msg_name).innerHTML = '';
        parent.document.getElementById(form_elem).style.backgroundColor = "#B5EAAA";

    }
}

//checks that the 'select' form element has been filled to check that everything has been filled in external.php
function validate_filled_select(form_elem) 
{
   if (parent.document.getElementById(form_elem).selectedIndex == 0 || (multiselect_validate(form_elem))) {
   return 1;
   } else {
    return 0;
       }
   } 


//checks that only one option is selected for multiple selection options
function multiselect_validate(select) {
    var valid = true;  
    var multi_count = 0;
    for(var i = 0; i < parent.document.getElementById(select).options.length; i++) {  
        if(parent.document.getElementById(select).options[i].selected) {
            multi_count++;
        }  
    }  
    if (multi_count == 1) {
    valid = false;
    }
    else {
    valid = true;
    }
    return valid;  
}

//validates 'select' form elements for user
function validate_select(form_elem, msg_name, msg, span_elem) {
   if (parent.document.getElementById(form_elem).selectedIndex == 0 || (multiselect_validate(form_elem))) {
   parent.document.getElementById(msg_name).innerHTML = msg;
   parent.document.getElementById(msg_name).style.border="1px solid red";
   parent.document.getElementById(form_elem).focus();
   parent.document.getElementById(form_elem).style.backgroundColor = "#F9A7B0";
   parent.document.getElementById(span_elem).style.display = 'inline';
   
   } else {
    parent.document.getElementById(msg_name).innerHTML = '';
    parent.document.getElementById(form_elem).style.backgroundColor = "#B5EAAA";

       }
   } 

//validates radio buttons to check everything has been filled in external.php before 'Make Cover' works
function validate_filled_radio(form_elem1, form_elem2) {
   if ((parent.document.getElementById(form_elem1).checked == false ) && (parent.document.getElementById(form_elem2).checked == false )) {
   return 1;
   } else {
    return 0;
       }
   }

//validate radio buttons to let user know if it has been filled and in right format
function validate_radio(form_elem1, form_elem2 , msg_name, msg, span_elem) {
   if ((parent.document.getElementById(form_elem1).checked == false ) && (parent.document.getElementById(form_elem2).checked == false )) {
   parent.document.getElementById(msg_name).innerHTML = msg;
   parent.document.getElementById(msg_name).style.border="1px solid red";
   parent.document.getElementById(form_elem1).focus();
   parent.document.getElementById(span_elem).style.display = 'inline';
   } else {
    parent.document.getElementById(msg_name).innerHTML = '';
       }
}

//validates that checked form has been filled to check everything has been filled in external.php before 'Make Cover' works
function validate_filled_check(form_elem1, form_elem2, form_elem3, form_elem4, msg_name, msg, span_elem) {
   if ((parent.document.getElementById(form_elem1).checked == false ) && (parent.document.getElementById(form_elem2).checked == false ) && (parent.document.getElementById(form_elem3).checked == false ) && (parent.document.getElementById(form_elem4).checked == false )) {
   return 1;
   } else {
       return 0;
       }
}

//validates that check form elements have been filled correctly and informs user
function validate_check(form_elem1, form_elem2, form_elem3, form_elem4, msg_name, msg, span_elem) {
   if ((parent.document.getElementById(form_elem1).checked == false ) && (parent.document.getElementById(form_elem2).checked == false ) && (parent.document.getElementById(form_elem3).checked == false ) && (parent.document.getElementById(form_elem4).checked == false )) {
   parent.document.getElementById(msg_name).innerHTML = msg;
   parent.document.getElementById(msg_name).style.border="1px solid red";
   parent.document.getElementById(form_elem1).focus();
   parent.document.getElementById(span_elem).style.display = 'inline';
   } else {
    parent.document.getElementById(msg_name).innerHTML = '';
       }
}

//check that file is filled with right extension to check everything has been filled in external.php before 'Make Cover' works
function validate_filled_file(filename, msg_name, msg) {
    var file = parent.document.getElementById(filename).value;
    var ext = file.slice(file.indexOf(".")).toLowerCase();

    if (file == "") 
    {
        return 1;
    }
    else if (ext != ".pdf") 
    {
        return 1;
    }
    else 
    {
        return 0;
    }
}

//checks file is filled with right extension and alerts reader if not
/*
function validate_file(filename, msg_name, msg,span_elem) {
   var file = parent.document.getElementById(filename).value;
   var ext = file.slice(file.indexOf(".")).toLowerCase();
   if (file == "") 
   {
       parent.document.getElementById(msg_name).innerHTML = msg;
       parent.document.getElementById(msg_name).style.border="1px solid red";
       parent.document.getElementById(filename).focus();
       parent.document.getElementById(span_elem).style.display = 'inline';

   }
   else if (ext != ".pdf") 
   {
       parent.document.getElementById(msg_name).innerHTML = "Please choose a pdf file";
       parent.document.getElementById(msg_name).style.border="1px solid red";
       parent.document.getElementById(filename).focus();
       parent.document.getElementById(span_elem).style.display = 'inline';
   }
   else 
   {
    parent.document.getElementById(msg_name).innerHTML = '';
   }
}
*/

//gets rid of whitespace; used to measure length of coordinates to prevent only whitespace (?? necesary when we do regular expression?)
function trim(str) {
    str = str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
   return str;
}

//COMPLETELY UNNECESSARY?
function retCounter(){
    return target;
    }

var clickedIt = false;

function cleartextarea(id){ 
if (id.value == 'Enter Comments Here'){
id.value="";
clickedIt=true; 
} 
}

function textRadioBind(thisElem, textId,radioName){

    var radioHolder;
    radioHolder = document.getElementsByName(radioName);
    if (document.getElementById(textId).id == thisElem.id)
    {
        for (var i=0;i<radioHolder.length;i++)
        {
            radioHolder[i].checked = false;
        }
    }
    else 
    {

        document.getElementById(textId).value= '';
    }


}

function duplicate() {


addTarget();
//alert(this.parentNode.childNodes.length);
/*
alert( '1' + this.parentNode.childNodes[1].id);
alert( '2' + this.parentNode.childNodes[2].id);
alert( '3' + this.parentNode.childNodes[3].id);
alert( '4' + this.parentNode.childNodes[4].id);
alert( '5' + this.parentNode.childNodes[5].id); //simbad0
alert( '6' + this.parentNode.childNodes[6].id);
alert( '7' + this.parentNode.childNodes[7].id); 
alert( '8' + this.parentNode.childNodes[8].id);
alert( '9' + this.parentNode.childNodes[9].id); //RA0
alert( '10' + this.parentNode.childNodes[10].id);
alert( '11' + this.parentNode.childNodes[11].id);
alert( '12' + this.parentNode.childNodes[12].id);
alert( '13' + this.parentNode.childNodes[13].id);
alert( '14' + this.parentNode.childNodes[14].id);
alert( '15' + this.parentNode.childNodes[15].id);
alert( '16' + this.parentNode.childNodes[16].id);
alert( '17' + this.parentNode.childNodes[17].id); //Dec0
/*
alert( '18' + this.parentNode.childNodes[18].id);
alert( '19' + this.parentNode.childNodes[19].id);
alert( '20' + this.parentNode.childNodes[20].id);
alert( '21' + this.parentNode.childNodes[21].id);
alert( '22' + this.parentNode.childNodes[22].id);
alert( '23' + this.parentNode.childNodes[23].id);
alert( '24' + this.parentNode.childNodes[24].id);
alert( '25' + this.parentNode.childNodes[25].id); //Min_Elev0
alert( '26' + this.parentNode.childNodes[26].id);
alert( '27' + this.parentNode.childNodes[27].id);
alert( '28' + this.parentNode.childNodes[28].id);
alert( '29' + this.parentNode.childNodes[29].id);
alert( '30' + this.parentNode.childNodes[30].id);
alert( '31' + this.parentNode.childNodes[31].id); //Max_Exposure0
*/
/*
alert( '32' + this.parentNode.childNodes[32].id);
alert( '33' + this.parentNode.childNodes[33].id);
alert( '34' + this.parentNode.childNodes[34].id);
alert( '35' + this.parentNode.childNodes[35].id);
alert( '36' + this.parentNode.childNodes[36].id);
alert( '37' + this.parentNode.childNodes[37].id); //Min_Exposure0
alert( '38' + this.parentNode.childNodes[38].id);
alert( '39' + this.parentNode.childNodes[39].id);
alert( '40' + this.parentNode.childNodes[40].id);
alert( '41' + this.parentNode.childNodes[41].id);
alert( '42' + this.parentNode.childNodes[42].id);
alert( '43' + this.parentNode.childNodes[43].id);
//alert( '44' + this.parentNode.childNodes[44].childNodes[1].value);
//alert( '44' + this.parentNode.childNodes[44].childNodes[1].id);
//alert( '44' + this.parentNode.childNodes[44].childNodes[1].childNodes[1].value);
//alert( '44' + this.parentNode.childNodes[44].childNodes[1].childNodes[2].value);
//alert( '44' + this.parentNode.childNodes[44].childNodes[2].id);
//alert( '44' + this.parentNode.childNodes[44].childNodes[3].childNodes[0].checked);
//alert( '44' + this.parentNode.childNodes[44].childNodes[1].childNodes[2].length);
//alert( '44' + this.parentNode.childNodes[44].childNodes[1].childNodes[2].childNodes[2]);
//alert( '44' + this.parentNode.childNodes[44].childNodes[1].childNodes[2].childNodes[3]);
//alert( '44' + this.parentNode.childNodes[44].childNodes[1].childNodes[2].childNodes[4]);
/*
alert( '44' + this.parentNode.childNodes[44].childNodes[1].childNodes[3].value);
alert( '44' + this.parentNode.childNodes[44].childNodes[1].childNodes[4].value);
alert( '44' + this.parentNode.childNodes[44].childNodes[1].childNodes[5].value);
*/
//alert( '45' + this.parentNode.childNodes[45]);
/*
alert( '46' + this.parentNode.childNodes[46].id); //Observation0
alert( '47' + this.parentNode.childNodes[47].id);
alert( '48' + this.parentNode.childNodes[48].id); //noTels1_0
alert( '49' + this.parentNode.childNodes[49].id);
alert( '50' + this.parentNode.childNodes[50].id); //noTels2_0
alert( '51' + this.parentNode.childNodes[51].id);
alert( '52' + this.parentNode.childNodes[52].id); //noTels3_0
alert( '53' + this.parentNode.childNodes[53].id);
alert( '54' + this.parentNode.childNodes[54].id); //noTels4_0
alert( '55' + this.parentNode.childNodes[55].id);
alert( '56' + this.parentNode.childNodes[56].id);
alert( '57' + this.parentNode.childNodes[57].id);
alert( '58' + this.parentNode.childNodes[58].id); //Moonlight_term10
alert( '59' + this.parentNode.childNodes[59].id);
alert( '60' + this.parentNode.childNodes[60].id); //Moonlight_term20
alert( '61' + this.parentNode.childNodes[61].id);
alert( '62' + this.parentNode.childNodes[62].id);
alert( '63' + this.parentNode.childNodes[63].id);
alert( '64' + this.parentNode.childNodes[64].id);
alert( '65' + this.parentNode.childNodes[65].id);
alert( '66' + this.parentNode.childNodes[66].id); //weatherA_0
alert( '67' + this.parentNode.childNodes[67].id);
alert( '68' + this.parentNode.childNodes[68].id); //weatherB_0
alert( '69' + this.parentNode.childNodes[69].id);
alert( '70' + this.parentNode.childNodes[70].id); //weatherC_0
alert( '71' + this.parentNode.childNodes[71].id);
alert( '72' + this.parentNode.childNodes[72].id); //weatherD_0
alert( '73' + this.parentNode.childNodes[73].id);
alert( '74' + this.parentNode.childNodes[74].id);
alert( '75' + this.parentNode.childNodes[75].id);
alert( '76' + this.parentNode.childNodes[76].id); //Begin_Obs0
alert( '77' + this.parentNode.childNodes[77].id);
alert( '78' + this.parentNode.childNodes[78].id);
alert( '79' + this.parentNode.childNodes[79].id);
alert( '80' + this.parentNode.childNodes[80].id); //End_Obs0
alert( '81' + this.parentNode.childNodes[81].id);
alert( '82' + this.parentNode.childNodes[82].id);
alert( '83' + this.parentNode.childNodes[83].id);
alert( '84' + this.parentNode.childNodes[84].id); //tev0
alert( '85' + this.parentNode.childNodes[85].id);
alert( '86' + this.parentNode.childNodes[86].id);
alert( '87' + this.parentNode.childNodes[87].id);
alert( '88' + this.parentNode.childNodes[88].id); //comments0
alert( '89' + this.parentNode.childNodes[89].id);
alert( '90' + this.parentNode.childNodes[90].id);
alert( '91' + this.parentNode.childNodes[91].id);
alert( '92' + this.parentNode.childNodes[92].id);
alert( '93' + this.parentNode.childNodes[93].id);
alert( '94' + this.parentNode.childNodes[94].id);
alert( '95' + this.parentNode.childNodes[95].id);
alert( '96' + this.parentNode.childNodes[96].id);
//alert(this.parentNode.childNodes[46].checked);
*/


document.getElementById('Source' + (target -1)).value =  this.parentNode.childNodes[1].value;
document.getElementById('RA' + (target - 1)).value = this.parentNode.childNodes[9].value; //9
document.getElementById('Dec' + (target - 1)).value = this.parentNode.childNodes[17].value; //17
document.getElementById('Min_Elev' + (target - 1)).value = this.parentNode.childNodes[25].value; ///25
document.getElementById('Max_Exposure' + (target - 1)).value = this.parentNode.childNodes[31].value; //31
document.getElementById('Min_Exposure' + (target - 1)).value = this.parentNode.childNodes[37].value; //37
document.getElementById('menu' + (target - 1)).value = this.parentNode.childNodes[46].childNodes[1].value; //46
    madeSelection();
if (this.parentNode.childNodes[46].childNodes[3])
{
    if (this.parentNode.childNodes[46].childNodes[3].id == 'wob_Opt' + (target - 2))
    {
    document.getElementById('wobble1_' + (target - 1)).checked = this.parentNode.childNodes[46].childNodes[3].childNodes[0].checked;
    document.getElementById('wobble2_' + (target - 1)).checked = this.parentNode.childNodes[46].childNodes[3].childNodes[2].checked;
    document.getElementById('wobble3_' + (target - 1)).checked = this.parentNode.childNodes[46].childNodes[3].childNodes[4].checked;
    document.getElementById('wobble4_' + (target - 1)).value = this.parentNode.childNodes[46].childNodes[3].childNodes[6].value;
    }
    if (this.parentNode.childNodes[46].childNodes[3].id == 'on_Opt' + (target - 2))
    {
    document.getElementById('onoff1_' + (target - 1)).checked = this.parentNode.childNodes[46].childNodes[3].childNodes[0].checked;
    document.getElementById('onoff2_' + (target - 1)).checked = this.parentNode.childNodes[46].childNodes[3].childNodes[2].checked;
    document.getElementById('onoff3_' + (target - 1)).checked = this.parentNode.childNodes[46].childNodes[3].childNodes[4].checked;
    document.getElementById('onoff4_' + (target - 1)).value = this.parentNode.childNodes[46].childNodes[3].childNodes[6].value;
    }
}

document.getElementById('noTels1_' + (target - 1)).checked = this.parentNode.childNodes[48].checked; //48
document.getElementById('noTels2_' + (target - 1)).checked = this.parentNode.childNodes[50].checked; //50
document.getElementById('noTels3_' + (target - 1)).checked = this.parentNode.childNodes[52].checked; //52
document.getElementById('noTels4_' + (target - 1)).checked = this.parentNode.childNodes[54].checked; //54
document.getElementById('Moonlight_term1' + (target - 1)).checked = this.parentNode.childNodes[58].checked; //58
document.getElementById('Moonlight_term2' + (target - 1)).checked = this.parentNode.childNodes[60].checked; //60
document.getElementById('weatherA_' + (target - 1)).checked = this.parentNode.childNodes[66].checked; //66
document.getElementById('weatherB_' + (target - 1)).checked = this.parentNode.childNodes[68].checked; //68
document.getElementById('weatherC_' + (target - 1)).checked = this.parentNode.childNodes[70].checked; //70
document.getElementById('weatherD_' + (target - 1)).checked = this.parentNode.childNodes[72].checked; //72
document.getElementById('Begin_Obs' + (target -1)).value =  this.parentNode.childNodes[76].value; //76
document.getElementById('End_Obs' + (target - 1)).value = this.parentNode.childNodes[80].value; //80
document.getElementById('comments' + (target - 1)).value = this.parentNode.childNodes[88].value; //88


}

</script>
