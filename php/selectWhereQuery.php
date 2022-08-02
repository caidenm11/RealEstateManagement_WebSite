<!doctype html>
<html>
<head>
    <title>Display Records of a table</title>
    <link rel="stylesheet" href="../css/style2.css" />
</head>

<body>
    <?php
    $servername = "localhost";
    $dbname = "RedGorillasDB";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p style='color:green'>Connection Was Successful</p>";
    } catch (PDOException $err) {
        echo "<p style='color:red'> Connection Failed: " . $err->getMessage() . "</p>\r\n";
    }

    try {
        $sql = "SELECT * FROM Address WHERE City = '$_POST[City]'";

        $stmnt = $conn->prepare($sql);

        $stmnt->execute();

        $row = $stmnt->fetch();
        if ($row) {
            echo '<table>';
            echo '<tr> <th>Address ID</th> <th>Street Name</th> <th>Building Number</th> <th>City</th> <th>Province</th> </tr>';
            do {
                echo "<tr><td>$row[AddressID]</td><td>$row[StreetName]</td><td>$row[BuildingNumber]</td><td>$row[City]</td><td>$row[Province]</td></tr>";
            } while ($row = $stmnt->fetch());
            echo '</table>';
        } else {
            echo "<p> No Record Found!</p>";
        }
    } catch (PDOException $err) {
        echo "<p style='color:red'>Record Retrieval Failed: " . $err->getMessage() . "</p>\r\n";
    }
    // Close the connection
    unset($conn);

    echo "<a href='../Database.html'>Back to the Database Management Portal</a>";

    ?>
</body>

</html>