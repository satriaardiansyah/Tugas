<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<?php
session_start();
error_reporting(E_ALL & E_NOTICE & E_DEPRECATED);
$conn = mysqli_connect('localhost','root','','perpustakaan');

$username = $_POST['username'];
$password = $_POST['password'];
$submit = $_POST['submit'];

if($submit){
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    if($row['username'] != ""){
        //berhasil login
        $_SESSION['username']=$row['username'];
        $_SESSION['status']=$row['status'];
        ?>
        <script language script="JavaScript">
            alert("anda login sebagai <?php echo $row['username'];?>");
            document.location='index.php';
            </script>
            <?php
}else{
    //galgal login
    ?>
    <script language script="JavaScript">
        alert('gagal login');
        document.location='login.php';
        </script>
        <?php
}
}
?>
<form method="post" action="login.php">
    <p align='center'>
        Username : <input type="text" name='username'><br>
        Password : <input type="password" name="password"><br>
        <input type="submit" name="submit" class="btn btn-primary">
    </p>
</form>

</html>