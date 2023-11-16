<?php

/*$conn = mysqli_connect(
    hostname: '127.0.0.1',
    username: 'php',
    password: 'php',
    database: '4bg2',
    port: 3306
);

check connection

 - wersja proceduralna
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL" . mysqli_connect_errno();
}
else{
    echo "Connection successfull";
}
*/

//wersja obiektowa

$conn = new mysqli(
    hostname: '127.0.0.1',
    username: 'root',
    password: '',
    database: '4bg2',
    port: 3306
);

if($conn->connect_errno){
    echo "Failed to connect to MySQL" . mysqli_connect_errno();
    die;
}

function storeMessage(string $email, string $message): bool
{
    global $conn;

    $sql = sprintf(
        'INSERT INTO contact_messages (email, message) values ("%s", "%s")',
        $email,
        $message,

    );
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function findAdminByLogin(string $login): ?array
{
    global $conn;

    $sql = sprintf(
        'SELECT * FROM admin WHERE login = "%s" LIMIT 1',
        $login
    );
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()){
        $result->free_result();

        return $row;
    }

    return null;
}



function getContactMessages(): array
{
    global $conn;
    $message = [];
    $sql = 'SELECT * from contact_messages';
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc())
    $messages[] = $row;
    {
        $result->free_result();

        return $messages;
    }
}
