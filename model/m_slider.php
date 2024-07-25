<?php
    include_once 'model/m_pdo.php';
    // lấy hết tất cả ảnh slider 
    function slider_getAll(){
        return pdo_query("SELECT * FROM anh_slider");
    }
?>