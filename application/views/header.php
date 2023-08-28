<html>
    <head>
        <title>form-generator</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">FORM-GENERATOR</a>
            </div>
            <div id="navbar">
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url(); ?>">HOME</a></li>
                    <?php if(!$this->session->userdata('logged_in')): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">LOGIN <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>Home/clg_login">College</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>Alumni/alumni_login">Alumni</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">REGISTER <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>Home/clg_register">College</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>Alumni/alumni_register">Alumni</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif?>
                    <?php if($this->session->userdata('logged_in')): ?>
                        <li><a href="<?php echo base_url(); ?>Generates/index/<?php echo $this->session->userdata('clg_id'); ?>">GET-FORM</a></li>
                        <li><a href="<?php echo base_url(); ?>Home/logout">LOGOUT</a></li>
                    <?php endif?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">

        <!-- flash messages  for successfull registration-->
        <?php if($this->session->flashdata('clg_registered')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('clg_registered').'</p>'?>
        <?php endif?>
        
        <!-- flash messages  for successfull registration-->
        <?php if($this->session->flashdata('alumni_registered')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('alumni_registered').'</p>'?>
        <?php endif?>

        <!-- <-- flash messages  for Invalid Login --> 
        <?php if($this->session->flashdata('valid-login')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('valid-login').'</p>'?>
        <?php endif?>

        <!-- flash messages  for Invalid Login -->
        <?php if($this->session->flashdata('invalid-login')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('invalid-login').'</p>'?>
        <?php endif?>

        <!-- flash messages  for Invalid Login -->
        <?php if($this->session->flashdata('log-out')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('log-out').'</p>'?>
        <?php endif?>





