<?php

    session_start();

    $_SESSION['option'] = $_POST['option'];
    $_SESSION['access'] = 'set';

?>