<h5>FATURA/DUPLICATA</h5>
<div class="row">
    <?php for ($i = 0; $i <= ($nfe->getDups() - 1); $i++) {
        $dup = $nfe->getDup($i);
    ?>
        <div class="col-3" style="float: left;">
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
        </div>
    <?php } ?>
</div>