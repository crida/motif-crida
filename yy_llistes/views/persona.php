<?php
if(!$persona){
    $persona = new Persona();
    $persona->setNom("...");
    $persona->setCognoms("...");
    $persona->setVots(0);
}
$class = "";
if(isset($disabled) && $disabled === true || $persona->getEscollidaFase1()){
    $class = "disabled";
}

?>
<li data-internal="<?=$internalId?>" data-id="<?=$persona->getId()?>" data-genere="<?=$persona->getGenere()?>" class="<?=$class?>">
    <div class="id"><?=$internalId?></div>
    <div class="nameSpace"><span class="nom"><?=$persona->getNom()?></span><span class="cognoms"><?=$persona->getCognoms()?></span></div>
    <div class="vots"><?=$persona->getVots()?></div>
</li>
