const gallery = document.getElementById("js-picture-gallery");
/**
 * La classe insertImage regroupe les méthodes
 * permettant le chargement depuis l'API de nouvelles
 * images en les inserant directement en Jquery
 * dans le fichier HTML event
 */
class Image {
    constructor({ url, comments, nbrlike, id_pictures }, button) {
        this.id_pictures = id_pictures;
        this.closed = false;

        /** L'insertion dynamique des éléments HTML
         *  Chaque pages est chargé avec un id qui lui est propre lié à ses éléments
         */
        this.divs =
            `<div class="public_img">

        <img src="/${url}" alt="party">
        <form action='/report/${this.id_pictures}' methode="get">
        <button type="submit" class="btn add_comment">Signalez</button></form>
        <p>Likes : <p id="js-number-likes-${this.id_pictures}">${nbrlike}</p></p>


        ${button}` +
            (() => {
                if (registered) {
                    return `<i id="js-like-${id_pictures}" class="fa fa-thumbs-up"></i><form id="${this.id}">
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

    /* ajoute un commentaire à l'élément DOM */
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
    //Fait une requête AJAX pour disliker
    /* Liker une photo */
    like(object) {
        var id = this.id_pictures;
        $.post(`http://localhost:8000/likePicture/`, object, function(
            data,
            status
        ) {
            if (status == "success") {
                document.getElementById(`js-number-likes-${id}`).innerText =
                    Number(
                        document.getElementById(`js-number-likes-${id}`)
                            .innerText
                    ) + 1;
            }
        });
    }
    //Fait une requête AJAX pour liker
    dislike(object) {
        var id = this.id_pictures;
        $.post(`http://localhost:8000/dislikePicture/`, object, function(
            data,
            status
        ) {
            if (status == "success") {
                document.getElementById(`js-number-likes-${id}`).innerText =
                    Number(
                        document.getElementById(`js-number-likes-${id}`)
                            .innerText
                    ) - 1;
            }
        });
    }
    //Fait une requête AJAX pour poster un commentaire
    postComment(object) {
        var img = this;
        $.post(
            `http://localhost:8000/comment/`,
            object,
            function(data, status) {
                if (status == "success") {
                    img.addComment({
                        description: object.description,
                        id_users: id_user
                    });
                }
            }.bind(this)
        );
    }

    /* Ajoute l'élément image au DOM */
    submitElement() {
        this.submitted = true;
        gallery.innerHTML += this.element;
        if (registered) {
            /* Si utilisateur inscrit, ajouter le script de handle pour ajouter un commentaire */
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
            //Si utilisateur inscrit, ajouter le script de handle pour like/dislike une photo
            document.getElementById(
                `js-like-${this.id_pictures}`
            ).onclick = e => {
                var object = {
                    _token: token,
                    picture: this.id_pictures,
                    event: id
                };
                if (
                    document
                        .getElementById(`js-like-${this.id_pictures}`)
                        .classList.toggle("img--activated")
                ) {
                    this.like(object);
                    //like
                } else {
                    this.dislike(object);
                    //dislike
                }
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
        console.log(button);
        if (!button) {
            var button = "";
        }
        var currentImg = new Image(element, button);
        currentImg.submitElement();
    });
});
