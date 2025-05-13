//Function for edit menu
function openEditMenu(id, name, price) {
    document.getElementById("modal").style.display = "block";
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_name").value = name;
    document.getElementById("edit_price").value = price;
}

document.getElementById("edit-closebtn").addEventListener("click", () => {
    document.getElementById("modal").style.display = "none";
})

