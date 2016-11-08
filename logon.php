<?php
//reuse header
include('includes/header.html');

//initiate 
echo '<form action="logIn.php" class="form-horizontal" method="Post">
      <fieldset>
        <legend>Login</legend>
		<div class="form-group">
            <label class="col-md-4 control-label" for="username">User name</label>  
            <div class="col-md-4">
                <input id="username" name="username" type="text" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="pass">Password</label>  
            <div class="col-md-4">
                <input id="pass" name="pass" type="text" class="form-control input-md">
            </div>
        </div>
        
        <div class="form-group">
			<label class="col-md-4 control-label" for="submit"></label>
			<div class="col-md-4">
				<button id="submit" name="submit" class="btn btn-primary">Log in</button>
			</div>
		</div>
      </fieldset>
      </form>';
echo '</div> </div>';
include('includes/footer.html');
