<?php
class EventController
{
  private $conn;
  public function __construct()
  {
    $servername = "localhost";
    $username = "username";
    $password = "password";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=nextech", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  public function insertEvent()
  {
    $eventName = $_POST["eventName"];
    $eventLocation = $_POST["eventLocation"];
    $eventDescription = $_POST["eventDescription"];
    $eventStart = $_POST["eventStart"];
    $eventEnd = $_POST["eventEnd"];
    $eventPrice = $_POST["eventPrice"];
    $eventUrl = $_POST["eventUrl"];

    $stmt = $this->conn->prepare("INSERT INTO events (name, description, start_date, end_date, location, price , url) VALUES (:name, :description, :start_date, :end_date, :location, :price, :url)");
    $result = $stmt->execute([
      ':name' => $eventName,
      ':description' => $eventDescription,
      ':start_date' => $eventStart,
      ':end_date' => $eventEnd,
      ':location' => $eventLocation,
      ':price' => $eventPrice,
      ':url' => $eventUrl
    ]);

    if ($result) {
      $_SESSION["register_success"] = "EVENT CREATED SUCCESS";
      $this->conn = null;
      header("Location: ../View/NexTech_index.php");
      exit();
    } else {
      $this->conn = null;
      $_SESSION["error_register"] = "ERROR WHILE CREATING EVENT";
      header("Location: ../View/NexTech_register.php");
      exit();
    }
  }
  public function readEvents()
  {
    try {
      $stmt = $this->conn->prepare("SELECT * FROM events");
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $events;
    } catch (PDOException $e) {
      echo "Error while reading events: " . $e->getMessage();
    } 
    $conn = null;
  }
}
