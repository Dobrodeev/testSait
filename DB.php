<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 15.05.2019
 * Time: 17:29
 */
$host = '127.0.0.1';
$db   = 'testDB';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,];
$pdo = new PDO($dsn, $user, $pass, $opt);

function clear($text)
{
    $text = trim($text);
    $text = htmlspecialchars($text);
    $text = stripcslashes($text);
    $text = strip_tags($text);
    return $text;
}