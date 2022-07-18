$(document).ready(function () {
    
    $('.email_checking').keyup(function (e) {

        var email = $('.email_checking').val();

        $.ajax({
            type : 'POST',
            url : 'register.php',
            data : {
                "check_submit_btn": 1,
                "email": email,
            },
            success: function (response) {
                
                $('.error_email').text(response);
            }

        });

    });

});