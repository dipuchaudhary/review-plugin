
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Custom Register</title>
  </head>
  <body>

    <div class="container">
    <h5> <?php _e( 'Registration using shortcode' ,'dipu-plugin' ); ?></h5>
     <form method="post" id="myform" >
        <div class="mb-3">
            <label for="firstname" class="form-label"> <?php  _e( 'First Name', 'dipu-plugin' ); ?> </label>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
        </div>
        <div class="mb-3">
            <label for="lasttname" class="form-label"> <?php  _e( 'Last Name', 'dipu-plugin' ); ?></label>
            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label"> <?php  _e( 'Username', 'dipu-plugin' ); ?></label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
        </div>
        <div class="mb-3">
            <label for="displayname" class="form-label"> <?php  _e( 'Display Name', 'dipu-plugin' ); ?> </label>
            <input type="text" name="displayname" id="displayname" class="form-control" placeholder="Display Name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"> <?php  _e( 'Email', 'dipu-plugin' ); ?></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"> <?php  _e( 'Password', 'dipu-plugin' ); ?></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" name="register" class="btn btn-primary mb-2" id="register"> <?php  _e( 'Submit', 'dipu-plugin' ); ?></button>
     </form>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
