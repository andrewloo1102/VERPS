//this function is called to validate the ith target
function targets_validate(i) {

        if (document.getElementById('Target' + i)) 
        {

            validate('Source' + i, 'Source_msg' + i, 'Please enter a source', 'source_span' + i);
            validate_RA('RA' + i, 'RA_msg' + i, 'Please enter a RA','RA_span' + i);
            validate_Dec('Dec' + i, 'Dec_msg' + i, 'Please enter a Dec', 'Dec_span' + i);
            validate('Min_Elev' + i, 'Min_Elev_msg' + i, 'Please enter a min elevation','min_elev_span' + i);
            validate('Max_Exposure' + i, 'Max_Exposure_msg' + i, 'Please enter a max exposure','max_exposure_span' + i);
            validate('Min_Exposure' + i, 'Min_Exposure_msg' + i, 'Please enter a min exposure','min_exposure_span' + i);
            validate_radio('Moonlight_term1' + i, 'Moonlight_term2' + i, 'Moonlight_msg' + i, 'Please enter moonlight','moonlight_span' + i);
            validate('Begin_Obs' + i, 'Begin_Obs_msg' + i, 'Please enter a when it is observable from', 'obs_from_span' + i);
            validate('End_Obs' + i, 'End_Obs_msg' + i, 'Please enter a when it is observable to', 'obs_end_span' + i);
            validate_select('menu' + i, 'menu_msg' + i, 'Please enter an observation mode','observation_mode_span' + i);
            setCookie('Source[' + i + ']', document.getElementById('Source' + i).value , 7);
            setCookie('RA[' + i + ']', document.getElementById('RA' + i).value , 7);
            setCookie('Dec[' + i + ']', document.getElementById('Dec' + i).value , 7);
            setCookie('Min_Elev[' + i + ']', document.getElementById('Min_Elev' + i).value , 7);
            setCookie('Max_Exposure[' + i +']', document.getElementById('Max_Exposure' + i).value , 7);
            setCookie('Min_Exposure[' + i + ']', document.getElementById('Min_Exposure' + i).value , 7);
            setCookie('menu[' + i + ']', document.getElementById('menu' + i).value , 7);

            if (document.getElementById('wob_Opt' + i))
            {
            setCookie('wobble1[' + i + ']', document.getElementById('wobble1_' + i).checked, 7);
            setCookie('wobble2[' + i + ']', document.getElementById('wobble2_' + i).checked, 7);
            setCookie('wobble3[' + i + ']', document.getElementById('wobble3_' + i).checked, 7);
            setCookie('wobble4[' + i + ']', document.getElementById('wobble4_' + i).value, 7);
            }
            else if (document.getElementById('on_Opt' + i))
            {
            setCookie('onoff1[' + i + ']', document.getElementById('onoff1_' + i).checked, 7);
            setCookie('onoff2[' + i + ']', document.getElementById('onoff2_' + i).checked, 7);
            setCookie('onoff3[' + i + ']', document.getElementById('onoff3_' + i).checked, 7);
            setCookie('onoff4[' + i + ']', document.getElementById('onoff4_' + i).value, 7);
            }
            setCookie('noTels1[' + i + ']', document.getElementById('noTels1_' + i).checked, 7);
            setCookie('noTels2[' + i + ']', document.getElementById('noTels2_' + i).checked, 7);
            setCookie('noTels3[' + i + ']', document.getElementById('noTels3_' + i).checked, 7);
            setCookie('noTels4[' + i + ']', document.getElementById('noTels4_' + i).checked, 7);
            setCookie('moonlight1[' + i + ']', document.getElementById('Moonlight_term1' + i).checked, 7);
            setCookie('moonlight2[' + i + ']', document.getElementById('Moonlight_term2' + i).checked, 7);
            setCookie('weatherA[' + i + ']', document.getElementById('weatherA_' + i).checked, 7);
            setCookie('weatherB[' + i + ']', document.getElementById('weatherB_' + i).checked, 7);
            setCookie('weatherC[' + i + ']', document.getElementById('weatherC_' + i).checked, 7);
            setCookie('weatherD[' + i + ']', document.getElementById('weatherD_' + i).checked, 7);
            setCookie('Begin_Obs[' + i +']', document.getElementById('Begin_Obs' + i).value , 7);
            setCookie('End_Obs[' + i + ']', document.getElementById('End_Obs' + i).value , 7);
            setCookie('comments[' + i + ']', document.getElementById('comments' + i).value, 7);

        }
}

//this function checks that the target form is completely filled in order to determine when everything has been filled in external.php
function targets_filled()
{


    var counter = 0;

    //alert(target);

    var targets_filled_array = Array();

    if (target > 0)
    {

        for (i = 0; i < target + 1; i++)
        {
            if (document.getElementById('Target' + i))
            {

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

                a = validate_filled('Source' + i, 'Source_msg' + i, 'Please enter a source');
                b = validate_filled_RA('RA' + i);
                c = validate_filled_Dec('Dec' + i);
                d = validate_filled('Min_Elev' + i, 'Min_Elev_msg' + i, 'Please enter a source');
                e = validate_filled('Max_Exposure' + i, 'Max_Exposure_msg' + i, 'Please enter a source');
                f = validate_filled('Min_Exposure' + i, 'Min_Exposure_msg' + i, 'Please enter a source');
                g = validate_filled('menu' + i, 'menu_msg' + i, 'Please enter a source');
                h = validate_filled_radio('Moonlight_term1' + i, 'Moonlight_term2' + i, 'Moonlight_msg' + i, 'Please enter a source');
                ii = validate_filled('Begin_Obs' + i, 'Begin_Obs_msg' + i, 'Please enter a source');
                j = validate_filled('End_Obs' + i, 'End_Obs_msg' + i, 'Please enter a source');
                k = validate_filled_select('menu' + i, 'menu_msg' + i, 'Please enter an observation mode');


                if ((a == 1) || (b == 1) || (c == 1) || (d == 1) || (e == 1) || (f == 1) || (g == 1) || (h == 1) || (ii == 1) || (j == 1) || (k == 1))
                {
                    targets_filled_array[i] = 1;
                }
                else 
                {
                    targets_filled_array[i] = 0;
                }
            }
        }
        var j;
        for (j = 0; j < target + 1; j++)
        {
            if (targets_filled_array[j] == 1)
                {
                counter++;
                }
        }

            if (counter != 0)
                return 1;
            else
                return 0;

    }
    else
    {
        return 1;
    }
    
}
