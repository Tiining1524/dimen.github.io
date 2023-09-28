<!--insert-->
<?php
include "config.php";
if(isset($_POST['btnsave'])){
    $mark = $_POST['mark'];
    $cc = $_POST['cc'];
    $ncy = $_POST['ncylin'];
    $hp = $_POST['hp'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $kerb = $_POST['kerb'];
    $load = $_POST['load'];
    $seat = $_POST['seat'];
    $ax = $_POST['ax'];
    $year = $_POST['year'];

    $sql = "insert into dimen(mark, cc, nc, hp, length, width, height, kerb, load, seat, ax, year) values('$mark','$cc','$ncy','$hp','$length','$width','$height','$kerb','$load','$seat','$ax','$year',)";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Add data success');</script>";
    }
}
?>

<!--insert-->