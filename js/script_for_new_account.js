// Get all the radio buttons and put them into an array
var radioButtons = Array.from(document.querySelectorAll("input[type='radio']"));

// Loop through the array of radio buttons
radioButtons.forEach(function (btn) {
    // Set up a click event handling function for each button
    btn.addEventListener("click", radioWithText);
});

// No need to pass any data to this function because the button that triggers it
// ("this" in the code below) can just look at its own HTML value to know what the
// meaning of the button is.
function radioWithText() {
    // Get references to the elements the function needs to work with.
    var specialization = document.getElementById('specialization');
    if (this.value === "1") {
        // Instead of gettting/setting inline styles with the style property, just add
        // or remove pre-made CSS classes. Since all the textboxes and labels start out
        // with the CSS "hidden" class applied to them, it's just a matter of adding that
        // class or removing it as necessary.
        specialization.classList.remove("hidden");
    } else {
        specialization.classList.add("hidden");

    }
}