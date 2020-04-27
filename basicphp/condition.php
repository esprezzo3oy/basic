<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo 'Condition'; ?></title>
</head>

<body>
    <?php 
        $score = 400;
        switch($score) {
            case 300 : echo $score; break;
            case 400 : echo $score; break;
            case 500 : echo $score; break;
            default : echo "incorrect!!";
        }
    ?>
</body>

</html>