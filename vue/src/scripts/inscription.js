const form = document.querySelector('form');
const errorBox = document.querySelector('.error');
const hideBtn = document.querySelector('.error button');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    const data = new FormData(e.target);

    xhr.open('POST', '../../controller/inscription.php', true);
    xhr.setRequestHeader('X_REQUESTED_WITH', 'xmlhttprequest');
    xhr.onload = () => {
        const res = xhr.responseText;
        if(res != 'L\'un ou les deux champs est incorrect!') {
            document.location = res;
        } else {
            errorBox.classList.add('errorShow');
            errorBox.firstElementChild.innerText = res;
        }
    }
    xhr.send(data);
    e.target.children[0].value = "";
    e.target.children[2].value = "";
});

hideBtn.addEventListener('click', function() {
    this.parentNode.classList.remove('errorShow');
})