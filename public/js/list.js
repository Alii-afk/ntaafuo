function openImagePicker() {
    document.getElementById("hiddenInput").click();
}

    function validateForm() {
        // Check if all three images are selected
        const profileImageInput1 = document.getElementById("profileImage1");
        const profileImageInput2 = document.getElementById("profileImage2");
        const profileImageInput3 = document.getElementById("profileImage3");
console.log("asdsadad");
        if (!profileImageInput1.files.length || !profileImageInput2.files.length || !profileImageInput3.files.length) {
            alert("Please upload all three images.");
            return false; // Prevent form submission
        }

        // Additional validation logic can be added here

        return true; // Allow form submission
    }
function displaySelectedImages(input) {
    const numSelectedImages = input.files.length;

    const allowedFileTypes = ["image/jpeg", "image/png", "image/jpg"];
    if (numSelectedImages === 3) {
        const displayImages = [
            document.getElementById("displayImage1"),
            // document.getElementById("displayImage2"),
            // document.getElementById("displayImage3"),
        ];
        const hiddenInputs = [
            document.getElementById("imageData1"),
            // document.getElementById("imageData2"),
            // document.getElementById("imageData3"),
        ];

        const image = displayImages[i].querySelector("img");
        const file = input;

        if (!allowedFileTypes.includes(file.type)) {
            alert("Please select an image of type: jpeg, png, jpg.");
            input.value = ""; // Clear input
            return;
        }

        const maxFileSizeMB = 2; // Maximum allowed size in megabytes
        if (file.size / (1024 * 1024) > maxFileSizeMB) {
            alert("Selected image is too large. Maximum allowed size is 2MB.");
            input.value = ""; // Clear input
            return;
        }
    } else {
        alert("Please select 1 images.");
        input.value = "";
    }
}

const profileImageInput1 = document.getElementById("profileImage1");
const profileImagePreview1 = document.getElementById("profileImagePreview1");
const imagePreviewLabel1 = document.querySelector(".image-preview-label1");

if (profileImageInput1) {
    profileImageInput1.addEventListener("change", function () {
        const file1 = profileImageInput1.files[0];
        if (file1) {
            if (file1.type.startsWith("image/")) {
                const reader1 = new FileReader();
                reader1.onload = function (e) {
                    profileImagePreview1.innerHTML = `<img src="${e.target.result}" alt="Profile Image" class="preview-image">`;
                };
                reader1.readAsDataURL(file1);
            } else {
                profileImageInput1.value = null; // Clear input value
                profileImagePreview1.innerHTML =
                    '<p class="error-message">Please select a valid image file.</p>';
            }
        } else {
            profileImagePreview1.innerHTML = "";
        }
    });
}

const profileImageInput2 = document.getElementById("profileImage2");
const profileImagePreview2 = document.getElementById("profileImagePreview2");
const imagePreviewLabel2 = document.querySelector(".image-preview-label2");

if (profileImageInput2) {
    profileImageInput2.addEventListener("change", function () {
        const file2 = profileImageInput2.files[0];
        if (file2) {
            if (file2.type.startsWith("image/")) {
                const reader2 = new FileReader();
                reader2.onload = function (e) {
                    profileImagePreview2.innerHTML = `<img src="${e.target.result}" alt="Profile Image" class="preview-image">`;
                };
                reader2.readAsDataURL(file2);
            } else {
                profileImageInput2.value = null; // Clear input value
                profileImagePreview2.innerHTML =
                    '<p class="error-message">Please select a valid image file.</p>';
            }
        } else {
            profileImagePreview2.innerHTML = "";
        }
    });
}

const profileImageInput3 = document.getElementById("profileImage3");
const profileImagePreview3 = document.getElementById("profileImagePreview3");
const imagePreviewLabel3 = document.querySelector(".image-preview-label3");

if (profileImageInput3) {
    profileImageInput3.addEventListener("change", function () {
        const file3 = profileImageInput3.files[0];
        if (file3) {
            if (file3.type.startsWith("image/")) {
                const reader3 = new FileReader();
                reader3.onload = function (e) {
                    profileImagePreview3.innerHTML = `<img src="${e.target.result}" alt="Profile Image" class="preview-image">`;
                };
                reader3.readAsDataURL(file3);
            } else {
                profileImageInput3.value = null; // Clear input value
                profileImagePreview3.innerHTML =
                    '<p class="error-message">Please select a valid image file.</p>';
            }
        } else {
            profileImagePreview3.innerHTML = "";
        }
    });
}
