<div class="card shadowexempl">
      <h2>Profile </h2>
            <div class="fakeimg" style="height:100px;"><img src="http://localhost/StockPlatform/images/contact.png" style="height:80px;"></div>
<b>Bonjour Mr <?php echo htmlspecialchars($_SESSION["fullname"]); ?></b>
      <br>
      <br>
      <b>role: <?php echo htmlspecialchars($_SESSION["role"]); ?></b>
            <br>
      <b>tel: <?php echo htmlspecialchars($_SESSION["tel"]); ?></b>
        <br>
        <span class="overflow" style="word-wrap: break-word;"><b>email: <?php echo htmlspecialchars($_SESSION["email"]); ?></b></span>
        <br>
        <b>matricule: <?php echo htmlspecialchars($_SESSION["matricule"]); ?></b>
    </div>