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

	public function agency() {
		$this->Paginator->settings = array(
			'contain' => array('Message'),
			'conditions' => array(
				'Investigation.agency_id' => 1, //TODO
			),
	        'order' => array(
	        	"FIELD(Investigation.status, 'open','followup', 'referred')",
	            'Investigation.id' => 'DESC'
	        )
	    );

	    $max_id = $this->Investigation->getMaxId();
	    $this->set('max_id', $max_id);

		$this->set('investigations', $this->Paginator->paginate());
	}

	public function shelter() {
		$this->Paginator->settings = array(
			'contain' => array('Message'),
			'conditions' => array(
				'Investigation.status' => array('referred'),
				'Investigation.shelter_id' => 1, //TODO
			),
	        'order' => array(
	            'Investigation.id' => 'DESC'
	        )
	    );

		$this->set('investigations', $this->Paginator->paginate());

		$max_id = $this->Investigation->getMaxId();
	    $this->set('max_id', $max_id);
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

		$this->Investigation->Shelter->find('list');
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
				return $this->redirect('/investigations/view/' . $id);
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

	public function poll($since_id) {

		$this->layout = 'ajax';

		$investigations = $this->Investigation->find('all', array('conditions' => array(
			'Investigation.id >' => $since_id
		)));

		$max_id = $this->Investigation->getMaxId();

		$this->set(compact('investigations', 'max_id'));
	}

	
	public function refer($shelter_id, $investigation_id) {

		// $investigation = $this->Investigation->refer($shelter_id, $investigation_id);
		$investigation = $this->Investigation->find('first', array(
			'conditions' => array(
				'Investigation.id' => $investigation_id
			)
		));


		if ($this->request->is('post')) {


			$note = $this->request->data('Investigation.note');

			//$investigation = $this->Investigation->refer($shelter_id, $investigation_id);
			$investigation = $this->Investigation->refer(1, $investigation_id);

			$this->loadModel('Shelter');
			$shelter = $this->Shelter->read(null, $shelter_id);

			if($this->request->data('Investigation.message_shelter')) {
				SendSMS::go($shelter['Shelter']['phone'], $note);
			}

			// create history item
			$this->loadModel('History');
			$this->History->markAsReferred($investigation_id);

			$this->redirect('/investigations/agency');
		}

		$this->set(compact('investigation'));
	}

	public function send_text($investigation_id) {

		$this->layout = 'ajax';

		$number = $this->request->data('number');
		$content = $this->request->data('content');

		SendSMS::go($number, $content);

		$this->loadModel('History');
		$this->History->recordOutboundText($investigation_id, $number, $content);

		$ok = true;

		$this->set(compact('ok'));

	}

	
}
