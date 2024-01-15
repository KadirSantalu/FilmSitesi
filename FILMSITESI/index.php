<?php
include "Ust.php";

$page = isset($_GET['page']) ? strip_tags($_GET['page']) : 1;
$limit = 9;
$stratlimit = ($page * $limit) - $limit;
$query = "SELECT COUNT(*) FROM film";
$stmt = $db->query($query);
$totalRecords = $stmt->fetchColumn();
$pageNumber = ceil($totalRecords / $limit);
?>

<!--slider boşluk-->
<div class="banner_alt"></div>

<!--banner_slider başlangıç -->
<?php
//<!--banner_slider başlangıç -->

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

<!--ana_govde başlangıç -->
<div class="ana_govde">
	<!--sol başlangıç -->
	<div class="sol">
		<center><b><span class="font red">Vizyondaki Filmler ve Diziler</span></b></center>
		<hr>
		<?php
		$YeniFilmler = $db->query("SELECT * FROM film ORDER BY film_id DESC LIMIT $stratlimit,$limit");

		while ($Film = $YeniFilmler->fetch()) {
		?>

			<div class="film">
				<a href="izle.php?id=<?php echo $Film['film_id'] ?>">
					<img class="a" src="FilmResimler/<?php echo $Film['film_foto'] ?>">
					<center>
						<span class="span_baslik"><?php echo $Film['film_baslik'] ?></span>
					</center>
				</a>
				<hr>
				<table class="filmdet">
					<tr>
						<td><img src="img/tur.png" height="15" width="17"></td>
						<td>Tür: <b><?php echo $Film['film_kategori'] ?></b></td>
					</tr>
					<tr>
						<td><img src="img/dil.png" height="15" width="17"></td>
						<td>Dil: <b><?php echo $Film['film_dil'] ?></b></td>
					</tr>
					<tr>
						<td><img src="img/imdb.png" height="15" width="17"></td>
						<td>IMDB: <b><?php echo $Film['film_imdb'] ?></b></td>
					</tr>
					<tr>
						<td><img src="img/dialog.png" height="13" width="15"></td>
						<td>2 Yorum</td>
					</tr>
					<tr>
						<td colspan="2">
							<center><a href="izle.php?id=<?php echo $Film['film_id'] ?>"><button class="butbut">Filmi İzle</button></a></center>
						</td>
					</tr>

				</table>


			</div>
		<?php
		}
		?>
		<div class="clear"></div>

		<div class="pagination">
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

		</div>

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
<?php
include "Alt.php";
?>