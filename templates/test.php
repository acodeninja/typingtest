<script type="text/javascript">
$(document).ready(function(){
    // Instantiate the player
    var myCirclePlayer = new CirclePlayer("#jquery_jplayer_1",
    {
        mp3: "<?php echo $config['http']; ?>tests/test<?php echo $test; ?>.mp3",
    }, {
        cssSelectorAncestor: "#cp_container_1"
    });
    
    // Disable the player once clicked
    $(".cp-play").click( function(){
        $(".cp-pause").bind('click', false);
        $(".cp-play").bind('click', false);
        $(".cp-controls").hide();
        $(".cp-circle-control").hide();
    })
});
</script>

<form method="post" action="index.php/test/<?php echo $test+1; ?>">
    
    <div class="row">
        <div class="span3">
            <div style="width: 200px; margin: 0 auto;">
                <h1>&nbsp;</h1>
                
                <div id="jquery_jplayer_1" class="cp-jplayer"></div>
                
                <div id="cp_container_1" class="cp-container">
                    <div class="cp-buffer-holder">
                        <div class="cp-buffer-1"></div>
                        <div class="cp-buffer-2"></div>
                    </div>
                    <div class="cp-progress-holder">
                        <div class="cp-progress-1"></div>
                        <div class="cp-progress-2"></div>
                    </div>
                    <div class="cp-circle-control"></div>
                    <ul class="cp-controls">
                        <li><a class="cp-play" tabindex="1">play</a></li>
                        <li><a class="cp-pause" style="display:none;" tabindex="1">pause</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
        <div class="span9">
            <h1>Test <?php echo $test; ?> - <?php echo $thistesttitle; ?></h1>
            
            <input type="hidden" name="test" value="<?php echo $test; ?>" />
            <input type="hidden" name="testsubmit" value="true" />
            
            <textarea name="testinput" class="span9" rows="7" style="font-size: 24px; line-height: 28px;"></textarea>
            
            <button type="submit" class="btn btn-large btn-primary pull-right">Submit Test</button>
            
        </div>
    </div>
    <div class="row">&nbsp;</div>
    <div class="row">
        <div class="span12">
            <div class="progress">
              <div class="bar" style="width: <?php echo $test_completion; ?>%;"></div>
            </div>
        </div>
    </div>
</form>