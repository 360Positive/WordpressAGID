<?php
	/**
		* Sistema di visualizzazione dei servizi
		* Deve essere impostato nel file l'id della categoria al quale associare i post
	*/
?>

<style>
    <?php
/**Stile associato alla sezione dei servizi*/
?>
    div.container.servizi{
        background:#eeeeee;
        padding-bottom:2%;
        padding-top:2%;
    }
    
    h1.servizi{
        font-size: 2.5rem!important;
        color: black;
        padding: 15px;
        font-weight: 700!important;
    }
    
   div.col-md-3>div.servizi{
        border-radius:3px;
        background:white;
        padding:3%;
        margin:10px;
        -webkit-box-shadow: 1px 1px 5px 0px rgba(156,156,156,1);
        -moz-box-shadow: 1px 1px 5px 0px rgba(156,156,156,1);
        box-shadow: 1px 1px 5px 0px rgba(156,156,156,1);
       width: 100%;
        }
    span.servizisub{
        font-style: italic;
        font-size:0.8rem!important;
        line-height:80%;
    }
    .servizititolo >a, .servizititolo >a > i {
        font-size:0.98rem!important;
        }
    .equal {
        display: flex;
        display: -webkit-flex;
        flex-wrap: nowrap;

    }
</style>
<?php
/*Il 3 valore dell'array è il nome dell'icona della libreria icofont*/
$servizi=[
	['Patrimonio','ERP - Canoni di locazioni e affitti - Patrimonio immobiliare','institution',''],
    ['Formazione e Lavoro','Formazione professionale - Orientamento al lavoro - Scuole Arte e dei Mestieri','briefcase',''],
    [' Anagrafe e servizi civici','Ufficio Anagrafe - Ufficio Servizi Elettorali - Ufficio Stato Civile','certificate-alt-1',''],
    ['Casa e Urbanistica','Assistenza alloggiativa temporanea - Condono edilizio - Contributi e Interventi di sostegno','home',''],
    ['Commercio Impresa','Commercio su aree pubbliche - Pubblica affissione di manifesti - S.U.A.P.','chart-histogram',''],
    ['Cultura','Autorizzazioni pubblico spettacolo - Biblioteca - Musei','book',''],
	['Diritti e Pari Opportunità','Centri Antiviolenza - Accesso agli atti - Reclami e segnalazioni','law-alt-3',''],
    ['Disabilità','Assistenza alla persona e domiciliare - Trasporto e agevolazioni - Spazio di sosta disabili','wheelchair',''],
    ['Ambiente','Benessere animali - Gestione rifiuti - Verde urbano','tree',''],
    ['Innovazione e Smart City','Agenda digitale - WiFi','wifi',''],
    ['Mobilità e Trasporti','Parcheggi - Trasporto Pubblico - Viabilità e ZTL','bus-alt-1',''],
    ['Opere e manutenzione','Impianti tecnologici - Scavi - Strade  ','under-construction-alt',''],

    ];

?>
<div  class="light">
<div class="container servizi">
   
        <h1 class="servizi"><?=_('Servizi per Tematica')?></h1>
	<div class="col-md-12">
		<div class="row max-height-col">

            <?php
            global $post;
				foreach ( $servizi as $servizio ) {
			?><?php
                    /**   Struttura del singolo blocco dei servizi             */
                    ?>
			 <div class="col-md-3 equal">
			              <div class="servizi text-center">
                              <i class="icofont-<?=$servizio[2]?>" style="font-size: 2em!important"></i>
                              <br>
                              <a class="servizititolo" href="<?=$servizio[3]?>" title="<?=$servizio[0]?>"> <?=$servizio[0]?></a>
                              </br>
			                  <span class="servizisub"><?=$servizio[1]?></span>
			              </div>
			 </div>
			<?php }; 
			?>
		</div>
	</div>
        
	</div>
</div>