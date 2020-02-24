<?
$servername = "localhost";
$username = "root";
$password = "mysql";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   
    $sql = "CREATE DATABASE IF NOT EXISTS event_db; 
    
    USE event_db;
    
    CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
    
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


?>