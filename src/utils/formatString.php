<?php

    function FormatDescription($description)
    {
        $description = ltrim($description);
        $description = rtrim($description);
        $description = ucfirst($description);
        return $description;
    }

?>