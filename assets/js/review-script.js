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

            $("#errfname").text( __( "First Name is required!", "review-plugin" ) );
            $("#errlname").text( __( "Last Name is required!", "review-plugin" ) );
            $("#erremail").text(  __( "Email is required!", "review-plugin" ) );
            $("#errpass").text(  __( "Password is required!", "review-plugin" ) );
            $("#errreview").text( __( "Review Description is required!", "review-plugin" ) );
            $("#errrating").text( __( "Rating is required!", "review-plugin" ) );
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