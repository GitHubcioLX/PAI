<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 */
class Employee extends AppModel {
	var $validate = array(
						'nazwisko' => array('rule' => 'notBlank'), 
						'etat' => array('rule' => 'notBlank'), 
						'placa_pod' => array(
											'ge0' => array('rule' => array('comparison', '>=', 0), 'message' => 'Wartość płacy nie może być ujemna'),
											'le2000' => array('rule' => array('comparison', '<=', 2000), 'message' => 'Płaca nie może być wyższa niż 2000zł')
										)
					);
}
