console.log("Contact! from : insertEvent_v0");

class insertEvent {
    getEvent() {
        console.log("getEvent()");
        console.log("Contact! from : insertEvent : insertEvent_v0");
        return new Promise(resolve => {
            let event = event.get("http://localhost:3000/events/2/2", function(
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
