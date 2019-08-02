<?php
  @session_start();

  if( isset($_GET["oturumukapat"]) ) {
    session_destroy(); // Oturum kapandı
    header("location: index.php");
    die();
  }

  require("db.php");

  require("sayfa.ust.php");

  require("sayfa.navbar.php");

  $SayfaGosterildi = 0;

  if(isset($_GET["yaziid"])) {
    require("blog.goster.php");
    $SayfaGosterildi=1;
  }

  if(isset($_GET["yazargirisi"])) {
    require("yazar.girisi.php");
    $SayfaGosterildi=1;
  }

  if(isset($_GET["kategori"])) {
    require("sayfa.jombotron.php");
    require("blog.liste.php");
    $SayfaGosterildi=1;
  }

  if(isset($_GET["yeniyaziekle"])) {
    require("yeni.yazi.ekle.php");
    $SayfaGosterildi=1;
  }

  if(isset($_GET["edityaziid"])) {
    require("yeni.yazi.duzenle.php");
    $SayfaGosterildi=1;
  }

  if( $SayfaGosterildi == 0 ) {
    require("sayfa.jombotron.php");
    require("blog.liste.php");
  }


  require("sayfa.alt.php");

print_r($_SESSION);

?>
