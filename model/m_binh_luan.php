<?php
    include_once 'model/m_pdo.php';
    
    function comment_add($MaSP,$MaTK,$NoiDung){
        pdo_execute("INSERT INTO binh_luan (`MaSP`, `MaTK`, `NoiDung`) VALUES (?,?,?)",$MaSP,$MaTK,$NoiDung);
    }
    function comment_getById($MaSanPham){
        return pdo_query("SELECT bl.*, tk.HinhAnhTK, tk.Email, tk.Quyen FROM binh_luan bl INNER JOIN tai_khoan tk ON bl.MaTK = tk.MaTK WHERE bl.MaSP = ? ORDER BY bl.MaBinhLuan ASC",$MaSanPham);
    }

    function comment_getAllProductByComment(){
        return pdo_query("SELECT sp.* FROM san_pham sp INNER JOIN binh_luan bl ON sp.MaSP = bl.MaSP GROUP BY sp.MaSP");
    }
    function comment_countAlluser(){
        return pdo_query_value("SELECT COUNT(*) FROM binh_luan bl INNER JOIN tai_khoan tk ON bl.MaTK = tk.MaTK WHERE Quyen=0");
    }
?>