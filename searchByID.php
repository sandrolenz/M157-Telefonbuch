<?php
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
    $sql = "SELECT p.id, p.firstname, p.lastname, p.email, p.phone, d.departement, pos.position FROM people p INNER JOIN departement d ON p.fk_departement = d.id INNER JOIN position pos ON p.fk_position = pos.id WHERE p.id =" . $searchTerm;
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            ?> <?php echo "<script> function showResult(){" ?> document.getElementById("txt_name").innerHTML = "<?php echo "" . $row["firstname"] . " " . $row["lastname"]; ?>"
                document.getElementById("txt_email").innerHTML = "<?php echo "" . $row["email"]; ?>"
                document.getElementById("txt_phone").innerHTML = "<?php echo "" . $row["phone"]; ?>"
                document.getElementById("txt_position").innerHTML = "<?php echo "" . $row["position"]; ?>"
                document.getElementById("txt_dept").innerHTML = "<?php echo "" . $row["departement"]; ?>" <?php echo '}; </script> <button onclick="showResult()">Resultat zeigen</button>' ?>
                <?php }
    } else {
        echo 'Something went wrong';
    }
} else {
    echo 'alert("ERROR: Couldnt get the search term!");';
};

$conn->close();
?>