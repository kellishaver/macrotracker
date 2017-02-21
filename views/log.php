<div id="password-box">
  <h3>Food Details</h3>
  <form action="./log.php" method="post">
    <div>
      <label>Food:</label>
      <input type="text" name="food[food]" size="20" required>
    </div>
    <div>
      <label>Calories:</label>
      <input type="number" name="food[calories]" size="10" required>
    </div>
    <div>
      <label>Protein:</label>
      <input type="number" name="food[proteins]" size="10" required>
    </div>
    <div>
      <label>Fat:</label>
      <input type="number" name="food[fats]" size="10" required>
    </div>
    <div>
      <label>Net Carbs:</label>
      <input type="number" name="food[carbs]" size="10" required>
    </div>
    <input type="submit" value="Log Entry">
  </form>
</div>