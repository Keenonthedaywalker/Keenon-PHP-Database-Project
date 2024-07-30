<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overview</title>
    <link rel="stylesheet" href=<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <link rel="stylesheet" type="text/css" href="../styles/overview.css">
        <script src="../scripts/script.js" defer></script>
        <script src="../scripts/overview.js" defer></script>
        <title>Login - Dierentenhuis 's-Hertogenbosch</title>
    </head>
<body>

<main>
    <div id="parchment"></div>
    <div id="contain">
        <?php

        echo '<a href="../pages/form.php">Go Back</a>';

        // All credit for the map program goes to user watabou on Itch.io who made this village map program.
        // Here is a link to the website of watabou where a bunch of other cool programs are located: https://watabou.github.io/index.html
        // This program works by taking the link from the Village Generator program of Watabou and changing the unique parts of the village via the use of the url in the browser.

        // Initiates sessions so that they can be used.
        session_start();

        // Here I set up all of the variables equal to things that the user inputted in the forms page.
        // This is the main link that we are going to concatenate (join) to.
        $mainLink = 'https://watabou.github.io/village-generator/?seed=';
        // The seed of the map
        $seed = $_SESSION["tseed"];
        // For counting tags
        $tagNumber = 0;
        // Not to save the tags themselves, but to save &tags which will be joined to the main link
        $tags = '&tags=';
        // This is where all tags are saved
        $tags_array = array();

        // First concat
        $fullLink = $mainLink . $seed;

        // If a tag is selected by the user on the form page, then it will be pushed to the tags_array here.
        if (isset($_SESSION['tag_isolated'])) {
            //$tagNumber += 1;
            $isolated = 'isolated';
            /*if ($tagNumber > 1) {
                $isolated = 'isolated,';
            }*/
            array_push($tags_array, "isolated");
            //$newTags = $tags . $isolated;
            //$newFullLink = $fullLink . $newTags;
            //echo "<p id='mainLink'>New: $newFullLink</p>";
        }

        if (isset($_SESSION['tag_coast'])) {
            //$tagNumber += 1;
            $coast = 'coast';
            /*if ($tagNumber > 1) {
                $coast = 'coast,';
            }*/
            array_push($tags_array, "coast");
            //$newTags = $tags . $coast;
            //$newFullLink = $fullLink . $newTags;
            //echo "<p id='mainLink'>New: $newFullLink</p>";
        }

        if (isset($_SESSION['tag_confluence'])) {
            array_push($tags_array, "confluence");
        }

        if (isset($_SESSION['tag_deadEnd'])) {
            array_push($tags_array, "dead end");
        }

        if (isset($_SESSION['tag_dense'])) {
            array_push($tags_array, "dense");
        }

        if (isset($_SESSION['tag_district'])) {
            array_push($tags_array, "district");
        }

        if (isset($_SESSION['tag_estuary'])) {
            array_push($tags_array, "estuary");
        }

        if (isset($_SESSION['tag_farmland'])) {
            array_push($tags_array, "farmland");
        }

        if (isset($_SESSION['tag_grove'])) {
            array_push($tags_array, "grove");
        }

        if (isset($_SESSION['tag_highway'])) {
            array_push($tags_array, "highway");
        }

        if (isset($_SESSION['tag_island'])) {
            array_push($tags_array, "island");
        }

        if (isset($_SESSION['tag_noOrchards'])) {
            array_push($tags_array, "no orchards");
        }

        if (isset($_SESSION['tag_noSquare'])) {
            array_push($tags_array, "no square");
        }

        if (isset($_SESSION['tag_organic'])) {
            array_push($tags_array, "organic");
        }

        if (isset($_SESSION['tag_palisade'])) {
            array_push($tags_array, "palisade");
        }

        if (isset($_SESSION['tag_pond'])) {
            array_push($tags_array, "pond");
        }

        if (isset($_SESSION['tag_river'])) {
            array_push($tags_array, "river");
        }

        if (isset($_SESSION['tag_sparse'])) {
            array_push($tags_array, "sparse");
        }

        if (isset($_SESSION['tag_uncultivated'])) {
            array_push($tags_array, "uncultivated");
        }

        // Second concat
        $fullLink2 = $fullLink . $tags;
        $tagContent = '';
        // Concatting all selected tags to the tags_array
        foreach ($tags_array as $x) {
            //echo "$x,";
            $tagContent .= "$x,";

        }
        //echo $tester;
        //echo chop($x, ",");//substr($x, 0, strlen($x)-1);
        $fullLink3 = $fullLink2 . $tagContent;
        // The final, ultimate link. This is the link that is used to create the map.
        $fullLink4 = $fullLink3 . '&name=' . $_SESSION["tname"] . '&pop=' . $_SESSION["tpop"];

        //echo "URL: " . $fullLink4;
        // This code is the code used to display the map.
        echo '<embed type="text/html" src="' . $fullLink4 . '"' . 'width="800" height="800" id="mapEmbed">';

        // Calls the fname session that is located on the login.php page.
        echo "<br>";
        echo "<strong>Town Name:</strong>" . $_SESSION["tname"];
        echo "<strong>Town Population:</strong>" . $_SESSION["tpop"];
        echo "<br>";
        echo "<strong>Town Seed:</strong>" . $_SESSION["tseed"];
        echo "<br>";
        echo "<strong>Tags Used:</strong>" . chop($tagContent, ",");
        echo "<br>";
        echo "<br>";
        echo "<br>";

        include("../includes/db_functions.php");

        // Start een connectie met de database
        startConnection();

        //$sql = "INSERT INTO townInfo (code, name, population) VALUES (1,'Test', 22)";

        // Delete all data from table
        $sqlDelTab = "TRUNCATE TABLE townInfo;";
        executeQuery($sqlDelTab);

        //$num_of_names = 3;
        $stadNummer = 1;
        $stadNaam = $_SESSION["tname"];
        $pop = $_SESSION["tpop"];
        $gebouwenNummer = rand(5, 30);
        $years = Array("700", "800", "900", "1000", "1100");
        $dateYear = $years[array_rand($years)];

        $sql2 = "INSERT INTO townInfo (stadnummer, naam, populatie, gebouwen, foundingDate, founder) VALUES ($stadNummer, '${stadNaam}', $pop, $gebouwenNummer, $dateYear, 'Keith')";
        $result3 = executeQuery($sql2);

        $displayTownInfo = "SELECT * FROM townInfo";
        $result2 = executeQuery($displayTownInfo);

        echo "<table>";
        echo "<tr>";
        echo "<th>Stadnummer:</th>";
        echo "<th>Naam:</th>";
        echo "<th>Populatie:</th>";
        echo "<th>Gebouwen:</th>";
        echo "<th>Founding Date:</th>";
        echo "<th>Founder:</th>";
        echo "</tr>";

        // Door de results heen loopen via een while
        while ($row = $result2->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";
            echo "<td>". $row["stadnummer"] . "</td>";
            echo "<td>". $row["naam"] . "</td>";
            echo "<td>". $row["populatie"] . "</td>";
            echo "<td>". $row["gebouwen"] . "</td>";
            echo "<td>". $row["foundingDate"] . "</td>";
            echo "<td>". $row["founder"] . "</td>";
            echo "</tr>";
        }
        echo "</tr>";
        echo "</table>";

        echo "<br>";
        echo "<br>";

        // Used to remove all row data in the table
        $sqlDelTab = "TRUNCATE TABLE Inwoners;";
        // This is executed each time the code is run, so that new characters can be generated and not added on to old characters
        executeQuery($sqlDelTab);

        for ($i = 0; $i <= $pop; $i++) {

            // Creates two arrays, one for male names and one for female names
            $male_people_names = Array("John", "Albert", "Jan", "Dominic", "Mark", "Lubeck", "Jean", "Pierre");
            $female_people_names = Array("Mary", "Angela", "Johanna", "Susan", "Jane", "Samamtha", "Rose", "Lucille");

            $people_genders = Array("Male", "Female");
            // Select a random gender between these two
            $person_gender = $people_genders[array_rand($people_genders)];
            // Depending on the gender of the person, select a name from either the male names array or the female names array
            if ($person_gender === "Male") {
                $person_name = $male_people_names[array_rand($male_people_names)];
            }else if ($person_gender === "Female") {
                $person_name = $female_people_names[array_rand($female_people_names)];
            }

            // Different age ranges
            $people_age_range = Array("Child", "Young", "Middle", "Old");
            $person_age_range = $people_age_range[array_rand($people_age_range)];

            // Depending on the age range of a person, set the age to a random number in a given range
            if ($person_age_range === "Child") {
                $person_age = rand(5, 14);
            } else if ($person_age_range === "Young") {
                $person_age = rand(15, 39);
            }else if ($person_age_range === "Middle") {
                $person_age = rand(40, 59);
            }else if ($person_age_range === "Old") {
                $person_age = rand(60, 100);
            }

            $people_jobs = Array("Arbeider", "Geen");
            $person_job = $people_jobs[array_rand($people_jobs)];

            // Children don't have any jobs.
            if ($person_age_range === "Child") {
                $person_job = "Geen";
            }

            /*if ($i === 0) {
                $person_job = "Burgermeester";
                $person_name = "Employee of the Month";
            }
            if ($i === 1) {
                $person_job = "Taverne Eigenaar";
                $person_name = "Tavernest Ownger";
            }*/

            // Storing all the image data
            $child_male_people_images = ["../images/Male Children/image(1).png", "../images/Male Children/image(2).png", "../images/Male Children/image(3).png"];
            $child_female_people_images = ["../images/Female Children/image(1).png", "../images/Female Children/image(2).png", "../images/Female Children/image(3).png"];

            $young_male_people_images = ["../images/Male Images Young/image(1).png", "../images/Male Images Young/image(2).png", "../images/Male Images Young/image(3).png"];
            $young_female_people_images = ["../images/Female Images Young/image(1).png", "../images/Female Images Young/image(2).png", "../images/Female Images Young/image(3).png"];

            $middle_male_people_images = ["../images/Male Images Middle/image(1).png", "../images/Male Images Middle/image(2).png", "../images/Male Images Middle/image(3).png"];
            $middle_female_people_images = ["../images/Female Images Middle/image(1).png", "../images/Female Images Middle/image(2).png", "../images/Female Images Middle/image(3).png"];

            $old_male_people_images = ["../images/Male Images Old/image(1).png", "../images/Male Images Old/image(2).png", "../images/Male Images Old/image(3).png"];
            $old_female_people_images = ["../images/Female Images Old/image(1).png", "../images/Female Images Old/image(2).png", "../images/Female Images Old/image(3).png"];

            // If a person is in a certain age range and depending on their gender, select a photo based on these facts.
            if ($person_age_range === "Child" AND $person_gender === "Male") {
                $person_image = $child_male_people_images[array_rand($child_male_people_images)];
            }else if ($person_age_range === "Child" AND $person_gender === "Female") {
                $person_image = $child_female_people_images[array_rand($child_female_people_images)];
            }
            else if ($person_age_range === "Young" AND $person_gender === "Male") {
                $person_image = $young_male_people_images[array_rand($young_male_people_images)];
            }else if ($person_age_range === "Young" AND $person_gender === "Female") {
                $person_image = $young_female_people_images[array_rand($young_female_people_images)];
            }else if ($person_age_range === "Middle" AND $person_gender === "Male") {
                $person_image = $middle_male_people_images[array_rand($middle_male_people_images)];
            }else if ($person_age_range === "Middle" AND $person_gender === "Female") {
                $person_image = $middle_female_people_images[array_rand($middle_female_people_images)];
            }else if ($person_age_range === "Old" AND $person_gender === "Male") {
                $person_image = $old_male_people_images[array_rand($old_male_people_images)];
            }else if ($person_age_range === "Old" AND $person_gender === "Female") {
                $person_image = $old_female_people_images[array_rand($old_female_people_images)];
            }

            $sql_inwoners = "INSERT INTO Inwoners (Inwonernummer, Naam, Ouderdom, Geslag, Werk, Afbeelding) VALUES ('${i}', '${person_name}', $person_age, '${person_gender}', '${person_job}', '${person_image}')";
            $result3 = executeQuery($sql_inwoners);

        }

        $sql_fk_inwoners_display = "SELECT * FROM Inwoners";

        //$result4 = executeQuery($sql_inwoners);
        $result5 = executeQuery($sql_fk_inwoners_display);

        echo "<table>";
        echo "<tr>";
        echo "<th>Inwonernummer:</th>";
        echo "<th>Naam:</th>";
        echo "<th>Leeftijd:</th>";
        echo "<th>Geslag:</th>";
        echo "<th>Werk:</th>";
        echo "<th>Afbeelding:</th>";
        echo "</tr>";

        // Door de results heen loopen via een while
        while ($row = $result5->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";
            echo "<td>". $row["Inwonernummer"] . "</td>";
            echo "<td>". $row["Naam"] . "</td>";
            echo "<td>". $row["Ouderdom"] . "</td>";
            echo "<td>". $row["Geslag"] . "</td>";
            echo "<td>". $row["Werk"] . "</td>";
            echo "<td>". "<img src='../images/" . $row["Afbeelding"] . "'>" . "</td>";
            echo "</tr>";
        }

        echo "</tr>";
        echo "</table>";

        echo "<br>";
        echo "<br>";

        $sqlDelTab = "TRUNCATE TABLE Gebouwen;";
        executeQuery($sqlDelTab);

        for ($i = 0; $i <= $gebouwenNummer; $i++) {

            $gebouwTiepe = "Huis";

            if ($i === 0) {
                $gebouwTiepe = "Taverne";
            }

            $sql_gebouwen = "INSERT INTO Gebouwen (Gebouwnummer, Tiepe) VALUES ('${i}', '${gebouwTiepe}')";
            $result6 = executeQuery($sql_gebouwen);

        }

        $sql_fk_gebouwen_display = "SELECT * FROM Gebouwen";

        //$result4 = executeQuery($sql_inwoners);
        $result7 = executeQuery($sql_fk_gebouwen_display);

        echo "<table>";
        echo "<tr>";
        echo "<th>Gebouwnummer:</th>";
        echo "<th>Gebouw Tiepe:</th>";
        echo "</tr>";

        // Used in the while loop to set the first loop iteration.
        $firstIter = true;
        // Door de results heen loopen via een while
        while ($row = $result7->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";
            echo "<td>". $row["Gebouwnummer"] . "</td>";
            // Creates a link in the first loop iteration that links to the taverne.php page
            if ($firstIter === true) {
                echo "<td>". "<a href='../pages/taverne.php'>" . $row["Tiepe"] . "</a>" . "</td>";
                $firstIter = false;
            }
            echo "<td>" . $row["Tiepe"] . "</td>";
            echo "</tr>";
        }

        echo "</tr>";
        echo "</table>";


        ?>

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

</body>
</html>