<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 14.05.2019
 * Time: 15:17
 */
$email = trim($_REQUEST['email']);
$password = md5($_REQUEST['password']);
$query = "SELECT id_user FROM users WHERE email='$email' AND password='$password'";
include 'DB.php';
$stmt = $pdo->query($query)->fetchColumn();
if ($stmt)
{
    header('Location: /cabinet.php');
}
else
    echo 'Вход \'не выполнен.';