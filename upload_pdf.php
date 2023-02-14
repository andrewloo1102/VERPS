<?php
    
    //matches errors with a number to check easier later in the code below
    if (($_FILES["file"]["error"]) == 4)
    {
    $pdf_status = 4;
    }
	/*
    else if ($_FILES['file']['type'] != "application/pdf")
    {
    $pdf_status = 3;
    }
	*/
    else if ($_FILES["file"]["size"] > 10000000)
    {
    $pdf_status = 2;
    }
    else if ($_FILES["file"]["error"] > 0)
    $pdf_status = 5;
    else
    {
      $pdf_status = 0;
      /*
      $Upload = $_FILES["file"]["name"];
      $Type = $_FILES["file"]["type"];
      $Size = ($_FILES["file"]["size"] / 1024);
      $Stored = $_FILES["file"]["tmp_name"];
      */
/*
        $target_path = "uploads/";
        $newname = $_POST['PI_last'] . "_" . $proposal_id . ".pdf";

        $target_path = $target_path . $newname;

        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
        {

        } else
        {
            $pdf_status = 6;
            //echo "<br />There was an error uploading the file, please try again!";
        }

        $ourFileName = $target_path;
        //$fh = fopen($ourFileName, 'r') or die("Can't open file");
*/
    //opens the file and finds out how many pages are in the pdf 
    $fp = @fopen(preg_replace("/\[(.*?)\]/i", "",$_FILES['file']['tmp_name']),"r");
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
    
            if($max==0)
            {
                    $im = new imagick($filepath);
                    $max=$im->getNumberImages();
            }
    }


?>
<script type='text/javascript'>
var pdf_status = "<?= $pdf_status ?>";
if (pdf_status == 5)
{
   parent.document.getElementById('file_msg').innerHTML = "Error!";
   parent.window.proposal_fill = 1;
   parent.document.getElementById('file_msg').style.border="1px solid red";
   parent.document.getElementById('file').focus();
   parent.document.getElementById('file_span').style.display = 'inline';


}
else if (pdf_status == 4)
{
   parent.document.getElementById('file_msg').innerHTML = "Please upload a pdf file (4)";
   parent.window.proposal_fill = 1;
   parent.document.getElementById('file_msg').style.border="1px solid red";
   parent.document.getElementById('file').focus();
   parent.document.getElementById('file_span').style.display = 'inline';
   
   
}
else if (pdf_status == 3)
{
   parent.document.getElementById('file_msg').innerHTML = "Wrong type. Please upload a pdf file (3)";
   parent.document.getElementById('file_msg').style.border="1px solid red";
   parent.document.getElementById('file').focus();
   parent.document.getElementById('file_span').style.display = 'inline';

   
   parent.window.proposal_fill = 1;
   
}
else if (pdf_status == 2)
{
   parent.document.getElementById('file_msg').innerHTML = "Please upload less than 10 mb";
   parent.window.proposal_fill = 1;
   parent.document.getElementById('file_msg').style.border="1px solid red";
   parent.document.getElementById('file').focus();
   parent.document.getElementById('file_span').style.display = 'inline';
   
   

}
else if (pdf_status == 0)
{
    //alert("test");
    //checks if pdf is 3 pages or less, if not error message appears
    var max = "<?= $max ?>";
    if (max <=3)
    {
        parent.document.getElementById('file_msg').innerHTML = "";
        parent.window.proposal_fill = 0;
        parent.document.getElementById('file_span').style.display = 'none';

    }
    else
    {
        parent.document.getElementById('file_msg').innerHTML = "Please upload maximum 3 pages";
        parent.window.proposal_fill = 1;        
        parent.document.getElementById('file_msg').style.border="1px solid red";
        parent.document.getElementById('file').focus();
        parent.document.getElementById('file_span').style.display = 'inline';
        
    }
    //parent.document.getElementById('file_msg').innerHTML = "This pdf has " + max + " pages.";
}
else
{

}

</script>
