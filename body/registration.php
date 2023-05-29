<?php
$sql = "SELECT * FROM STUDENT1";

$query = mysqli_query($conn, $sql);
$info = mysqli_fetch_assoc($query);
$sidErr2 = $sidErr = $fNameErr = $fatherNameErr = $motherNameErr = $DOBErr = $genderErr = $mailErr = $mobErr = $addressErr = $SkillsErr = $educationlvlErr = $deptErr = $folderLocationErr = $target_file = NULL;

$sid = $fName = $fatherName = $motherName = $DOB = $gender = $mail = $mob = $address = $Skills = $skill = $educationlvl = $dept = $folderLocation = $target_file = NULL;

$flag = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if (empty($_POST["Studid"])) {
    //     $sidErr = "* Student Id Required";
    //     $flag = 1;
    // } elseif ($_POST['Studid'] == $info['studid']) {
    //     $sidErr2 = "This Id is already Exist";
    // } else {
    //     $sid = test_input($_POST["Studid"]);
    // }
    $fileName = $_FILES['file']['name'];
    $allowed_types = array('pdf');
    $profileFile = $_FILES['profilepic']['name'];
    $profileFileTemp = $_FILES['profilepic']['tmp_name'];

    if (empty($_POST["FullName"])) {
        $fNameErr = "* Student Full Name Required";
        $flag = 1;
    } else {
        $fName = test_input($_POST["FullName"]);
    }

    if (empty($_POST["fathername"])) {
        $fatherNameErr = "* Father Name Required";
        $flag = 1;
    } else {
        $fatherName = test_input($_POST["fathername"]);
    }

    if (empty($_POST["mothername"])) {
        $motherNameErr = "* Mother Name Required";
        $flag = 1;
    } else {
        $motherName = test_input($_POST["mothername"]);
    }

    if (empty($_POST["dateofbirth"])) {
        $DOBErr = "* Date of Birth Required";
        $flag = 1;
    } else {
        $DOB = test_input($_POST["dateofbirth"]);
    }

    if (empty($_POST["GenderVal"])) {
        $genderErr = "* Gender is Required";
        $flag = 1;
    } else {
        $gender = test_input($_POST["GenderVal"]);
    }

    if (empty($_POST["Email"])) {
        $mailErr = "* Mail is Required";
        $flag = 1;
    } else {
        $mail = test_input($_POST["Email"]);
    }

    if (empty($_POST["edulevel"])) {
        $educationlvlErr = "* Education LEVEL is Required";
        $flag = 1;
    } else {
        $educationlvl = test_input($_POST["edulevel"]);
    }

    if (empty($_POST["dept"])) {
        $deptErr = "* Dept is Required";
        $flag = 1;
    } else {
        $dept = test_input($_POST["dept"]);
    }

    if (empty($_POST["mobNumber"])) {
        $mobErr = "* Mobile Number is Required";
        $flag = 1;
    } else {
        $mob = test_input($_POST["mobNumber"]);
    }

    if (empty($_POST["add"])) {
        $addressErr = "* Address is Required";
        $flag = 1;
    } else {
        $address = test_input($_POST["add"]);
    }

    if (empty($_POST["skill"])) {
        $SkillsErr = "* One Skill is Required";
        $flag = 1;
    } else {
        foreach ($_POST["skill"] as $value) {
            $skill .= $value . ",";
            $Skills = test_input($skill);
        }
    }
    if (!empty($fileName)) {
        $list = array();
        foreach ($_FILES['file']['name'] as $key => $name) {
            $fileTemp = $_FILES['file']['tmp_name'][$key];
            $extension = pathinfo($name, PATHINFO_EXTENSION);

            if (in_array($extension, $allowed_types)) {
                $uniqueName = time() . '_' . rand(1000, 9999) . '.' . $extension;
                $localLocat = "./upload/" . $uniqueName;
                $list[] = $localLocat;
                $folderLocation = implode(",", $list);
                move_uploaded_file($fileTemp, $localLocat);
            }
            // else {
            //     $folderLocationErr = "file type doesn't supported";
            //     $flag = 1;
            // }
        }
        // echo $folderLocation;
    }
    // else {
    //     $folderLocationErr = "*file required";
    //     $flag = 1;

    // }
    if (!empty($profileFile)) {
        $target_file = "./upload/" . basename($profileFile);
        echo $target_file;
        move_uploaded_file($profileFileTemp, $target_file);
    }
    //  else {
    //     echo "error in pf upload";
    // }

    if ($flag == 0) {
        $sql = "INSERT INTO STUDENT1 (studid,StudName,fatherName,motherName,dob,gender,mail,educationlvl,dept_id,mob,addr,skills,uploadfile,profilePic) 
            VALUES('$sid','$fName','$fatherName','$motherName','$DOB','$gender','$mail','$educationlvl','$dept','$mob','$address','$Skills','$folderLocation','$target_file')";

        if (mysqli_query($conn, $sql)) {
            if ($flag == 0) {
                //redirect to sucess page
                echo "<script type='text/javascript'>alert('Data successfully inserted..');</script>";
                echo "<script>window.location.href='index.php'</script>";
            }
        } else {
            echo "error";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>


<div class="container py-1" id="main" style="margin-left:12.4rem; position:absolute ">
    <div class="d-flex justify-content-center ">
        <form action="#" method="post" class="w-50" enctype="multipart/form-data">
            <div class="table-data shadow-lg p-3 mb-5 bg-white rounded">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="idnumber">Student Id:</label>
                        <input class="form-control" type="text" name="Studid" value="<?php echo $sid; ?>" id="idnumber"
                            placeholder="Student id" disabled />
                        <!-- <span>
                            <?php //echo $sidErr; ?>
                        </span>
                        <span>
                            <?php //echo $sidErr2; ?>
                        </span> -->
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="fname">Full Name:</label>
                        <input class="form-control" type="text" name="FullName" value="<?php echo $fName; ?>" id="fname"
                            placeholder="first name" />
                        <span>
                            <?php echo $fNameErr; ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="father">Father Name:</label>
                        <input class="form-control" type="text" name="fathername" value="<?php echo $fatherName; ?>"
                            id="father" placeholder="Father Name" />
                        <span>
                            <?php echo $fatherNameErr; ?>
                        </span>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="mother">Mother Name:</label>
                        <input class="form-control" type="text" name="mothername" value="<?php echo $motherName; ?>"
                            id="mother" placeholder="Mother Name" />
                        <span>
                            <?php echo $motherNameErr; ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="dob">Date Of Birth: </label>
                        <input class="form-control" type="date" id="dob" name="dateofbirth"
                            value="<?php echo $DOB; ?>" />
                        <span>
                            <?php echo $DOBErr; ?>
                        </span>
                    </div>
                    <div class="col-6">
                        <label class="form-check-label" for="gender">Gender: </label>
                        <div class="form-check">
                            <label class="form-check-label" for="m">Male</label>
                            <input class="form-check-input" type="radio" name="GenderVal" value="male" id="m" />
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="f">Female</label>
                            <input class="form-check-input" type="radio" name="GenderVal" value="female" id="f" />
                        </div>
                        <span>
                            <?php echo $genderErr; ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="mail">E-mail:</label>
                        <input class="form-control" type="email" name="Email" value="<?php echo $mail; ?>" id="mail"
                            placeholder="xyz@gmail.com" />
                        <span>
                            <?php echo $mailErr; ?>
                        </span>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="lvl">Level:</label>
                        <select class="form-select" name="edulevel" id="lvl">
                            <option selected>select school</option>
                            <option value="highschool">High School</option>
                            <option value="secondaryschool">Secondary School</option>
                            <option value="bachelors">Bachelors</option>
                            <option value="masters">Masters</option>
                        </select>
                        <span>
                            <?php echo $educationlvlErr; ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="">Department: </label>
                        <select class="form-select" name="dept" id="">
                            <option selected>Select Dept.</option>
                            <option value="1">CSE</option>
                            <option value="3">MECH</option>
                            <option value="2">IT</option>
                            <option value="4">AGRI</option>
                        </select>
                        <span>
                            <?php echo $deptErr; ?>
                        </span>
                    </div>
                    <div class="col-6 py-3">
                        <!-- <label class="form-check-label" for="">Skills:</label> -->
                        Technical Skills <input class="form-check-input" type="checkbox" name="skill[]"
                            value="Technical skills" id="ts" />
                        <label class="form-label" for="ts"></label>
                        Analytical Skills<input class="form-check-input" type="checkbox" name="skill[]"
                            value="Analytical skill" id="as" />
                        <!-- <label class="form-label" for="as"></label> -->
                        <span>
                            <?php echo $SkillsErr; ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="">Tel/Mob:</label>
                        <input class="form-control " type="number" name="mobNumber" maxlength="10"
                            value="<?php echo $mob; ?>" placeholder="xxxxxxxxxxx" />
                        <span>
                            <?php echo $mobErr; ?>
                        </span>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                name="add" style="height: 70px"></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>
                        <span>
                            <?php echo $addressErr; ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="">Upload Document</label>
                        <input class="form-control" type="file" name="file[]" id="" accept=".pdf" multiple>
                        <span>
                            <?php echo $folderLocationErr; ?>
                        </span>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="">Profile Pic</label>
                        <input class="form-control" type="file" name="profilepic" id="" accept=".jpg">
                        <span>
                            <?php //echo $folderLocationErr; ?>
                        </span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-6">
                        <input id="submit-btn" class="btn btn-success w-100" type="submit" name="submit">
                    </div>
                    <div class="col-6">
                        <input class="btn btn-info w-100" type="reset">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('document').ready(function () {

    });
</script>