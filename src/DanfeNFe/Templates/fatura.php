<?php

echo('<h5>FATURA/DUPLICATA</h5>');
echo('<table class="table">');

    $c = 0;
    for ($i = 0; $i <= ($nfe->getDups() - 1); $i++) {
        $dup = $nfe->getDup($i);

    if (($c % 4) == 0) {
        if ($c > 0) {
            echo('</tr>');
        }
        echo('<tr>');
    }
    $c += 1;

?>
        <td class="col-3">
            <table class="table fatura">
                <tr>
                    <td>
                        <p class="al-center">
                            <small>NÚMERO</small>
                            <?php echo $dup->get('nDup'); ?>
                        </p>
                    </td>
                    <td>
                        <p class="al-center">
                            <small>VENCIMENTO</small>
                            <?php echo $dup->get('dVenc')->datetime('d/m/Y', 'Y-m-d'); ?>
                        </p>
                    </td>
                    <td class="al-right">
                        <p>
                            <small>VALOR</small>
                            <?php echo $dup->get('vDup')->number(2); ?>
                        </p>
                    </td>
                </tr>
            </table>

        </td>

<?php
        if (($c-1) % 4) != 0) {
            echo('</tr>');
        }
    }
?>
</table>