
//Image Slider
let slideIndex = 1;
let slides = document.getElementsByClassName("slides");

function plusSlides(n) { //Func to increase slideIndex
    slideIndex += n ;
    showSlides();
}
function showSlides() { //Func to show Image
    
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }else if (slideIndex < 1) {
        slideIndex = slides.length;
    }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}
document.addEventListener("DOMContentLoaded", () => { //to Show image when the page loads
    showSlides();
    setInterval(() => {
        slideIndex++;
        showSlides();
    }, 4000);

    //Modal function
    let openbtn = document.getElementById("openModal");
    let closebtn = document.getElementById("closebtn");
    let modal = document.getElementById("modal");

    openbtn.addEventListener("click", () => {
        modal.style.display = "block";
    })

    closebtn.addEventListener("click", () => {
        modal.style.display = "none";
    })

    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    })
})


//Form Validation
document.getElementById("submit").addEventListener("click", (event) => {
    const name = document.getElementById("name").value.trim();
    const phoneNum = document.getElementById("phonenum").value.trim();
    const numOfPeople = document.getElementById("numofPeople").value.trim();
    const dateTime = document.getElementById("dateTime").value.trim();
    
    if (name == "" || phoneNum == "" || numOfPeople.value == "" || dateTime.value == "") {
        event.preventDefault();
        alert("Please fill out all the required fields");
    }
})






