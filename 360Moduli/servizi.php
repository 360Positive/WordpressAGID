<?php
	/**
		* Sistema di visualizzazione dei servizi
		* Deve essere impostato nel file l'id della categoria al quale associare i post
	*/
?>
<script>
	$('<link/>', {
		rel: 'stylesheet',
		type: 'text/css',
		href: '<?= get_site_url() ?>/wp-content/themes/design-italia-child/360Moduli/css/servizi.css'//css da includere
	}).appendTo('head');
	
	
</script> 
<?php
	/*Il 3 valore dell'array è il nome dell'icona della libreria icofont*/
	$servizi = [
    ['Patrimonio', 'ERP - Canoni di locazioni e affitti - Patrimonio immobiliare', 'institution', 'patrimonio'],
    ['Formazione e Lavoro', 'Formazione professionale - Orientamento al lavoro - Scuole Arte e dei Mestieri', 'briefcase', 'formazione_e_lavoro'],
    ['Anagrafe e servizi civici', 'Ufficio Anagrafe - Ufficio Servizi Elettorali - Ufficio Stato Civile', 'certificate-alt-1', 'anagrafe_e_servizi_civici'],
    ['Casa e Urbanistica', 'Assistenza alloggiativa temporanea - Condono edilizio - Contributi e Interventi di sostegno', 'home', 'casa'],
    ['Commercio Impresa', 'Commercio su aree pubbliche - Pubblica affissione di manifesti - S.U.A.P.', 'chart-histogram', 'commercio_e_impresa'],
    ['Cultura', 'Autorizzazioni pubblico spettacolo - Biblioteca - Musei', 'book', 'cultura'],
    ['Pubblica istruzione', 'Mensa - Asili - Scuole', 'school-bag', 'scuola_formazione_lavoro'],
    ['Diritti e Pari Opportunità', 'Centri Antiviolenza - Accesso agli atti - Reclami e segnalazioni', 'law-alt-3', 'diritti_e_pari_opportunita'],
    ['Disabilità', 'Assistenza alla persona e domiciliare - Trasporto e agevolazioni - Spazio di sosta disabili', 'wheelchair', 'disabilita'],
    ['Ambiente', 'Benessere animali - Gestione rifiuti - Verde urbano', 'tree', 'ambiente', 'ambiente'],
	//    ['Innovazione e Smart City', 'Agenda digitale - WiFi', 'wifi', ''],
    ['Mobilità e Trasporti', 'Parcheggi - Trasporto Pubblico - Viabilità e ZTL', 'bus-alt-1', 'mobilità'],
    ['Opere e manutenzione', 'Impianti tecnologici - Scavi - Strade  ', 'under-construction-alt', 'manutenzione_della_citta'],
	
	];
	
?>
<div class="light">
    <div class="container servizi">
		
        <h1 class="servizi"><?= _('Servizi per Tematica') ?></h1>
        <div class="col-md-12">
            <div class="row max-height-col">
                <?php
					global $post;
					foreach ($servizi as $servizio) {
						?><?php
						/**   Struttura del singolo blocco dei servizi             */
					?>
                    <div class=" col-md-4 col-sm-6 equal">
                        <div class="servizi">
                            <i class="icofont-<?= $servizio[2] ?>" style="font-size: 1.5em!important"></i>
                            <a class="servizititolo" href="<?= get_site_url()."/servizicom?sezione=".$servizio[3] ?>"
							title="Apre pagina interna : <?= $servizio[0] ?>"> <?= $servizio[0] ?></a>
                            </br>
                            <p class="servizisub"><?= $servizio[1] ?></p>
						</div>
					</div>
					<?php };
				?>
			</div>
		</div>
		
	</div>
</div>