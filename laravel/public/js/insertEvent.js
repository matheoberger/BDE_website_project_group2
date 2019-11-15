console.log("You fool!")

/**
 * La classe insertevents regroupe les méthodes
 * permettant le chargement depuis l'API de nouveaux
 * event en les inserant directement en Jquery
 * dans le fichier HTML boutique
 */
class insertEvents {
    /**
     *
     * @param {number} eventIndex : représente le nombre d'article déjà chargé, utile pour l'API qui l'enverra à la procédure
     * @param {number} eventNumber  : représente le nnombre d'event que l'on veut charger à partir de l'index
     *
     * New events régit toutes les méthodes de la classe insertevents, un tableau de produit est d'abord chargé,
     * puis détaché en objets (les event) puis mis en forme pour être insérés dans le fichier HTML
     *
     */
    newEvents(eventIndex, eventNumber) {
        if(){
        $("js-spinner").addClass("spinner__display");
        }
        this.getEvents(eventIndex, eventNumber).then(EventsList => {
            $("js-spinner").removeClass("spinner__display");
            $("js-spinner").addClass("spinner__display--none");
            eventsList.forEach(this.createEvents.bind(this));
        });
    }

    /**
     *
     * @param {number} eventIndex : représente le nombre d'article déjà chargé, utile pour l'API qui l'enverra à la procédure
     * @param {number} eventNumber  : représente le nnombre d'event que l'on veut charger à partir de l'index
     *
     * getevents execute la requête HTTP get destinée à l'API, les données sont récupérées en asynchrone
     *
     */

    getEvents(eventIndex, eventNumber) {
        return new Promise(resolve => {
            $.get(
                `http://localhost:3000/event/${eventIndex}/${eventNumber}`,
                function(data, status) {
                    resolve(data);
                }
            );
        });
    }

    /**
     *
     * @param {*} events
     *
     *createevents permet de mettre en forme chaque article pour qu'ils puissent être insérés dans le fichier HTML
     *
     */

    createEvents(event) {
        var eventsElement = `<div class="events">
        <a href="/event/${events.id_events}"><img src="${events.image}" class="events__image"/></a>
        <div class="events__title">${events.title}</div>
        <div class="events__price"><b>${events.price}€</b></div>
    </div>`;
        this.loadEvents(eventsElement);
    }

    /**
     *
     * @param {*} eventsElement
     *
     * loadevents insert eventsElement dans le div dépendant de la classe js-eventsContainer
     *
     */
    loadEvents(eventsElement) {
        $("#js-eventsContainer").append(eventsElement);
    }
}

/**
 * Une fois que le document est "prêt",
 * une nouvelle classe inserevents est crée puis on charge les event
 * à chaque fois que la position du curseur dans la fenêtre atteint la fin du document
 *
 */

$(document).ready(function() {
    var eventIndex = 0;
    var numbereventLoad = 3;
    var eventNumber = numbereventLoad;
    var eventInc = numbereventLoad;
    const coucou = new insertEvents();

    coucou.newEvents(eventIndex, eventNumber);
    eventIndex += eventInc;

    $(window).scroll(function() {
        console.log($(window).scrollTop());
        console.log($(window).height());
        console.log($(document).height());
        if (
            Math.round($(window).scrollTop() + $(window).height()) >=
            $(document).height() - 10
        ) {
            console.log("sscroll");
            coucou.newEvents(eventIndex, eventNumber);
            eventIndex += eventInc;
        }
    });
});
