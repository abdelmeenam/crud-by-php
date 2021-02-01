<?php include('inc/header.php'); ?>
<?php
//when we edit we do 2 tasks
//first :- we check if id is (numerical and isset from the previous page) if it is't we back
//second:- we check it in database and if it isn't exist we back
//third :- if it is exist we take data from the associative array
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

?>
<h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Info About User</h1>
<div class="col-md-6 offset-md-3">
    <form class="my-2 p-3 border" action="update.php" method="POST">
        <div class="form-group">
            <label for="exampleInputName1">Full Name</label>
            <input type="text" name="name" value="<?php echo $res['user_name'] ?>" class="form-control" id="exampleInputName1">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Email address</label>
            <input type="email" name="email" value="<?php echo $res['user_email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" placeholder="Enter your new password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<?php include('inc/footer.php'); ?>