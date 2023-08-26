<html>
    <head>
        <title>form-generator</title>
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
                        <li><a href="<?php echo base_url(); ?>Home/login">LOGIN</a></li>
                        <li><a href="<?php echo base_url(); ?>Home/register">REGISTER</a></li>
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
        <?php if($this->session->flashdata('registered')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('registered').'</p>'?>
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





