<?php require_once("saveinfo.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="data.css?v=<?php echo time(); ?>">
  <title>CRUD App</title>
  <style>
    body{
      font-family: 'Noto Sans TC', sans-serif;
    }
  </style>
</head>
<body>
<h1>PHP CRUD Application</h1>


<?php 
$res = mysqli_query($conn, "SELECT * FROM data");
?>

<div class="container1">
      <table class="table1">
        <thead>
          <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th colspan="4">Action</th>
          </tr>
        </thead>
        <?php 
        while($row = $res->fetch_assoc()) :;
        ?>
        <tr>
          <td><?php echo $row['fname']; ?></td>
          <td><?php echo $row['lname']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td>
            <a class="edit" href="index.php?edit=<?php echo $row['id'];?>">Edit</a>
            <a class="delete" href="saveinfo.php?delete=<?php echo $row['id'];?>">Delete</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </table>
</div>


  <div class="container">
  <form action="saveinfo.php" method="POST">
    <div class="input-info"> 
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="text" name="fname" id="" value="<?php echo $fname;?>" placeholder="First Name:" required >
      <input type="text" name="lname" id="" value="<?php echo $lname;?>" placeholder="Last Name:" required>
      <input type="email" name="email" id="" value="<?php echo $email;?>" placeholder="Email" required>
      <input type="number" name="phone" id="" value="<?php echo $phone; ?>" placeholder="Phone Number" required>
      <?php
      if($update == true) {
      ?>
      <button class="button" type="submit" name="update">Update</button>
      <?php } else{?>
        <button class="button" type="submit" name="submit">Save</button>
      <?php } ?>
    </div> 
    </form>  
    </div>
  </div>
 
</body>
</html>