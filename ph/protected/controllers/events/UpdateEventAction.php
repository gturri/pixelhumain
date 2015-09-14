<?php
/**
 * [actionAddWatcher 
 * create or update a user account
 * if the email doesn't exist creates a new citizens with corresponding data 
 * else simply adds the watcher app the users profile ]
 * @return [json] 
 */
class UpdateEventAction extends CAction
{
    public function run()
    {
		$id = $_POST["event"];
	   
	if( $event = PHDB::findOne( PHType::TYPE_EVENTS, array( "_id" => new MongoId( $id ) ) ) )
            {
                //udate the new app specific fields
                $newInfos = array();
                if( isset($_POST['title']) )
                    $newInfos['name'] = $_POST['title'];
                if( isset($_POST['description']) ){
                    $newInfos['description'] = $_POST['description'];
                }
				if( isset($_POST['doorTime']) )
                    $newInfos['doorTime'] = $_POST['doorTime'];
                if(isset($_POST['location']))
                       $newInfos["location"]["name"]= $_POST['location'];
				if(isset($_POST['streetAddress']))
                       $newInfos["location"]["address"]["streetAddress"]= $_POST['streetAddress'];
				if(isset($_POST['postalCode']))
                       $newInfos["location"]["address"]["postalCode"]= $_POST['postalCode'];
				if(isset($_POST['addressLocality']))
                       $newInfos["location"]["address"]["addressLocality"]= $_POST['addressLocality'];
				if( isset($_POST['priceLabel']) )
                    $newInfos["offers"]['priceLabel'] = $_POST['priceLabel'];
				if( isset($_POST['price2Label']) )
                    $newInfos["offers"]['price2Label'] = $_POST['price2Label'];
				if( isset($_POST['price3Label']) )
					$newInfos["offers"]['price3Label'] = $_POST['price3Label'];					
				if( isset($_POST['price']) )
                    $newInfos["offers"]['price'] = $_POST['price'];
				if( isset($_POST['price2']) )
                    $newInfos["offers"]['price2'] = $_POST['price2'];
				if( isset($_POST['price3']) )
                    $newInfos["offers"]['price3'] = $_POST['price3'];
				if( isset($_POST['priceDiscount']) )
                    $newInfos["offers"]['priceDiscount'] = $_POST['priceDiscount'];
				if(isset($_POST['value']))
                       $newInfos["offers"]["inventoryLevel"]["value"]= $_POST['value'];
				if(isset($_POST['maxValue']))
                       $newInfos["offers"]["inventoryLevel"]["maxValue"]= $_POST['maxValue']; 
				if(isset($_POST['minValue']))
                       $newInfos["offers"]["inventoryLevel"]["minValue"]= $_POST['minValue'];
				if(isset($_POST['startDate']))
                       $newInfos["startDate"]= $_POST['startDate'];
				if(isset($_POST['endDate']))
                       $newInfos["endDate"]= $_POST['endDate']; 				   
				if(isset($_POST['eventType']))
                       $newInfos["eventType"]= $_POST['eventType'];	
				if( isset($_POST['tags']) )
                {
					$tags_array = $_POST["tags"];
				    $newInfos["tags"] = explode(",", $tags_array);
                }
				if(isset($_POST['maxVotes']))
                       $newInfos["maxVotes"]= $_POST['maxVotes'];
				if(isset($_POST['startVoteDate']))
                       $newInfos["startVoteDate"]= $_POST['startVoteDate'];
				if(isset($_POST['endVoteDate']))
                       $newInfos["endVoteDate"]= $_POST['endVoteDate'];
				if(isset($_POST['voteUp']))
                       $newInfos["voteUp"]= (integer)$_POST['voteUp'];
				if(isset($_POST['clientInfo']))
                       $newInfos["clientInfo"]= $_POST['clientInfo'];   
				if(isset($_POST['isHomePage']))
                       $newInfos["isHomePage"]= 1;    
                if( isset($_FILES['artist']) && $_FILES['artist']['tmp_name'] !== ""  )
                {
                	$pathImage = $this->processImage($_FILES['artist'],$id);
                	if ($pathImage) {
                		 $newInfos["image"] = $pathImage;
                	}
                }
                
              
            PHDB::update(PHType::TYPE_EVENTS,array("_id"=> new MongoId($id)), array('$set' => $newInfos));
			$res = array('result' => true , 'msg'=>'Event Updated');
        } else
            $res = array('result' => false , 'msg'=>'something somewhere went terribly wrong' , 'event'=>$id);
            
        Rest::json($res);  
        Yii::app()->end();
    }
    
	  private function processImage($image, $userID) {
	  	$image_name							= "image_".$userID;
     	$destination_folder = dirname(__FILE__).'/upload/event/'.$image_name;
			$image_temp = $image['tmp_name']; //file temp
			$image_size_info    = getimagesize($image_temp);
			
			
		 if($image_size_info){
        $image_width        = $image_size_info[0]; //image width
				$image_height       = $image_size_info[1]; //image height
				$image_type         = $image_size_info['mime']; //image type
	    }else{
				die("Make sure image file is valid!");
		}
    switch($image_type){
        case 'image/png':
            $image_res =  imagecreatefrompng($image_temp);
            $image_extension ="png";
             break;
        case 'image/gif':
            $image_res =  imagecreatefromgif($image_temp);
            $image_extension ="gif";
             break;       
        case 'image/jpeg': case 'image/pjpeg':
            $image_res = imagecreatefromjpeg($image_temp);
             $image_extension ="jpg";
             break;           
        default:
            $image_res = false;
    }

    $path_file_to_save = $destination_folder.".".$image_extension;
     	$this->save_image($image_res,$path_file_to_save,$image_type );
     	$urlSaved = Yii::app()->getAssetManager()->publish($path_file_to_save);
    return $urlSaved;
  	}

##### Saves image resource to file #####
private function save_image($source, $destination, $image_type){
    switch(strtolower($image_type)){//determine mime type
        case 'image/png':
            imagepng($source, $destination); return true; //save png file
            break;
        case 'image/gif':
            imagegif($source, $destination); return true; //save gif file
            break;          
        case 'image/jpeg': case 'image/pjpeg':
            imagejpeg($source, $destination, '90'); return true; //save jpeg file
            break;
        default: return false;
    } 
  } 	
  	    
}