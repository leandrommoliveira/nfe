<table>
    <tr>
        <div>
            Chave <?php echo $evento->get('chNFe');?>
        </div>
        <div>
            Ambiente <?php echo $evento->get('tpAmb');?>
        </div>
        <div>
            NF <?php $info = $evento->getChaveInfo(); 
               echo 'Número ' . $info->nNF . ' - Série ' . $info->serie . ' - Nota Fiscal ';?>
        </div>
        <div>
            CNPJ emissor <?php echo $evento->get('tpAmb');?>
        </div>
        <div>
            CNPJ receptor <?php echo $evento->get('tpAmb');?>
        </div>
        <div>
            Data da C.C. <?php echo $evento->get('tpAmb');?>
        </div>
        <div>
            Protocolo <?php echo $evento->get('tpAmb');?>
        </div>
        <div>
            Texto <?php echo $evento->get('tpAmb');?>
        </div>
        <div>
            Condicao de Uso <?php echo $evento->get('tpAmb');?>
        </div>
    </tr>
</table>