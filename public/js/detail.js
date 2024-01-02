document.addEventListener("DOMContentLoaded", function () {
    const revealBtn = document.querySelector(".reveal-btn");
    const telephoneNoSpan = document.getElementById("telephoneNo");
    var hiddenEmailInput = document.getElementById("hidden-email");
    if (hiddenEmailInput) {
        var email = hiddenEmailInput.value;
    }

    if (revealBtn) {
        revealBtn.addEventListener("click", function () {
            // Fetch the telephone number and update the span
            fetchTelephoneNoAndUpdateSpan(email);
        });
    }

    function fetchTelephoneNoAndUpdateSpan(email) {
        const url = `/reveal-no/` + email;
        console.log(url);
        fetch(url, {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Content-Type": "application/json",
                Accept: "application/json",
            },
        })
            .then((response) => response.json())
            .then((data) => {
                telephoneNoSpan.textContent = data.telephoneNo;

                // Increment noOfReveals
                updateNoOfReveals();
            })
            .catch((error) => {
                console.error("Error fetching telephone number:", error);
            });
    }
    function updateNoOfReveals() {
        const url = `/updateNoOfReveals`;
        fetch(url, {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Content-Type": "application/json",
                Accept: "application/json",
            },
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
            })
            .catch((error) => {
                console.error("Failed", error);
            });
    }
});
