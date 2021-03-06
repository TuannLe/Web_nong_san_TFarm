<?php
include_once '../../Classes/web/web.php';
include_once '../../Classes/admin/category.php';
$web = new website();
$category = new category();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../public/web/css/style.css">
    <link rel="stylesheet" href="../../public/web/css/grid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <?php
    $get_logo = $web->get_web();
    if ($get_logo) {
        foreach ($get_logo as $data) {
    ?>
        <title><?php echo $data['webname'] ?></title>
        <link rel="shortcut icon" type="image/png" href="../../public/admin/Image/web/<?php echo $data['favicon'] ?>" />
    <?php
        }
    }
    ?>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid wide">
                <nav class="navbar">
                    <?php
                    $get_logo = $web->get_web();
                    if ($get_logo) {
                        foreach ($get_logo as $data) {
                    ?>
                            <div class="nav__logo">
                                <a href="#" class="nav__logo-link"><img src="../../public/admin/Image/web/<?php echo $data['logo'] ?>" alt="logo" class="nav__logo--img"></a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <ul class="nav__list"> 
                        <li class="nav__item nav__item--active">
                            <a href="#" class="nav__item-link">Trang ch???</a>
                        </li>
                        <li class="nav__item">
                            <a href="#category" class="nav__item-link">Th??ng tin</a>
                        </li>
                        <li class="nav__item">
                            <a href="#strengths" class="nav__item-link">Th??? m???nh</a>
                        </li>
                        <li class="nav__item">
                            <a href="#product" class="nav__item-link">H??nh ???nh</a>
                        </li>
                        <li class="nav__item">
                            <a href="#introduce" class="nav__item-link">V??? ch??ng t??i</a>
                        </li>
                        <li class="nav__item">
                            <a href="#nutrition" class="nav__item-link">Dinh d?????ng</a>
                        </li>
                        <li class="nav__item">
                            <a href="#contact" class="nav__item-link">Li??n h???</a>
                        </li>
                    </ul>

                    <script>
                        let list = document.querySelectorAll('.nav__item');
                        for (let i = 0; i < list.length; i++) {
                            list[i].onclick = function() {
                                let j = 0;
                                while (j < list.length) {
                                    list[j++].className = 'nav__item';
                                }
                                list[i].className = 'nav__item nav__item--active';
                            }
                        }
                    </script>

                    <!-- Mobile + Tablet -->
                    <div class="nav-mobile-btn js-nav-mobile-btn">
                        <i class="nav-mobile-btn-icon fas fa-bars"></i>
                    </div>

                    <div class="nav__overlay js-nav__overlay"></div>

                    <nav class="nav-mobile js-nav-mobile">
                        <div class="nav-mobile-close js-nav-mobile-close">
                            <i class="fas fa-times"></i>
                        </div>
                        <ul class="nav-mobile-list">
                            <li class="nav-mobile-item nav-mobile-item--active">
                                <a href="#" class="nav-mobile-link">TRANG CH???</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#category" class="nav-mobile-link">TH??NG TIN</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#strengths" class="nav-mobile-link">TH??? M???NH</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#product" class="nav-mobile-link">H??NH ???NH</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#introduce" class="nav-mobile-link">V??? CH??NG T??I</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#nutrition" class="nav-mobile-link">DINH D?????NG</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#contact" class="nav-mobile-link">LI??N H???</a>
                            </li>
                        </ul>
                    </nav>

                    <script>
                        let list = document.querySelectorAll('.nav-mobile-item');
                        for (let i = 0; i < list.length; i++) {
                            list[i].onclick = function() {
                                let j = 0;
                                while (j < list.length) {
                                    list[j++].className = 'nav-mobile-item';
                                }
                                list[i].className = 'nav-mobile-item nav-mobile-item--active';
                            }
                        }
                    </script>
                </nav>
            </div>
        </header>
        <?php
        $title = 'Slider';
        $get_img = $web->get_img($title);
        if ($get_img) {
            foreach ($get_img as $data) {
        ?>
                <div id="slider" style="background-image: url('../../public/admin/Image/web/<?php echo $data['Img'] ?>')">
                    <div class="slider__text">
                        <div class="text-heading">t farm</div>
                        <div class="text-description">Trang tr???i rau s???ch l???n nh???t b???c trung b???</div>
                        <div class="text-footer">????p ???ng nhu c???u ng??y c??ng t??ng c???a ng?????i ti??u d??ng Vi???t Nam v??? n??ng s???n an to??n. T???o k??nh ph??n ph???i tr???c ti???p t??? nh?? s???n xu???t ?????n ng?????i ti??u d??ng cu???i c??ng.</div>
                        <button onclick="window.location.href='product.php'" class="slider__btn">Mua ngay</button>
                    </div>
                </div>
        <?php
            }
        }
        ?>

        <div class="app__container">
            <!-- Category -->
            <div class="grid wide" id="category">
                <div class="row category">
                    <?php
                    $get_category = $category->get_category();
                    if ($get_category) {
                        foreach ($get_category as $data) {
                    ?>
                            <div class="col l-4 m-4 c-12">
                                <div class="category__item">
                                    <div class="category__item-img" style="background-image: url('../../public/admin/Image/web/<?php echo $data['img'] ?>')"></div>
                                    <h4 class="category__item-name"><?php echo $data['NameCategory'] ?></h4>
                                    <span class="category__item-description"><?php echo $data['Title'] ?></span>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="session2" id="strengths">
                <?php
                $title = 'Session2';
                $get_img = $web->get_img($title);
                if ($get_img) {
                    foreach ($get_img as $data) {
                ?>
                        <div class="session2__left">
                            <div class="session2__img" style="background-image: url('../../public/admin/Image/web/<?php echo $data['Img'] ?>')"></div>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="session2__right">
                    <h4 class="session2__heading">L?? do ch???n ch??ng t??i</h4>
                    <p class="session2__title">Lu??n cung c???p s???n ph???m ch???t l?????ng v?? an to??n v??? sinh th???c ph???m c???a ng?????i ti??u d??ng</p>
                    <ul class="session2__list">
                        <li class="session2__item">
                            <h5 class="session2__item-name">1. Th??? m???nh 1</h5>
                            <span class="session2__item-description">C??c nh??m s???n ph???m lu??n d?????c tr???ng v???i quy tr??nh kh??p k??n theo ti??u chu???n qu???c t??? v?? ?????m b???o an to??n v??? sinh th???c ph???m cho ng?????i ti??u d??ng</span>
                        </li>
                        <li class="session2__item">
                            <h5 class="session2__item-name">2. Th??? m???nh 2</h5>
                            <span class="session2__item-description">Nh??m th???c ph???m c??ng ty cung c???p ?????m b???o t????i m???i v?? kh??ng s??? d???ng c??c nh??m ch???t h??a h???c, ph??n b??n h??a h???c</span>
                        </li>
                        <li class="session2__item">
                            <h5 class="session2__item-name">3. Th??? m???nh 3</h5>
                            <span class="session2__item-description">??a d???ng c??c ch???ng lo???i s???n ph???m nh???m ?????m b???o ????p ???ng m???i nhu c???u c???a ng?????i ti??u d??ng</span>
                        </li>
                        <li class="session2__item">
                            <h5 class="session2__item-name">4. Th??? m???nh 4</h5>
                            <span class="session2__item-description">???? ???????c kh???o s??t v?? ??at c??c ti??u chu???n ch???ng nh???n c???a c??c chuy??n gia trong quy tr??nh th???c ph???m s???ch</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Product -->
            <div class="grid wide" id="product">
                <h4 class="product__heading">H??nh ???nh s???n ph???m</h4>
                <div class="row product">
                    <?php
                    $get_img = $web->get_img_product();
                    if ($get_img) {
                        foreach ($get_img as $data) {
                    ?>
                            <div class="col l-3 m-6 c-12">
                                <div class="product__img" style="background-image: url('../../public/web/img/products/<?php echo $data['ProductImg1'] ?>');"></div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Introduce -->
            <div class="introduce__wrap" id="introduce">
                <div class="grid wide">
                    <div class="row introduce">
                        <?php
                        $title = 'Session4_a';
                        $get_img = $web->get_img($title);
                        if ($get_img) {
                            foreach ($get_img as $data) {
                        ?>
                                <div class="col l-4 m-12 c-12">
                                    <h4 class="introduce__heading">N??I V??? CH??NG T??I</h4>
                                    <img src='../../public/admin/Image/web/<?php echo $data['Img'] ?>' class="introduce__img"></img>
                                    <p class="introduce__title">Ch??? tr????ng kh??p k??n quy tr??nh s???n xu???t ????? rau ?????t chu???n VietGAP, Ch??ng t??i s???n xu???t gi???ng rau trong v??? x???p cung c???p cho x?? vi??n ?????ng th???i cung c???p nh???ng lo???i thu???c b???o v??? th???c v???t n???m trong danh m???c. S???n ph???m sau thu ho???ch, c??ng ty s?? ch??? v?? bao ti??u to??n b??? cho x?? vi??n. B???i v???y, rau c???a N??ng nghi???p l?? rau an to??n, c??ng ty t??? c??ng b??? ch???t l?????ng v?? ???????c c?? quan ki???m d???ch ch???ng nh???n.</p>
                                </div>
                        <?php
                            }
                        }
                        ?>

                        <div class="col l-4 m-12 c-12">
                            <ul class="introduce-list">
                                <li class="introduce-item">
                                    <div class="introduce-item__name">S??? m???nh</div>
                                    <span class="introduce-item__description">C??ng v???i s??? ph??t tri???n c???a n???n kinh t???, nhu c???u th???c ph???m an to??n, b???o v??? s???c kh???e ??ang ???????c ng?????i ti??u d??ng Vi???t Nam ng??y c??ng quan t??m nhi???u h??n. B??n c???nh ????, nh???ng s??? ki???n nh?? rau ???b???n???, th???c ph???m k??m ch???t l?????ng, tr??i c??y nhi???m ?????c, s??? gia t??ng c???a b???nh ung th??, v.v??? ???? ?????t ra v???n ????? c???p thi???t v??? ch???t l?????ng v?? an to??n v??? sinh th???c ph???m c???a ng?????i ti??u d??ng.</span>
                                </li>
                                <li class="introduce-item">
                                    <div class="introduce-item__name">N???i dung</div>
                                    <span class="introduce-item__description">Qu???ng b?? s???n ph???m n??ng s???n an to??n Vi???t Nam.Li??n k???t d??i h???n v?? ?????m b???o ?????u ra ???n ?????nh cho nh?? s???n xu???t n??ng s???n an to??n, g??p ph???n v??o s??? nghi???p ph??t tri???n ng??nh n??ng nghi???p Vi???t Nam.</span>
                                </li>
                                <li class="introduce-item">
                                    <div class="introduce-item__name">H??nh tr??nh</div>
                                    <span class="introduce-item__description">Ch??ng t??i ch???n con ???????ng g???n b?? v???i rau s???ch ???? L???t, b???i ????y ch??nh l?? th??? m???nh, l?? h?????ng ??i thu???n l???i v???i nh???ng x?? vi??n v???n l?? n??ng d??n chuy??n tr???ng rau. H??n 70 ha ?????t c???a x?? vi??n tham gia h???p t??c x?? ???????c x??c ?????nh tr???ng v?? cung c???p cho th??? tr?????ng rau VietGAP mang th????ng hi???u N??ng nghi???p.</span>
                                </li>
                            </ul>
                        </div>
                        <?php
                        $title = 'Session4_b';
                        $get_img = $web->get_img($title);
                        if ($get_img) {
                            foreach ($get_img as $data) {
                        ?>
                                <div class="col l-4 m-12 c-12">
                                    <div class="introduce-after">
                                        <div class="introduce-after2">
                                            <div class="introduce-child">
                                                <img class="introduce-child__img" src="../../public/admin/Image/web/<?php echo $data['Img'] ?>" alt="???nh">
                                                <h5 class="introduce-child__name">M?? h??nh hi???n ?????i</h5>
                                                <span class="introduce-child__description">V???i c??c quy tr??nh ch??m s??c hi???n ?????i theo ti??u chu???n th???c ph???m s???ch c???a qu???c t???.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- NUTRITION -->
            <div class="grid wide" id="nutrition">
                <h4 class="nutrition__heading">DINH D?????NG</h4>
                <div class="row nutrition">
                    <div class="col l-6 m-12 c-12">
                        <div class="nutrition__item">
                            <div class="row">
                                <div class="col l-6 m-4 c-12">
                                    <div class="nutrition__img" style="background-image: url(../../public/web/img/nutrition1.jpeg);"></div>
                                </div>
                                <div class="col l-6 m-8 c-12">
                                    <h5 class="nutrition__name">TH???C PH???M S???CH</h5>
                                    <p class="nutrition__title">Ngu???n cung ???ng th???c ph???m c?? xu???t ph??t ??i???m t??? c??c trang tr???i ch??n nu??i ?????t chu???n HACCP.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l-6 m-12 c-12">
                        <div class="nutrition__item">
                            <div class="row">
                                <div class="col l-6 m-4 c-12">
                                    <div class="nutrition__img" style="background-image: url(../../public/web/img/nutrition2.jpeg);"></div>
                                </div>
                                <div class="col l-6 m-8 c-12">
                                    <h5 class="nutrition__name">DINH D?????NG KHOA H???C</h5>
                                    <p class="nutrition__title">C??n b???ng dinh d?????ng v???i c??c lo???i tr??i c??y s??? gi??p c?? th??? lu??n c?? ????? kh??ng t??? nhi??n l??nh m???nh.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l-6 m-12 c-12">
                        <div class="nutrition__item">
                            <div class="row">
                                <div class="col l-6 m-4 c-12">
                                    <div class="nutrition__img" style="background-image: url(../../public/web/img/nutrition3.jpeg);"></div>
                                </div>
                                <div class="col l-6 m-8 c-12">
                                    <h5 class="nutrition__name">NGUY??N LI???U T??? NHI??N</h5>
                                    <p class="nutrition__title">Nguy??n li???u ???????c tr???ng t??? t??? nhi??n, gi???m thi???u t???i ??a c??c lo???i ho?? ch???t an to??n, t????i ngon.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l-6 m-12 c-12">
                        <div class="nutrition__item">
                            <div class="row">
                                <div class="col l-6 m-4 c-12">
                                    <div class="nutrition__img" style="background-image: url(../../public/web/img/nutrition4.jpeg);"></div>
                                </div>
                                <div class="col l-6 m-8 c-12">
                                    <h5 class="nutrition__name">QUY TR??NH KH??P K??N</h5>
                                    <p class="nutrition__title">T??? ?????ng ru???ng cho ?????n nh?? m??y ?????t chu???n n??ng nghi??p 4.0 ?????m b???o ngu???n cung t????i ngon.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
        include '../../inc/web/footer.php';
        ?>
    </div>

    <script src="../../public/web/js/index.js"></script>
</body>

</html>