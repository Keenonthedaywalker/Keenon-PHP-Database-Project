<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" href="../styles/form.css">
    <script src="../scripts/script.js" defer></script>
    <script src="../scripts/form.js" defer></script>
    <title>Town</title>
</head>
<body>

<!-- Parchment -->

<main>
    <div id="parchment"></div>
    <div id="contain">
        <?php include '../includes/navigation.php' ?>
        <button></button>
        <hr>
        <p class="inkTitle" id="inkTitle1">Please Enter Town Details Below:</p>

        <?php
        session_start();
        /*

            De onderstaande code doet het volgende:

            1. Verwijder onnodige tekens (extra spatie, tab, nieuwe regel) uit de invoergegevens van de gebruiker (met de PHP trim() functie)

            2. Verwijder backslashes \ uit de gebruikersinvoergegevens (met de PHP stripslashes() functie)

            Merk op dat we aan het begin van het script controleren of het formulier is verzonden met behulp van $_SERVER["REQUEST_METHOD"]. Als de REQUEST_METHOD POST is, is het formulier verzonden en moet het worden gevalideerd. Als het nog niet is ingediend, slaat u de validatie over en geeft u een leeg formulier weer.

         */

        // Starts sessions so that you can use them on this page
        // variabelen definiëren en instellen op lege waarden
        $tnameErr = $tpopErr = $tseedErr = "";
        $tname = $tpop = $tseed = "";
        $tag_isolated = "";



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["tname"])) {
                $tnameErr = "Town Name is verplicht";
            } else {
                // Saves $_POST as a Session so that it can be used as a variable on another page
                $_SESSION['tname'] = $_POST['tname'];
                $tname = test_input($_POST["tname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/", $tname)) {
                    $tnameErr = "Alleen letters en witruimte zijn toegestaan";
                }
            }

            if (empty($_POST["tpop"])) {
                $tpopErr = "Town Population is verplicht";
            } else {
                $_SESSION['tpop'] = $_POST['tpop'];
                $tpop = test_input($_POST["tpop"]);
                if (!preg_match("/^\d+$/", $tpop)) {
                    $tpopErr = "Alleen nummers zijn toegeslaan.";
                }
            }

            if (empty($_POST["tseed"])) {
                $tseedErr = "Town seed is verplicht";
            } else {
                $_SESSION['tseed'] = $_POST['tseed'];
                $tseed = test_input($_POST["tseed"]);
                if (!preg_match("/^\d+$/", $tseed)) {
                    $tseedErr = "Alleen nummers zijn toegeslaan.";
                }
            }

            // If the checkboxes are checked, then create a sesssion for said tag,
            // and run it in the test_input and then use POST
            if (isset($_POST["tag_isolated"])) {
                $_SESSION['tag_isolated'] = $_POST['tag_isolated'];
                $tag_isolated = test_input($_POST["tag_isolated"]);
                $tag_isolated = $_POST["tag_isolated"];
            }

            if (isset($_POST["tag_coast"])) {
                $_SESSION['tag_coast'] = $_POST['tag_coast'];
                $tag_coast = test_input($_POST["tag_coast"]);
                $tag_coast = $_POST["tag_coast"];
            }

            if (isset($_POST["tag_confluence"])) {
                $_SESSION['tag_confluence'] = $_POST['tag_confluence'];
                $tag_confluence = test_input($_POST["tag_confluence"]);
                $tag_confluence = $_POST["tag_confluence"];
            }

            if (isset($_POST["tag_deadEnd"])) {
                $_SESSION['tag_deadEnd'] = $_POST['tag_deadEnd'];
                $tag_deadEnd = test_input($_POST["tag_deadEnd"]);
                $tag_deadEnd = $_POST["tag_deadEnd"];
            }

            if (isset($_POST["tag_dense"])) {
                $_SESSION['tag_dense'] = $_POST['tag_dense'];
                $tag_dense = test_input($_POST["tag_dense"]);
                $tag_dense = $_POST["tag_dense"];
            }

            if (isset($_POST["tag_district"])) {
                $_SESSION['tag_district'] = $_POST['tag_district'];
                $tag_district = test_input($_POST["tag_district"]);
                $tag_district = $_POST["tag_district"];
            }

            if (isset($_POST["tag_estuary"])) {
                $_SESSION['tag_estuary'] = $_POST['tag_estuary'];
                $tag_estuary = test_input($_POST["tag_estuary"]);
                $tag_estuary = $_POST["tag_estuary"];
            }

            if (isset($_POST["tag_farmland"])) {
                $_SESSION['tag_farmland'] = $_POST['tag_farmland'];
                $tag_farmland = test_input($_POST["tag_farmland"]);
                $tag_farmland = $_POST["tag_farmland"];
            }

            if (isset($_POST["tag_grove"])) {
                $_SESSION['tag_grove'] = $_POST['tag_grove'];
                $tag_grove = test_input($_POST["tag_grove"]);
                $tag_grove = $_POST["tag_grove"];
            }

            if (isset($_POST["tag_highway"])) {
                $_SESSION['tag_highway'] = $_POST['tag_highway'];
                $tag_highway = test_input($_POST["tag_highway"]);
                $tag_highway = $_POST["tag_highway"];
            }

            if (isset($_POST["tag_island"])) {
                $_SESSION['tag_island'] = $_POST['tag_island'];
                $tag_island = test_input($_POST["tag_island"]);
                $tag_island = $_POST["tag_island"];
            }

            if (isset($_POST["tag_noOrchards"])) {
                $_SESSION['tag_noOrchards'] = $_POST['tag_noOrchards'];
                $tag_noOrchards = test_input($_POST["tag_noOrchards"]);
                $tag_noOrchards = $_POST["tag_noOrchards"];
            }

            if (isset($_POST["tag_noSquare"])) {
                $_SESSION['tag_noSquare'] = $_POST['tag_noSquare'];
                $tag_noSquare = test_input($_POST["tag_noSquare"]);
                $tag_noSquare = $_POST["tag_noSquare"];
            }

            if (isset($_POST["tag_organic"])) {
                $_SESSION['tag_organic'] = $_POST['tag_organic'];
                $tag_organic = test_input($_POST["tag_organic"]);
                $tag_organic = $_POST["tag_organic"];
            }

            if (isset($_POST["tag_palisade"])) {
                $_SESSION['tag_palisade'] = $_POST['tag_palisade'];
                $tag_palisade = test_input($_POST["tag_palisade"]);
                $tag_palisade = $_POST["tag_palisade"];
            }

            if (isset($_POST["tag_pond"])) {
                $_SESSION['tag_pond'] = $_POST['tag_pond'];
                $tag_pond = test_input($_POST["tag_pond"]);
                $tag_pond = $_POST["tag_pond"];
            }

            if (isset($_POST["tag_river"])) {
                $_SESSION['tag_river'] = $_POST['tag_river'];
                $tag_river = test_input($_POST["tag_river"]);
                $tag_river = $_POST["tag_river"];
            }

            if (isset($_POST["tag_sparse"])) {
                $_SESSION['tag_sparse'] = $_POST['tag_sparse'];
                $tag_sparse = test_input($_POST["tag_sparse"]);
                $tag_sparse = $_POST["tag_sparse"];
            }

            if (isset($_POST["tag_uncultivated"])) {
                $_SESSION['tag_uncultivated'] = $_POST['tag_uncultivated'];
                $tag_uncultivated = test_input($_POST["tag_uncultivated"]);
                $tag_uncultivated = $_POST["tag_uncultivated"];
            }

            // If everything in the input fields is input correctly, then it will send you to the overview page.
            // Note: There is still a problem that I haven't fixed regarding the seed input field. If the user just inputs something there it will send them to the overview page even if the other fields' data is incorrect or not filled in.
            if (isset($_POST["tname"]) AND isset($_POST["tpop"]) AND preg_match("/^\d+$/", $tseed)) {
                header("Location: overview.php");
            }

        }

        // Cleans the code up by removing unwanted slashes and text.
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        ?>

        <p><span class="error" id="errorField">* required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="tname">Town Name:</label><br>
            <input type="text" id="tname" name="tname"><span class="error">* <?php echo $tnameErr;?></span><br>
            <label for="tpop">Town Population:</label><br>
            <input type="text" id="tpop" name="tpop" ><span class="error">* <?php echo $tpopErr;?></span><br>
            <label for="tseed">Town Seed:</label><br>
            <input type="text" id="tseed" name="tseed" ><span class="error">* <?php echo $tseedErr;?></span><br>


            <input type="checkbox" id="tag_isolated" name="tag_isolated" value="tag_isolated" onclick="myFunction()">
            <label for="tag_isolated"> Isolated - No highway, only trails</label><br>
            <input type="checkbox" id="tag_coast" name="tag_coast" value="tag_coast" onclick="myFunction()">
            <label for="tag_coast"> Coast - Coastal Village</label><br>
            <input type="checkbox" id="tag_confluence" name="tag_confluence" value="tag_confluence" onclick="myFunction()">
            <label for="tag_confluence"> Confluence - Two rivers flowing together</label><br>
            <input type="checkbox" id="tag_deadEnd" name="tag_deadEnd" value="tag_deadEnd" onclick="myFunction()">
            <label for="tag_deadEnd"> Dead End - Highway ending at village square</label><br>
            <input type="checkbox" id="tag_dense" name="tag_dense" value="tag_dense" onclick="myFunction()">
            <label for="tag_dense"> Dense - Densely built village</label><br>
            <input type="checkbox" id="tag_district" name="tag_district" value="tag_district" onclick="myFunction()">
            <label for="tag_district"> District - Part of a larger city</label><br>
            <input type="checkbox" id="tag_estuary" name="tag_estuary" value="tag_estuary" onclick="myFunction()">
            <label for="tag_estuary"> Estuary - Mouth of a river</label><br>
            <input type="checkbox" id="tag_farmland" name="tag_farmland" value="tag_farmland" onclick="myFunction()">
            <label for="tag_farmland"> Farmland - Many farm fields</label><br>
            <input type="checkbox" id="tag_grove" name="tag_grove" value="tag_grove" onclick="myFunction()">
            <label for="tag_grove"> Grove - Trees grow thickly around the buildings</label><br>
            <input type="checkbox" id="tag_highway" name="tag_highway" value="tag_highway" onclick="myFunction()">
            <label for="tag_highway"> Highway - A Large road runs through the village</label><br>
            <input type="checkbox" id="tag_island" name="tag_island" value="tag_island" onclick="myFunction()">
            <label for="tag_island"> Island - Island Village</label><br>
            <input type="checkbox" id="tag_noOrchards" name="tag_noOrchards" value="tag_noOrchards" onclick="myFunction()">
            <label for="tag_noOrchards"> No Orchards - No Orchards</label><br>
            <input type="checkbox" id="tag_noSquare" name="tag_noSquare" value="tag_noSquare" onclick="myFunction()">
            <label for="tag_noSquare"> No Square - No Village Square</label><br>
            <input type="checkbox" id="tag_organic" name="tag_organic" value="tag_organic" onclick="myFunction()">
            <label for="tag_organic"> Organic - Wobbly Roads</label><br>
            <input type="checkbox" id="tag_palisade" name="tag_palisade" value="tag_palisade" onclick="myFunction()">
            <label for="tag_palisade"> Palisade - A Palisade surrounds the village</label><br>
            <input type="checkbox" id="tag_pond" name="tag_pond" value="tag_pond" onclick="myFunction()">
            <label for="tag_pond"> Pond - Small pond at the center</label><br>
            <input type="checkbox" id="tag_river" name="tag_river" value="tag_river" onclick="myFunction()">
            <label for="tag_river"> River - Riverside village</label><br>
            <input type="checkbox" id="tag_sparse" name="tag_sparse" value="tag_sparse" onclick="myFunction()">
            <label for="tag_sparse"> Sparse - Sparsely built village</label><br>
            <input type="checkbox" id="tag_uncultivated" name="tag_uncultivated" value="tag_uncultivated" onclick="myFunction()">
            <label for="tag_uncultivated"> Uncultivated - No Farm Field</label><br>
            <input type="submit" value="Submit">
        </form>

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

    <svg>
        <filter id="wavy2">
            <feTurbulence x="0" y="0" baseFrequency="0.02" numOctaves="5" seed="1" />
            <feDisplacementMap in="SourceGraphic" scale="20" />
        </filter>
    </svg>



</main>



</body>
</html>