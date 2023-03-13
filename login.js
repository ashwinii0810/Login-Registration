$(document).ready(function(){
    $("#loginForm").submit(function(event){
        event.preventDefault(); // prevent default form submission
        var formData = $(this).serialize(); // serialize form data
        $.ajax({
            url: "login.php", // php script to handle form data
            type: "post",
            data: formData,
            success: function(response){
                if(response == "success"){
                    alert("Registration successful!");
                    window.location.href = "profile.html"; // redirect to profile page
                }
                else{
                    alert("Login failed. Please try again.");
                }
            }
        });
    });
});
