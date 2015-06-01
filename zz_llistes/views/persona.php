<?php
$class = "";
if(isset($disabled) && $disabled === true){
    $class = "disabled";
}
if(!$persona){
    $persona = new Persona();
    $persona->setNom("...");
    $persona->setCognoms("...");
    $persona->setVots(0);
}
?>
<li data-internal="<?=$internalId?>" data-id="<?=$persona->getId()?>" data-genere="<?=$persona->getGenere()?>" class="<?=$class?>">
    <span class="id"><?=$internalId?></span>
    <span class="cognoms"><?=$persona->getCognoms()?></span>
    <span class="nom"><?=$persona->getNom()?></span>
    <span class="vots"><?=$persona->getVots()?></span>
</li>
