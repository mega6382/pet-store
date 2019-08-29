<?php
declare(strict_types=1);

// cli-app.php
require_once "app/bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(connection());
