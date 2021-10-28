<?php
$searchTerm = $_POST['search'];

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

if ($searchTerm != "") {
    $sql = "SELECT p.id, p.firstname, p.lastname, p.email, p.phone, d.departement, pos.position FROM people p INNER JOIN departement d ON p.fk_departement = d.id INNER JOIN position pos ON p.fk_position = pos.id WHERE p.firstname LIKE" . '"%' . $searchTerm . '%" OR p.lastname LIKE "%' . $searchTerm . '%" OR d.departement LIKE "%' . $searchTerm . '%" OR pos.position LIKE "%' . $searchTerm . '%" OR p.email LIKE "%' . $searchTerm . '%" OR p.phone LIKE "%' . $searchTerm . '%"';
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
                echo "<h1 id='txt_name'>" . $row["firstname"] . " " . $row["lastname"] . "</h1><br>";
                echo "<br><a id='separator'>–––––––––/–––––––––</a><br>";
                echo "<p id='txt_email'>" . $row["email"] . "</p>";
                echo "<p id='txt_phone'>" . $row["phone"]. "</p>";
                echo "<p id='txt_position'>" . $row["position"] . "</p>";
                echo "<p id='txt_dept'>" . $row["departement"] . "</p>";}
    } elseif ($result->num_rows > 1) {
        // output data of each row
        echo '<h1 class="result_list">Mehrere Resultate:</h1>';
        while ($row = $result->fetch_assoc()) {
            echo '<p class="result_list"><button onclick="searchByID('. $row["id"] .')">' . $row["id"] . "</button> " . $row["firstname"] . " " . $row["lastname"] .", " . $row["position"] . ", " . $row["departement"] ."</p>"; }
        } else {
            echo "<h1 id='txt_name'>Keine Resultate</h1><br>";
    }
} else {
    echo 'alert("ERROR: Couldnt get the search term!");';
};

$conn->close();
?>