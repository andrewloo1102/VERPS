(function () {  
    var input = document.getElementById("images"),  
        formdata = false;  
  
    if (window.FormData) {  
        formdata = new FormData();  
        document.getElementById("btn").style.display = "none";  
    }  
  
}();  

(function () {  
    var input = document.getElementById("images"),  
        formdata = false;  
  
    if (window.FormData) {  
        formdata = new FormData();  
        document.getElementById("btn").style.display = "none";  
    }  
  
}();  

if (formdata) {  
    $.ajax({  
        url: "upload.php",  
        type: "POST",  
        data: formdata,  
        processData: false,  
        contentType: false,  
        success: function (res) {  
            document.getElementById("response").innerHTML = res;  
        }  
    });  
}  


