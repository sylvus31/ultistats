<?php
$path = '.';
$txtFiles = glob($path . '/*.txt');

// Créez un tableau associatif pour stocker les noms de fichiers
$directoryList = [];

foreach ($txtFiles as $file) {
    $directoryList[] = $file;
    echo $file . "<br>";
}

// Convertissez le tableau en JSON
$jsonData = json_encode($directoryList);

// Générez le code JavaScript avec l'objet JSON
echo '<script>';
echo 'var directoryData = ' . $jsonData . ';';
echo '</script>';
?>

<form method="post" action="">
    <label for="dropdown">Select an option:</label>
    <select id="dropdown" name="selectedOption" onchange="getData()">
        <?php
        // Generate options from the array
        foreach ($directoryList as $option) {
            echo "<option value=\"$option\">$option</option>";
        }
        ?>
    </select>
</form>


<div id="output"></div>

<script>
    function getData() {
        fetch(dropdown.value)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(fileContent => {
                // Display the content in the "output" div
                document.getElementById("output").innerHTML = fileContent;
            })
            .catch(error => console.error('Error:', error));


    }
    // JavaScript function to print each entry in the array
    function printArrayEntries(inputArray) {
        var outputDiv = document.getElementById("output");

        // Clear previous content
        outputDiv.innerHTML = "";

        // Iterate through each entry and append to the output div
        for (var i = 0; i < inputArray.length; i++) {
            outputDiv.innerHTML += inputArray[i] + "<br>";
        }
    }

    // JavaScript function to show stats
    function showStats(rawData) {
        alert(rawData)
        // printArrayEntries()
    }

</script>
