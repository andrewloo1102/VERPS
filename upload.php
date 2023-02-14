<?php
include 'readFile2.php';
require 'addInput_frame.php'; //this file creates new target forms 



read();
?>
<script type="text/javascript" src="jquery.js"></script>

<script type='text/javascript'>

var errors = "<?= $_POST['error'] ?>";





//alert(parent.document.getElementById('Targets'));

//checks if text file is entered
if (errors == 1) 
{
    parent.document.getElementById('Target_msg').innerHTML = "Please enter a text file";
}
else if (errors == 2)
{
    parent.document.getElementById('Target_msg').innerHTML = "File must be text";
}
else
{


    var NoTarget = parent.document.getElementById('Targets').childNodes.length;
    //alert(NoTarget);

    //5-3 = 2

    for (i = 0; i < NoTarget - 2; i++)
    {
    //alert(i);
    //parent.document.getElementById('Targets').removeChild(parent.document.getElementById('Targets').childNodes[i + 2]);
    parent.document.getElementById('Targets').removeChild(parent.document.getElementById('Target' + i));
    }
        //alert("HI");

        /*
        for (i = 0; i < no_tar; i++)
        {
            parent.document.removeChild(parent.document.getElementById('Target' + i))
        }
        */

        //fills out the target forms using the textfile
        //parent.document.getElementById('upload').disabled="true";
        var source = "<?= implode(",", $_POST['Source']) ?>";
        var ra ="<?= implode(",", $_POST['RA']) ?>";
        var dec = "<?= implode(",", $_POST['Dec']) ?>";

        var source_array = new Array();
        var ra_array = new Array();
        var dec_array = new Array();

        source_array = source.split(",");
        ra_array = ra.split(",");
        dec_array = dec.split(",");

        var no_tar = source_array.length;
        //alert("number: " + no_tar);

        if (parent.target)
        {
            parent.target = 0;
        }

        for (i = 0; i < no_tar; i++)
        {
        parent.addTarget();
        parent.document.getElementById('Source' + i).value = source_array[i];
        parent.document.getElementById('RA' + i).value = ra_array[i];
        parent.document.getElementById('Dec' + i).value = dec_array[i];
        
        }


          //$("#file_tar", parent.document).replaceWith("<input type='file' id='file_tar' />");

       // alert(parent.document.getElementById('Targets').childNodes[2].id);
      //  alert(parent.document.getElementById('Targets').childNodes[3].id);
      //  alert(parent.document.getElementById('Targets').childNodes[4].id);
        //alert(parent.document.getElementById('Targets').childNodes[5].id);
        //alert(parent.document.getElementById('Target0').parentNode.id);

       $("#file_tar", window.parent.document).replaceWith($("#file_tar", window.parent.document).clone());

       //$('#file_tar').replaceWith($('#file_tar').clone());
       //alert('hi' + parent.document.getElementById('file_tar').parentNode.id);

}
</script>
