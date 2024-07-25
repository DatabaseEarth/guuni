<?php
    include_once 'model/m_pdo.php';

    function sanPham_getHot(){
        return pdo_query('SELECT * FROM san_pham WHERE Hot = 1 LIMIT 8');
    }
    function sanPham_getAllNew(){
        return pdo_query("SELECT * FROM san_pham ORDER BY MaSP DESC LIMIT 8");
    }
    function sanPham_getDanhMuc($MaDanhMuc, $page=1){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT sp.*, dm.MaDanhMuc FROM san_pham sp INNER JOIN danh_muc dm ON sp.MaDanhMuc = dm.MaDanhMuc WHERE sp.MaDanhMuc = ? LIMIT $batdau, 8",$MaDanhMuc);
    }
    function sanpham_getTotal($MaDanhMuc){
        return pdo_query_value('SELECT COUNT(*) FROM san_pham sp INNER JOIN danh_muc dm ON sp.MaDanhMuc = dm.MaDanhMuc WHERE sp.MaDanhMuc = ?',$MaDanhMuc);
    }
    function sanPham_getById($MaSP){
        return pdo_query_one("SELECT sp.*, dm.MaDanhMuc, dm.TenDanhMuc FROM san_pham sp INNER JOIN danh_muc dm ON sp.MaDanhMuc = dm.MaDanhMuc WHERE MaSP = $MaSP");
    }
    function sanPham_getRandomByDanhMuc($MaDanhMuc){
        return pdo_query("SELECT * FROM san_pham WHERE MaDanhMuc = $MaDanhMuc ORDER BY rand() LIMIT 4");
    }
    function sanPham_getRandomSanPham(){
        return pdo_query("SELECT * FROM san_pham ORDER BY rand() LIMIT 4");
    }
    function sanPham_tangLuotXem($MaSP) {
        pdo_execute("UPDATE san_pham SET Xem = xem + 1 WHERE MaSP = ?",$MaSP);
    }
    function sanPham_search($keyword, $page=1){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT * FROM san_pham WHERE TenSP LIKE '%$keyword%' LIMIT $batdau, 8");
    }
    function sanPham_searchTotal($keyword){
        return pdo_query_value("SELECT COUNT(*) FROM san_pham WHERE TenSP LIKE '%$keyword%'");
    }

    function sanPham_getAll($page=1){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT sp.*, dm.TenDanhMuc FROM san_pham sp INNER JOIN danh_muc dm ON sp.MaDanhMuc = dm.MaDanhMuc WHERE sp.TrangThai = 1 ORDER BY MaSP DESC LIMIT $batdau, 8");
    }
    function sanPham_countAll(){
        return pdo_query_value("SELECT COUNT(*) FROM san_pham WHERE TrangThai = 1");
    }
    function sanPham_add($TenSP,$HinhAnh,$GiaGoc,$GiaKM,$Soluong,$Xem,$MoTa,$SKU,$TrangThai,$Hot,$MaDanhMuc){
        return pdo_execute("INSERT INTO `san_pham`(`TenSP`, `HinhAnh`, `GiaGoc`, `GiaKM`, `Soluong`, `Xem`, `MoTa`, `SKU`, `TrangThai`, `Hot`, `MaDanhMuc`) VALUES (?,?,?,?,?,?,?,?,?,?,?)",$TenSP,$HinhAnh,$GiaGoc,$GiaKM,$Soluong,$Xem,$MoTa,$SKU,$TrangThai,$Hot,$MaDanhMuc);
    }
    function sanPham_edit($TenSP,$HinhAnh,$GiaGoc,$GiaKM,$Soluong,$Xem,$MoTa,$SKU,$TrangThai,$Hot,$MaDanhMuc,$MaSP){
        return pdo_execute("UPDATE san_pham SET TenSP = ?,HinhAnh = ?,GiaGoc = ?,GiaKM = ?,Soluong = ?,Xem = ?,MoTa = ?,SKU = ?,TrangThai = ?,Hot = ?,MaDanhMuc = ? WHERE MaSP = ?",$TenSP,$HinhAnh,$GiaGoc,$GiaKM,$Soluong,$Xem,$MoTa,$SKU,$TrangThai,$Hot,$MaDanhMuc,$MaSP);
    }
    function sanPham_delete($MaSP) {
        pdo_execute("DELETE FROM san_pham WHERE MaSP = ?",$MaSP);
    }


?>