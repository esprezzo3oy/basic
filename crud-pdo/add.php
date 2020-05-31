<?PHP
require_once('connection.php');
if (isset($_REQUEST['btn_insert'])) {
    $FIRSTNAME_ADD = $_REQUEST['txt_firstname'];
    $LASTNAME_ADD = $_REQUEST['txt_lastname'];

    if (empty($FIRSTNAME_ADD)) {
        $errorMessage = "Please enter Firstname...";
    } elseif (empty($LASTNAME_ADD)) {
        $errorMessage = "Please enter Lastname...";
    } else {
        try {
            if (!isset($errorMessage)) {
                $INSERT_STATEMENT = $DATABASE->prepare("INSERT INTO tbl_person(FIRSTNAME, LASTNAME) VALUES (:FNAME_ADD, :LNAME_ADD)");
                $INSERT_STATEMENT->bindParam(':FNAME_ADD', $FIRSTNAME_ADD);
                $INSERT_STATEMENT->bindParam(':LNAME_ADD', $LASTNAME_ADD);

                if ($INSERT_STATEMENT->execute()) {
                    $insertMessage = "Insert Successfully";
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
        <div class="display-3 text-center mb-2">ADD</div>
        <?PHP
        if (isset($errorMessage)) {

        ?>
            <div class="alert alert-danger">
                <strong>ERROR : <?PHP echo $errorMessage; ?></strong>
            </div>
        <?PHP } ?>

        <?PHP
        if (isset($insertMessage)) {

        ?>
            <div class="alert alert-success">
                <strong>SUCCESS : <?PHP echo $insertMessage; ?></strong>
            </div>
        <?PHP } ?>
        <form method="post" class="form-horizontal mt-5">
            <div class="form-group text-center">
                <div class="row">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>
                    <div class="col-sm-3 col-md-6">
                        <input type="text" name="txt_firstname" class="form-control" placeholder="Enter Firstname...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>
                    <div class="col-sm-3 col-md-6">
                        <input type="text" name="txt_lastname" class="form-control" placeholder="Enter Lastname...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_insert" class="btn btn-success" value="INSERT">
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