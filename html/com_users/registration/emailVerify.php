<?php
# @Author: SPEDI srl
# @Date:   26-02-2018
# @Email:  sviluppo@spedi.it
# @Last modified by:   SPEDI srl
# @Last modified time: 26-02-2018
# @License: GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
# @Copyright: Copyright (C) SPEDI srl

// $email = $_POST['email'];
$email = 'e.cappato@spedi.it';
$dsn = 'mysql:dbname=spedi_jtest;host=31.14.128.208';
$user = 'spedi_jtest';
$password = 'spedi_jtest';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$sql = 'SELECT id, email
        FROM jug34__users';
$sth = $dbh->prepare($sql);
$sth->execute();
$red = $sth->fetchAll();
var_dump($red);

// $count = $sth->rowCount();

// echo $count;

// $sth->execute(array(':calories' => 175, ':colour' => 'yellow'));
// $yellow = $sth->fetchAll();

// // Get a db connection.
// $db = JFactory::getDbo();
//
// // Create a new query object.
// $query = $db->getQuery(true);
//
// // Select all records from the user profile table where key begins with "custom.".
// // Order it by the ordering field.
// $query->select($db->quoteName(array('id', 'email')));
// $query->from($db->quoteName('#__users'));
// $query->where($db->quoteName('email') . ' = '. $db->quote($email));
//
// // Reset the query using our newly populated query object.
// $db->setQuery($query);
//
// // Load the results as a list of stdClass objects (see later for more options on retrieving data).
// $results = $db->loadObjectList();
//
// echo $db->getNumRows();
