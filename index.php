<?php

  require("db.php");

  require("sayfa.ust.php");

  require("sayfa.navbar.php");

if(!isset($_GET["yaziid"])) {
  require("sayfa.jombotron.php");
  require("blog.liste.php");
}

if(isset($_GET["yaziid"])) {
  require("blog.goster.php");
}

  require("sayfa.alt.php");



?>
