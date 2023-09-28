<?php
include "config.php";
if (isset($_POST['save'])) {
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
    $fu = $_POST['fualt'];
    $sql = "INSERT INTO `dimen`(`mark`, `cc`, `nc`, `hp`, `length`, `width`, `height`, `kerb`, `load`, `seat`, `ax`, `year`, `fualt`) VALUES ('$mark','$cc','$ncy','$hp','$length','$width','$height','$kerb','$load','$seat','$ax','$year','$fu')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Add data success');</script>";
        header("location:dimendex.php");
    } else {
        echo "<script>alert('Add data Failed');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>

<body style="background-color:azure;">
    <div class="container-fluid shadow p-3 mb-5 bg-body rounded-3 border p-4 bg-light mt-5" style="width: 95%;">
        <div class="row">
            <div class="col">
                <div class="h1 mx-4 mt-3">
                    <a href="dimendex.php" class="btn btn-outline-danger p-2"><strong><i class="bi bi-arrow-left-circle">Back</i></strong></a>
                </div>
            </div>
            <div class="col">
                <div class="h1 text-center mt-3">
                    បញ្ចូលព័ត៌មានរថយន្ត
                </div>
            </div>
            <div class="col">
            </div>
        </div>
        <form action="" method="post">
            <div class="row mt-5">
                <div class="col h6 text-center">Mark</div>
                <div class="col h6 text-center">C.C</div>
                <div class="col h6 text-center">N.Cylinder</div>
                <div class="col h6 text-center">HP</div>
                <div class="col h6 text-center">Length</div>
                <div class="col h6 text-center">Width</div>
                <div class="col h6 text-center">Heihgt</div>
                <div class="col h6 text-center">Kerb Weight</div>
                <div class="col h6 text-center">Load Weight</div>
                <div class="col h6 text-center">Seats</div>
                <div class="col h6 text-center">Axles</div>
                <div class="col h6 text-center">Year Made</div>
                <div class="col h6 text-center">Fualt</div>
            </div>

            <div class="row">
                <div class="col"><input class="form-control" required name="mark" type="text"></div>
                <div class="col"><input class="form-control" required name="cc" type="text"></div>
                <div class="col"><input class="form-control" required name="ncylin" type="text"></div>
                <div class="col"><input class="form-control" required name="hp" type="text"></div>
                <div class="col"><input class="form-control" required name="length" type="text"></div>
                <div class="col"><input class="form-control" required name="width" type="text"></div>
                <div class="col"><input class="form-control" required name="height" type="text"></div>
                <div class="col"><input class="form-control" required name="kerb" type="text"></div>
                <div class="col"><input class="form-control" required name="load" type="text"></div>
                <div class="col"><input class="form-control" required name="seat" type="text"></div>
                <div class="col"><input class="form-control" required name="ax" type="text"></div>
                <div class="col"><input class="form-control" required name="year" type="text"></div>
                <div class="col">
                    <select class="form-select" name="fualt">
                        <option value="សាំង">សាំង</option>
                        <option value="សាំង-អាគុយ">សាំង-អាគុយ</option>
                        <option value="ម៉ាស៊ូត">ម៉ាស៊ូត</option>
                        <option value="អគ្គីសនី">អគ្គីសនី</option>
                        <option value="ហ្កាស់">ហ្កាស់</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-danger" type="reset"><i class="bi bi-x-circle"></i> Cancel</button>
                    <button class="btn btn-success" type="submit" name="save"><i class="bi bi-box-arrow-down"></i> Save</button>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>