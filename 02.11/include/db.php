<?php

$conn = new mysqli (
    hostname:'127.0.0.1',
    username:'php',
    password:'php',
    database:'4bg2',
    port:'3306'
);

if($conn ->connect_errno){
    echo "Failed to connect to MySQL" . 
    mysqli_connect_errno();
    die;
    
}
else {
    echo "connection successful";
}

    

function storeMessage(string $email , string $message): bool 
{
    global $conn; 

    $sql = sprintf(
        'INSERT INTO contactmessage (email,message) values ("%s","%s")' , 
        $email, 
        $message

    );

$result = $conn->query($sql);

$conn->close();

return $result; 
}

