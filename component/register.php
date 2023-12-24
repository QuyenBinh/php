<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../libs/css/login.css">
</head>
<body>
<div id="particles-js" class="snow"></div>
<main>
    <div class="left-side">
        <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/64ef8d9a-9202-4543-b838-82f4c7c91ccf"
             alt=""/>
    </div>
    <form id="rgForm" method="POST" >
        <div class="btn-group">
            <button class="btn">
                <img class="logo"
                     src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/d1c98974-c62d-4071-8bd2-ab859fc5f4e9"
                     alt=""/>
                <span>Sign in with Google</span>
            </button>
            <button class="btn">
                <img class="logo"
                     src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/59c1561b-8152-4d05-b617-0680a7629a0e"
                     alt=""/>
                <span>Sign in with Apple</span>
            </button>
        </div>

        <div class="or">OR</div>

        <label for="username">Username</label>
        <input type="text" placeholder="Enter username" name="username" required/>
        <label for="email">Email</label>
        <input type="text" placeholder="Enter Email" name="email" required/>
        <label for="password">Password</label>
        <span id = "emailError" style="color: red"></span>
        <div>
        <input
                type="password"
                placeholder="Enter Password"
                name="password"
                required/>
        <span id = "passwordValidate" style="color: red"></span>
        </div>
        <div>
        <label for="confirm-password">Password Confirm</label>
        <input
                type="password"
                placeholder="Enter Confirm Password"
                name="confirm-password"
                required/>
        <span id = "passwordConfirmError" style="color: red"></span>
        </div>
        <button type="button" class="login-btn" onclick="submitForm()">Signup</button>
        <div class="links">
            <a href="#">Forgot password?</a>
            <a href="#">Do not have an account?</a>
        </div>
    </form>
    <div id="results"></div>
</main>
</body>
</html>

<script>
    function submitForm() {
        var formData = new FormData(document.getElementById("rgForm"));

        fetch("registerForm.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if(data) {
                    console.log(data)
                    if (data.passwordConfirmError) {
                        console.log("1")
                        document.getElementById("passwordConfirmError").innerHTML = data.passwordConfirmError;
                    } else {
                        document.getElementById("passwordConfirmError").style.display = 'hidden';
                    }
                    if (data.emailError) {
                        console.log("2")
                        document.getElementById("emailError").innerHTML = data.emailError;
                    } else {
                        document.getElementById("emailError").style.display = 'hidden';
                    }
                    if (data.passwordValidate) {
                        console.log("3")
                        document.getElementById("passwordValidate").innerHTML = data.passwordValidate;
                    } else {
                        document.getElementById("passwordValidate").style.display = 'hidden';
                    }
                }
            })
            .catch(error => {
                // location.href = "login.php"
            });
    }
</script>
