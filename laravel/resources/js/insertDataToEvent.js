const gallery = document.getElementById("js-picture-gallery");
class Image {
    constructor({ url, comments, nbrlike, id_pictures }) {
        this.id_pictures = id_pictures;
        if (!button) {
            var button = "";
        }
        this.closed = false;
        this.divs = `<div class="public_img">
        
        <img src="/${url}" alt="party">
        <i onclick="likeDislike(this)" class="fa fa-thumbs-up"></i>
        <p>Likes : ${nbrlike}</p>
        ${button}
                <form id="${this.id}">
                <input type="text" name="description" />
                <button type="submit" class="btn add_comment">Ajouter un commentaire</button>
                </form>
        <div class="comments">Commentaires :<br>
        `;
        comments.forEach(e => {
            this.addComment(e);
        });
    }
    addComment({ description, id_users }) {
        this.divs += `<div class="comment">${id_users} : ${description}</div>`;
    }
    postComment(object) {
        $.post(`http://localhost:8000/comment/`, object, function(
            data,
            status
        ) {
            console.log(data);
            if (status == "success") {
                console.log(data);
            }
        });
    }
    submitElement() {
        gallery.innerHTML += this.element;
        document.getElementById(this.id).onsubmit = e => {
            e.preventDefault();
            var object = {
                description: e.target.description.value,
                _token: token,
                event: id,
                picture: this.id_pictures
            };
            this.postComment(object);

            //console.log(object);
        };
    }
    get id() {
        return `js-form-${this.id_pictures}`;
    }
    get element() {
        return this.divs + "</div></div>";
    }
}

$.get(`http://localhost:3000/event/${id}`, function(data, status) {
    data.forEach(element => {
        var currentImg = new Image(element);
        currentImg.submitElement();
        console.log(element);
    });
});
