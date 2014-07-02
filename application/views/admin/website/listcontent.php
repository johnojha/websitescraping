    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul>

      <div class="page-header users-header">
        
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
           
            //save the columns names in a array that we will use as filter         
            $options_website = array();    
            foreach ($website as $array) {
              foreach ($array as $key => $value) {
                $options_website[$key] = $key;
              }
              break;
            }

            
            ?>

          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">ID</th>
                <th class="yellow header headerSortDown">Website Content</th>
                <th class="green header">&nbsp;</th>
                
                
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($website as $row)
              {
                echo "<tr>";
                echo "<td>".$row['webid']."</td>";
                echo "<td> <a href='../../website/viewcontent/" . $row['id'] . "'>View Contents</a></td>";
                
                
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>