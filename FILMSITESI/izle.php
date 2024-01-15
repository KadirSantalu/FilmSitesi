<?php
include "Ust.php";

$filmQuery = $db->prepare("SELECT * FROM film WHERE film_id=?");
$filmQuery->execute(array(intval($_GET['id'])));

$Film = $filmQuery->fetch();
$db->query("UPDATE film SET film_gosterilme = (film_gosterilme + 1) WHERE film_id=" . $Film['film_id']);


?>
<div class="ana_govde">
    <div class="sol">
        <div class="div_baslik">
            <h1 class="film_baslik"><?php echo $Film['film_baslik'] ?></h1>
        </div>
        <br>
        <div class="video">
            <iframe src="<?php echo $Film['film_kaynak'] ?>" frameborder="0" width="100%" height="500" title="Videoseyredin Player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


        </div>

        <hr>

        <div class="icerik">

            <div class="icerik_resim">
                <?php echo "<img src='FilmResimler/" . $Film['film_foto'] . "'>" ?>
            </div>
            <div class="icerik_hakkinda">
                <p><?php echo $Film['film_aciklama'] ?></p>
            </div>

            <div class="clear"></div>

            <div class="icerik_tablo">
                <hr>
                <table>
                    <tr>
                        <td class="center">Yönetmen</td>
                        <td>:</td>
                        <td><?php echo $Film['film_yonetmen'] ?></td>
                    </tr>
                    <tr>
                        <td class="center">Oyuncular</td>
                        <td>:</td>
                        <td><?php echo $Film['film_oyuncular'] ?></td>
                    </tr>
                    <tr>
                        <td class="center">Kategori</td>
                        <td>:</td>
                        <td><?php echo $Film['film_kategori'] ?></td>
                    </tr>
                    <tr>
                        <td class="center">Dil</td>
                        <td>:</td>
                        <td><?php echo $Film['film_dil'] ?></td>
                    </tr>
                    <tr>
                        <td class="center">IMDB</td>
                        <td>:</td>
                        <td><?php echo $Film['film_imdb'] ?></td>
                    </tr>
                    <tr>
                        <td class="center">Süre</td>
                        <td>:</td>
                        <td><?php echo $Film['film_sure'] ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <?php
        $film_id = isset($_GET['id']) ? $_GET['id'] : null;

        if (empty($film_id)) {
            die("Film ID bulunamadı. URL'de id parametresini kontrol edin.");
        }
        ?>

        <!-- Yorum Ekleme Formu -->
        <div class="yorum">
            <b>Film Hakkında Ne Düşünüyorsun ?</b>
            <hr>
            <form id="yorum" action="yorum_ekle.php" method="POST" enctype="multipart/form-data">
                <!-- Form içeriği buraya gelecek -->
                <div class="yorum-control">
                    <input type="text" id="fname" name="isim" placeholder="Adınız...">
                </div>
                <div class="yorum-control">
                    <input placeholder="E-Posta Adresiniz" type="email" required name="mail">
                </div>
                <div class="yorum-control">
                    <textarea placeholder="Lütfen Mesajınızı Buraya Yazın.." required name="mesaj"></textarea>
                </div>
                <center><button class="btn-1"> Yorumu Gönder</button></center>
                <input type="hidden" name="film_id" value="<?php echo $Film['film_id']; ?>">
            </form>
        </div>

    </div>


    <div class="sag">

        <div class="benzerfilmler"><b>Benzer Filmler</b>
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

    </div>
</div>
<?php
include "Alt.php";
?>