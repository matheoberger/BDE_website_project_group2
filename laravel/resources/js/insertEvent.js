class insertEvent {

    getEvent(){
        console.log("getEvent()");
        let event = $.get("localhost:3000/event/2/3"), function(
            data,
            status
        ){
            console.log(data[1].description);
        });
        console.log(event);
    }
    createEvent(data){}
}
$(document).ready(function() {
    const hey = new insertEvent();
    hey.getEvent();
    hey.createEvent;
});
