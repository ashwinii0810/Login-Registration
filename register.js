$(document).ready(function() {
    $("#registerForm").submit(function(event) {
        event.preventDefault(); // prevent the form from submitting

        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();

        // Check if username field is empty
        if (username === "") {
            $("#usernameError").text("Please enter a username");
        } else {
            $("#usernameError").text("");
        }

        // Check if email field is empty
        if (email === "") {
            $("#emailError").text("Please enter an email address");
        } else {
            $("#emailError").text("");
        }

        // Check if password field is empty
        if (password === "") {
            $("#passwordError").text("Please enter a password");
        } else {
            $("#passwordError").text("");
        }
    });
});
