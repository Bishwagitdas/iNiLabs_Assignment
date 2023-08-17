<?php

interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    private $logFilePath;

    public function __construct($logFilePath) {
        $this->logFilePath = $logFilePath;
    }

    public function log($message) {
        $formattedMessage = "[" . date('Y-m-d H:i:s') . "] " . $message . "\n";
        file_put_contents($this->logFilePath, $formattedMessage, FILE_APPEND);
    }
}

class ConsoleLogger implements Logger {
    public function log($message) {
        echo "[" . date('Y-m-d H:i:s') . "] " . $message . "\n";
    }
}


$fileLogger = new FileLogger('logging.txt');
$consoleLogger = new ConsoleLogger();

$fileLogger->log('logging message for the file.');
$consoleLogger->log('logging message for the console.');

?>