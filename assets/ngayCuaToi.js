
// Function to change the color of a clicked button and reset others
function changeColorPink(selectedButton) {
    // First, get all buttons with the class 'btn-emoji'
    var buttonsEmoji = document.getElementsByClassName('btn-emoji');

    // Loop through the NodeList object and reset the background color
    for (var i = 0; i < buttonsEmoji.length; i++) {
        buttonsEmoji[i].style.backgroundColor = ''; // Reset to default or any other color
    }

    // Now change the background color of the clicked button
    selectedButton.style.backgroundColor = 'rgba(252, 159, 159, 0.55)';
}

function changeColorBlue(selectedButton) {
    // First, get all buttons with the class 'btn-water'
    var buttonsWater = document.getElementsByClassName('btn-water');

    // Loop through the NodeList object and reset the background color
    for (var i = 0; i < buttonsWater.length; i++) {
        buttonsWater[i].style.backgroundColor = ''; // Reset to default or any other color
    }

    // Now change the background color of the clicked button
    selectedButton.style.backgroundColor = 'rgba(122, 248, 203, 0.77)';
}

function setEmojiValue(emojiNumber) {
    for (var i = 1; i <= 5; i++) {
        document.getElementById('emoji' + i).value = (i === emojiNumber) ? "1" : "0";
    }
}

function setWaterValue(waterNumber) {
    for (var i = 1; i <= 5; i++) {
        document.getElementById('water' + i).value = (i === waterNumber) ? "1" : "0";
    }
}