<style>
    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #4b7095;
        color: #fff;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        position: relative;
    }

    #sidebar ul li {
        list-style: none;
        padding: 15px;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    #sidebar ul li a {
        padding: 5px 0;
        display: block;
        color: white;
        text-decoration: none;
    }

    #sidebar.active .custom-menu {
        margin-right: -50px;
    }

    #sidebar ul li>ul {
        margin-left: 35px;
    }

    #sidebar ul li>ul li {
        font-size: 14px;
    }

    #sidebar .custom-menu {
        display: inline-block;
        position: absolute;
        top: 20px;
        right: 0;
        margin-right: -20px;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
    }

    #sidebar .custom-menu .btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    #sidebar .custom-menu .btn.btn-primary {
        background: #385470;
        border-color: #385470;
    }

    #sidebar .custom-menu .btn.btn-primary:hover,
    #sidebar .custom-menu .btn.btn-primary:focus {
        background: #385470 !important;
        border-color: #385470 !important;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 0;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    #content {
        width: 100%;
        padding: 0;
        min-height: 100vh;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    #sidebar img {
        width: 184px;
        height: 138px;
        border-radius: 5px;
    }

    * {
        font-family: "Poppins", sans-serif;
    }

    #sidebar ul li a img {
        width: 25px;
        height: 25px;
    }

    #sidebar ul li a .ac {
        color: #FFA79B;
    }

    .cs-dropdown {
        font-size: 14px;
    }

    /* end side bar */

    .background-color {
        background: #EDEBFA;
        margin: auto;
        border-radius: 10px;
    }

    .profile-column img {
        height: 220px;
        object-fit: cover;
        border-radius: 5px;
    }

    .profile-column .card {
        height: 320px;
    }

    .seller-info .card {
        height: 320px;
    }

    .seller-info .card h1 {
        font-size: 22px;
        color: #0049B6;
    }

    .seller-info .card .shop-info h1 {
        font-size: 18px;
        font-weight: 400;
        line-height: 30px;
        color: #000000;
    }

    .address .card h1 {
        font-size: 22px;
        color: #0049B6;
    }

    .address .card .address-info h1 {
        font-size: 18px;
        font-weight: 400;
        line-height: 30px;
        color: #000000;
    }

    .category .card {
        height: 300px;
    }

    .category .card img {
        height: 220px;
        object-fit: cover;
        border-radius: 5px;
    }

    .category h1 {
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        color: #19252e;
    }

    table {
        table-layout: fixed !important;
    }

    table td {
        overflow: hidden !important;
    }

    .container {
        max-width: 900px;
    }

    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    }

    .msg .card {
        height: 200px;
    }

    .table td {
        vertical-align: middle;
    }

</style>
