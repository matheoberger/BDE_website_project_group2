var button = document.getElementById("save");
var place = document.getElementById("place");
var replacer = document.getElementById("titleReplacer");
var title = document.getElementById("title");
var form = document.getElementById("editEvent-Form");
button.onclick = e => {
    e.preventDefault();
    replacer.value = title.value;
    form.submit();
};
