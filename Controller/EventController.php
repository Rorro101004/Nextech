<?php

$event = new EventController;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["create"])) {
    echo "<p>Create event button is clicked.</p>";
    $event->insertEvent();
  }
  if (isset($_POST["update"])) {
    $event->updateEvent();
  }
  if (isset($_GET["read"])) {
    echo "<p>Read event button is clicked.</p>";
    $event->readEvents();
  }
}

class EventController
{
  private $conn;
  public function __construct()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nextech";

    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
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

    $stmt = $this->conn->prepare("INSERT INTO event (name, description, start_date, end_date, location, price , url) VALUES (:name, :description, :start_date, :end_date, :location, :price, :url)");
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
      header("Location: ../View/NexTech_event_manager.php");
      exit();
    } else {
      $this->conn = null;
      $_SESSION["error_register"] = "ERROR WHILE CREATING EVENT";
      header("Location: ../View/NexTech_event_manager.php");
      exit();
    }
  }
  
  public function readEvents()
  {
    try {
      $stmt = $this->conn->prepare("SELECT * FROM event");
      $stmt->execute();
      $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $events;
    } catch (PDOException $e) {
      echo "Error while reading events: " . $e->getMessage();
    }
    $conn = null;
  }

  public function getEventById($id_event)
  {
    try {
        $stmt = $this->conn->prepare("SELECT * FROM event WHERE id_event = :id_event");
        $stmt->execute([':id_event' => $id_event]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
  }

  public function updateEvent()
  {
    $id_event = $_POST["id_event"];
    $eventName = $_POST["eventName"];
    $eventLocation = $_POST["eventLocation"];
    $eventDescription = $_POST["eventDescription"];
    $eventStart = $_POST["eventStart"];
    $eventEnd = $_POST["eventEnd"];
    $eventPrice = $_POST["eventPrice"];
    $eventUrl = $_POST["eventUrl"];

    $stmt = $this->conn->prepare("UPDATE event SET name = :name, description = :description, start_date = :start_date, end_date = :end_date, location = :location, price = :price, url = :url WHERE id_event = :id_event");
    $result = $stmt->execute([
        ':name' => $eventName,
        ':description' => $eventDescription,
        ':start_date' => $eventStart,
        ':end_date' => $eventEnd,
        ':location' => $eventLocation,
        ':price' => $eventPrice,
        ':url' => $eventUrl,
        ':id_event' => $id_event
    ]);

    if ($result) {
        $_SESSION["update_success"] = "EVENT UPDATED SUCCESSFULLY";
        $this->conn = null;
        header("Location: ../View/NexTech_event_manager.php");
        exit();
    } else {
        $this->conn = null;
        $_SESSION["error_update"] = "ERROR WHILE UPDATING EVENT";
        header("Location: ../View/NexTech_event_manager.php");
        exit();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NexTech Event Controller</title>
</head>

<body>
</body>

</html>