<?php

require_once './autoloader.php';
require_once './database.php';

$title_header = 'Sign-in to see awasome wall !';
$userManager = new UserManager($db);
require 'templates/form.php';