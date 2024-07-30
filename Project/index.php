<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <script src="scripts/script.js" defer></script>
    <script src="scripts/index.js" defer></script>
    <title>Indexpagina</title>
</head>
<body>

<!-- Parchment Background -->
<!-- I take no credit for this parchment styling. All credit goes to user Christophe on Stackoverflow. -->
<!-- Link to the question where I used the code: https://stackoverflow.com/questions/14585101/old-paper-background-texture-with-just-css -->

<main>
    <div id="parchment"></div>
    <div id="contain">
        <ul>
            <li><a class="active" id="navButton_home" href="#">Home</a></li>
            <li><a href="pages/form.php">Town</a></li>
            <li><a href="pages/questboard.php">Quest Board</a></li>
        </ul>
        <button class="open-button" onclick="openForm()">Open Form</button>

        <div class="form-popup" id="myForm">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-container">
                <h1>Login</h1>

                <label for="firstname"><b>Firstname</b></label>
                <input type="text" placeholder="Enter Firstname" id="firstname" name="firstname" autocomplete="off" required>

                <label for="lastname"><b>Lastname</b></label>
                <input type="text" placeholder="Enter Lastname" name="lastname" autocomplete="off" required>

                <?php

                    session_set_cookie_params(0);
                    session_start();

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // collect value of input field
                            $_SESSION['firstname'] = htmlspecialchars($_REQUEST['firstname']);
                            $_SESSION['lastname'] = htmlspecialchars($_REQUEST['lastname']);

                            // Return date/time info of a timestamp; then format the output
                            $mydate=getdate(date("U"));
                            echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

                    }
                ?>

                <button type="submit" class="btn" onclick="setCookie()">Login</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
        <button></button>
        <hr>
        <p class="inkTitle">Welcome Traveller!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.</p>
        <p>Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna.</p>
        <p></p>
        <iframe width="500em" height="315em"
                src="https://www.youtube.com/embed/J8k2DwKnL2o">
        </iframe>
        <p></p>
        <hr>
        <footer>
            <p id="footerText">Your's Truly, <span id="footerFullname"><?php if (empty($_SESSION['firstname'])) {
                        echo "...";
                    } else {
                        echo $_SESSION['firstname'] . $_SESSION['lastname'] . ", <br>";
                    } '...'?></span> Signed on <span id="footerDate"><?php if (empty($_SESSION['firstname'])) {
                        echo "...";
                    } else {
                        $mydate=getdate(date("U"));
                        echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";;
                    } '...'?></span></p>
        </footer>
    </div>

    <!-- This is used in combination with the code in the style.css file to make the page look wavy i.e. to make it look like paper. -->
    <svg>
        <filter id="wavy2">
            <feTurbulence x="0" y="0" baseFrequency="0.02" numOctaves="5" seed="1" />
            <feDisplacementMap in="SourceGraphic" scale="20" />
        </filter>
    </svg>



</main>



</body>
</html>