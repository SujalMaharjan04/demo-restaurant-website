
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
    let openbtn = document.querySelectorAll(".openModal");
    let closebtn = document.querySelectorAll(".closebtn");
    let loginModal = document.getElementById("modal");
    let signModal = document.getElementById("modal-signup");
    let signup = document.getElementById("to-signup");
    let login = document.getElementById("to-login");

    openbtn.forEach((btn) => {
        btn.addEventListener("click", () => {
        loginModal.style.display = "block";
        signModal.style.display = "none";
    })
    })
    

    closebtn.forEach(btn => {
        btn.onclick = () => {
            loginModal.style.display = "none";
            signModal.style.display = "none";
        }
    })
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    })

    signup.onclick = () => {
        loginModal.style.display = "none";
        signModal.style.display = "block";
    }

    login.onclick = () => {
        loginModal.style.display = "block";
        signModal.style.display = "none";
    }


    //burger activation
    let burger = document.querySelector("#burger");
    let menuNav = document.querySelector(".menu-nav-bar");
    
    burger.addEventListener("click", () => {  
        menuNav.classList.toggle("active");
        
    })
})


//Form Validation
let submitbtn = document.getElementById("submit")
if (submitbtn) {
    submitbtn.addEventListener("click", (event) => {
        const name = document.getElementById("name").value.trim();
        const phoneNum = document.getElementById("phonenum").value.trim();
        const numOfPeople = document.getElementById("numofPeople").value.trim();
        const dateTime = document.getElementById("dateTime").value.trim();
        
        if (name == "" || phoneNum == "" || numOfPeople == "" || dateTime == "") {
            event.preventDefault();
            alert("Please fill out all the required fields");
        }
    })
}









