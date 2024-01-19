<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: http://localhost/website-fit-work/index.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: http://localhost/website-fit-work/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/png" href="../assets/images/mayasari.png" />
     <title>Dashboard | PT. Mayasari Bakti</title>
</head>

<body>
     <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

     <form action="" method="post">
          <button type="submit" name="logout">Logout</button>
     </form>
</body>

</html>