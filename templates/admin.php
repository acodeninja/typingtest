<?php if( $adm_loggedin == false ) { ?>
    <style>
      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    </style>
    
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="hidden" name="submitted" value="true">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
      </form>
    
<?php } else { ?>
    <div class="page-header"><h1>Administration Area <small class="pull-right btn btn-small"><a href="<?php echo $config['http']; ?>index.php/home">Logout</a></small></h1></div>
    
    
    <div class="row">
        <div class="span6">
            <h3>Test Results</h3>
            
            <table class="table table-hover">
                
                <thead>
                    <tr><th>Name</th><th>Date</th></tr>
                </thead>
                
                <tbody>
                    
                <?php foreach( test_get_testers() as $tester ) { ?>
                    <tr><td><a href="<?php echo $config['http']; ?>index.php/testresults/<?php echo $tester['session']; ?>"><?php echo $tester['name']; ?></td></a><td><?php echo db_date_readable($tester['timestamp']); ?></td></tr>
                <?php } ?>
                
                </tbody>
                
            </table>
                        
        </div>
        
        <div class="span6">
            
            <h3>Email Results</h3>
            
            <p>&nbsp;</p>
            
            <div class="well well-small">
                <form action="<?php echo $config['http']; ?>index.php/admin/email" method="post">
                  <p><input type="text" name="email" class="input-block-level" placeholder="Email"></p>
                  <p><strong>Send an email with all the results to the left.</strong> <button type="submit" class="btn btn-primary pull-right">Send Email</button></p>
                </form>
            </div>
            
            <h3>Actions</h3>
            
            <div class="well well-small">
                <a href="<?php echo $config['http']; ?>index.php/admin/delete" class="btn btn-danger">Delete Results</a>
            </div>
        </div>
    
    </div>
<?php } ?>
