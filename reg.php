<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 14.05.2019
 * Time: 15:17
 */
include 'DB.php';
$name = htmlentities(clear($_POST['name']));// Вита/+-*лий107
$surname = htmlentities(clear($_POST['surname']));
$patronymic = htmlentities(clear($_POST['patronymic']));
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];// preg_match()
$email = $_POST['email'];// preg_match()
$password = md5($_POST['password']);// preg_match()
//$user_ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '';
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '';
} else {
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
}
$date_now = date('Y-m-d');
// чтобы не было повторов данных phone & email. Если хоть один номер телефона или email есть в базе, то не давать регистрироватся.
// вы успешно зарег, такой пользователь уже существует
$queryCheck = "SELECT * FROM users WHERE phone = '$phone' OR email = '$email'";
$query = "INSERT INTO users (name, surname, patronymic, birthday, user_ip, phone, email, password, registration_date) VALUES ('$name', '$surname', '$patronymic', '$birthday', '$ip', '$phone', '$email', '$password', '$date_now')";
$stmtCheck = $pdo->query($queryCheck)->fetchColumn();
if ($stmtCheck)
{
    echo 'Такие данные уже есть.';
}
else
{
    $stmt = $pdo->query($query);
    echo 'Данные добавлены.';
}

