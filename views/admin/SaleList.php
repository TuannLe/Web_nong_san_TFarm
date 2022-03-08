<?php
include '../../Classes/admin/sale.php';
?>

<?php
$sale = new sale();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nameSale = filter_input(INPUT_POST, 'nameSale');
    $discount = filter_input(INPUT_POST, 'discount');
    $description = filter_input(INPUT_POST, 'description');

    $insertSale = $sale->insert_sale($nameSale, $description, $discount);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteSale = $sale->delete_sale($id);
}
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
    <?php
    include '../../inc/admin/sidebar.php';
    ?>
    <div class="container">
        <div class="grid">
            <div class="OrderList-wrap">
                <div class="row m-gutter">
                    <div class="col l-12 m-12 c-12">
                        <div class="OrderList">
                            <div class="OrderList-heading">
                                <h4 class="OrderList-heading__title">
                                    Danh sách khuyến mãi
                                </h4>
                                <div class="productList__heading-button-wrap">
                                    <button class="btn--delete">
                                        <i class='bx bx-minus-circle'></i>
                                        Xóa
                                    </button>
                                    <button class="productList__heading-button--add js-productList__heading-button--add">
                                        <i class='bx bx-plus-circle'></i>
                                        Thêm mới
                                    </button>
                                </div>
                            </div>
                            <div class="OrderList-body">
                                <table id="table_id" class="table-bordered display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <td style='font-weight: 500; font-size:1.6rem'>ID</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Tên khuyến mãi</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Mô tả</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Giá trị khuyến mãi</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Ngày bắt đầu</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Hoạt động</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get_sale = $sale->get_sale();
                                        if ($get_sale) {
                                            foreach ($get_sale as $data) {
                                        ?>
                                                <tr>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['IdSale'] ?></span></td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['NameSale'] ?></td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['DescripSale'] ?></td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['Percent'] . '%' ?></td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['DateStart'] ?></td>
                                                    <td>
                                                        <a href="EditSale.php?saleId=<?php echo  $data['IdSale'] ?>" title="Chỉnh sửa" class="icon"><i class='action__icon--edit  bx bx-edit'></i></a>
                                                        <a href="?delete=<?php echo $data['IdSale'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../inc/admin/footer.php';
    ?>

    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-container__heading">
                <h4 class="modal-container__heading-title">
                    Thêm khuyến mãi
                </h4>
            </div>
            <form action="SaleList.php" method="post">
                <div class="modal-container__body">
                    <div class="modal-container__body-wrap">
                        <label for="nameSale" class="modal-container__body-span">Tên khuyến mãi:</label>
                        <input id="nameSale" type="text" class="modal-container__body-input" name="nameSale">
                    </div>
                    <div class="modal-container__body-wrap">
                        <label for="discount" class="modal-container__body-span">Giá trị:</label>
                        <input id="discount" type="text" class="modal-container__body-input" name="discount">
                    </div>
                    <div class="modal-container__body-wrap">
                        <div class="modal-container__body-description">
                            <label class="modal-container__body-span">Mô tả:</label>
                            <textarea name="description" id="editor1"></textarea>
                            <script>
                                CKEDITOR.replace('editor1', {
                                    width: '100%',
                                    height: 100,
                                });
                            </script>
                        </div>
                    </div>
                    <div class="modal-container__body-action">
                        <button class="btn btn--close js-modal-container__body-action-button--back">
                            Trở về
                        </button>
                        <button class="btn btn--primary">
                            Thêm
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../../public/admin/js/script.js"></script>
    <script src="../../public/admin/js/productList.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 15, 20]
            });
        });
    </script>
</body>

</html>