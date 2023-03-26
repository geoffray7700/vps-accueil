
<?php


$user = 'eleve';
$pass = 'eleve';

try {
    $db = new PDO('mysql:host=localhost;port=3307;dbname=opticontact', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
gi