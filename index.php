<?php
if (isset($_POST['insert']))
{
    try {
        $pdoConnect = new PDO ("mysql:host=localhost; dbname=users", "root","");
    }catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $pdoQuery = "INSERT INTO `users`(`fname`, `lname`, `age`) VALUES (:fname,:lname,:age)";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":fname"=>$fname,":lname"=>$lname,":age"=>$age));
    
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PDO </title>
</head>
<body>
    <form action="" method = "post">
        <input type="text" name ="fname" required placeholder="first name"></br></br>
        <input type="text" name ="lname" required placeholder="last name"></br></br>
        <input type="number" name ="age" required placeholder="age" min="10" max="100"></br></br>
        <input type="submit" name="insert" value="insert data">
    </form>
</body>
</html>