<?php

    function get($connection, $string)
    {
        return mysqli_real_escape_string($connection, $string);
    }

    function fetch($string)
    {
        return mysqli_fetch_array($string);
    }
