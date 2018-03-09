<?php


function view($page)
{
  include DIR.'/public/views/'. $page .'.php';
}

function app($name) {
  include 'app.php';

  if ( isset($app[$name]) ) {
    return $app[$name];
  }
  return 0;
}

function old($value) {
	echo empty($_POST[$value]) ? '' : $_POST[$value];
}

function error($value){
    if ($error[$value]) {
        ?>
            <div class="alert alert-danger">
                <?php echo $error[$value]; ?>
            </div>
        <?php
    }
}