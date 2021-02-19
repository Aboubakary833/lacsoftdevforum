const form = document.querySelector('form');
const errorBox = document.querySelector('.error');
const hideBtn = document.querySelector('.error button');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    const data = new FormData(e.target);

    xhr.open('POST', '../../controller/traitements/inscription.php', true);
    xhr.setRequestHeader('X_REQUESTED_WITH', 'xmlhttprequest');
    xhr.onload = () => {
        const res = xhr.responseText;
        if(res) {
            errorBox.classList.add('errorShow');
            errorBox.firstElementChild.innerText = res;
        }
    }
    xhr.send(data);
    const children = e.target.children;
    children[0].value = "";
    children[2].value = "";
    children[4].value = "";
    children[6].value = "";
    children[8].value = "";
    children[10].value = "";
    children[12].value = "";
    children[14].value = "";
 });



hideBtn.addEventListener('click', function() {
    this.parentNode.classList.remove('errorShow');
})