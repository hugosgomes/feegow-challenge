<?php 

class Agendamento{

	private $specialty_id;
	private $professional_id;
	private $name;
    private $cpf;
    private $source_id;
    private $birthdate;

	public function getSpecialty_id(){
		return $this->specialty_id;
	}

	public function setSpecialty_id($value){
		$this->specialty_id = $value;
	}

	public function getProfessional_id(){
		return $this->professional_id;
	}

	public function setProfessional_id($value){
		$this->professional_id = $value;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($value){
		$this->name = $value;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($value){
		$this->cpf = str_replace('-','',str_replace('.','',$value));
    }
    
    public function getSource_id(){
		return $this->source_id;
	}

	public function setSource_id($value){
		$this->source_id = $value;
    }
    
    public function getBirthdate(){
		return $this->birthdate;
	}

	public function setBirthdate($value){
        $this->birthdate = $value->format('Y-m-d H:i:s');
	}


	public function setData($data){
		$this->setSpecialty_id($data['specialty_id']);
		$this->setProfessional_id($data['professional_id']);
		$this->setName($data['name']);
        $this->setCpf($data['cpf']);
        $this->setSource_id($data['source_id']);
        $this->setBirthdate(new DateTime($data['birthdate']));
	}


	public function insert(){

		$sql = new Sql();

        return $sql->query("INSERT INTO agendamento (specialty_id, professional_id, name, cpf, source_id, birthdate)
            VALUES(:SPECIALITYID, :PROFESSIONALID, :NAME, :CPF, :SOURCEID, :BIRTHDATE)",array(
			":SPECIALITYID" => $this->getSpecialty_id(),
			":PROFESSIONALID" => $this->getProfessional_id(),
            ":NAME" => $this->getName(),
            ":CPF" => $this->getCpf(),
            ":SOURCEID" => $this->getSource_id(),
            ":BIRTHDATE" => $this->getBirthdate()
		));
    }

}

 ?>