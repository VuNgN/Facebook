function clickImg() {
    var avatarImg = document.getElementById('avatarImg')
    var url = avatarImg.getAttribute('scr');
    window.open(url);
}