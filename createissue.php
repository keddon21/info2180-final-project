<?php
// define variables and set to empty values
$title = $description = $assigned = $type = $priority = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = test($_POST["title"]);
  $description = test($_POST["description"]);
  $assigned = test($_POST["search_categories_assign"]);
  $type = test($_POST["search_categories_type"]);
  $priority = test($_POST["search_categories_priority"]);
}
function test($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>