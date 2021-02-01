<?php include('inc/header.php'); ?>
<?php include('inc/validation.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $name =     Sant_String($_POST['name']);
    $password = Sant_String($_POST['password']);
    $email =    Sant_Email($_POST['email']);

    if (Required_Input($name) && Required_Input($password) && Required_Input($email)) {
        if(Mini_Input($name , 3) && Max_Input($password,10)){
            if(Valid_Email($email)){
                $hashed_pass=password_hash($password ,PASSWORD_DEFAULT);  //hashing password 
                $sql="INSERT INTO users (user_name , user_email , user_password) 
                VALUES ('$name','$email','$hashed_pass')";
                $q=mysqli_query($conn ,$sql);
                $res = mysqli_affected_rows($conn);
                if($res){
                    $res="Done";
                }else{
                }
            }else{
                    $error ="Please Enter a Valid Email!";
            }
        }else{
                    $error="NAME must be Greater than 3 chasrs/Password must be less than 20 chars";
        }
    } else {
                    $error ="Please Fill     Fields!";
    }
}
?>

<h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
<?php if ($error) : ?>
    <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
<?php endif; ?>

<?php if ($res) : ?>
    <h5 class="alert alert-success text-center"><?php echo $res ?></h5>
<?php endif; ?>

<div class="col-md-6 offset-md-3">
    <form class="my-2 p-3 border" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <label for="exampleInputName1">Full Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Email address</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<?php include('inc/footer.php'); ?>