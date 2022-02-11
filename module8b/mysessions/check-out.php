<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check out</title>
</head>

<body>
<?php
session_start();
if(isset($_POST['submit'])) {
    unset($_SESSION['product-1']);
    unset($_SESSION['product-2']);
    unset($_SESSION['product-3']);
    unset($_SESSION['product-4']);
    unset($_SESSION['product-5']);
    unset($_SESSION['product-6']);
}

if(isset($_SESSION["product-1"])) {
    ?>

    <div class="checkout">
        <div class="product">
            <label>product 1</label>
            <input disabled value="<?php echo $_SESSION['product-1'];?>">
        </div>
        <div class="product">
            <label>product 2</label>
            <input disabled value="<?php echo $_SESSION['product-2'];?>">
        </div>
        <div class="product">
            <label>product 3</label>
            <input disabled value="<?php echo $_SESSION['product-3'];?>">
        </div>
        <div class="product">
            <label>product 4</label>
            <input disabled value="<?php echo $_SESSION['product-4'];?>">
        </div>
        <div class="product">
            <label>product 5</label>
            <input disabled value="<?php echo $_SESSION['product-5'];?>">
        </div>
        <div class="product">
            <label>product 6</label>
            <input disabled value="<?php echo $_SESSION['product-6'];?>">
        </div>
    </div>
    <p>
    <form action="check-out.php" method="POST">
        <input type="submit" name="submit" value="reset">
    </form>
    </p>


<?php
} else {
    ?>
    <p>wanna try that again?</p>
    <a href="mysessions.php">start over</a>
<?php }
?>

</body>
</html>