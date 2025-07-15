<?php

    // Function to format the description when saving to the database
    function FormatDescription($description)
    {
        $description = ltrim($description);
        $description = rtrim($description);
        $description = ucfirst($description);
        return $description;
    }

?>