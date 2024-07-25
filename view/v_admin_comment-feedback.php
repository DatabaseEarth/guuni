<main class="admin_comment-feedback">
    <div class="khung-layout-user">
        <div class="khung-chat">
            <div class="header-chat">
                <div class="avatar">
                    <img src="https://kiemtientuweb.com/ckfinder/userfiles/images/avt-cute/avatar-cute-13.jpg" alt="">
                </div>
                <div class="menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="main-chat">
                <?php foreach($dsSpBlId as $ds): ?>
                <div class="khung-o-chat <?=($ds['Quyen']>0)?'khung-admin':''?>">
                    <div class="o-chat <?=($ds['Quyen']>0)?'o-admin':''?>">
                        <div class="avatar">
                            <img src="<?=$base_url?>upload/avatar/<?=$ds['HinhAnhTK']?>" alt="">
                        </div>
                        <div class="noi-dung">
                            <p><?=$ds['NoiDung']?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <form action="" method="post" class="footer-chat">
                <div class="khung-phan_hoi">
                    <input type="hidden" name="MaSP" value="<?=$_GET['id']?>">
                    <input type="text" name="NoiDung" placeholder="Gửi tin nhắn">
                    <button type="submit" name="submit"><i class="fa-regular fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
</main>
