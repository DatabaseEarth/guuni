<?php
    include_once 'model/m_pdo.php';

    function danhMuc_getAll(){
        return pdo_query('SELECT * FROM danh_muc WHERE TrangThai = 1 LIMIT 5');
    }
    function danhMuc_getAllAdmin(){
        return pdo_query('SELECT * FROM danh_muc WHERE TrangThai = 1');
    }
    function danhMuc_add($TenDanhMuc,$AnhDanhMuc,$MoTaNgan){
        return pdo_execute("INSERT INTO danh_muc (`TenDanhMuc`,`HinhAnh`,`MoTaNgan`,`TrangThai`) VALUES (?,?,?,?)",$TenDanhMuc,$AnhDanhMuc,$MoTaNgan,1);
    }
    function danhMuc_delete($MaDanhMuc) {
        pdo_execute("DELETE FROM danh_muc WHERE MaDanhMuc = ?",$MaDanhMuc);
    }
    function danhMuc_getById($MaDanhMuc){
        return pdo_query_one("SELECT * FROM danh_muc WHERE MaDanhMuc = ?",$MaDanhMuc);
    }
    function danhMuc_edit($TenDanhMuc,$AnhDanhMuc,$MoTaNgan,$TrangThai,$MaDanhMuc){
        return pdo_execute("UPDATE danh_muc SET TenDanhMuc = ?, HinhAnh = ?, MoTaNgan = ?, TrangThai = ? WHERE MaDanhMuc = ?", $TenDanhMuc, $AnhDanhMuc, $MoTaNgan, $TrangThai, $MaDanhMuc);
    }

    function danhMuc_statBySP(){
        return pdo_query("SELECT dm.MaDanhMuc, dm.TenDanhMuc, COUNT(sp.MaSP) AS SoLuong, AVG(sp.GiaGoc) AS TrungBinh, MIN(sp.GiaGoc) AS ThapNhat, MAX(sp.GiaGoc) AS CaoNhat
        FROM danh_muc dm LEFT JOIN san_pham sp ON dm.MaDanhMuc = sp.MaDanhMuc
        GROUP BY dm.MaDanhMuc,  dm.TenDanhMuc");
    }
?>