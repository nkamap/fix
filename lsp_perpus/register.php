<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $password = $_POST['password'];

  // if ($password == $password2) {
  //   // Hash the password
  //   $password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'lsp_perpus');

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Insert data into database
    $sql = "INSERT INTO user (username, fullname, password) VALUES ('$username', '$fullname', '$password')";

    if (mysqli_query($conn, $sql)) {
      header("Location: login.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>REGISTER</title>
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

              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>

              <div class="form-outline form-white mb-4">
                <input type="username" id="typeusernameX" class="form-control form-control-lg" />
                <label class="form-label" for="typeusernameX">username</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="fullname" id="typefullnameX" class="form-control form-control-lg" />
                <label class="form-label" for="typefullnameX">fullname</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>

             

            </div>

            <div>
              <p class="mb-0">have an account? <a href="login.php" class="text-white-50 fw-bold">Sign In</a>
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