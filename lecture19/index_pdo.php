<?php
/**
 * PDO (MySQL)
 */

// 데이터 베이스 -> PDO -> CRUD

try {
    $dbh = new PDO('mysql:dbname=phpblog;host=localhost:3307','root','123456');

    //EXEC
    $dbh->exec('CREATE TABLE tests(`id` INT PRIMARY KEY AUTO_INCREMENT)');

    //QUERY
    $sth = $dbh->query(`SELECT * FROM posts LIMIT 10`);
    while($row = $sth->fetchObject()) {
        var_dump($row);
    }

    //PREPARE
    $sth= $dbh->prepare('SELECT * FROM posts WHERE user_id= :user_id LIMIT 120');
//    $userId = 478;
//    $sth->bindParam(':user_id',$userId,PDO::PARAM_INT);
    if($sth->execute([':user_id' => 478])){
        while($row = $sth->fetchObject()) {
            var_dump($row);
        }
    }
    //TRANSACTION
    $dbh->beginTransaction();

    if($dbh->inTransaction()) {
        $dbh->exec('DELETE FROM posts WHERE user_id = 478');
        $dbh->rollback();
    }


} catch(PDOException $e) {
    var_dump($e -> getMessage());
}