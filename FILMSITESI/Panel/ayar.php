<!-- ust.php kodlarının çağrlması -->
<?php
include "ust.php";
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Ayarlar</h3>
      </div>


    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Site Ayarları</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php
            if (isset($_GET['Durum'])) {
              if ($_GET['Durum']) {
            ?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Güncelleme Yapıldı</strong>
                </div>
              <?php
              } else {
              ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Güncelleme YAPILAMADI</strong>
                </div>
            <?php

              }
            }

            ?>

            <form action="ayar_guncelle.php" class="form-horizontal form-label-left" novalidate method="post">

              <p>Web sayfanızın ayarlarını düzenleyebileceğiniz sayfadır.
              </p>


              <span class="section">Genel Ayarlar</span>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_baslik">Sitenin Başlığı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="ayar_baslik" value="<?php echo $Ayar['ayar_baslik'] ?>" class="form-control col-md-7 col-xs-12" name="ayar_baslik" placeholder="Buraya Sitenin Başlığını Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_description">Sitenin Açıklaması <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="ayar_description" value="<?php echo $Ayar['ayar_description'] ?>" class="form-control col-md-7 col-xs-12" name="ayar_description" placeholder="Buraya Sitenin Açıklamasını Giriniz" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_keywords">Anahtar Kelimeler <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="ayar_keywords" value="<?php echo $Ayar['ayar_keywords'] ?>" class="form-control col-md-7 col-xs-12" name="ayar_keywords" placeholder="Buraya Sitenin Anahtar Kelimelerini Giriniz" required="required" type="text">
                </div>
              </div>

              <span class="section">Sosyal Medya Hesapları</span>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_instagram">Instagram
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="ayar_instagram" value="<?php echo $Ayar['ayar_instagram'] ?>" class="form-control col-md-7 col-xs-12" name="ayar_instagram" placeholder="Buraya Instagram Adresinizi Giriniz" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_facebook">Facebook
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="ayar_facebook" value="<?php echo $Ayar['ayar_facebook'] ?>" class="form-control col-md-7 col-xs-12" name="ayar_facebook" placeholder="Buraya Facebook Adresinizi Giriniz" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_github">Github
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="ayar_github" value="<?php echo $Ayar['ayar_github'] ?>" class="form-control col-md-7 col-xs-12" name="ayar_github" placeholder="Buraya Github Adresinizi Giriniz" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_linkedin">Linkedin
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="ayar_linkedin" value="<?php echo $Ayar['ayar_linkedin'] ?>" class="form-control col-md-7 col-xs-12" name="ayar_linkedin" placeholder="Buraya Linkedin Adresinizi Giriniz" type="text">
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="send" type="submit" class="btn btn-success">Kaydet</button>
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