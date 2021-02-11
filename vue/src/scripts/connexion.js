const form = document.querySelector('form');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    const data = new FormData(e.target);

    xhr.open('POST', '../../controller/connexion.php', true);
    xhr.setRequestHeader('X_REQUESTED_WITH', 'xmlhttprequest');
    xhr.onload = () => console.log(xhr.responseText);
    xhr.send(data);
    e.target.children[0].value = "";
    e.target.children[2].value = "";
});