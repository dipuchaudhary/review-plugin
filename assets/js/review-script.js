jQuery(document).ready( function($) { 

    $( '#review-register' ).click( function(e) {

        e.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var pass = $("#password").val();
        var review = $("#review-desc").val();
        var rating = $("#rating").val();
        
        if( '' === fname || '' === lname || '' === email || '' === pass || '' === review || '' === rating ) {

            $("#errfname").text( translated_object.errfname );
            $("#errlname").text( translated_object.errlname );
            $("#erremail").text( translated_object.erremail );
            $("#errpass").text( translated_object.errpass );
            $("#errreview").text( translated_object.errreview );
            $("#errrating").text( translated_object.errrating );
        }
            $.ajax({
                url: myAjax.ajaxurl,
                type: "POST",
                data: {
                    action: 'review_register',
                    review_nonce: myAjax.review_nonce,
                    fname: fname,
                    lname: lname,
                    email: email,
                    password: pass,
                    review_desc: review,
                    rating: rating,
                },
            success: function(result) {

                    alert(result.data.msg);
                    document.getElementById('review-form').reset();
            },
            error: function(result) {
                    
                    alert(result.data.msg);
            }
            
        })
    }); 
   
})