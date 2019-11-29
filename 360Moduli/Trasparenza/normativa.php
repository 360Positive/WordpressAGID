<?php

class Normativa
{
    public $site_base = "http://comune.acquiterme.al.it/sviluppo/"; //url base sito
    public $trasp_base = "trasparenza/"; //cartella base da percorso url sito
    public $title_base = "Archivi - Comune di Acqui Terme"; //cartella base da percorso url sito
    public $xmlString ; //itaratore file xml

    public function __construct($xmlurl)
    {//Inizializzazione parametri di ricerca
        $xml= file_get_contents($xmlurl);
        $this->xmlString  = new SimpleXMLElement($xml);
        return $this->xmlString;
    }

    public function sanitize_url($url)
    {
        //La funzione ritorna lo slug corretto per l'associazione della normativa corretta
        $sani = str_replace($this->site_base, '', $url);  //Remove first
        $sani = str_replace($this->trasp_base, '', $sani);  //Remove folder
        $sani = explode('/', $sani);
        return $sani[0];
    }

    public function sanitize_title($pagetitle)
    {
        $base=$this->title_base;
        //La funzione ritorna lo slug corretto per l'associazione della normativa corretta
        $sani=str_replace($base, " ", $pagetitle);  //Remove first
        return substr($pagetitle,-30);
        //return $sani;
    }

    public function searchin($text,$tag)
    { $products = "";
        $path = "//*[contains(@".$tag.",'".$text."')]";
        $products = $this->xmlString->xpath($path);
        return $products;

    }
}

?>