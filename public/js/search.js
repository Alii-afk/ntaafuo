document.addEventListener("DOMContentLoaded", function () {
    const search = document.getElementById("search");
    if (search) {
        search.addEventListener("click", function () {
            // Fetch the telephone number and update the span
            fetchRequiredUsers();
        });
    }

    function fetchRequiredUsers() {
        const city = encodeURIComponent(document.getElementById("city").value);
        const town = encodeURIComponent(document.getElementById("town").value);
        const type = encodeURIComponent(document.getElementById("type").value);
        
         // Check if any of the inputs are empty
            if (city === "" || town === "" || type === "") {
                alert("Please fill in all the required fields.");
                return;
            }
            
        const url = `/show-result?city=${city}&town=${town}&type=${type}`; // Include city and town in the URL
        console.log(url);
        fetch(url, {
            method: "GET", // Use GET method
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Content-Type": "application/json",
                Accept: "application/json",
            },
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data.users);
                // Get the mainCont element
                const mainCont = document.querySelector(".mainCont");
                const empty = document.querySelector(".empty");
                // Clear the existing content in mainCont
                mainCont.innerHTML = "";

                if (data.users.length === 0) {
                    empty.innerHTML = "";
                    // If data.users is empty, add the message
                    const label = document.createElement("label");
                    label.classList.add("emptySearch");
                    label.textContent =
                        "Oops, you are super unique. Unfortunately, we could not find you a match.";
                    empty.appendChild(label);
                    const label2 = document.createElement("label");
                    label2.classList.add("emptySearch2");
                    label2.textContent =
                        "Refine your search or come back later.";
                    empty.appendChild(label2);

                    const image = document.createElement("img");
                    image.src = `notfound.png`;
                    image.alt = "Not Found";
                    image.classList.add("NotFoundimage");
                    empty.appendChild(image);
                } else {
                    if (data.userType == "lessee") {
                        empty.innerHTML = "";
                        // Iterate through the received users data and create HTML elements
                        data.users.forEach((user) => {
                            
                            // Create the outer div with class "card roomie-1"
                            const cardDiv = document.createElement("div");
                            cardDiv.classList.add("card", "roomie-1");
                            
                            // Create the first inner div with class "roomie-2"
                            const innerDiv1 = document.createElement("div");
                            innerDiv1.classList.add("roomie-2");
                            
                            // Create an image element
                            const imageElement = document.createElement("img");
                            imageElement.src = `/images/${user.profilePicture}`;
                            imageElement.alt = "Person";
                            imageElement.classList.add("roomie-3");
                            
                            // Append the image element to the first inner div
                            innerDiv1.appendChild(imageElement);
                            
                            // Create the second inner div with class "roomie-4"
                            const innerDiv2 = document.createElement("div");
                            innerDiv2.classList.add("roomie-4");
                            
                            // Create an anchor element
                            const anchorElement = document.createElement("a");
                            anchorElement.href = `/detail/${user.email}`;
                            anchorElement.classList.add("roomie-5");
                            
                            // Create a paragraph element for the first name with class "roomie-6"
                            const firstNameParagraph = document.createElement("p");
                            firstNameParagraph.classList.add("roomie-6");
                            firstNameParagraph.textContent = user.firstName;
                            
                            // Create a paragraph element for tags with class "roomie-7"
                            const tagsParagraph = document.createElement("p");
                            tagsParagraph.classList.add("roomie-7");
                            tagsParagraph.textContent = `${user.tagOne}, ${user.tagTwo}, & ${user.tagThree}`;
                            
                            // Create a text node for the location
                            const locationTextNode = document.createTextNode(`Location: ${user.town}`);
                            
                            // Append the elements to construct the structure
                            anchorElement.appendChild(firstNameParagraph);
                            anchorElement.appendChild(tagsParagraph);
                            anchorElement.appendChild(locationTextNode);
                            innerDiv2.appendChild(anchorElement);
                            
                            // Append the inner divs to the outer div
                            cardDiv.appendChild(innerDiv1);
                            cardDiv.appendChild(innerDiv2);
                            
                            // Now, you can append "cardDiv" to your desired location in the HTML document.

                            // Create a card element
                            // const card = document.createElement("div");
                            // card.classList.add("card");

                            // // Create an image element
                            // const image = document.createElement("img");
                            // image.src = `/images/${user.profilePicture}`;
                            // image.alt = "Person";
                            // image.classList.add("card__image");
                            // card.appendChild(image);

                            // // Create name and tags elements
                            // const name = document.createElement("p");
                            // name.classList.add("card__name");
                            // name.textContent = user.firstName;
                            // card.appendChild(name);

                            // const tags = document.createElement("p");
                            // tags.classList.add("card__name2");
                            // tags.textContent = `${user.tagOne}, ${user.tagTwo} & ${user.tagThree}`;
                            // card.appendChild(tags);

                            // // Create a link element
                            // const link = document.createElement("a");
                            // link.href = `/detail/${user.email}`;
                            // link.classList.add(
                            //     "btn",
                            //     "draw-border",
                            //     "sticky-button"
                            // );
                            // link.textContent = `Room wanted ${user.town}`;
                            // card.appendChild(link);

                            // Append the card element to mainCont
                            mainCont.appendChild(cardDiv);
                        });
                    } else if (data.userType == "lessor") {
                        console.log()
                        empty.innerHTML = "";
                         var k = 1;  
                        // Iterate through the received users data and create HTML elements
                        data.users.forEach((user) => {
                       console.log(k);
                        const carouselmain = document.createElement("div");
                        
                            const carouselId = `carouselExampleIndicators`+k;
    
                            // Create a carousel element
                            const carousel = document.createElement("div");
                            carousel.id = carouselId;
                            carousel.classList.add("carousel", "class-cour-1");
                            carousel.setAttribute("data-ride", "carousel");
                            carouselmain.appendChild(carousel);
    
                                // Create the carousel indicators (ol)
                                const carouselIndicators = document.createElement("ol");
                                carouselIndicators.classList.add("carousel-indicators");
                                carousel.appendChild(carouselIndicators);
                            
                                    // Create the carousel indicators (li)
                                    const carouselIndicators2 = document.createElement("li");
                                    const carouselId2 = `#carouselExampleIndicators`+k;
                                    carouselIndicators2.setAttribute("data-target", carouselId2);
                                    carouselIndicators2.setAttribute("data-slide-to", "0");
                                    carouselIndicators2.classList.add("active");
                                    carouselIndicators.appendChild(carouselIndicators2);
                            
                                    // Create the carousel indicators (li)
                                    const carouselIndicators3 = document.createElement("li");
                                    carouselIndicators3.setAttribute("data-target", carouselId2);
                                    carouselIndicators3.setAttribute("data-slide-to", "1");
                                    carouselIndicators.appendChild(carouselIndicators3);
                                    
                                    // Create the carousel indicators (li)
                                    const carouselIndicators4 = document.createElement("li");
                                    carouselIndicators4.setAttribute("data-target", carouselId2);
                                    carouselIndicators4.setAttribute("data-slide-to", "2");
                                    carouselIndicators.appendChild(carouselIndicators4);
    
                                // Create the carousel slides (div)
                                const carouselSlides = document.createElement("div");
                                carouselSlides.classList.add("carousel-inner", "cor-size", "class-cour-1", "class-cour-2");
                                carousel.appendChild(carouselSlides);
                                    
                                       
                                    // Create the carousel Image Div (div)
                                    const carouselImgDiv = document.createElement("div");
                                    carouselImgDiv.classList.add("active", "carousel-item", "class-cour-1", "class-cour-2");
                                    carouselSlides.appendChild(carouselImgDiv);
                                    
                                        // Create the carousel Image (img)
                                        const imgElement = document.createElement("img");
                                        imgElement.classList.add("d-block", "class-cour-3", "class-cour-2");
                                        imgElement.src = `/images/${user.imageData1}`;
                                        imgElement.alt = "First slide";
                                        carouselImgDiv.appendChild(imgElement);
                                    
                                    // Create the carousel Image Div 2 (div)
                                    const carouselImgDiv2 = document.createElement("div");
                                    carouselImgDiv2.classList.add("carousel-item", "class-cour-1", "class-cour-2");
                                    carouselSlides.appendChild(carouselImgDiv2);
                                    
                                        // Create the carousel Image 2 (img)
                                        const imgElement2 = document.createElement("img");
                                        imgElement2.classList.add("d-block", "class-cour-3", "class-cour-2");
                                        imgElement2.src = `/images/${user.imageData2}`;
                                        imgElement2.alt = "Second slide";
                                        carouselImgDiv2.appendChild(imgElement2);
                                    
                                    // Create the carousel Image Div 3 (div)
                                    const carouselImgDiv3 = document.createElement("div");
                                    carouselImgDiv3.classList.add("carousel-item", "class-cour-1", "class-cour-2");
                                    carouselSlides.appendChild(carouselImgDiv3);
                                    
                                        // Create the carousel Image 3 (img)
                                        const imgElement3 = document.createElement("img");
                                        imgElement3.classList.add("d-block", "class-cour-3", "class-cour-2");
                                        imgElement3.src = `/images/${user.imageData3}`;
                                        imgElement3.alt = "Third slide";
                                        carouselImgDiv3.appendChild(imgElement3);
                                
                                // Create a prevControl element
                                const prevControl = document.createElement("a");
                                prevControl.href = carouselId2;
                                prevControl.classList.add( "carousel-control-prev" );
                                prevControl.setAttribute("role", "button");
                                prevControl.setAttribute("data-slide", "prev");
                                carousel.appendChild(prevControl);
                                
                                    // Create the "Previous" control content
                                    const prevIcon = document.createElement("span");
                                    prevIcon.setAttribute("aria-hidden", "true");
                                    prevIcon.classList.add("class-cour-4");
                                    prevIcon.textContent = "❮";
                                    prevControl.appendChild(prevIcon);
                                    
                                    const prevText = document.createElement("span");
                                    prevText.classList.add("sr-only");
                                    prevText.textContent = "Previous";
                                    prevControl.appendChild(prevText);
                                
                                // Create a link element for the "Next" control
                                const nextControl = document.createElement("a");
                                nextControl.classList.add("carousel-control-next");
                                nextControl.href = carouselId2;
                                nextControl.setAttribute("role", "button");
                                nextControl.setAttribute("data-slide", "next");
                                carousel.appendChild(nextControl);
                                
                                    // Create the "Next" control content
                                    const nextIcon = document.createElement("span");
                                    nextIcon.setAttribute("aria-hidden", "true");
                                    nextIcon.classList.add("class-cour-4");
                                    nextIcon.textContent = "❯";
                                    nextControl.appendChild(nextIcon);
                                    
                                    const nextText = document.createElement("span");
                                    nextText.classList.add("sr-only");
                                    nextText.textContent = "Next";
                                    nextControl.appendChild(nextText);
                                   
                            // Create a div element with the specified class
                            const divElement = document.createElement("div");
                            divElement.classList.add("class-cour-8");
                            carouselmain.appendChild(divElement);
                            
                                // Create an anchor element
                                const anchorElement = document.createElement("a");
                                anchorElement.href = `/detail/${user.email}`;
                                anchorElement.classList.add("class-cour-5");
                                
                                // Create a paragraph element for the first name
                                const firstNameParagraph = document.createElement("p");
                                firstNameParagraph.classList.add("class-cour-6");
                                firstNameParagraph.textContent = user.firstName;
                                
                                // Create a paragraph element for tags 
                                const tagsParagraph = document.createElement("p");
                                tagsParagraph.classList.add("class-cour-7");
                                tagsParagraph.textContent = `${user.tagOne}, ${user.tagTwo} & ${user.tagThree}`;
                                
                                // Create a text node for the location
                                const locationTextNode = document.createTextNode(`Location: ${user.town}`);
                                
                                // Append the elements to construct the structure
                                anchorElement.appendChild(firstNameParagraph);
                                anchorElement.appendChild(tagsParagraph);
                                anchorElement.appendChild(locationTextNode);
                                divElement.appendChild(anchorElement);        
    
                        // Add the carousel element to the main container
                        mainCont.appendChild(carouselmain);
    
                        // Increment k for the next carousel
                        k++;
                    });
                        // console.log(data);
                        // empty.innerHTML = "";
                        // // Iterate through the received users data and create HTML elements
                        // data.users.forEach((user) => {
                        //     console.log(user + "saddsad");
                        //     // Create a card element
                        //     const card = document.createElement("div");
                        //     card.classList.add("card");

                        //     const cardContainer = document.createElement("div");
                        //     cardContainer.classList.add(
                        //         "circle-images-container"
                        //     );
                        //     card.appendChild(cardContainer);

                        //     const imageContainer =
                        //         document.createElement("div");
                        //     imageContainer.classList.add("circle-image");
                        //     cardContainer.appendChild(imageContainer);

                        //     const imageContainer2 =
                        //         document.createElement("div");
                        //     imageContainer2.classList.add("circle-image2");
                        //     cardContainer.appendChild(imageContainer2);

                        //     // Create an image element
                        //     const image = document.createElement("img");
                        //     image.src = `/images/${user.profilePicture}`;
                        //     image.alt = "Person";
                        //     image.classList.add("card__image3");
                        //     imageContainer.appendChild(image);

                        //     // Create an image 2 element
                        //     const image2 = document.createElement("img");
                        //     image2.src = `/images/${user.imageData1}`;
                        //     image2.alt = "Person";
                        //     image2.classList.add("card__image3");
                        //     imageContainer2.appendChild(image2);

                        //     // Create name and tags elements
                        //     const name = document.createElement("p");
                        //     name.classList.add("card__name");
                        //     name.textContent = user.firstName;
                        //     card.appendChild(name);

                        //     const tags = document.createElement("p");
                        //     tags.classList.add("card__name2");
                        //     tags.textContent = `${user.tagOne}, ${user.tagTwo} & ${user.tagThree}`;
                        //     card.appendChild(tags);

                        //     // Create a link element
                        //     const link = document.createElement("a");
                        //     link.href = `/detail/${user.email}`;
                        //     link.classList.add(
                        //         "btn",
                        //         "draw-border",
                        //         "sticky-button"
                        //     );
                        //     link.textContent = `Roomie wanted ${user.town}`;
                        //     card.appendChild(link);

                        //     mainCont.appendChild(card);
                        // });
                    }
                }
            })
            .catch((error) => {
                console.error("Error fetching search data:", error);
            });
    }
});

// Get the label element and the copy span element
const referalLabel = document.getElementById("referalLabel");

if (referalLabel) {
    
    const copySpan = referalLabel.querySelector(".copy-span");
const referalLabel1 = document.getElementById("referalLabel1");
    // Add a click event listener to the copy span
    copySpan.addEventListener("click", () => {
        // Get the text content of the label
        const referalText = referalLabel1.textContent.trim();

        // Create a temporary input element and set its value to the text
        const tempInput = document.createElement("input");
        tempInput.value = referalText;

        // Append the input element to the document
        document.body.appendChild(tempInput);

        // Select the text inside the input element
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // For mobile devices

        // Copy the selected text to the clipboard
        document.execCommand("copy");

        // Remove the temporary input element
        document.body.removeChild(tempInput);

        // Provide visual feedback (e.g., change the text of the copy span)
        copySpan.textContent = "Copied!";

        // Reset the text after a brief delay (optional)
        setTimeout(() => {
            copySpan.textContent = "Copy";
        }, 2000);
    });
}
