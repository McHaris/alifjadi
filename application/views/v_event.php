
<div style="background-color: #E41424;min-height:570px">
	<br>
	<div class="container" >
		<div class="row">
                


			<?php 
			foreach($query->result() as $row)
			{
				?>

				<div class="col-md-6 col-lg-4" style="padding: 10px; " >
					<div class="card" style="height:450px; " >
						<img class="card-img-top" style="height:220px" src="<?php echo base_url()?>assets/uploads/events/<?php echo $row->gambar ?>" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><?php echo $row->judul ?></h5>
							<p class="card-text" style="text-align:justify"><?php echo word_limiter($row->deskripsi, 15) ?></p>
							<a href="<?php echo base_url('c_eventdetail/index/'.$row->id) ?>" class="btn btn-primary">Selanjutnya</a>
						</div>
					</div>
				</div>
				<?php 
			}
			?>
	
		</div>
	</div>
</div>