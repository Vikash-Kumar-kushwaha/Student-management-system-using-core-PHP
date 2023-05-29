<style>
    .navbar li {
        list-style: none;
        position: relative;
        margin: 0;
        padding: 0;
        overflow: hidden;
        /* background-color: #666666; */
    }

    .navbar li a {
        display: block;
        color: white;
        text-align: center;
        padding: 6px 22px;
        text-decoration: none;
    }

    /* .dropdown-content {
        display: none;
    } */

    .dropdown:focus+.dropdown-content {
        display: block;
    }
</style>



<div class="container border border-primary m-0 p-0 bg-info overflow-hidden  vh-100" id="sidebar-container"
    style="width:200px;position:absolute;z-index:2">
    <div class="row px-2">
        <div class="col-12 d-flex shadow p-3 mb-1 rounded align-items-center"><a
                class="text-white text-decoration-none fs-6" href="index.php">home</a></div>
        <div class="col-12 d-flex shadow p-3 mb-1 rounded flex-column "><a class="text-white text-decoration-none fs-6"
                href="index.php?page=totalDeptCount">Department</a>
        </div>
        <div class="col-12 d-flex shadow p-3 mb-1 rounded align-items-center"><a
                class="text-white text-decoration-none fs-6" href="">item-3</a></div>
        <div class="col-12 d-flex shadow p-3 mb-1 rounded align-items-center"><a
                class="text-white text-decoration-none fs-6" href="">item-4</a>
        </div>
    </div>
</div>