<?php
require_once "./init.php";


// ログイン済みチェック
if (isset($_SESSION["user"]["name"])) {
  header('location: index.php');
  exit();

  
} elseif (!empty($_POST["user"]["name"]) && !empty($_POST["user"]["color"])) {
  $_SESSION["user"] = $_POST["user"];
  header('location: index.php');
  exit();
}
$title = "Login";
require "./layout.php";
?>

<div class="login-box">
  <h1 class="login-ttl">LoginPage</h1>
  <form class="login-form" action="login.php" method="post">
    <div class="form-group">
      <label class="login-form__label">Your Name</label>
      <input class="login-form__input" type="text" name="user[name]" />
    </div>
    <div class="form-group">
      <label class="login-form__label">Choise Your Color</label>
      <select class="login-form__select" name="user[color]">
        <option value="black">Black</option>
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="green">Green</option>
        <option value="yellow">Yellow</option>
      </select>
    </div>
    <button class="login__submit" type="submit">Entering a room</button>
  </form>
</div>

<?php
require_once "./footer.php";
?>
