<?php include_once INCLUDES . 'Header.php'; ?>
<?php include_once HELPERS . 'DateFormatter.php'; ?>
<div class="row mt-2">
  <div class="col-12">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Country</th>
          <th>Address</th>
          <th>Company</th>
          <th>Date</th>
          <th>Salary</th>
        </tr>
        <?php foreach ($products as $product) : ?>
          <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['country'] ?></td>
            <td><?= $product['address'] ?></td>
            <td><?= $product['company'] ?></td>
            <td><?= stringToWord($product['date']) ?></td>
            <td><?= number_format($product['salary'],2) ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<?php include_once INCLUDES . 'Footer.php'; ?>