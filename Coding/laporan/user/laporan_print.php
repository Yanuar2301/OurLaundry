<html>
<head>
 <title>PRINT DOCUMENT</title>
    <link href="../../assets/css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
  <h3 align="center" style="color:#000;">APLIKASI PENGELOLAAN LAUNDRY </h3>
      <h4 align="center">DATA USER</h4>  
  <table class="table" border="1" align="center">
    <tr>
      <td class="td-md">ID</td>
      <td class="td-md">Nama</td>
      <td class="td-md">Username</td>
      <td class="td-md">Password</td>
      <td class="td-md">ID Outlet</td>
      <td class="td-md">Role</td>
     </tr>
    <?php
    include "../../koneksi.php";
    $tampil = "SELECT * FROM user";
    $query = $Connection->query($tampil);
    foreach ($query as $data ){
    ?>
    <tr>
      <td><?php echo $data['id']?></td>
      <td><?php echo $data['nama']?></td>
      <td><?php echo $data['username']?></td>
      <td><?php echo $data['password']?></td>
      <td><?php echo $data['id_outlet']?></td>
      <td><?php echo $data['role']?></td>
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