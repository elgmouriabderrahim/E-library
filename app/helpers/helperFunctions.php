<?php
function filterData($data) {
        return htmlspecialchars(trim(stripslashes($data)));
}