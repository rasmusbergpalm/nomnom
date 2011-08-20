<?php
class DbviewsController extends AppController {

	var $name = 'Dbviews';

	function index() {
		$this->Dbview->recursive = 0;
		$this->set('dbviews', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid dbview', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('dbview', $this->Dbview->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Dbview->create();
			if ($this->Dbview->save($this->data)) {
				$this->Session->setFlash(__('The dbview has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dbview could not be saved. Please, try again.', true));
			}
		}
		$dashboards = $this->Dbview->Dashboard->find('list');
		$this->set(compact('dashboards'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid dbview', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Dbview->save($this->data)) {
				$this->Session->setFlash(__('The dbview has been saved', true));
				$this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('The dbview could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Dbview->read(null, $id);
		}
		$dashboards = $this->Dbview->Dashboard->find('list');
		$this->set(compact('dashboards'));
	}

        function update($id = null) {
            $this->autoRender = false;

                if (!$id && empty($this->data)) {
                        $this->Session->setFlash(__('Invalid dashboards item', true));
                        $this->redirect(array('action' => 'index'));
                }
                if (!empty($this->data)) {
                        debug($this->data);
                        $dbview = $this->Dbview->read(null, $id);

                        foreach($this->data as $k => $v){
                            $dbview['Dbview'][$k] = $v;
                        }

                        if ($this->Dbview->save($dbview)) {
                                echo "OK";
                        } else {
                                echo "ERROR";
                        }
                }
        }

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for dbview', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Dbview->delete($id)) {
			$this->Session->setFlash(__('Dbview deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Dbview was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
