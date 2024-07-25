<?php
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'home':
                // lấy dữ liệu và xử lý
                include_once 'model/m_slider.php'; // nhúng file siler model để xử lý
                $dsSlider = slider_getAll();

                include_once 'model/m_danh-muc.php'; // nhúng model danh mục
                $danh_muc = danhMuc_getAll(); 

                include_once 'model/m_san_pham.php'; // nhúng file xử lý sản phẩm
                $dsHot = sanPham_getHot();
                $dsNew = sanPham_getAllNew();

                include_once 'model/m_doi_tac.php';
                $dsDT = doiTac_getAll();
                $view_name = 'page_home';
                break;
            case 'about':

                $view_name = 'page_about';
                break;




            case 'baiViet':
                include_once 'model/m_bai_viet.php';
                baiViet_tangLuotXem();
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsBV = baiViet_getAllHien($page);
                $sotrang = ceil(baiViet_countAllHien()/8);
                $view_name = 'page_bai_viet';
                break;
            case 'baiViet-NB':
                include_once 'model/m_bai_viet.php';
                baiViet_tangLuotXem();
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsBV = baiViet_getAllHienNB($page);
                $sotrang = ceil(baiViet_countAllHienNB()/8);
                $view_name = 'page_bai_viet_noi_bat';
                break;

            case 'huongDan-online':

                $view_name = 'page_huong_dan-online';
                break;
            case 'cham-soc':

                $view_name = 'page_cham_soc';
                break;
            case 'van-chuyen':

                $view_name = 'page_van_chuyen';
                break;
            case 'giao-hang':

                $view_name = 'page_giao_hang';
                break;      
            case 'bao-mat':

                $view_name = 'page_bao_mat';
                break;   
            default:
                # code...
                break;
        }
        include_once 'view/v_user-layout.php';
    }
?>
