<?PHP
require_once('connection.php');
if (isset($_REQUEST['DELETE_ID'])) {
    $ID_DELETE = $_REQUEST['DELETE_ID'];
    $SELECT_STATEMENT = $DATABASE->prepare("SELECT * FROM tbl_person WHERE ID = :USERID_DELETE");
    $SELECT_STATEMENT->bindParam(':USERID_DELETE', $ID_DELETE);
    $SELECT_STATEMENT->execute();
    $ROWS_FETCH_DATA = $SELECT_STATEMENT->fetch(PDO::FETCH_ASSOC);

    # DELETE DATA IN ROWS FROM DATABASE
    $DELETE_STATEMENT = $DATABASE->prepare('DELETE FROM tbl_person WHERE ID = :USERID_DELETE');
    $DELETE_STATEMENT->bindParam(':USERID_DELETE', $ID_DELETE);
    $DELETE_STATEMENT->execute();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="display-3 text-center mb-2">information</div>
        <a href="add.php" class="btn btn-success mb-3">ADD +</a>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>FIRSTNAME</th>
                    <th>LASTNAME</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                $SELECT_STATEMENT = $DATABASE->prepare("SELECT * FROM tbl_person");
                $SELECT_STATEMENT->execute();
                while ($TABLEROWS = $SELECT_STATEMENT->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?PHP echo $TABLEROWS["FIRSTNAME"]; ?></td>
                        <td><?PHP echo $TABLEROWS["LASTNAME"]; ?></td>
                        <td><a href="edit.php?UPDATE_ID=<?PHP echo $TABLEROWS["ID"]; ?>" class="btn btn-warning">EDIT</a></td>
                        <td><a href="?DELETE_ID=<?PHP echo $TABLEROWS["ID"]; ?>" class="btn btn-danger">DELETE</a></td>
                    </tr>
                <?PHP } ?>
            </tbody>
        </table>
    </div>





    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>