<?php
#**********************************************************************************#


				#********************************#
				#********** CONFIG INC **********#
				#********************************#


#**********************************************************************************#

				
				#******************************************#
				#********** GLOBAL CONFIGURATION **********#
				#******************************************#
				
				/*
					Konstanten werden in PHP mittels der Funktion define() oder über 
					das Schlüsselwort const (const DEBUG = true;) definiert. 
					Konstanten besitzen im Gegensatz zu Variablen kein $-Präfix
					Üblicherweise werden Konstanten komplett GROSS geschrieben.
					
					1. Verwendung von const:
					Mit dem const-Schlüsselwort können Konstanten innerhalb von Klassen definiert werden.
					Die Verwendung von const ist auf Klassenebene beschränkt und erfordert, dass die Konstante in einer Klasse definiert wird.
					Konstanten, die mit const definiert werden, sind implizit öffentlich (public) und können direkt über den Klassennamen 
					aufgerufen werden, ohne eine Instanz der Klasse zu erstellen.
					Beispiel: const LOGIN_TYPE = email;			$loginType = User::LOGIN_TYPE;
					
					2. Verwendung von define():
					Die Funktion define() wird außerhalb von Klassen verwendet, um Konstanten zu definieren.
					define() kann Konstanten global in jedem Bereich des Codes definieren.
					Konstanten, die mit define() definiert werden, sind standardmäßig global und können überall im Code verwendet werden.
					Beispiel: define('DEBUG', true);
				*/
				
				#********** DATABASE CONFIGURATION **********#
				define('DB_SYSTEM',							'mysql');
				define('DB_HOST',								'localhost');
				define('DB_NAME',								'market');
				define('DB_USER',								'root');
				define('DB_PWD',								'');
				
				
				#********** EXTERNAL STRING INPUT CONFIGURATION **********#
				define('INPUT_MIN_LENGTH',					0);
				define('INPUT_MAX_LENGTH',					256);
				
				
				#********** IMAGE UPLOAD CONFIGURATION **********#
				define('IMAGE_MAX_WIDTH',					800);
				define('IMAGE_MAX_HEIGHT',					800);
				define('IMAGE_MIN_SIZE',					1024);
				define('IMAGE_MAX_SIZE',					128*1024);
				define('IMAGE_ALLOWED_MIME_TYPES',		array('image/jpeg'=>'.jpg', 'image/jpg'=>'.jpg', 'image/gif'=>'.gif', 'image/png'=>'.png'));
				
				
				#********** STANDARD PATHS CONFIGURATION **********#
				define('IMAGE_UPLOAD_PATH',				'./uploads/userimages/');
				define('AVATAR_DUMMY_PATH',				'../css/images/avatar_dummy.png');
				define('CLASS_PATH',							'./class/');
				define('INTERFACE_PATH',					'./class/');
				define('TRAIT_PATH',							'../traits/');
				
				
				#********** STANDARD FILE EXTENSIONS CONFIGURATION **********#
				define('CLASS_FILE_EXTENSION', 			'.class.php');
				define('INTERFACE_FILE_EXTENSION', 		'.class.php');
				define('TRAIT_FILE_EXTENSION', 			'.trait.php');

				
				#********** DEBUGGING **********#
				define('DEBUG', 								true);		// Debugging for main documents
				define('DEBUG_V', 							true);		// Debugging for values	
				define('DEBUG_F', 							true);		// Debugging for functions	(later for Validator and Sanitizer Classes)
				define('DEBUG_DB', 							true);		// Debugging for database operations
				define('DEBUG_C', 							true);		// Debugging for classes
				define('DEBUG_CC', 							true);		// Debugging for class constructors
				define('DEBUG_T', 							true);		// Debugging for traits
				define('DEBUG_TC', 							true);		// Debugging for trait constructors
								

#**********************************************************************************#