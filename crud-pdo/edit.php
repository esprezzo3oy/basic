<?PHP
require_once('connection.php');
if (isset($_REQUEST['UPDATE_ID'])) {
    try {
        $ID_ = $_REQUEST['UPDATE_ID'];
        $SELECT_STATEMENT = $DATABASE->prepare("SELECT * FROM tbl_person WHERE ID = :USERID");
        $SELECT_STATEMENT->bindParam(':USERID', $ID_);
        $SELECT_STATEMENT->execute();
        $ROWS_FETCH_DATA = $SELECT_STATEMENT->fetch(PDO::FETCH_ASSOC);
        extract($ROWS_FETCH_DATA);
    } catch (PDOException $PDOE) {
        $PDOE->getMessage();
    }
}

if (isset($_REQUEST['btn_update'])) {
    $FIRSTNAME_UPDATE = $_REQUEST['txt_firstname'];
    $LASTNAME_UPDATE = $_REQUEST['txt_lastname'];

    if (empty($FIRSTNAME_UPDATE)) {
        $errorMessage = "Please Enter Firstname...";
    } elseif (empty($LASTNAME_UPDATE)) {
        $errorMessage = "Please Enter Lastname...";
    } else {
        try {
            if (!isset($errorMessage)) {
                $UPDATE_STATEMENT = $DATABASE->prepare("UPDATE tbl_person SET FIRSTNAME = :FNAME_UPDATE, LASTNAME = :LNAME_UPDATE WHERE ID = :USERID");
                $UPDATE_STATEMENT->bindParam(':FNAME_UPDATE', $FIRSTNAME_UPDATE);
                $UPDATE_STATEMENT->bindParam(':LNAME_UPDATE', $LASTNAME_UPDATE);
                $UPDATE_STATEMENT->bindParam(':USERID', $ID_);

                if ($UPDATE_STATEMENT->execute()) {
                    $updateMessage = "Record update successfully...";
                    header("refresh:2;index.php");
                }
            }
        } catch (PDOException $PDOE) {
            echo $PDOE->getMessage();
        }
    }
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
        <div class="display-3 text-center mb-2">EDIT PAGE</div>
        <?PHP
        if (isset($errorMessage)) {

        ?>
            <div class="alert alert-danger">
                <strong>ERROR : <?PHP echo $errorMessage; ?></strong>
            </div>
        <?PHP } ?>

        <?PHP
        if (isset($updateMessage)) {

        ?>
            <div class="alert alert-success">
                <strong>SUCCESS : <?PHP echo $updateMessage; ?></strong>
            </div>
        <?PHP } ?>
        <form method="post" class="form-horizontal mt-5">
            <div class="form-group text-center">
                <div class="row">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>
                    <div class="col-sm-3 col-md-6">
                        <input type="text" name="txt_firstname" class="form-control" value="<?PHP echo $FIRSTNAME; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>
                    <div class="col-sm-3 col-md-6">
                        <input type="text" name="txt_lastname" class="form-control" value="<?PHP echo $LASTNAME; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-info" value="UPDATE">
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>


    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>