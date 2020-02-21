<?
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'mysql');
// define('DB_NAME', 'event_db');
 
// /* Attempt to connect to MySQL database */
// try{
    
//     $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // The database + dummy-events/users to use during development

//     $sql = "CREATE DATABASE event_db;
    
//     USE event_db;
    
//     CREATE TABLE users (
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         email VARCHAR (254) NOT NULL,
//         name VARCHAR (100) NOT NULL,
//         password VARCHAR (100)
//     ) ENGINE = INNODB;
    
//     CREATE TABLE categories (
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         name VARCHAR (100) NOT NULL
//     ) ENGINE = INNODB;
    
//     CREATE TABLE events (
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         title varchar (100) not null,
//         text TEXT not null,
//         img_url varchar (2048) not null,
//         category_id INT NOT NULL,
//         FOREIGN KEY (category_id) REFERENCES categories (id)
//     ) ENGINE = INNODB;
    
//     CREATE TABLE signups (
//         user_id INT NOT NULL,
//         event_id INT NOT NULL,
//         sname varchar (100) not null,
//         semail varchar (100) not null,
//         CONSTRAINT user_event_pk PRIMARY KEY (user_id, event_id),
//         -- FOREIGN KEY (user_id) REFERENCES users(id),
//         FOREIGN KEY (event_id) REFERENCES events(id)
//     ) ENGINE = INNODB;
    
//     INSERT INTO
//         categories (name)
//     values
//         ('Föreläsning'),
//         ('AW'),
//         ('Hemligt');
    
//     INSERT INTO
//         events (title, text, img_url, category_id)
//     values
//         (
//             'React 101',
//             'Lära sig allt, alla är välkomna',
//             'https://www.bild.se/hej.png',
//             1
//         ),
//         (
//             'Dricka',
//             'Dricka allt, alla är välkomna',
//             'https://www.bild.se/hej.png',
//             2
//         ),
//         (
//             'Hemligheter 101',
//             'Hemlighåll allt, alla är välkomna',
//             'https://www.bild.se/hej.png',
//             3
//         );
    
//     INSERT INTO
//         users (name, email, password)
//     values
//         ('admin', 'skdlfm@gmail.com', 'Hemligt123');
    
//     INSERT INTO
//         users (name, email)
//     values
//         ('Sandra', 'spedersenlundell@gmail.com'),
//         ('Viktor', 'viktor@epost.com'),
//         ('Mirza', 'mirza@epost.com'),
//         ('Marc', 'marc@epost.com');
    
//     INSERT INTO
//         signups (user_id, event_id)
//     values
//         (2, 3),
//         (4, 2),
//         (1, 1),
//         (2, 1),
//         (3, 1),
//         (4, 1),
//         (5, 1);
    
//     SELECT
//         name,
//         email
//     FROM
//         signups
//         JOIN users ON users.id = signups.user_id
//         JOIN events ON events.id = signups.event_id
//     WHERE
//         events.title = 'React 101';";


// $pdo->exec($sql);
       
    
// } catch(PDOException $e){
//     die("ERROR: Could not connect. " . $e->getMessage());
// }

?>


<?php
$servername = "localhost";
$username = "root";
$password = "mysql";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   
    $sql = "CREATE DATABASE event_db; 
    
    USE event_db;
    
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR (254) NOT NULL,
        name VARCHAR (100) NOT NULL,
        password VARCHAR (100)
    ) ENGINE = INNODB;
    
    CREATE TABLE categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR (100) NOT NULL
    ) ENGINE = INNODB;
    
    CREATE TABLE events (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title varchar (100) not null,
        text TEXT not null,
        img_url varchar (2048) not null,
        category_id INT NOT NULL,
        FOREIGN KEY (category_id) REFERENCES categories (id)
    ) ENGINE = INNODB;
    
    CREATE TABLE signups (
        id INT AUTO_INCREMENT,
        event_id INT NOT NULL,
        sname varchar (100) not null,
        semail varchar (100) not null,
        CONSTRAINT user_event_pk PRIMARY KEY (id),
        FOREIGN KEY (event_id) REFERENCES events(id)
    ) ENGINE = INNODB;
    
    INSERT INTO
        categories (name)
    values
        ('Föreläsning'),
        ('AW'),
        ('Hemligt');
    
    INSERT INTO
        events (title, text, img_url, category_id)
    values
        (
            'React 101',
            'Lära sig allt, alla är välkomna',
            'https://www.bild.se/hej.png',
            1
        ),
        (
            'Dricka',
            'Dricka allt, alla är välkomna',
            'https://www.bild.se/hej.png',
            2
        ),
        (
            'Hemligheter 101',
            'Hemlighåll allt, alla är välkomna',
            'https://www.bild.se/hej.png',
            3
        );
    
    INSERT INTO
        users (name, email, password)
    values
        ('admin', 'admin@email.com', 'hemligt123');

    
    INSERT INTO
        signups (event_id, sname, semail)
    values
        (1, 'Pelle jansson', 'email@email.com'),
        (1, 'Anders jansson', 'email@email.com'),
        (1, 'Sven jansson', 'email@email.com'),
        (1, 'Pernilla jansson', 'email@email.com'),
        (2, 'Olle jansson', 'email@email.com'),
        (2, 'Berit jansson', 'email@email.com'),
        (2, 'Viktor jansson', 'email@email.com');
    
    -- Behöver vi denna?

    -- SELECT  
    --     sname,
    --     semail
    -- FROM
    --     signups
    --     JOIN users ON users.id = signups.user_id
    --     JOIN events ON events.id = signups.event_id
    -- WHERE
    --     events.title = 'React 101';";
         // use exec() because no results are returned
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>