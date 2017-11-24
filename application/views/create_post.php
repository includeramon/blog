<!DOCTYPE HTML>
<html>

<head>
  <title>colour_blue - contact us</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Coding Avenue<span class="logo_colour">Blog</span></a></h1>
          <h2>A simple blogging website</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="<?php echo base_url();?>">Home</a></li>
          <li><a href="<?php if(isset($_SESSION['userid'])) echo base_url().'users'; else echo base_url().'login'; ?>"><?php if(isset($_SESSION['userid'])) echo $_SESSION['username']; else echo 'Login'?></a></li>
          <li <?php if(!isset($_SESSION['userid'])) echo 'style="display:none;"';?>><a href="<?php echo base_url().'login/out';?>">Logout</a></li>
          <li <?php if(!isset($_SESSION['userid'])) echo 'style="display:none;"';?>><a href="<?php echo base_url().'blog/create_post';?>">Create Post</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="content">
      
          <form method="post" action="<?php echo base_url().'blog/create_post';?>">
          <div class="form_settings">
            <p><span>Title</span><input type="text" name="title" value="" /></p>
            <p><span>Content</span><textarea rows="8" cols="1000" name="content"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="name" value="Create Post" /></p>
          </div>
          
          </form>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; colour_blue | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>
    </div>
  </div>
</body>
</html>
