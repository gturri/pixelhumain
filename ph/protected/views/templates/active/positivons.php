<style>
@import url(http://fonts.googleapis.com/css?family=Lato:400,700);

* { 
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  -o-box-sizing:border-box;
  box-sizing:border-box;
}

html, body {
  background:#FFFFFF;
}

.acc-container {
  width:90%;
  margin:30px auto 0 auto;
  -webkit-border-radius:8px;
  -moz-border-radius:8px;
  -o-border-radius:8px;
  border-radius:8px;
  overflow:hidden;
}

.acc-btn { 
  width:100%;
  margin:0 auto;
  padding:10px 25px;
  cursor:pointer;
  background:#34495E;
  border-bottom:1px solid #2C3E50;
}

.acc-content {
  height:0px;
  width:100%;
  margin:0 auto;
  overflow:hidden;
  background:#2C3E50;
}

.acc-content-inner {
  padding:10px;
}

.open {
  height: auto;
}

h1 {
  font:700 20px/26px 'Lato', sans-serif;
  color:#ffffff;
}

p { 
  font:400 16px/24px 'Lato', sans-serif;
  color:#798795;
}

.selected {
  color:#1ABC9C;
}
</style>

<div class="container">
		
        <div class="acc-container">
        	<?php 
        	$ct = 0;
        	foreach( Yii::app()->mongodb->data->find(array( "key" => $name , 
        													"type" => "post")) as $entry){?>
            <div class="acc-btn"><h1 class="selected"> <?php echo $entry["title"]?></h1></div>
            <div class="acc-content open">
              <div class="acc-content-inner">
                <p> <?php echo $entry["content"]?></p>
              </div>
            </div>
            <?php $ct++;}?>
        </div>
        
 </div> 
 <br/>
<script>
$(document).ready(function(){
	  var animTime = 300,
	      clickPolice = false;
	  
	  $(document).on('touchstart click', '.acc-btn', function(){
	    if(!clickPolice){
	       clickPolice = true;
	      
	      var currIndex = $(this).index('.acc-btn'),
	          targetHeight = $('.acc-content-inner').eq(currIndex).outerHeight();
	   
	      $('.acc-btn h1').removeClass('selected');
	      $(this).find('h1').addClass('selected');
	      
	      $('.acc-content').stop().animate({ height: 0 }, animTime);
	      $('.acc-content').eq(currIndex).stop().animate({ height: targetHeight }, animTime);

	      setTimeout(function(){ clickPolice = false; }, animTime);
	    }
	    
	  });
	  
	});
</script>