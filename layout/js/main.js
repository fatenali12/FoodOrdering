/* Starting Slider */


var myElement = document.getElementById('myimg'),

    myImgs = ["layout/Images/01.jpeg",
        "layout/Images/02.jpg",
        "layout/Images/03.jpg",
        "layout/Images/04.jpg",
        "layout/Images/05.jpg",
        "layout/Images/06.jpg",
    ];


setInterval(function() {

    'use strict'

    var randomImg = Math.floor(Math.random() * myImgs.length);


    myElement.src = myImgs[randomImg];

}, 1000);


/* Ending Slider */



// Starting Toggle Menu 


let toggleBtn = document.querySelector(".toggle-menu"),

    myLinks = document.querySelector(".links");


toggleBtn.onclick = function(e) {

    'use strict'

    e.stopPropagation();

    toggleBtn.classList.toggle("active-menu");

    myLinks.classList.toggle("open");


}



myLinks.onclick = function(e) {

    'use strict'

    e.stopPropagation();

}


clickOutsideMenu(myLinks);





// Ending Toggle Menu 





// Starting Click Anywhere Outside Menu And Toggle Button To Close The Menu 


// document.addEventListener("click", (e)=> {


//   if (e.target !== toggleBtn && e.target !== myLinks) {


//     if (myLinks.classList.contains("open")) {

//     toggleBtn.classList.toggle("active-menu");

//     myLinks.classList.toggle("open");

//     }

//   }

// });


// Endting Click Anywhere Outside Menu And Toggle Button To Close The Menu 




// Starting Admin SubMenu



let subLink = document.querySelector(".adminlink");

let subLinks = document.querySelector(".sublink");

subLink.onclick = function(e) {

    'use strict'


    e.preventDefault();


    subLinks.classList.toggle("opens");


}


// Starting Clicking Anywhere Outside Menu 

document.addEventListener("click", (e) => {


    if (e.target !== subLink) {


        if (subLinks.classList.contains("opens")) {



            subLinks.classList.toggle("opens");

            myList.classList.remove("opens");

        }

    }

});


// Ending Clicking Anywhere Outside Menu 



// Starting Adding open Class To MyList


let anAdmin = document.querySelector(".anadmin");

let myList = document.querySelector(".mylist");


anAdmin.onclick = function(e) {

    'use strict'

    // e.preventDefault();


    myList.classList.toggle("opens");

    subLink.addEventListener("click", function(e) {

        myList.classList.remove("opens");


    });


}

// Ending Adding open Class To MyList



// Ending Admin SubMenu

clickOutsideMenu(subLinks);
clickOutsideMenu(myList);
clickOutsideMenu(subLink);






// Starting Function of Clicking Anywhere Outside Menu And Toggle Button And Admin Menu To Close The Menu 

function clickOutsideMenu(element) {


    'use strict'

    document.addEventListener("click", (e) => {


        if (e.target !== toggleBtn && e.target !== myLinks && e.target !== subLinks) {


            if (element.classList.contains("open")) {

                toggleBtn.classList.toggle("active-menu");

                myLinks.classList.toggle("open");

                subLinks.classList.remove("opens");

                myList.classList.remove("opens");


            }

        }

    });
}




// Ending Function of Clicking Anywhere Outside Menu And Toggle Button And Admin Menu To Close The Menu 






// Starting Function To Scroll To Sections 



const links = document.querySelectorAll(".links a"),

    allBullets = document.querySelectorAll(".nav-bullets .bullet")


function scrollToSection(elements) {

    elements.forEach(ele => {

        ele.addEventListener("click", (e) => {

            if (e.target.dataset.section) {

                e.preventDefault();

                document.querySelector(e.target.dataset.section).scrollIntoView({

                    behavior: 'smooth'

                });

            }

        });

    });

}

scrollToSection(links);

scrollToSection(allBullets);





// Endting Function To Scroll To Sections 


// localStorage.getItem('imgsrc',setAttribute('src'))

// // Function Navigate

// function navigate() {

//   localStorage.setItem('imgsrc',this.getAttribute('data.image'));
//   window.location.href = 'ordering.html';
// }





// Switch Between Signin And Signup


// console.log('hello');

var formIn = document.getElementById('formin');
var formUp = document.getElementById('formup');
var signIn = document.getElementById('signin');
var signUp = document.getElementById('signup');



formIn.onclick = function() {


    signIn.style.display = 'none'
    signUp.style.display = 'block';

    console.log('ok')

}


formUp.onclick = function() {


    signIn.style.display = 'block';

    signUp.style.display = 'none'

}









//########### Hide PlaceHolder on Input Focus ###########



// var myInput = document.getElementsByTagName('input');

// myInput.onfocus = function() {

//     "use strict";

//     this.setAttribute("data-place", this.getAttribute("placeholder"));

//     this.setAttribute("placeholder", "");
// }


// myInput.onblur = function() {

//     "use strict";

//     this.setAttribute("placeholder", this.getAttribute("data-place"));

//     this.setAttribute("data-place", "");
// }

// //########### End Hide PlaceHolder on Input Focus ###########