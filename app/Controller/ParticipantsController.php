<?php
	
	class ParticipantsController extends AppController {
		public function close() {
			$this->Participant->id = $this->Session->read( 'Participant.id' ) ;
			$this->Participant->set( 'done' , true ) ;
			$this->Participant-save() ;
			$this->Session->destroy() ;
			$this->Session->setFlash( 'Vielen Dank für Ihre Teilnahme!' ) ;
		}
	}
	
?>