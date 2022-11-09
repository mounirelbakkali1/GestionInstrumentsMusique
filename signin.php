<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/sb-admin-2.min.css">
    <title>Sign up page</title>
    <style>
        :root{
            --main-color : #30ACC8;
            --light-color :#E0F2FF;
            --card-color:#dcdcdc5e;
        }
        body{
            height: 100vh;
            overflow: hidden;
            background-image: url("./assets/img/vector-musical-seamless-background-with-different-insrtuments.jpg");
        }
        #container {
            background-color: #212531;
            color: #f6fdff;
        }
        input{
            color: white;
        }
        input[type="checkbox"]{
            accent-color: var(--main-color);
        }
    </style>

</head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

<div class="container h-100 m-0 row justify-content-end">
    <div class="col-12 col-md-8 col-lg-6 d-flex justify-content-end align-items-center h-100 ">
        <div class="p-5 w-100"  id="container">
            <?php if(isset($_GET['err'])){
                $err = $_GET['err'];
                if($err=="notAllowedYet"){
                    echo "<script>
                                    Swal.fire({
                                      icon: 'error',
                                      title: 'Oops...',
                                      text: 'You are not allowed yet to access the platform please contact your admin to approve !',
                                    })
                            </script>";
                }
            }?>
            <h2>Connexion</h2>
            <form action="./includes/login.inc.php" class="needs-validation" method="post" novalidate >
                <?php
                    if (isset($_GET['err'])){
                        if($err=="invalidEmail"){
                            echo "
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                              <strong>Failed !</strong>Email doen t match with our records 
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            ";
                        }elseif ($err=="incorrectPwd"){
                            echo "
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                              <strong>Failed !</strong> Incorrect Password 
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            ";
                        }
                    }
                ?>
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text rounded-0 bg-transparent text-light border-right-0" id="inputGroupPrepend">@</span>
                    <input type="email" class="form-control bg-transparent border-left-0" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="email" required>
                    <div class="invalid-feedback">
                        Please enter you Email.
                    </div>
                </div>
                <label for="validationCustom03" class="form-label">Password</label>
                <input type="text" class="form-control bg-transparent" id="validationCustom03" name="pwd" required>
                <div class="invalid-feedback">
                    Please enter you password.
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="yes" name="keep_me_connected" id="invalidCheck" >
                    <label class="form-check-label mb-3" for="invalidCheck">
                        Keep me connected
                    </label>
                </div>
                <button class="btn btn-outline-light w-100" type="submit" name="submit">Sign In</button>
            </form>
            <div class="d-flex flex-column mt-3 justify-content-center align-items-center">
                <a class="alert-link text-center mb-2" style="color: var(--main-color)" href="">forgot a password ? </a>
                <a class="alert-link text-center mb-2" style="color: var(--main-color)" href="">haven't you an account ? </a>
                <a href="./signup.php" class="btn btn-outline-light w-50">Create account </a>
            </div>
        </div>
    </div>
</div>

</body>

<script src="./assets/js/scripts.js"></script>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>

</html>
