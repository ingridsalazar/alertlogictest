<pre>
    <?php
    /**
     * Get the number of netmask bits from a netmask in presentation format 
     * 
     * @param string $netmask Netmask in presentation format 
     *  
     * @return integer Number of mask bits 
     * @throws Exception 
     */
    if ($_GET) {
        if (isset($_GET['calculate'])) {
            netmask2bitmask();
        }
    }

    function netmask2bitmask() {
        $totalBits = 0;
        $netmask = $_GET['netmask'];
        $ipv6 = ':';
        $ipv4 = '.';
        $pos = strpos($netmask, $ipv6);
        if ($pos === false) {
            $pos = strpos($netmask, $ipv4);
            if ($pos === false) {
                throw(new Exception('Error: This function can not validate the input'));
            } else {
                $cadena = explode(".", $netmask);
                $cantidad = count($cadena);
                if ($cantidad === 4) {
                    if (($cadena[0] > 255) || ($cadena[1] > 255) || ($cadena[2] > 255) || ($cadena[3] > 255)) {
                        throw(new Exception('Error: This function can not validate the input, the input had a incorrect format'));
                    } else {
                        $pos0 = decbin($cadena[0]);
                        $pos1 = decbin($cadena[1]);
                        $pos2 = decbin($cadena[2]);
                        $pos3 = decbin($cadena[3]);

                        $cadenaBinarios = $pos0 . $pos1 . $pos2 . $pos3;
                        for ($i = 0; $i < strlen($cadenaBinarios); $i++) {
                            $totalBits = $totalBits + $cadenaBinarios[$i];
                        }
                    }
                } else {
                    throw(new Exception('Error: This function can not validate the input, the input had a incorrect format'));
                }
            }
        } else {
            $cadena = explode(":", $netmask);
            $cantidad = count($cadena);
            if ($cantidad === 8) {
                $pos0 = base_convert($cadena[0], 16, 2);
                $pos1 = base_convert($cadena[1], 16, 2);
                $pos2 = base_convert($cadena[2], 16, 2);
                $pos3 = base_convert($cadena[3], 16, 2);
                $pos4 = base_convert($cadena[4], 16, 2);
                $pos5 = base_convert($cadena[5], 16, 2);
                $pos6 = base_convert($cadena[6], 16, 2);
                $pos7 = base_convert($cadena[7], 16, 2);
                $cadenaBinarios = $pos0 . $pos1 . $pos2 . $pos3 . $pos4 . $pos5 . $pos6 . $pos7;
                for ($i = 0; $i < strlen($cadenaBinarios); $i++) {
                    $totalBits = $totalBits + $cadenaBinarios[$i];
                }
            } else {
                throw(new Exception('Error: This function can not validate the input, the input had a incorrect format'));
            }
        }

        echo ("<h2>El total de bits es " . $totalBits . " para la netmask " . $netmask . "</h2>");
    }
    ?>
</pre>
<html>
    <head>
        <title>NetMask2Bits</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form id="sampleForm" name="sampleForm" action="ip_address.php">
            <div class="container">
                <div class="form-group">
                    <label for="netmask">NetMask:</label>
                    <input type="text" class="form-control" id="netmask" name="netmask" placeholder="Enter NetMask">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="calculate" value="Calculate" /> 
                </div>
            </div>
        </form>
    </body>
</html>