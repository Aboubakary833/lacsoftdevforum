const $ = (el) => document.querySelector(el);

const usersBoxBtn = $('.users');
const postsBoxBtn = $('.posts');
const commentsBoxBtn = $('.comments');

const usersData = $('.usersData');
const postsData = $('.postsData');
const commentsData = $('.commentsData');

window.onload = () => {
    usersBoxBtn.addEventListener('click', function(e) {
        const condition = !this.classList.value.includes('active');
        if (condition) {
            postsBoxBtn.classList.value.includes('active') ? postsBoxBtn.classList.remove('active') : this.classList.add('active');
            commentsBoxBtn.classList.value.includes('active') ? commentsBoxBtn.classList.remove('active') : this.classList.add('active');
            usersData.classList.add('show');
            postsData.classList.remove('show');
            commentsData.classList.remove('show');
        }
    });

    postsBoxBtn.addEventListener('click', function(e) {
        const condition = !this.classList.value.includes('active');
        if (condition) {
            usersBoxBtn.classList.value.includes('active') ? usersBoxBtn.classList.remove('active') : this.classList.add('active');
            commentsBoxBtn.classList.value.includes('active') ? commentsBoxBtn.classList.remove('active') : this.classList.add('active');
            postsData.classList.add('show');
            usersData.classList.remove('show');
            commentsData.classList.remove('show');
        }
    });

    commentsBoxBtn.addEventListener('click', function(e) {
        const condition = !this.classList.value.includes('active');
        if (condition) {
            usersBoxBtn.classList.value.includes('active') ? usersBoxBtn.classList.remove('active') : this.classList.add('active');
            postsBoxBtn.classList.value.includes('active') ? postsBoxBtn.classList.remove('active') : this.classList.add('active');
            commentsData.classList.add('show');
            postsData.classList.remove('show');
            usersData.classList.remove('show');
        }
    })
}
