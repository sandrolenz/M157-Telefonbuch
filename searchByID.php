<?php
// get id
$searchTerm = $_POST['id'];

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
    // set command & execute
    $sql = "SELECT p.id, p.firstname, p.lastname, p.email, p.phone, d.departement, pos.position FROM people p INNER JOIN departement d ON p.fk_departement = d.id INNER JOIN position pos ON p.fk_position = pos.id WHERE p.id =" . $searchTerm;
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            echo "<h1 id='txt_name'>" . $row["firstname"] . " " . $row["lastname"] . "</h1><br>";
            echo "<br><a id='separator'>–––––––––/–––––––––</a><br>";
            echo "<p id='txt_email'><strong>E-Mail:</strong> " . $row["email"] . "</p>";
            if ($row["phone"] == "") {
                echo "<p id='txt_phone'><strong>Phone:</strong> n/a</p>";
            } else {
                echo "<p id='txt_phone'><strong>Phone:</strong> " . $row["phone"]. "</p>";
            };
            echo "<p id='txt_position'><strong>Position:</strong> " . $row["position"] . "</p>";
            echo "<p id='txt_dept'><strong>Departement:</strong> " . $row["departement"] . "</p>";}
    } else {
        echo 'Something went wrong';
    }
} else {
    // if this happens, run
    // -> should never be thrown, unless script is called directly and not via the buttons
    echo "<h1 id='txt_name'>ERROR: Couldn't get the id</h1><br>";
};

$conn->close();
?>