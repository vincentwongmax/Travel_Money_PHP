<?php

include_once 'resful.php';

$classpdo = new DatabaseAccessObject('localhost','root','123456','travelmoney');

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
        dataToDB($c["payMainMoneyPeople"],$c["userMoneyPeople"],$c["howmuchmoney"],$c["token"],$c["payMoneyNotes"]);
        break;
    case "showWaterBill":
        showWaterBill($c["ecToken"]);
        break;
    case "deldata":
        deldata($c["id"]);
        break;
    case "showdeldata":
        showdeldata($c["ecToken"]);
        break;
    case "eachpeople":
        eachpeople($c["eachpeople"],$c["ecToken"]);
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
         echo json_encode(['OKKKKKKKKK']);
    }else {
        echo json_encode(['NOOOOOOOOO']);
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
         echo json_encode(['OKK']);
    }else {
        echo json_encode(['NO']);
    }
}

function dataToDB($payMainMoneyPeople,$userMoneyPeople,$howmuchmoney,$ID, $notes){
    global $classpdo;
    $myquery = $classpdo->execute('SELECT count(*) FROM payrecord Where ID=? and paymoneypeople =? and usemoneypeople =? and howmuchmoney =? and notes =?' ,[$ID,$payMainMoneyPeople,$userMoneyPeople,$howmuchmoney,$notes]);
    if($myquery[0]['count(*)'] == '0'){
         $myquery2 = $classpdo->insert('payrecord', ['ID'=>$ID,'paymoneypeople'=>$payMainMoneyPeople,'usemoneypeople'=>$userMoneyPeople,'howmuchmoney'=>$howmuchmoney,'notes'=>$notes]);
         echo json_encode(['OKKKKKKKK']);
    }else {
        echo json_encode(['NOOOOOOO']);
    }
}

function showWaterBill($token){
    global $classpdo;
    $myquery = $classpdo->execute('SELECT * FROM payrecord Where ID=? order by adddatatime DESC',[$token]);
    echo json_encode($myquery);
}

function deldata($id){
    global $classpdo;
    $myquery = $classpdo->execute('insert into travelmoney.del(ID,paymoneypeople,usemoneypeople,howmuchmoney,notes,adddatatime,IDED) select * from travelmoney.payrecord where ided=?;
    ',[$id]);
    $myquery = $classpdo->execute('SELECT count(*) FROM del Where IDED=?',[$id]);
    if($myquery[0] >= 1){
        $myquery2 = $classpdo->execute('DELETE FROM payrecord WHERE ided= ?',[$id]);
        echo json_encode($myquery2);
    }else{
        echo json_encode('ERROR');
    }
}

function showdeldata($id){
    global $classpdo;
    $myquery = $classpdo->execute('SELECT * FROM del Where ID=? order by IDDD DESC',[$id]);
    echo json_encode($myquery);
}


function eachpeople($a,$id){
    global $classpdo;
    $myquery1 = $classpdo->execute('SELECT * FROM payrecord Where ID=? and paymoneypeople=?',[$id,$a]);
    $myquery2 = $classpdo->execute('SELECT * FROM payrecord Where ID=? and usemoneypeople like ?',[$id,"%$a%"]);
    echo json_encode([$myquery1,$myquery2]);
}
?>