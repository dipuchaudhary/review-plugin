/* global myscript */

jQuery(document).ready(function($) {

    jQuery("#register").click(function(e) {

        e.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var username = $("#username").val();
        var displayname = $("#displayname").val();
        var email = $("#email").val();
        var password = $("#password").val();
       
        if ( '' === fname || '' === lname || '' === username || '' === displayname || '' === email || '' === password) {
            alert("Please fill out all the fields");
            return false;
        } else {
        
        $.ajax({
            url: myscript.ajaxurl,
            method: 'post',
            data :{action:"user_register", user_nonce:myscript.user_nonce, fname:fname, lname:lname, username:username, displayname:displayname,email:email, password:password},
            success: function(result){
                console.log(result);
                document.getElementById("myform").reset();
            },
            
        })
    }

    })
})

