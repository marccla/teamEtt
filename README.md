# teamEtt
teamOne

Projektdokumentation, användare

Skapa användare(Mirza)

Du skapar ett användarkonto genom att trycka på “Login” knappen som för dig till en sida där du tar dig vidare genom att klicka på “Skapa ett här”. Du fyller i kolumnerna med det önskade lösenordet och användarnamnet. Obs! Lösenordet får inte vara mindre än 6 tecken.   

Logga in med användare(Marc)

Logga in genom att trycka på Logga in uppe till höger på första sidan.
fyll i ditt användarnamn och lösenord som du angav när du registrerade dig.
tryck sedan logga in.

Anmäla sig till event(Marc)

Gå in på det eventet du vill skriva upp dig på genom att klicka på eventet på första sidan. Där fyller du i två fält, ett med ditt namn och ett med din email.
Där kan du även se vilka som kommer i en lista undertill.


Skapa event(Sandra)











Utvecklare

Skapa användare(Mirza)  

Create-user.php: Lagrar data när form är skickat genom en if-sats , därefter sparas variablerna $username och $password som blir validerade. 
Parametern $password blir appendad med en password_hash funktion som i sin tur bildar en slumpmässig string som hashar lösenordet.


Logga in med användare(Marc)

Login.php

Inkluderar vår config.php, vi skapar vaiabler för vårt lösenord samt en för ev. Felmeddelanden. Kollar vilken typ av data vi tar emot. Skapar statement för att undvika SQL-injections. Hämtar id, username och password från vår "users" tabell.
använder password_verify() för att kolla vårt hashade lösenord. Om lösenordet stämmer startar en session. Kallar $_SESSION['logggedin'] = true, vilket öppnar upp funktioner senare på "välkomstvyn", sparar även id och username i 
$_SESSION. Får vi istället ett felmeddelande så sparar vi det i password_err och skriver ut det.


Skapa event(Sandra)











Anmäla sig till event(Marc)


Single-post.php

inkludera db/config.php och get-events.php

Genom att binda eventets id till urlen kan vi visa upp ett specifikt inlägg på en helsidesvy. (event.php) Kollar alla events och visar bara det event med samma id, vi använder först en foreach och sedan en while för att kolla det specifika id:et. Lösningen för att loopa ut vilka som kommer på det specifika eventet har samma struktur.

Create-signup.php

Förbereder ett statement, binder om våra statements till shorthands. använder execute(), lägger in i databas eller sparar felmeddelande i $e.


Inloggnings-funktioner(Sandra)

Databas(Viktor)

config.php
Vi gjorde en koppling till databasen i PDO format som vi deklarerade till en variabel($conn).
Sedan skapar och pekar vi på databasen event_db2(create, use) och i den gjorde vi 4 tabeller:
users
categories
events
signups


users: 
id int AI Primary Key
	username varchar(50)
	password varchar(255)
	created_at DATETIME

categories: 
        id int(11) AI
	        name varchar(100)

events: 
	id int AI Primary Key
	title varchar(100)
	text TEXT
	img_url varchar(2048)
	category_id int
	author varchar(100)
signups:
	id int AI
	event_id int
	sname varchar(100)
	semail varchar(100)
	



 

Vi lade även in några test “values” i de olika tabellerna för att underlätta.

Visning/looping av events(Viktor)

get-events.php:
Inkluderar db/config.php
Pekar och hämtar all information i tabellen events med hjälp av SELECT  FROM och fetchAll

events.php:
Inkluderar get-events.php
Gör en foreach loop på events (events as event) där vi inuti visar ut titel, text, bild och författare av eventet i ett bootstrap-card. Som vi sedan inkluderar i index.html

