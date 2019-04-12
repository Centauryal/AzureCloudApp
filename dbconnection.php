<?php
	$host = "centauryappserver.database.windows.net";
    $user = "alfacentaury";
    $pass = "Centaury21";
    $db = "db_registerazure";
    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }
?>