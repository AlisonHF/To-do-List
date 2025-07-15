<?php 
    // Function to format card date
    function formatDate(int | string $date)
    {
        $received_date = date_create($date);
        $format_date = $received_date->format('d/m/Y');
        return $format_date;
    }
?>