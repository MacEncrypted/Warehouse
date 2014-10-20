<!-- footer area -->    
<footer>
	<div id="colophon" class="wrapper clearfix">
    	<?php echo $this->lang->line('footer_text'); ?>
    </div>
    
    <!--You can NOT remove this attribution statement from any page, unless you get the permission from prowebdesign.ro-->
	<div id="attribution" class="wrapper clearfix" style="color:#666; font-size:11px;">
		Site built with <a href="http://www.prowebdesign.ro/simple-responsive-template/" target="_blank" title="Simple Responsive Template is a free software by www.prowebdesign.ro" style="color:#777;">Simple Responsive Template</a>
		<br/>
		SESSION: user_id(<?php print_r($this->session->userdata('user_id')); ?>)
	</div><!--end attribution-->
    
</footer><!-- #end footer area --> 


<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>

<script defer src="<?php echo base_url(); ?>js/flexslider/jquery.flexslider-min.js"></script>

<!-- fire ups - read this file!  -->   
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>