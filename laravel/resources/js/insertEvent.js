class insertEvent {
    getEvent() {
        console.log("getEvent()");
        return new Promise(resolve => {
            let event = $.get("http://localhost:3000/events/2/3", function(
                data,
                status
            ) {
                resolve(data);
            });
        });
    }
    createEvent(data) {}
}

$(document).ready(function() {
    const hey = new insertEvent();
    hey.getEvent().then(data => {
        console.log(data);
    });
    hey.createProduct();
});
