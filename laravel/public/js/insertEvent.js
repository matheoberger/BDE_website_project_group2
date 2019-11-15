console.log("from : insertEvent.js (public)");

class insertEvent {
    getEvent() {
        console.log("getEvent()");
        return new Promise(resolve => {
            let event = $.get("http://localhost:3000/events/2/2", function(
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
    hey.createEvent();
});

const elem = document.createElement(`div`);
const elemText = document.createTextNode("The data is : ");

elem.appendChild(elemText);
document.body.appendChild(elem);

var jsonData = JSON.parse(data);
