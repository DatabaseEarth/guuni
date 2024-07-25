<?php
    include_once 'config.php';
    include_once 'model/m_danh-muc.php';
    $dsDanhMuc = danhMuc_getAll();

    if (isset($_GET['mod'])) {
        switch ($_GET['mod']) {
            case 'page':
                $ctrl_name = 'page';
                break;
            case 'product':
                $ctrl_name = 'product';
                break;
            case 'user':
                $ctrl_name = 'user';
                break;
            case 'admin':
                $ctrl_name = 'admin';
                break;
            default:
                # code...
                break;
        }
        include_once 'controller/c_'.$ctrl_name.'.php';
    } else {
        header('Location: ?mod=page&act=home');
    }
    
?>
