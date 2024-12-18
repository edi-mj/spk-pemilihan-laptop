<?php
require './base.php';

// function checkUsernameSql($username)
// {
//   try {
//     $statement = DB->prepare("SELECT * FROM users WHERE username = :username");
//     $statement->bindValue(":username", $username);
//     $statement->execute();

//     return $statement->rowCount() > 0;
//   } catch (PDOException $err) {
//     echo $err->getMessage();
//   }
// }
