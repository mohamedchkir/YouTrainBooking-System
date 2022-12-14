<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-travel-places/256/42533-train-icon.png" />

    <title>YouTrain™ | Log in</title>

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


        <div class="container  py-5 px-md-5 text-center  my-5">
            <div class="row  justify-content-center">

                <div class="col-lg-6 mb-5 mb-lg-0 ">
                    <div class="card ">
                        <div class="card-body px-4 py-5 px-md-5">

                                   
                                    <form id="login" action="include/handlers/UserHandler.php" class="needs-validation py-5" method="POST" novalidate>
                                                <div>
                                                    <div class="d-flex  justify-content-center mb-4">
                                                    <img src="./assets/img/YouTrainTM_white.png" alt="logo" width="40%">
                                                    </div>

                                                    <h4 class="fw-bold mb-5 pb-3" style="letter-spacing: 1px;">Sign into your account</h4>
                                                    <?php
                                                        if(isset($_GET["msg"])){
                                                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                            <strong>Login Failed !</strong> ".$_GET["msg"]."
                                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                          </div>";
                                                        
                                                        }
                                                        if(isset($_GET["msg2"])){
                                                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                            ".$_GET["msg2"]."
                                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                          </div>";
                                                        
                                                        }
                                                    
                                                    ?>
                                                </div>
                                        <div class="text-start">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3">Email address</label>
                                            <input type="email" name="email" id="email" class="form-control shesh" required />                                           
                                            <div class="valid-feedback">
                                                Looks Good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Adress email is required to sign into your account.
                                            </div>
                                            </div>
                            
                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4">Password</label>
                                            <input type="password" id="password" name="password" class="form-control shesh" required />
                                            <div class="invalid-feedback">
                                                Enter a valid password !!
                                            </div>
                                            </div>
                                            
                                        </div>
                                            
                                            
                                            <!-- Submit button -->
                                            <button type="submit" name="login" class="btn btn-outline-light btn-block my-4 w-100">
                                            Log in
                                            </button>
                                            <div >
                                                <p>Not a member? <a class="text-decoration-none" href="signup.php">Register</a></p>
                                            </div>
                                    </form>
                                    

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

</body>
    

<!-- ================== BEGIN links ================== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="../../assets/js/validation.js"></script>
<!-- ================== END links ================== -->
</html>