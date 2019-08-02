
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

            <div class="jumbotron">
              <h1 class="display-5"><?php echo $row["baslik"];?></h1>
              <p class="lead"><?php echo $row["yazi_spotu"];?></p>
            </div>

        </div>
      </div>

      <div class="row">
       <div class="col-md-12">
             <?php echo nl2br( $row["yazi"] ); ?>
       </div> <!-- MakaleSonu -->
     </div> <!-- col -->
</div>
