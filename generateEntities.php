<?php
require_once 'init.php';
$directoryName = 'Entity';
if (!file_exists(__DIR__."/{directoryName}/")) {
    mkdir(__DIR__."/{directoryName}/", 0777, true);
}
define('FILE_WRITE_PATH', __DIR__.'/Entity/');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$databaseRepository = new EntityGenerator\Database\DatabaseRepository($connection);
	$database 	= filter_input(INPUT_POST,'database');
	$tables 	= explode(',',filter_input(INPUT_POST,'tables'));
	if(empty($databases) == true && isset($tables[0]) && $tables[0] == ''){
		header("Location:index.php?error=Select database and tables");
		return false;
	}
	$connection->exec("USE $database");

	foreach($tables as $table){
		$coloumnNames = $databaseRepository->getColoumnNamesOfTable($table);
		generateEntityClass($table, $coloumnNames, $database);
	}
}else{
	echo 'Error in generating entities.';
}

function generateEntityClass($tableName, $coloumnNames, $database){
	global $directoryName;
	$studlyTableName = EntityGenerator\Helper\HelperFunctions::studlyCaps($tableName);
	
$entityClass = 
"
<?php 
namespace {$directoryName};\n
class {$studlyTableName}{
	
";
	
	foreach($coloumnNames as $coloumnName){
		$entityClass .= "    private \$".EntityGenerator\Helper\HelperFunctions::camelCase($coloumnName['Field']).";\n";
		if($coloumnName['Key'] == 'PRI' || $coloumnName['Key'] == 'PRIMARY'){
			$entityClass .= getGetter($coloumnName['Field']);
			continue;
		}else{
			$entityClass .= getGetter($coloumnName['Field']);
			$entityClass .= getSetter($coloumnName['Field']);
		}
	}
$entityClass .= "}";
	writeFile($database.'/'.$studlyTableName.'.php', $entityClass);
	header("Location:index.php?success=Successfully Generated Entities");
}

function getGetter($coloumnName){
	$studlyColoumnName = EntityGenerator\Helper\HelperFunctions::studlyCaps($coloumnName);
	$camelColoumnName = EntityGenerator\Helper\HelperFunctions::camelCase($coloumnName);
	$getter = 
"
    public function get{$studlyColoumnName}(){
        return \$this->{$camelColoumnName};
    }
\n";
	return $getter;
}

function getSetter($coloumnName){
	$studlyColoumnName = EntityGenerator\Helper\HelperFunctions::studlyCaps($coloumnName);
	$camelColoumnName = EntityGenerator\Helper\HelperFunctions::camelCase($coloumnName);
	$setter = 
"
    public function set{$studlyColoumnName}(\${$camelColoumnName}){
        \$this->{$camelColoumnName} = \${$camelColoumnName};
        return \$this;
    }
\n";
	return $setter;
}

function writeFile($fileName, $content){
	if($fh = fopen(FILE_WRITE_PATH.$fileName,'w+')){
		if(is_writable(FILE_WRITE_PATH.$fileName)){
			fwrite($fh, $content);
		}else{
			exit('Please provide Read and Write permissions for directory');	
		}
	}else{
		exit('Please provide Read and Write permissions for directory');
	}
}