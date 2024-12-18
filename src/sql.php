<?php
function addUser($data)
{
  try {
    $statement = DB->prepare("INSERT INTO users (username, password, email, role)VALUES (:username, SHA2(:password, 0), :email, :role)");
    $statement->execute([
      ":username" => $data['username'],
      ":password" => $data['password'],
      ":email" => $data['email'],
      ":role" => "user"
    ]);
  } catch (PDOException $err) {
    echo $err->getMessage();
  }
}

function getUser($username, $password)
{
  $statement = DB->prepare("SELECT * FROM users WHERE username=:username AND password=SHA2(:password, 0)");
  $statement->execute([
    ":username" => $username,
    ":password" => $password
  ]);

  return $statement->fetch(PDO::FETCH_ASSOC);
}

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
