<html>
<head>
 <title>PRINT DOCUMENT</title>
    <link href="../../assets/css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <h3 align="center" style="color:#000;">APLIKASI PENGELOLAAN LAUNDRY </h3>
      <h4 align="center">DATA DETAIL TRANSAKSI</h4>  
  <table class="table" border="1" align="center">
    <tr>
      <td class="td-md">ID</td>
      <td class="td-md">ID Transaksi</td>
      <td class="td-md">iD Paket</td>
      <td class="td-md">QTY</td>
      <td class="td-md">Keterangan</td>
     </tr>
    <?php
    include "../../koneksi.php";
    $tampil = "SELECT * FROM detailtransaksi";
    $query = $Connection->query($tampil);
    foreach ($query as $data ){
    ?>
    <tr>
      <td><?php echo $data['id']?></td>
      <td><?php echo $data['id_transaksi']?></td>
      <td><?php echo $data['id_paket']?></td>
      <td><?php echo $data['qty']?></td>
      <td><?php echo $data['keterangan']?></td>
    </tr>
    <?php
    }
    ?>  

  </table>
  
<script>
  window.load = print_d();
  function print_d(){
   window.print();
  }
 </script>

</body>
</html>
<style type="text/css">
  .td-md{
    font-weight: bold;
  }
</style>