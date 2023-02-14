var read_database;

//set up cookies
function setCookie(NameOfCookie, value, expiredays) 
{ var ExpireDate = new Date ();
ExpireDate.setTime(ExpireDate.getTime() + (expiredays * 24 * 3600 * 1000));
document.cookie = NameOfCookie + "=" + escape(value) + 
((expiredays == null) ? "" : "; expires=" + ExpireDate.toUTCString());
}


//function to delete cookie
function delCookie (NameOfCookie) 
{ if (getCookie(NameOfCookie)) {
document.cookie = NameOfCookie + "=" +
"; expires=Thu, 01-Jan-70 00:00:01 GMT";
}

}


//function to get cookie
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

function readText()
{


}


/////////////////////////////////////////////
//Toggle Cover, Proposal, and Target

$(document).ready(function(){

var loading = $("#loading"); 
var content = $("#form0");

//show loading bar
function showLoading(){
	loading.css({visibility:"visible"});
	loading.css({opacity:"1"});
	loading.css({display:"block"});
};

//hide loading bar
function hideLoading(){
	loading.fadeTo(1000, 0);
	content.slideDown();
};


$('.revise').click(function(){
        // checks to see whether window.timer has a value/has been defined
        // if it has it shows the recalling form at 'forms.html', else it shows pop-up that deadline has been reached
        if (window.timer)
        {
            showLoading();
            content.slideUp();  
            content.load("forms.html", hideLoading);  
            content.delegate("#form1_submit", "click", function () {

        // checks to see whether window.database has a value/has been defined when form1_submit is clicked
        // if it has external.php is retrieved with previous filled data


            setTimeout(function(){ //Delay for Chrome
            if (window.read_database)
            {
            showLoading();
            content.slideUp();
            content.load("external.php", hideLoading);  
			content.delegate("#hand", "click", function () {
            target = 0;
            $("#Targets").html('');
            $("#Targets").html(addTarget());
            window.location.hash='Target0';
            if ($("#Target_add").length === 0)
            {
            $("#Target_form").append('<tr><td><input id="Target_add" type="button" value="Add" ></td></tr>');
            }

            $("#Target_add").click(function() {
            $("#Targets").append(addTarget());
            window.location.hash='Target' + (target - 1);

            });

          });

        content.delegate("#text", "click", function(){
            target = 0;
            if ($("#Target_add").length > 0)
            {
                document.getElementById('Target_add').parentNode.removeChild(document.getElementById('Target_add'));
            }

            $("#Targets").html(' <tr><td> <label for="file_tar">text file</label><input name="file_tar" id="file_tar" size="27" type="file" /><br /> <input type="submit" id="upload" name="upload" value="Upload" /><br /> ');

            $("#Targets").delegate("#upload", "click", function () {

            setAction("upload");
            });

          });

              content.delegate("#cover_image, #Cover_text","click", function (){
            $("#cover_div").toggle();
            var src = ($("#cover_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
            $("#cover_image").attr('src', src);
            window.location.hash = 'cover_div';
          });

            content.delegate("#target_image, #target_text","click", function (){
            $("#target_div").toggle();
            var src = ($("#target_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
            $("#target_image").attr('src', src);
            window.location.hash = 'target_div';
          });


            content.delegate("#proposal_image, #proposal_text","click", function(){
            $("#proposal_div").toggle();
            var src = ($("#proposal_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
            $("#proposal_image").attr('src', src);
            window.location.hash = 'proposal_div';
          });
                
                content.delegate("#main_back", "click", function () 
                    {
                    //alert("testing");
                    showLoading();
                    content.slideUp();
                    content.load("main.html", hideLoading);  
                    content.undelegate("#saved_submit", "click"); 
                    content.undelegate("#saved_back", "click"); 
                    content.undelegate("#main_back", "click"); 
                    content.undelegate("#hand", "click"); 
                    content.undelegate("#text", "click"); 
                    content.undelegate("#upload", "click"); 
                    content.undelegate("#cover_image, #Cover_text", "click"); 
                    content.undelegate("#target_image, #target_text", "click"); 
                    content.undelegate("#proposal_image, #proposal_text", "click"); 
                    if (typeof submit_preview !== 'undefined')
                    {
                        //alert("test");
                        clearInterval(submit_preview);
                        submit_preview = null;
                        if (!submit_preview)
                        {
                        //alert(typeof submit_preview);
                        }
                    }
 
                    });
            }
            else
            {
            alert('Please enter a valid id and PI last name.');
            }
                }, 1000);
                
                
               });
            content.delegate("#sub_back", "click", function () {
                showLoading();
                content.slideUp();
                content.load("main.html", hideLoading);
                //clears these elements and their onclick functions
                content.undelegate("#sub_back", "click");
                content.undelegate("#form1_submit", "click"); 

                });

        }
        else
        {
        alert('DEADLINE HAS BEEN REACHED');
        }

        
});

$('.saved').click(function(){

        // checks to see whether window.timer has a value/has been defined
        // if it has it shows the main form in 'external.php', else it shows pop-up that deadline has been reached
        if (window.timer)
        {
        showLoading();
        content.slideUp();  
        content.load("savedForm.html", hideLoading);  
        //defines what happens when back is clicked
        content.delegate("#saved_back", "click", function () {
            //alert("saved_bck");
            showLoading();
            content.slideUp();
            content.load("main.html", hideLoading);  
            content.undelegate("#saved_back", "click"); 
            content.undelegate("#saved_submit", "click");
            });


        content.delegate("#saved_submit", "click", function () {
                $("#saveForm").submit(function(e)
                {
                e.preventDefault();
                this.submit();
                showLoading();
                setTimeout(function(){ //Delay for Chrome
                //alert(window.saveLoad);
                if (window.saveLoad == 1) {
                showLoading();
                content.slideUp();
                content.load("external.php", hideLoading);
                //alert("wierd");

        content.delegate("#hand", "click", function () {
            target = 0;
            $("#Targets").html('');
            $("#Targets").html(addTarget());
            window.location.hash='Target0';
            if ($("#Target_add").length === 0)
            {
            $("#Target_form").append('<tr><td><input id="Target_add" type="button" value="Add" ></td></tr>');
            }

            $("#Target_add").click(function() {
            $("#Targets").append(addTarget());
            window.location.hash='Target' + (target - 1);

            });

          });

        content.delegate("#text", "click", function(){
            target = 0;
            if ($("#Target_add").length > 0)
            {
                document.getElementById('Target_add').parentNode.removeChild(document.getElementById('Target_add'));
            }

            $("#Targets").html(' <tr><td> <label for="file_tar">text file</label><input name="file_tar" id="file_tar" size="27" type="file" /><br /> <input type="submit" id="upload" name="upload" value="Upload" /><br /> ');

            $("#Targets").delegate("#upload", "click", function () {

            setAction("upload");
            });

          });

              content.delegate("#cover_image, #Cover_text","click", function (){
            $("#cover_div").toggle();
            var src = ($("#cover_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
            $("#cover_image").attr('src', src);
            window.location.hash = 'cover_div';
          });

            content.delegate("#target_image, #target_text","click", function (){
            $("#target_div").toggle();
            var src = ($("#target_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
            $("#target_image").attr('src', src);
            window.location.hash = 'target_div';
          });


            content.delegate("#proposal_image, #proposal_text","click", function(){
            $("#proposal_div").toggle();
            var src = ($("#proposal_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
            $("#proposal_image").attr('src', src);
            window.location.hash = 'proposal_div';
          });
                
                content.delegate("#main_back", "click", function () 
                    {
                    //alert("testing");
                    showLoading();
                    content.slideUp();
                    content.load("main.html", hideLoading);  
                    content.undelegate("#saved_submit", "click"); 
                    content.undelegate("#saved_back", "click"); 
                    content.undelegate("#main_back", "click"); 
                    content.undelegate("#hand", "click"); 
                    content.undelegate("#text", "click"); 
                    content.undelegate("#upload", "click"); 
                    content.undelegate("#cover_image, #Cover_text", "click"); 
                    content.undelegate("#target_image, #target_text", "click"); 
                    content.undelegate("#proposal_image, #proposal_text", "click"); 
                    if (typeof submit_preview !== 'undefined')
                    {
                        //alert("test");
                        clearInterval(submit_preview);
                        submit_preview = null;
                        if (!submit_preview)
                        {
                        //alert(typeof submit_preview);
                        }
                    }
 
                    });
                }
                else
                {
				//alert(parent.window.saveLoad);
                hideLoading();
                }
                }, 1000); 

            });

             

                
            });

            /*content.delegate("#saved_submit,#file_saved", "change", function () {
            $.ajax({  
                url: "uploadtxt.php",  
                type: "POST",
                function(data) {
                //alert(data);
                },
                processData: false,
                contentType: false,
                success: function () {
                alert('success');
                //    document.getElementById("response").innerHTML = res;  
                }
                });  

            });
            */
/*
$('input#submitButton').click( function() {
    $.ajax({
        url: 'uploadtxt.php',
        type: 'post',
        data: dataString,
        success: function(data) {
         }
    });
});*/


        }
        else
        {
        alert('DEADLINE HAS BEEN REACHED');
        }
            });


//using JQuery defines what is done when 'new proposal' is clicked
$('.new_proposal').click(function(){
        // checks to see whether window.timer has a value/has been defined
        // if it has it shows the main form in 'external.php', else it shows pop-up that deadline has been reached
        if (window.timer)
        {
        showLoading();
        content.slideUp();  
        //loads external.php
        //content.slideUp('slow');
        content.load("external.php", hideLoading);
        //content.slideUp('slow');

        content.delegate("#hand", "click", function () {
            target = 0;
            $("#Targets").html('');
            $("#Targets").html(addTarget());
            window.location.hash='Target0';
            if ($("#Target_add").length === 0)
            {
            $("#Target_form").append('<tr><td><input id="Target_add" type="button" value="Add" ></td></tr>');
            }

            $("#Target_add").click(function() {
            $("#Targets").append(addTarget());
            window.location.hash='Target' + (target - 1);

            });

          });

        content.delegate("#text", "click", function(){
            target = 0;
            if ($("#Target_add").length > 0)
            {
                document.getElementById('Target_add').parentNode.removeChild(document.getElementById('Target_add'));
            }

            $("#Targets").html(' <tr><td> <label for="file_tar">text file</label><input name="file_tar" id="file_tar" size="27" type="file" /><br /> <input type="submit" id="upload" name="upload" value="Upload" /><br /> ');

            $("#Targets").delegate("#upload", "click", function () {

            setAction("upload");
            });

          });

              content.delegate("#cover_image, #Cover_text","click", function (){
            $("#cover_div").toggle();
            var src = ($("#cover_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
            $("#cover_image").attr('src', src);
            window.location.hash = 'cover_div';
          });

            content.delegate("#target_image, #target_text","click", function (){
            $("#target_div").toggle();
            var src = ($("#target_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
            $("#target_image").attr('src', src);
            window.location.hash = 'target_div';
          });


            content.delegate("#proposal_image, #proposal_text","click", function(){
            $("#proposal_div").toggle();
            var src = ($("#proposal_image").attr('src') == 'closed.png') ? 'open.png' : 'closed.png';
            $("#proposal_image").attr('src', src);
            window.location.hash = 'proposal_div';
          });
          

                content.delegate("#main_back", "click", function () 
                    {
                    showLoading();
                    content.slideUp();
                    content.load("main.html", hideLoading);  
                    content.undelegate("#hand", "click"); 
                    content.undelegate("#text", "click"); 
                    content.undelegate("#upload", "click"); 

                    content.undelegate("#cover_image, #Cover_text", "click"); 
                    content.undelegate("#target_image, #target_text", "click"); 
                    content.undelegate("#proposal_image, #proposal_text", "click"); 
                    if (typeof submit_preview !== 'undefined')
                    {
                        //alert("test");
                        clearInterval(submit_preview);
                        submit_preview = null;
                        if (!submit_preview)
                        {
                        //alert(typeof submit_preview);
                        }
                    }

                    content.undelegate("#main_back", "click"); 

                    });
                }
                else
                {
                alert('DEADLINE HAS BEEN REACHED');
                }
            });


});
