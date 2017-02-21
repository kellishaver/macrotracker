<div id="password-box">
  <h3>Daily Targets / Limits</h3>
  <form action="./settings.php" method="post">
    <div>
      <label>Calories:</label>
      <input type="text" name="settings[calorie_goal]" size="10" required value="<?= $settings->calorie_goal ?>">
    </div>
    <div>
      <label>Net Carbs:</label>
      <input type="text" name="settings[carb_goal]" size="10" required value="<?= $settings->carb_goal ?>">
    </div>
    <div>
      <label>Proteins:</label>
      <input type="text" name="settings[protein_goal]" size="10" required value="<?= $settings->protein_goal ?>">
    </div>
    <div>
      <label>Fats:</label>
      <input type="text" name="settings[fat_goal]" size="10" required value="<?= $settings->fat_goal ?>">
    </div>
    <input type="submit" value="Save Changes">
  </form>
</div>