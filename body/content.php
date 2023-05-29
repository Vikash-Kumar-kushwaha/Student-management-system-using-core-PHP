<?php

if (isset($_SESSION['id'])) {
} else {
    header('Location:index.php');
}
$result = null;
function sorting($sortingPage = null)
{
    $result = null;
    print_r($sortingPage);
    if (isset($sortingPage)) {
        if (isset($_POST['idAsc'])) {
            $idascQuery = "SELECT * FROM student1,department where student1.dept_id='$sortingPage' AND department.dept_id=student1.dept_id ORDER BY student1.studid ASC";
            $result = WebContent::executeQuery($idascQuery);
        } elseif (isset($_POST['idDesc'])) {
            $iddescQuery = "SELECT * FROM student1,department where student1.dept_id='$sortingPage' AND department.dept_id=student1.dept_id ORDER BY student1.studid DESC";
            $result = WebContent::executeQuery($iddescQuery);
        } elseif (isset($_POST['nameAsc'])) {
            $namedescQuery = "SELECT * FROM student1,department where student1.dept_id='$sortingPage' AND department.dept_id=student1.dept_id ORDER BY student1.studName ASC";
            $result = WebContent::executeQuery($namedescQuery);
        } elseif (isset($_POST['nameDesc'])) {
            $namedescQuery = "SELECT * FROM student1,department where student1.dept_id='$sortingPage' AND department.dept_id=student1.dept_id ORDER BY student1.studName DESC";
            $result = WebContent::executeQuery($namedescQuery);
        }
    } else {
        if (isset($_POST['idAsc'])) {
            $idascQuery = "SELECT * FROM student1,department where student1.dept_id=department.dept_id ORDER BY student1.studid ASC";
            $result = WebContent::executeQuery($idascQuery);
        } elseif (isset($_POST['idDesc'])) {
            $iddescQuery = "SELECT * FROM student1,department where student1.dept_id=department.dept_id ORDER BY student1.studid DESC";
            $result = WebContent::executeQuery($iddescQuery);
        } elseif (isset($_POST['nameAsc'])) {
            $namedescQuery = "SELECT * FROM student1,department where student1.dept_id=department.dept_id ORDER BY student1.studName ASC";
            $result = WebContent::executeQuery($namedescQuery);
        } elseif (isset($_POST['nameDesc'])) {
            $namedescQuery = "SELECT * FROM student1,department where student1.dept_id=department.dept_id ORDER BY student1.studName DESC";
            $result = WebContent::executeQuery($namedescQuery);
        }
    }
    return $result;
}



if (isset($_POST['idAsc']) || isset($_POST['idDesc']) || isset($_POST['nameAsc']) || isset($_POST['nameDesc'])) {
    $dept = null;
    if (isset($_GET['dept'])) {
        $dept = $_GET['dept'];
        $result = sorting($dept);
    } else {
        $result = sorting($dept);
    }
} elseif (isset($_GET['dept'])) {
    $dept_get_id = $_GET['dept'];
    $simpleQuery = "SELECT * FROM student1,department where student1.dept_id='$dept_get_id' AND department.dept_id=student1.dept_id";
    $result = WebContent::executeQuery($simpleQuery);

} else {
    $simpleQuery = "SELECT * FROM student1,department where student1.dept_id=department.dept_id";
    $result = WebContent::executeQuery($simpleQuery);
}

if (isset($_POST["deleteuser"]) && isset($_POST["user_id"]) && $_POST["user_id"] > 0) {
    $sql = "delete from student1 where studid = " . $_POST["user_id"];
    $deleteDone = mysqli_query($conn, $sql);

    if ($deleteDone) {
        echo "<script>window.location.href='index.php'</script>";
        die;
    }

}

?>
<style>
    #arrow-btn:hover {
        background-color: burlywood !important;
        border: 1 solid black !important;
        border-radius: 2px !important;
    }
</style>

<div class="container " id="main" style="margin-left:12.4rem; position:absolute;">
    <div
        class="addstud shadow p-3 my-2 bg-white rounded bg-body shadow d-flex align-items-center justify-content-between">
        <div class="input-group" style="width:20rem">
            <input type="text" id="searchInput" class="form-control" placeholder="">
            <span class="input-group-text">Search</span>
        </div>
        <h3 class="student-info text-center text-info" style="cursor:pointer;">Slide Up</h3>
        <!-- <div class="text-center flex-grow-1  fs-4">Student information</div> -->
        <button class="btn btn-info">
            <a class="text-decoration-none text-white" href="index.php?page=registration">Add New Student</a>
        </button>
    </div>

    <div class="tableData">
        <form action="" method="post">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Stud.id
                            <input id="arrow-btn" class="bg-body border-0 p-0 " type="submit" value="↑" name="idAsc">
                            <input id="arrow-btn" class="bg-body border-0 p-0 " type="submit" value="↓" name="idDesc">
                        </th>
                        <th scope="col">StudName
                            <input id="arrow-btn" class="bg-body border-0 p-0 " type="submit" value="↑" name="nameAsc">
                            <input id="arrow-btn" class="bg-body border-0 p-0 " type="submit" value="↓" name="nameDesc">
                        </th>
                        <th class="hide-column" scope="col">fatherName</th>
                        <th class="hide-column" scope="col">Date Of Birth</th>
                        <th class="hide-column" scope="col">Dept</th>
                        <th scope="col">uploadfile</th>
                        <th scope="col">View</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($info = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td data-student-id="<?php echo $info['studid']; ?>" scope="row">
                                <?php echo "{$info['studid']}" ?>
                            </td>
                            <td data-stud-name="<?php echo "{$info['StudName']}" ?>" scope="row" id="student_name">
                                <?php echo "{$info['StudName']}" ?>
                            </td>
                            <td data-father-name="<?php echo "{$info['fatherName']}" ?>" class="hide-column" id="hide"
                                scope="row">
                                <?php echo "{$info['fatherName']}" ?>
                            </td>
                            <td style="display: none;" data-mother-name="<?php echo $info['motherName']; ?>"></td>
                            <td data-dob="<?php echo "{$info['dob']}" ?>" class="hide-column" id="hide" scope="row">
                                <?php echo "{$info['dob']}" ?>
                            </td>
                            <td style="display: none;" data-gender="<?php echo $info['gender']; ?>"></td>
                            <td style="display: none;" data-mail="<?php echo $info['mail']; ?>"></td>
                            <td style="display: none;" data-education-lvl="<?php echo $info['educationlvl']; ?>"></td>
                            <td data-dept-id="<?php echo $info['dept_id']; ?>"
                                data-dept-name="<?php echo "{$info['dept_name']}" ?>" class="hide-column" id="dept_name"
                                scope="row">
                                <?php echo "{$info['dept_name']}" ?>
                            </td>
                            <!-- <td style="display: none;" data-dept-id="<?php //echo $info['dept_id']; ?>"></td> -->
                            <td style="display: none;" data-mob="<?php echo $info['mob']; ?>"></td>
                            <td style="display: none;" data-addr="<?php echo $info['addr']; ?>"></td>
                            <td style="display: none;" data-profile-pic="<?php echo $info['profilePic']; ?>"></td>
                            <td scope="row">
                                <?php if (!empty($info['uploadfile'])):
                                    $arrFile = explode(",", $info['uploadfile']);
                                    foreach ($arrFile as $key => $value) {
                                        $file_name = basename($value);

                                        ?>
                                        <a class="btn btn-success py-1 px-1" title="Download file" href="{$value}"
                                            download="<?php echo $file_name; ?>">
                                            <img class="text-white" src="./upload/file-earmark-arrow-down.svg" alt="svg image">
                                            <?php //echo $file_name; ?>
                                        </a>
                                    <?php } ?>
                                <?php else:
                                    // echo $info['uploadfile']; ?>
                                    No file available
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="eye-btn border-0 bg-body"
                                    data-student-id="<?php echo $info['studid']; ?>"><i class="fas fa-eye"></i></button>
                            </td>
                            <td scope="row">
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="user_id" value="<?php echo $info['studid']; ?>">
                                    <button class="btn btn-danger btn-sm" type="submit" name="deleteuser" value="deleteuser"
                                        onclick="return confirm('Are you sure you want to delete this item?')"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                                <!-- <a id="openButton" class="text-white btn btn-sm btn-success text-decoration-none"
                                    href="index.php?page=update&studentid=<?php //echo $info['studid']; ?>"> -->
                                <button type="submit" id="openButton" data-student-id="<?php echo $info['studid']; ?>"
                                    class="btn dialogbtn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    <?php // include('body/studentCard.php') ?>
</div>

<script>
    $(document).ready(function () {
        // let flag = 0;
        // $('.eye-btn').click(function (event) {
        //     event.preventDefault();
        //     // $(this).closest('tr').find('.hide-column').toggle();
        //     $(this).closest('tr').find('.hide-column').fadeToggle(500);
        //     // $(this).closest('tr').find('.hide-column').animate({
        //     //     width: 'toggle'
        //     // });

        //     if (flag == 0)
        //         // $(this).closest('table').find('thead th.hide-column').toggle();
        //         $(this).closest('table').find('thead th.hide-column').fadeToggle("slow");
        //     flag++;
        // });
        // $('.student-info').css({ "cursor": "pointer" });
        // $('.student-info').click(function () {
        //     $('.tableData').slideToggle("slow")
        // })
        // $('.hide-column').hide();


        $("#searchInput").on("keyup", function () {
            console.log("clicked");
            var searchTerm = $(this).val().toLowerCase();
            $("table").find("tbody tr").each(function (index, row) {
                // var rowData = $(row).text().toLocaleLowerCase();
                // var match = rowData.indexOf(searchTerm) > -1;
                // $(row).toggle(match);

                var nameColumn = $(row).find('td:nth-child(2)');
                var rowData = nameColumn.text().toLowerCase();
                var match = rowData.indexOf(searchTerm) > -1;
                $(row).toggle(match);
            })
        })
    });
</script>