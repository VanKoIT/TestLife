const fieldsets = document.querySelectorAll('.question');
const answers = document.querySelectorAll('.questions-list__answer');
const resultTestBtn = document.querySelector('.test-content__forms-submit-btn');
const tesultText = document.querySelector('.test-content__result-text');
const detailLink = document.querySelector('.detail-link');

// Swiper

let mySwiper = new Swiper('.swiper-container', {

    speed: 400,
    spaceBetween: 0,
    slidesPerView: 1,
    autoHeight: true,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
})

// Test begin

const controlBtns = document.querySelector('.test__control-btns');
const counterQuestions = document.querySelector('.test__counter-questions');
const infoPage = document.querySelector('.test-content__info');
const questionsList = document.querySelector('.questions-list');
const nextQuestBtn = document.querySelector('.swiper-button-next');
const prevQuestBtn = document.querySelector('.swiper-button-prev');

const actualQuest = document.querySelector('.test__actual-question');
const totalQuest = document.querySelector('.test__total-questions');

let findActiveQuest = function() {
    let questList = document.querySelectorAll('.questions-list__item');
    totalQuest.textContent = questList.length;
    for (let i = 0; i < questList.length; i++) {
        if (questList[i].classList.contains('swiper-slide-active')) {
            actualQuest.textContent = i + 1;
        }
    }
}
findActiveQuest();
nextQuestBtn.addEventListener('click', findActiveQuest);
prevQuestBtn.addEventListener('click', findActiveQuest);
// Show resultTestBtn

let foundCheckedAnswers = function() {
    let checkedAnswers = document.querySelectorAll('input[type=radio]:checked');

    if (checkedAnswers.length === fieldsets.length) {
        resultTestBtn.classList.remove('hidden');
    } else {
        resultTestBtn.classList.add('hidden');
    }
}

// When ckeck answer

answers.forEach(function(elem) {
    elem.addEventListener('change', foundCheckedAnswers);

    // elem.addEventListener('change', (evt) => {
    //     evt.preventDefault();
    //     postResponse('http://l91287uv.beget.tech/result');
    // });
});


