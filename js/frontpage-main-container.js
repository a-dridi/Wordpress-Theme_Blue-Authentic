/**
 * Create typed text animation with the keywords in the variable "textArray"
 */
(function mainContainerTextAnimation(){

    //CHANGE THIS TO TEXT CONTENT OF INDEX.HTML
    const textArray = ["affordable flat", "duplex", "holiday house", "modern studio appartment", "ranch-style house"];

    const typedTextSpan = document.querySelector(".typing-text");
    const cursorSpan = document.querySelector(".cursor");

    const typingDelay = 197;
    const erasingDelay = 101;
    const newTextDelay = 1700; //Duration before a new text is typed again
    
    let textArrayIndex = 0;
    let characterIndex = 0;

    /**
     * Type one character
     */
    function type() {
        if (characterIndex < textArray[textArrayIndex].length) {
            if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
            typedTextSpan.textContent += textArray[textArrayIndex].charAt(characterIndex);
            characterIndex++;
            setTimeout(type, typingDelay);
        }
        else {
            cursorSpan.classList.remove("typing");
            setTimeout(erase, newTextDelay);
        }
    }

    /**
     * Delete one character
     */
    function erase() {
        if (characterIndex > 0) {
            if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
            typedTextSpan.textContent = textArray[textArrayIndex].substring(0, characterIndex - 1);
            characterIndex--;
            setTimeout(erase, erasingDelay);
        }
        else {
            cursorSpan.classList.remove("typing");
            textArrayIndex++;
            if (textArrayIndex >= textArray.length) textArrayIndex = 0;
            setTimeout(type, typingDelay + 1100);
        }
    }

    //Load typing text effect on site load
    document.addEventListener("DOMContentLoaded", function () {
        if (textArray.length) setTimeout(type, newTextDelay - 1500);
    });

})();

