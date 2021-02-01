<?php
include('inc/header.php');
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header("LOCATION:index.php");
}
$id = $_GET['id'];
$sql = "SELECT * FROM users where user_id =$id";
$q = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($q);
if (!$res) {
    header("LOCATION:index.php");
}
$sql2 = "DELETE FROM users where user_id =$id";
$q2 = mysqli_query($conn, $sql2);
if ($q2) {
    header("refresh:3;url=index.php");
}
?>
<h1 class="text-center col-12 bg-danger py-3 text-white my-2">User[<?php echo $res['user_name']; ?> ]has been deleted </h1>
<?php include('inc/footer.php'); ?>