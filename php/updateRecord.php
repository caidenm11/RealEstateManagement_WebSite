<!doctype html>
<!-- (C) Saeed Mirjalili -->
<html>
<head>
    <title>Update a record of a table</title>
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
        $sql = "UPDATE $dbname.Address SET StreetName = :sn WHERE AddressID = :AddressID";
        $stmnt = $conn->prepare($sql);         // read about prepared statement here: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
        $stmnt->bindParam(':AddressID', $_POST['AddressID']);
        $stmnt->bindParam(':sn', $_POST['sname']);

        $stmnt->execute();
        echo "<p style='color:green'>Record Updated Successfully</p>";
    } catch (PDOException $err) {
        echo "<p style='color:red'>Record Update Failed: " . $err->getMessage() . "</p>\r\n";
    }
    // Close the connection
    unset($conn);

    echo "<a href='../Database.html'>Back to the Database Management Portal</a>";
//    echo "<a href='../updateRecord.html'>Update More</a>";

    ?>
</body>

</html>