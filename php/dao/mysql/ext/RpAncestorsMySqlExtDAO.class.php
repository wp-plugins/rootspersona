<?php

class RpAncestorsMySqlExtDAO {

	public function getAncestors($persona, $options){

		$ancestors = array();
		$ancestors[1] = $persona;
		$ancestors[2] = DAOFactory::getRpPersonaDAO()->getPersona($persona->father, $persona->batchId);
		$ancestors[3] = DAOFactory::getRpPersonaDAO()->getPersona($persona->mother, $persona->batchId);
		if($ancestors[2] != null) {
			$ancestors[4] = DAOFactory::getRpPersonaDAO()->getPersona($ancestors[2]->father, $persona->batchId);
			$ancestors[5] = DAOFactory::getRpPersonaDAO()->getPersona($ancestors[2]->mother, $persona->batchId);
		}
		if($ancestors[2] != null) {
			$ancestors[6] = DAOFactory::getRpPersonaDAO()->getPersona($ancestors[3]->father, $persona->batchId);
			$ancestors[7] = DAOFactory::getRpPersonaDAO()->getPersona($ancestors[3]->mother, $persona->batchId);
		}

		for($idx =1; $idx <= 7; $idx++) {
			if($ancestors[$idx] == null || $ancestors[$idx]->isPrivate) {
				$ancestors[$idx] = getUnknown($persona,
					($ancestors[$idx]==null?false:$ancestors[$idx]->isPrivate));
			}
		}

		return $ancestors;
	}

	function getUnknown($persona, $isPrivate) {
		$p = new RpSimplePerson();
		$p->id = 0;
		$p->batchId = 0;
		$p->fullName = $isPrivate?'Private':'Unknown';
		$p->birthDate = '';
		$p->deathDate = '';
		$p->isPrivate = false;
		$p->page = $person->page;
	}
}
?>