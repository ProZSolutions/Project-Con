
<html>
<head></head>
<body>                 
                        <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12"  name="name" required="required" type="text">
                        </div>
                        </div>

						<div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="name">User Role</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name"   name="name1" value="admin" required="required" type="radio">Admin
						<input id="name"   name="name1" value="manager" required="required" type="radio">Manager
						<input id="name"  name="name1" value="user" required="required" type="radio">User
                        </div>						
                        </div>
         
                        <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="name"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="button" value="Generate Password"id="gen"Class="btn-info">
                        </div>						
                        </div>

                      
                        <div class="item form-group">
                        <label for="password" class="control-label col-md-4">New Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="text" type="text" name="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                        </div>				 

					  <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
					  <button id="send" type="submit" class="btn btn-success">OK</button>
                      <button type="reset" class="btn btn-primary">Cancel</button>                         
                      </div>
                      </div>
					       
          
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#gen").click(function()
{
$.ajax
({
type: "POST",
url: "passgen.php",
cache: false,
success: function(html)
{
$("#text").val(html);
} 
});
});
});
</script>
</body>
</html>