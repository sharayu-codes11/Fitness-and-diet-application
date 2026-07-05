<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['test_file'];

    if (move_uploaded_file($file['tmp_name'], "assets/vids/" . $file['name'])) {
        echo "File uploaded successfully!";
    } else {
        echo "File upload failed!";
    }
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="test_file">
    <input type="submit" value="Upload">
</form>
