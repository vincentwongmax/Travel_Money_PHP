<?php

include_once 'resful.php';

$classpdo = new DatabaseAccessObject('localhost','root','','travelmoney');

$a = json_decode(file_get_contents("php://input"),true);
$c=$a["data"];
$b = $a["data"]["action"];

switch ($b) {
    case "createToken":
        createToken($c["ecToken"]);
        break;
    case "enterToken":
        enterToken($c["ecToken"]);
        break;
    case "member":
        show($c["ecToken"]);
        break;
    case "createName":
        createName($c["mainpeople"],$c["token"]);
        break;
    case "dataToDB":
        dataToDB($c["payMainMoneyPeople"],$c["userMoneyPeople"],$c["howmuchmoney"],$c["token"]);
        break;
    case "showWaterBill":
        showWaterBill($c["ecToken"]);
        break;
    default:
        echo "Error";
        break;
}

function createToken($token){
    global $classpdo;
    $myquery = $classpdo->execute('SELECT count(*) FROM token Where token=?',[$token]);
    if($myquery[0]['count(*)'] == '0'){
         $myquery2 = $classpdo->insert('token', ['token'=>$token]);
         echo json_encode(['OK']);
    }else {
        echo json_encode(['NO']);
    }
}

function enterToken($token){
    global $classpdo;
    $myquery = $classpdo->execute('SELECT * FROM token Where token=?',[$token]);
    echo json_encode($myquery);
}

function show($token){
    global $classpdo;
    $myquery = $classpdo->execute('SELECT mainpeople FROM mainpeople Where ID=?',[$token]);
    echo json_encode($myquery);
}

function createName($mainpeople,$ID){   //請輸入以建立人物名稱
    global $classpdo;
    $myquery = $classpdo->execute('SELECT count(*) FROM mainpeople Where mainpeople=? and ID =?',[$mainpeople,$ID]);
    if($myquery[0]['count(*)'] == '0'){
         $myquery2 = $classpdo->insert('mainpeople', ['mainpeople'=>$mainpeople, 'ID'=>$ID]);
         echo json_encode(['OK']);
    }else {
        echo json_encode(['NO']);
    }
}

function dataToDB($payMainMoneyPeople,$userMoneyPeople,$howmuchmoney,$ID){
    global $classpdo;
    $myquery = $classpdo->execute('SELECT count(*) FROM payrecord Where ID=? and paymoneypeople =? and usemoneypeople =? and howmuchmoney =?',[$ID,$payMainMoneyPeople,$userMoneyPeople,$howmuchmoney]);
    if($myquery[0]['count(*)'] == '0'){
         $myquery2 = $classpdo->insert('payrecord', ['ID'=>$ID,'paymoneypeople'=>$payMainMoneyPeople,'usemoneypeople'=>$userMoneyPeople,'howmuchmoney'=>$howmuchmoney]);
         echo json_encode(['OKKKKKKKK']);
    }else {
        echo json_encode(['NOOOOOOO']);
    }
}

function showWaterBill($token){
    global $classpdo;
    $myquery = $classpdo->execute('SELECT * FROM payrecord Where ID=?',[$token]);
    echo json_encode($myquery);
}

?>


