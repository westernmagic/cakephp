<?php
	
	class SurveysController extends AppController {
		public $scaffold ;
		
		public function generate( $survey ) {
			if( $this->Survey->find( 'first' , array( 'conditions' => array( 'Survey.id' => $survey ) ) ) ) {
				do {
					$participant = sha1( microtime() ) ;
				} while( $this->Survey->Participant->find( 'first' , array( 'conditions' => array( 'Participant.id' => $participant ) ) ) ) ;
				$this->Survey->Participant->id = $participant ;
				$this->Survey->Participant->set( 'Survey.id' , $survey ) ;
				$this->Survey->Participant->save() ;
			}
		}
		
		public function survey( $id ) {
			$this->Session->write( 'Participant.id' , $id ) ;
			$this->Survey->Participant->id = $id ;
			$this->Survey->Paritcipant->data = $this->Survey->Participant->read() ;
			if( $this->Survey->Participant->data[ 'done' ] ){
				$this->Session->setFlash( 'Sie haben schon an dieser Umfrage teilgenommen.' ) ;
			}
			$this->set( 'questions' , $this->Survey->Participant->data[ 'Survey' ][ 'Question' ] ) ;
		}
	}
	
?>