<?php
// include the class
require_once "htmlTable.php";

// create a data array to be displayed (ANY ARRAY OF ASSOCIATIVE ARRAYS)
$d = [
    ["Name" => "John", "Age" => 25, "City" => "New York"],
    ["Name" => "Mary", "Age" => 30, "City" => "Los Angeles"],
    ["Name" => "Peter", "Age" => 35, "City" => "Chicago"]
];

// create edit, delete and view buttons
$actions = [
    HtmlTable::action("Edit", "allActions(s,e)", "btn btn-danger", "edit"),
    HtmlTable::action("Delete", "allActions(s,e)", "btn btn-danger", "delete"),
    HtmlTable::action("View", "view(s)")
];

// create the table
echo HtmlTable::fromArray($d, $actions, "border=1");
?>

<!-- Define the function(s) that action buttons will trigger -->
<script>
    /*
     Define a function that will be called when a button is clicked with the following signature:
        function actions(s, e) { }

     Where:
         s(ender) is the button that was clicked
         e(vent) is the event alias

    Parameters:
         sender: object
         {
             id: string
             row: number
             data: object
         }

         event: string

    NOTE: The function signature is optional, if you don't need some of the parameters, you can remove them.
    */

    // manage all actions with a single function
    function allActions(s, e) {
        switch (e) {
            case "edit":
                console.log(`Edit row ${s.row} with name ${s.data.Name}`);
                break;
            case "delete":
                console.log(`Delete row ${s.row} with name ${s.data.Name}`);
                break;
        }
    }

    // manage an action with its own function (just receive the sender because the event is not defined)
    function view(s) {
        console.log(`View row ${s.row} with name ${s.data.Name}`);
    }


</script>