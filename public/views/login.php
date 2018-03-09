<?php

require_once 'app/Libs/Database.php';
require_once 'app/Libs/Session.php';

Session::start();

if ( Session::logged() ) {
    header('Location: /');
}

if ( isset($_POST) ) {
    if ( !empty($_POST['email'])) {
        $email = $_POST["email"];
    } else {
        $errors['email'] = 'Your email addres are not valid';
    }

    if ( !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors['password'] = 'You must enter password';
    }

    if ( $errors ) {

    } else {
        // add user to database

        try {
            $db = new Database();
            $result = $db->query("SELECT * FROM `users` WHERE user_email = '".$email."' AND user_pass = '".md5($password)."'");

            if ( $result->num_rows  > 0 ) {
                while ($user = $result->fetch_assoc()){
                    Session::setLoginStatus(true);
                    Session::set(['account', 'login_message'], 'You are now in');
                    Session::set(['account', 'user_name'], $user['user_name']);
                }
                header('Location: /');
            } else {
                // die();
                header('Location: /login');
            }
        } catch (Exception $e) {

        }
    }

} else {
}

?>

<?php view('header'); ?>

<h1>Login Page</h1>
<div class="text-center col-12">

    <div class="text-left col-6">
        <form class=" mt-2 mt-md-0" action="/login" method="post" enctype=”application/x-www-form-urlencoded”>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php old('email'); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control<?php echo isset($errors['password']) ? ' alert-danger': '' ?>" id="password" placeholder="Password" required>
            </div>

            <button type="submit" name="register" class="btn btn-primary">Login</button>
        </form>
    </div>

</div>


<?php view('footer'); ?>