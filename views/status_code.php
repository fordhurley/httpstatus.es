<?php $status_code = $this->code[$this->spec['key']];?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $status_code['code'] . ' ' . $status_code['title'] . ' ' . $this->spec['title']; ?> status code &mdash; httpstatus.es</title>
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
        <meta name="description" content="HTTP Status code <?php echo $status_code['code']; ?> / directory with wikipedia and ietf descriptions"/>
    </head>
    <body class="<?php echo $this->spec['key']; ?>">
        <div id="wrapper">
            <div class="header">
                <?php echo $status_code['code']; ?> / <span class="status_title"><?php if(!isset($this->spec['default'])) { ?><span class="spec"><?php echo $this->spec['title']; ?></span> <?php } ?> <?php echo $status_code['title'] ?></span>
            </div>
            <div id="desc">
                <?php foreach($status_code['descriptions'] as $type => $description) { ?>
                <p id="<?php echo $type; ?>">
                    &#8220;<?php echo nl2br($description["body"]); ?>&#8220; &mdash; <a class="reference" href="<?php echo $description["link"]; ?>"><?php echo $type; ?></a>
                </p>
                <?php } ?>
            </div>
            <?php if(isset($status_code['references'])) { ?>
            <div id="code_references">
                <div class="header">
                    <?php echo $status_code['code']; ?> / <span class="status_title">code reference(s)</span>
                </div>
                <div class="info_list">
                    <?php foreach($status_code['references'] as $reference) { ?>
                    <div class="info_item">
                        <div class="title">
                            <?php echo $reference["title"]; ?>         
                        </div>
                        <div class="value">
                            <?php echo $reference["value"]; ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php } ?>
                    <div class="clear"></div>
                </div>
            </div>
            <?php } ?>
            <?php $others = $this->code; unset($others[$this->spec['key']]); if(count($others) > 0) { ?>
            <div id="code_references">
                <div class="header">
                    <?php echo $status_code['code']; ?> / <span class="status_title">Available in other spec(s)</span>
                </div>
                <div class="info_list">
                    <?php foreach($others as $spec => $other) { ?>
                    <div class="info_item">
                        <div class="title">
                            <a href="/<?php echo $spec; ?>/<?php echo $other['code']; ?>"><?php echo $this->specs[$spec]['title']; ?></a>      
                        </div>
                        <div class="value">
                            <?php echo $other['summary']; ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php } ?>
                    <div class="clear"></div>
                </div>
            </div>
            <?php } ?>
            <div id="return">
                <a href="<?php echo BASE_URL; ?>">&larr; return</a>
            </div>  
        </div>
    </body>
</html>