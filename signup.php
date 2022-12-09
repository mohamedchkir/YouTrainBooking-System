<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-travel-places/256/42533-train-icon.png" />

  <title>YouTrain™ | Sign Up</title>

  <!-- ================== BEGIN core-css ================== -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- ================== END core-css ================== -->



</head>







<body>



  <style>
    body {

      background: url('./assets/img/bg.png');
      background-color: rgb(60, 60, 60);
      background-repeat: no-repeat;
      background-size: cover;
      background-blend-mode: multiply;

    }

    .card {
       
       background-color: #1d2226d9;
       color: white;
   
   
       }
       .alert {
       padding: 15px 10px;
       }
       .alert-danger {
       --bs-alert-color: #e16470;
       --bs-alert-bg: #d9636e00;
       --bs-alert-border-color: #f5c2c7;
       }
       a{
         color: #47b5ff;
       }
       .shesh{
           background-color: #dae2e70f;
           color: white;
   
       }
       .form-control:focus {
       color: white;
       background-color: transparent;
       border-color: #86b7fe;
       outline: 0;
       box-shadow: 0 0 0 0.25rem rgb(71 181 255 / 4%);
       }
  </style>


  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden">


    <div class="container py-2 px-md-5 text-center  my-5">
      <div class="row justify-content-center">

        <div class="col-lg-6 mb-5 mb-lg-0 ">
          <div class="card">
            <div class="card-body px-4 py-5 px-md-5 ">
                  <form action="include/handlers/UserHandler.php" id="signup" class="needs-validation" method="POST" novalidate>
                      
                          <div class="d-flex  justify-content-center mb-4">
                            <img src="./assets/img/YouTrainTM_white.png" alt="logo" width="40%">
                          </div>
                          <h4 class="fw-bold mb-5">Sign up now</h4>


                                      <?php
                                          if(isset($_GET["msg"])){
                                              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                              <strong>Sign Up Failed !</strong> ".$_GET["msg"]."
                                              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                            </div>";
                                          
                                          }
                                      
                                      ?>

                          <div class="text-start">
                              <div class=" mb-4">
                                <div class="form-outline mb-4">
                                  <label class="form-label" for="form3Example1">First Name</label>
                                  <input type="text" name="First_name" id="name" class="form-control shesh" required />
                                  <div class="valid-feedback">
                                    Looks Good!
                                  </div>
                                  <div class="invalid-feedback">
                                    First name is required to create your account.
                                  </div>
                                </div>
                                <div class="form-outline">
                                  <label class="form-label" for="form3Example1">Last name</label>
                                  <input type="text" name="Last_name" id="name" class="form-control shesh" required />
                                  <div class="valid-feedback">
                                    Looks Good!
                                  </div>
                                  <div class="invalid-feedback">
                                    Last name is required to create your account.
                                  </div>
                                </div>
                            </div>
                            <div class=" mb-4">
                              <div class="form-outline">
                                <label class="form-label" for="form3Example2">Email address</label>
                                <input type="email" name="email" id="email" class="form-control shesh" required />
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
                              <input type="password" name="password" id="password" class="form-control shesh" required />
                              <div class="invalid-feedback">
                                Enter a valid password !!
                              </div>
                            </div>

                            <!-- Confirm Password input -->
                            <div class="form-outline mb-4">
                              <label class="form-label" for="form3Example4">Confirm Password</label>
                              <input type="password" name="confirm_password" id="confirm_password" class="form-control shesh"  required />
                              <div class="invalid-feedback">
                                Passwords doesn't match !!
                              </div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="./assets/js/validation.js"></script>
<!-- ================== END core-js ================== -->


</html>