<?php
#*******************************************************************************************#
				
				
				#******************************************#
				#********** ENABLE STRICT TYPING **********#
				#******************************************#
			
				declare(strict_types=1);
				
				
#*******************************************************************************************#


				#**********************************#
				#********** CLASS MEDIUM **********#
				#**********************************#

				
#*******************************************************************************************#

				
				class Medium {
					
					#*******************************#
					#********** ATTRIBUTE **********#
					#*******************************#
					
					private $mediaTitle;
					private $mediaReleaseYear;
					private $mediaType;
					private $mediaPrice;
					private $mediaGenre;
					private $mediaArtist;
					private $mediaID;
					
	
					#***********************************************************#
					
					
					#*********************************#
					#********** CONSTRUCTOR **********#
					#*********************************#
					
					public function __construct($mediaTitle=NULL, $mediaReleaseYear=NULL, $mediaType=NULL, 
														 $mediaPrice=NULL, $mediaArtist=NULL, $mediaGenre=NULL, 
														 $mediaID=NULL) 
					{
if(DEBUG_CC)		echo "<h3 class='debug class'>🛠 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</h3>\n";						
						
						// SETTER nur aufrufen, wenn der jeweilige Parameter einen gültigen Wert besitzt
						if($mediaTitle 			!== '' AND $mediaTitle 			!== NULL )		$this->setMediaTitle($mediaTitle);
						if($mediaReleaseYear 	!== '' AND $mediaReleaseYear 	!== NULL )		$this->setMediaReleaseYear($mediaReleaseYear);
						if($mediaType 				!== '' AND $mediaType 			!== NULL )		$this->setMediaType($mediaType);
						if($mediaPrice 			!== '' AND $mediaPrice 			!== NULL )		$this->setMediaPrice($mediaPrice);
						if($mediaArtist 			!== '' AND $mediaArtist 		!== NULL )		$this->setMediaArtist($mediaArtist);
						if($mediaGenre 			!== '' AND $mediaGenre 			!== NULL )		$this->setMediaGenre($mediaGenre);
						if($mediaID 				!== '' AND $mediaID 				!== NULL )		$this->setMediaID($mediaID);
/*						
if(DEBUG_CC)		echo "<pre class='debug class value'><b>Line " . __LINE__ .  "</b> <i>(" . basename(__FILE__) . ")</i>:<br>\n";					
if(DEBUG_CC)		print_r($this);					
if(DEBUG_CC)		echo "</pre>";						
*/					}
					
					
					#********** DESTRUCTOR **********#
					public function __destruct() {
if(DEBUG_CC)		echo "<h3 class='debug class'>☠️  <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</h3>\n";						
					}
					
					
					#***********************************************************#

					
					#*************************************#
					#********** GETTER & SETTER **********#
					#*************************************#
				
					
					#********** MEDIA ID **********#
					public function getMediaID() {
						return $this->mediaID;
					}
					public function setMediaID($value) {						
						$this->mediaID = sanitizeString($value);
					}
					
					
					#********** MEDIA TITLE **********#
					public function getMediaTitle() {
						return $this->mediaTitle;
					}
					public function setMediaTitle($value) {						
						$this->mediaTitle = sanitizeString($value);
					}
					
					
					#********** MEDIA RELEASE YEAR **********#
					public function getMediaReleaseYear() {
						return $this->mediaReleaseYear;
					}
					public function setMediaReleaseYear($value) {						
						$this->mediaReleaseYear = sanitizeString($value);					
					}
					
					
					#********** MEDIA TYPE **********#
					public function getMediaType() {
						return $this->mediaType;
					}
					public function setMediaType($value) {						
						$this->mediaType = sanitizeString($value);				
					}
					
					
					#********** MEDIA PRICE **********#
					public function getMediaPrice() {
						return $this->mediaPrice;
					}
					public function setMediaPrice($value) {
						$value = str_replace( ',', '.', sanitizeString($value) );
						$this->mediaPrice = $value;						
					}
					
					
					#********** MEDIA ARTIST **********#
					public function getMediaArtist() {
						return $this->mediaArtist;
					}
					public function setMediaArtist($value) {
						$this->mediaArtist = sanitizeString($value);					
					}
					
					
					#********** MEDIA GENRE **********#
					public function getMediaGenre() {
						return $this->mediaGenre;
					}
					public function setMediaGenre($value) {						
						$this->mediaGenre = sanitizeString($value);					
					}			
					
					
					#***********************************************************#
					

					#******************************#
					#********** METHODEN **********#
					#******************************#

					
					public function saveToDb($PDO) {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						
						$sql		= 'INSERT INTO medium
										(mediaTitle, mediaReleaseYear, mediaType, mediaPrice, mediaGenre, mediaArtist)
										VALUES
										(?,?,?,?,?,?)';
						
						$params 	= array(
												$this->getMediaTitle(),
												$this->getMediaReleaseYear(),
												$this->getMediaType(),
												$this->getMediaPrice(),
												$this->getMediaGenre(),
												$this->getMediaArtist()
												);
						
						// Schritt 2 DB: SQL-Statement vorbereiten
						$PDOStatement = $PDO->prepare($sql);
						
						// Schritt 3 DB: SQL-Statement ausführen und ggf. Platzhalter füllen
						try {	
							$PDOStatement->execute($params);						
						} catch(PDOException $error) {
if(DEBUG_C)				echo "<p class='debug class err'><b>Line " . __LINE__ . "</b>: FEHLER: " . $error->GetMessage() . "<i>(" . basename(__FILE__) . ")</i></p>\n";										
							$dbError = 'Fehler beim Zugriff auf die Datenbank!';
						}
						
						// Schritt 4 DB: Daten weiterverarbeiten
						// Bei schreibendem Zugriff: Schreiberfolg prüfen
						$rowCount = $PDOStatement->rowCount();
if(DEBUG_C)			echo "<p class='debug class'><b>Line " . __LINE__ . "</b>: \$rowCount: $rowCount <i>(" . basename(__FILE__) . ")</i></p>\r\n";
						
						if($rowCount !== 1) {
							// Fehlerfall
							return false;
							
						} else {
							// Erfolgsfall
							
							// ID auslesen
							$lastInsertId = $PDO->lastInsertId();
							// ID in Objekt schreiben
							$this->setMediaID($lastInsertId);
							
							return true;
						}						
					}

					
					#***********************************************************#
					
					
					public static function fetchAllFromDb($PDO) {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						
						$sql		= 'SELECT * FROM medium';
						
						$params 	= NULL;
						
						// Schritt 2 DB: SQL-Statement vorbereiten
						$PDOStatement = $PDO->prepare($sql);
						
						// Schritt 3 DB: SQL-Statement ausführen und ggf. Platzhalter füllen
						try {	
							$PDOStatement->execute($params);						
						} catch(PDOException $error) {
if(DEBUG_C)				echo "<p class='debug class err'><b>Line " . __LINE__ . "</b>: FEHLER: " . $error->GetMessage() . "<i>(" . basename(__FILE__) . ")</i></p>\n";										
							$dbError = 'Fehler beim Zugriff auf die Datenbank!';
						}
						
						// Schritt 4 DB: Daten weiterverarbeiten
						// Jeden Datensatz nacheinander auslesen und aus den Daten ein Objekt erzeugen
						while( $row = $PDOStatement->fetch(PDO::FETCH_ASSOC) ) {
							
							// $mediaTitle=NULL, $mediaReleaseYear=NULL, $mediaType=NULL, $mediaPrice=NULL, $mediaArtist=NULL, $mediaGenre=NULL, $mediaID=NULL
							$objectsArray[] = new medium(
																	$row['mediaTitle'],
																	$row['mediaReleaseYear'],
																	$row['mediaType'],
																	$row['mediaPrice'],
																	$row['mediaArtist'],
																	$row['mediaGenre'],
																	$row['mediaID'],
																	);
						}
						
						return $objectsArray ?? false;
						
					}					
					
					
					#***********************************************************#
					
					
					public function deleteFromDb($PDO) {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						
						$sql		= 'DELETE FROM medium
										WHERE mediaID = ?';
						
						$params 	= array( $this->getMediaID() );
						
						// Schritt 2 DB: SQL-Statement vorbereiten
						$PDOStatement = $PDO->prepare($sql);
						
						// Schritt 3 DB: SQL-Statement ausführen und ggf. Platzhalter füllen
						try {	
							$PDOStatement->execute($params);						
						} catch(PDOException $error) {
if(DEBUG_C)				echo "<p class='debug class err'><b>Line " . __LINE__ . "</b>: FEHLER: " . $error->GetMessage() . "<i>(" . basename(__FILE__) . ")</i></p>\n";										
							$dbError = 'Fehler beim Zugriff auf die Datenbank!';
						}
						
						// Schritt 4 DB: Daten weiterverarbeiten
						// Bei schreibendem Zugriff: Schreiberfolg prüfen
						$rowCount = $PDOStatement->rowCount();
if(DEBUG_C)			echo "<p class='debug class'><b>Line " . __LINE__ . "</b>: \$rowCount: $rowCount <i>(" . basename(__FILE__) . ")</i></p>\r\n";
						
						return $rowCount;
					}
					
					
					#***********************************************************#
					
				}
				
				
#*******************************************************************************************#
?>


















