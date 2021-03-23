jQuery(document).ready( function($) { 

    jQuery( '#review-register' ).click( function(e) {

        e.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var pass = $("#password").val();
        var review = $("#review-desc").val();
        var rating = $("#rating").val();
        
        if( '' === fname || '' === lname || '' === email || '' === pass || '' === review || '' === rating ) {
            alert("please fill out all the fields");
        }
            jQuery.ajax({
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