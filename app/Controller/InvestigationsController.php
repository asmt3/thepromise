<?php
App::uses('AppController', 'Controller');
/**
 * Investigations Controller
 *
 * @property Investigation $Investigation
 * @property PaginatorComponent $Paginator
 */
class InvestigationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $paginate = array(
		'contain' => array('Message'),
		'conditions' => array('Investigation.status' => array(
			'open',
			'followup'
		)),
        'order' => array(
            'Investigation.id' => 'DESC'
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Investigation->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('investigations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Investigation->exists($id)) {
			throw new NotFoundException(__('Invalid investigation'));
		}
		$options = array('conditions' => array('Investigation.' . $this->Investigation->primaryKey => $id));
		$this->set('investigation', $this->Investigation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Investigation->create();
			if ($this->Investigation->save($this->request->data)) {
				$this->Session->setFlash(__('The investigation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The investigation could not be saved. Please, try again.'));
			}
		}
		$agencies = $this->Investigation->Agency->find('list');
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
		if (!$this->Investigation->exists($id)) {
			throw new NotFoundException(__('Invalid investigation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Investigation->save($this->request->data)) {
				$this->Session->setFlash(__('The investigation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The investigation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Investigation.' . $this->Investigation->primaryKey => $id));
			$this->request->data = $this->Investigation->find('first', $options);
		}
		$agencies = $this->Investigation->Agency->find('list');
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
		$this->Investigation->id = $id;
		if (!$this->Investigation->exists()) {
			throw new NotFoundException(__('Invalid investigation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Investigation->delete()) {
			$this->Session->setFlash(__('The investigation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The investigation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
