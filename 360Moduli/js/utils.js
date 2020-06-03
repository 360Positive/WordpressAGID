/**
 * Libreria utilità per la gestione del caricamento delle pagine
 */

function linkIcon() {
    /***
     * Script per l'aggiunta automatica icona su link e inserimanto attributi tile
     */
    
    $(window).on('load', function () {
        var content = $('#content > div > div.mainblock');
        $('a', content).each(function (key, value) {
            if ($(this).hasClass('nolink')){

            }
            else {
                var file = $(this).attr('href');
                // console.log(file)
                var typefile = "";
                var ext = file.split('.').pop();

                switch (ext) {
                    case 'jpg':
                        typefile = 'icofont-file-image';
                        title = "Apre un file immagine"
                        break;
                    case 'png':
                        typefile = 'icofont-file-image';
                        title = "Apre un file immagine"
                        break;
                    case 'gif':
                        typefile = 'icofont-file-image';
                        title = "Apre un file immagine";
                        break;
                    case 'doc':
                        typefile = 'icofont-file-document';
                        title = "Apre un file documento";
                        break;
                    case 'docx':
                        typefile = 'icofont-file-document';
                        title = "Apre un file documento";
                        break;
                    case 'xls':
                        typefile = 'icofont-file-excel';
                        title = "Apre un file foglio di calcolo";
                        break;
                    case 'pdf':
                        typefile = 'icofont-file-pdf';
                        title = "Apre un file pdf";
                        break;
                    default:
                        typefile = 'icofont-link';
                        title = "Apre un link";
                        break;
                }

                $(this).before('<i class="' + typefile + '"></i> ')
                var hastitle = $(this).attr('title');
                console.log(hastitle);

                if (!hastitle) {
                    $(this).attr({'title': title});
                }
            }
        })
    })
}

function addHeader($urlpath){
    /**
     * Effettua il caricamento in realtime dei file di stile nell'header della pagina
     */
    $('<link/>', {
        rel: 'stylesheet',
        type: 'text/css',
        href: $urlpath//css da includere
    }).appendTo('head');
}