<?php



class DateTimeI18NBehavior  extends CActiveRecordBehavior
{
	public $dateDbFormat = 'Y-m-d';
	public $dateTimeDbFormat = 'Y-m-d H:i:s';

	public $dateAppFormat = 'd/m/Y';
	public $dateTimeAppFormat = 'd/m/Y H:i:s';

	
	public function beforeSave($event){
		//search for date/datetime columns. Convert it to pure PHP date format
		foreach($event->sender->tableSchema->columns as $columnName => $column){
						
			if (($column->dbType != 'date') and ($column->dbType != 'datetime')) continue;
									
			if (!strlen($event->sender->$columnName)){ 
				$event->sender->$columnName = null;
				continue;
			}

			if (strlen($event->sender->$columnName) <= 10) {  			
				$date = DateTime::createFromFormat($this->dateAppFormat, $event->sender->$columnName);
				if (!$date) {
					$date = DateTime::createFromFormat($this->dateDbFormat, $event->sender->$columnName);
				}
				if ($date) {
                	$event->sender->$columnName = $date->format($this->dateDbFormat);
                }
			
			} else {
				
				$date = DateTime::createFromFormat($this->dateTimeAppFormat, $event->sender->$columnName);
				if (!$date) {
					$date = DateTime::createFromFormat($this->dateTimeDbFormat, $event->sender->$columnName);
				}
				if ($date) {
                	$event->sender->$columnName = $date->format($this->dateTimeDbFormat);
                }
							
			}	
		}
		return true;
	}
	
	
	public function afterFind($event){
					
		foreach($event->sender->tableSchema->columns as $columnName => $column){
						
			if (($column->dbType != 'date') and ($column->dbType != 'datetime')) continue;
			
			if (!strlen($event->sender->$columnName)){ 
				$event->sender->$columnName = null;
				continue;
			}
			
			if (($column->dbType == 'date')) {				
				$date = DateTime::createFromFormat($this->dateDbFormat, $event->sender->$columnName);
				if ($date) {
                	$event->sender->$columnName = $date->format($this->dateAppFormat);
                }
 				
			}else{
				
				$date = DateTime::createFromFormat($this->dateTimeDbFormat, $event->sender->$columnName);
				if ($date) {
                	$event->sender->$columnName = $date->format($this->dateTimeAppFormat);
                }
							
			}	
		}
		return true;
	}

}