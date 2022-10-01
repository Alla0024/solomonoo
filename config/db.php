<?php
function dbConnect()
{
    return new mysqli('localhost', 'root', 'root', 'solomono');
}
