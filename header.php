<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
        <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>">
        <title><?php wp_title( '/' ); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js" type="text/javascript"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300|Roboto:300' rel='stylesheet' type='text/css'>
        
        <?php wp_head(); ?>
    </head>
    
     <body <?php body_class( $class); ?>>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<!-- HEADER -->

<div id="header">

        
        <div class="logo"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="500px" height="500px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
<g>
	<circle class="cso-circle" fill="#2B85C4" cx="250" cy="250" r="250"/>
	<g class="cso">
		<path fill="#FFFFFF" d="M131.743 231.107v-66.315c0-56.45 28.39-61.602 45.379-61.602c29.705 0 39.1 18 39.1 39.7 c0 8.002-0.767 14.25-2.411 22.361h-23.019v-9.536c0-20.498-4.713-30.801-13.372-30.801c-10.413 0-15.894 7.453-15.894 31.5 v85.496c0 23.2 4.2 30.4 15.7 30.363c7.344 0 13.921-6.687 13.921-21.704v-18.305h25.978v17.319 c0 30.033-14.14 44.063-39.899 44.173C159.475 293.7 131.7 287.3 131.7 231.107z"/>
		<path fill="#FFFFFF" d="M235.103 231.983h22.032v9.098c0 20.2 4.6 31.2 18.4 31.239c10.743 0 16.661-6.138 16.661-17.428 c0-11.62-2.74-18.635-13.152-31.897l-29.596-35.186c-10.413-13.373-16.441-26.745-16.441-42.2 c0-24.882 15.783-42.419 43.077-42.419c33.103 0 42.9 20.7 42.9 39.679c0 8.002-1.534 14.25-3.068 22.361h-21.923v-8.878 c0-19.73-5.371-30.801-18.195-30.801c-10.632 0-15.894 6.467-15.894 16.332c0 10.6 3.4 16.2 8.9 23.457l32.994 39.9 c12.057 15.7 18.6 29.3 18.6 45.378c0 26.526-17.209 43.188-44.612 43.188c-33.87 0-43.516-19.729-43.516-39.679 C232.252 246.1 233.2 239.8 235.1 231.983z"/>
		<path fill="#FFFFFF" d="M339.12 231.107v-66.315c0-56.45 29.047-61.602 46.585-61.602c16.88 0 46.1 4.3 46.1 61.602v66.315 c0 55.572-29.813 62.587-46.146 62.587C367.51 293.7 339.1 287.3 339.1 231.107z M402.257 242.177v-85.167 c0-24.005-5.371-31.458-16.552-31.458c-11.509 0-16.88 7.453-16.88 31.458v85.167c0 23.2 5.4 30.1 16.9 30.1 C396.886 272.3 402.3 265.4 402.3 242.177z"/>
	</g>
	<g class="research">
		<path fill="#95C2E1" d="M110.307 314.522h17.263c4.896 0 8.4 1 10.6 3.042c2.152 2 3.4 5.5 3.9 10.3 c0.187 2 0.3 5.1 0.3 9.333s-0.554 7.774-1.661 10.644c-1.107 2.87-3.064 4.726-5.871 5.6 c2.058 0.3 3.6 1.4 4.7 3.253c1.059 1.8 1.8 4.7 2.2 8.701c0.437 4 0.7 9.9 0.7 17.7 c0 7.8 0.2 12.4 0.7 13.731h-9.638c-0.499-0.997-0.748-10.245-0.748-27.742c0-5.896-0.578-9.317-1.731-10.27 c-1.154-0.951-2.901-1.427-5.24-1.427l-5.755-0.328v39.767h-9.684V314.522z M132.716 334.687c0-6.331-0.569-9.995-1.708-10.994 c-1.139-0.998-2.784-1.497-4.936-1.497h-6.082v27.79h6.176c1.872 0 3.243-0.358 4.117-1.077c0.873-0.717 1.497-2.088 1.871-4.116 c0.375-2.027 0.562-5.208 0.562-9.544V334.687z"/>
		<path fill="#95C2E1" d="M154.892 314.522H179.5v8.048h-14.924v28.163h14.129v8.047h-14.129v30.035h15.111v8.047h-24.795V314.522z"/>
		<path fill="#95C2E1" d="M190.027 340.02c-0.561-1.965-0.842-4.318-0.842-7.064c0-5.957 1.099-10.689 3.298-14.198 s6.401-5.263 12.608-5.263c7.984 0 12.7 3.8 14.1 11.509c0.624 3.3 0.9 7.5 0.9 12.49v4.866h-9.264v-5.521 c0-5.239-0.265-8.763-0.795-10.572c-0.531-1.809-1.186-3.01-1.965-3.602c-0.779-0.594-1.793-0.891-3.041-0.891 c-2.339 0-4.024 0.858-5.053 2.574c-1.029 1.716-1.544 4.257-1.544 7.626c0 3.4 0.5 5.8 1.4 7.4 c0.935 1.6 2.1 3 3.5 4.468c1.373 1.4 2.1 2.2 2.3 2.409l5.613 5.941c6.737 7 10.1 14.9 10.1 23.7 c0 7.112-1.099 12.547-3.298 16.306c-2.199 3.759-6.386 5.637-12.561 5.637c-7.456 0-12.18-3.274-14.176-9.824 c-1.154-3.68-1.731-8.499-1.731-14.457c0-0.154 0-0.311 0-0.468v-7.999h9.404v8.374c0 6 0.4 10.2 1.3 12.6 c0.872 2.4 2.5 3.5 4.9 3.532c2.37 0 4.007-0.554 4.912-1.661c0.905-1.106 1.427-2.799 1.567-5.076 c0.14-2.275 0.211-4.834 0.211-7.672c0-5.708-2.511-11.072-7.532-16.094l-5.381-5.381 C194.159 348.7 191.2 344.2 190 340.02z"/>
		<path fill="#95C2E1" d="M231.759 314.522h24.608v8.048h-14.925v28.163h14.13v8.047h-14.13v30.035h15.112v8.047h-24.796V314.522z"/>
		<path fill="#95C2E1" d="M276.671 314.522h11.649l13.614 82.34h-9.124l-2.339-15.72h-14.925l-2.151 15.72h-9.216L276.671 314.522z M276.623 373.283h12.632l-6.503-43.509h-0.141L276.623 373.283z"/>
		<path fill="#95C2E1" d="M311.758 314.522h17.264c4.896 0 8.4 1 10.6 3.042c2.151 2 3.4 5.5 3.9 10.3 c0.188 2 0.3 5.1 0.3 9.333s-0.556 7.774-1.661 10.644c-1.107 2.87-3.064 4.726-5.871 5.6 c2.058 0.3 3.6 1.4 4.7 3.253c1.06 1.8 1.8 4.7 2.2 8.701s0.655 9.9 0.7 17.7 c0 7.8 0.2 12.4 0.7 13.731h-9.638c-0.499-0.997-0.749-10.245-0.749-27.742c0-5.896-0.577-9.317-1.731-10.27 c-1.154-0.951-2.9-1.427-5.239-1.427l-5.754-0.328v39.767h-9.685V314.522z M334.167 334.687c0-6.331-0.569-9.995-1.707-10.994 c-1.14-0.998-2.784-1.497-4.936-1.497h-6.082v27.79h6.176c1.871 0 3.243-0.358 4.116-1.077c0.873-0.717 1.498-2.088 1.872-4.116 c0.373-2.027 0.561-5.208 0.561-9.544V334.687z"/>
		<path fill="#95C2E1" d="M355.406 338.289c0-6.237 0.516-10.823 1.544-13.755c1.03-2.931 2.153-5.083 3.369-6.456 c2.65-2.994 6.519-4.507 11.602-4.538c7.112 0 11.7 3.2 13.8 9.403c1.186 3.6 1.8 8.4 1.8 14.316v9.123h-9.496 v-9.17c0-5.271-0.289-8.834-0.865-10.69c-0.578-1.854-1.271-3.088-2.083-3.695c-0.811-0.607-1.841-0.912-3.088-0.912 c-2.588 0-4.373 1.224-5.356 3.672c-0.982 2.449-1.473 6.309-1.473 11.579v35.649c0 6.2 0.4 10.6 1.3 13.1 s2.604 3.7 5.1 3.72c2.543 0 4.241-1.248 5.1-3.743c0.857-2.495 1.287-6.861 1.287-13.099v-9.124h9.59v9.03 c0 8.639-1.177 14.993-3.532 19.064c-2.354 4.07-6.463 6.104-12.327 6.104s-10.043-2.097-12.538-6.292 c-2.496-4.195-3.743-10.519-3.743-18.971V338.289z"/>
		<path fill="#95C2E1" d="M422.167 314.522h9.685v82.34h-9.685v-39.906h-13.193v39.906h-9.684v-82.34h9.684v34.527h13.193V314.522z"/>
	</g>
</g>
</svg></div>

<nav>
<ul>
<li><a href="#">Company</a>
	<ul>
  		<li><a href="#">Team</a></li>
        <li><a href="#">Clients</a></li>
        <li><a href="#">Testimonials</a></li>
        <li><a href="#">Partners</a></li>
  </ul>
</li>
<li><a href="#">Products</a>
    <ul>
            <li><a href="#">The CSO System</a></li>
            <li><a href="#">CSO Law</a></li>
            <li><a href="#">The Outcomes Survey</a></li>
            <li><a href="#">CSO Connect</a></li>
            <li><a href="#">The Campus Career Coach</a></li>
      </ul></li>
<li><a href="#">Services</a>
	<ul>
            <li><a href="#">for Career Offices</a></li>
            <li><a href="#">for Institutional Researchers</a></li>
            <li><a href="#">for Employers</a></li>
            <li><a href="#">for Students</a></li>
      </ul></li>
<li><a href="#">News & Events</a>
<ul>
  		<li><a href="#">Press</a></li>
        <li><a href="#">CSO eNews</a></li>
        <li><a href="#">CSO Conference</a></li>
  </ul>
</li>
<li><a href="#">Contact</a>
		<ul>
  		<li><a href="#">Request a Demo</a></li>
        <li><a href="#">CSO System Support</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Privacy Policy</a></li>
  </ul>


</li>
<li class="demo"><a href="/demo">Request a Demo</a></li>
</ul></nav>


<div class="contact">
<p><a href="mailto:info@csoresearch.com">info@csoresearch.com</a> / <a href="tel:+18667054201">(866) 705-4201</a></p>

<a href="http://www.facebook.com/csoresearch"><svg class="icon-facebook"><use xlink:href="img/social.svg#icon-facebook"></use></svg></a>
<a href="https://www.linkedin.com/groups?gid=2939520"><svg class="icon-linkedin"><use xlink:href="img/social.svg#icon-linkedin"></use></svg></a>
<a href="http://www.twitter.com/csoresearch"><svg class="icon-twitter"><use xlink:href="img/social.svg#icon-twitter"></use></svg></a>
<a href="http://www.pinterest.com/csoresearch/following"><svg class="icon-pinterest"><use xlink:href="img/social.svg#icon-pinterest"></use></svg></a>
<a href="http://www.instagram.com/csoresearch"><svg class="icon-instagram"><use xlink:href="img/social.svg#icon-instagram"></use></svg></a>
<a href="http://www.youtube.com/csoresearch"><svg class="icon-youtube"><use xlink:href="img/social.svg#icon-youtube"></use></svg></a>
</div>

<div class="search">

<form id="searchform" class="searchform" action="http://campuscareercoach.com/" method="get" role="search">

    <div>
        <label class="screen-reader-text" for="s"></label>
        <input id="s" type="text" name="s" value=""></input>
        <input id="searchsubmit" type="submit" value="Search"></input>
    </div>

</form>

</div>
<div class="nav-icon">
<svg class="icon-list"><use xlink:href="img/icons.svg#icon-list"></use></svg>
</div>
<div class="search-icon">
<svg class="icon-magnifying-glass"><use xlink:href="img/icons.svg#icon-magnifying-glass"></use></svg>
</div>

</div><!--/#header-->