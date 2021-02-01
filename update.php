<?php include('inc/header.php'); ?>
<?php include('inc/validation.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $name =     Sant_String($_POST['name']);
    $email =    Sant_Email($_POST['email']);

    if (Required_Input($name) && Required_Input($email)) {
        if (Mini_Input($name, 3)) {
            if (Valid_Email($email)) {

                $id = $_POST['id'];
                $password = Sant_String($_POST['password']);

                if ($password) {
                    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET user_name='$name',user_email='$email',user_password ='$hashed_pass' 
                    where user_id ='$id' ";
                } else {
                    $sql = "UPDATE users SET user_name='$name' , user_email='$email' WHERE user_id ='$id' ";
                    }
                $q = mysqli_query($conn, $sql);
                $res = mysqli_affected_rows($conn);
                if ($res == 1 ) {
                    $success = "updated successfully";
                    // header("refresh:2;url=index.php");
                }
            } else {
                $error = "Please Enter a Valid Email!";
            }
        } else {
            $error = "NAME must be Greater than 3 chasrs/Password must be less than 20 chars";
        }
    } else {
        $error = "Please Fill ALL Fields!";
    }
}
?>

<h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About User</h1>

<?php if ($error) : ?>
    <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
<?php endif; ?>

<?php if ($success) : ?>
    <h5 class="alert alert-success text-center"><?php echo $success ?></h5>
<?php endif; ?>

<?php include('inc/footer.php'); ?>