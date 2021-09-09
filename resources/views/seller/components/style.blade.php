<style>
    .cs-shadow {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .header-card .card {
        height: 150px !important;
    }

    .table thead th {
        font-size: 15px;
        font-weight: 500;
        vertical-align: bottom;
    }

    .card1 .card .card-header {
        background-color: #72b159 !important;
    }

    .card2 .card .card-header {
        background-color: #e46050 !important;
    }

    .card3 .card .card-header {
        background-color: #52bcdc !important;
    }

    .card4 .card .card-header {
        background-color: #f48443 !important;
    }

    body {
        background-color: #f6f7fa !important;
    }

    .dashboard a {
        text-decoration: none;
    }

    .dashboard .bg-light {
        background-color: #ffffffd2 !important;
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

    .bg-dark {
        background-color: #313846 !important;
    }

    #sidebar .header a {
        color: white;
        text-decoration: none;
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
        object-fit: contain;
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
    /*seller profile */
    .background-color {
        background: #f1f1f1ce;
        border-radius: 5px;
    }

    .profile-column img {
        max-height: 250px;
        width: 350px;
        object-fit: contain;
        border-radius: 5px;
    }

    .profile-column .card {
        height: 320px;
    }

    .profile-text-style label {
        font-size: 16px;
        color: #006FBF;
        cursor: pointer;
    }

    .seller-info .card {
        height: 320px;
    }

    .seller-info .card h1 {
        font-size: 22px;
        color: #006FBF;
    }

    .seller-info .card .shop-info h1 {
        font-size: 20px;
        font-weight: 30px;
        color: #000000;
    }

    .seller-info .card .shop-info p {
        font-size: 17px;
        font-weight: 30px;
        color: #222222;
    }

    .seller-address .address h1 {
        font-size: 22px;
        color: #006FBF;
    }

    .seller-address .address-info h1 {
        font-size: 20px;
        font-weight: 30px;
        color: #000000;
    }

    .seller-address .address-info p {
        font-size: 17px;
        font-weight: 30px;
        color: #222222;
    }

    /*end seller profile */
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
        height: 50px !important;
        vertical-align: middle;
    }


    input[type="file"] {

        display: block;
    }

    .imageThumb {
        max-height: 75px;
        border: 2px solid;
        margin: 10px 10px 0 0;
        padding: 1px;
    }

    input[type="file"] {
        display: block;
    }

    .imageThumb {
        max-height: 75px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
    }

    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }

    .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
    }

    .remove:hover {
        background: white;
        color: black;
    }

    .sellerImg {
        object-fit: contain;
    }

    .seller-order img {
        object-fit: contain;
    }

    .product-list img {
        width: 100px;
        height: 60px;
        object-fit: contain;
        border-radius: 5px;
    }

    .product-list a {
        color: #323b49;
        text-decoration: none;
    }

    .category a {
        color: #323b49
    }

    .category a:hover {
        color: #FFA79B;
        text-decoration: none;
    }

    div.b {
        white-space: nowrap;
        width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* .....  */
    .previewImage .imagePreview2 {
        width: 100%;
        height: 150px;
        background-position: center center;
        background-color: #fff;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: inline-block;
        position: relative;
        -moz-box-shadow: 0 0 3px #ccc;
        -webkit-box-shadow: 0 0 3px #ccc;
        box-shadow: 0 0 3px #ccc;
    }

    .previewImage .imagePreview {
        width: 100%;
        height: 150px;
        background-position: center center;
        background-color: #fff;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        display: inline-block;
        position: relative;
        -moz-box-shadow: 0 0 3px #ccc;
        -webkit-box-shadow: 0 0 3px #ccc;
        box-shadow: 0 0 3px #ccc;
    }

    .previewImage .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .previewImage .btn-dark {
        display: block;
        border-radius: 5px;
        width: 100%;
        opacity: 0.5;
    }

    .previewImage .imgUp {
        margin-bottom: 15px;
    }

</style>
