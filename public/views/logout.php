<?php

require_once 'app/Libs/Session.php';

Session::start();

// Session::destroy();
Session::setLoginStatus(false);
header('Location: /login');