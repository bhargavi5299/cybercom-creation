<!doctype html>
<html lang="en">
    <head>
        <title>Questcom</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/Js/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/Js/mage.js') ?>"></script>
        <script src="skin/ckeditor.js"></script>
	    <script src="skin/sample.js"></script>
    </head>
    <body>
        <table width="100%" height="100%">
            <thead>
                <td colspan="3" height="50px"><?php echo $this->getChild('Header')->toHtml(); ?></td>
            </thead>
            <tbody style="height:100vh; width:100vh;">
                <tr>
                    <td width="200px"><?php echo $this->getChild('leftTab')->toHtml(); ?></td>
                <td>
                    <?php echo $this->createChild('Block\Core\Layout\Message')->toHtml(); ?>
                    <?php echo $this->getChild('Content')->toHtml(); ?>
                </td>
                    <td width="200px"><?php $this->getChild('Rightbar')->toHtml();?></td>
                </tr>
            </tbody>
            <tfoot>
                <td colspan="3" height="50px"><?php echo $this->getChild('Footer')->toHtml(); ?></td>
            </tfoot>
        </table>
    </body>
</html>