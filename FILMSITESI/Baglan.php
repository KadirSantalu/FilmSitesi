<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
     session_start();
 }
try {
     $db = new PDO("mysql:host=localhost;dbname=filmsitesi;charset=utf8", "root", "");
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $query = "SELECT COUNT(*) FROM film";
     $stmt = $db->query($query);
     $totalRecords = $stmt->fetchColumn();
     //echo "BAŞARILI";
} catch (PDOException $e) {

     print $e->getMessage();
     exit;
}

//ayarlar kısmındaki veriler
$Ayar = $db->query("SELECT * FROM ayar")->fetch();

//print_r($_SERVER);

if(strpos($_SERVER['SCRIPT_NAME'],"Panel/") && substr($_SERVER['SCRIPT_NAME'], -9)!="login.php" && substr($_SERVER['SCRIPT_NAME'], -15)!="login_giris.php"){
     if(!isset($_SESSION['kullanici_id'])){
          header("Location:login.php");
     }
}

?>