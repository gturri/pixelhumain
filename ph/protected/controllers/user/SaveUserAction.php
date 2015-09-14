<?php
/**
 * [actionAddWatcher 
 * create or update a user account
 * if the email doesn't exist creates a new citizens with corresponding data 
 * else simply adds the watcher app the users profile ]
 * @return [json] 
 */
class SaveUserAction extends CAction
{
    public function run()
    {
	
		$email = $_POST["email"];
	    $user = PHDB::findOne( PHType::TYPE_CITOYEN,array( "email" => $email ) );
		
		if($user)
        {
			$res = array("result"=>true,"msg"=>"Already registered.");
		    Rest::json($res);  
			Yii::app()->end();
        
		}
	   
        else
        {
            //if exists login else create the new user
            $pwd = (isset($_POST["pwd"])) ? $_POST["pwd"] : null ;
            $res = Citoyen::register( $email, $pwd);
			
           
			Yii::app()->session["userEmail"] = $_POST["email"];
			Yii::app()->session["user"] = $_POST['firstname']; 
			 
			Rest::json($res);  
			Yii::app()->end();
			
        } 
		
            
      
    }   
	 
  	    
}