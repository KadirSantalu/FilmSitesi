<!-- ust.php kodlarının çağrlması -->
<?php
include "ust.php";

$Film = $db->prepare("SELECT * FROM film WHERE film_id=?");
$Film->execute(array(intval($_GET['id'])));

$Film = $Film->fetch();
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
            <h2>Film Detayı</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form action="film_guncelle.php" method="POST" class="form-horizontal form-label-left" novalidate>

              <p>Film sayfanızda ki filmlerin detaylarını gösterir.
              </p>

              <span class="section"><?php echo isset($Film['film_baslik']) ? $Film['film_baslik'] : 'Varsayılan Başlık'; ?></span>

              <input type="hidden" name="film_id" value="<?php echo $Film['film_id'] ?>">

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_baslik">Filmin Başlığı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_baslik" class="form-control col-md-7 col-xs-12" name="film_baslik" value="<?php echo $Film['film_baslik'] ?>" placeholder="Buraya Filmin Başlığını Giriniz" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_kaynak">Kaynak <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_kaynak" class="form-control col-md-7 col-xs-12" value="<?php echo $Film['film_kaynak'] ?>" name="film_kaynak" placeholder="Buraya Filmin Kaynağını Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_foto">Kapak Fotoğrafı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_foto" class="form-control col-md-7 col-xs-12" value="<?php echo $Film['film_foto'] ?>" name="film_foto" type="file" multiple>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_yonetmen">Yönetmen <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_yonetmen" class="form-control col-md-7 col-xs-12" value="<?php echo $Film['film_yonetmen'] ?>" name="film_yonetmen" placeholder="Buraya Filmin Yönetmenini Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_oyuncular">Oyuncular <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_oyuncular" class="form-control col-md-7 col-xs-12" value="<?php echo $Film['film_oyuncular'] ?>" name="film_oyuncular" placeholder="Buraya Oyuncularını Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_kategori">Kategori <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_kategori" class="form-control col-md-7 col-xs-12" value="<?php echo $Film['film_kategori'] ?>" name="film_kategori" placeholder="Buraya Filmin Kategorisini Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_dil">Dil <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_dil" class="form-control col-md-7 col-xs-12" value="<?php echo $Film['film_dil'] ?>" name="film_dil" placeholder="Buraya Fiilmin Dilini Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_imdb">IMDB Puanı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_imdb" class="form-control col-md-7 col-xs-12" value="<?php echo $Film['film_imdb'] ?>" name="film_imdb" placeholder="Buraya Filmin IMDB Puanını Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_sure">Süre <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="film_sure" class="form-control col-md-7 col-xs-12" value="<?php echo $Film['film_sure'] ?>" name="film_sure" placeholder="Buraya Filmin Süresini Giriniz" required="required" type="text">
                </div>
              </div>



              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="film_aciklama">Açıklama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="film_aciklama" required="required" name="film_aciklama" placeholder="Buraya Filmin Açıklamasını Giriniz" class="form-control col-md-7 col-xs-12"><?php echo $Film['film_aciklama'] ?></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="send" type="submit" class="btn btn-success">Güncelle</button>
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