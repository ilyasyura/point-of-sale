<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>laporan data barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>REKAP DATA BARANG</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<?php 
    $urut=0;
    $nomor=0;
    $group='-';
    foreach($data->result_array()as $d){
    $nomor++;
    $urut++;
    if($group=='-' || $group!=$d['kategori_nama']){
        $kat=$d['kategori_nama'];
        
        if($group!='-')
        echo "</table><br>";
        echo "<table align='center' width='900px;' border='1'>";
        echo "<tr><td colspan='6'><b>Kategori: $kat</b></td> </tr>";
echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='10%' align='center'>Kode Barang</td>
    <td width='10%' align='center'>Nama Barang</td>
    <td width='10%' align='center'>Satuan</td>
    <td width='10%' align='center'>Harga Jual</td>
    <td width='10%' align='center'>Harga Beli</td>
    <td width='10%' align='center'>Stok</td>
    <td width='10%' align='center'>Supplier</td>
    <td width='30%' align='center'>Barang Last Update</td>
    
    </tr>";
$nomor=1;
    }
    $group=$d['kategori_nama'];
        if($urut==500){
        $nomor=0;
            echo "<div class='pagebreak'> </div>";

            }
        ?>
        <tr>
                <td style="text-align:center;vertical-align:center;text-align:center;"><?php echo $nomor; ?></td>
                <td style="vertical-align:center;padding-left:5px;text-align:center;"><?php echo $d['barang_id']; ?></td>
                <td style="vertical-align:center;padding-left:5px;"><?php echo $d['barang_nama']; ?></td>
                <td style="vertical-align:center;text-align:center;"><?php echo $d['barang_satuan']; ?></td>
                <td style="vertical-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp '.number_format($d['barang_harjul']); ?></td>
                <td style="vertical-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp '.number_format($d['barang_harpok']); ?></td>
                <td style="vertical-align:center;text-align:center;text-align:center;"><?php echo $d['barang_stok']; ?></td>
                 <td style="vertical-align:center;text-align:center;text-align:center;"><?php echo $d['barang_distributor']; ?></td>
                  <td style="vertical-align:center;text-align:center;text-align:center;"><?php echo $d['barang_tgl_last_update']; ?></td> 
        </tr>
        

        <?php
        }
        ?>
</table>


<table border="0" align="center" style="width:700px;border:none;">
        <tr>
           
             
            <th style="text-align:left;">Total</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($d['total']).',-';?></th>
           
             <th style="text-align:left;">Total Stok</th>
            <th style="text-align:left;">: <?php echo number_format($d['total_stok']);?></th>
        </tr>
        <tr>
        <th style="text-align:left;">Total Harga Beli</th>
        <th style="text-align:left;">: <?php echo 'Rp '.number_format($d['total_beli']).',-';?></th>
        
        </tr>  
       
        
       
</table>
</div>
</body>
</html>