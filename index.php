<?php
// เชื่อมโยงไฟล์ CSS
echo '<link rel="stylesheet" type="text/css" href="styles.css">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">';
echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap">';

$data = [
    ["a101", "ยางลบ", 5, 20],
    ["a105", "ดินสอ", 5, 20],
    ["a109", "ปากกา", 10, 20]
];

echo '<div class="container">';
echo '<h1 class="main-title">รายการสินค้า</h1>';

echo '<div class="product-grid">';
for ($i = 0; $i < count($data); $i++) {
    echo '<div class="product-card">';
    echo '<div class="product-icon"><i class="fas fa-shopping-bag"></i></div>';
    echo '<h3 class="product-title">' . $data[$i][1] . '</h3>';
    echo '<div class="product-details">';
    echo '<p><span class="label">รหัส:</span> ' . $data[$i][0] . '</p>';
    echo '<p><span class="label">จำนวน:</span> ' . $data[$i][2] . ' ชิ้น</p>';
    echo '<p><span class="label">ราคา:</span> ' . $data[$i][3] . ' บาท/ชิ้น</p>';
    $total = $data[$i][2] * $data[$i][3];
    echo '<p class="total"><span class="label">รวม:</span> ' . $total . ' บาท</p>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';

echo '<h2 class="section-title">ตารางสรุปรายการสินค้า</h2>';
echo '<div class="table-container">';
echo '<table class="modern-table">';
echo '<thead>';
echo '<tr><th>รหัส</th><th>ชื่อสินค้า</th><th>จำนวน</th><th>ราคา</th><th>ยอดรวม</th></tr>';
echo '</thead>';
echo '<tbody>';

$sum = 0;
for ($i = 0; $i < count($data); $i++) {
    echo '<tr>';
    for ($j = 0; $j < count($data[$i]); $j++) {
        echo '<td>' . $data[$i][$j] . '</td>';
    }
    $total = $data[$i][2] * $data[$i][3];
    echo '<td>' . $total . '</td>';
    $sum += $total;
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';

echo '<div class="order-summary">';
echo '<h2 class="summary-title">สรุปการสั่งซื้อ</h2>';
echo '<div class="summary-box">';
echo '<div class="summary-item"><span>ยอดรวมสินค้า:</span> <span>' . $sum . ' บาท</span></div>';

if ($sum > 500) {
    echo '<div class="summary-item shipping-free"><span>ค่าจัดส่ง:</span> <span>ฟรี!</span></div>';
    echo '<div class="summary-item total-amount"><span>ยอดรวมที่ต้องชำระ:</span> <span>' . $sum . ' บาท</span></div>';
    echo '<div class="shipping-note">ยินดีด้วย! คุณได้รับสิทธิ์จัดส่งฟรี</div>';
} else {
    $shipping = 30;
    $gtotal = $sum + $shipping;
    echo '<div class="summary-item"><span>ค่าจัดส่ง:</span> <span>' . $shipping . ' บาท</span></div>';
    echo '<div class="summary-item total-amount"><span>ยอดรวมที่ต้องชำระ:</span> <span>' . $gtotal . ' บาท</span></div>';
    echo '<div class="shipping-note">สั่งซื้อเพิ่มอีก ' . (501 - $sum) . ' บาท เพื่อรับสิทธิ์จัดส่งฟรี</div>';
}

echo '</div>';
echo '<button class="checkout-btn">ดำเนินการชำระเงิน <i class="fas fa-arrow-right"></i></button>';
echo '</div>';

echo '</div>';
?>