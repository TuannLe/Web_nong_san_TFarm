<?php
include '../../Classes/admin/order.php';
?>

<?php
$order = new order();

// if (isset($_GET['delete'])) {
//   $id = $_GET['delete'];
//   $deleteSupplier = $supplier->delete_supplier($id);
// }
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
                  Danh sách đơn hàng
                </h4>
                <div class="OrderList-heading-action">
                  <select id="chon" onChange="ajax();" class="OrderList-heading-action__select">
                    <option value="">Tất cả</option>
                    <option value="1">Chưa duyệt</option>
                    <option value="2">Đang giao</option>
                    <option value="4">Đã hủy</option>
                    <option value="3">Hoàn thành</option>
                  </select>
                  <button class="btn--delete">
                    <i class='bx bx-minus-circle'></i>
                    Xóa
                  </button>
                  <script>
                    function ajax() {
                      var obj = document.getElementById("OrderList");
                      // obj.style.display = "block";
                      value = document.getElementById("chon").value;
                      var xml = new XMLHttpRequest();

                      xml.onreadystatechange = function() {
                        if (xml.readyState == 4)
                          obj.innerHTML = xml.responseText;
                      }
                      url = '../../Classes/admin/OrderDetail.php?chon=' + value;
                      xml.open('GET', url, false);
                      xml.send();
                    }
                  </script>
                </div>
              </div>
              <div class="OrderList-body">

                <table id="table_id" class="table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <td style='font-weight: 500; font-size:1.6rem'>ID</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Tên khách hàng</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Tổng tiền</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Địa chỉ</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Số điện thoại</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Thời gian</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Trạng thái</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Hoạt động</td>
                    </tr>
                  </thead>
                  <tbody id='OrderList'>
                    <?php
                    $show_order = $order->get_order();
                    if ($show_order) {
                      foreach ($show_order as $result) {
                    ?>
                        <tr>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['IdOrder'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['Username'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['Total'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['AddressOrder'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['PhoneOrder'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['DateOrder'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'>
                            <?php
                            if ($result['StatusOrder'] == 1)
                              echo 'Chưa duyệt';
                            else if ($result['StatusOrder'] == 2)
                              echo 'Đang giao';
                            else if ($result['StatusOrder'] == 3)
                              echo 'Giao thành công';
                            else if ($result['StatusOrder'] == 4)
                              echo 'Đã hủy';
                            ?>
                          </td>
                          <td>
                            <a href="EditOrder.php?orderId=<?php echo $result['IdOrder'] ?>" title="Xem chi tiết" class="icon"><i class='action__icon--eye bx bx-low-vision'></i></a>
                            <a href="?delete=<?php echo $result['IdOrder'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
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

  <!-- <script>
    $(function() {
      $("button").click(function() {
        var id = $(this).text();
      });

    });
  </script> -->

  <script src="../../public/admin/js/script.js"></script>
  <!-- <script src="../../public/admin/js/orderList.js"></script> -->
  <script>
    $(document).ready(function() {
      $('#table_id').DataTable({
        "pageLength": 10,
        "lengthMenu": [10, 15, 20, 30]
      });
    });
  </script>

</body>

</html>