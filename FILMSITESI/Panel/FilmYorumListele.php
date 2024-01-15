<!-- ust.php kodlarının çağrlması -->
<?php
include "ust.php";
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Film Yorumları Listesi</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <!-- <div class="x_title">
            <h2>Film Listesi <small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li> 
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul> 
            <div class="clearfix"></div>
          </div> -->
          <div class="x_content">
            <p class="text-muted font-13 m-b-30">
              Film sitenizde ki filmlerin yorumlarına bakabilirsiniz.
            </p>

            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th style="width: 96%;">Film İsmi</th>
                  <th style="width: 4%;"></th>
                </tr>
              </thead>



              <tbody>

                <?php
                $YeniFilmler = $db->query("SELECT * FROM film ORDER BY film_id DESC");

                while ($Film = $YeniFilmler->fetch()) {
                ?>
                  <tr style="text-align: center;">
                    <td><?php echo $Film['film_baslik'] ?></td>
                    <td><a href="FilmYorum.php?id=<?php echo $Film['film_id'] ?>"><i class="fa fa-regular fa-comment"></i></a></td>
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