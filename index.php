<?php
require_once "./init.php";

// ログイン済みチェック付け加えたコードです
if (!isset($_SESSION["user"]["name"])) {
  header('location: login.php');
  exit();
}

$title = "Chat";
require_once "./layout.php";
require_once "./chat_data.php";
$user = $_SESSION["user"];
$userColor = $user["color"];
$userName = $user["name"];
?>
<div class="box">
  <div class="head">
    <h1 class="chat-ttl">ChatPage</h1>
    <a href="./logout.php" class="logout-btn">Log Out</a>
  </div>
  <div class="chat-box">
    <div class="chat-info">
      <p>Name</p>
      <p><?= $userName ?>,</p>
      <p>Color</p>
      <p><?= $userColor ?></p>
    </div>
    <ul class="chat-list">
      <?php if (empty($messages)) : ?>
        <p>There's no chat. Please enter the room and greet us!</p>
      <?php else : ?>
        <?php foreach ($messages as $msg) : ?>
          <li style="color:<?= $msg->color ?>">
            <p><?= $msg->name ?></p>
            <p><?= $msg->message ?></p>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </div>
  <div class="foot">
    <form class="chat-form" action="input.php" method="post" class="chat-form">
      <input type="hidden" name="message[name]" value="<?= $userName ?>">
      <input type="hidden" name="message[color]" value="<?= $userColor ?>">
      <input class="chat-input" type="text" name="message[message]" />
      <button class="chat-button" type="submit">Entering a room</button>
    </form>
  </div>
  </body>

  </html>
