Ass, [3/25/2023 4:36 PM]
<html>

<head>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 40px;
        }

        .nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #eee;
            padding: 10px;
        }

        .nav a {
            text-decoration: none;
            color: black;
        }

        .nav a:hover {
            color: blue;
        }

        .main {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
        }

        .main .card {
            flex: 1 1 300px;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .main .card img {
            width: 100%;
            height: auto;
        }

        .main .card h3 {
            text-align: center;
        }

        .main .card p {
            text-align: justify;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Add this code at the end of the style section */

        /* This applies to screens that are 768px or smaller */
        @media (max-width: 768px) {

            /* Make the nav items stack vertically */
            .nav {
                flex-direction: column;
            }

            /* Make the main cards stack vertically and take full width */
            .main {
                flex-direction: column;
            }

            .main .card {
                flex: 1 1 100%;
            }
        }

        /* Define some styles for the contact form */
        #contact-form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        #contact-form fieldset {
            border: none;
        }

        #contact-form legend {
            font-weight: bold;
        }

        #contact-form label {
            display: block;
            margin-top: 10px;
        }

        #contact-form input,
        #contact-form textarea {
            display: block;
            width: 80%;
            margin-bottom: 10px;
        }

        #contact-form #submit {
            width: 20%;
        }

        /* This applies to screens that are 480px or smaller */
        @media (max-width: 480px) {

            /* Make the header text smaller */
            .header h1 {
                font-size: 30px;
            }
        }

        /* Add this code at the end of the style section */

        /* Define a keyframe animation named bounce */
        @keyframes bounce {

            /* Start from the original position */
            0% {
                transform: translateY(0);
            }

            /* Move up by 20px */
            50% {
                transform: translateY(-20px);
            }

            /* Return to the original position */
            100% {
                transform: translateY(0);
            }
        }

        /* Apply the bounce animation to the header text */
        .header h1 {
            animation: bounce 1s infinite;
        }

        /* Define a keyframe animation named fade */
        @keyframes fade {

            /* Start from transparent */
            0% {
                opacity: 0;
            }

            /* End with opaque */
            100% {
                opacity: 1;
            }
        }

        /* Apply the fade animation to the main cards */
        .main .card {
            animation: fade 2s;
        }

        /* Add this code at the end of the style section */

        /* Define a transition for the nav links */
        .nav a {
            transition: color 0.5s;
        }

        /* Change the color of the nav links when hovered */
        .nav a:hover {
            color: red;
        }

        /* Define a transition for the main card images */
        .main .card img {
            transition: transform 0.5s;
        }

        /* Scale up the main card images when hovered */
        .main .card img:hover {
            transform: scale(1.1);
        }
    </style>
    <!-- Add this code at the end of the body section -->

    <!-- Create a script tag to write JavaScript code -->
    <script>
        // Get the contact card element by its id
        var contactCard = document.getElementById("contact");

        // Create a function that shows the contact info when clicked
        function showContact() {
            // Create a paragraph element to display the contact info
            var contactInfo = document.createElement("p");
            // Set the text content of the paragraph element
            contactInfo.textContent = "You can contact me at your-email@example.com";
            // Append the paragraph element to the contact card element
            contactCard.appendChild(contactInfo);
            // Remove the click event listener from the contact card element
            contactCard.removeEventListener("click", showContact);
        }

        // Add a click event listener to the contact card element
        contactCard.addEventListener("click", showContact);
    </script>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to my portfolio website</h1>
        </div>
        <div class="nav">
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#history">History</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="main">
            <div class="card" id="about">
                <img src="your-image.jpg" alt="Your image">
                <h3>Your name</h3>
                <p>A brief introduction about yourself. What are your interests, hobbies, goals, etc.</p>
            </div>
            <div class="card" id="skills">
                <h3>My skills</h3>
                <p>A list of your skills and abilities. You can use bullet points or icons to showcase them.</p>
                <ul>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>JavaScript</li>
                    <!-- Add more skills as you like -->
                </ul>
            </div>
            <div class="card" id="history">
                <h3>My history</h3>
                <p>A summary of your education and work experience. You can use a timeline or a table to display them.
                </p>
                <!-- Example of a timeline -->
                <ul>
                    <li>2020 - Present: Web developer at ABC company</li>
                    <li>2018 - 2020: Web design course at XYZ institute</li>
                    <li>2016 - 2018: Bachelor of Computer Science at LMN university</li>
                    <!-- Add more history as you like -->
                </ul>
                <!-- Example of a table -->
                
        <table>
          <tr>
            <th>Year</th>
            <th>Education</th>
            <th>Work</th>
          </tr>
          <tr>
            <td>2020 - Present</td>
            <td>-</td>
            <td>Web developer at ABC company</td>
          </tr>
          <tr>
            <td>2018 - 2020</td>
            <td>Web design course at XYZ institute</td>
            <td>-</td>
          </tr>
          <tr>
            <td>2016 - 2018</td>
            <td>Bachelor of Computer Science at LMN university</td>
            <td>-</td>
          </tr>

        </table>
 

                <!-- Create a script tag to write JavaScript code -->
                <script>
                    // Get the contact card element by its id
                    var contactCard = document.getElementById("contact");

                    // Create a function that shows the contact info when clicked
                    function showContact() {
                        // Get the user input from a prompt window
                        var userInput = prompt("Please enter your email address");
                        // Create a regular expression to validate the email format
                        var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                        // Test if the user input matches the email format
                        if (emailRegex.test(userInput)) {
                            // Create a paragraph element to display the contact info
                            var contactInfo = document.createElement("p");
                            // Set the text content of the paragraph element
                            contactInfo.textContent = "You can contact me at your-email@example.com";
                            // Append the paragraph element to the contact card element
                            contactCard.appendChild(contactInfo);
                            // Remove the click event listener from the contact card element
                            contactCard.removeEventListener("click", showContact);
                        } else {
                            // Alert the user that the input is invalid
                            alert("Invalid email address. Please try again.");
                        }
                    }

                    // Add a click event listener to the contact card element
                    contactCard.addEventListener("click", showContact);
                </script>
                <!-- Add this code at the end of the body section -->

                <!-- Create a script tag to write JavaScript code -->
                <script>
                    // Get the contact card element by its id
                    var contactCard = document.getElementById("contact");


                    // Create a function that shows the contact info when clicked
                    function showContact() {
                        // Get the user input from a prompt window
                        var userInput = prompt("Please enter your email address");
                        // Create a regular expression to validate the email format
                        var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                        // Test if the user input matches the email format
                        if (emailRegex.test(userInput)) {
                            // Create a paragraph element to display the contact info
                            var contactInfo = document.createElement("p");
                            // Set the text content of the paragraph element
                            contactInfo.textContent = "You can contact me at your-email@example.com";
                            // Append the paragraph element to the contact card element
                            contactCard.appendChild(contactInfo);
                            // Remove the click event listener from the contact card element
                            contactCard.removeEventListener("click", showContact);
                            // Change the background color of the contact card element to green
                            contactCard.style.backgroundColor = "green";
                            // Add a class of success to the contact card element
                            contactCard.classList.add("success");
                        } else {
                            // Alert the user that the input is invalid
                            alert("Invalid email address. Please try again.");
                            // Change the background color of the contact card element to red
                            contactCard.style.backgroundColor = "red";
                            // Add a class of error to the contact card element
                            contactCard.classList.add("error");
                        }
                    }

                    // Add a click event listener to the contact card element
                    contactCard.addEventListener("click", showContact);
                </script>
                <!-- Add this code in the appropriate places in the HTML section -->

                <!-- Add an alt attribute to the image element -->
                <img src="your-image.jpg" alt="A photo of yourself">

                <!-- Add an aria-label attribute to the nav links -->
                <a href="#about" aria-label="Go to the about section">About</a>
                <a href="#skills" aria-label="Go to the skills section">Skills</a>
                <a href="#history" aria-label="Go to the history section">History</a>
                <a href="#contact" aria-label="Go to the contact section">Contact</a>

                <!-- Add a tabindex attribute to the contact card element -->
                <div class="card" id="contact" tabindex="0">
                    <h3>Contact me</h3>
                    <p>Click here to see my contact info.</p>
                </div>
            </div>
        </div>

    </div>
    <script>
        // Add this code at the end of the script section

        // Get the contact form element by its id
        var contactForm = document.getElementById("contact-form");

        // Create a function that validates and submits the contact form
        function submitContactForm(event) {
            // Prevent the default behavior of the form submission
            event.preventDefault();
            // Get the name input value
            var name = document.getElementById("name").value;
            // Get the email input value
            var email = document.getElementById("email").value;
            // Get the message input value
            var message = document.getElementById("message").value;
            // Create a regular expression to validate the email format
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            // Test if the email input matches the email format
            if (emailRegex.test(email)) {
                // Alert the user that the form is submitted successfully
                alert("Thank you for contacting me. I will get back to you soon.");
                // Reset the form inputs
                contactForm.reset();
                // Change the background color of the contact form to green
                contactForm.style.backgroundColor = "green";
                // Add a class of success to the contact form
                contactForm.classList.add("success");
                // Remove the submit event listener from the contact form
                contactForm.removeEventListener("submit", submitContactForm);
            } else {
                // Alert the user that the email input is invalid
                alert("Invalid email address. Please try again.");
                // Change the background color of the contact form to red
                contactForm.style.backgroundColor = "red";
                // Add a class of error to the contact form
                contactForm.classList.add("error");
            }
            // Add this code at the end of the script section


            // Modify the submitContactForm function to include captcha verification

            function submitContactForm(event) {
                // Prevent the default behavior of the form submission
                event.preventDefault();
                // Validate the name input and store the result in a variable
                var isNameValid = validateName();
                // Validate the email input and store the result in a variable
                var isEmailValid = validateEmail();
                // Validate the message input and store the result in a variable
                var isMessageValid = validateMessage();
                // Check if all inputs are valid
                if (isNameValid && isEmailValid && isMessageValid) {
                    // Get the captcha response value
                    var captchaResponse = grecaptcha.getResponse();
                    // Check if the captcha response is empty
                    if (captchaResponse === "") {
                        // Alert the user that the captcha is not completed
                        alert("Please complete the captcha.");
                    } else {
                        // Send an AJAX request to verify the captcha response on the server side
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "/verify_captcha.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function () {
                            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                                // Parse the server response as JSON
                                var response = JSON.parse(this.responseText);
                                // Check if the captcha verification was successful
                                if (response.success) {
                                    // Alert the user that the form is submitted successfully
                                    alert("Thank you for contacting me. I will get back to you soon.");
                                    // Reset the form inputs
                                    contactForm.reset();
                                    // Reset the captcha widget
                                    grecaptcha.reset();
                                    // Change the background color of the contact form to green
                                    contactForm.style.backgroundColor = "green";
                                    // Add a class of success to the contact form
                                    contactForm.classList.add("success");
                                    // Remove the submit event listener from the contact form
                                    contactForm.removeEventListener("submit", submitContactForm);
                                } else {
                                    // Alert the user that the captcha verification failed
                                    alert("Captcha verification failed. Please try again.");
                                }
                            }
                        };
                        xhr.send("response=" + encodeURIComponent(captchaResponse));
                    }
                } else {
                    // Alert the user that some inputs are invalid
                    alert("Please enter valid information.");
                }
            }
        }

        // Add a submit event listener to the contact form
        contactForm.addEventListener("submit", submitContactForm);
    </script>
    <!-- Add this code in the appropriate places in the HTML section -->

    <!-- Create a form element with an id of contact-form -->
    <form id="contact-form" action="/action_page.php" method="post">
        <!-- Create a fieldset element to group the form inputs -->
        <fieldset>
            <!-- Create a legend element to label the form -->
            <legend>Contact me</legend>
            <!-- Create a label element for the name input -->
            <label for="name">Name:</label>
            <!-- Create an input element for the name input with an id of name -->
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            <!-- Create a label element for the email input -->
            <label for="email">Email:</label>
            <!-- Create an input element for the email input with an id of email -->
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <!-- Create a label element for the message textarea -->
            <label for="message">Message:</label>
            <!-- Create a textarea element for the message input with an id of message -->
            <textarea id="message" name="message" placeholder="Enter your message" rows="5" required></textarea>
            <!-- Create an input element for the submit button with an id of submit -->
            <input type="submit" id="submit" value="Send">
        </fieldset>
    </form>
    <form id="contact-form" action="" method="post">
          
        <!-- Add a type attribute to the name input with a value of text -->
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
        <!-- Add a pattern attribute to the name input with a value of [a-zA-Z\s]+ -->
        <input type="text" id="name" name="name" placeholder="Enter your name" pattern="[a-zA-Z\s]+" required>
        <!-- Add a maxlength attribute to the name input with a value of 50 -->
        <input type="text" id="name" name="name" placeholder="Enter your name" pattern="[a-zA-Z\s]+" maxlength="10"
            required>

        <!-- Add a type attribute to the email input with a value of email -->
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        <!-- Add a pattern attribute to the email input with a value of [a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,} -->
        <input type="email" id="email" name="email" placeholder="Enter your email"
            pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
        <!-- Add a maxlength attribute to the email input with a value of 100 -->
        <input type="email" id="email" name="email" placeholder="Enter your email"
            pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" maxlength="100" required>

        <!-- Add a maxlength attribute to the message textarea with a value of 500 -->
        <textarea id="message" name="message" placeholder="Enter your message" rows="5" maxlength="500"
            required></textarea>
        <input type="submit" value="Signup" />
    </form>

    <!-- Add this code in the appropriate places in the HTML section -->

    <!-- Add a script tag to load the Google reCAPTCHA API -->
    <script src="https://www.google.com/recaptcha/api.js" async defer>
        // Add this code at the end of the script section

        // Modify the submitContactForm function to include captcha verification

        function submitContactForm(event) {
            // Prevent the default behavior of the form submission
            event.preventDefault();
            // Validate the name input and store the result in a variable
            var isNameValid = validateName();
            // Validate the email input and store the result in a variable
            var isEmailValid = validateEmail();
            // Validate the message input and store the result in a variable
            var isMessageValid = validateMessage();
            // Check if all inputs are valid
            if (isNameValid && isEmailValid && isMessageValid) {
                // Get the captcha response value
                var captchaResponse = grecaptcha.getResponse();
                // Check if the captcha response is empty
                if (captchaResponse === "") {
                    // Alert the user that the captcha is not completed
                    alert("Please complete the captcha.");
                } else {
                    // Send an AJAX request to verify the captcha response on the server side
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "/verify_captcha.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                            // Parse the server response as JSON
                            var response = JSON.parse(this.responseText);
                            // Check if the captcha verification was successful
                            if (response.success) {
                                // Alert the user that the form is submitted successfully
                                alert("Thank you for contacting me. I will get back to you soon.");
                                // Reset the form inputs
                                contactForm.reset();
                                // Reset the captcha widget
                                grecaptcha.reset();
                                // Change the background color of the contact form to green
                                contactForm.style.backgroundColor = "green";
                                // Add a class of success to the contact form
                                contactForm.classList.add("success");
                                // Remove the submit event listener from the contact form
                                contactForm.removeEventListener("submit", submitContactForm);
                            } else {
                                // Alert the user that the captcha verification failed
                                alert("Captcha verification failed. Please try again.");
                            }
                        }
                    };
                    xhr.send("response=" + encodeURIComponent(captchaResponse));
                }
            } else {

                // Alert the user that some inputs are invalid
                alert("Please enter valid information.");
            }
        }
    </script>

    <!-- Add a div element with a class of g-recaptcha and a data-sitekey attribute -->
    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
</body>

</html>