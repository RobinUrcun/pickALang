<?php 
session_start();

$vote =  $_GET['id'];
// $address_ip = $_SERVER['REMOTE_ADDR'];
$address_ip = $_SERVER['REMOTE_ADDR'];
echo "'".$address_ip."'";

include_once(__DIR__ . '/utils/db_connect.php');


try {
    $mysqlClient->beginTransaction();
    $request = $mysqlClient->prepare("SELECT * FROM voted_ip WHERE adress_ip = '$address_ip'");
    $request->execute();
    $userVote = $request->fetch();

    if($userVote){
        if($userVote['language_id'] !== $vote){

            $updateUser = $mysqlClient->prepare("UPDATE voted_ip SET language_id = $vote WHERE adress_ip = '$address_ip'");
            $updateUser->execute();

            $removeVote = $mysqlClient->prepare("UPDATE languages_table SET score = score - 1 WHERE language_id = :language_id");
            $removeVote->execute(['language_id'=> $userVote['language_id']]);

            $addVote = $mysqlClient->prepare("UPDATE languages_table SET score = score + 1 WHERE language_id = :language_id");
            $addVote->execute(['language_id' => $vote]);

        }
    } else {
        $addUser = $mysqlClient->prepare("INSERT INTO voted_ip (adress_ip, language_id) VALUES (:adress_ip, :language_id)");

        $addUser->execute([
            'adress_ip' => $address_ip,
            'language_id' => $vote
        ]);

        $addVote = $mysqlClient->prepare("UPDATE languages_table SET score = score + 1 WHERE language_id = $vote");
        $addVote->execute();
    }
    $mysqlClient->commit();

    $_SESSION['toast_message'] = 'Merci pour votre vote !';
    header('Location: /ranking.php');
    exit();

}catch (Exception $e){
    $mysqlClient->rollBack();
    echo "Erreur : " . $e->getMessage();
};