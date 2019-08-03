<?php

  ########### Kategoriler menüsü için ön hazırlık
  ########### Kategoriler menüsü için ön hazırlık

  // Kategori adlarını alalım...
  $SQL = "SELECT kategori_id, kategori_adi FROM kategoriler ORDER BY siralama";

  // SQL komutunu MySQL veritabanı üzerinde çalıştır!
  $rows  = mysqli_query($db, $SQL);

  // Linkleri hazırlayalım
  $Kategoriler = "";
  while($row = mysqli_fetch_assoc($rows)) { // Kayıt adedince döner
      $Kategoriler .= "<a class='dropdown-item' href='index.php?kategori={$row["kategori_id"]}'>{$row["kategori_adi"]}</a>";
  }



  ########### Yazarlar menüsü için ön hazırlık
  ########### Yazarlar menüsü için ön hazırlık

  // Yazar adlarını alalım...
  $SQL = "SELECT yazar_id, yazar_adi FROM yazarlar ORDER BY siralama";

  // SQL komutunu MySQL veritabanı üzerinde çalıştır!
  $rows  = mysqli_query($db, $SQL);

  // Linkleri hazırlayalım
  $Yazarlar = "";
  while($row = mysqli_fetch_assoc($rows)) { // Kayıt adedince döner
      $Yazarlar .= "<a class='dropdown-item' href='index.php?yazar={$row["yazar_id"]}'>{$row["yazar_adi"]}</a>";
  }



?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Blog 2019</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Ana Sayfa <span class="sr-only">(current)</span></a>
      </li>

      <!-- Kategori Başlıklarını Listeleyelim-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategoriler
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php echo $Kategoriler; ?>
        </div>
      </li>

      <!-- Yazara Göre Listeleme İçin Yazar Adlarını Listeleyelim-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Yazarlar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php echo $Yazarlar; ?>
        </div>
      </li>

      <?php if( $_SESSION["giris_yapti"] <> 1) { ?>
        <li class="nav-item">
          <a class='nav-link' href='?yazargirisi=1'>Üye Girişi</a>
        </li>
      <?php } ?>

    </ul>


    <?php if( $_SESSION["giris_yapti"] == 1) { ?>

        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Merhaba, <?php echo $_SESSION["yazar_adi"];?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
                  if( $_SESSION["yetki_seviyesi"] == 2) { // Sistemde yetkili kişinin göreceği ekranlar
                    echo "<a class='dropdown-item' href='index.php?yazaryonetimi=1'>Yazar Yönetimi</a>";
                  }
              ?>


              <a class='dropdown-item' href='index.php?yeniyaziekle=1'>Yazı Ekle</a>
              <a class='dropdown-item' href='index.php?oturumukapat=1'>Oturumu Kapat</a>
            </div>
          </li>

        </ul>

    <?php } ?>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Yazılarda arayın" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ara !</button>
    </form>
  </div>
</nav>
