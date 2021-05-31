// var orderBtn = document.querySelector(".orderbtn");

//     var orderImg = document.querySelector("#orderimg");  

//     var header = document.querySelector(".header");

//    orderBtn.addEventListener('click', function() {


//     orderImg.src= "Images/08.jpg";


//    });


// localStorage.getItem('imgsrc', setAttribute('src'));

// Function Navigate

// function navigate() {

//     localStorage.setItem('imgsrc', this.getAttribute('data.image'));
//     window.location.href = 'ordering.html';
// }



// Switch Between Signin And Signup

var formIn = document.getElementById('formin');
var formUp = document.getElementById('formup');
var signIn = document.getElementById('signin');
var signUp = document.getElementById('signup');



formIn.onclick = function() {

    signIn.style.display = 'none'
    signUp.style.display = 'block';

}


formUp.onclick = function() {

    signIn.style.display = 'block';

    signUp.style.display = 'none'
}




// Add Asterisk To Required Input Field



myInput = document.querySelectorAll('.myinput');
mySpan = document.createElement('span');
spanText = document.createTextNode('*');

mySpan.className = 'asterisk';
mySpan.appendChild(spanText);


myInput.forEach((element) => {



    if (element.hasAttribute('required')) {

        element.parentNode.insertBefore(mySpan.cloneNode(true), element.nextSibilings);

    }

});

// myInput = document.querySelectorAll('.myinput');
// parent = document.querySelectorAll('.input-container');
// mySpan = document.createElement('span');
// spanText = document.createTextNode('*');

// console.log(myInput);


// myInput.forEach((element) => {



//     if (element.hasAttribute('required')) {

//         parent.forEach((e) => {

//             mySpan.appendChild(spanText);
//             e.insertBefore(mySpan, e.childNodes[3]);
//             mySpan.classList.add('asterisk');

//         });

//     }

// });




// Add Asterisk To Required Input Field



// myInput = document.querySelector('.myinput');
// parent = document.querySelector('.input-container');
// mySpan = document.createElement('span');
// spanText = document.createTextNode('*');

// if (myInput.hasAttribute('required')) {

//     mySpan.appendChild(spanText);
//     parent.insertBefore(mySpan, parent.childNodes[3]);
//     mySpan.classList.add('asterisk');

// }