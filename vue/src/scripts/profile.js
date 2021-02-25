const $ = (el) => document.querySelector(el);

const editBtn = $('#editBtn');
const form = $('.editForm');
const profilImg = $('#profile_img img');
const username = $('#user-info h1');
const email = $('#user-info h2');

editBtn.addEventListener('click', (e) => {
    if(!form.classList.value.includes('show')) {
        form.classList.add('show');
    } else {
        form.classList.remove('show');
    }
}, false);

window.onload = () => {
    fetch('../../controller/traitements/getProfileData.php?id='+id).then(res => {
        res.text().then(txt => {
            const data = txt.split(',');
            profilImg.src = '../src/images/' + data[2];
            username.innerText = data[0];
            email.innerText = data[1];
        })
    });
}
