<?php

namespace App\Presenters;
use App\Model\FormatsManager;


final class HomepagePresenter extends BasePresenter
{
	
	public function renderDefault()
	{
		$this->template->relativePath =''; 
		$this->template->formats = $this->database->table('formatsType');
		$this->template->basicInfo = $this->database->table('basicInfo')->fetch();
	}

	
}
