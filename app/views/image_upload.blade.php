<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="{{{ $action }}}" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="upfile" type="file" id="fileUpload"/>

    @if ($action == "/image")
    <input type="textbox" name="user_id" />
    @endif
    <input type="submit" value="Send File" />
</form>