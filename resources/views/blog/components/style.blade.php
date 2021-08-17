<style>
    * {
        font-family: "Poppins", sans-serif;
    }

    body {
        min-height: 120vh;
    }

    .background-img {
        background-image: url("/images/blog/office.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        height: 300px;
    }

    .background-img h1 {
        font-style: normal;
        font-weight: 500;
        font-size: 36px;
        line-height: 108px;
        color: #EAF3FD;
    }

    .background-img .background-color {
        height: 300px;
        background: rgba(0, 0, 0, 0.4);
        opacity: 1;
    }

    p {
        font-weight: 400;
        font-size: 14px;
        line-height: 21px;
        color: #19252E;
    }

    .slider {
        position: relative;
        overflow: hidden;
    }

    .slider h1 {
        font-family: 'Zen Loop', cursive;
        font-family: 'Zen Tokyo Zoo', cursive;
        font-size: 36px;
        color: #EAF3FD;
    }

    .slider p {
        font-weight: normal;
        font-size: 16px;
        line-height: 24px;
        color: #ffffff;
        opacity: 0.8;
    }

    .navbar a {
        color: #19252E !important;
    }

    .inside-slides {
        height: 500px;
        background: rgba(0, 0, 0, 0.4);
        width: 100%;
        position: absolute;
    }

    .slides {
        width: 500%;
        height: 500px;
        display: flex;
    }

    .slides input {
        display: none;
    }

    .slide {
        width: 20%;
        transition: 1s;
    }

    .slide img {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .navigation-manual {
        position: absolute;
        margin-top: -40px;
        display: flex;
        justify-content: center;
    }

    .manual-btn {
        border: 2px solid #ffff;
        padding: 5px;
        border-radius: 10px;
        cursor: pointer;
        transition: 1s;
    }

    .manual-btn:not(:last-child) {
        margin-right: 20px;
    }

    .manual-btn:hover {
        background: #ffff;
    }

    #radio1:checked~.first {
        margin-left: 0;
    }

    #radio2:checked~.first {
        margin-left: -20%;
    }

    #radio3:checked~.first {
        margin-left: -40%;
    }

    .sticky-footer {
        top: 100%;
        position: sticky;
        height: 264px;
        background: #f8f9fa;
    }

    .sticky-footer h1 {
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 45px;
        color: #19252E;
    }

    footer ul li {
        padding: 5px 0px;
    }

    .money li a,
    .contact li a,
    .about li a {
        text-decoration: none;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 45px;
        color: #19252E;
    }

    .money,
    .contact,
    .about {
        list-style: none;
    }

    .earn h1 {
        font-style: normal;
        font-weight: normal;
        font-size: 30px;
        line-height: 45px;

        color: #19252E;
    }

    .btn-primary {
        background-color: #006FBF !important;
        border-color: #006FBF !important;
    }

    /* Chrome, Safari, Edge, Opera */
    #exampleInputPhone::-webkit-outer-spin-button,
    #exampleInputPhone::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    #exampleInputPhone[type=number] {
        -moz-appearance: textfield;
    }

</style>
