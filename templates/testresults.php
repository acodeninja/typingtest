<h1>Test Results - <?php echo $testername; ?></h1>
<p>Your test results are displayed below, they are seperated into each typing test you completed and will show the score you attained along with a marked text showing your mistakes.</p>

<div class="accordion" id="resultsaccordion">

<?php // The test results loop

foreach( $testresults as $key => $result )
{
    ?>
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#resultsaccordion" href="#collapse<?php echo $key; ?>">
            <?php echo $result['title']; ?>
            <span class="pull-right">Similarity Score: <?php echo $result['score']; ?>%</span>
          </a>
        </div>
        <div id="collapse<?php echo $key; ?>" class="accordion-body collapse<?php if( $key == 0 ) { ?> in<?php } ?>">
          <div class="accordion-inner">
            <div class="diffbox">
                <div id="<?php echo $key; ?>_ans">
                    <?php echo $result['answer']; ?>
                </div>
                <div id="<?php echo $key; ?>_input">
                    <?php echo $result['input']; ?>
                </div>
            </div>
            <div id="<?php echo $key; ?>_diff"></div>
          </div>
        </div>
      </div>
      <!-- The diff function -->
      <script>
        document.getElementById('<?php echo $key; ?>_diff').innerHTML = diffString(
           document.getElementById('<?php echo $key; ?>_input').innerHTML,
           document.getElementById('<?php echo $key; ?>_ans').innerHTML
        );
      </script>
    <?php
}

?>
  

</div>


<!-- The scripts -->
<script>
    $(document).ready(function(){
        $('.diffbox').hide();
    });
</script>
