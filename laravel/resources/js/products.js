const input = document.getElementById("productSearch");
const container = document.getElementById("js-autoCompletionContainer");

function autocompletion(text) {
    $.get(
        `http://localhost:3000/autocompletion/produits/?description=${text}`,
        function(data, status) {
            container.innerHTML = "";
            data.forEach(element => {
                let div = document.createElement("a");
                div.addEventListener("click", event => {
                    input.focus();
                    var temp = input.value.split(" ");
                    temp[temp.length - 1] = event.srcElement.innerText;
                    console.log(temp);
                    input.value = temp.join(" ");
                    input.value += " ";
                    autocompletion("");
                });
                div.className = "searchProduct";
                div.innerText = element;
                container.appendChild(div);
            });
        }
    );
}
input.addEventListener("keyup", e => {
    var temp = input.value.split(" ");
    autocompletion(temp[temp.length - 1]);
});
