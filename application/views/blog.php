<!DOCTYPE HTML>
<html>

<head>
  <title>Coding Avenue Blog Site</title>
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
    <div id="site_content">
      <!-- <div class="sidebar">
       
        <h3>Latest News</h3>
        <h4>New Website Launched</h4>
        <h5>January 1st, 2010</h5>
        <p>2010 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
        <p></p>
        <h4>New Website Launched</h4>
        <h5>January 1st, 2010</h5>
        <p>2010 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
        <h3>Useful Links</h3>
        <ul>
          <li><a href="#">link 1</a></li>
          <li><a href="#">link 2</a></li>
          <li><a href="#">link 3</a></li>
          <li><a href="#">link 4</a></li>
        </ul>
        <h3>Search</h3>
        <form method="post" action="#" id="search_form">
          <p>
            <input class="search" type="text" name="search_field" value="Enter keywords....." />
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
          </p>
        </form>
      </div> -->
      <div id="content">
<?php foreach($posts as $post_item):?>      
        <h1><?php echo Parsedown::instance()->parse($post_item['POSTS_TITLE'])?></h1>
        <p><?php echo Parsedown::instance()->parse($post_item['POSTS_CONTENT'])?></p>
        <p><a href="http://creativecommons.org/licenses/by/3.0">Read More</a></p>
        <p><h4>Author: | Ramon Damuag | May 12, 2017</h4></p>

        <hr/>
<?php endforeach;?>
      
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; colour_blue | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>
    </div>
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="<?php echo base_url();?>public/js/script.js"></script>
  
</body>
</html>
