<h5>FATURA/DUPLICATA</h5>
<div class="row">
    <?php for ($i = 1; $i <= 1; $i++) { ?>
        <div class="col-3">
            <table class="table fatura">
                <tr>
                    <td>
                        <p class="al-center">
                            <small>NÚMERO</small>
                            <?php echo $nfe->get('cobr.dup.nDup'); ?>
                        </p>
                    </td>
                    <td>
                        <p class="al-center">
                            <small>VENCIMENTO</small>
                            <?php echo str_replace('-', '/', $nfe->get('cobr.dup.dVenc')); ?>
                        </p>
                    </td>
                    <td class="al-right">
                        <p>
                            <small>VALOR</small>
                            <?php echo $nfe->get('cobr.dup.vDup'); ?>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    <?php } ?>
</div>