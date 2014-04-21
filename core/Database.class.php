<?php  

class Database {

private static function connectdb($db){
	$dbh = new PDO($db['driver'].":host=".$db['host'].";dbname=".$db['database'],$db['username'],$db['password']);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
	}	


public static function  get($dbparams,$params,$table,$condition=null,$data=null){
	$dbconn=Database::connectdb($dbparams);
	$sth=$dbconn->prepare("SELECT ".$params." FROM ".$table." ".$condition);
	$sth->execute($data);
	if(count($sth)>0){$row=$sth->fetchAll(PDO::FETCH_ASSOC);$row=self::arraychange($row);return $row;}
	else{return false;}
	}

public static function  insert($dbparams,$table,$arr){
	$dbconn=Database::connectdb($dbparams);
	$bind = ':'.implode(',:', array_keys($arr));
  	$sql  = 'insert into '.$table.'('.implode(',', array_keys($arr)).') '.'values ('.$bind.')';
  	$stmt = $dbconn->prepare($sql);
  	$stmt->execute(array_combine(explode(',',$bind), array_values($arr)));
  	if($stmt){return true;} else{return false;}
	}
	
public static function update($dbparams,$table,$field,$value,$where){
	$dbconn=Database::connectdb($dbparams);
	$sth=$dbconn->prepare("Update ".$table." SET ".$field." = :".$field." Where ".$where[0]." ".$where[1]."'".$where[2]."'");
	$sth->execute(array($field=>$value));
	if($sth){return true;}else{return false;}
	}	
	
public static function delete($dbparams,$table,$condition,$value){
	$dbconn=Database::connectdb($dbparams);
	$sth=$dbconn->prepare("DELETE FROM ".$table." ".$condition );
	$sth->execute($value);
	if($sth->rowCount()!=0){return true;}
	else{return false;}
	
	
	}
private static function arraychange($row){
	$columntitle=array();
		foreach ($row as $key=>$value){
			foreach ($value as $key1 => $value1){
					if(empty($columntitle)or !array_key_exists($key1, $columntitle)){$columntitle[$key1][0]=$value1;}
					else{$i=count($columntitle[$key1]);$columntitle[$key1][$i]=$value1;}
				}
			}
	return $columntitle;
	}	
	
	
	}