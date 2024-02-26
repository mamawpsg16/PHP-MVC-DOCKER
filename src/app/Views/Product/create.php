<?php include_once INCLUDES . 'Header.php'; ?>

<div class="row justify-content-center">
    <form id="product-form" action="/product" method="post">
        <div class="form-group">
            <label >Name</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label >Description</label>
            <input type="text" name="description">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include_once INCLUDES . 'Footer.php'; ?>