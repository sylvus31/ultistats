<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the raw POST data
    $rawData = file_get_contents("php://input");

    // Decode the JSON data (assuming it's in JSON format)
    $jsonData = json_decode($rawData, true);


    if ($jsonData !== null) {
        // Extract the value you want (e.g., "user_input")
        $equipe = $jsonData["equipe"];
        $adv=$jsonData["adv"];
        $player=$jsonData["player"];
        $action=$jsonData["action"];

        // Append the value to a file (e.g., "data.txt")
        $filename = $equipe."_".$adv.".txt";
        $filename = str_replace(' ', '', $filename);
        $fileContent = "$player:$action"; 
        $fileContent.=PHP_EOL;// Add a newline for each entry

        // Append to the file (create if it doesn't exist)
        file_put_contents($filename, $fileContent, FILE_APPEND);

        echo "Value '$fileContent' has been appended to $filename.";
    } else {
        echo "Error: Invalid JSON data received.";
    }
}
?>
