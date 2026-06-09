<?php
http_response_code(500);
$message = isset($_GET['msg']) ? htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8') : '發生未預期錯誤，請稍後再試。';
?>
<!doctype html>
<html lang="zh-Hant">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>系統錯誤</title>
  <style>
    body{font-family: -apple-system,BlinkMacSystemFont,\"Helvetica Neue\",Segoe UI,Arial,\"Noto Sans TC\" ,sans-serif;background:#f5f7fa;color:#2d2d2d;padding:32px}
    .card{max-width:720px;margin:48px auto;background:#fff;padding:24px;border-radius:8px;box-shadow:0 6px 18px rgba(0,0,0,.06)}
    h1{margin:0 0 8px;color:#d9534f;font-size:20px}
    p{margin:8px 0}
    a.button{display:inline-block;margin-top:12px;padding:8px 14px;background:#007bff;color:#fff;border-radius:6px;text-decoration:none}
  </style>
</head>
<body>
  <div class="card">
    <h1>發生錯誤</h1>
    <p><?php echo $message; ?></p>
    <p>
      <a class="button" href="index.php">回到首頁</a>
    </p>
  </div>
</body>
</html>
