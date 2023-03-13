$(document).ready(function(){
    $("#registerForm").submit(function(event){
        event.preventDefault(); // prevent default form submission
        var formData = $(this).serialize(); // serialize form data
        $.ajax({
            url: "register.php", // php script to handle form data
            type: "post",
            data: formData,
            success: function(response){
                if(response == "success"){

                    alert("Registration successful!");
                    window.location.href = "login.html"; // redirect to profile page
                }
                else{
                    alert("Registration failed. Please try again.");
                }
            }
        });
    });
});
