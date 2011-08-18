<?php
class DashboardsItemsController extends AppController {

	var $name = 'DashboardsItems';

	function index() {
		$this->DashboardsItem->recursive = 0;
		$this->set('dashboardsItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid dashboards item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('dashboardsItem', $this->DashboardsItem->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DashboardsItem->create();
			if ($this->DashboardsItem->save($this->data)) {
				$this->Session->setFlash(__('The dashboards item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dashboards item could not be saved. Please, try again.', true));
			}
		}
		$dashboards = $this->DashboardsItem->Dashboard->find('list');
		$items = $this->DashboardsItem->Item->find('list');
		$this->set(compact('dashboards', 'items'));
	}

	function update($id = null) {
            $this->autoRender = false;
            
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid dashboards item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
                        $dbi = $this->DashboardsItem->read(null, $id);

                        foreach($this->data as $k => $v){
                            $dbi['DashboardsItem'][$k] = $v;
                        }
                        
			if ($this->DashboardsItem->save($dbi)) {
				echo "OK";
			} else {
				echo "ERROR";
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for dashboards item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DashboardsItem->delete($id)) {
			$this->Session->setFlash(__('Dashboards item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Dashboards item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
