    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">View	Content</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          View Content <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

 
     
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      

      //form validation
      echo validation_errors();

     
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Website Conent</label>
            
          </div>

		  <div class="control-group">
            
            <div class="controls">
              <?php echo $website[0]['content']; ?>
            </div>
          </div>
         
         
          
        </fieldset>

      
    </div>
     