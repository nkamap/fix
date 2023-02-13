<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'lsp_perpus');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for a matching username and password
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if a matching record was found
    if (mysqli_num_rows($result) == 1) {
        // Start a session and store the user information
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Redirect to the protected area
        header('Location: user/index.php');
    } else {
        // Display an error message
        echo 'Invalid username or password';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>LOGIN</title>
</head>
<body>
<form>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your username and password!</p>

              <div class="form-outline form-white mb-4">
                <input type="username" id="typeusernameX" class="form-control form-control-lg" />
                <label class="form-label" for="typeusernameX">username</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

             

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
</body>
</html>