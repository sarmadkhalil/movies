import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// let star = document.querySelector('.stars-1, .star-2, .star-3, .star-4, .star-5');
// let form = document.querySelector('#rating-form');

// console.log(form);

// star.addEventListener('click', function () {
//     let submitButton = document.querySelector('#submit-me');

//     if (submitButton == null) {
//         console.log('hello');
//         form.innerHTML += `<button type="submit" class="bg-transparent hover:bg-black text-black font-semibold hover:text-white py-2 px-4 border border-black-500 hover:border-transparent rounded">Button</button>`
//     }
// });