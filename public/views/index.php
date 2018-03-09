<?php

require_once 'app/Libs/Database.php';
require_once 'app/Libs/Session.php';

?>
<?php view('header'); ?>

<?php Session::start(); ?>

<?php if (Session::getLoginStatus()) { ?>
    <h1>Welcome User</h1>
<?php } ?>

<?php view('footer'); ?>

<?php