<?php

    function get($connection, $string)
    {
        return mysqli_real_escape_string($connection, $string);
    }
