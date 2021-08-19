<style>
    body {
        background-color: rgb(248, 248, 248) !important;
    }



    @media only screen and (max-width: 1302px) {
        .q {
            white-space: nowrap;
            width: 70px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    }

    /* Side bar  */
    .dashboard a {
        text-decoration: none;
    }

    .dashboard a:hover {
        text-decoration: none;
    }

    .dashboard .small-card .card {
        border: none;
    }

    .dashboard .small-card .color1 .card {
        background-color: #72b159;
        color: white;
    }

    .dashboard .small-card .color1 .card:hover {
        background-color: #5D9547;
        color: white;
    }

    .dashboard .small-card .color2 .card {
        background-color: #e46050;
        color: white;
    }

    .dashboard .small-card .color2 .card:hover {
        background-color: #d64230;
        color: white;
    }

    .dashboard .small-card .color2-1 .card {
        background-color: #29af77;
        color: white;
    }

    .dashboard .small-card .color2-1 .card:hover {
        background-color: #0d8a60;
        color: white;
    }

    .dashboard .small-card .color3 .card {
        background-color: #52bcdc;
        color: white;
    }

    .dashboard .small-card .color3 .card:hover {
        background-color: #2cadd4;
        color: white;
    }

    .dashboard .small-card .color4 .card {
        background-color: #f4ab43;
        color: white;
    }

    .dashboard .small-card .color4 .card:hover {
        background-color: #c37c16;
        color: white;
    }

    .dashboard .small-card .color5 .card {
        background-color: #437bf4;
        color: white;
    }

    .dashboard .small-card .color5 .card:hover {
        background-color: #163ec3;
        color: white;
    }

    .dashboard .small-card .color6 .card {
        background-color: #f443a4;
        color: white;
    }

    .dashboard .small-card .color6 .card:hover {
        background-color: #c3169e;
        color: white;
    }

    .dashboard .small-card .color7 .card {
        background-color: #f48443;
        color: white;
    }

    .dashboard .small-card .color7 .card:hover {
        background-color: #c35516;
        color: white;
    }

    .dashboard .big-card .card {
        border: none;
    }

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

    #sidebar .overflow {
        overflow-y: auto;
        height: 100vh;
    }

    #sidebar ::-webkit-scrollbar {
        width: 0;
    }


    #sidebar ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    #sidebar ::-webkit-scrollbar-thumb {
        background: #888;
    }

    #sidebar ::-webkit-scrollbar-thumb:hover {
        background: #555;
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
    .user-list a {
        color: #323b49;
        text-decoration: none;
    }

    .seller-list img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
    }

    .seller-list a {
        color: #323b49;
        text-decoration: none;
    }

    .table td {
        vertical-align: middle;
    }

    .list a {
        color: #323b49;
        text-decoration: none;
    }

    .list img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }

    div.b {
        white-space: nowrap;
        width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .deatail_page h5 {
        line-height: 36px;
        color: #323b49;
        font-size: 20px;
    }

    .deatail_page .order {
        font-size: 12px;
        color: #00b517;
    }

    .deatail_page .price {
        line-height: 30px;
        font-size: 18px;
        margin-top: 10px;
        margin-bottom: 10px;
        font-weight: 500;
    }

    .deatail_page .des {
        line-height: 30px;
        overflow-y: auto;
        max-height: 150px;
        font-size: 16px;
    }

    .deatail_page strong {
        font-weight: 500;
    }

    .deatail_page .wrapper {
        max-height: 400px;
        display: flex;
        overflow-x: auto;
    }

    .deatail_page .wrapper .Item img {
        height: 100px;
        width: 300px;
        object-fit: contain;
    }

    .deatail_page .wrapper::-webkit-scrollbar {
        height: 5px;
        width: 10px;
    }

    .color-o {
        color: orangered;
    }

    .deatail_page img {
        height: 500px;
    }

</style>
