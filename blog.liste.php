<div class="container mt-4">
   <div class="row">


<?php

  $SQL = "SELECT
            yazi_id,
            baslik,
            yazildigi_tarih,
            yayinlanacagi_tarih,
            yazar_id,
            kategori_id,
            yazi_spotu,
          --  yazi,
            durum,
            begeni,
            sayac
          FROM yazilar
          ORDER BY yazildigi_tarih DESC";

    // SQL komutunu MySQL veritabanı üzerinde çalıştır!
    $rows  = mysqli_query($db, $SQL);

    while($row = mysqli_fetch_assoc($rows)) { // Kayıt adedince döner
        // Makale içeriğinin ekrana yazdırılması   ?>

     <div class="col-md-6">
       <div class="card mb-4 shadow-sm">
         <img class="card-img-top" src="/sebzeler/<?php echo $row["yazi_id"];?>.png" height="400" width="100%"  />
         <div class="card-body">
           <p class="card-text">
             <b><?php echo $row["baslik"];?></b><br />
             <?php echo $row["yazi_spotu"];?>
           </p>
           <div class="d-flex justify-content-between align-items-center">
             <div class="btn-group">
               <a class="btn btn-sm btn-outline-secondary" href="index.php?yaziid=<?php echo $row["yazi_id"];?>">Oku</a>
          <!--     <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
             </div>
          <!--   <small class="text-muted">9 mins</small>  -->
           </div>
         </div>
       </div> <!-- MakaleSonu -->
     </div> <!-- col -->

   <?php } // while ?>


   </div> <!-- row -->
 </div> <!-- container -->



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
