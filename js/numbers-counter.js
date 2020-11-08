const counterDisplays = document.querySelectorAll("number-counter");
const counterSpeed = 250; //Lower value equales lower speed

counterDisplays.forEach(counterDisplay => {
    const updateDisplayCount = () => {
        const targetValue = +counterDisplay.getAttribute('data-target');
        const currentValue = +counterDisplay.innerText;

        //Adjust the increasing of values to the selected speed
        const increase = targetValue / counterSpeed;

        //Increase value by variable increase till the target (the value that should be displayed) is reached
        if (currentValue < targetValue) {
            counterDisplay.innerText = currentValue + increase;
            //This function is called recursive every second
            setTimeout(updateDisplayCount, 1);
        } else {
            counterDisplay.innerText = targetValue;
        }
    }

    updateDisplayCount();
});