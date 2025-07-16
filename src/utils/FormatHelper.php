<?php 
    namespace Src\utils;
    class FormatHelper
    {
        public static function formatDate(int | string $date)
        {
            $received_date = date_create($date);
            $format_date = $received_date->format('d/m/Y');
            return $format_date;
        }
    

        public static function formatDescription(string $description)
        {
            $description = ltrim($description);
            $description = rtrim($description);
            $description = ucfirst($description);
            return $description;
        }
    
    }
?>