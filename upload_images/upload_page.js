
// function to convert image data to Base64
function getBase64(file) {
    var reader = new FileReader();   // file reader converts Blob and stores into reader variable
    reader.readAsDataURL(file);	// read contents of blob and return Base64 encoded string
    reader.onload = function () {
        console.log(reader.result);

        var textArea = $("#text_area").val();
        $.ajax({
            url: "upload_fileDAO.php",
            method:"POST",
            data:{"post_txt": textArea,
                "userImage": reader.result,
            },
            success:function(msg) {
                console.log(msg);
                alert("Content Posted");
                window.location="alerts_page.php"; // change
            }
        });
    };
    reader.onerror = function (error) {
        console.log('Error: ', error);
    };
}

// POST TO SERVER
// function on submit - send data to php doc
$('#report_form').on('submit', function(e){
    var formData=new FormData(this);
    e.preventDefault();

    console.log(formData.serialize);

    var textArea = $("#text_area").val();
    var postImage =$("#upload").val();
    var file = document.querySelector('#upload[type="file"]').files[0];
    getBase64(file);

    console.log(file);
    console.log(textArea);

    formData.append("post_text", textArea);
    formData.append("userImage", postImage);

    console.log(formData.serialize);

});
