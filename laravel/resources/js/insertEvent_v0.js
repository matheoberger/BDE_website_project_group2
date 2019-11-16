console.log("Signal from : insertEvent_v0.js");

class Image {
    constructor({ url }) {
        this.closed = false;
        this.divs = `<div class="public_img">
        <img src="/${url}" alt="party">
        <i onclick="likeDislike(this)" class="fa fa-thumbs-up"></i>
        <p>Like : ${nbrlike}</p>
        <button class="btn warning">Signaler</button>
        <button class="btn delete">Supprimer</button>
        <div class="comments">Commentaires :<br>
        `;
        comments.forEach(e => {
            this.addComment(e);
        });
    }
    addComment({ description, id_users }) {
        this.divs += `<div class="comment">${id_users} : ${description}</div>`;
    }
    get element() {
        return this.divs + "</div></div>";
    }
}

const gallery = document.getElementById("js-picture-gallery");
$.get(`http://localhost:3000/event/${id}`, function(data, status) {
    data.forEach(element => {
        var currentImg = new Image(element);
        gallery.innerHTML += currentImg.element;
    });
});
