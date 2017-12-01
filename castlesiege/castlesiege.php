<?php
define('CASTLE_SIEGE', true);
require_once('scripts/functions.php');
$castelos = listCastle();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <style>
        * {margin: 0; padding: 0;}
        
        body{
            color : #422E00;
            font-size: 12px;
            font-family: Calibri, sans-serif;
        }

        h2 {
            font-size: 16px;
        }

        h2 {
            font-size: 14px;
        }

        #castle-siege {
            padding-top: 30px;
            width: <?php echo PAGE_WIDTH; ?>;
            background: url('<?php echo BASE_URL; ?>/img/old-paper-texture.jpg') no-repeat center top;
        }

        .cs-img {
            width: 160px;
        }

        .cs-img img {
            border: 3px solid #704F00;
        }

        .space-y {
            height : 8px;
            margin : 0;
            padding : 0;
            border : 0;
            display: block;
        }
    </style>
    <body>
        <h1>Castle Siege</h1>
        <table id="castle-siege">
            <tbody>
                <?php foreach ($castelos as $key => $row): ?>
                    <tr>
                        <td class="cs-img" rowspan="7"><img src="<?php echo BASE_URL; ?>img/cs-img/<?php echo $row['name']; ?>.jpg" title="<?php echo $row['name']; ?> Castle" /></td>
                        <td><h2><?php echo $row['name']; ?></h2></td>
                    </tr>
                    <tr>
                        <td>Tax: <?php echo $row['taxPercent']; ?>%, <?php echo retornaDataSiege($row['siegeDate']); ?></td>
                    </tr>
                    <tr>
                        <td class="space-y">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Dono : <strong><?php echo $row['owner']; ?></strong></td>
                    </tr>
                    <tr>
                        <td  class="space-y"></td>
                    </tr>
                    <tr>
                        <td>Atacantes: <?php echo listAtacantes($row['id']); ?></td>
                    </tr>
                    <tr>
                        <td>Defensores: <?php echo listDefensores($row['id']); ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
