<?php
/* local db configuration */
$dsn = 'mysql:dbname=text4lqq_qu1cksh9r;host=localhost;port=3306;'; //database name
$user = 'text4lqq_qu1cksh9r'; //db user
$password = 'qu1ck$#9r@xyz'; //db user password
//  Create a PDO instance that will allow you to access your database
try {
    $dbh = new PDO($dsn, $user, $password);
}
    catch(PDOException $e) {
        //var_dump($e);
        echo("PDO error occurred");
    }
    catch(Exception $e) {
        //var_dump($e);
        echo("Error occurred");
}    

echo "END Success!";

?>