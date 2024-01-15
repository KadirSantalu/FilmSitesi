<!-- ust.php kodlarının çağrlması -->
<?php
include "ust.php";
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Site Yorumları Listesi</h3>
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
              Film sitenize gelen yorumlara bakabiliriniz.
            </p>

                <?php
                try {
                    $query = "SELECT * FROM siteyorum";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                
                    if ($stmt->rowCount() > 0) {
                        echo "<table   id='datatable' class='table table-striped table-bordered'>
                            <thead>
                                <tr>
                                    <th style = 'width:20%;'>Ad Soyad</th>
                                    <th style = 'width:20%;'>Eposta</th>
                                    <th style = 'width:20%;'>Konu</th>
                                    <th style = 'width:40%;'>Mesaj</th>
                                </tr>
                            </thead>";
                                
                
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tbody>
                                    <tr>
                                      <td>".$row['siteYorum_AdSoyad']."</td>
                                      <td>".$row['siteYorum_Eposta']."</td>
                                      <td>".$row['siteYorum_Konu']."</td>
                                      <td>".$row['siteYorum_Mesaj']."</td>
                                    </tr>
                                  </tbody>";
                        }
                
                        echo "</table>";
                    } else {
                        echo "Veritabanında Kayıtlı Veri Bulunamamıştır";
                    }
                } catch (PDOException $e) {
                    echo "Query failed: " . $e->getMessage();
                }
            
                ?>    
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