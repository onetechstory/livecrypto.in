<?php	
	function theme_xyz_header_metadata() {
  ?>
    <meta name="facebook-domain-verification" content="gvitthzikq283ya82kziz8tcvmunbb" />
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5SCXZ8M');</script>
	<!-- End Google Tag Manager -->
	<!-- Mailchimp Integration Code -->
	<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/c5b067389518faef740ddda51/7d6dcc67ca5ace31549f5b1ba.js");</script>
  <?php
}
add_action( 'wp_head', 'theme_xyz_header_metadata' );

function custom_content_after_body_open_tag() {
    ?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5SCXZ8M"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action('wp_body_open', 'custom_content_after_body_open_tag');