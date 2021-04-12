<?php
session_start();
session_unset();
session_destroy();
header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/connexion.html');