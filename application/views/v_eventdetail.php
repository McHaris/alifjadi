

<div class="container-fluid" style="background-color: #87CEFA;min-height:570px">
    <div class="container ">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-sm-12 text-left">

                <div class="row">
                    <div class="col-sm-4">
                         <img style="width:350px; height: " class="img-responsive img-rounded center-block" src="<?php echo base_url()?>assets/uploads/events/<?php echo $row->gambar ?>" alt="">
                    </div>

                    <div class="col-sm-8">
                        <h4 style="margin-bottom:20px;" class="bold"><?php echo $row->judul?></h4> 
                        
                        <div style="margin-bottom:20px;"><i class="glyphicon glyphicon-calendar"></i> &nbsp;<?php echo $row->tanggal?></div>
                        <div style="margin-bottom:20px;"><i style="font-size:20px" class="glyphicon glyphicon-map-marker"></i> &nbsp;<?php echo $row->kota?></div><?php echo $row->deskripsi?></div>
                </div>
            </div>

            
            
           

    </div>

    
</div>

 
                
                    <div class="panel-heading" style="background:#e7292c;">
                        
                            <h4 class="panel-title" style="color:white">
                                Feedback
                            </h4>
                        
                    </div>
    
                    
                        <div class="panel-body" style="background-color: #FCF3CF">
                                <div class="col-sm-11">
                                    <form action="<?php echo base_url('c_eventdetail/save/'.$this->uri->segment(3)) ?>" method="post">
                                    <div class="form-group">
                                        <label for="name">Leave Comment</label>
                                        <textarea class="form-control" rows="2" name='komen'></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn" style="background: #e7292c;color:white;float:right">Submit</button>
                                    </form>
                                   
                                    <div style="clear:both"></div>

                                    <div class="col-sm-12">
                                        <?php
                                            foreach($this->db->get_where('tb_komentar',array('id_event'=>$this->uri->segment(3)))->result() as $row){
                                        ?>
                                        <div class="row">
                                            <div>
                                                <img style="width:100px;float:right;" src="<?php echo base_url()?>assets/img/avatar.png">
                                            </div>
                                            <div><br>
                                                <p><?php echo $row->komen ?></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                        <br>
                                </div>
                                                    
                        </div>
                
                </div>
            
                    

