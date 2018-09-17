
		<?php 
			if($this->session->flashdata("act") != "")
			{
				if($this->session->flashdata("act") == "true")
				{
					$alertmode = "alert-success";
					$alertmsg  = "Berhasil";
				}
				else
				{
					$alertmode = "alert-danger";
					$alertmsg  = "Gagal";
				}
		?>
			<div class="container alert <?php echo $alertmode; ?>">
			  <strong><?php echo $alertmsg; ?>!</strong> <?php echo $this->session->flashdata("msg") ?>
			</div>
				<br class="hidden-xs" />
		<?php
			}
		?>

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		      <div id="carousel-img" class="item item-carousel active" style="background-image: url(https://mrid-web-01.s3.amazonaws.com/content/uploads/2016/09/CS-webbanner3-1904x560.jpg);">
		        
		      </div>
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Next</span>
		    </a>
		</div>

		<script type="text/javascript">
			$(window).scroll(function () {
			    if (window.matchMedia('(max-width: 767px)').matches) {
			        //mobile
			    } else {
			        if ($(window).scrollTop() > 114) {
				      $('#carousel-img').addClass('item-fixed');
				    }
				    if ($(window).scrollTop() < 115) {
				      $('#carousel-img').removeClass('item-fixed');
				    }
			    }
			});
		</script>

		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 style="font-weight:bolder;color:#d3312a;font-family: 'Oswald', sans-serif;">
						SENSASI SUPER DAPOERMAMA
					</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<h4 style="color:#888;">
						Super Enak, Super Puas, Super Lezat, Super Kenyang
					</h4>
				</div>
			</div>
			<div class="spacing-home"></div>
			<div class="row">
				<div class="col-md-12">
					<div class="flag-one">
						PESANAN FAVORIT
					</div>
				</div>
			</div>

			<div class="row">

				<?php 
					foreach ($product->result() as $row) {
				?>
					<div class="col-sm-4">
						<div class="thumbnail">
							<div class="hover-produk">
								<div class="image-produk" style="background-image:url('<?php echo base_url_product(); ?><?php echo $row->foto ?>');">
									
								</div>
								<div class="overlay-produk"></div>
								<a href="<?php echo base_url() ?>product/detail/<?php echo $row->key ?>">
							   	 	<div class="text-produk txt-title text-center"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Detail</div>
							   	</a>
							</div>

							<div class="title-produk">
								<h4 class="bold"><?php echo $row->nama ?></h4>
							</div>
							<p class="txt-title txt-red"><?php echo format_rupiah($row->harga) ?></p>

							<?php if($row->stok > 0) { ?>
								<form method="post" accept-charset="UTF-8" action="<?php echo base_url() ?>cart/add">
									<input type="hidden" name="<?=$this->session->userdata('csrf_name');?>" value="<?=$this->session->userdata('csrf_value');?>" style="display: none">

									<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
									<input type="hidden" name="id" value="<?php echo $row->id_produk ?>" style="display: none">
									<button name="submit" type="submit" class="btn btn-green bold text-center">
										Beli
									</button>
									
								</form>
							<?php } else { ?>
								<div class="btn-red bold text-center">
									Stok Habis
								</div>

							<?php } ?>
						</div>
					</div>
				<?php } ?>
				
				
			</div>
		</div>
		
		<div class="container">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.5513132554362!2d107.02902848806836!3d-6.236654666548584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698e935aa0ea37%3A0xf62b7b57469b0f2e!2sJl.+Kusuma+Tim.+Raya+Blok+C.+6+No.17%2C+Aren+Jaya%2C+Bekasi+Tim.%2C+Kota+Bks%2C+Jawa+Barat+17111!5e0!3m2!1sid!2sid!4v1501735914098" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<!--<script src="http://maps.googleapis.com/maps/api/js"></script>	
		<div class="container">
			<div id="map"></div>
		</div>
		<script type="text/javascript">
			// Membuat konfigurasi umum peta berbasis Google Maps
			// zoom: untuk perbesaran/skala peta;
			// center: untuk menentukan titik koordinat tengah peta;
			// mapTypeId: untuk menentukan tipe peta yang digunakan;
			var longitude = '-6.236653';
			var latitude = '107.0294583';
			
			var options = {
				zoom: 18,
				center: new google.maps.LatLng(longitude, latitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
			};
 
			// Membuat objek peta Google Maps, memanggil elemen HTML dengan id = 'map' 
			var map = new google.maps.Map(document.getElementById('map'), options);
	
			// Menambahkan marker (penanda) ke dalam peta
			var marker = new google.maps.Marker({
                position: new google.maps.LatLng(longitude, latitude),
				map: map,
                title: 'Klik',
				icon: '<?php echo base_url(); ?>import/images/marker.png'
			});
	
			// Membuat InfoWindow dengan memunculkan informasi/teks ketika di-klik
			var infowindow = new google.maps.InfoWindow();

			infowindow.setContent("<h6><b>RISOLES HOLIC</b></h6>");
			
			// Menambahkan event Click pada penanda
			google.maps.event.addListener(marker, 'click', function() {
				// Memanggil 'open method' InfoWindow
				infowindow.setContent("<b>Jalan Kusuma Timur Raya Blok C6 No17, Aren Jaya, Bekasi Timur</b>");
				infowindow.open(map, marker);
            });
			   
			infowindow.open(map, marker);   
		</script>-->
