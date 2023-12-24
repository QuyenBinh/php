<header style="padding: 0 10%;background: #ffffff;position: sticky;top: 0;z-index: 100;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #ffffff !important;">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="justify-content: space-between;">
            <a class="navbar-brand" href="#"><img alt="" src="./images/header-logodtv3.png"></a>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="Tìm kiếm" placeholder="Search" aria-label="Search"
                       style="width:500px;border-radius:unset;height:44px">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"
                        style="height:44px;background-color:#21409a;width:70px"><i class="fa fa-search"></i></button>
            </form>
            <?php
            if (!isset($_SESSION)) {
                session_start();
            }
            if (isset($_SESSION['username']) && $_SESSION['loged'] === true) {
//                ?>
                <ul class="navbar-nav mr-auto" style = "margin-right: unset!important;">
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                           data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style = "font-weight: 700;">
                            <?php
                            echo $_SESSION['username'] ?>
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='/bttonghop/component/logout.php' style = "padding-left: 20px !important;ư">Logout</a>
                        </div>
                    </li>
                </ul>
                <?php
            } else {
                $html = "<div class='language'>
                            <a href='/bttonghop/component/login.php?page=login' title='login' target='' class = 'lg'>Đăng nhập</a>
                         <a class='' href='/bttonghop/component/register.php?page=register' title='Sinup' target='' style = 'color: #090909;'>Đăng ký</a>
                         </div>";
                echo $html;
            }
            ?>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"
         style="background-color: #ffffff !important;border-top: solid 1px;padding-top: 20px;padding-bottom: 20px;">
        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: space-around;">
            <ul class="navbar-nav" style="padding: 0 20px;border-right: solid 1px;">
                <li class="nav-item menu">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        Về Duy Tân
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav" style="padding: 0 20px;border-right: solid 1px;">
                <li class="nav-item dropdown menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <div class="dropdown-menu" style = "padding: 10px 20px;" aria-labelledby="navbarDropdownMenuLink123">
                        <a class="dropdown-item" href="#">Sản phẩm gia đình</a>
                        <a class="dropdown-item" href="#">Sản phẩm PET</a>
                        <a class="dropdown-item" href="#">Sản phẩm nội thất</a>
                        <a class="dropdown-item" href="#">Sản phẩm 2 màu</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav" style="padding: 0 20px;border-right: solid 1px;">
                <li class="nav-item menu">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        E-Catalogues
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav" style="padding: 0 20px;border-right: solid 1px;">
                <li class="nav-item dropdown menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Thư viện
                    </a>
                    <div class="dropdown-menu" style = "padding: 10px 20px;" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Hình Ảnh</a>
                        <a class="dropdown-item" href="#">Video</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav" style="padding: 0 20px;border-right: solid 1px;">
                <li class="nav-item menu">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        Phân phối
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav" style="padding: 0 20px;border-right: solid 1px;">
                <li class="nav-item dropdown menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Tin tức - Sự Kiện
                    </a>
                    <div class="dropdown-menu" style = "padding: 10px 20px;" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Hoạt động</a>
                        <a class="dropdown-item" href="#">Sản phẩm</a>
                        <a class="dropdown-item" href="#">Khuyến mãi</a>
                        <a class="dropdown-item" href="#">Tuyển dụng</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav" style="padding: 0 20px;border-right: solid 1px;">
                <li class="nav-item menu">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        Mua hàng online
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item menu">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" style="padding-left: 20px !important;">
                        Liên hệ
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
