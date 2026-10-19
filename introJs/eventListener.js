const button = document.getElementById("button");
const keyResult = document.getElementById('result');

button.addEventListener("click", event =>{

    button.classList.toggle("buttonStyle");

});

document.addEventListener('keyup', event =>{

    keyResult.innerHTML = "";
    keyResult.textContent = event.key;

});