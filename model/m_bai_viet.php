<?php
    include_once 'model/m_pdo.php';
    function loaiBaiViet_getAll($page){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT * FROM loai_bai_viet ORDER BY MaLoaiBai DESC LIMIT $batdau, 8");
    }
    function loaiBaiViet_countAll(){
        return pdo_query_value("SELECT COUNT(*) FROM loai_bai_viet");
    }
    function loaiBaiViet_add($TenLoaiBai,$TrangThaiLoaiBai,$ThuTu){
        return pdo_execute("INSERT INTO loai_bai_viet (`TenLoaiBai`, `TrangThaiLoaiBai`, `ThuTu`) VALUES (?, ?, ?)",$TenLoaiBai,$TrangThaiLoaiBai,$ThuTu);
    }
    function loaiBaiViet_GetByID($MaLoaiBai){
        return pdo_query_one("SELECT * FROM loai_bai_viet WHERE MaLoaiBai = ?",$MaLoaiBai);
    }
    function loaiBaiViet_edit($TenLoaiBai,$TrangThaiLoaiBai,$ThuTu,$MaLoaiBai){
        return pdo_execute("UPDATE `loai_bai_viet` SET `TenLoaiBai`= ?,`TrangThaiLoaiBai`= ?,`ThuTu`= ? WHERE MaLoaiBai = ?",$TenLoaiBai,$TrangThaiLoaiBai,$ThuTu,$MaLoaiBai);
    }
    function loaiBaiViet_delete($MaLoaiBai) {
        pdo_execute("DELETE FROM loai_bai_viet WHERE MaLoaiBai = ?",$MaLoaiBai);
    }

    function baiViet_getAll($page){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT * FROM loai_bai_viet lbv INNER JOIN bai_viet bv ON lbv.MaLoaiBai = bv.MaLoaiBai INNER JOIN tai_khoan tk ON bv.MaTK = tk.MaTK ORDER BY MaBaiViet DESC LIMIT $batdau, 8");
    }
    function baiViet_getAllHien($page){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT * FROM loai_bai_viet lbv INNER JOIN bai_viet bv ON lbv.MaLoaiBai = bv.MaLoaiBai INNER JOIN tai_khoan tk ON bv.MaTK = tk.MaTK WHERE TrangThaiBai = 1 ORDER BY MaBaiViet DESC LIMIT $batdau, 8");
    }
    function baiViet_countAllHien(){
        return pdo_query_value("SELECT COUNT(*) FROM bai_viet WHERE TrangThaiBai = 1");
    }
    function baiViet_getAllHienNB($page){
        $batdau = ($page-1)*8;
        return pdo_query("SELECT * FROM loai_bai_viet lbv INNER JOIN bai_viet bv ON lbv.MaLoaiBai = bv.MaLoaiBai INNER JOIN tai_khoan tk ON bv.MaTK = tk.MaTK WHERE TrangThaiBai = 1 AND bv.NoiBat = 1 ORDER BY MaBaiViet DESC LIMIT $batdau, 8");
    }
    function baiViet_countAllHienNB(){
        return pdo_query_value("SELECT COUNT(*) FROM bai_viet WHERE TrangThaiBai = 1 AND NoiBat = 1");
    }
    function baiviet_getByID($MaBaiViet){
        return pdo_query_one("SELECT * FROM bai_viet WHERE MaBaiViet = ?",$MaBaiViet);
    }
    function baiViet_countAll(){
        return pdo_query_value("SELECT COUNT(*) FROM bai_viet");
    }
    function loaiBaiViet_getAllBv(){
        return pdo_query("SELECT * FROM loai_bai_viet ORDER BY MaLoaiBai");
    }
    function baiViet_add($TieuDe,$noidung,$MaTK,$NgayDangBai,$NoiBat,$LuotXem,$MaLoaiBai,$TrangThaiBai){
        return pdo_execute("INSERT INTO `bai_viet`(`TieuDe`, `NoiDung`, `MaTK`, `NgayDangBai`, `NoiBat`, `LuotXem`, `MaLoaiBai`, `TrangThaiBai`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",$TieuDe,$noidung,$MaTK,$NgayDangBai,$NoiBat,$LuotXem,$MaLoaiBai,$TrangThaiBai);
    }
    function baiViet_edit($TieuDe,$NoiDung,$MaTK,$NgayDangBai,$NoiBat,$LuotXem,$MaLoaiBai,$TrangThaiBai,$MaBaiViet){
        return pdo_execute("UPDATE `bai_viet` SET `TieuDe`= ?,`NoiDung`= ?,`MaTK`= ?,`NgayDangBai`= ?,`NoiBat`= ?,`LuotXem`= ?,`MaLoaiBai`= ?,`TrangThaiBai`= ? WHERE MaBaiViet = ?",$TieuDe,$NoiDung,$MaTK,$NgayDangBai,$NoiBat,$LuotXem,$MaLoaiBai,$TrangThaiBai,$MaBaiViet);
    }
    function baiViet_delete($MaBaiViet,$MaTK) {
        pdo_execute("DELETE FROM bai_viet WHERE MaBaiViet = ? AND MaTK = ?",$MaBaiViet,$MaTK);
    }
    function baiViet_tangLuotXem() {
        pdo_execute("UPDATE bai_viet SET LuotXem = LuotXem + 1");
    }
    
?>