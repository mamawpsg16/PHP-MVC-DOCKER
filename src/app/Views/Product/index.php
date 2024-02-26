<?php include_once INCLUDES . 'Header.php'; ?>
<div class="row mt-2">
    <div class="col-10  mx-auto">
        <div class="text-end mt-1 mb-2">
            <a href="/product/create" class="btn btn-md btn-primary">Create</a>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <!-- <th>Action</th> -->
            </tr>
            <?php if(count($data) > 0): ?>
                <?php foreach ($data as $product) : ?>
                <tr>
                    <td><?= htmlspecialchars($product->name) ?></td>
                    <td><?= $product->description ? htmlspecialchars($product->description) : null ?></td>
                    <!-- <td><button type="button"class="btn btn-sm btn-danger">Delete</button></td> -->
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" class="text-center">No Data Found...</td>
                </tr>
            <?php endif;?>
        </table>
        </div>
    </div>
</div>
<script>

</script>
<?php include_once INCLUDES . 'Footer.php'; ?>