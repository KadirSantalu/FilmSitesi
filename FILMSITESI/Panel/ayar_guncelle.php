 <?php
    include "../Baglan.php";
    if (isset($_POST['ayar_baslik'])) {
        $guncelle = $db->prepare("UPDATE ayar SET 
             ayar_baslik=:ayar_baslik,
             ayar_description=:ayar_description,
             ayar_keywords=:ayar_keywords,
             ayar_instagram=:ayar_instagram,
             ayar_facebook=:ayar_facebook,
             ayar_github=:ayar_github,
             ayar_linkedin=:ayar_linkedin
             WHERE ayar_id=1");

        $Durum = $guncelle->execute(
            array(
                'ayar_baslik' => $_POST['ayar_baslik'],
                'ayar_description' => $_POST['ayar_description'],
                'ayar_keywords' => $_POST['ayar_keywords'],
                'ayar_instagram' => $_POST['ayar_instagram'],
                'ayar_facebook' => $_POST['ayar_facebook'],
                'ayar_github' => $_POST['ayar_github'],
                'ayar_linkedin' => $_POST['ayar_linkedin'],
            )
        );

        print_r($guncelle->errorInfo());
        header("Location:ayar.php?Durum=$Durum");
    }
    ?> 