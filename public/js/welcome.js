// Swiper

let swipers = document.querySelectorAll('.swiper-container');

swipers.forEach(function(elem) {
    let mySwiper = new Swiper(elem, {

        speed: 400,
        spaceBetween: 30,
        slidesPerView: 3,
        autoHeight: true,

        navigation: {
            nextEl: elem.parentNode.querySelector('.swiper-button-next'),
            prevEl: elem.parentNode.querySelector('.swiper-button-prev'),
        },
    })
})

// Fetch

const forms = document.querySelectorAll('form');

forms.forEach(function(form) {
    form.addEventListener('submit', {
        async function(e) {
            e.preventDefault();
            let URL = form.action;

            let response = fetch(URL, {
                method: 'POST',
                body: new FormData(form)
            })
                .then(response.json())
                .catch(error => console.log(error))


        }
    })
})

// Fixed Header

const header = document.querySelector('.header');
const testsHeight =  document.querySelector('.tests').offsetTop;
const nav = document.querySelector('.nav');

const body = document.querySelector('body');
const regBtn = document.querySelector('.header__user');
const modal = document.querySelector('.modal');
const modalForm = document.querySelector('.modal__window');
const deleteBtns = document.querySelectorAll('.delete-btn');
const likes = document.querySelectorAll('.like-btn');

deleteBtns.forEach(function(elem) {
    elem.addEventListener('click', function(e) {
        e.preventDefault();
        let target = e.target;
        let deleteElem = target.closest('.test-preview');
        deleteTest(deleteElem, true);
    })
})

let fixedHeader = function() {
    let scrollOffset = window.pageYOffset;
    if (scrollOffset >= testsHeight) {
        nav.classList.add('show');
        header.classList.add('fixed');
    } else {
        nav.classList.remove('show');
        header.classList.remove('fixed');
    }
}

fixedHeader();
window.addEventListener('scroll', fixedHeader);

// Show modal

/*regBtn.addEventListener('click', function(evt) {
    evt.preventDefault();
    body.classList.add('no-scroll');
    modal.classList.add('show');

    let stopProp = function(evt) {
        evt.stopPropagation();
    }

    let closeModal = function(evt) {
        evt.preventDefault();
        body.classList.remove('no-scroll');
        modal.classList.remove('show');
        modal.removeEventListener('click', closeModal);
        modalForm.removeEventListener('click', stopProp)
    }

    modal.addEventListener('click', closeModal)
    modalForm.addEventListener('click', stopProp)
})*/


// Toggle forms

const modalTitle = document.querySelector('.modal__title');

// hearts change

likes.forEach(function(elem) {

    elem.addEventListener('click', (event) => {
        event.preventDefault();
        elem.classList.toggle('pressed');
        let press = elem.classList.contains('pressed');
        let quantity = elem.previousElementSibling;

        if (press) {
            quantity.innerHTML++;
            postData('like/add', elem);
        } else {
            quantity.innerHTML--;
            postData('like/delete', elem);
        }
    })
})

// Footer info

let footerInfoAbout = document.querySelector('.footer__info-about');
let footerInfoService = document.querySelector('.footer__info-service');
let footerAbout = document.querySelector('.footer__about');
let footerService = document.querySelector('.footer__service');

footerAbout.addEventListener('click', () => {
    footerInfoAbout.classList.toggle('hidden');
   let showService = footerInfoService.classList.contains('hidden');
   if (!showService) {
       footerInfoService.classList.add('hidden');
   };
});

footerService.addEventListener('click', () => {
   footerInfoService.classList.toggle('hidden');
   let showService = footerInfoAbout.classList.contains('hidden');
   if (!showService) {
       footerInfoAbout.classList.add('hidden');
   };
});