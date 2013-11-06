<?php

class OpenData
{
    /*
     * Tous les pays disponible à l'inscription
     */
    public static $phCountries = array("France"=>"France",
                    				"Guadeloupe"=>"Guadeloupe",
                  					"Guyanne"=>"Guyanne",
                    				"Martinique"=>"Martinique",
                    				"Mayotte"=>"Mayotte",
                    				"Nouvelle-Calédonie"=>"Nouvelle-Calédonie",
                    				"Réunion"=>"Réunion");
    /**
     * Classé par departement 
     * ce tableau fait le lien entre Code postal et nom de ville
     */
    public static $commune = array( '974'=>array(
                                            '97400'=> 'ST DENIS',
                                            '97410'=> 'ST PIERRE',
                                            '97411'=> 'BOIS DE NEFLES ST PAUL',
                                            '97412'=> 'BRAS PANON',
                                            '97413'=> 'CILAOS',
                                            '97414'=> 'ENTRE DEUX',
                                            '97416'=> 'LA CHALOUPE',
                                            '97417'=> 'LA MONTAGNE',
                                            '97418'=> 'LA PLAINE DES CAFRES',
                                            '97419'=> 'LA POSSESSION',
                                            '97420'=> 'LE PORT',
                                            '97421'=> 'LA RIVIERE',
                                            '97422'=> 'LA SALINE',
                                            '97423'=> 'LE GUILLAUME',
                                            '97424'=> 'LE PITON ST LEU',
                                            '97425'=> 'LES AVIRONS',
                                            '97426'=> 'LES TROIS BASSINS',
                                            '97427'=> 'L ETANG SALE',
                                            '97429'=> 'PETITE ILE',
                                            '97430'=> 'LE TAMPON',
                                            '97431'=> 'LA PLAINE DES PALMISTES',
                                            '97432'=> 'RAVINE DES CABRIS',
                                            '97433'=> 'SALAZIE',
                                            '97434'=> 'LES TROIS BASSINS',
                                            '97434'=> 'ST GILLES LES BAINS' ,
                                            '97435'=> 'ST GILLES LES HAUTS',
                                            '97436'=> 'ST LEU',
                                            '97437'=> 'STE ANNE',
                                            '97438'=> 'STE MARIE',
                                            '97439'=> 'STE ROSE',
                                            '97440'=> 'ST ANDRE',
                                            '97441'=> 'STE SUZANNE',
                                            '97442'=> 'ST PHILIPPE',
                                            '97450'=> 'ST LOUIS',
                                            '97460'=> 'ST PAUL',
                                            '97470'=> 'ST BENOIT',
                                            '97480'=> 'ST JOSEPH',
                                            '97490'=> 'STE CLOTILDE'
                                            )
                                    );
/* Code Postal to Insee 
 * le code insee est connecté à une commune
 * le code postale est connecté à une ville
 * */ 
  public static $codePostalToCodeInsee = array( '974'=>array(
                                            '97400'=> '97411',
                                            '97410'=> '97416',
                                            '97411'=> '97415',
                                            '97412'=> '97402',
                                            '97413'=> '97424',
                                            '97414'=> '97403',
                                            '97416'=> '97413',
                                            '97417'=> '97411',
                                            '97418'=> '97422',
                                            '97419'=> '97408',
                                            '97420'=> '97407',
                                            '97421'=> '97414',
                                            '97422'=> '97415',
                                            '97423'=> '97415',
                                            '97424'=> '97413',
                                            '97425'=> '97401',
                                            '97426'=> '97423',
                                            '97427'=> '97404',
                                            '97429'=> '97405',
                                            '97430'=> '97422',
                                            '97431'=> '97406',
                                            '97432'=> '97416',
                                            '97433'=> '97421',
                                            '97434'=> '97423',
                                            '97434'=> '97415',
                                            '97435'=> '97415',
                                            '97436'=> '97413',
                                            '97437'=> '97410',
                                            '97438'=> '97418',
                                            '97439'=> '97419',
                                            '97440'=> '97409',
                                            '97441'=> '97420',
                                            '97442'=> '97417',
                                            '97450'=> '97414',
                                            '97460'=> '97415',
                                            '97470'=> '97410',
                                            '97480'=> '97412',
                                            '97490'=> '97411'
  
                                            )
   
                                    );
                                   
}