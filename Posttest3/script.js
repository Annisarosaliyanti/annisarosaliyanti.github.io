const modeButton = document.getElementById('modeButton');
modeButton.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    document.body.classList.toggle('light-mode');
    modeButton.textContent = document.body.classList.contains('dark-mode') ? 'Light Mode' : 'Dark Mode';
});


const hamburgerMenu = document.getElementById('hamburgerMenu');
const navbar = document.getElementById('navbar');
hamburgerMenu.addEventListener('click', () => {
    navbar.classList.toggle('active');
});


const popupBox = document.getElementById('popupBox');
const closePopup = document.getElementById('closePopup');
const shopNowBtn = document.getElementById('shopNowBtn');


shopNowBtn.addEventListener('click', () => {
    popupBox.style.display = 'block';
});


closePopup.addEventListener('click', () => {
    popupBox.style.display = 'none';
});


const productCards = document.querySelectorAll('.product-card img');
productCards.forEach(card => {
    card.addEventListener('mouseover', () => {
        card.style.transform = 'scale(1.1)';
    });
    card.addEventListener('mouseout', () => {
        card.style.transform = 'scale(1)';
    });
});



