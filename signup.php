<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<body>
<div class="container h-100 m-0 row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 d-flex justify-content-center align-items-center h-100 ">
        <div class="p-5 w-100"  id="container">
            <h2>Registration</h2>
            <form action="./includes/signup.inc.php" class="needs-validation" method="post" novalidate oninput='pwd_confirm.setCustomValidity(pwd_confirm.value != pwd.value ? "Passwords do not match." : "")' >
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control bg-transparent text-light" id="validationCustom01" name="f_name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a first name.
                </div>
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control bg-transparent text-light" id="validationCustom02" name="s_name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a last name.
                </div>
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text rounded-0 bg-transparent text-light border-right-0" id="inputGroupPrepend">@</span>
                    <input type="email" class="form-control bg-transparent text-light border-left-0" id="validationCustomUsername" name="email" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
                <label for="validationCustom03" class="form-label">Password</label>
                <div class="input-group has-validation">
                    <input type="password" class="form-control bg-transparent border-right-0 text-light" id="validationCustomUsername" name="pwd" aria-describedby="inputGroupPrepend" required>
                    <button type="button" onclick="viewPwd(this)" class="input-group-text rounded-0 bg-transparent text-light border-left-0" id="view"><i class="fa-solid fa-eye"></i></button>
                    <div class="invalid-feedback">
                        Please choose a password.
                    </div>
                </div>
                <label for="validationCustom03" class="form-label">Confirm password</label>
                <div class="input-group has-validation">
                    <input type="password" class="form-control bg-transparent border-right-0 text-light" id="validationCustom03" name="pwd_confirm" required>
                    <button type="button" onclick="viewPwd(this)" class="input-group-text rounded-0 bg-transparent text-light border-left-0" id="view"><i class="fa-solid fa-eye"></i></button>
                    <div class="invalid-feedback" id="pwd-confirm">
                        Invalid password confirmation
                    </div>
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" name="" required>
                    <label class="form-check-label mb-3" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
                <button class="btn btn-outline-light w-100" type="submit" name="submit">Sign Up</button>
            </form>
            <div class="d-flex flex-column mt-3 justify-content-center align-items-center">
                <p>Have you an account ?</p>
                <a href="./signin.php" class="btn btn-outline-light w-50" >Sign in As admin</a>
            </div>
        </div>
    </div>
</div>
</body>

<script src="./assets/js/scripts.js"></script>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script>
    function viewPwd(el){
        el.parentElement.children[0].setAttribute("type","text");
    }
</script>
</html>
