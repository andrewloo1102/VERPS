<?php

//NOT BEING USED.....WHY?
    $file_type = $_FILES['file']['tmp_name'];
    $file_type = filetype($file_type);

    if (($_FILES["file"]["error"]) == 4)
    {
    $pdf_status = 4;
    }
    else if ($_FILES['file']['type'] != "application/pdf")
    {
    $pdf_status = 3;
    }
    else if ($_FILES["file"]["size"] > 10000000)
    {
    $pdf_status = 2;
    }
    else if ($_FILES["file"]["error"] > 0)
    $pdf_status = 5;
    else
    {
      $pdf_status = 0;

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
    
            if($max==0)
            {
                   $filepath = $_FILES['file']['tmp_name'];
                   $im = new Imagick($filepath);
                   $max=$im->getNumberImages();
            }
    fclose($fp);
    }


?>
<script type='text/javascript'>
var pdf_status = "<?= $pdf_status ?>";
//var file_type = "<?= $file_type ?>";
var str = parent.document.getElementById('file').value;
var strArray = str.split("\\");
str = strArray[strArray.length - 1];

if (pdf_status == 5)
{
   parent.document.getElementById('file_msg').innerHTML = "Error!";
   parent.window.proposal_fill = 1;

}
else if (pdf_status == 4)
{
   parent.document.getElementById('file_msg').innerHTML = "Please upload a pdf file (4)";
   parent.window.proposal_fill = 1;
   
}
/*else if (pdf_status == 3)
{
   if (str.search(".pdf") == -1 )
   {
   parent.document.getElementById('file_msg').innerHTML = "Wrong type. Please upload a pdf file (3)";
   parent.window.proposal_fill = 1;
   }
   else
   {
   parent.window.proposal_fill = 0;
   }
   
   }*/
else if (pdf_status == 2)
{
   parent.document.getElementById('file_msg').innerHTML = "Please upload less than 10 mb";
   parent.window.proposal_fill = 1;
   

}
else if (pdf_status == 0)
{
    var max = "<?= $max ?>";
    if (max <=3)
    {
        parent.document.getElementById('file_msg').innerHTML = "";
        parent.window.proposal_fill = 0;
    }
    else
    {
        parent.document.getElementById('file_msg').innerHTML = "Please upload maximum 3 pages";
        parent.window.proposal_fill = 1;
        
    }
}
else
{

}

</script>
