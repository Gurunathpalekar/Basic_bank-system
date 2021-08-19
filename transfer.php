<?php include'navbar.php';
?>
<?php
  include 'config.php';
  if(isset($_POST['submit']))
  {
  $from=$_GET['id'];
  $to=$_POST['user'];
  $amount=$_POST['amount'];
  $sql="SELECT * FROM users where id='$from'";
   $query=mysqli_query($conn,$sql);
   $sql1=mysqli_fetch_array($query);

   $sql="SELECT * FROM users where id='$to'";
   $query=mysqli_query($conn,$sql);
   $sql2=mysqli_fetch_array($query);
  if(($amount)<0)
  {
      echo '<script type="text/JavaScript">
           alert("Opps!!Amount cannot be negative");
           </script>';

  }
  else if($amount==0)
  {
    echo '<script type="text/JavaScript">
         alert("Zero Value cannot be transferred.");
         </script>';

  }
  else if($amount > $sql1['balance'])
  {
    echo '<script type="text/JavaScript">
         alert("Insufficient Balance.");
         </script>';
  }
  else{
      $newbalance=$sql1['balance'] - $amount;
      $sql="UPDATE users SET balance=$newbalance WHERE id=$from";
      mysqli_query($conn,$sql);

      $newbalance=$sql2['balance'] + $amount;
      $sql="UPDATE users SET balance=$newbalance WHERE id=$to";
      mysqli_query($conn,$sql);

      $sender=$sql1['name'];
      $receiver=$sql2['name'];
      $sql="INSERT INTO transaction(`sender`,`receiver`,`balance`) VALUES ('$sender','$receiver','$amount')";
      $query=mysqli_query($conn,$sql);
      if($query){
        echo "<script> alert('Transaction Successful');
        window.location='transaction.php';
         </script>";
      }
      $newbalance=0;
      $amount=0;
 }
}
  ?>

<!doctype html>
<html lang="en">
  <head>
  <style>
  .form {
    border: 2px solid rgb(27, 127, 194);
    border-radius: 20px;
    width: 50%;
    height: 250px;
    margin: 150px auto;
    padding: 20px;
    background-color: lightskyblue;
  }
  .form input[type="text"],
  select {
    width: 100%;
    padding: 5px;
    font-size: 0.9rem;
  }
  .form input[type="submit"] {
    text-align: center;
    font-size: 20px;
    font-weight: 400;
    background-color: rgb(19, 18, 18);
    color: white;
    margin: 8px auto;
    cursor: pointer;
    padding: 6px;
  }

  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Transfer</title>
  </head>
  <body>
<?php
    $sid=$_GET['id'];
    $sql="SELECT * FROM users WHERE id='$sid'";
    $result=$conn->query($sql);
    $row=mysqli_fetch_assoc($result);
     ?>
     <div class="container"><br><br><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SR.NO</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">BALANCE</th>
    <tr>
    <tr>
    <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['balance'];?></td>
     </tr>
  </thead>
    </table>
    </div>
    <div class="container" align="center">
    <div class="form">
    <form method="post">
        Recepient's Name:
        <br>
        <select id="user" name="user">
            <option value="" selected disabled>Choose</option>
        <?php
           $sql="SELECT * FROM users WHERE id!='$sid'";
           $result=mysqli_query($conn,$sql);

        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
        ?>
           <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
           <?php
            }
        }
        ?>
        </select>
        <br>
        Transfer Amount(Rs.):
        <br>
        <input type="text" name="amount" required>
        <br>
        <input type="submit"  name="submit" value="Transfer">
    </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
  <?php include'footer.php';?>
</html>