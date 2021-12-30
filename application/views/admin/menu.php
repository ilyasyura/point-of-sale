 <?php
    error_reporting(0);
    $query=$this->db->query("SELECT barang_id FROM tbl_barang WHERE barang_stok<='6'");
    $jum_notif=$query->num_rows();
    $jum_notif_brg=$query->num_rows();
     
?>
  <?php 
      $login_user = $this->session->userdata('akses');
      $user_data = $this->session->userdata('newdata');
   
    ?>

 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url().'welcome'?>">Point of Sale</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php $h=$this->session->userdata('akses'); ?>
                    <?php $u=$this->session->userdata('user'); ?>
               
                     <!--dropdown-->
                   
                   
                    <li>
                        <a href="<?php echo base_url().'admin/laporan'?>"><span class="fa fa-file"></span> Daftar Rekap</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/grafik'?>"><span class="fa fa-line-chart"></span> Grafik</a>
                    </li>
                   
                     <li>
                       <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                  <span class="label label-danger"><?php echo $jum_notif_brg ?></span>
                </a>
                <ul class="dropdown-menu">
                     <li class="header"><?php echo $jum_notif_brg;?>Barang Akan Habis!</li>
                     <li>
                
                <ul class="menu">
                   <?php
                    
                   $query=$this->db->query("SELECT barang_nama FROM tbl_barang WHERE barang_stok<='6'");
                    foreach ($query->result_array() as $brg) :
                        $barang_id=$brg['barang_id'];
                        $barang_nama=$brg['barang_nama'];
                      
                      
                       
                ?>
                <li>
                      <p>Barang <b><?php echo $barang_nama;?></b> Akan Segera Habis</p>
                    <!-- </a> -->
                  </li>
                <?php endforeach;?>
            </ul>

              <li>
                   <?php if($h=='1'){ ?> 
                      <!--dropdown-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Transaksi</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'admin/penjualan'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Penjualan</a></li>
                          <li>
                        <a href="<?php echo base_url().'admin/grafik'?>"><span class="fa fa-line-chart"></span> Grafik</a>
                    </li>
                            
                        </ul>
                    </li>
                    <!--ending dropdown-->
                       <li>
                        <a ><span class="fa fa-file"></span></a>
                    </li>
                    <?php }?>
             
                                                 
                    </li>
                </ul>
            </li>
             <li>
                      
                 

                     <li>
                  
                        <a href="<?php echo base_url().'administrator/logout'?>"><span class="fa fa-sign-out"></span> Logout</a>
                         </li>
                     
                   

 <li>
                         <a href=""><span class="pull-left" style="width:500px"></span> <?php echo $this->session->userdata('nama');?></a>
                      </li>
                   
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
   
    </nav>
