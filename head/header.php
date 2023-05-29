<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <script>
        $('document').ready(function () {

            $('.dialogbtn').click(function (e) {
                e.preventDefault();

                // GET data for form
                var targetPathTd = $(this).parent();
                var student_id = targetPathTd.siblings("td[data-student-id]").data("student-id");
                var student_name = targetPathTd.siblings("td[data-stud-name]").data("stud-name");
                var father_name = targetPathTd.siblings("td[data-father-name]").data("father-name");
                var mother_name = targetPathTd.siblings("td[data-mother-name]").data("mother-name");
                var dob = targetPathTd.siblings("td[data-dob]").data("dob");
                var gender = targetPathTd.siblings("td[data-gender]").data("gender");
                var email = targetPathTd.siblings("td[data-mail]").data("mail");
                var education_lvl = targetPathTd.siblings("td[data-education-lvl]").data("education-lvl");
                var mob = targetPathTd.siblings("td[data-mob]").data("mob");
                var dept_id = targetPathTd.siblings("td[data-dept-id]").data("dept-id");
                var addr = targetPathTd.siblings("td[data-addr]").data("addr");
                // console.log(gender);


                // SET data in form
                var ele = $("#myModal");

                var trg = ele.find("form").children().children(".row").children(".col-6");

                trg.children("input[name=Studid]").val(student_id);
                trg.children("input[name=FullName]").val(student_name);
                trg.children("input[name=fathername]").val(father_name);
                trg.children("input[name=mothername]").val(mother_name);
                trg.children("input[name=dateofbirth]").val(dob);

                if (gender === 'male') {
                    $('#m').prop('checked', true);
                    $('#f').prop('checked', false);
                } else if (gender === 'female') {
                    $('#m').prop('checked', false);
                    $('#f').prop('checked', true);
                } else {
                    $('#m').prop('checked', false);
                    $('#f').prop('checked', false);
                }
                trg.children("input[name=Email]").val(email);
                trg.children("select[name=edulevel]").val(education_lvl);
                trg.children("select[name=dept]").val(dept_id);
                trg.children("input[name=mobNumber]").val(mob);
                trg.children().children("textarea[name=add]").val(addr);


                $('#myModal').show();
            });

            $('.close').click(function () {
                $('#myModal').hide();
            });


            $(".eye-btn").click(function (e) {
                e.preventDefault();

                //get data for card

                var targetPathTd = $(this).parent();
                var profile_pic = targetPathTd.siblings("[data-profile-pic]").data("profile-pic");
                var student_name = targetPathTd.siblings("td[data-stud-name]").data("stud-name");
                var father_name = targetPathTd.siblings("td[data-father-name]").data("father-name");
                var dept_name = targetPathTd.siblings("td[data-dept-name]").data("dept-name");
                var mother_name = targetPathTd.siblings("td[data-mother-name]").data("mother-name");
                var dob = targetPathTd.siblings("td[data-dob]").data("dob");

                var gender = targetPathTd.siblings("td[data-gender]").data("gender");

                //set data into card

                var ele = $("#myModal2").children().children().children(".info-card");
                ele.children().children("img").attr("src", profile_pic);
                ele.children().children().children("#student_name").html("<strong>Name:</strong> " + student_name);
                ele.children().children().children("#father_name").html("<strong> Father Name:</strong> " + father_name);
                ele.children().children().children("#mother_name").html("<strong>Mother Name:</strong> " + mother_name);
                ele.children().children().children("#dob").html("<strong>DOB:</strong> " + dob);
                ele.children().children().children("#dept").html("<strong>Dept:</strong> " + dept_name);
                ele.children().children().children("#gender").html("<strong>Gender:</strong> " + gender);



                $('#myModal2').show();
            });

            $('.close-2').click(function () {
                $('#myModal2').hide();
            });


            $('.student-info').click(function () {

                $(".tableData").slideToggle(500);
            });
        });
    </script>
    <title>Student Management System</title>
</head>