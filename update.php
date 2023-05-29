<?php
$conn = mysqli_connect("localhost", "root", "", "studentinfo");
$conn1 = "";
if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
} else {
    $conn1 = "Connected";
}
// $id = null;
// if (isset($_GET['studentID'])) {
//     $id = $_GET['studentID'];
// }

// $id = 55;
// $sql = "SELECT * From STUDENT1 WHERE studid='$id' ";
// $result = mysqli_query($conn, $sql);
// $info = mysqli_fetch_assoc($result);
// $skills = isset($info['skills']);
// $skills2 = explode(',', $skills);

if (isset($_POST['update'])) {
    $id = $_POST['Studid'];
    $fName = $_POST['FullName'];
    $fatherName = $_POST['fathername'];
    $motherName = $_POST['mothername'];
    $dob = $_POST['dateofbirth'];
    $gender = $_POST['GenderVal'];
    $mail = $_POST['Email'];
    $educationlvl = $_POST["edulevel"];
    $dept = $_POST["dept"];
    $mob = $_POST['mobNumber'];
    $add = $_POST['add'];
    // $skill = "";

    // foreach ($_POST["skill"] as $value) {
    //     $skill .= $value . ",";
    // }

    $query = "UPDATE STUDENT1 SET StudName='$fName',fatherName='$fatherName',motherName='$motherName',gender='$gender',dob='$dob',mail='$mail',educationlvl='$educationlvl',dept_id='$dept',mob='$mob',addr='$add' WHERE studid='$id'";

    $result2 = mysqli_query($conn, $query);

    if ($result2) {
        echo "<script>alert('Data Updated successfully'); window.location='index.php'</script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!-- <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<div class="modal" id="myModal" style="background-color: rgba(0, 0, 0, 0.5) !important; z-index:99">
    <div class="d-flex justify-content-center my-2">

        <form action="" method="post" class="w-50">
            <div class="table-data shadow-lg p-3 mb-5 bg-white rounded modal-content">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close close" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="idnumber">Student Id:</label>
                        <input class="form-control" type="text" name="Studid" value="" id="idnumber"
                            placeholder="Student id" disabled />

                    </div>
                    <div class="col-6">
                        <label class="form-label" for="fname">Full Name:</label>
                        <input class="form-control" type="text" name="FullName"
                            value="<?php echo "{$info['StudName']}"; ?>" id="fname" placeholder="first name" />
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="father">Father Name:</label>
                        <input class="form-control" type="text" name="fathername"
                            value="<?php echo "{$info['fatherName']}"; ?>" id="father" placeholder="Father Name" />
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="mother">Mother Name:</label>
                        <input class="form-control" type="text" name="mothername"
                            value="<?php echo "{$info['motherName']}"; ?>" id="mother" placeholder="Mother Name" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="dob">Date Of Birth: </label>
                        <input class="form-control" type="date" id="dob" name="dateofbirth"
                            value="<?php echo "{$info['dob']}"; ?>" />
                    </div>
                    <div class="col-6">
                        <label class="form-check-label" for="gender">Gender: </label>
                        <div class="form-check">
                            <label class="form-check-label" for="m">Male</label>
                            <input class="form-check-input" type="radio" name="GenderVal" value="male" id="m" required <?php
                            if ($info['gender'] == "male") {
                                echo "checked";
                            }
                            ?> />
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="f">Female</label>
                            <input class="form-check-input" type="radio" name="GenderVal" value="female" id="f" <?php
                            if ($info['gender'] == "female") {
                                echo "checked";
                            }
                            ?> />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="mail">E-mail:</label>
                        <input class="form-control" type="email" name="Email" value="<?php echo "{$info['mail']}"; ?>"
                            id="mail" placeholder="xyz@gmail.com" />
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="lvl">Level:</label>
                        <select class="form-select" name="edulevel" id="lvl">
                            <option selected>select school</option>
                            <option value="highschool" <?php
                            if ($info['educationlvl'] == "highschool") {
                                echo "selected";
                            }
                            ?>>High School</option>
                            <option value="secondaryschool" <?php
                            if ($info['educationlvl'] == "secondaryschool") {
                                echo "selected";
                            }
                            ?>>Secondary School</option>
                            <option value="bachelors" <?php
                            if ($info['educationlvl'] == "bachelors") {
                                echo "selected";
                            }
                            ?>>Bachelors</option>
                            <option value="masters" <?php
                            if ($info['educationlvl'] == "masters") {
                                echo "selected";
                            }
                            ?>>Masters</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="">Department: </label>
                        <select class="form-select" name="dept" id="">
                            <option selected>Select Dept.</option>
                            <option value="cse" <?php
                            if ($info['dept'] == "cse") {
                                echo "selected";
                            }
                            ?>>CSE</option>
                            <option value="mech" <?php
                            if ($info['dept'] == "mech") {
                                echo "selected";
                            }
                            ?>>MECH</option>
                            <option value="it" <?php
                            if ($info['dept'] == "it") {
                                echo "selected";
                            }
                            ?>>IT</option>
                            <option value="agri" <?php
                            if ($info['dept'] == "agri") {
                                echo "selected";
                            }
                            ?>>AGRI</option>
                        </select>
                    </div>
                    <div class="col-6 py-3">
                        <label class="form-check-label" for="">Skills:</label>
                        Technical Skills <input class="form-check-input" type="checkbox" name="skill[]"
                            value="Technical skills" id="ts" <?php
                            if (in_array('Technical skills', $skills2)) {
                                echo "checked";
                            }
                            ?> />
                        <label class="form-label" for="ts"></label>
                        Analytical Skills<input class="form-check-input" type="checkbox" name="skill[]"
                            value="Analytical skill" id="as" <?php
                            if (in_array('Analytical skill', $skills2)) {
                                echo "checked";
                            }
                            ?> />
                        <label class="form-label" for="as"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="">Tel/Mob:</label>
                        <input class="form-control" type="number" name="mobNumber"
                            value="<?php echo "{$info['mob']}"; ?>" placeholder="xxxxxxxxxxx" />
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                name="add" style="height: 70px"><?php echo "{$info['addr']}"; ?></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-6">
                        <input class="btn btn-success w-100" type="submit" value="Update" name="update">
                    </div>
                    <div class="col-6">
                        <input class="btn btn-info w-100" type="reset" value="reset">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> -->