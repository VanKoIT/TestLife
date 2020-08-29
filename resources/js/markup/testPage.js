const testForm = document.querySelector('.questions-list');
const fieldsets = document.querySelectorAll('.question');
const answers = document.querySelectorAll('.questions-list__answer');
const resultTestBtn = document.querySelector('.test-content__forms-submit-btn');
const tesultText = document.querySelector('.test-content__result-text');
const detailLink = document.querySelector('.detail-link');
// Fetch

// Отправка решенного теста для получения результата
let sendTest = function(form) {
    let URL = '/result';
    let answers = [];

    fieldsets.forEach((fieldset) => {
        let answerName = fieldset.querySelector('input[type=radio]:checked').dataset.answer;
        answers.push(answerName);
    })

    let requestBody = JSON.stringify({
        answers
    });
    let errorText = `К сожалению, отправить ответы не удалось`;
    fetch(URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body:requestBody
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                tesultText.textContent = errorText;
            }
        })
        .then(data=> {
            tesultText.textContent = `Поздравляем, вы прошли тест. Правильно ${data.correct} из ${answers.length}.`;
            detailLink.href=data.detail_link;
        })
        .catch(error => {
            tesultText.textContent = errorText;
        })
}

testForm.addEventListener('submit', (evt) => {
    evt.preventDefault();
    sendTest(testForm)
});

// По кнопке "продолжить" пользователю должен вылазить вопрос на котором остановился
// const continueBtn = document.querySelector('.test__continue');
// По кнопке "начать заново", тест должен обнулиться и начаться заново
// const startBtn = document.querySelector('.test__start');

// Должно перейти на предыдущую страницу
let userPage = document.querySelector('.header__user');

let getResponse = function(URL) {

    let response = fetch(URL, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify()
    })
        .then(response => {
            if (response.ok) {
                response.json()
            }
        })
        .catch(error => console.log(error))
}

/*closeTestBtn.addEventListener('click', (evt) => {
    evt.preventDefault();
    getResponse('someURL')
});*/

// userPage.addEventListener('click', (evt) => {
//     evt.preventDefault();
//     getResponse('someURL')
// });

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

const beginBtn = document.querySelector('.test-content__begin');
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

let testBegin = function() {
    // controlBtns.classList.add('hidden');
    infoPage.classList.add('hidden');
    questionsList.classList.remove('hidden');
    nextQuestBtn.classList.remove('hidden');
    prevQuestBtn.classList.remove('hidden');
    counterQuestions.classList.remove('hidden');

    // continueBtn.removeEventListener('click', testBegin);
    // startBtn.removeEventListener('click', testBegin);
    beginBtn.removeEventListener('click', testBegin);

    findActiveQuest();
    nextQuestBtn.addEventListener('click', findActiveQuest);
    prevQuestBtn.addEventListener('click', findActiveQuest);
}

// continueBtn.addEventListener('click', testBegin);
// startBtn.addEventListener('click', testBegin);
beginBtn.addEventListener('click', testBegin);

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

// Show result of test

const resultPage = document.querySelector('.test-content__result');

let showResultTest = function() {

    resultPage.classList.remove('hidden');
    questionsList.classList.add('hidden');
    nextQuestBtn.classList.add('hidden');
    prevQuestBtn.classList.add('hidden');
    counterQuestions.classList.add('hidden');

    nextQuestBtn.removeEventListener('click', findActiveQuest);
    prevQuestBtn.removeEventListener('click', findActiveQuest);

    answers.forEach(function(elem) {
        elem.removeEventListener('change', foundCheckedAnswers);
        // elem.removeEventListener('change', postResponse);
    })

    resultTestBtn.classList.add('hidden');
}

resultTestBtn.addEventListener('click', showResultTest);

