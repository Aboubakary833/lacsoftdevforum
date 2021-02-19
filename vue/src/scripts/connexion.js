const form = document.querySelector('form');
const errorBox = document.querySelector('.error');
const hideBtn = document.querySelector('.error button');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    const url = '../../controller/traitements/connexion.php';
    const data = new FormData(e.target);

    xhr.open('POST', url, true);
    xhr.onload = () => {
        const res = xhr.responseText;
        if(res == 'L\'un ou les deux champs sont incorrects!') {
            errorBox.classList.add('errorShow');
            errorBox.firstElementChild.innerText = res;
        } else {document.location = res;}
    }
    xhr.send(data);
    e.target.children[0].value = "";
    e.target.children[2].value = "";
});

hideBtn.addEventListener('click', function() {
    this.parentNode.classList.remove('errorShow');
})