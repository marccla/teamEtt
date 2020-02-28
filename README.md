# Innehållsförteckning
1. [Systembeskrivning](#Systembeskrivning)
    1. [Skapa användare]
    2. [Skapa event]
    3. [Anmäla sig till event]
    4. [Logga in]
    5. [Databas]
    6. [Visning av events]
2. [Användarbeskrivning](#Användarbeskrivning)
    1. [Skapa användare](#subparagraph1)
    2. [Logga in] (#Logga in)
    3. [Anmäla sig till event]
    4. [Skapa event]
3. [Another paragraph](#paragraph2)

## Systembeskrivning <a name="systembeskrivning"></a>
    När man går in på sidan så landar man på index(.php) som inkluderar:
* Head som är head-tag med metadata, länkar till css och bootstrap och en öppnande body-tag
* Nav som är en horisontell meny som består av en logotyp till vänster som också är en länk till index.php och till höger en dropdown-meny med länkar till de olika kategorierna samt en knapp för att öppna modal för att skapa nya events som visas om man är inloggad och en knapp för att logga in om det inte finns en inloggad session resp en utloggningsknapp om man är inloggad. 
* Create-Event som är själva modalen med formulär för att skapa nya events
* Events som är en komponent som vie get-events hämtar alla events från databasen och renderar dem. Är man inloggad så skapas även knappar för att editera och radera varje ensklit event. Knapparna är a-taggar (länkar) som länkar till delete-event.php resp edit-event-php som byggs på med parameter innehållande respektive events id så att man när man landar på resp sida har information om vilket event som ska behandlas. 
* Footer som enbart innehåller stångade body- och html-tagg

### Skapa användare
Create-user.php: Lagrar data när form är skickat genom en if-sats , därefter sparas variablerna $username och $password som blir validerade. 
Parametern $password blir appendad med en password_hash funktion som i sin tur bildar en slumpmässig string som hashar lösenordet.

### Skapa event
Formulärdatan skickas med en POST-request och används i en sql-query för att lägga in datan i databasen. Om INSERT lyckas så slussas man vidare till index.php där man kan se alla events, inklusive det nya.

### Anmäla sig till events
inkludera db/config.php och get-events.php

Genom att binda eventets id till urlen kan vi visa upp ett specifikt inlägg på en helsidesvy. (event.php) Kollar alla events och visar bara det event med samma id, vi använder först en foreach och sedan en while för att kolla det specifika id:et. Lösningen för att loopa ut vilka som kommer på det specifika eventet har samma struktur.

Create-signup.php

Förbereder ett statement, binder om våra statements till shorthands. använder execute(), lägger in i databas eller sparar felmeddelande i $e.

### Logga in
Inkluderar vår config.php, vi skapar vaiabler för vårt lösenord samt en för ev. Felmeddelanden. Kollar vilken typ av data vi tar emot. Skapar statement för att undvika SQL-injections. Hämtar id, username och password från vår "users" tabell.
använder password_verify() för att kolla vårt hashade lösenord. Om lösenordet stämmer startar en session. Kallar $_SESSION['logggedin'] = true, vilket öppnar upp funktioner senare på "välkomstvyn", sparar även id och username i 
$_SESSION. Får vi istället ett felmeddelande så sparar vi det i password_err och skriver ut det.

### Databas
Vi gjorde en koppling till databasen i PDO format som vi deklarerade till en variabel($conn).
Sedan skapar och pekar vi på databasen event_db2(create, use) och i den gjorde vi 4 tabeller.
På bifogad bild ser man kopplingarna vi gjorde från och till de olika tabellerna med hjälp av FOREIGN KEY:s med undantag att author också ligger i events. 

Vi lade även in några test “values” i de olika tabellerna för att underlätta.

### Events
get-events.php:
Inkluderar db/config.php
Pekar och hämtar all information i tabellen events med hjälp av SELECT  FROM och fetchAll

events.php:
Inkluderar get-events.php
Gör en foreach loop på events (events as event) där vi inuti visar ut titel, text, bild och författare av eventet i ett bootstrap-card. Som vi sedan inkluderar i index.html


## Användarbeskrivning <a name="Användarbeskrivning"></a>
The first paragraph text

### Skapa användare
Du skapar ett användarkonto genom att trycka på “Login” knappen som för dig till en sida där du tar dig vidare genom att klicka på “Skapa ett här”. Du fyller i kolumnerna med det önskade lösenordet och användarnamnet. Obs! Lösenordet får inte vara mindre än 6 tecken.

### Logga in
Logga in genom att trycka på Logga in uppe till höger på första sidan.
fyll i ditt användarnamn och lösenord som du angav när du registrerade dig.
tryck sedan logga in.

### Anmäla sig till events
Gå in på det eventet du vill skriva upp dig på genom att klicka på eventet på första sidan. Där fyller du i två fält, ett med ditt namn och ett med din email.
Där kan du även se vilka som kommer i en lista undertill.

### SKapa event <a name="subparagraph4"></a>
Som inloggad kan du välja ’Nytt event’, vilket öppnar en modal där du fyller i information om ditt event. Du kan länka till en bild om du vill, eller lämna fältet tomt, och sedan väljer du en av befintliga kategorier och trycker på skicka.
    Sedan kan du uppdatera eventet genom att trycka på ’Ändra’, eller ta bort det genom ’Ta bort’-knappen.

