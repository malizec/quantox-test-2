<?php

switch ($url[1]) {
	case 'login':
		view('login');
		break;

	case 'register':
		view('register');
		break;

	case 'search':
		view('search');
		break;

	case 'logout':
		view('logout');
		break;

	case '':
		view('index');
		break;

	default:
		view('404');
		break;
}