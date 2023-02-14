


function getSaved(data,id)
{
    //var saved_counts = 0;

    while (window.saved_form[0].indexOf(data) == -1)
    {
        saved_form.splice(0,1);
    }

    while(trim(window.saved_form[0]) != "")
    {
    document.getElementById(id).value = trim(window.saved_form[0]);
    }

}




function getSaved(data,id)
{
    var saved_counts = 0;

    while (window.saved_form[saved_counts].indexOf(data) == -1)
    {
        saved_form.splice(0,1);
        saved_counts++;
    }

    document.getElementById(id).value = trim(window.saved_form[saved_counts].substring(data.length + window.saved_form[saved_counts].indexOf(data)));
        
        saved_form.splice(0,1);

}

//////// //////// ////////

while indexOf not true,

window.saved_form.splice(
//////// //////// //////// //////// 
//alert(window.saved_form);
    document.getElementById('working_group').value = trim(window.saved_form[2].substring("Science Working Group: ".length + window.saved_form[2].indexOf("Science Working Group: ")));


    if (window.saved_form[4].indexOf("1") != -1)
    {
        document.getElementById('themes1').checked = true;
    }    

    if (window.saved_form[4].indexOf("2") != -1)
    {
        document.getElementById('themes2').checked = true;
    }    

    if (window.saved_form[4].indexOf("3") != -1)
    {
        document.getElementById('themes3').checked = true;
    }    

    if (window.saved_form[4].indexOf("4") != -1)
    {
        document.getElementById('themes4').checked = true;
    }    

    //alert(window.saved_form[6].substring("Multi-Year Project?: ".length + window.saved_form[6].indexOf("Multi-Year Project?: ")));

    if (trim(window.saved_form[6].substring("Multi-Year Project?: ".length + window.saved_form[6].indexOf("Multi-Year Project?: "))) == "yes")
        document.getElementById('multi_year1').checked = true;
    else if (trim(window.saved_form[6].substring("Multi-Year Project?: ".length + window.saved_form[6].indexOf("Multi-Year Project?: "))) == "no")
        document.getElementById('multi_year2').checked = true;

    document.getElementById('title').value = trim(window.saved_form[8].substring("Title: ".length + window.saved_form[8].indexOf("Title: ")));
    
    //var str="Hello planet earth, you are a great planet.";
    //var n=str.lastIndexOf("planet");
    //alert(str.length);
    //alert(n);
    
    //alert(window.saved_form[8].lastIndexOf("Title: "));
    //alert(window.saved_form[10].lastIndexOf("Abstract: "));
    document.getElementById('Abstract').value = trim(window.saved_form[10].substring("Abstract: ".length + window.saved_form[10].indexOf("Abstract: ")));
    
    document.getElementById('PI_first').value = trim(window.saved_form[14].substring("First name: ".length + window.saved_form[14].indexOf("First name: ")));

    document.getElementById('PI_last').value = trim(window.saved_form[16].substring("Last name: ".length + window.saved_form[16].indexOf("Last name: ")));
    
    document.getElementById('PI_email').value = trim(window.saved_form[18].substring("Email: ".length + window.saved_form[18].indexOf("Email: ")));

    document.getElementById('PI_institution').value = trim(window.saved_form[20].substring("Institution: ".length + window.saved_form[20].indexOf("Institution: ")));


    if (trim(window.saved_form[22].substring("Fermi-GI award? ".length + window.saved_form[22].indexOf("Fermi-GI award? ")))== "yes")
    {
    document.getElementById('Fermi1').checked = true;
    }
    else if (trim(window.saved_form[22].substring("Fermi-GI award? ".length + window.saved_form[22].indexOf("Fermi-GI award? ")))== "no")
    {
    document.getElementById('Fermi2').checked = true;
    }

    document.getElementById('analysis').value = trim(window.saved_form[24].substring("Who will analyze and when: ".length + window.saved_form[24].indexOf("Who will analyze and when: ")));


    if (trim(window.saved_form[26].substring("Multiwavelength requirement: ".length + window.saved_form[26].indexOf("Multiwavelength requirement: ")))== "yes")
    {
        document.getElementById('mw1').checked = true;
        mw();
        document.getElementById('mw').value = trim(window.saved_form[28]);
    }
    else if (trim(window.saved_form[26].substring("Multiwavelength requirement: ".length + window.saved_form[26].indexOf("Multiwavelength requirement: ")))== "no")
    {
        document.getElementById('mw2').checked = true;
    }



    if (trim(window.saved_form[30].substring("Thesis: ".length + window.saved_form[30].indexOf("Thesis: ")))== "yes")
    {
    document.getElementById('thesis1').checked = true;
    thesis();
    document.getElementById('thesis').value = trim(window.saved_form[32].substring("Whom: ".length + window.saved_form[32].indexOf("Whom: ")));
    }
    else if (trim(window.saved_form[30].substring("Thesis: ".length + window.saved_form[30].indexOf("Thesis: ")))== "no")
    {
    document.getElementById('thesis2').checked = true;
    }


    if (trim(window.saved_form[34].substring("Target of Opportunity observations? ".length + window.saved_form[34].indexOf("Target of Opportunity observations? ")))== "yes")
    {
    document.getElementById('opportunity1').checked = true;
    opportunity();
    document.getElementById('trigger_cond').value = trim(window.saved_form[36].substring("Trigger condition: ".length + window.saved_form[36].indexOf("Trigger condition: ")));
    document.getElementById('trigger_ratepyr').value = trim(window.saved_form[38].substring("Anticipated rate of triggers per year: ".length + window.saved_form[38].indexOf("Anticipated rate of triggers per year: ")));
    document.getElementById('min_obshrsptrigger').value = trim(window.saved_form[40].substring("Minimum observation-hours per trigger: ".length + window.saved_form[40].indexOf("Minimum observation-hours per trigger: ")));

    document.getElementById('thesis').value = trim(window.saved_form[32].substring("Whom: ".length + window.saved_form[32].indexOf("Whom: ")));

    }
    else if (trim(window.saved_form[34].substring("Target of Opportunity observations? ".length + window.saved_form[34].indexOf("opportunity2")))== "no")
    {
    document.getElementById('opportunity2').checked = true;
    }

    //alert(JSON.stringify(window.saved_form).split("\\n\"\,\"\\n\",\""));
    var endTargetLoop;
    alert(window.saved_form.length);
    endTargetLoop = (window.saved_form.length - 43)/28;
    alert(endTargetLoop);
    for (var i=0;i<endTargetLoop;i++)
    { 
    addTarget();
    //alert(window.saved_form[42 +2 + i*28].indexOf("RA: "));
    //alert(trim(window.saved_form[42+ 4+ i*28].substring("RA: ".length + window.saved_form[42 +4 + i*28].indexOf("RA: "))));

    document.getElementById('Source' + i).value = trim(window.saved_form[42 +2 + i*28].substring("Source: ".length + window.saved_form[42 +2 + i*28].indexOf("Source: ")));
    document.getElementById('RA' + i).value = trim(window.saved_form[42+ 4+ i*28].substring("RA: ".length + window.saved_form[42 +4 + i*28].indexOf("RA: ")));
    document.getElementById('Dec' + i).value = trim(window.saved_form[42+ 6 + i*28].substring("dec: ".length + window.saved_form[42 +6 + i*28].indexOf("dec: ")));


    document.getElementById('Min_Elev' + i).value = trim(window.saved_form[42+ 8 + i*28].substring("Minimum Elevation: ".length + window.saved_form[42 +8 + i*28].indexOf("Minimum Elevation: ")));

    document.getElementById('Max_Exposure' + i).value = trim(window.saved_form[42+ 10 + i*28].substring("Requested Exposure (hours): ".length + window.saved_form[42 +10 + i*28].indexOf("Requested Exposure (hours): ")));

    document.getElementById('Min_Exposure' + i).value = trim(window.saved_form[42+ 12 + i*28].substring("Minimum Exposure (hours): ".length + window.saved_form[42 +12 + i*28].indexOf("Requested Exposure (hours): ")));
    
    document.getElementById('menu' + i).value = trim(window.saved_form[42+ 14 + i*28].substring("Observation Mode: ".length + window.saved_form[42 +14 + i*28].indexOf("Observation Mode: ")));

    document.getElementById('Begin_Obs' + i).value = trim(window.saved_form[42+ 24 + i*28].substring("Observation from: ".length + window.saved_form[42 +24 + i*28].indexOf("Observation from: ")));

    document.getElementById('End_Obs' + i).value = trim(window.saved_form[42+ 26 + i*28].substring("to: ".length + window.saved_form[42 +26 + i*28].indexOf("to: ")));

    }


}
