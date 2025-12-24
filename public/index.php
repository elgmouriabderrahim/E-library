<?php

require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/../app/Core/Database.php';

use App\Core\Database;

$db = Database::getConnection();

echo "Database connected successfully";
