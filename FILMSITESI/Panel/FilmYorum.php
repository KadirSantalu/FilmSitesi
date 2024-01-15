<?php
include "ust.php"; // Bağlantı dosyanızın adını kullanabilirsiniz

// Film ID'sini alın
$film_id = isset($_GET['id']) ? $_GET['id'] : null;

// Eğer film ID boşsa hata ver ve çık
if (empty($film_id)) {
    die("Film ID bulunamadı. URL'de id parametresini kontrol edin.");
}

// Film yorumlarını çek
$yorumlarQuery = $db->prepare("SELECT * FROM filmyorum WHERE film_id = ?");
$yorumlarQuery->execute([$film_id]);
$yorumlar = $yorumlarQuery->fetchAll(PDO::FETCH_ASSOC);

// Film bilgisini çek
$filmQuery = $db->prepare("SELECT * FROM film WHERE film_id = ?");
$filmQuery->execute([$film_id]);
$film = $filmQuery->fetch(PDO::FETCH_ASSOC);
?>

<!-- Türkçe tarih ayarlamak için -->
<?php setlocale(LC_TIME, 'tr_TR', 'Turkish'); ?>

<!-- Yukarıda çekilen bilgileri kullanarak sayfanızı oluşturabilirsiniz -->

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo $film['film_baslik']; ?> </h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-md-9 col-sm-9 col-xs-12" style="width: 100%;">
                        <!-- Film yorumları listesi -->
                        <ul class="messages">
                            <?php foreach ($yorumlar as $yorum) : ?>
                                <li>
                                    
                                    <div class="message_date">
                                        <p class="month"><?php echo $yorum['tarih']; ?></p>
                                    </div>


                                    <div class="message_wrapper">
                                        <h4 class="heading"><?php echo $yorum['isim']; ?></h4>
                                        <p><?php echo $yorum['mail']; ?></p>
                                        <blockquote class="message"><?php echo $yorum['mesaj']; ?></blockquote>
                                        <br />
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <!-- /Film yorumları listesi -->
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