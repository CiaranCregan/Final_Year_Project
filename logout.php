<?php

require_once 'core/init.php';

unset($_SESSION['userid']);
session_destroy();

error_redirect('index.php');
exit;

?>