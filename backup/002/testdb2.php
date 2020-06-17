<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="travelmoney";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


$a = json_decode(file_get_contents("php://input"),true);
$c=$a["data"];
$b = $a["data"]["action"];

switch ($b) {
    case "createToken":
        createToken($c["ecToken"]);
        break;
    case "dataIn":
        dataIn($_POST['punchid']);
        break;
    default:
        echo "Error";
        break;
}

function createToken($id){
    global $conn;
    $sth = $conn->prepare('INSERT INTO token (`token`) VALUES (?)');
    $paramArray = [$id];
    $sth->execute($paramArray);
    echo json_encode(['OK']);
    // echo json_encode($sth->fetchAll(PDO::FETCH_ASSOC));
}

function axiosTest() {
    // global $dbh;
    // $sth = $dbh->prepare('SELECT * from travelmoney');

    // $sth->execute();
    // $count = $sth->rowCount();
    // if ($count === 0) {
        echo json_encode(['OK']);
    // } else {
    //     echo json_encode($sth->fetchAll(PDO::FETCH_ASSOC));
    // }
}



?>