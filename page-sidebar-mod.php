<?php 
   /* Template Name: Pagina con sidebar Modificato */
   get_header(); 
?>
<style>
    .small>div>h2{
        font-size:medium;
        background:#ffb402;
        padding:2%;
    }
    
    .small>div>p{
        font-size:small;
        text-align:justify;
    }
    
    .small>div>p.danger{
        color:white;
        background:#ff0000;
        padding:5%;
        -webkit-border-radius: 5;
        -moz-border-radius: 5px;
        border-radius: 5px;
        text-align:center;
    }
    
    .small>div>p>a.button{
        
        background:#d1d2d2;
        width:100%;
        padding:2%;
        -webkit-border-radius: 5;
        -moz-border-radius: 5px;
        border-radius: 5px;
        text-align:center;
        display: inline-grid;
    }
    
    .small>div>p>i{
        font-size:large;
    }
    
   .container{
           max-width: fit-content;
           margin:0px;
           width:100%;
   }
</style>

<section id="content" role="main" class="container">
   <div class="container">
      <div class="row">

      <div class="col-md-8">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="header">
               <h1 class="entry-title"><?php the_title(); ?></h1>
               <?php edit_post_link(); ?>
            </header>
            <section class="entry-content">
               <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
               <?php the_content(); ?>
               <div class="entry-links"><?php wp_link_pages(); ?></div>
            </section>
         </article>
         <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
         <?php endwhile; endif; ?>
      </div>
      
      <div class="col-sm-3 offset-sm-1">
          
        <!-- Modifiche sidebar-->
   		<div class="small">
   		<div id="urp_bloc">
   		    <h2><i class="icofont-people"></i> URP - Ufficio Relazioni con il Pubblico</h2>
   		    <p>L'URP sar&agrave; aperto al mattino da&nbsp;<strong>luned&igrave; a venerd&igrave; dalle ore 9.00 alle ore 12.00</strong>&nbsp;per rispondere alla forte affluenza di pubblico riscontrata dal servizio nella prima mattinata.<br>
   		    Si potranno effettuare segnalazioni e reclami anche attraverso l'indirizzo</br>
            <i class="icofont-send-mail"></i> Mail:&nbsp;<a href="mailto:urp@comune.acquiterme.al.it">urp@comune.acquiterme.al.it&nbsp;</a><br>
            <i class="icofont-brand-whatsapp"></i> <i class="icofont-telephone"></i> Tel. 0144/770307</p>
   		</div>
   		<div id="regolamenti_bloc">
   		    <h2><i class="icofont-document-folder"></i> Regolamenti</h2><p> <a class="button" href="<?php echo home_url( 'regolamenti' ); ?>" target="_blank">Visualizza</a></p>
   		</div>
   		<div id="pec_bloc">
   		    <h2><i class="icofont-mail-box"></i> PEC - Posta elettronica certificata</h2>
   		    <p><i class="icofont-email"></i> acqui.terme@cert.ruparpiemonte.it <br>
   		    <i class="icofont-police-cap"></i> pmunicipale.acqui.terme@cert.ruparpiemonte.it</p>
   		    <p>Le caselle di posta elettronica sono abilitate a ricevere email da indirizzi PEC, eventuali comunicazioni provenienti da indirizzi non PEC su indirizzi PEC non saranno prese in considerazione.
   		    Le PEC destinate all'Ufficio Tecnico dovranno essere inviate all'indirizzo PEC istituzionale <strong>acqui.terme@cert.ruparpiemonte.it</strong></p>
   		<p class="danger">Per evitare blocchi futuri si invita a non allegare alla comunicazione documenti di dimensioni eccessive.<br>
<strong>IL CONTENUTO NON DEVE SUPERARE I 10MB, ALLEGATI COMPRESI</strong>.</p>

   		</div>
   		<div id="cuc_bloc">
   		<h2><i class="icofont-attachment"></i> CUC - GARE D'APPALTO TELEMATICHE</h2>
   		<p>Il Comune di Acqui Terme anche in qualità di Centrale Unica di Committenza (CUC dell'Acquese) sta provvedendo al passaggio delle gare d'appalto in modalita' telematica, cosi' come previsto dal Codice dei Contratti.
   	        <br> <a class="button" href="https://appalti-acquese.maggiolicloud.it/PortaleAppalti/it/homepage.wp" target="_blank">Visualizza</a>
   		</p>
   		</div>
   		<div id="sistema_alert_bloc">
   		<h2><i class="icofont-bullhorn"></i> Alert System</h2>
   		<p>Il sistema telefonico per informazioni di pubblica utilità.<br> <a class="button" href="<?php echo home_url( 'alert-system' ); ?>" target="_blank">Visualizza</a>
   		</p>
   		</div>
   		
   		<div id="webcam_alert_bloc">
   		<h2><i class="icofont-cc-camera"></i> Webcam</h2>
   		<p>Il Comune di Acqui Terme è lieto di offrire una panoramica della Città grazie alla webcam posizionata sulla torre di Palazzo Levi.<br> <a class="button" href="<?php echo home_url( 'webcam' ); ?>" target="_blank">Visualizza</a>
   		</p>
   		</div>
   		
   		</div>
   		
   		
   		
   		<!--END Modifiche sidebar-->
   		
   		
   		<?php if ( is_active_sidebar( 'page-widget-area' ) ) : ?>
   		<div class="container-fluid widget-area page-widget-area">
   		   <ul class="xoxo">
   		      <?php dynamic_sidebar( 'page-widget-area' ); ?>
   		   </ul>
   		</div>
   		<?php endif; ?>
		</div>
      
      </div>
   </div>
</section>

<?php get_footer(); ?>