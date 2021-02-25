const $ = (el) => document.querySelector(el);

const likeIcons = document.querySelectorAll('.likeIcon');
const htmlCssPosts = $('#htmlCssPosts');
const jsNodePosts = $('#jsNodePosts');
const phpMySqlPosts = $('#phpMysqlPosts');
const postsField = $('.postField');
const searchForm = $('#search');

/*
//DEBUT DU CODE AJAX
*/

const ajaxRequest = (url, postID, authorID, type) => {

    const data = new FormData();
    data.append('postID', postID);
    data.append('authorID', authorID);
    data.append('type', type);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200) xhr.responseText;
    }
    xhr.send(data);
}

/*
//FIN DU CODE AJAX
*/

likeIcons.forEach(likeIcon => {

    //Click Event

    likeIcon.addEventListener('click', (e) => {
        const params = likeIcon.parentElement.nextElementSibling.href.split('?')[1].split('&');
        const paramToObj = {
        authorID: params[0].split('=')[1],
        postID: params[1].split('=')[1]
    }
        const {authorID, postID} = paramToObj;
        const classes = e.target.classList.value.split(" ");
        if(classes.shift() == 'far') {
            
            //
            ajaxRequest('../../controller/traitements/like.php', postID, authorID, 'like');
            classes.splice(0, 0, 'fa');
            e.target.classList.value = classes.join(" ");
        } else {
            ajaxRequest('../../controller/traitements/like.php', postID, authorID, 'dislike');
            classes.splice(0, 0, 'far');
            e.target.classList.value = classes.join(" ");
        }
    });

});

//Categories Code

htmlCssPosts.addEventListener('click', function(e) {
    e.preventDefault();
    fetch(this.href + '&user_id=' + userID, {
        headers:{'content-type': 'text/html'}
    }).then(res => {
        res.text().then(html => {
            postsField.innerHTML = html;
        })
    })
});

jsNodePosts.addEventListener('click', function(e) {
    e.preventDefault();
    fetch(this.href + '&user_id=' + userID, {
        headers:{'content-type': 'text/html'}
    }).then(res => {
        res.text().then(html => {
            postsField.innerHTML = html;
        })
    })
});

phpMySqlPosts.addEventListener('click', function(e) {
    e.preventDefault();
    fetch(this.href + '&user_id=' + userID, {
        headers:{'content-type': 'text/html'}
    }).then(res => {
        res.text().then(html => {
            postsField.innerHTML = html;
        })
    })
});
//SearchBar

searchForm.addEventListener('submit', function(e) {
    e.preventDefault();
    let searchInput = this.firstElementChild.value;
    fetch('../../controller/traitements/search.php?q=' + searchInput + '&user_id=' + userID, {
        headers:{'content-type': 'text/html'}
    }).then(res => {
        res.text().then(html => {
            postsField.innerHTML = html;
        })
    });
    this.firstElementChild.value = '';
});

window.onload = () => {
    likeIcons.forEach(likeIcon => {
        const getLikedPosts = async (url) => {
            const res = await fetch(url);
            if(res.ok && res.status == 200) {
                const data = res.text();
                return data;
            }
        }
        const url = '../../controller/traitements/isliked.php?user_id=' + userID;
        const likedPosts = getLikedPosts(url);
        likedPosts.then(result => {
            result = result.split(',');
            result.pop();
            if(result.includes(likeIcon.id)) likeIcon.classList.add('fa');
        });
    });
}
