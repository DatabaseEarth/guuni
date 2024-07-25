<?php
    include_once 'model/m_pdo.php';

    // function sanPham_checkTrungDonHang($MaSP,$MaTK){
    //     return pdo_query_one("SELECT * FROM don_hang WHERE MaSP = ? AND MaTK = ? AND TrangThai = ?",$MaSP,$MaTK,'gio-hang');
    // }
    // function sanPham_addToCart($MaSP,$MaTK,$GiaGoc){
    //     return pdo_execute("INSERT INTO don_hang(`MaTK`, `MaSP`, `TongTien`, `TrangThai`) VALUES (?,?,?,?)",$MaTK,$MaSP,$GiaGoc,'gio-hang');
    // }
    function donHang_checkIsset($MaTK){
        return pdo_query_one("SELECT * FROM don_hang WHERE MaTK = ? AND TrangThai = ?",$MaTK,'gio-hang');
    }
    function donHang_addToCart($MaDH,$MaSP,$GiaSP){
        return pdo_execute("INSERT INTO don_hang_chi_tiet (`MaDH`, `MaSP`, `GiaSP`) VALUES (?,?,?)",$MaDH,$MaSP,$GiaSP);
    }
    function donHang_addCart($MaTK){
        return pdo_execute("INSERT INTO `don_hang`(`MaTK`, `TrangThai`) VALUES (?,?)",$MaTK,'gio-hang');
    }
    function donHang_trungDonHang($MaDH,$MaSP){
        return pdo_query_one("SELECT * FROM don_hang_chi_tiet WHERE MaDH = ? AND MaSP = ?",$MaDH,$MaSP);
    }
    function donHang_deleteCartById($MaSP,$MaDH){
        return pdo_execute("DELETE FROM don_hang_chi_tiet WHERE MaSP = ? AND MaDH = ?",$MaSP,$MaDH);
    }
    function donHang_truSoLuong($MaSP){
        return pdo_execute("UPDATE san_pham SET Soluong = Soluong - 1 WHERE MaSP = ?",$MaSP);
    }


    function donHang_CountDonHang($MaDH){
        return pdo_query_value("SELECT COUNT(*) FROM don_hang_chi_tiet WHERE MaDH = ?",$MaDH);
    }
    function donHang_getAllDonHang($MaDH){
        return pdo_query("SELECT sp.*,dh.MaDH FROM san_pham sp INNER JOIN don_hang_chi_tiet dhct ON sp.MaSP = dhct.MaSP INNER JOIN don_hang dh ON dhct.MaDH = dh.MaDH WHERE dh.MaDH = ? AND dh.TrangThai = ?",$MaDH,'gio-hang');
    }

    function donHang_getAllTK($page){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT dh.*, tk.Email FROM don_hang dh INNER JOIN tai_khoan tk ON dh.MaTK = tk.MaTK LIMIT $batdau, 8");
    }
    function donHang_countAll(){
        return pdo_query_value("SELECT COUNT(*) FROM don_hang");
    }
    function donHang_delete($MaDH){
        pdo_execute("DELETE FROM don_hang WHERE MaDH =?",$MaDH);
    }
    function donHang_getTK($MaDH){
        return pdo_query_one("SELECT tk.Email FROM don_hang dh INNER JOIN tai_khoan tk ON dh.MaTK = tk.MaTK WHERE MaDH = ?",$MaDH);
    }
    function donHang_getChiTietDonhang($MaDH,$page){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT sp.*, dm.TenDanhMuc, dhct.MaCT FROM don_hang_chi_tiet dhct INNER JOIN san_pham sp ON dhct.MaSP = sp.MaSP INNER JOIN danh_muc dm ON sp.MaDanhMuc = dm.MaDanhMuc WHERE MaDH = ? LIMIT $batdau, 8",$MaDH);
    }
    function donHangCT_countAll(){
        return pdo_query_value("SELECT COUNT(*) FROM don_hang_chi_tiet");
    }
    function donHangCT_delete($MaCTDH,$MaDH){
        pdo_execute("DELETE FROM don_hang_chi_tiet WHERE MaCT = ? AND MaDH = ?",$MaCTDH,$MaDH);
    }

    function donHang_pay($MaTK,$Ghichu,$TenKH,$DiaDiem,$TongTien,$MaDH){
        return pdo_execute("UPDATE don_hang SET `MaTK`= ?,`Ghichu`= ?,`TenKH`= ?,`DiaDiem`= ?,`TongTien`= ?,`TrangThai`= ? WHERE MaDH = ?",$MaTK,$Ghichu,$TenKH,$DiaDiem,$TongTien,'thanh-toan',$MaDH);
    }
    function sanPham_stat(){
        return pdo_query("SELECT sp.TenSP, sp.Xem, COUNT(bl.MaSP) as BinhLuan, dm.TenDanhMuc, sp.Soluong
        FROM binh_luan bl INNER JOIN san_pham sp ON bl.MaSP = sp.MaSP INNER JOIN danh_muc dm ON sp.MaDanhMuc = dm.MaDanhMuc
        GROUP BY dm.MaDanhMuc, sp.MaSP
        ORDER BY sp.Xem DESC
        LIMIT 8");
    }
?>