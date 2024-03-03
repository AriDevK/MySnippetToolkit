<?php
// include the class
require("htmlDropdown.php");

// create a data array to be displayed (ANY ARRAY OF ASSOCIATIVE ARRAYS)
$d = [
    "1" => "Option 1",
    "2" => "Option 2",
    "3" => "Option 3",
    "4" => "Option 4",
    "5" => "Option 5"
];

?>

<label for="options">Options</label>
<?= HtmlDropdown::fromArray($d, "options", "options", options: "required") ?>
