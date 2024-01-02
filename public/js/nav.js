// window.onload = function () {
//     getLogginedProfile();
// };

// function getLogginedProfile() {
//     const url = `/getLogginedProfile`;
//     fetch(url, {
//         method: "GET",
//         headers: {
//             "X-Requested-With": "XMLHttpRequest",
//             "Content-Type": "application/json",
//             Accept: "application/json",
//         },
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             console.log(data);
//             const profileLogo = document.getElementById("profileLogo");
//             if (profileLogo && data.loginUser.firstName) {
//                 // Get the first letter and set it to uppercase
//                 const firstLetter = data.loginUser.firstName.charAt(0).toUpperCase();
//                 profileLogo.innerHTML = firstLetter;
//                 console.log(firstLetter);
//             }
//         })
//         .catch((error) => {
//             console.error("Failed", error);
//         });
// }
