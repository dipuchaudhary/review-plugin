jQuery(document).ready( function($) { 

    $( '#review-register' ).click( function(e) {

        e.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var pass = $("#password").val();
        var review = $("#review-desc").val();
        var rating = $("#rating").val();
        $("#fname").closest(".form-group").find("#errfname").hide();
        $("#lname").closest(".form-group").find("#errlname").hide();
        $("#ename").closest(".form-group").find("#erremail").hide();
        $("#password").closest(".form-group").find("#errpass").hide();
        $("#review-desc").closest(".form-group").find("#errreview").hide();
        $("#rating").closest(".form-group").find("#errrating").hide();

        if( fname.length == 0 ) {
            $("#fname").closest(".form-group").find("#errfname").addClass("active").html( translated_object.errfname );
            $("#fname").closest(".form-group").find("#errfname").show();
        } else {  
            $("#fname").closest(".form-group").find("#errfname").hide();
        } 
        if( lname.length == 0 ) {
            $("#lname").closest(".form-group").find("#errlname").addClass("active").html( translated_object.errlname );
            $("#lname").closest(".form-group").find("#errlname").show();
        } else { 
            $("#lname").closest(".form-group").find("#errlname").hide();
        } 
        if( email.length == 0 ) {
            $("#ename").closest(".form-group").find("#erremail").addClass("active").html( translated_object.email );
            $("#ename").closest(".form-group").find("#erremail").show();
        } else {  
            $("#ename").closest(".form-group").find("#erremail").hide();
        } 
        if( pass.length == 0 ) {
            $("#password").closest(".form-group").find("#errpass").addClass("active").html( translated_object.errpass );
            $("#password").closest(".form-group").find("#errpass").show();
        } else { 
            $("#password").closest(".form-group").find("#errpass").hide();
        } 
        if( review.length == 0 ) {
            $("#review-desc").closest(".form-group").find("#errreview").addClass("active").html( translated_object.errreview );
            $("#review-desc").closest(".form-group").find("#errreview").show();
        } else {  
            $("#review-desc").closest(".form-group").find("#errreview").hide();
        } 
        if( rating.length == 0 ) {
            $("#rating").closest(".form-group").find("#errrating").addClass("active").html( translated_object.errrating );
            $("#rating").closest(".form-group").find("#errrating").show();
        } else {  
            $("#rating").closest(".form-group").find("#errrating").hide();
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