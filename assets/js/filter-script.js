jQuery(document).ready( function($) {

    var data = {action: 'review_data_listing'};
    
    // get value of orderby
    $('#order').on('click', function() {
        var order = $(this).val();
        data.orderby = order;
        data.page_no = 1;
        show_review_data(data);
        
    });

    // get value of ratingby

    $('#rating').on('click', function() {
            var rating = $(this).val();
            data.rating = rating;
            data.page_no = 1;
            show_review_data(data);
    })
    
    function show_review_data(data) {

            jQuery.ajax( {
                url: filterAjax.ajaxurl,
                type: 'POST',
                data: data,
                success: function (response) {       
                        
                        $('#review').html(response);
                }
            })
     
  }

    // function call 
  show_review_data(data);

    //   pagination
    $(document).on("click", ".pagination li a", function(e){
        e.preventDefault();
        data.page_no = $(this).attr("id");
        show_review_data(data);
    });

})