<?php
App::uses('AppController', 'Controller');
/**
 * Shelters Controller
 *
 * @property Shelter $Shelter
 * @property PaginatorComponent $Paginator
 */
class SheltersController extends AppController {

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
		$this->Shelter->recursive = 0;
		$this->set('shelters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Shelter->exists($id)) {
			throw new NotFoundException(__('Invalid shelter'));
		}
		$options = array('conditions' => array('Shelter.' . $this->Shelter->primaryKey => $id));
		$this->set('shelter', $this->Shelter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Shelter->create();
			if ($this->Shelter->save($this->request->data)) {
				$this->Session->setFlash(__('The shelter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shelter could not be saved. Please, try again.'));
			}
		}
		$agencies = $this->Shelter->Agency->find('list');
		$this->set(compact('agencies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Shelter->exists($id)) {
			throw new NotFoundException(__('Invalid shelter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Shelter->save($this->request->data)) {
				$this->Session->setFlash(__('The shelter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shelter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Shelter.' . $this->Shelter->primaryKey => $id));
			$this->request->data = $this->Shelter->find('first', $options);
		}
		$agencies = $this->Shelter->Agency->find('list');
		$this->set(compact('agencies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Shelter->id = $id;
		if (!$this->Shelter->exists()) {
			throw new NotFoundException(__('Invalid shelter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Shelter->delete()) {
			$this->Session->setFlash(__('The shelter has been deleted.'));
		} else {
			$this->Session->setFlash(__('The shelter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function search($lat, $lng) {

		$this->layout = 'ajax';

		$shelters = $this->Shelter->search($lat, $lng);

		$this->set(compact('shelters'));
	}
}
