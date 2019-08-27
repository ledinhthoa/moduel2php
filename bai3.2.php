
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>
<body>
            <?php
            $customerlist = array(
                "1" => array("ten" => "Mai Văn Hoàn",
                    "ngaysinh" => "1983-08-20",
                    "diachi" => "Hà Nội",
                    "anh" => "images/img1.jpg"),
                "2" => array("ten" => "Nguyễn Văn Nam",
                    "ngaysinh" => "1983-08-20",
                    "diachi" => "Bắc Giang",
                    "anh" => "images/img2.jpg"),
                "3" => array("ten" => "Nguyễn Thái Hòa",
                    "ngaysinh" => "1983-08-21",
                    "diachi" => "Nam Định",
                    "anh" => "images/img3.jpg"),
                "4" => array("ten" => "Trần Đăng Khoa",
                    "ngaysinh" => "1983-08-22",
                    "diachi" => "Hà Tây",
                    "anh" => "images/img4.jpg"),
                "5" => array("ten" => "Nguyễn Đình Thi",
                    "ngaysinh" => "1983-08-17",
                    "diachi" => "Hà Nội",
                    "anh" => "images/img5.jpg")  );

            function searchByDate($customers, $from_date, $to_date) {
                if(empty($from_date) && empty($to_date)){
                    return $customers;
                }
                $filtered_customers = [];
                foreach($customers as $customer){
                    if(!empty($from_date) && (strtotime($customer['ngaysinh']) < strtotime($from_date)))
                        continue;
                    if(!empty($to_date) && (strtotime($customer['ngaysinh']) > strtotime($to_date)))
                        continue;
                    $filtered_customers[] = $customer;
                }
                return $filtered_customers;
            }
            $from_date = NULL;
            $to_date = NULL;
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $from_date = $_POST["from"];
                $to_date = $_POST["to"];
            }
            $filtered_customers = searchByDate( $customerlist, $from_date, $to_date);
            ?>
<table border="0">
    <caption><h2>Danh sách loc khách hàng</h2></caption>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Ảnh</th>
    </tr>
    <?php if(count($filtered_customers) === 0):?>
        <tr>
            <td colspan="5" class="message">Không tìm thấy khách hàng nào</td>
        </tr>
    <?php endif; ?>

    <?php foreach($filtered_customers as $index => $customer): ?>
        <tr>
            <td><?php echo $index + 1;?></td>
            <td><?php echo $customer['ten'];?></td>
            <td><?php echo $customer['ngaysinh'];?></td>
            <td><?php echo $customer['diachi'];?></td>
            <td><div class="profile"><img src="<?php echo $customer['anh'];?>"/></div> </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>






