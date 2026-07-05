<html>
    <body>
    <form action="addw.php" method="POST" enctype="multipart/form-data">
    <label>Upload Videos:</label>
    <input type="file" name="w_video[]" multiple accept="video/*"><br><br>
    
    <label>Upload Image:</label>
    <input type="file" name="w_image" accept="image/*"><br><br>
    
    <input type="submit" name="submit" value="Upload">
</form>
</body>
</html>
