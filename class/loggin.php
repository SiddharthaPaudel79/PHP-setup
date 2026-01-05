<?php
function logEvent($message, $level = 'INFO')
{
    $logFile = "app_log.txt";
    $timestamp = date("Y-m-d H:i:s");
    $logEntry = "[$timestamp][$level] $message\n";
    $fh = fopen($logFile, "a");
    if ($fh === false) {
        fwrite($fh, "Cannot open file");
        return false;
    }
    fwrite($fh, $logEntry);
    fclose($fh);
    return true;
}

logEvent("User logged in " . get_current_user(), "INFO");
logEvent("Database connection failed", "ERROR");
echo "<pre>";
echo file_get_contents("app_log.txt");
echo "</pre>";
?>