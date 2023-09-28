<?php
include "config.php";
if (isset($_GET['delete'])) {
    $id = $_GET['id'] ?? null;
    $query = mysqli_query($conn, "delete from dimen where id='$id'");
    if ($query) {
        header("location:dimendex.php");
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>

<body style="background-color:lightgray;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="h1 mt-3 mb-5 text-center">Dimension</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="add.php" class="btn btn-success"><i class="bi bi-database-fill-add"></i> Add Data</a>
            </div>

            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="" method="GET" id="form">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="search..." name="search" value="<?php if (isset($_GET['search'])) {echo $_GET['search'];} ?>">
                                <label for="floatingInput">Search...</label>
                            </div>
                        </div>
                        <div class="col"><button class="btn btn-primary p-3" type="submit" id="submit"><i class="bi bi-search"></i> ស្វែងរក</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row fontkh">
            <div class="col" style="width:100%; max-height: 600px; overflow-y:scroll;">
                <table class="table mt-3 bg-light table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">#</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ម៉ាករថយន្ត</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ទំហំស៊ីឡាំង</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ចំនួនស៊ីឡាំង</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">កម្លាំងសេះ</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">បណ្តោយ</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ទទឹង</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">កម្ពស់</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ទម្ងន់យាន្ត</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ទម្ងន់ផ្ទុក</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ចំនួនកៅអី</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ចំនួនភ្លៅ</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ឆ្នាំផលិត</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">ឥន្ទនៈ</th>
                            <th class="bg-light" style="position: sticky; top: 0px;" scope="col">លុប</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        include "config.php";
                        if (!isset($_GET['search'])) {
                            $sql = "select * from dimen";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                                    <tr style="font-size: 14px;">
                                        <td><?php echo $no ?></td>
                                        <td><strong><?php echo $row['mark'] ?></strong></td>
                                        <td><?php echo $row['cc'] ?>&nbsp;&nbsp;cc</td>
                                        <td><?php echo $row['nc'] ?></td>
                                        <td><?php echo $row['hp'] ?>&nbsp;&nbsp;hp</td>
                                        <td><?php echo $row['length'] ?>&nbsp;មែត្រ</td>
                                        <td><?php echo $row['width'] ?>&nbsp;មែត្រ</td>
                                        <td><?php echo $row['height'] ?>&nbsp;មែត្រ</td>
                                        <td><?php echo $row['kerb'] ?>&nbsp;Kg</td>
                                        <td><?php echo $row['load'] ?>&nbsp;Kg</td>
                                        <td><?php echo $row['seat'] ?></td>
                                        <td><?php echo $row['ax'] ?></td>
                                        <td class="text-danger"><strong><?php echo $row['year'] ?></strong></td>
                                        <td><strong><?php echo $row['fualt'] ?></strong></td>
                                        <td>
                                            <a href="?delete&id=<?php echo $row['id'] ?>" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនឬទេ?')" class="btn btn-danger fontkh"><i class="bi bi-trash"></i>លុប</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="15">
                                        <?php
                                        ?>
                                <tr class="text-center text-primary">
                                    <td colspan="14"><span style="font-size: 55px; font-weight:bold;"><i class="bi bi-list-ul"></i></span> <br><span style="font-size: 20px; font-weight:bold;">គ្មានទិន្ន័យ</span></td>
                                </tr>
                                <?php
                                ?>
                                </td>
                                </tr>

                                <?php
                            }
                        } else {
                            if (isset($_GET['search'])) {
                                $filtervalue = $_GET['search'];
                                $query = "SELECT * FROM dimen WHERE CONCAT(mark) LIKE '%$filtervalue%' ";
                                $query_run = mysqli_query($conn, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr style="font-size: 14px;">
                                            <td><?php echo $no ?></td>
                                            <td><strong><?php echo $row['mark'] ?></strong></td>
                                            <td><?php echo $row['cc'] ?>&nbsp;&nbsp;cc</td>
                                            <td><?php echo $row['nc'] ?></td>
                                            <td><?php echo $row['hp'] ?>&nbsp;&nbsp;hp</td>
                                            <td><?php echo $row['length'] ?>&nbsp;មែត្រ</td>
                                            <td><?php echo $row['width'] ?>&nbsp;មែត្រ</td>
                                            <td><?php echo $row['height'] ?>&nbsp;មែត្រ</td>
                                            <td><?php echo $row['kerb'] ?>&nbsp;Kg</td>
                                            <td><?php echo $row['load'] ?>&nbsp;Kg</td>
                                            <td><?php echo $row['seat'] ?></td>
                                            <td><?php echo $row['ax'] ?></td>
                                            <td class="text-danger"><strong><?php echo $row['year'] ?></strong></td>
                                            <td><strong><?php echo $row['fualt'] ?></strong></td>
                                            <td>
                                                <a href="?delete&id=<?php echo $row['id'] ?>" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនឬទេ?')" class="btn btn-danger fontkh"><i class="bi bi-trash"></i>លុប</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                } else {
                                    ?>
                                    <tr class="text-center text-primary">
                                        <td colspan="15"><span style="font-size: 55px; font-weight:bold;"><i class="bi bi-search"></i></span> <br><span style="font-size: 20px; font-weight:bold;">រកមិនឃើញ</span></td>
                                    </tr>
                        <?php
                                }
                            }
                        }



                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>