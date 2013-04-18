<div class="row">
    <div class="span3 offset2">
        <ul class="thumbnails">
          <li>
            <a class="thumbnail">
              <img src="assets/img/logo.jpg" alt="">
            </a>
          </li>
        </ul>
    </div>
    <div class="span4" style="text-align: center">
        <h1>Plusnet Typing Test</h1>
        <p>This assesment is designed to test both your typing speed and accuracy.</p>
        <p>Each recording will only play once. Please type what you hear in the text box and check for spelling and grammar after each recording finishes.</p>
        <p>&nbsp;</p>
        <form method="post" action="index.php/test/1">
            
            <input type="hidden" name="sessionstore" value="true" />
            
            <input type="text" name="testername" class="input-large" placeholder="Type your name" />
            
            <br />
            
            <button type="submit" class="btn btn-primary">Start the Test</button>
            
        </form>
    </div>
</div>
