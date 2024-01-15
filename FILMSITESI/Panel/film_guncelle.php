<?php
include "../Baglan.php";
if (isset($_POST['film_id'])) {
    if ($_POST['film_id'] > 0) {
        $Guncelle = $db->prepare("UPDATE film SET
        film_baslik=:film_baslik,
        film_kaynak=:film_kaynak,
        film_foto=:film_foto,
        film_yonetmen=:film_yonetmen,
        film_oyuncular=:film_oyuncular,
        film_kategori=:film_kategori,
        film_dil=:film_dil,
        film_imdb=:film_imdb,
        film_sure=:film_sure,
        film_aciklama=:film_aciklama
        WHERE film_id=:film_id");
        $FilmGuncelle = $Guncelle->execute(
            array(
                "film_baslik" => $_POST["film_baslik"],
                "film_kaynak" => $_POST["film_kaynak"],
                "film_foto" => $_POST["film_foto"],
                "film_yonetmen" => $_POST["film_yonetmen"],
                "film_oyuncular" => $_POST["film_oyuncular"],
                "film_kategori" => $_POST["film_kategori"],
                "film_dil" => $_POST["film_dil"],
                "film_imdb" => $_POST["film_imdb"],
                "film_sure" => $_POST["film_sure"],
                "film_aciklama" => $_POST["film_aciklama"],
                "film_id" => $_POST["film_id"]
            )
        );
        //print_r($Guncelle->errorInfo());
        header("Location:FilmListele.php?FilmGuncelle=$FilmGuncelle");
        exit();
    }
}
?>