<?php
#*******************************************************************************************#
				
				
				#******************************************#
				#********** ENABLE STRICT TYPING **********#
				#******************************************#
				
				/*
					Erklärung zu 'strict types' in Projekt '01a_klassen_und_instanzen'
				*/
				declare(strict_types=1);
				
				
#*******************************************************************************************#


				function classLoader($name) {
if(DEBUG_F)		echo "<p class='debug classLoader'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __FUNCTION__ . "('$name') <i>(" . basename(__FILE__) . ")</i></p>\n";
					
					
					#*****************************************#
					#********** DETERMINE FILE TYPE **********#
					#*****************************************#
					
					// ClassPath: 		'./class/KlassenName.class.php'
					// InterfacePath: './class/KlassenNameInterface.class.php'
					// TraitPath: 		'../traits/TraitNameTrait.trait.php'
					
					#********** CHECK IF $name IS TRAIT **********#
					if( str_ends_with($name, 'Trait') === true ) {
						$filePath = TRAIT_PATH . $name . TRAIT_FILE_EXTENSION;
						$type = 'TRAIT';
					
					#********** CHECK IF $name IS INTERFACE **********#
					} elseif( str_ends_with($name, 'Interface') === true ) {
						$filePath = INTERFACE_PATH . $name . INTERFACE_FILE_EXTENSION;
						$type = 'INTERFACE';
					
					#********** CHECK IF $name IS CLASS **********#
					} else {
						$filePath = CLASS_PATH . $name . CLASS_FILE_EXTENSION;
						$type = 'CLASS';
					}
					
if(DEBUG_F)		echo "<p class='debug classLoader'><b>Line " . __LINE__ .  "</b> $type '$name' wird eingebunden... (<i>" . basename(__FILE__) . "</i>)</p>\n";
									
					require_once($filePath);
				}


#*******************************************************************************************#