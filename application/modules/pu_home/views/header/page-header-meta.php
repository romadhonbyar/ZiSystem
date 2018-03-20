<!--
<META HTTP-EQUIV="EXPIRES" CONTENT="Sat, 31 Des <?php echo date('Y');?> 11:12:01 GMT">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="ROBOTS" content="INDEX, FOLLOW, all">
-->

<link rel="canonical" href="<?php echo base_url();?>">
<?php $general_set=$this->m_set_general->general_view(); ?>	

<?php $meta_set=$this->m_set_seo->seo_view(); ?>	
<?php if($meta_set['meta_description']){ ?>
<meta name="description" content="<?= $meta_set['meta_description']; ?>">
<?php } ?>
<?php if($meta_set['meta_author']){ ?>
<meta name="author" content="<?= $meta_set['meta_author']; ?>">
<?php } ?>
<?php if($meta_set['meta_keywords']){ ?>
<meta name="keywords" content="<?= $meta_set['meta_keywords']; ?>">
<?php } ?>
<?php if($meta_set['meta_google_verification']){ ?>
<meta name="google-site-verification" content="<?= $meta_set['meta_google_verification']; ?>">
<?php } ?>
<?php if($meta_set['meta_bing_verification']){ ?>
<meta name="msvalidate.01" content="<?= $meta_set['meta_bing_verification']; ?>">
<?php } ?>
<?php if($meta_set['meta_alexa_verification']){ ?>
<meta name="alexaVerifyID" content="<?= $meta_set['meta_alexa_verification']; ?>">
<?php } ?>

<?php $sosmed_set=$this->m_set_socmed->socmed_view(); ?>
<?php if($sosmed_set['facebook']){ ?>
<!--FACEBOOK-->
<meta property="og:title" content="" >
<meta property="og:site_name" content="<?= $general_set['name_web']; ?>">
<meta property="og:url" content="https://www.facebook.com/<?= $sosmed_set['facebook']; ?>" >
<meta property="og:description" content="<?= $meta_set['meta_description']; ?>" >
<meta property="og:image" content="" >
<meta property="fb:app_id" content="" >
<meta property="og:type" content="website" >
<meta property="og:locale" content="id" >
<meta content='https://www.facebook.com/<?= $sosmed_set['facebook']; ?>' property='knowledge:author'/>
<meta content='https://www.facebook.com/<?= $sosmed_set['facebook']; ?>' property='knowledge:publisher'/>
<?php } ?>

<?php if($sosmed_set['twitter']){ ?>
<!--TWITTER-->
<meta property="twitter:card" content="summary" >
<meta property="twitter:title" content="" >
<meta property="twitter:description" content="<?= $meta_set['meta_description']; ?>" >
<meta property="twitter:creator" content="<?= $sosmed_set['twitter']; ?>" >
<meta property="twitter:url" content="https://twitter.com/<?= $sosmed_set['twitter']; ?>" >
<meta property="twitter:image" content="" >
<meta property="twitter:image:alt" content="" >
<?php } ?>

<?php if($sosmed_set['google_plus']){ ?>
<!--GOOGLE+-->
<link rel="author" href="https://plus.google.com/<?= $sosmed_set['google_plus']; ?>">
<link rel="publisher" href="https://plus.google.com/<?= $sosmed_set['google_plus']; ?>">
<?php } ?>

<?php if($meta_set['meta_google_analytics_verification']){ ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?= $meta_set['meta_google_analytics_verification']; ?>', 'auto');
  ga('send', 'pageview');

</script>
<?php } ?>

<meta name="geo.country" content="id">
<link rel="alternate" href="<?php echo base_url(); ?>" hreflang="x-default" />

<!--<meta name="verify-v1" content="<?= $meta_set['meta_google_analytics_verification']; ?>">-->
<!--<meta name="geo.position" content="-5;120">
<!--<meta name="ROBOTS" content="INDEX, FOLLOW, all">
<!--<meta content="" name="generator">
<meta name="Slurp" content="follow, all">
<meta name="rating" content="general">-->