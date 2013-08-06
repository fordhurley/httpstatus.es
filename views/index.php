<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>HTTP Status Codes &mdash; httpstatus.es</title>
    <link rel="author" href="humans.txt" />
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" />
    <link rel="shortcut icon" href="/assets/img/favicon.ico">
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-29439846-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
    <meta name="description" content="HTTP Status code list / directory with wikipedia and ietf descriptions"/>
    <base href="http://httpstatus-es.dev/"/>
</head>
<body class="<?php echo $this->spec['key']; ?>">
    <div id="advert" class="spec-highlight">
        <div class="ad">
            Check out pure DNS domain redirects with <a href="http://cnamer.com">CNAMER</a>.
        </div>
    </div>
    <div id="wrapper">
        <div class="header">
            httpstatus.es<span class="spec">/<?php echo $this->spec['title']; ?></span>
            <div class="share_buttons">
                <div class="share_button" id="twitter">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-via="citricsquid" data-url="http://httpstatus.es">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="intro">
            <p>
                Database of HTTP status codes with descriptions and helpful code 
                references. Maintained by 
                <a href="http://twitter.com/citricsquid">@citricsquid</a>.
                New codes and improvements can be commited via the 
                <a href="https://github.com/citricsquid/httpstatus.es">GitHub repository</a>.
            </p>
        </div>
        <div id="statuses">
            <?php foreach($this->codes as $id => $class) { ?>
            <div class="status_list" id="<?php echo $id; ?>">
                <div class="head">
                    <div class="title"><?php echo $id; ?>xx <?php echo $class["class"]["title"]; ?></div>
                    <div class="clear"></div>
                </div>
                <div class="statuses">
                    <?php foreach($class["codes"] as $code => $info) { ?>
                    <div class="status">
                        <div class="st"><a title="<?php echo $info["title"]; ?>" href="<?php echo BASE_URL; ?>/<?php echo $code; ?>"><?php echo $code; ?></a></div>
                        <div class="description"><?php echo $info["summary"]; ?></div>
                    </div>
                    <?php } ?>
                    <div class="clear"></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
