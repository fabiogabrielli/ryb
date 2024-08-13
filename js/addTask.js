document.getElementById('priority').addEventListener('change', priorityColor);

function priorityColor (){
    priority = document.getElementById('priority').value;
    

    if (priority === "baixa")
        alert ("baixa");
}