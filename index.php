<?php
#*******************************************************************************************#
				
				
				#******************************************#
				#********** ENABLE STRICT TYPING **********#
				#******************************************#

				declare(strict_types=1);
				
				
#*******************************************************************************************#
			
			
				#***********************************#
				#********** CONFIGURATION **********#
				#***********************************#
				require_once('./include/config.inc.php');
				require_once('./include/db.inc.php');
				require_once('./include/form.inc.php');
				require_once('./include/dateTime.inc.php');
				
				
				#********** INCLUDE CLASSES **********#
				require_once('class/Medium.class.php');

			
#*******************************************************************************************#


				#***********************************#
				#********** DB CONNECTION **********#
				#***********************************#
				
				$PDO = dbConnect('mediasammlung_oop');



#*******************************************************************************************#


				#********************************************#
				#********** PROCESS URL PARAMETERS **********#
				#********************************************#				
				
				// Schritt 1 URL: Prüfen, ob Parameter übergeben wurde
				if( isset($_GET['action']) ) {
if(DEBUG)		echo "<p class='debug'>🧻 <b>Line " . __LINE__ . "</b>: URL-Parameter 'action' wurde übergeben. <i>(" . basename(__FILE__) . ")</i></p>\n";										
					
					// Schritt 2 URL: Werte auslesen, entschärfen, DEBUG-Ausgabe
					$action = sanitizeString( $_GET['action'] );
if(DEBUG_V)		echo "<p class='debug value'><b>Line " . __LINE__ . "</b>: \$action: $action <i>(" . basename(__FILE__) . ")</i></p>\n";
					
					// Schritt 3 URL: Verzweigung
					
					
					#********** INSERT **********#
					if( $action === 'insert' ) {
if(DEBUG)			echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Erstelle Datensätze... <i>(" . basename(__FILE__) . ")</i></p>\n";
											
						// Schritt 4 URL: Daten weiterverarbeiten
						
						
						#********** CREATE MEDIUM OBJECTS **********#						
						// $mediaTitle=NULL, $mediaReleaseYear=NULL, $mediaType=NULL, $mediaPrice=NULL, 
						// $mediaArtist=NULL, $mediaGenre=NULL, $mediaID=NULL
						$Medium1 = new Medium("Aleee", "1990", "DVD", "24,90", "Aleee", "Sch");
						$Medium2 = new Medium("Alooo", "1992", "Blu-ray", "19,90", "Alooo", "Fa");
						$Medium3 = new Medium("Waaa", "1988", "DVD", "29,00", "Waaa", "Ca");
						$Medium4 = new Medium("Looo", "1995", "CD", "9,70", "Looo", "Fo");
						$Medium5 = new Medium("Diii", "2012", "CD", "16,90", "Diii", "Ho");
												

						#********** SAVE MEDIUM OBJECTS INTO DB **********#
if(DEBUG)			echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Saving medium objects into database... <i>(" . basename(__FILE__) . ")</i></p>\n";
						
						#********** MEDIUM #1 **********#						
						if( $Medium1->saveToDb($PDO) === false ) {
							// Fehlerfall
if(DEBUG)				echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Fehler beim Speichern des neuen Mediums in die Datenbank! <i>(" . basename(__FILE__) . ")</i></p>\n";				
						} else {
							// Erfolgsfall
if(DEBUG)				echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Neues Medium erfolgreich unter ID{$Medium1->getMediaID()} gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";				
						}
						
						#********** MEDIUM #2 **********#
						if( $Medium2->saveToDb($PDO) === false ) {
							// Fehlerfall
if(DEBUG)				echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Fehler beim Speichern des neuen Mediums in die Datenbank! <i>(" . basename(__FILE__) . ")</i></p>\n";				
						} else {
							// Erfolgsfall
if(DEBUG)				echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Neues Medium erfolgreich unter ID{$Medium2->getMediaID()} gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";				
						}
						
						#********** MEDIUM #3 **********#
						if( $Medium3->saveToDb($PDO) === false ) {
							// Fehlerfall
if(DEBUG)				echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Fehler beim Speichern des neuen Mediums in die Datenbank! <i>(" . basename(__FILE__) . ")</i></p>\n";				
						} else {
							// Erfolgsfall
if(DEBUG)				echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Neues Medium erfolgreich unter ID{$Medium3->getMediaID()} gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";				
						}
						
						#********** MEDIUM #4 **********#
						if( $Medium4->saveToDb($PDO) === false ) {
							// Fehlerfall
if(DEBUG)				echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Fehler beim Speichern des neuen Mediums in die Datenbank! <i>(" . basename(__FILE__) . ")</i></p>\n";				
						} else {
							// Erfolgsfall
if(DEBUG)				echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Neues Medium erfolgreich unter ID{$Medium4->getMediaID()} gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";				
						}
						
						#********** MEDIUM #5 **********#
						if( $Medium5->saveToDb($PDO) === false ) {
							// Fehlerfall
if(DEBUG)				echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Fehler beim Speichern des neuen Mediums in die Datenbank! <i>(" . basename(__FILE__) . ")</i></p>\n";				
						} else {
							// Erfolgsfall
if(DEBUG)				echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Neues Medium erfolgreich unter ID{$Medium5->getMediaID()} gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";				
						}
						
					
					#********** DELETE **********#
					} elseif($action === 'delete') {
if(DEBUG)			echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Delete Dataset from db... <i>(" . basename(__FILE__) . ")</i></p>\n";
						
						
						// Schritt 4 URL: Daten weiterverarbeiten
						
						#********** CHECK FOR RECEIVED MEDIUM ID **********#
						if( isset($_GET['id']) ) {							
							$id = sanitizeString($_GET['id']);
if(DEBUG_V)				echo "<p class='debug value'><b>Line " . __LINE__ . "</b>: \$id: $id <i>(" . basename(__FILE__) . ")</i></p>\n";
							
							// $mediaTitle=NULL, $mediaReleaseYear=NULL, $mediaType=NULL, $mediaPrice=NULL, 
							// $mediaArtist=NULL, $mediaGenre=NULL, $mediaID=NULL
							$Medium = new Medium();
							$Medium->setMediaID($id);

							if( $Medium->deleteFromDb($PDO) === false ) {
								// 'Fehlerfall'
if(DEBUG)					echo "<p class='debug info'><b>Line " . __LINE__ . "</b>: Es wurden keine Daten gelöscht. <i>(" . basename(__FILE__) . ")</i></p>\n";				
								$dbInfo = 'Es wurden keine Daten gelöscht.';
								
							} else {
								// Erfolgsfall
if(DEBUG)					echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Der Datensatz mit der ID$id wurde erfolgreich gelöscht. <i>(" . basename(__FILE__) . ")</i></p>\n";				
								$dbSuccess = "Der Datensatz mit der ID$id wurde erfolgreich gelöscht.";
							}

						} // CHECK FOR RECEIVED USER ID END
						
					} // BRANCHES END
						
				} // PROCESS URL PARAMETERS END


#*******************************************************************************************#


				#*********************************************#
				#********** FETCH ALL MEDIA FROM DB **********#
				#*********************************************#
				
				$mediumObjectsArrayFromDb = Medium::fetchAllFromDb($PDO);
				
/*
if(DEBUG)	echo "<pre class='debug'>Line <b>" . __LINE__ . "</b> <i>(" . basename(__FILE__) . ")</i>:<br>\r\n";					
if(DEBUG)	print_r($mediumObjectsArrayFromDb);					
if(DEBUG)	echo "</pre>";
*/
			
#*******************************************************************************************#
?>

<!doctyp html>

<html>
	
	<head>
	
		<link rel="stylesheet" href="./css/main.css">
		<link rel="stylesheet" href="./css/debug.css">
		
		<meta charset="utf-8">
		<title>Generate Medium and save in DB</title>
	</head>
	
	<body>
		
		
		
		<br>
		<hr>
		<br>
		
			<!-- ---------- LINK START ---------- -->
		<p><a href="?action=insert">Generate 5 Medium and save them into Database</a></p>
			<!-- ---------- LINK END ---------- -->
		
		<!-- ---------- USER MESSAGES START ---------- -->
		<h3 class="info"><?php echo $dbInfo ?? NULL ?></h3>
		<h3 class="success"><?php echo $dbSuccess ?? NULL ?></h3>
		<!-- ---------- USER MESSAGES END ---------- -->
		
		<br>
		<hr>
		<br>
		
		<!-- ---------- DATA TABLE START ---------- -->
		<table>
			<tr>
				<th>Titel</th>
				<th>Autor/Künstler/Regisseur</th>
				<th>Medientyp</th>
				<th>Genre</th>
				<th>Preis</th>
			</tr>
			
			<!-- ---------- CHECK IF DATABASE ALREADY CONTAINS DATA ---------- -->
			<?php if( $mediumObjectsArrayFromDb !== false ): ?>
			
				<!-- LOOP START -->
				<?php foreach( $mediumObjectsArrayFromDb AS $mediumObject ): ?>
				<tr>
					<td><?= $mediumObject->getMediaTitle() ?></td>
					<td><?= $mediumObject->getMediaArtist() ?></td>
					<td><?= $mediumObject->getMediaType() ?></td>
					<td><?= $mediumObject->getMediaGenre() ?></td>
					<td><?= $mediumObject->getMediaPrice() ?>&nbsp;€</td>
				</tr>
				
				<?php endforeach ?>
				<br>
				<a href="?action=delete&id=<?= $mediumObject->getMediaID() ?>">Delete All</a>

				<!-- LOOP END -->
				
			<?php endif ?>
			
		</table>
		<!-- ---------- DATA TABLE END ---------- -->
		
		
		
		
		
		
		
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
	</body>
	
</html>