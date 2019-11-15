const gallery = document.getElementById("js-picture-gallery");
class Image {
    constructor({ url, comments, nbrlike, id_pictures }) {
        this.id_pictures = id_pictures;
        if (!button) {
            var button = "";
        }
        this.closed = false;
        this.divs =
            `<div class="public_img">
        
        <img src="/${url}" alt="party">
        <p>Likes : ${nbrlike}</p>
        
        
        ${button}` +
            (() => {
                if (registered) {
                    return `<i onclick="likeDislike(this)" class="fa fa-thumbs-up"></i><form id="${this.id}">
                <input type="text" name="description" />
                <button type="submit" class="btn add_comment">Ajouter un commentaire</button>
                </form>`;
                } else {
                    return "";
                }
            })() +
            `
        <div class="comments">Commentaires :<br>
        `;
        comments.forEach(e => {
            this.addComment(e);
        });
    }
    //ajoute un commentaire à l'élément DOM
    addComment({ description, id_users }) {
        if (!this.submitted) {
            this.divs += `<div class="comment">${id_users} : ${description}</div>`;
            return;
        }
        var div = document.createElement("div");
        div.className = "comment";
        div.innerText = `${id_users} : ${description}`;
        document
            .getElementById(this.id)
            .parentElement.getElementsByClassName("comments")[0]
            .appendChild(div);
    }
    //Fait une requête AJAX pour poster un commentaire
    postComment(object) {
        var img = this;
        $.post(
            `http://localhost:8000/comment/`,
            object,
            function(data, status) {
                return;
                if (status == "success") {
                    img.addComment({
                        description: object.description,
                        id_users: id_user
                    });
                }
            }.bind(this)
        );
    }
    //Ajoute l'élément image au DOM
    submitElement() {
        this.submitted = true;
        gallery.innerHTML += this.element;
        if (registered) {
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
    });
});
