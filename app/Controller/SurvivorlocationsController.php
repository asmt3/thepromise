<?php
App::uses('AppController', 'Controller');
/**
 * Survivorlocations Controller
 *
 * @property Survivorlocation $Survivorlocation
 * @property PaginatorComponent $Paginator
 */
class SurvivorlocationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Survivorlocation->recursive = 0;
		$this->set('survivorlocations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Survivorlocation->exists($id)) {
			throw new NotFoundException(__('Invalid survivorlocation'));
		}
		$options = array('conditions' => array('Survivorlocation.' . $this->Survivorlocation->primaryKey => $id));
		$this->set('survivorlocation', $this->Survivorlocation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Survivorlocation->create();
			if ($this->Survivorlocation->save($this->request->data)) {
				$this->Session->setFlash(__('The survivorlocation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survivorlocation could not be saved. Please, try again.'));
			}
		}
		$investigations = $this->Survivorlocation->Investigation->find('list');
		$this->set(compact('investigations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Survivorlocation->exists($id)) {
			throw new NotFoundException(__('Invalid survivorlocation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Survivorlocation->save($this->request->data)) {
				$this->Session->setFlash(__('The survivorlocation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survivorlocation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Survivorlocation.' . $this->Survivorlocation->primaryKey => $id));
			$this->request->data = $this->Survivorlocation->find('first', $options);
		}
		$investigations = $this->Survivorlocation->Investigation->find('list');
		$this->set(compact('investigations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Survivorlocation->id = $id;
		if (!$this->Survivorlocation->exists()) {
			throw new NotFoundException(__('Invalid survivorlocation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Survivorlocation->delete()) {
			$this->Session->setFlash(__('The survivorlocation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The survivorlocation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function record() {
		$this->layout = 'ajax';
		$investigation_id = $this->request->data('investigation_id');
		$lat = $this->request->data('lat');
		$lng = $this->request->data('lng');

		$survivorlocation = $this->Survivorlocation->record($investigation_id, $lat, $lng);

		$this->set(compact('survivorlocation'));
	}
}
