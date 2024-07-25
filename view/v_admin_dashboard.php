<main class="admin_dashboard">
    <h2 class="tieu_de">Thống kê</h2>
    <div class="khung-tong_quan">
        <div class="khung-o-tong_quan">
            <div class="tieu_de-tong_quan">
                Tổng sản Phẩm
            </div>
            <div class="noi_dung">
                <?=$tkSP?>
            </div>
        </div>
        <div class="khung-o-tong_quan">
            <div class="tieu_de-tong_quan">
                Khách hàng
            </div>
            <div class="noi_dung">
                <?=$tkTK?>
            </div>
        </div>
        <div class="khung-o-tong_quan">
            <div class="tieu_de-tong_quan">
                Bình luận
            </div>
            <div class="noi_dung">
                <?=$tkTK?>
            </div>
        </div>
        <div class="khung-o-tong_quan">
            <div class="tieu_de-tong_quan">
                Đơn hàng
            </div>
            <div class="noi_dung">
                <?=$tkDH?>
            </div>
        </div>
    </div>
    <div class="khung-layout-dashboard-1-2">
        <div class="khung-1">
            <div class="tieu_de">
                Thống kê sản phẩm theo danh mục
            </div>
            <div class="bieu_do">
                <div id="myChart" style="height:400px"></div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="text-left">Danh mục</th>
                        <th>Số lượng</th>
                        <th class="text-right">Giá trung bình</th>
                        <th class="text-right">Giá thấp nhất</th>
                        <th class="text-right">Giá cao nhất</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tkSPTheoDM as $dm): ?>
                    <tr>
                        <td class="text-left" ><?=$dm['TenDanhMuc']?></td>
                        <td><?=$dm['SoLuong']?></td>
                        <td class="text-right"><?=number_format(round($dm['TrungBinh']))?>đ</td>
                        <td class="text-right"><?=number_format(round($dm['ThapNhat']))?>đ</td>
                        <td class="text-right"><?=number_format(round($dm['CaoNhat']))?>đ</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="khung-2">
            <div class="tieu_de">
                Thống kê sản phẩm được quan tâm
            </div>
            <div class="bieu_do">
                <div id="myChart2" style="height:400px"></div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="text-left">Tên sản phẩm</th>
                        <th>Xem</th>
                        <th>Bình luận</th>
                        <th class="text-left">Danh mục</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tkSPQuanTam as $sp): ?>
                    <tr>
                        <td class="text-left"><?=$sp['TenSP']?></td>
                        <td><?=$sp['Xem']?></td>
                        <td><?=$sp['BinhLuan']?></td>
                        <td class="text-left"><?=$sp['TenDanhMuc']?></td>
                        <td><?=$sp['Soluong']?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Your Function
function drawChart() {

    // Set Data
    const data = google.visualization.arrayToDataTable([
    ['Danh mục', 'Số lượng'],
    <?php foreach($tkSPTheoDM as $dm){
        echo "['".$dm['TenDanhMuc']."',".$dm['SoLuong']."],";
    }?>

    ]);

    // Set Options
    const options = {
    title:'Biểu đồ số lượng sản phẩm theo danh mục',
    is3D: true
    };

    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);

    // ---------------------------------------------------------------
        
    // Set Data
    const data2 = google.visualization.arrayToDataTable([
    ['Tên sản phẩm', 'Xem'],
    <?php foreach($tkSPQuanTam as $sp){
    echo "['".$sp['TenSP']."',".$sp['Xem']."],";
    }?>
    ]);

    // Set Options
    const options2 = {
    title:'Biểu đồ sản phẩm được quan tâm nhiều nhất'
    };

    // Draw
    const chart2 = new google.visualization.BarChart(document.getElementById('myChart2'));
    chart2.draw(data2, options2);
}
</script>