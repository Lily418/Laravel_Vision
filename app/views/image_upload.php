<html>
<body>

<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="/image/image_upload.html" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="upfile" type="file" />
    <input type="submit" value="Send File" />
</form>

</body>
</html>