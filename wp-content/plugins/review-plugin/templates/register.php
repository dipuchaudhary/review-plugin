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
        <label for="fname"> <?php _e( 'First Name', 'review-plugin' ); ?></label>
        <input type="text" name="fname" id="fname" placeholder="First Name" /> <br/>
        <span class="error"></span>
        <label for="lname"> <?php _e( 'Last Name', 'review-plugin' ); ?></label>
        <input type="text" name="lname" id="lname" placeholder="Last Name"> <br/>
        <label for="email"> <?php _e( 'User Email', 'review-plugin' ); ?></label>
        <input type="email" name="email" id="email" placeholder="User Email"> <br>
        <label for="password"><?php _e( 'Password', 'review-plugin' ); ?></label>
        <input type="password" name="password" id="password" placeholder="password">
        <label for="review-desc"><?php _e( 'Review Description', 'review-plugin' ); ?></label>
        <textarea name="review_desc" id="review-desc" cols="30" rows="5"></textarea>
        <label for="review-rating"> <?php _e( 'Rating', 'review-plugin' ); ?></label>
        <input type="number" name="rating" id="rating" min="1" max="5">
        <br/><br/>
        <button type="submit" id="review-register"> <?php _e( 'Register', 'review-plugin' ) ?></button>
    </form>

</body>
</html>