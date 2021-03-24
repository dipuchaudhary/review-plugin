<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    
    <form id="review-form">
        <div class="form-group">
            <label for="fname"> <?php esc_html_e( 'First Name', 'review-plugin' ); ?></label>
            <input type="text" name="fname" id="fname" placeholder="First Name" >
            <p class="error" id="errfname"></p>
        </div>
        <div class="form-group">
            <label for="lname"> <?php esc_html_e( 'Last Name', 'review-plugin' ); ?></label>
            <input type="text" name="lname" id="lname" placeholder="Last Name">
            <p class="error" id="errlname"></p>
        </div>
        <div class="form-group">
            <label for="email"> <?php esc_html_e( 'User Email', 'review-plugin' ); ?></label>
            <input type="email" name="email" id="email" placeholder="User Email">
            <p class="error" id="erremail"></p>
        </div>
        <div class="form-group">
            <label for="password"><?php esc_html_e( 'Password', 'review-plugin' ); ?></label>
            <input type="password" name="password" id="password" placeholder="password">
            <p class="error" id="errpass"></p>
        </div>
        <div class="form-group">
            <label for="review-desc"><?php esc_html_e( 'Review Description', 'review-plugin' ); ?></label>
            <textarea name="review_desc" id="review-desc" cols="30" rows="5"></textarea>
            <p class="error" id="errreview"></p>
        </div>
        <div class="form-group">
            <label for="review-rating"> <?php esc_html_e( 'Rating', 'review-plugin' ); ?></label>
            <input type="number" name="rating" id="rating" min="1" max="5">
            <p class="error" id="errrating"></p>
        </div>
        <br/><br/>
        <button type="submit" id="review-register"> <?php esc_html_e( 'Register', 'review-plugin' ) ?></button>
    </form>

</body>
</html>