<script src="<?= base_url("./assets/base/lib/jquery/jquery-3.2.1.min.js"); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<!-- bootstrap-->
<script src="<?= base_url("./assets/base/lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"); ?>"></script>
<!-- stellar -->
<script src="<?= base_url("./assets/base/lib/stellar/jquery.stellar.js"); ?>"></script>
<!-- scrollorama js-->
<script src="<?= base_url("./assets/base/js/jquery.scrollorama.js"); ?>"></script>
<!-- Contact form-->
<script type="text/javascript" src="<?= base_url("./assets/base/js/validator.min.js"); ?>"></script> 
<!--owl carousel -->
<script src="<?= base_url("./assets/base/lib/owlcarousel/owl.carousel.min.js"); ?>"></script>
<!-- Inview js -->
<script src="<?= base_url("./assets/base/lib/jquery.inview-master/jquery.inview.min.js"); ?>"></script>
<!-- Datepicker js -->
<script type="text/javascript" src="<?= base_url("./assets/base/lib/gijgo-combined-1.5.0/gijgo.min.js"); ?>"></script>
<!-- Timepicker js -->
<script src="<?= base_url("./assets/base/lib/bootstrap-timepicker/bootstrap-timepicker.js"); ?>"></script>
<!-- Custom js -->
<script>
    var CURRENCY = "<?= CURRENCY; ?>";
</script>
<script src="<?= base_url("./assets/base/js/main.js"); ?>"></script>

<?php 
    if(!empty($inject_js)){
        foreach($inject_js as $js){
            ?>
            <script src="<?= base_url("$js"); ?>"></script>
            <?php
        }
    }
?>

<script>
    // $(function(){
	// 	var url = window.location.href;
	// 	$(".nav-menu a").each(function(){
	// 		if(url == (this.href)){
	// 			$(".txtclr").removeClass("w--current");
	// 			$(this).closest(".txtclr").addClass("w--current");
	// 		}
	// 	});
	// });
    $(document).ready(function() {
            var url = document.URL.split('/');
            
            var pagename = url[3];
            if (pagename == "" || pagename == undefined) {
                $("body").removeAttr('id');
                $("body").attr('id','homepage');
            }
        });
</script>