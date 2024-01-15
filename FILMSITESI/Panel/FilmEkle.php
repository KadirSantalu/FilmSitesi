<!-- ust.php kodlarının çağrlması -->
<?php
include "ust.php";

if (isset(
  $_POST["film_baslik"],
  $_POST["film_kaynak"],
  $_FILES["film_foto"],
  $_POST["film_yonetmen"],
  $_POST["film_oyuncular"],
  $_POST["film_kategori"],
  $_POST["film_dil"],
  $_POST["film_imdb"],
  $_POST["film_sure"],
  $_POST["film_aciklama"]
)) {
  $baslik = $_POST["film_baslik"];
  $kaynak = $_POST["film_kaynak"];
  $foto = $_FILES["film_foto"];
  $yonetmen = $_POST["film_yonetmen"];
  $oyuncular = $_POST["film_oyuncular"];
  $kategori = $_POST["film_kategori"];
  $dil = $_POST["film_dil"];
  $imdb = $_POST["film_imdb"];
  $sure = $_POST["film_sure"];
  $aciklama = $_POST["film_aciklama"];

  // Dosya adını al
  $fotoAdi = $foto["name"];
  // Dosya geçici konumunu al
  $fotoTemp = $foto["tmp_name"];

  $ekle = "INSERT INTO film (film_baslik, film_kaynak, film_foto, film_yonetmen, film_oyuncular, film_kategori, film_dil, film_imdb, film_sure, film_aciklama) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $db->prepare($ekle);
  $stmt->execute([$baslik, $kaynak, $fotoAdi, $yonetmen, $oyuncular, $kategori, $dil, $imdb, $sure, $aciklama]);

  if ($stmt->rowCount() > 0) {
    echo "<script>alert('Film Başarıyla eklendi')</script>";
    echo "<script>window.location.href='FilmListele.php'</script>";
    exit();
  } else {
    echo "<script>alert('Film eklenirken bir hata oluştu')</script>";
  }
}
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Film Ayarları</h3>
      </div>


    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Film Ekle</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form action="FilmEkle.php" method="POST" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">

              <p>Film sayfanıza film eklenir
              </p>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_baslik">Filmin Başlığı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_baslik" class="form-control col-md-7 col-xs-12" name="film_baslik" placeholder="Buraya Filmin Başlığını Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_kaynak">Kaynak <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_kaynak" class="form-control col-md-7 col-xs-12" name="film_kaynak" placeholder="Buraya Filmin Kaynağını Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_foto">Kapak Fotoğrafı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_foto" class="form-control col-md-7 col-xs-12" name="film_foto" accept="FilmResimler/*" required="required" type="file" multiple>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_yonetmen">Yönetmen <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_yonetmen" class="form-control col-md-7 col-xs-12" name="film_yonetmen" placeholder="Buraya Filmin Yönetmenini Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_oyuncular">Oyuncular <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_oyuncular" class="form-control col-md-7 col-xs-12" name="film_oyuncular" placeholder="Buraya Filmin Oyuncularını Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_kategori">Kategori <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_kategori" class="form-control col-md-7 col-xs-12" name="film_kategori" placeholder="Buraya Filmin Kategorisini Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_dil">Dil <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_dil" class="form-control col-md-7 col-xs-12" name="film_dil" placeholder="Buraya Filmin Dilini Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_imdb">IMDB Puanı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_imdb" class="form-control col-md-7 col-xs-12" name="film_imdb" placeholder="Buraya Filmin IMDB Puanını Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_sure">Süre <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_sure" class="form-control col-md-7 col-xs-12" name="film_sure" placeholder="Buraya Filmin Süresini Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_aciklama">Açıklama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="film_aciklama" required="required" name="film_aciklama" class="form-control col-md-7 col-xs-12" placeholder="Buraya Filmin Açıklamasını Giriniz"></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="send" name="button" type="submit" class="btn btn-success">Ekle</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->



<?php
include "alt.php";
?>