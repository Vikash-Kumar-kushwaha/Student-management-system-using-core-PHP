<?php
$sql = "SELECT * FROM admin";

$query = mysqli_query($conn, $sql);
$info = mysqli_fetch_assoc($query);

if (!$query) {
    echo "failed connection";
}


$userNameErr = $passwordErr = NULL;
$userName = $password = NULL;
$flag = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $userNameErr = "*Username is Required";
        $flag = 1;
    } else {
        $userName = test_input($_POST["username"]);
    }

    if (empty($_POST["pswd"])) {
        $passwordErr = "*Password is Required";
        $flag = 1;
    } else {
        $password = test_input($_POST["pswd"]);
    }

    if ($flag == 0) {
        if ($userName == $info['username'] && $password == $info['password']) {
            $_SESSION['id'] = $userName;
            $_SESSION['pass'] = $password;
        } else {
            $userNameErr = "Wrong Username";
            $passwordErr = "Wrong Password";
        }

        $bool = 0;
        if ($userName == $info['username']) {
            $bool += 1;
        } else {
            $userNameErr = "Wrong Username";
        }
        if ($password == $info['password']) {
            $bool += 1;
        } else {
            $passwordErr = "Wrong Password";
        }

        if ($bool == 2) {
            // header('Location:content.php');
            $bool = 0;
        }
        $_SESSION['id'] = true;
        // Redirect to content page
        echo "<script> window.location='index.php'</script>";
        exit;
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



<form action="#" method="post">
    <div class="main-login-body d-flex justify-content-center align-items-center vh-100">
        <div class="login-body shadow-lg p-3 mb-5 bg-white rounded " style="width:24rem;">
            <h3 class="text-center">Student Management System</h3>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Student id</label>
                <input type="text" id="form2Example1" name='username' class="form-control" />
                <span class="text-danger"><?php echo $userNameErr; ?></span>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2Example2" name='pswd' class="form-control" />
                <span class="text-danger"><?php echo $passwordErr; ?></span>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Sign in</button>
        </div>
    </div>
</form>