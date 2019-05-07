<?php
namespace Database;

use PDO;

/**
 * Class Connection
 * @package Database
 */
class Connection{
    /**
     * Recebe o Caminho do Arquivo .ini
     */
    const INIFILE=__DIR__."/database.ini";
    /**
     * Recebe as Informações do Arquivo .ini
     * @var array
     */
    private $iniData;
    /**
     * Construtor da classe Connection
     */
    public function __construct(){
        $this->iniData=parse_ini_file(self::INIFILE);
    }
    /**
     * Faz a Coneção com o Banco de Dados
     * @return PDO
     */
    public function connection(){
        $pdo=new PDO($this->iniData['driver'].":host=".$this->iniData['host'].";dbname=".$this->iniData['database'].";charset=".$this->iniData['charset'],$this->iniData['username'],$this->iniData['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        return $pdo;
    }
}