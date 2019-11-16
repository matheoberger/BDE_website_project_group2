class insertEvent {
    newEvent(eventIndex, eventNumber) {
        this.getEvent(eventIndex, eventNumber).then(eventList => {
            $("js-spinner").removeClass("spinner__display");
            $("js-spinner").addClass("spinner__display--none");
            eventList.forEach(this.createEvent.bind(this));
            console.log("newEvent()");
        });
    }

    getEvent(eventIndex, eventNumber) {
        $("js-spinner").addClass("spinner__display");
        return new Promise(resolve => {
            $.get(
                `http://localhost:3000/produits/${eventIndex}/${eventNumber}`,
                function(data, status) {
                    resolve(data);
                }
            );
            console.log("getEvent()");
        });
    }

    createEvent(event) {
        var eventElement = `<section>
        <article>
        <input type="image" src="${event.image}" name="saveForm" class="btTxt_submit" id="saveForm" />
        </article>
        <div class="event_description">
            <aside>
            <h2>${event.title}</h2>
            <p>${event.description}</p>
            </aside>
        </div>

    </section>`;
        this.loadEvent(eventElement);
        console.log("createEvent()");
        console.log("eventElement: " + eventElement);
    }

    loadEvent(eventElement) {
        $("#js-contenair_event").append(eventElement);
    }
}

$(document).ready(function() {
    var eventIndex = 0;
    var numberEventLoad = 3;
    var eventNumber = numberEventLoad;
    var eventInc = numberEventLoad;
    const hey = new insertEvent();

    hey.newEvent(eventIndex, eventNumber);
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
            hey.newEvent(eventIndex, eventNumber);
            eventIndex += eventInc;
        }
    });
});
