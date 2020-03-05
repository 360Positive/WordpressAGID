<?php
/**
 * Sistema di visualizzazione dei servizi
 * Deve essere impostato nel file l'id della categoria al quale associare i post
 */
?>

<style>
<?
php?>/**
 * Stile associato alla sezione dei servizi
 */
 div.container.servizi {
	background: #eeeeee;
	padding-bottom: 2%;
	padding-top: 2%;
}

h1.servizi {
	font-size: 2.5rem !important;
	color: black;
	padding: 15px;
	font-weight: 700 !important;
}

div[class*='col']>div.servizi {
	border-radius: 3px;
	background: white;
	padding: 3%;
	margin: 10px;
	-webkit-box-shadow: 1px 1px 5px 0px rgba(156, 156, 156, 1);
	-moz-box-shadow: 1px 1px 5px 0px rgba(156, 156, 156, 1);
	box-shadow: 1px 1px 5px 0px rgba(156, 156, 156, 1);
	width: 100%;
}

p.servizisub {
	font-style: italic;
	color: #1c2024 !important;
	font-size: 0.9rem !important;
	line-height: 90%;
}

a.servizititolo {
	font-size: 1.1rem !important;
	font-weight: bolder !important;
}

.equal {
	display: flex;
	display: -webkit-flex;
	flex-wrap: nowrap;
}
</style>
<?php
/* Il 3 valore dell'array è il nome dell'icona della libreria icofont */
$servizi = [
    [
        'Patrimonio',
        'ERP - Canoni di locazioni e affitti - Patrimonio immobiliare',
        'institution',
        ''
    ],
    [
        'Formazione e Lavoro',
        'Formazione professionale - Orientamento al lavoro - Scuole Arte e dei Mestieri',
        'briefcase',
        ''
    ],
    [
        'Anagrafe e servizi civici',
        'Ufficio Anagrafe - Ufficio Servizi Elettorali - Ufficio Stato Civile',
        'certificate-alt-1',
        'anagrafe_e_servizi_civici'
    ],
    [
        'Casa e Urbanistica',
        'Assistenza alloggiativa temporanea - Condono edilizio - Contributi e Interventi di sostegno',
        'home',
        ''
    ],
    [
        'Commercio Impresa',
        'Commercio su aree pubbliche - Pubblica affissione di manifesti - S.U.A.P.',
        'chart-histogram',
        'commercio_e_impresa'
    ],
    [
        'Cultura',
        'Autorizzazioni pubblico spettacolo - Biblioteca - Musei',
        'book',
        'cultura'
    ],
    [
        'Pubblica istruzione',
        'Mensa - Asili - Scuole',
        'school-bag',
        'scuola_formazione_lavoro'
    ],
    [
        'Diritti e Pari Opportunità',
        'Centri Antiviolenza - Accesso agli atti - Reclami e segnalazioni',
        'law-alt-3',
        'diritti_e_pari_opportunita'
    ],
    [
        'Disabilità',
        'Assistenza alla persona e domiciliare - Trasporto e agevolazioni - Spazio di sosta disabili',
        'wheelchair',
        ''
    ],
    [
        'Ambiente',
        'Benessere animali - Gestione rifiuti - Verde urbano',
        'tree',
        'ambiente'
    ],
    // ['Innovazione e Smart City', 'Agenda digitale - WiFi', 'wifi', ''],
    [
        'Mobilità e Trasporti',
        'Parcheggi - Trasporto Pubblico - Viabilità e ZTL',
        'bus-alt-1',
        'mobilità'
    ],
    [
        'Opere e manutenzione',
        'Impianti tecnologici - Scavi - Strade  ',
        'under-construction-alt',
        ''
    ]
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

                    /**
                     * Struttura del singolo blocco dei servizi
                     */
                    ?>
                    <div class=" col-md-4 col-sm-2 equal">
					<div class="servizi">
						<i class="icofont-<?= $servizio[2] ?>"
							style="font-size: 1.5em !important"></i> <a class="servizititolo"
							href="<?= get_site_url()."/servizi?sezione=".$servizio[3] ?>"
							title="Apre pagina interna : <?= $servizio[0] ?>"> <?= $servizio[0] ?></a>
						</br>
						<p class="servizisub"><?= $servizio[1] ?></p>
					</div>
				</div>
                <?php

}
                ;
                ?>
            </div>
		</div>

	</div>
</div>