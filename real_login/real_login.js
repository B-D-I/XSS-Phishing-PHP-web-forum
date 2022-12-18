// $('#FakeformUserRegistration').submit(function(event) {
//     event.preventDefault();
//     formData = $('#FakeformUserRegistration').serialize();
//     $.ajax({
//         type: "POST",
//         url: "real_loginDAO.php",
//         data: formData+"&phpFunction=real_login",
//         datatype: 'json',
//         success: function(msg){
//             dataJson = JSON.parse(msg);
//             console.log(dataJson);
//             console.log('test')
//
//             // if incorrect data - display message
//             if (dataJson['result']=='false') {
//                 $("#divmessage").html("wrong username or password");
//                 alert("Incorrect Login");
//                 window.location="http://localhost/Bowser-Project/local_alerts/alerts_page.php";
//             } else {
//                 email = dataJson['Email'];
//                 password = dataJson['Password'];
//                 alert("Logged in");
//                 window.location="http://localhost/Bowser-Project/local_alerts/alerts_page.php";
//             }
//         }
//     });
// });