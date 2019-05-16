<?php
error_reporting(E_ALL & ~E_NOTICE);
print_r($_POST);
if($_POST) {
    print_r($_FILES);
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
    $tmp = $_FILES['deskImg']['tmp_name'];
   $dd =  move_uploaded_file($tmp, 'public/uplodes/'.$_FILES['deskImg']['name']);
   var_dump($dd);
    die('sasasasa');
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td></td>
            <td><input type="text" name="deskdsdsdImg" multiple/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="file" name="deskImg" multiple/></td>
        </tr>
        <tr>
            <td colspan="2" align="center">Note: Supported image format: .jpeg, .jpg, .png, .gif</td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Create Gallery" id="selectedButton"/></td>
        </tr>
    </table>
</form>