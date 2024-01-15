<!-- ust.php kodlarının çağrlması -->
<?php
include "ust.php";
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
            <h2>Film Listesi <small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <!--  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li> 
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>-->
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <p class="text-muted font-13 m-b-30">
              Film Sitenizin filmlerini listeler
            </p>

            <?php
            if (isset($_GET['Durum'])) {
              if ($_GET['Durum']) {
            ?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Film Silme İşlemi BAŞARILI</strong>
                </div>
              <?php
              } else {
              ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Film Silme İşlemi BAŞARISIZ</strong>
                </div>
            <?php

              }
            }

            ?>

            <?php
            if (isset($_GET['FilmGuncelle'])) {
              if ($_GET['FilmGuncelle']) {
            ?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Film Güncelleme İşlemi BAŞARILI</strong>
                </div>
              <?php
              } else {
              ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Film Güncelleme İşlemi BAŞARISIZ</strong>
                </div>
            <?php

              }
            }

            ?>



            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th>Film İsmi</th>
                  <th>Film Kapağı</th>
                  <th>Yönetmen</th>
                  <th>Kategori</th>
                  <th>Dil</th>
                  <th>IMDB Puanı</th>
                  <th>Süre</th>
                  <th><i class="fa-solid fa-eye"></i></th>
                  <th></th>
                </tr>
              </thead>



              <tbody>

                <?php
                $YeniFilmler = $db->query("SELECT * FROM film ORDER BY film_id DESC");

                while ($Film = $YeniFilmler->fetch()) {
                ?>
                  <tr>
                    <td><a href="FilmDetay.php?id=<?php echo $Film['film_id'] ?>"><i class="fa fa-edit"></i></a></td>
                    <td><?php echo $Film['film_baslik'] ?></td>
                    <td><?php echo $Film['film_foto'] ?></td>
                    <td><?php echo $Film['film_yonetmen'] ?></td>
                    <td><?php echo $Film['film_kategori'] ?></td>
                    <td><?php echo $Film['film_dil'] ?></td>
                    <td><?php echo $Film['film_imdb'] ?></td>
                    <td><?php echo $Film['film_sure'] ?></td>
                    <td><?php echo $Film['film_gosterilme'] ?></td>
                    <td><a href="Film_sil.php?id=<?php echo $Film['film_id'] ?>"><i class="fa fa-trash"></i></a></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>


            </table>
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