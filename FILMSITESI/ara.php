<?php
include "Ust.php";

?>

<!--slider boşluk-->
<div class="banner_alt"></div>

<!--banner_slider başlangıç -->
<?php
// Film verilerini çekme
$sql = "SELECT * FROM film ORDER BY RAND() LIMIT 7";
$result = $db->query($sql);

// Slider HTML oluşturma
echo '<div class="banner_slider">';
echo '<center><b><span class="font">Önerilenler</span></b></center>';
echo '<hr>';

if ($result && $result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $filmId = $row['film_id'];
        $resimYolu = $row['film_foto'];

        echo '<a href="izle.php?id=' . $filmId . '"><img src="FilmResimler/' . $resimYolu . '" height="180" width="133.5" class="slider1"></a>';
    }
} else {
    echo "Veritabanında film bulunamadı veya bir hata oluştu.";
}

echo '</div>';


?>
<!--banner_slider bitiş -->

<div class="ana_govde">
    <!--sol başlangıç -->
    <div class="sol">
        <!-- Diğer içerikler... -->

        <!-- Arama sonuçları başlangıç -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['film_adi'])) {
            $filmAdi = strip_tags($_POST['film_adi']);

            $aramaSorgusu = "SELECT * FROM film WHERE film_baslik LIKE :filmAdi";
            $aramaStmt = $db->prepare($aramaSorgusu);
            $aramaStmt->bindValue(':filmAdi', '%' . $filmAdi . '%', PDO::PARAM_STR);
            $aramaStmt->execute();

            echo '<center><b><span class="font red">Arama Sonuçları</span></b></center>';
            echo '<hr>';


            while ($aramaSonuc = $aramaStmt->fetch(PDO::FETCH_ASSOC)) {
                // Arama sonuçlarını burada görüntüleyebilirsiniz
                echo '<div class="film">';
                echo '<a href="izle.php?id=' . $aramaSonuc['film_id'] . '">';
                echo '<img class="a" src="FilmResimler/' . $aramaSonuc['film_foto'] . '">';
                echo '<center>';
                echo '<span class="span_baslik">' . $aramaSonuc['film_baslik'] . '</span>';
                echo '</center>';
                echo '</a>';
                echo '<hr>';
                echo '<table class="filmdet">';
                echo '<tr>';
                echo '<td><img src="img/tur.png" height="15" width="17"></td>';
                echo '<td>Tür: <b>' . $aramaSonuc['film_kategori'] . '</b></td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><img src="img/dil.png" height="15" width="17"></td>';
                echo '<td>Dil: <b>' . $aramaSonuc['film_dil'] . '</b></td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><img src="img/imdb.png" height="15" width="17"></td>';
                echo '<td>IMDB: <b>' . $aramaSonuc['film_imdb'] . '</b></td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><img src="img/dialog.png" height="15" width="17"></td>';
                echo '<td>2 Yorum</td>';
                echo '</tr>';
                // Diğer bilgileri ekleyebilirsiniz
                echo '</table>';
                echo '</div>';
            }
        }
        ?>
        <!-- Arama sonuçları bitiş -->

        <div class="clear"></div>

        <!-- Diğer içerikler... -->


        <!-- <div class="pagination">
            <?php
            if ($page > 1) {
                $newPage = $page - 1;
                echo '<a href="http://localhost/FILMSITESI/index.php?page=' . $newPage . '" class="page prev">&laquo; Önceki</a>';
            } else {
                echo '<a href="javascript:void(0)" class="page prev">&laquo; Önceki</a>';
            }



            $record = 3;
            for ($i = $page - $record; $i <= $page + $record; $i++) {
                if ($i > 0 and $i <= $pageNumber) {
                    if ($i == $page) {
                        echo '<a href="http://localhost/FILMSITESI/index.php?page=' . $i . '" class="page prev active">' . $i . '</a>';
                    } else {
                        echo '<a href="http://localhost/FILMSITESI/index.php?page=' . $i . '" class="page prev">' . $i . '</a>';
                    }
                }
            }


            if ($page != $pageNumber) {
                $newPage = $page + 1;
                echo '<a href="http://localhost/FILMSITESI/index.php?page=' . $newPage . '" class="page next">Sonraki &raquo;</a>';
            } else {
                echo '<a href="javascript:void(0)" class="page next">Sonraki &raquo;</a>';
            }
            ?>



        </div> -->
    </div>
    <!--sol bitiş -->
    <!--sag başlangıç -->
    <div class="sag">

        <div class="sosyalmedya"><b>Sosyal Medya Hesaplarımız</b>
            <hr>

            <div class="social-icons">

                <li><a href="<?php echo $Ayar['ayar_instagram'] ?>" target="_blank"><img src='img/insta.png' /></a></li>
                <li><a href="<?php echo $Ayar['ayar_facebook'] ?>" target="_blank"><img src='img/face.png' /></a></li>
                <li><a href="<?php echo $Ayar['ayar_github'] ?>" target="_blank"><img src='img/gt.png' /></a></li>
                <li><a href="<?php echo $Ayar['ayar_linkedin'] ?>" target="_blank"><img src='img/LinkedIn_icon.svg.png' /></a></li>

            </div>
        </div>

        <div class="filmbegenilen"><b>En Çok Beğenilen</b>
            <hr>
            <a href="izle.php"><img src="FilmResimler/esaretinbedeli.webp" height="180" width="127" class="bfilm"></a>
            <a href="izle.php"><img src="FilmResimler/extraction-2.webp" height="180" width="127" class="bfilm"></a>
            <a href="izle.php"><img src="FilmResimler/recep-ivedik-6.webp" height="180" width="127" class="bfilm"></a>
            <a href="izle.php"><img src="FilmResimler/venom2.webp" height="180" width="127" class="bfilm"></a>
            <a href="izle.php"><img src="FilmResimler/transformers-714180.webp" height="180" width="127" class="bfilm"></a>
            <a href="izle.php"><img src="FilmResimler/ghajini.webp" height="180" width="127" class="bfilm"></a>

        </div>




        <div class="filmturleri"><b>Film Türleri</b>
            <hr>
            <?php
            include "Baglan.php";

            $kategoriQuery = "SELECT DISTINCT film_kategori FROM film ORDER BY film_kategori ASC";
            $kategoriResult = $db->query($kategoriQuery);

            if ($kategoriResult !== false) {
                while ($row = $kategoriResult->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="filmturleri2"><img src="img/tur.png" height="15" width="17">';
                    echo '<a href="kategori.php?kategori=' . $row['film_kategori'] . '">' . $row['film_kategori'] . '</a></div>';
                }
            } else {
                $errorInfo = $db->errorInfo();
                echo "Veritabanı hatası: " . $errorInfo[2];
            }
            ?>

        </div>




    </div><!--sag bitiş -->
</div>
<!--ana_govde bitiş -->

<?php
include "Alt.php";

?>