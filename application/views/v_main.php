<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" style="height:575px; width:1550px"  src="<?php echo base_url()?>/assets/img/guru.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" style="height:575px; width:1550px"  src="<?php echo base_url()?>/assets/img/jadi1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" style="height:575px ; width:1550px"  src="<?php echo base_url()?>/assets/img/gl1.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <section>
      <div class="container-fluid" style="background:#FFEC00">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="<?php echo base_url()?>assets/img/a2.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Selamat Datang..!</h2>
              <p>ALIF (Alquran Learning and Islamic  Foundation) merupakan lembaga pembelajaran Alquran bagi anak-anak dengan strategi fun learning, intensive. Lembaga ini  berada dibawah naungan Yayasan Sahabat Shalawat, komunitas dakwah yang bergerak dibidang pendidikan, sosial dan entrepreneurship.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container-fluid" style="background:#ff0080">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="<?php echo base_url()?>assets/img/jadi1.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <h2 class="display-4">Kegiatan kami...</h2>
              <p>Setiap program hadir dengan pendekatan fun learning dan didukung dengan fasilitas modern yang lengkap, Alif School hadir sebagai wujud kontribusi untuk meningkatkan minat masyarakat baik Anak-anak, Remaja, dan Dewasa agar tertarik belajar membaca Alqur’an dan mendalami pelajaran ibadah lainnya.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="back">
      <div class="container-fluid" style="background:#87CEFA">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="<?php echo base_url()?>assets/img/a6.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Staff & pengajar...</h2>
              <p>Pengajar ALIF adalah orang-orang yang memiliki kemauan, tekad, dan keyakinan yang besar. Mereka adalah orang-orang yang menyadari bahwa kita sesungguhnya adalah perantara dari luasnya samudera ilmu yang Allah miliki. Sehingga mengajar lebih bersifat sebagai kebutuhan. Kebutuhan untuk terus belajar dan bersama-sama menuntut ilmu. Pengajar alif juga telah memiliki syahadah Alquran yang diberikan oleh tim standarisasi guru “Tilawati”. Serta memiliki kepribadian yang ramah, religious, serta menyukai dunia anak.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
       <div class="container-fluid" style="background:#ff0080; text-align: center;color: white">
        <div class="row" style="text-align: center; ">
            
            
            </div> 
            <h1>Pengunjung</h1>
            <h2><?php $count_my_page = ("hitcounter.txt"); $hits = file($count_my_page); $hits[0] ++; $fp = fopen($count_my_page , "w"); fputs($fp , "$hits[0]"); fclose($fp); echo $hits[0]; ?></h2>
            </div>   
        </div>
       </div>
    </section>