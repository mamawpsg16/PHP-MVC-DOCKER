<?php include_once INCLUDES . 'Header.php'; ?>

<form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*">
    <button type="submit">Upload</button>
</form>

<?php include_once INCLUDES . 'Footer.php'; ?>