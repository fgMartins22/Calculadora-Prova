<?php
session_start();

unset($_SESSION['numeros']);

$_SESSION['sucesso'] = 'Histórico deletado!';

header('location:index.php');