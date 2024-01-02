// Get references to the select boxes
const citySelect = document.getElementById("city");
const townSelect = document.getElementById("town");

// Define town options for each city
const towns = {
    Accra: [
        "East Legon",
        "Dzorwulu",
        "Airport Residential Area",
        "Tema",
        "Spintex",
        "Ashaiman",
        "Osu",
        "Cantoment",
        "Labone",
        "Madina",
        "Dansoman",
        "Nima",
        "Tesano",
        "Accra New Town",
        "Legon",
        "Tse Addo",
        "Sakumono",
        "Kokomlemle",
        "Roman Ridge",
        "Kaneshie",
        "Nima",
        "Achimota",
        "Nungua",
        "Adabraka",
        "Teshie",
        "North Legon",
        "Prampram",
    ],
    Kumasi: [
        "Sofo Line",
        "Santasi",
        "Patasi",
        "Oduom",
        "Ahodwo",
        "Anwomaso",
        "Asem",
        "Asokore Mampong",
        "Bantama",
        "Boadi",
        "Bomso",
        "Danyame",
        "Fumesua",
        "Kaase",
        "Kejetia Market",
        "Ayigya",
        "Atasemanso",
        "Asokwa",
        "Kentinkrono",
        "Kotei",
        "Maxima",
        "Nhyiaeso",
    ],
};

// Function to populate the town select box
function populateTowns(city) {
    // Clear previous options
    townSelect.innerHTML = '<option value="">--Select Town--</option>';

    // Add options based on the selected city
    towns[city].forEach((town) => {
        const option = document.createElement("option");
        option.value = town;
        option.textContent = town;
        townSelect.appendChild(option);
    });
}

if (citySelect) {
    // Event listener for city select box change
    citySelect.addEventListener("change", function () {
        const selectedCity = this.value;
        if (selectedCity) {
            populateTowns(selectedCity);
        } else {
            // Reset town select box when no city is selected
            townSelect.innerHTML = '<option value="">--Select Town--</option>';
        }
    });
}

const profileImageInput = document.getElementById("profileImage");
const profileImagePreview = document.getElementById("profileImagePreview");
const imagePreviewLabel = document.querySelector(".image-preview-label");

if (profileImageInput) {
    profileImageInput.addEventListener("change", function () {
        const file = profileImageInput.files[0];
        if (file) {
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    profileImagePreview.innerHTML = `<img src="${e.target.result}" alt="Profile Image" class="preview-image">`;
                };
                reader.readAsDataURL(file);
            } else {
                profileImageInput.value = null; // Clear input value
                profileImagePreview.innerHTML =
                    '<p class="error-message">Please select a valid image file.</p>';
            }
        } else {
            profileImagePreview.innerHTML = "";
        }
    });
}

if (imagePreviewLabel) {
    imagePreviewLabel.addEventListener("click", (e) => {
        e.preventDefault(); // Prevent default label behavior
        profileImageInput.click();
    });
}

document.addEventListener("DOMContentLoaded", function () {
    var telephoneInput = document.getElementById("telephoneNo");
    if (telephoneInput) {
        var mask = IMask(telephoneInput, {
            mask: "(+233) 000 000 0000",
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const replaceSpan = document.getElementById("replace_1");
    const profileImageInput = document.getElementById("profileImage1");

    if (replaceSpan) {
        // Add a click event listener to the span
        replaceSpan.addEventListener("click", function () {
            // Trigger a click event on the file input
            profileImageInput.click();
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const replaceSpan2 = document.getElementById("replace_2");
    const profileImageInput = document.getElementById("profileImage2");

    if (replaceSpan2) {
        // Add a click event listener to the span
        replaceSpan2.addEventListener("click", function () {
            // Trigger a click event on the file input
            profileImageInput.click();
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const replaceSpan3 = document.getElementById("replace_3");
    const profileImageInput = document.getElementById("profileImage3");

    if (replaceSpan3) {
        // Add a click event listener to the span
        replaceSpan3.addEventListener("click", function () {
            // Trigger a click event on the file input
            profileImageInput.click();
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const changePasswordInput = document.getElementById("changePassword");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const confirmAuthInput = document.getElementById("confirmAuth");

    // Add input event listeners to all three inputs
    if (changePasswordInput) {
        changePasswordInput.addEventListener("input", handleInput);
    }
    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener("input", handleInput);
    }
    if (confirmAuthInput) {
        confirmAuthInput.addEventListener("input", handleInput);
    }

    function handleInput() {
        // Check if any of the inputs has a value
        if (
            changePasswordInput.value ||
            confirmPasswordInput.value ||
            confirmAuthInput.value
        ) {
            // Set all inputs to required
            changePasswordInput.required = true;
            confirmPasswordInput.required = true;
            confirmAuthInput.required = true;
        } else {
            // Remove the required attribute from all inputs
            changePasswordInput.required = false;
            confirmPasswordInput.required = false;
            confirmAuthInput.required = false;
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const passwordForm = document.getElementById("passwordForm");
    const changePasswordInput = document.getElementById("changePassword");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const confirmAuthInput = document.getElementById("confirmAuth");

    if (passwordForm) {
        passwordForm.addEventListener("submit", function (event) {
            const password1 = changePasswordInput.value;
            const password2 = confirmPasswordInput.value;
            const typeChangeValue = confirmAuthInput.value;

            // Check if passwords do not match
            if (password1 !== password2) {
                // Prevent form submission
                event.preventDefault();
                alert(
                    "Passwords do not match. Please make sure they are the same."
                );
            }

            // Check if the "Type CHANGE" input has the correct value
            if (typeChangeValue != "" && typeChangeValue !== "CHANGE") {
                event.preventDefault();
                alert('Please enter "CHANGE" in the "Type CHANGE" field.');
            }

            var telephoneInput = document.getElementById("telephoneNo");
            var mask = IMask(telephoneInput, {
                mask: "(+233) 000 000 0000",
            });

            // Get the unmasked value
            var unmaskedValue = mask.unmaskedValue;

            if (unmaskedValue.length < 10) {
                event.preventDefault(); // Prevent form submission
                alert("Telephone number must have required digits.");
                // You can display the error message in a more user-friendly way
            }
        });
    }
});

var msg = document.getElementById("message");
if (msg) {
    var message = msg.value;
    if (message != "") {
        if (message != "Form Error") {
            showNotification(message);
        } else {
            showNotification3(message);
        }
    }
}

var msg2 = document.getElementById("new_login");
if (msg2) {
    var message2 = msg2.value;
    if (message2 != "") {
        showNotification(message2);
        console.log(message2);
    }
}

function showNotification(message) {
    const notificationBanner = document.querySelector(".notification-banner");
    const notificationMessage = document.querySelector("#notification-message");

    notificationMessage.textContent = message;
    notificationBanner.classList.add("show");

    setTimeout(function () {
        notificationBanner.classList.remove("show");
    }, 4000); // Hide after 4 seconds (4000 milliseconds)
}

function showNotification3(message3) {
    const notificationBanner3 = document.querySelector(".notification-banner3");
    const notificationMessage3 = document.querySelector(
        "#notification-message3"
    );

    notificationMessage3.textContent = message3;
    notificationBanner3.classList.add("show");

    setTimeout(function () {
        notificationBanner3.classList.remove("show");
    }, 5000); // Hide after 4 seconds (4000 milliseconds)
}
const citySelect1 = document.getElementById("city1");
const townSelect1 = document.getElementById("town1");

if (citySelect1) {
    // Event listener for city select box change
    citySelect1.addEventListener("change", function () {
        const selectedCity1 = this.value;
        if (selectedCity1) {
            populateTowns1(selectedCity1);
        } else {
            // Reset town select box when no city is selected
            townSelect1.innerHTML = '<option value="">--Select Town--</option>';
        }
    });
}

// Function to populate the town select box
function populateTowns1(city) {
    // Clear previous options
    townSelect1.innerHTML = '<option value="">--Select Town--</option>';

    // Add options based on the selected city
    towns[city].forEach((town) => {
        const option = document.createElement("option");
        option.value = town;
        option.textContent = town;
        townSelect1.appendChild(option);
    });
}

// Attach an event listener to the checkbox element
const checkboxActive = document.getElementById("activeUser");
if (citySelect1) {
    checkboxActive.addEventListener("change", function () {
        // Call the updateNoOfReveals function when the checkbox state changes
        updateActiveUser();
    });
}

function updateActiveUser() {
    const url = `/updateActiveUser`;
    const checkbox = document.getElementById("activeUser");
    const isChecked1 = checkbox.checked ? "on" : "off";
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    const inactSpan = document.getElementById("inact");
    const actSpan = document.getElementById("act");

    if (isChecked1 == "off") {
        // Checkbox is checked, set classes accordingly
        inactSpan.classList.remove("span-style1");
        inactSpan.classList.add("span-style");
        actSpan.classList.remove("span-style");
        actSpan.classList.add("span-style1");
    } else if (isChecked1 == "on") {
        // Checkbox is not checked, set classes accordingly
        inactSpan.classList.remove("span-style");
        inactSpan.classList.add("span-style1");
        actSpan.classList.remove("span-style1");
        actSpan.classList.add("span-style");
    }

    const data = {
        isChecked: isChecked1,
    };

    fetch(url, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
            "Content-Type": "application/json",
            Accept: "application/json",
        },
        body: JSON.stringify(data), // Convert data to JSON if needed
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            // Check the content type of the response
            const contentType = response.headers.get("content-type");
            if (contentType && contentType.includes("application/json")) {
                return response.json(); // Parse as JSON if it's valid JSON
            } else {
                throw new Error("Response was not valid JSON");
            }
        })
        .then((data) => {
            if (data.type == "Active") {
                showNotification11(data.success);
            } else if (data.type == "Inactive") {
                showNotification33(data.success);
            }
        })
        .catch((error) => {
            console.log(error);
        });
}

function showNotification11(message) {
    const notificationBanner = document.querySelector(".notification-banner");
    const notificationMessage = document.querySelector("#notification-message");

    notificationMessage.textContent = message;
    notificationBanner.classList.add("show");

    setTimeout(function () {
        notificationBanner.classList.remove("show");
    }, 1000); // Hide after 4 seconds (4000 milliseconds)
}

function showNotification33(message3) {
    const notificationBanner3 = document.querySelector(".notification-banner3");
    const notificationMessage3 = document.querySelector(
        "#notification-message3"
    );

    notificationMessage3.textContent = message3;
    notificationBanner3.classList.add("show");

    setTimeout(function () {
        notificationBanner3.classList.remove("show");
    }, 1000); // Hide after 4 seconds (4000 milliseconds)
}
