const form = document.querySelector('form');
const image = document.querySelector('#file');
const error = document.querySelector('.error');


image.addEventListener('change', function() {
    error.innerText = "";
    const imageTypes = ['png', 'jpeg', 'jpg'];
    const fileSplited = this.files[0].name.split('.');
    let len = fileSplited.length;
    let fileType = fileSplited[len - 1].toLowerCase();
    if (!imageTypes.includes(fileType)) {
        this.value = "";
        error.style.display = "block";
        error.innerHTML += "<i class='fa fa-exclamation-circle'></i>Veuillez séléctionner une image svp!<br /><span id='errSpan'>Cliquer pour cacher l'erreur!</span>";
        }
});

error.onclick = (e) => e.target.style.display = "none";
