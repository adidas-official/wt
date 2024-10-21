<?php 

class Database {
    private $DB_HOST;
    private $DB_USER;
    private $DB_PASS;
    private $DB_NAME;
    public $conn;

    public function __construct() {
        $this->loadEnv(__DIR__ . '/.env');
        $this->DB_HOST = getenv('DB_HOST');
        $this->DB_USER = getenv('DB_USER');
        $this->DB_PASS = getenv('DB_PASS');
        $this->DB_NAME = getenv('DB_NAME');
    }

    private function loadEnv($path) {
        // check if the file exists
        if (!file_exists($path)) {
            throw new Exception('The file does not exist');
        }

        // read the file
        $file = file_get_contents($path);

        // split the file into lines
        $lines = explode("\n", $file);

        // iterate over the lines
        foreach ($lines as $line) {
            // split the line into key and value
            $parts = explode('=', $line);

            // check if the line is valid
            if (count($parts) === 2) {
                // set the environment variable
                list($key, $value) = $parts;
                putenv("$key=$value");
            }
        }
    }
    // get the database connection
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->DB_HOST . ';dbname=' . $this->DB_NAME, $this->DB_USER, $this->DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}

