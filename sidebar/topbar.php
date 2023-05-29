<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    echo "<script>window.location.href='index.php'</script>";
    exit();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="sidebar-btn btn btn-success"><i class="fas fa-bars"></i></button>
        <h2 class="text-center flex-grow-1">Student Management System</h2>
        <div class="dropdown">
            <button class="btn btn-body dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Department
            </button>
            <ul class="dropdown-menu p-0">
                <li class=""><a class="text-dark text-decoration-none fs-6 " href="index.php?dept=1">CSE</a></li>
                <li class=""><a class="text-dark text-decoration-none fs-6 " href="index.php?dept=3">MECH</a></li>
                <li class=""><a class="text-dark text-decoration-none fs-6 " href="index.php?dept=2">IT</a></li>
                <li class=""><a class="text-dark text-decoration-none fs-6 " href="index.php?dept=4">AGRI</a></li>
            </ul>
        </div>
        <form action="" method="post">
            <div class="top-nav">
                <button type="submit" class="btn btn-danger" name="logout">Logout</button>
            </div>
        </form>
    </div>
</nav>

<script>
    $('document').ready(function () {
        $('.sidebar-btn').click(function () {
            $('#sidebar-container').toggle(500);
            $('#main').toggleClass("main-container", 1000);
        })
    })
</script>