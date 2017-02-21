<h3>Past 14 Days</h3>
<?php foreach($history as $date=>$day): ?>
  <?php
    $calories = 0;
    $proteins = 0;
    $carbs = 0;
    $fats = 0;
  ?>
  <h4><?= $date ?></h4>
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
      <?php foreach($day as $entry): ?>
        <?php
          $calories += $entry->calories;
          $proteins += $entry->proteins;
          $carbs += $entry->carbs;
          $fats += $entry->fats;
        ?>
        <tr>
          <td><?= $entry->food ?></td>
          <td class="center"><?= $entry->calories ?></td>
          <td class="center"><?= $entry->carbs ?></td>
          <td class="center"><?= $entry->proteins ?></td>
          <td class="center"><?= $entry->fats ?></td>
        </tr>
      <?php endforeach ?>
      <tr class="total-row">
        <td><strong>TOTAL:</strong></td>
        <td class="center"><strong><?= $calories ?></strong></td>
        <td class="center"><strong><?= $carbs ?></strong></td>
        <td class="center"><strong><?= $proteins ?></strong></td>
        <td class="center"><strong><?= $fats ?></strong></td>
      </tr>
    </tbody>
  </table>
<?php endforeach ?>
<p>
  <a href="./csv.php">Download All History</a>
</p>