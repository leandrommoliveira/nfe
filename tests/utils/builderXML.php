<?php

$nfe = new \PhpNFe\NFe\Builder\Nfe();

// Ide
$nfe->ide->cUF = '42';
$nfe->ide->cNF = '99985999';
$nfe->ide->natOp = 'TESTE';
$nfe->ide->nNF = 44;
$nfe->ide->indPag = '0';
$nfe->ide->mod = '55';
$nfe->ide->serie = '1';
$nfe->ide->dhEmi = '2016-06-13T14:27:00-03:00';
$nfe->ide->tpNF = '1';
$nfe->ide->idDest = '1';
$nfe->ide->cMunFG = '4202008';
$nfe->ide->tpImp = '1';
$nfe->ide->tpEmis = '1';
$nfe->ide->cDV = '9';
$nfe->ide->tpAmb = '2';
$nfe->ide->finNFe = '1';
$nfe->ide->indFinal = '0';
$nfe->ide->indPres = '1';
$nfe->ide->procEmi = '0';
$nfe->ide->verProc = 'EmiteNF-e 3.1.17.38';

// Emit
$nfe->emit->CNPJ = '18227795000130';
$nfe->emit->xNome = 'NOME TESTE SOBRENOME ME';
$nfe->emit->xFant = 'MINHA EMPRESA FANTASIA TESTE';
$nfe->emit->enderEmit->xLgr = 'ROD BR 101';
$nfe->emit->enderEmit->nro = '3662';
$nfe->emit->enderEmit->xBairro = 'ESTADO';
$nfe->emit->enderEmit->cMun = '4202008';
$nfe->emit->enderEmit->xMun = 'BALNEARIO CAMBORIU';
$nfe->emit->enderEmit->UF = 'SC';
$nfe->emit->enderEmit->CEP = '88330331';
$nfe->emit->IE = '257048863';
$nfe->emit->CRT = '1';

// Det
$nfe->dest->CNPJ = '82185059000166';
$nfe->dest->xNome = 'NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL';
$nfe->dest->enderDest->xLgr = 'ROD SC 408';
$nfe->dest->enderDest->nro = 'S/N';
$nfe->dest->enderDest->xCpl = 'KM 0,7';
$nfe->dest->enderDest->xBairro = 'VENDAVAL';
$nfe->dest->enderDest->cMun = '4202305';
$nfe->dest->enderDest->xMun = 'BIGUACU';
$nfe->dest->enderDest->UF = 'SC';
$nfe->dest->enderDest->CEP = '88160000';
$nfe->dest->enderDest->fone = '4732485754';
$nfe->dest->indIEDest = '1';
$nfe->dest->IE = '252121120';
$nfe->dest->email = 'emailteste@HOTMAIL.COM';

// Prod 1
$nfe->det->add($item = new \PhpNFe\NFe\Builder\Det\DetNfe());
$item->prod->cProd = '000277';
$item->prod->xProd = 'PRODUTO TESTE 60CM';
$item->prod->NCM = '06031100';
$item->prod->CFOP = '5102';
$item->prod->uCom = 'UND';
$item->prod->qCom = '1.0000';
$item->prod->vUnCom = 20.0000000000;
$item->prod->vProd = 20.00;
$item->prod->uTrib = 'UND';
$item->prod->qTrib = '1.0000';
$item->prod->vUnTrib = 20.0000000000;
$item->prod->indTot = '1';
$item->imposto->ICMS->ICMSSN101->orig = '0';
$item->imposto->ICMS->ICMSSN101->CSOSN = '101';
$item->imposto->ICMS->ICMSSN101->pCredSN = '3.5000';
$item->imposto->ICMS->ICMSSN101->vCredICMSSN = 0.70;
$item->imposto->PIS->PISOutr->CST = '99';
$item->imposto->PIS->PISOutr->vBC = 0.00;
$item->imposto->PIS->PISOutr->pPIS = 0.0000;
$item->imposto->PIS->PISOutr->vPIS = 0.00;
$item->imposto->COFINS->COFINSOutr->CST = '99';
$item->imposto->COFINS->COFINSOutr->vBC = 0.00;
$item->imposto->COFINS->COFINSOutr->pCOFINS = 0.00;
$item->imposto->COFINS->COFINSOutr->vCOFINS = 0.00;

// Prod 2
$nfe->det->add($item = new \PhpNFe\NFe\Builder\Det\DetNfe());
$item->prod->cProd = '003811';
$item->prod->xProd = 'PRODUTO TESTE';
$item->prod->NCM = '06031100';
$item->prod->CFOP = '5102';
$item->prod->uCom = 'UND';
$item->prod->qCom = '3.0000';
$item->prod->vUnCom = 14.4000000000;
$item->prod->vProd = 43.20;
$item->prod->uTrib = 'UND';
$item->prod->qTrib = '3.0000';
$item->prod->vUnTrib = 14.4000000000;
$item->prod->indTot = '1';
$item->imposto->ICMS->ICMSSN101->orig = '0';
$item->imposto->ICMS->ICMSSN101->CSOSN = '101';
$item->imposto->ICMS->ICMSSN101->pCredSN = '3.5000';
$item->imposto->ICMS->ICMSSN101->vCredICMSSN = 1.51;
$item->imposto->PIS->PISOutr->CST = '99';
$item->imposto->PIS->PISOutr->vBC = 0.00;
$item->imposto->PIS->PISOutr->pPIS = 0.0000;
$item->imposto->PIS->PISOutr->vPIS = 0.00;
$item->imposto->COFINS->COFINSOutr->CST = '99';
$item->imposto->COFINS->COFINSOutr->vBC = 0.00;
$item->imposto->COFINS->COFINSOutr->pCOFINS = 0.00;
$item->imposto->COFINS->COFINSOutr->vCOFINS = 0.00;

// Prod 3
$nfe->det->add($item = new \PhpNFe\NFe\Builder\Det\DetNfe());
$item->prod->cProd = '005207';
$item->prod->xProd = 'TESTE PRODUTO - 224';
$item->prod->NCM = '06031100';
$item->prod->CFOP = '5102';
$item->prod->uCom = 'UND';
$item->prod->qCom = '10.0000';
$item->prod->vUnCom = 4.0000000000;
$item->prod->vProd = 40.00;
$item->prod->uTrib = 'UND';
$item->prod->qTrib = '10.0000';
$item->prod->vUnTrib = 4.0000000000;
$item->prod->indTot = '1';
$item->imposto->ICMS->ICMSSN101->orig = '0';
$item->imposto->ICMS->ICMSSN101->CSOSN = '101';
$item->imposto->ICMS->ICMSSN101->pCredSN = '3.5000';
$item->imposto->ICMS->ICMSSN101->vCredICMSSN = 1.40;
$item->imposto->PIS->PISOutr->CST = '99';
$item->imposto->PIS->PISOutr->vBC = 0.00;
$item->imposto->PIS->PISOutr->pPIS = 0.0000;
$item->imposto->PIS->PISOutr->vPIS = 0.00;
$item->imposto->COFINS->COFINSOutr->CST = '99';
$item->imposto->COFINS->COFINSOutr->vBC = 0.00;
$item->imposto->COFINS->COFINSOutr->pCOFINS = 0.00;
$item->imposto->COFINS->COFINSOutr->vCOFINS = 0.00;

// Prod 4
$nfe->det->add($item = new \PhpNFe\NFe\Builder\Det\DetNfe());
$item->prod->cProd = '000679';
$item->prod->xProd = 'TESTE PRODUTO 123';
$item->prod->NCM = '06031100';
$item->prod->CFOP = '5102';
$item->prod->uCom = 'UND';
$item->prod->qCom = '2.0000';
$item->prod->vUnCom = 15.0000000000;
$item->prod->vProd = 30.00;
$item->prod->uTrib = 'UND';
$item->prod->qTrib = '2.0000';
$item->prod->vUnTrib = 15.0000000000;
$item->prod->indTot = '1';
$item->imposto->ICMS->ICMSSN101->orig = '0';
$item->imposto->ICMS->ICMSSN101->CSOSN = '101';
$item->imposto->ICMS->ICMSSN101->pCredSN = '3.5000';
$item->imposto->ICMS->ICMSSN101->vCredICMSSN = 1.05;
$item->imposto->PIS->PISOutr->CST = '99';
$item->imposto->PIS->PISOutr->vBC = 0.00;
$item->imposto->PIS->PISOutr->pPIS = 0.0000;
$item->imposto->PIS->PISOutr->vPIS = 0.00;
$item->imposto->COFINS->COFINSOutr->CST = '99';
$item->imposto->COFINS->COFINSOutr->vBC = 0.00;
$item->imposto->COFINS->COFINSOutr->pCOFINS = 0.00;
$item->imposto->COFINS->COFINSOutr->vCOFINS = 0.00;

// Total
$nfe->total->ICMSTot->vBC = 0.00;
$nfe->total->ICMSTot->vICMS = 0.00;
$nfe->total->ICMSTot->vICMSDeson = 0.00;
$nfe->total->ICMSTot->vBCST = 0.00;
$nfe->total->ICMSTot->vST = 0.00;
$nfe->total->ICMSTot->vProd = 133.20;
$nfe->total->ICMSTot->vFrete = 0.00;
$nfe->total->ICMSTot->vSeg = 0.00;
$nfe->total->ICMSTot->vDesc = 0.00;
$nfe->total->ICMSTot->vII = 0.00;
$nfe->total->ICMSTot->vIPI = 0.00;
$nfe->total->ICMSTot->vPIS = 0.00;
$nfe->total->ICMSTot->vCOFINS = 0.00;
$nfe->total->ICMSTot->vOutro = 0.00;
$nfe->total->ICMSTot->vNF = 133.20;
$nfe->total->ICMSTot->vTotTrib = 0.00;

// Transp
$nfe->transp->modFrete = '0';
$nfe->transp->transporta->CPF = '44479085904';
$nfe->transp->transporta->xNome = 'NOME SOBRENOME';
$nfe->transp->transporta->IE = 'ISENTO';
$nfe->transp->transporta->xEnder = 'RUA TESTE, 278, 278 - BAIRRO TESTE';
$nfe->transp->transporta->xMun = 'GOVERNADOR CELSO RAMOS';
$nfe->transp->transporta->UF = 'SC';
$nfe->transp->vol->qVol = '1';
$nfe->transp->vol->esp = 'UNIDADE';
$nfe->transp->vol->marca = '-';
$nfe->transp->vol->nVol = '000003';
$nfe->transp->vol->pesoL = 1.000;
$nfe->transp->vol->pesoB = 1.000;

// Cobr
$nfe->cobr->fat->nFat = '000003';
$nfe->cobr->fat->vOrig = 133.20;
$nfe->cobr->fat->vLiq = 133.20;
$nfe->cobr->dup[] = $dup = new \PhpNFe\NFe\Builder\Cobr\DupNfe();
$dup->nDup = '000003A';
$dup->dVenc = '2016-10-09';
$dup->vDup = 133.20;

// infAdic
$nfe->infAdic->infCpl = 'xxxx';

return $nfe->getXML();