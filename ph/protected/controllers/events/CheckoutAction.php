﻿<?php
/*
- validate Ajax request
- check refred email user exists
- set group specific information
- add application / module specific information 
- insert or update group
- TODO : add event to cart
 */
class CheckoutAction extends CAction
{
   public function run() {
   
			$m = new MongoClient("mongodb://oceatoon:6ognom9_$@open-atlas.org:27017/");
			$db = $m->selectDB ( "azotliveDev" );
			$checkout = Yii::app()->session['checkout'];
			$cart_main = Yii::app()->session['cart'];
			$cart = $cart_main['cart'];
			$person = Yii::app()->session['personMap'];
	
	
			$tickets = new MongoCollection($db, 'tickets');
			//search for any pending tickets 
			$unpayedTickets = $tickets->find(array("payed"=>false,"person.email"=>$person['email']));
			foreach($unpayedTickets as $upt)
				$tickets->remove(array("_id" => $upt["_id"]));
			//issue ticket
			//with non validated status
			$now = new DateTime();
			$now->setTimezone(new DateTimeZone('Indian/Reunion'));
			

			$offer = array(
				"@context" => "http://schema.org",
				"@Type"    => "Ticket",
				"dateIssued" => $now->format("d/m/Y G:i"),
				"tickets"=>array(
					"@Type"    => "Ticket",
					"quantity" => 0,
					"@list"    => array()
				),
				"totalPrice"  => $checkout["total"],
				"person"	  => array(
					"@Type"	  => "Person",
					"email"   => (string)$person["email"]
				),
				"event"=>array(
					"@Type"   => "Event",
					"@id"     => $checkout["events"]
				),
				"payed"     => false,
				"printed"   => 0,
				"printPref" => $person["printPref"]
			);
			$now = time();
			$uniqueNum = (string)new MongoId();
			$ticketToken = md5($now."azotlive".$uniqueNum);
			
			$events_array = explode(",", $checkout["events"]);
			$events = array_filter($events_array);
			foreach($events as $event){
			
				$event_data = PHDB::findOne( PHType::TYPE_EVENTS, array( "_id" => new MongoId( $event ) ) );
			
			
				if(isset($cart[$event]["qtyCat1"]) && $cart[$event]["qtyCat1"]>0 ){
					$ticketNumbers = array();
					for( $ix=0; $ix < $cart[$event]["qtyCat1"]; $ix++){
						$uniqueNum = (string)new MongoId();
						$ticketNumber = array(
							"ticketNumber" => $uniqueNum,
							"time" => $now,
							"ticketToken" =>$ticketToken
						);
						array_push($ticketNumbers,$ticketNumber);
					}
					$ticket = array(
						"ticketNumbers" => $ticketNumbers,
						"quantity" => $cart[$event]["qtyCat1"],
						"price"  => $cart[$event]["price1"],
						"type"  => $event_data["offers"]["priceLabel"],
						"@id" => $event,
						"name" => $event_data['name']
					);
					array_push($offer["tickets"]["@list"], $ticket );
					$offer["tickets"]["quantity"] += $cart[$event]["qtyCat1"];
				}
				if(isset($cart[$event]["qtyCat2"]) && $cart[$event]["qtyCat2"]>0){
					$ticketNumbers = array();
					for($ix=0; $ix < $cart[$event]["qtyCat2"]; $ix++){
						$uniqueNum = (string)new MongoId();
						$ticketNumber = array(
							"ticketNumber" => $uniqueNum,
							"time"=> $now,
							"ticketToken" => $ticketToken
						);
						array_push($ticketNumbers,$ticketNumber);
					}
					$ticket = array(
						"ticketNumbers" => $ticketNumbers,
						"ticketToken" => $ticketToken,
						"quantity"  => $cart[$event]["qtyCat2"],
						"price" => $cart[$event]["price2"],
						"type" => $event_data["offers"]["price2Label"],
						"@id" => $event,
						"name" => $event_data['name']
					);
					array_push( $offer["tickets"]["@list"], $ticket );
					$offer["tickets"]["quantity"] += $cart[$event]["qtyCat2"];
				}
				if(isset($cart[$event]["qtyCat3"]) && $cart[$event]["qtyCat3"] > 0){
					$ticketNumbers = array();
					for($ix=0; $ix < $cart[$event]["qtyCat3"]; $ix++){
						$uniqueNum = (string)new MongoId();
						$ticketNumber = array(
							"ticketNumber" => $uniqueNum,
							"time"=>$now,
							"ticketToken" => $ticketToken
						);
						array_push($ticketNumbers,$ticketNumber);
					}
					$ticket = array(
						"ticketNumbers" => $ticketNumbers,
						"ticketToken" => $ticketToken,
						"quantity"  => $cart[$event]["qtyCat3"],
						"price" => $cart[$event]["price3"],
						"type" => $event_data["offers"]["price3Label"],
						"@id" => $event,
						"name" => $event_data['name'],
					);
					array_push($offer["tickets"]["@list"], $ticket );
					$offer["tickets"]["quantity"] += $cart[$event]["qtyCat3"];
				}
			}
			$tickets->insert($offer);
			
			Yii::app()->session['offer'] = (string)$offer["_id"];
			$offerID = Yii::app()->session['offer'];
			
   
		require_once("/home/humanpixel/qa.pixelhumain.com/ph/protected/extensions/paynplug/lib/Payplug.php");
		$parametersFile = "/home/humanpixel/qa.pixelhumain.com/ph/protected/extensions/paynplug/azotlive/params.json";
		$parameters;

		/* Loads parameters (from PayPlug if needed) */
		if ( ! file_exists($parametersFile)) {
			try {
				$parameters = Payplug::loadParameters("azotlivecontact@gmail.com", "MVPU6TXU5M4GSKP3");
				$parameters->saveInFile($parametersFile);
			} catch (Exception $e) {
				die("Fail : \n" . $e->getMessage());
			}
		}
		else {
			try {
				$parameters = Parameters::loadFromFile($parametersFile);
			} catch (Exception $e) {
				die("Fail : \n" . $e->getMessage());
			}
		}

		Payplug::setConfig($parameters);
		/* Creates a payment request */
		$params = array();
		$paymentUrl;
		$payment = new PaymentUrl($amount, "USD", $ipnUrl);

		try {
			$paymentUrl = $payment->generateUrl(array(
				"amount" => (float) $_POST["amount"] * 100,
				"cancelUrl" => "http://azotlive.com",
				"currency" => "USD",
				"email" => $_POST["email"],
				"firstName" => $_POST["firstName"],
				"ipnUrl" => "http://qa.pixelhumain.com/ph/azotlive/api/ipnAction",
				"lastName" => $_POST["lastName"],
				"order" => $offerID,
				"customer" => $_POST["customer"],
				"returnUrl"=> "http://qa.pixelhumain.com/ph/azotlive/buy/confirm"
			));

			echo $paymentUrl;
			
		} catch (Exception $e) {
			die("Fail : \n" . $e->getMessage());
		}

	}
}