<?php 
$facebook="https://www.facebook.com/sharer/sharer.php?u=%s";
$linkedin="";
$twitter="https://twitter.com/share?text=%s&url=%s";

$links=get_post_permalink();
echo $links;

echo sprintf($facebook,$links);

?>
<style>
.share-menu > div, .share-menu > div >i{
    font-size: 1.5rem!important;
    padding:2%;
    cursor: pointer; 
}
.icon-share{
    background:red;
    color: #fff!important;
    background-color: #8e001c!important;
    vertical-align: middle;
    text-align:center;
}
.testo-share{
    background:lightgrey;
    color: #8e001c!important;
    
    padding-left: 1em;
    padding-right: 1em;
    font-weight: 400!important;
    font-size: 2rem!important;
}
    
</style>

<div id="front" class="row share-menu">
<div class="col-md-2 icon-share">
    <i class="icofont-share align-middle icon-share"></i>
</div>
<div class="col-md-6 testo-share">
    <?= _('Condividi');?>
</div>
</div>


<div id="links" class="row share-menu">
<div class="col-md-2 icon-share">
    <a href=""><i class="icofont-facebook"></i></a>
</div>
<div class="col-md-2 icon-share">
    <i class="icofont-twitter"></i>
</div>
<div class="col-md-2 icon-share">
    <a<i class="icofont-linkedin"></i>
</div>
<div id="exit"class="col-md-2 icon-share">
    <i class="icofont-ui-close"></i>
</div>
</div>
<script>

    $('#links').hide();
    
    $(document).ready(function () {
        
        
		$('#front').on('click', function () {
			$('#links').show();
			$('#front').hide();
		});
		$('#exit').on('click', function () {
			$('#links').hide();
			$('#front').show();
		});
		
	});
	

	
	
	$("#front").jsSocials({
	    url: "<?= $links; ?>",
    text: "text to share",
    showLabel: true,
    showCount: true,
    shareIn: "popup",
    showLabel: false,
    showCount: false,
    shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
});

	
	jsSocials.shares.twitter = {
    label: "Tweet",
    logo: "icofont-ui-add",
    shareUrl: "https://twitter.com/share?url={url}&text={text}&via={via}&hashtags={hashtags}",
    countUrl: "https://cdn.api.twitter.com/1/urls/count.json?url={url}&callback=?",
    getCount: function(data) {
        return data.count;
    }
};
</script>
    