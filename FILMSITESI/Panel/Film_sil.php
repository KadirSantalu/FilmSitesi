<?php 
include "../Baglan.php";

if(isset($_GET['id'])){
    $Sil = $db->prepare("DELETE FROM film WHERE film_id=?");
    $Durum = $Sil -> execute(array(intval($_GET['id'])));

    header("Location:FilmListele.php?Durum=".$Durum);
    exit;
}
?>