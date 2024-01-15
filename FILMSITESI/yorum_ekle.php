<?php
include "Baglan.php"; // Veritabanı bağlantı dosyanızın adını kullanabilirsiniz

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $film_id'yi POST verilerinden alıyoruz
    $film_id = isset($_POST['film_id']) ? $_POST['film_id'] : null;

    // Diğer POST verilerini alıyoruz
    $isim = isset($_POST['isim']) ? $_POST['isim'] : null;
    $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
    $mesaj = isset($_POST['mesaj']) ? $_POST['mesaj'] : null;

    // Eksik parametre kontrolü
    if (empty($film_id) || empty($isim) || empty($mail) || empty($mesaj)) {
        echo json_encode(array("success" => false, "message" => "Eksik parametreler"));
        exit;
    }

    // Eğer yorum eklerken film ID'sini kontrol etmek istiyorsanız, burada kontrol yapabilirsiniz.
    // Örneğin:
    // if ($film_id != geçerliFilmID) {
    //     echo json_encode(array("success" => false, "message" => "Geçersiz Film ID"));
    //     exit;
    // }

    try {
        // Yorum eklemeyi gerçekleştiriyoruz
        $ekle = $db->prepare("INSERT INTO filmyorum (film_id, isim, mail, mesaj) VALUES (?, ?, ?, ?)");
        $ekle->bindParam(1, $film_id, PDO::PARAM_INT);
        $ekle->bindParam(2, $isim, PDO::PARAM_STR);
        $ekle->bindParam(3, $mail, PDO::PARAM_STR);
        $ekle->bindParam(4, $mesaj, PDO::PARAM_STR);

        if ($ekle->execute()) {
            echo json_encode(array("success" => true, "message" => "Yorumunuz Başarı ile Gönderildi"));
            exit(header("Location: izle.php?id=" . $film_id));
        } else {
            echo json_encode(array("success" => false, "message" => "Yorumunuzda hata oluştu"));
        }
    } catch (PDOException $e) {
        echo json_encode(array("success" => false, "message" => "Yorum ekleme hatası: " . $e->getMessage()));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Geçersiz istek"));
}
?>
