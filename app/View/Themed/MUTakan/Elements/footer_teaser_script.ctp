<?php
$webroot = '/uncommon/dautruongpk';
echo $this->Html->script('/uncommon/all-bootrap/js/bootstrap.min.js');
echo $this->Html->script('/uncommon/navtop-login/js/all.js');
echo $this->Html->script($webroot . '/js/teaser/bind_polyfill.js');
echo $this->Html->script($webroot . '/js/teaser/classlist_polyfill.js');
echo $this->Html->script($webroot . '/js/teaser/animframe_polyfill.js');
echo $this->Html->script($webroot . '/js/teaser/keyboard_input_manager.js');
echo $this->Html->script($webroot . '/js/teaser/html_actuator.js');
echo $this->Html->script($webroot . '/js/teaser/grid.js');
echo $this->Html->script($webroot . '/js/teaser/tile.js');
echo $this->Html->script($webroot . '/js/teaser/local_storage_manager.js');
echo $this->Html->script($webroot . '/js/teaser/game_manager.js');
echo $this->Html->script($webroot . '/js/teaser/application.js');
echo $this->Html->script($webroot . '/js/teaser.js');
echo $this->Html->script('/uncommon/all-js/js.cookie.js');
echo $this->fetch('script');
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '255060434910011');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1"
         src="https://www.facebook.com/tr?id=255060434910011&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 867856615;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/867856615/?guid=ON&amp;script=0"/>
    </div>
</noscript>