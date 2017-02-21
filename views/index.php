<div class="columns">
  <div class="left">
    <h2>
      <?= $today->calories ?>
      <span>Calories</span>
      <small><?= (int)$goals->calorie_goal - $today->calories ?> remaining.</small>
    </h2>

    <p>
      <a href="./log.php" class="big-button">Log Entry</a>
    </p>
  </div>
  <div class="right">
    <ul>
      <li>
        <?= $today->carbs ?>g Net Carbs
        <small><?= (int)$goals->carb_goal - $today->carbs ?> remaining.</small>
      </li>
      <li>
        <?= $today->proteins ?>g Protein
        <br>
        <small><?= (int)$goals->protein_goal - $today->proteins ?> remaining.</small>
      </li>
      <li>
        <?= $today->fats ?>g Fat
        <small><?= (int)$goals->fat_goal - $today->fats ?> remaining.</small>
      </li>
    </ul>
  </div>
</div>
<br><Br>
<table border="0" cellspacing="0" cellpadding="3" width="100%">
  <thead>
    <tr>
      <th width="40%"><div class="left">Food</div></th>
      <th width="15%">Calories</th>
      <th width="15%">Net Carbs</th>      
      <th width="15%">Proteins</th>
      <th width="15%">Fats</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($today->foods as $food): ?>
      <tr>
        <td><?= $food->food ?></td>
        <td class="center"><?= $food->calories ?></td>
        <td class="center"><?= $food->carbs ?></td>
        <td class="center"><?= $food->proteins ?></td>
        <td class="center"><?= $food->fats ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>