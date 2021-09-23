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
    <div class="header">
        <img src="./img/logo.png" alt="Firmenlogo" id="img_firmenlogo">
        <button id="btn_search" onclick="triggerSearch()"><img src="./img/search.png" alt="Suchen" id="img_search"></button>
    </div>
    <br><br><br>
    <div class="div_result">
        <h1 id="txt_name">Peter Miller</h1>
        <img id="img_person" src="https://thispersondoesnotexist.com/image">
        <br><a id="separator">–––––––––/–––––––––</a>
        <p id="txt_email">E-Mail</p>
        <p id="txt_phone">Phone</p>
        <p id="txt_postiton">Position</p>
        <p id="txt_dept">Departement</p>
    </div>
</body>

<script>
    function triggerSearch() {
        var searchTerm = prompt("Suche")
        alert(searchTerm) // For debugging
    }
</script>

</html>