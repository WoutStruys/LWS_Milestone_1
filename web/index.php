<?php
require __DIR__ . '/db.php';
$result = $mysqli->query("SELECT full_name FROM student LIMIT 1");
$row = $result ? $result->fetch_assoc() : null;
$name = $row ? $row['full_name'] : 'Unknown Student';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Milestone 1</title>
  <style>
    body { font-family: system-ui, sans-serif; margin: 2rem; }
    .box { padding: 1.5rem; border: 1px solid #ddd; border-radius: 12px; }
    .ok { color: #0a7; }
  </style>
</head>
<body>
  <div class="box">
    <h1><?php echo htmlspecialchars($name); ?> has reached Milestone 1!!</h1>
    <p class="ok">DB‑backed message (not hard‑coded).</p>
    <p>
      HTTP: <a href="http://localhost:8085/">localhost:8085</a> 
    </p>
  </div>
</body>
</html>