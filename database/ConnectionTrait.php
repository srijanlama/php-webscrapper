<?php
namespace database\PdoCrud;

/**
 * Class provides simple CRUD operations
 */
trait ConnectionTrait
{
    /**
     * Connection to DB.
     */
    protected $crud = false;
    
    /**
     * Method validates dsn fields
     *
     * @param string $connectionName
     *            Connectio name
     */
    protected function validateDsn(string $connectionName)
    {
        if (\Mezon\Conf\Conf::getConfigValue($connectionName . '/dsn') === false) {
            throw (new \Exception($connectionName . '/dsn not set'));
        }
        
        if (\Mezon\Conf\Conf::getConfigValue($connectionName . '/user') === false) {
            throw (new \Exception($connectionName . '/user not set'));
        }
        
        if (\Mezon\Conf\Conf::getConfigValue($connectionName . '/password') === false) {
            throw (new \Exception($connectionName . '/password not set'));
        }
    }
    
    /**
     * Contructing connection to database object
     *
     * @return \Mezon\PdoCrud\PdoCrud connection object wich is no initialized
     * @codeCoverageIgnore
     */
    protected function constructConnection(): \Mezon\PdoCrud\PdoCrud
    {
        return new \Mezon\PdoCrud\PdoCrud();
    }
    
    /**
     * Method returns database connection
     *
     * @param string $connectionName
     *            Connectio name
     */
    public function getConnection(string $connectionName = 'default-db-connection')
    {
        if ($this->crud !== false) {
            return $this->crud;
        }

        $this->validateDsn($connectionName);

        $this->crud = $this->constructConnection();

        $this->crud->connect(
            [
                'dsn' => \Mezon\Conf\Conf::getConfigValue($connectionName . '/dsn'),
                'user' => \Mezon\Conf\Conf::getConfigValue($connectionName . '/user'),
                'password' => \Mezon\Conf\Conf::getConfigValue($connectionName . '/password')
            ]);

        return $this->crud;
    }
}
