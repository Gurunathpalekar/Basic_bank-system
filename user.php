<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>user</title>
  </head>
  <body>
    <?php include'navbar.php';?><br>
    <div class="container">
  <h2> <p class="text-center">USER INFORMATION</p></h2><br>
    <?php
include 'config.php';
$sql="SELECT * FROM users";
$result=$conn->query($sql);
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SR.NO</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">BALANCE</th>
      <th scope="col">OPERATION</th>
    </tr>
  </thead>
  <?php
  if($result->num_rows>0)
  {
      //output data of each row
      while($row=$result->fetch_assoc()){
   ?>
   <tr>
       <td><?php echo $row["id"];?></td>
       <td><?php echo $row["name"];?></td>
       <td><?php echo $row["email"];?></td>
       <td><?php echo $row["balance"];?></td>
       <td><a href="transfer.php?id=<?php echo $row['id'];?>"><button type="button" class="btn">Transfer Money</button></a></td>
   </tr>
   <?php
      } ?>
</table>
<?php }
  ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
    </div>
  </body>
  <?php include'footer.php';?>
</html>