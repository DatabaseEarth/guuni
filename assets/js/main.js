var m = 0;
var soHinh = document.querySelectorAll('.banner li img').length;
function next() {
    document.querySelector('.btn-next');
    m = m - 100;
    if(m < -100*(soHinh-1)){
        m = 0;
    }
    document.querySelector('.banner li:first-child').style.marginLeft = m + '%';
}
function prev() {
    document.querySelector('.btn-prev');
    m = m + 100;
    if(m>0){
        m = -100*(soHinh-1);
    }
    document.querySelector('.banner li:first-child').style.marginLeft = m + '%';
}
setInterval(function(){
    next();
}, 3500);

// Tăng giảm số lượng input
// ----------------------------------------------------------------------
document.querySelectorAll('.gia');

// ----------------------------------------------------------------------