 <body>
  <div class="container">
     <div class="container">
   <h1>Home</h1>
   <h2>Welcome <?php echo $obj->userdata['username']; ?>!</h2>
   <a href="home1/logout">Logout</a>
   
       
 
     <div class="control-group">
    <div class="controls">
         <label class="control-label" for="inputPassword">buddy list</label>
    <select multiple="multiple" id="emaillist">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
        </div>
        </div>
              <div class="control-group">
    <div class="controls">
         <label class="control-label" for="inputmsg">message</label>
    <textarea rows="3"></textarea>
    </div>
    </div>
    <div class="control-group">
    <div class="controls">
     <button type="submit" class="btn">submit</button>
    </div>
    </div>
    </form>
     </div>
      </div>
     
