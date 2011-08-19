<?php
class GettersController extends AppController {

	var $name = 'Getters';

	function index() {
		$this->Getter->recursive = 0;
		$this->set('getters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid getter', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('getter', $this->Getter->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Getter->create();
			if ($this->Getter->save($this->data)) {
				$this->Session->setFlash(__('The getter has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The getter could not be saved. Please, try again.', true));
			}
		}
	}


	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid getter', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Getter->save($this->data)) {
				$this->Session->setFlash(__('The getter has been saved', true));
				$this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('The getter could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Getter->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for getter', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Getter->delete($id)) {
			$this->Session->setFlash(__('Getter deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Getter was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
