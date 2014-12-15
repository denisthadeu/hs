<?php

class SQLUtils {

	protected $sqlFilePath = "migrations/sql/";
	
	public function executeFile($sqlFile) {
		
		$file = $this->sqlFilePath . $sqlFile;
		
			if (file_exists($file)) {			    
				Yii::app()->db->createCommand(file_get_contents($file))->execute();
			}
	}
	
	public function executeDelimitedFile($sqlFile, $delimiter) {
		
		$file = $this->sqlFilePath . $sqlFile;
		
			if (file_exists($file)) {			    
				$this->executeDelimitedSql(file_get_contents($file), $delimiter);
			}
	}
	
	public function executeDelimitedSql($delimitedSql, $delimiter) {
	
		$sql = explode($delimiter, $delimitedSql);	

		foreach($sql as $i => $sqlcmd) {
			$sqlcmd = trim($sqlcmd);
			if ((strpos($sqlcmd, 'DELIMITER') === false || strpos($sqlcmd, 'DELIMITER') > 5 ) && strlen($sqlcmd) > 0) {
				Yii::app()->db->createCommand($sqlcmd)->execute();
			}
		}
	}		
}