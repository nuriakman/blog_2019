
<?php

  $SQL = "SELECT
            yazi_id,
            baslik,
            yazildigi_tarih,
            yayinlanacagi_tarih,
            yazar_id,
            kategori_id,
            yazi_spotu,
            yazi,
            durum,
            begeni,
            sayac
          FROM yazilar
          WHERE yazi_id = '{$_GET["yaziid"]}'
          ORDER BY yazildigi_tarih DESC";

    // SQL komutunu MySQL veritabanı üzerinde çalıştır!
    $rows  = mysqli_query($db, $SQL);
    $row   = mysqli_fetch_assoc($rows);    // Makale içeriğinin ekrana yazdırılması
  ?>

  <div class="container mt-4">
     <div class="row">
        <div class="col-md-12">

          <div class="alert alert-dark" role="alert">

          <?php
            if( $_SESSION["giris_yapti"] == 1 AND ($_SESSION["yazar_id"] == $row["yazar_id"] OR $_SESSION["yetki_seviyesi"] == 2) ) {
              echo "<a href='?edityaziid={$row["yazi_id"]}'>Bu Makaleyi Düzenle</a>";
            }
          ?>


            <h1 class="display-5"><?php echo $row["baslik"];?></h1>
            <p class="lead"><?php echo $row["yazi_spotu"];?></p>
          </div>

        </div>
      </div>

      <div class="row">
       <div class="col-md-12">
              <img src="/sebzeler/<?php echo $row["yazi_id"];?>.png" class="img-thumbnail m-1 rounded float-left" />
             <?php
                // Makaleler MarkDown ile yazılıyor.
                // Temel MarkDown'u kolayca render edebilmek için "Slimdown" kütüphanesi kullanıldı
                // Slimdown.php KAYNAK: https://gist.github.com/jbroadway/2836900
                require_once ('Slimdown.php');
                echo Slimdown::render ( $row["yazi"] );
             ?>
       </div> <!-- MakaleSonu -->
     </div> <!-- col -->
</div>
