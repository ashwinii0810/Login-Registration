$(document).ready(function(){
    $("#profileForm").submit(function(event){
        event.preventDefault(); // prevent default form submission
        var formData = $(this).serialize(); // serialize form data
        $.ajax({
            url: "profile.php", // php script to handle form data
            type: "post",
            data: formData,
            success: function(response){
                if(response == "success"){
                    alert("Profile updated successfully.");
                }
                else{
                    alert("Profile update failed. Please try again.");
                }
            }
        });
    });
});
