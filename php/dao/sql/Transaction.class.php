<?php
/**
 * Database transaction
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class Transaction{
	private static $transactions;

	private $connection;

	public function Transaction($credentials, $isQuery=false){
		$this->connection = new Connection($credentials);
		if(!Transaction::$transactions){
			Transaction::$transactions = new ArrayList();
		}
		Transaction::$transactions->add($this);
		if(!$isQuery)
			$this->connection->executeQuery('BEGIN');
	}

	public function close(){
		$this->connection->close();
		Transaction::$transactions->removeLast();
	}
	/**
	 * Zakonczenie transakcji i zapisanie zmian
	 */
	public function commit(){
		$this->connection->executeQuery('COMMIT');
		$this->connection->close();
		Transaction::$transactions->removeLast();
	}

	/**
	 * Zakonczenie transakcji i wycofanie zmian
	 */
	public function rollback(){
		$this->connection->executeQuery('ROLLBACK');
		$this->connection->close();
		Transaction::$transactions->removeLast();
	}

	/**
	 * Pobranie polaczenia dla obencej transakcji
	 *
	 * @return polazenie do bazy
	 */
	public function getConnection(){
		return $this->connection;
	}

	/**
	 * Zwraca obecna transakcje
	 *
	 * @return transkacja
	 */
	public static function getCurrentTransaction(){
		if(Transaction::$transactions){
			$tran = Transaction::$transactions->getLast();
			return $tran;
		}
		return;
	}
}
?>