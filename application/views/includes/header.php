<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Website Scrapper</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">Scrapper</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'website'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/website">Website Scrapper</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'manufacturers'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/signup">Users</a>
	        </li>
			<li >
	          <a target="_blank" href="<?php echo base_url(); ?>">Front End</a>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
