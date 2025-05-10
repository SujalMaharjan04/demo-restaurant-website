
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
    }, 2000);
})


//Form Validation
document.getElementById("submit").addEventListener("click", (event) => {
    const name = document.getElementById("name").trim();
    const phoneNum = document.getElementById("phonenum").trim();
    const numOfPeople = document.getElementById("numofPeople").trim();
    const dateTime = document.getElementById("dateTime").trim();
    
    if (name == "" || phoneNum == "" || numOfPeople.value == "" || dateTime.value == "") {
        event.preventDefault();
        alert("Please fill out all the required fields");
    }
})


