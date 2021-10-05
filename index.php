<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M157 - MitarbeiterTelefonbuch</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="icon" type="image/png" href="./img/icon.png">
    <!-- Roboto Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div id="page">
        <div id="content-wrap">
            <div class="header">
                <a href="./index.php"><img src="./img/logo.png" alt="Firmenlogo" id="img_firmenlogo"></a>
                <button id="btn_search" onclick="triggerSearch()"><img src="./img/search.png" alt="Suchen" id="img_search"></button>
            </div>
            <br><br><br>
            <div class="div_result">
                <h1 id="txt_name">Vorname Nachname</h1><br>
                <!-- <img id="img_person" src="./img/avatar_placeholder.jpg">  https://thispersondoesnotexist.com/image -->
                <br><a id="separator">–––––––––/–––––––––</a><br>
                <p id="txt_email">E-Mail</p>
                <p id="txt_phone">Telefonnummer</p>
                <p id="txt_postiton">Position</p>
                <p id="txt_dept">Abteilung</p>
            </div>
        </div>
        <footer>
            <div id="div_footer">
                <p>M157 - MitarbeiterTelefonbuch</p>
                <p><a class="footer_link" href="https://github.com/sandrolenz/M157-Telefonbuch" target="_blank">GitHub</a> | <a class="footer_link" href="./impressum.html">Impressum</a></p>
            </div>
        </footer>
    </div>
</body>

<?php
$servername = "localhost";
$username = "matteo";
$password = "abc123";
$dbname = "m157_telefonbuch";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT p.id, p.firstname, p.lastname, p.email, p.phone, d.departement, pos.position FROM people p INNER JOIN departement d ON p.fk_departement = d.id INNER JOIN position pos ON p.fk_position = pos.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] ." " . $row["position"] . " " . $row["departement"] ."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<script src="./script.js"></script>

</html>