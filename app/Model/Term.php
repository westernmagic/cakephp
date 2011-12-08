<?php
	
	class Term extends AppModel {
		public $name = 'Term' ;
		public $hasMany = array( 'Survey' ) ;
	}
	
?>