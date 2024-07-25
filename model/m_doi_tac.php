<?php
    include_once 'model/m_pdo.php';

    function doiTac_getAll(){
        return pdo_query('SELECT * FROM doi_tac');
    }

?>