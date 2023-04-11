<?php

session_start();


    unset($_SESSION['user']);
    unset($_SESSION['Senha']);
    header('Location: index.html');





?>