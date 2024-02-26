<?php
# IOC EXAMPLE
// Define a simple class
class DatabaseConnection {
    public function connect() {
        return "Connected to the database!";
    }
}

// Define a class that depends on DatabaseConnection
class UserRepository {
    private $dbConnection;

    // Constructor injection: injecting dependency through the constructor
    public function __construct(DatabaseConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getUsers() {
        return $this->dbConnection->connect() . " Fetching users...";
    }
}

// Simple IOC container
class Container {
    private $bindings = [];

    // Register a binding in the container
    public function bind($key, $value) {
        $this->bindings[$key] = $value;
    }

    // Resolve a dependency from the container
    public function resolve($key) {
        if (isset($this->bindings[$key])) {
            return $this->bindings[$key];
        }

        throw new Exception("Binding not found for key: $key");
    }
}

// Usage
$container = new Container();

// Register DatabaseConnection as a binding in the container
$container->bind('DatabaseConnection', new DatabaseConnection());

// Resolve UserRepository with its dependencies from the container
$userRepository = new UserRepository($container->resolve('DatabaseConnection'));

// Use the UserRepository
echo $userRepository->getUsers();

echo '<br/>';

# DEPENDENCY INJECTION EXAMPLE
class Logger {
    public function log($message) {
        echo "Logging: $message\n";
    }
}

class UserService {
    private $logger;

    // Dependency is injected through the constructor
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function registerUser($username) {
        // Register user logic
        $this->logger->log("User registered: $username");
    }
}

// Usage
$logger = new Logger();
$userService = new UserService($logger);
$userService->registerUser("john_doe");
