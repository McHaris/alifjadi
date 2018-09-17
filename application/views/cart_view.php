
		<div class="container">
			<br />
			<?php echo $breadcrumb; ?>

			<?php 
			if(count($query) > 0)
			{
				?>
				<div id="items">
					<div class="col-md-7">

						<?php 

						foreach ($query as $row) 
						{


							?>
							<div id="row<?php echo $row['id'] ?>" class="row panel panel-default">
								<div class="panel-body">
								  	<div class="col-sm-2 col-xs-12">
										<div class="visible-xs">
											<a href="#" class="close" data-dismiss="alert" aria-label="close" onclick="confirmDelete('<?php echo $row['id'] ?>')">×</a>
										</div>

										<img class="img-responsive center-block" style="width:75px;height:75px;border-radius: 5px 5px 5px;border: 1px solid #F2F2F2" src="<?php echo $row['options']['picture'] ?>" alt="<?php echo $row['name'] ?>">

									</div>
									<div class="col-sm-6 col-xs-12">
										<h5 class="txt-title center-txt-mobile"><?php echo $row['name'] ?></h5>
										<div style="height:5px"></div>
										<div class="input-group center-margin-mobile" style="width:125px">
								          <span class="input-group-btn">
								              <button id="minus<?php echo $row['id'] ?>" type="button" class="btn btn-default btn-number" <?php echo ($row['qty'] == 1) ? "disabled" : ""; ?> onclick="getQty('minus', '<?php echo $row['id'] ?>')">
								                  <span class="fa fa-minus" style="font-size:12px"></span>
								              </button>
								          </span>
								          <input type="text" id="quant<?php echo $row['id'] ?>" class="form-control input-number" value="<?php echo $row['qty'] ?>" min="1" readonly style="text-align:center">
								          <span class="input-group-btn">
								              <button id="plus<?php echo $row['id'] ?>" type="button" class="btn btn-default btn-number" onclick="getQty('plus', '<?php echo $row['id'] ?>')">
								                  <span class="fa fa-plus" style="font-size:12px"></span>
								              </button>
								          </span>
									    </div>
									</div>
									<div class="col-sm-3 text-center">
										<div class="visible-xs">&nbsp;</div>
										<h5 id="price<?php echo $row['id'] ?>"><?php echo format_rupiah($row['price']); ?></h5>
									</div>

									<div class="col-sm-1 text-right hidden-xs">
										<a href="#" class="close" data-dismiss="alert" aria-label="close" onclick="confirmDelete('<?php echo $row['id'] ?>')">×</a>
									</div>
								</div>
							  	<div class="panel-footer">
							  		<span style="margin-left: 15px">
										Subtotal : <span id="subtotal<?php echo $row['id'] ?>" class="txt-title"><?php echo format_rupiah($row['subtotal']); ?></span>
									</span>
									
							  	</div>
							</div>

							<?php 

							$total = $total + $row['subtotal'];
						}
						?>

						
					</div>
					
					<div class="col-md-offset-1 col-md-4 bg-white" style="border:1px solid #E6E6E6;padding:10px;margin-bottom: 20px;">
						<div class="col-sm-5 center-txt-mobile">
							Total <span class="hidden-xs">:</span>
						</div>

						<div id="total" class="col-sm-7 bold txt-red text-right center-txt-mobile" style="text-decoration: underline;margin-bottom: 21px">
							<?php echo format_rupiah($total); ?>
						</div>


						<a href="<?php echo base_url() ?>purchase-confirmation">
							<button class="btn btn-red bold text-center">
								Checkout
							</button>
						</a>	
					</div>
				</div>
				<?php
			}
			?>

			<div id="noitems">
				<br/><br/><br/>
				<h5 class="txt-title text-center" style="text-decoration: underline;">Tidak ada barang di keranjang belanja Anda.</h5>
				<br />
				<a href="<?php echo base_url() ?>product">
					<button class="btn btn-red bold text-center center-block" style="width:200px">
						Belanja Sekarang
					</button>
				</a>	
				<div style="height:200px"></div>
			</div>

		</div>		
		
		<br />

		<script type="text/javascript">
			<?php if(count($query) > 0) { ?>
				$('#noitems').hide();
			<?php } ?>

			function showModal_false($msg)
			{
				$('#myNotification').modal('show');
	            $('#act_modal').addClass('alert-danger');
						
	            $('#msg_modal').html($msg);

	          	// Get the <span> element that closes the modal
				var closeNotification = $('#closeNotification');

				// When the user clicks on <span> (x), close the modal
				closeNotification.click(function() { 
				  	$('#myNotification').modal('hide');
				  	
				});

				setTimeout(function(){ $('#myNotification').modal('hide'); }, 3000);
			}

			function format_rupiah(bilangan)
			{
				var	reverse = bilangan.toString().split('').reverse().join(''),
				ribuan 	= reverse.match(/\d{1,3}/g);
				ribuan	= ribuan.join('.').split('').reverse().join('');

				return "Rp"+ribuan+",-";
			}

			function getQty($act, $id)
			{
				$.LoadingOverlay('show');

			    var input 		= $("#quant"+$id);
				var oldqty 		= input.val();


			    var qty 		= cekNumber($act, $id);

			    var tbelanja	= qty - oldqty;

			    var dataString = "id="+$id+"&qty="+qty+"&type=ajax&act=update";

			     $.ajax({
		              url      : "<?php echo base_url(); ?>cart/add",
		              async    : true,
		              type     : "POST",
		              data     : dataString,
		              dataType : "json",
		              error: function (data)
		              {
		                $.LoadingOverlay('hide');

		                alert("Terjadi kesalahan, silahkan refresh halaman ini.");
		              },
		              success  : function(data)
		              {
		                if(data.code == '0')
		                {
		                	

		                	var rid 	= data.data.data.rowid;
		                	var total 	= data.data.total;
		                	var stok 	= data.data.data.options.stok;

		                	changeNumber($act, $id, stok);

		                	$('#subtotal'+$id).html(format_rupiah(data.data.data.subtotal));
		                	$('#price'+$id).html(format_rupiah(data.data.data.price));
		                	$('#total').html(format_rupiah(data.data.total));
		                }
		                else if(data.code == '12')
	                	{
	                		var rid 	= data.data.data.rowid;
		                	var total 	= data.data.total;
		                	var stok 	= data.data.data.options.stok;

		                	$('#quant'+$id).val(stok);

		                	changeNumber($act, $id, stok);

		                	$('#subtotal'+$id).html(format_rupiah(data.data.data.subtotal));
		                	$('#price'+$id).html(format_rupiah(data.data.data.price));
		                	$('#total').html(format_rupiah(data.data.total));

	                		showModal_false('<strong>Gagal!</strong> Persediaan barang terbatas.');
	                	}
	                	else if(data.code == '13')
	                	{
	                		
		                	$('#row'+$id).hide();

		                	if(data.data.total <= 0)
	                		{
	                			$('#items').hide();
	                			$('#noitems').show();
	                		}
	                		else
	                		{
			                	var total 	= data.data.total;


			                	$('#total').html(format_rupiah(data.data.total));
	                		}

	                		showModal_false('<strong>Gagal!</strong> Barang tidak dapat ditambahkan karena persediaan habis.');

	                		
	                	}
	                	else
                		{
                			alert(data.msg);
                		}

	                	$.LoadingOverlay('hide');
		                
		              }
		            });




				
			}

			function cekNumber($act, $id)
			{
			    
			    var input = $("#quant"+$id);
			    var currentVal = parseInt(input.val());
			    var hasil = "";

			    if (!isNaN(currentVal)) {
			        if($act == 'minus') {
			            hasil = currentVal - 1;
			            

			        } else if($act == 'plus') {

			            hasil = currentVal + 1;
			            
			        }
			    } else {
			        hasil = 0;
			        
			    }

			    return hasil;
			 }

			function changeNumber($act, $id, $stok)
			{
			    
			    var input = $("#quant"+$id);
			    var currentVal = parseInt(input.val());
			    
			    if (!isNaN(currentVal)) {
			        if($act == 'minus') {
			            
			            if(currentVal > input.attr('min')) {
			                input.val(currentVal - 1).change();
			            
			            } 

			        } else if($act == 'plus') {

			            if(currentVal < $stok) {
			            
			            	input.val(currentVal + 1).change();
			            }
			        }

			        if(parseInt(input.val()) <= input.attr('min')) 
			        {
			            $("#minus"+$id).attr("disabled", true);
			        }
			        else
		        	{
			       	 	$("#minus"+$id).removeAttr('disabled');

		        	}

			        if(parseInt(input.val()) >= $stok) 
			        {
		            	$("#plus"+$id).attr("disabled", true);
		            }
		            else
	            	{
			        	$("#plus"+$id).removeAttr('disabled');

	            	}


			    } else {
			        input.val(0);
			    }

			 }

			function confirmDelete($id)
			{
				var result = confirm("Anda yakin ingin menghapus barang dari keranjang belanja ?");
				if (result) {
				    removeCart($id);
				}
			}

			function removeCart($id)
			{
				

				$.LoadingOverlay('show');

			   
			    var dataString = "id="+$id+"&type=ajax";

			     $.ajax({
		              url      : "<?php echo base_url(); ?>cart/remove",
		              async    : true,
		              type     : "POST",
		              data     : dataString,
		              dataType : "json",
		              error: function (data)
		              {
		                $.LoadingOverlay('hide');

		                alert("Terjadi kesalahan, silahkan refresh halaman ini.");
		              },
		              success  : function(data)
		              {
		                if(data.code == '0')
		                {
		                	

		                	$('#row'+$id).hide();

		                	if(data.data.total <= 0)
	                		{
	                			$('#items').hide();
	                			$('#noitems').show();
	                		}
	                		else
	                		{
			                	var total 	= data.data.total;


			                	$('#total').html(format_rupiah(data.data.total));
	                		}
		                }
		                else
	                	{
	                		alert(data.msg);
	                	}

	                	$.LoadingOverlay('hide');
		                
		              }
		            });
				
			}
			

			
		</script>

		
