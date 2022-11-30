<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouTrain™ | Sign Up</title>

  <!-- ================== BEGIN core-css ================== -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- ================== END core-css ================== -->



</head>







<body>



  <style>
    body {

      background: url('./pic/bg.png');
      background-color: rgb(60, 60, 60);
      background-repeat: no-repeat;
      background-size: cover;
      background-blend-mode: multiply;

    }

    .card {
      background-color: #f8f9fad9;
    }
  </style>


  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden">


    <div class="container py-5 px-md-5 text-center  my-5">
      <div class="row justify-content-center">

        <div class="col-lg-6 mb-5 mb-lg-0 ">


          <div class="card">
            <div class="card-body px-4 py-5 px-md-5 pt-0">
              <form id="signup" class="needs-validation" novalidate>
                <div>
                  <div class="d-flex  justify-content-center">
                    <img src="pic\YouTrainTM.png" alt="logo" width="40%">
                  </div>
                  <h4 class="fw-bold mb-5">Sign up now</h4>
                  <div class=" mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="form3Example1">Username</label>
                      <input type="text" name="name" id="name" class="form-control" required />
                      <div class="valid-feedback">
                        Looks Good!
                      </div>
                      <div class="invalid-feedback">
                        Username is required to create your account.
                      </div>
                    </div>
                  </div>
                  <div class=" mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="form3Example2">Email address</label>
                      <input type="email" name="email" id="email" class="form-control" required />
                      <div class="valid-feedback">
                        Looks Good!
                      </div>
                      <div class="invalid-feedback">
                        Adress email is required to create your account.
                      </div>
                    </div>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required />
                    <div class="invalid-feedback">
                      Enter a valid password !!
                    </div>
                  </div>

                  <!-- Confirm Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required />
                    <div class="invalid-feedback">
                      Passwords doesn't match !!
                    </div>

                  </div>


                  <!-- Submit button -->
                  <button type="submit" name="signup" class="btn btn-outline-dark  btn-block w-100">
                    Sign up
                  </button>
              </form>
              <div class="mt-2">
                <p>You alraedy have an account? <a class="text-decoration-none" href="login.php">Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

</body>
<!-- ================== BEGIN core-js ================== -->
<script src="validation.js"></script>
<!-- ================== END core-js ================== -->


</html>