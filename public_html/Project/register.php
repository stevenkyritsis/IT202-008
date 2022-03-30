<?php
require_once(__DIR__ . "/../../lib/functions.php");
?>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" name="confirm" required minlength="8" />
    </div>
    <input type="submit" value="Register" />
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        return true;
    }
</script>
<?php
 //TODO 2: add PHP Code
 if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])){
     $email = se($_POST, "email", "", false); //$_POST["email"];
     $password = se($_POST, "password", "", false); //$_POST["password"];
     $confirm = se($_POST, "confirm", "", false); //$_POST["confirm"];
     //TODO 3: validate/use
     $hasError = false;
    if (empty($email)){
        echo "Email must not be empty <br>";
        $hasError = true;
    }

    //sanitize
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //validate
    if (!filter_var($email, FILTER_SANITIZE_EMAIL)){
        echo "Please enter a valid email <br>";
        $hasError = true;
    }

    if (empty($password)){
        echo "Password must not be empty <br>";
        $hasError = true;
    }
    if (empty($confirm)){
        echo "Confirm must not be empty <br>";
        $hasError = true;
    }
 }
?>