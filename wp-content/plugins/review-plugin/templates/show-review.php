<div class="pull-right">
  <div class="my-auto py-3">
    <label class="form-label select-label"><span class="glyphicon glyphicon-filter"></span></label>
      <select class="select" id="order" name="order">
        <option value="DESC"><?php esc_html_e( 'latest', 'review-plugin' ); ?> </option>
        <option value="ASC"><?php esc_html_e( 'oldest', 'review-plugin' ); ?></option>
      </select> 
  </div>
</div>

<div class="pull-right">
  <div class="my-auto py-3">
    <label class="form-label select-label"><span class="glyphicon glyphicon-filter"></span><?php esc_html_e( 'Sort By', 'review-plugin' ); ?></label>
      <select class="select" id="rating" name="rating">
        <option disabled selected><?php esc_html_e( 'rating', 'review-plugin' ); ?> </option>
        <option value="5"> <?php esc_html_e( '5', 'review-plugin' ) ?><span class="fa fa-star checked"></option>
        <option value="4"> <?php esc_html_e( '4', 'review-plugin' ) ?><span class="fa fa-star checked"></option>
        <option value="3"> <?php esc_html_e( '3', 'review-plugin' ) ?><span class="fa fa-star checked"></option>
        <option value="2"> <?php esc_html_e( '2', 'review-plugin' ) ?><span class="fa fa-star checked"></option>
        <option value="1"> <?php esc_html_e( '1', 'review-plugin' ) ?><span class="fa fa-star checked"></option>
      </select> 
  </div>
</div>

<div class="review-container" id="review"></div>

