<?PHP 
    $DB_HOSTNAME = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";
    $DB_NAME = "pdo-crud";

    try {
        $DATABASE = new PDO("mysql:host={$DB_HOSTNAME}; dbname={$DB_NAME}", $DB_USERNAME, $DB_PASSWORD);
        $DATABASE->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $PDOE) {
        $PDOE -> getMessage();
    }
?>