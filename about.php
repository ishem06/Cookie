<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Food Hub and Unli Wings</title>
    <link rel="stylesheet" href="link.css">

</head>
<style>
body,
h1,
h2,
h3,
p,
ul,
li {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: white;
    color: #333;
    overflow-x: hidden;
    /* Prevent horizontal scrolling */
}

.container {
    margin: 0 auto;
    /* Center the container */
    width: 90%;
    font-family: Copperplate, Papyrus, fantasy;
    color: white;
    background-color: rgba(0, 0, 0, 0.8);
}

header {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 2px;
    position: fixed;
    /* Fix the navigation bar at the top */
    width: 100%;
    /* Make it full-width */
    top: 0;
    /* Align it at the top */
    z-index: 1000;
    /* Ensure it's above other content */
    height: min-content;
    transition: background-color 0.3s ease;
    /* Add smooth transition */
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    font-size: 50px;
}

.logo {
    display: inline-block;
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 50%;
    /* Make it a circle */
    padding: 7px;
    /* Adjust padding as needed */
}

.logo img {
    height: 100px;
    /* Adjust logo height as needed */
    cursor: pointer;
}

.menu-icon {
    display: none;
    cursor: pointer;
    float: right;
    /* Align the toggle button to the right */
    position: relative;
}

.menu {
    display: flex;
    float: right;
    font-size: 25px;
    margin: 0 0 0;
}

.menu li {
    display: inline-block;
    margin-right: 20px;
    content: initial;
}

.menu li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    transition: color 0.3s ease;
    margin-right: 50px;
}

.menu a:hover {
    color: rgba(255, 136, 0, 0.575);
}

.menu a.active {
    color: rgba(255, 136, 0, 0.575);
}

#menu-toggle {
    display: none;
}

.hero {
    overflow: hidden;
    background-image: url("chix.png");
    background-repeat: no-repeat;
    background-size: cover;
    height: 400px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6600;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #cc5500;
}

.intro {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: black;
    color: white;
    margin-top: -440px;
    /* Adjust as needed */
}

.intro img {
    float: right;
    max-width: 22%;
    padding-top: 2%;
}

.intro p {
    text-align: left;
    text-align: center;
    margin-right: 10px;
    font-size: 30px;
    color: white;
    padding-top: 2%;
}

.phh {
    background-color: rgba(139, 69, 19, 0.9);
    /* Brown color with transparency */
    border: 2px solid rgba(139, 69, 19, 0.9);
    text-align: center;
    padding: 20px;
    color: #fff;
}

.menu {
    text-align: center;
}

.menu img {
    display: block;
    margin: 0 auto;
    size: 20px;
}

.sticky-note {
    position: relative;
    width: 300px;
    height: 300px;
    padding: 20px;
    background-color: #fffbcc;
    border: 2px solid #f0f0f0;
    border-radius: 10px;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    display: flex;
    justify-content: center;
    /* Center content horizontally */
    align-items: center;
    /* Center content vertically */
}

.sticky-note::before {
    content: "";
    position: fixed;
    top: -2px;
    left: -20px;
    /* Adjust the left position */
    width: 150px;
    /* Increase the width */
    height: 15px;
    background-color: white;
    /* Match sticky note background */
    border-top: 2px solid dimgrey;
    /* Light gray */
    border-left: 2px solid dimgrey;
    /* Light gray */
    border-right: 2px solid gray;
    /* Light gray */
    border-top-left-radius: 10px;
    /* Rounded corners */
    border-top-right-radius: 10px;
    /* Rounded corners */
    transform: rotate(-15deg);
    /* Rotate tape */
    z-index: 1;
    /* Bring it in front of the sticky note */
}

.sticky-note::before,
.sticky-note::after {
    content: "";
    position: absolute;
    width: 100px;
    /* Adjust the width of the tape */
    height: 13px;
    background-color: white;
    /* Match sticky note background */
    border: 2px solid #f0f0f0;
    /* Light gray */
    border-radius: 10px;
    /* Rounded corners */
    z-index: 1;
    /* Bring it in front of the sticky note */
}

.sticky-note::before {
    top: 3px;
    /* Position the top tape */
    left: -40px;
    /* Position the top tape on the left side */
    transform: rotate(-45deg);
    /* Rotate the tape */
}

.sticky-note::after {
    bottom: 3px;
    /* Position the bottom tape */
    right: -40px;
    /* Position the bottom tape on the right side */
    transform: rotate(-45deg);
    /* Rotate the tape */
}


.note {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    /* Automatically adjust column width */
    grid-gap: 20px;
    /* Spacing between columns and rows */
    padding-bottom: 10%;
    padding-top: 10%;
    padding-left: 10%;
    padding-right: 10%;
    overflow: hidden;
    background-image: url('bullet.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-color: rgba(255, 255, 255, 0.5);
}

.photo-container {
    position: relative;
    display: inline-block;
    transform: rotate(20deg);
    height: 250px;
    /* Adjust height as needed */
    width: 600px;
    /* Adjust width as needed */
}

.tape {
    position: absolute;
    top: -1px;
    /* Adjust top position */
    left: -30px;
    /* Adjust left position */
    width: 153px;
    /* Adjust width of the tape */
    height: 15px;
    background-color: white;
    /* Tape color */
    border-top: 2px solid dimgrey;
    /* Light gray */
    border-left: 2px solid dimgrey;
    /* Light gray */
    border-right: 2px solid gray;
    /* Light gray */
    border-top-left-radius: 10px;
    /* Rounded corners */
    border-top-right-radius: 10px;
    /* Rounded corners */
    transform: rotate(-15deg);
    /* Rotate tape */
}

.pin {
    position: absolute;
    width: 20px;
    height: 20px;
    background-color: red;
    /* Red pin color */
    top: 10px;
    /* Adjust top position */
    left: 10px;
    /* Adjust left position */
    clip-path: polygon(50% 0%, 0% 50%, 100% 100%);
    transform: rotate(-45deg);
    /* Rotate pin */
}

.pinned-photo {
    max-width: 300px;
    /* Adjust the maximum width of the photo */
    width: 100%;
    /* Ensure the photo fills its container */
    border-radius: 10px;
    /* Add border radius */
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    /* Add shadow */
    margin-bottom: 10px;
    /* Add space below the photo */
}

.pin-photo {
    max-width: 300px;
    /* Adjust the maximum width of the photo */
    width: 100%;
    /* Ensure the photo fills its container */
    border-radius: 10px;
    /* Add border radius */
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    /* Add shadow */
    margin-bottom: 1 px;
    /* Add space below the photo */
}




footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

@media screen and (max-width: 768px) {

    /* Adjustments for smaller screens */
    body,
    h1,
    h2,
    h3,
    p,
    ul,
    li {
        font-size: 16px;
        /* Adjust font sizes */
    }

    .content {
        font-size: 16px;
        /* Adjust font size */
        padding-top: 20px;
        /* Adjust padding top */
    }

    .content h2 {
        font-size: 24px;
        /* Adjust font size */
    }

    .content p {
        font-size: 16px;
        /* Adjust font size */
    }

    .next p,
    .happy p,
    .intro p {
        font-size: 16px;
        /* Adjust font size */
    }

    .intro {
        height: 100vh;
        /* Keep height fixed */
    }

    .slideshow {
        width: 100%;
        /* Full width */
    }

    .slideshow img {
        width: 80%;
        /* Adjust image width as needed */
        max-width: 100%;
        /* Ensure the image doesn't exceed its container */
        height: auto;
        /* Maintain aspect ratio */
        position: absolute;
        /* Position the image absolutely */
        top: 50%;
        /* Position the image vertically in the middle */
        left: 50%;
        /* Position the image horizontally in the middle */
        transform: translate(-50%, -50%);
        /* Center the image */
        border: 10px solid #333;
        /* Set border around the "phone" */
        border-radius: 20px;
        /* Add border radius for rounded corners */
        overflow: hidden;
        margin: 0;
        /* Remove margin */
    }

    .window {
        width: 90%;
        /* Adjust width for smaller screens */
        max-width: 300px;
        /* Set maximum width */
        height: auto;
        /* Auto height */
    }

    header h1 {
        font-size: 30px;
        /* Adjust font size */
    }

    #menu-toggle {
        display: none;
        /* Hide the checkbox by default */
    }

    #menu-toggle:checked+.menu {
        display: flex;
        /* Show menu when checkbox is checked */
        justify-content: center;
        /* Center horizontally */
        align-items: center;
        /* Center vertically */
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.8);
        /* Semi-transparent background */
        z-index: 1000;
        /* Ensure it's above other content */
    }

    .menu {
        display: none;
        /* Hide menu by default */
        text-align: center;
        width: 100%;
        height: 100%;
        /* Ensure menu fills the entire screen */
        padding-top: 60px;
        /* Add padding to center menu content vertically */
        padding-left: 90px;
    }

    .menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu li {
        display: block;
        margin: 10px 0;
    }

    .logo {
        display: block;
        /* Ensure logo is always visible */
        position: fixed;
        /* Keep the logo fixed */
        top: 20px;
        /* Adjust top positioning as needed */

        z-index: 1001;
        /* Ensure logo is above other content */
    }

    /* Style the toggle button for mobile */
    .menu-icon {
        display: block;
        cursor: pointer;
        font-size: 30px;
        line-height: 1;
        position: absolute;
        top: 25px;
        right: 10px;
        z-index: 1002;
        /* Ensure it's above logo */
        margin-right: 15px;
    }

    .history {
        padding-bottom: 20%;
        /* Adjust padding for smaller screens */
    }

    .history h1 {
        font-size: 30px;
        /* Adjust font size for smaller screens */
        padding: 10px;
    }
}
</style>

<body>
    <header id="header">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
        <ul class="menu">
            <li><a href="client.php">Home</a></li>
            <li><a href="about.php" class="active">About us</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="location.php">Locations</a></li>
            <li><a href="contacts.php">Contact</a></li>
        </ul>
    </header>




    <section class="hero">
    </section>
    <div class="phh">

        <h1> ALL ABOUT MG FOODHUB AND UNLI WINGS</h1>


    </div>

    <div class="note">
        <div class="sticky-note">

            <p><b>
                    Gina B. Paden embarked on a new culinary journey on January 25, 2024, with the inauguration of MG
                    Foodhub and Unli Wings. Despite her prior experience in the food selling, having managed an
                    ihaw-ihaw
                    stall, Gina hesitated initially about diving back into the realm of food entrepreneurship. The
                    closure
                    of her ihaw-ihaw stall was sudden, prompted by a decision to prioritize her successful spa business,
                    "Jeng's Spa," which flourished with three established branches in Bay, Laguna. </b></p>

        </div>
        <br>
        <br>
        <br>
        <br>





        <div class="sticky-note">
            <p><b>However, Gina's love for cooking and entrepreneurial spirit brought her back to the kitchen. With her
                    family's support, including her children and husband, she opened MG Foodhub and Unli Wings.
                    Together, they
                    created a place where people could enjoy endless servings of delicious wings and other tasty
                    dishes.</b></p>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="sticky-note">
            <p><b>
                    Despite the doubts at first, Gina and her family worked hard to make MG Foodhub and Unli Wings
                    successful.
                    Now, it's a thriving testament to their determination and teamwork. Customers love the delicious
                    food, and
                    Gina is happy to be back in the food business, doing what she loves.</b></p>


        </div>
        <br>
        <br>

        <div class="photo-container">
            <img src="harap.jpg" alt="Photo" class="pinned-photo">
            <div class="pin"></div>
            <div class="tape"></div>
        </div>
        <br>
        <br>
        <br>
        <div class="photo-container">
            <img src="other.jpg" alt="Photo" class="pin-photo">
            <div class="pin"></div>
            <div class="tape"></div>
        </div>



    </div>





    <footer>
        <div>
            <p>&copy; 2024 MG Food Hub. All rights reserved.</p>
        </div>
    </footer>
    <script src="sc.js"></script>
</body>

</html>