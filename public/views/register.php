<?php view('header'); ?>


<?php

require_once DIR.'/config/db.php';
require_once 'app/Libs/Database.php';
require_once 'app/Libs/Session.php';

Session::start();

if ( Session::logged() ) {
    header('Location: /');
}

$errors = [];

if ( isset($_POST) )
    if ( !empty($_POST['email'])) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = $_POST["email"];
        } else {
            $errors['email'] = 'Your email addres are not valid';
        }
    } else {
        $errors['email'] = 'Your email addres are not valid';
    }

    if ( !empty($_POST['name'])) {
        $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
        if (preg_match($pattern,$firstname)){
            $name = $_POST['name'];
        } else{
            $errors['name'] = 'Your Name can only contain _, 1-9, A-Z or a-z 2-20 long.';
        }
    } else {
        $errors['name'] = 'You forgot to enter your First Name.';
    }

    if ( !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors['password'] = 'You must enter password';
    }

    if ( !empty($_POST['confirm_password']) && $password == $_POST['confirm_password']) {
        $confirm_password = $_POST['confirm_password'];
    } else {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    if ( count($errors) > 0 ) {

    } else {
        // add user to database

        try {
            $db = new Database();
            $result = $db->query("SELECT id FROM `users` WHERE user_email = '".$email."'");

            if ( $result->num_rows  == 0 ) {
                $db->insertUser($email, $name, $password);
            } else {
                // die('hello');
            }

            header('Location: login');
        } catch (Exception $e) {

        }
    }

?>

<h1>Register Page</h1><hr>

<?php if (isset($errors) && count($errors)>0){ ?>
<div class="row">
    <div class="alert alert-danger m-4">
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    </div>
</div>

<?php } ?>

<div class="text-center col-12">

	<div class="text-left col-6">
		<form class=" mt-2 mt-md-0" action="/register" method="post" enctype=”application/x-www-form-urlencoded”>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php old('email'); ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="text" placeholder="Your Name" value="<?php old('name'); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control<?php echo !empty($errors['password']) ? ' alert-danger': '' ?>" id="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control<?php echo !empty($errors['confirm_password']) ? ' alert-danger': '' ?>" id="confirm_password" placeholder="Confirm Password" required>
            </div>

            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
	</div>

</div>

<?php view('footer'); ?>
