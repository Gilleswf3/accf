<?php

namespace Model\Propel\Map;

use Model\Propel\Customers;
use Model\Propel\CustomersQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'customers' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CustomersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Propel.Map.CustomersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'customers';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Propel\\Customers';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Propel.Customers';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id_customer field
     */
    const COL_ID_CUSTOMER = 'customers.id_customer';

    /**
     * the column name for the firstname field
     */
    const COL_FIRSTNAME = 'customers.firstname';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'customers.lastname';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'customers.email';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'customers.phone';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'customers.password';

    /**
     * the column name for the job field
     */
    const COL_JOB = 'customers.job';

    /**
     * the column name for the company field
     */
    const COL_COMPANY = 'customers.company';

    /**
     * the column name for the billto_address field
     */
    const COL_BILLTO_ADDRESS = 'customers.billto_address';

    /**
     * the column name for the billto_zipcode field
     */
    const COL_BILLTO_ZIPCODE = 'customers.billto_zipcode';

    /**
     * the column name for the billto_city field
     */
    const COL_BILLTO_CITY = 'customers.billto_city';

    /**
     * the column name for the shipto_address field
     */
    const COL_SHIPTO_ADDRESS = 'customers.shipto_address';

    /**
     * the column name for the shipto_zipcode field
     */
    const COL_SHIPTO_ZIPCODE = 'customers.shipto_zipcode';

    /**
     * the column name for the shipto_city field
     */
    const COL_SHIPTO_CITY = 'customers.shipto_city';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdCustomer', 'Firstname', 'Name', 'Email', 'Phone', 'Password', 'Job', 'Company', 'BilltoAddress', 'BilltoZipcode', 'BilltoCity', 'ShiptoAddress', 'ShiptoZipcode', 'ShiptoCity', ),
        self::TYPE_CAMELNAME     => array('idCustomer', 'firstname', 'name', 'email', 'phone', 'password', 'job', 'company', 'billtoAddress', 'billtoZipcode', 'billtoCity', 'shiptoAddress', 'shiptoZipcode', 'shiptoCity', ),
        self::TYPE_COLNAME       => array(CustomersTableMap::COL_ID_CUSTOMER, CustomersTableMap::COL_FIRSTNAME, CustomersTableMap::COL_NAME, CustomersTableMap::COL_EMAIL, CustomersTableMap::COL_PHONE, CustomersTableMap::COL_PASSWORD, CustomersTableMap::COL_JOB, CustomersTableMap::COL_COMPANY, CustomersTableMap::COL_BILLTO_ADDRESS, CustomersTableMap::COL_BILLTO_ZIPCODE, CustomersTableMap::COL_BILLTO_CITY, CustomersTableMap::COL_SHIPTO_ADDRESS, CustomersTableMap::COL_SHIPTO_ZIPCODE, CustomersTableMap::COL_SHIPTO_CITY, ),
        self::TYPE_FIELDNAME     => array('id_customer', 'firstname', 'name', 'email', 'phone', 'password', 'job', 'company', 'billto_address', 'billto_zipcode', 'billto_city', 'shipto_address', 'shipto_zipcode', 'shipto_city', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdCustomer' => 0, 'Firstname' => 1, 'Name' => 2, 'Email' => 3, 'Phone' => 4, 'Password' => 5, 'Job' => 6, 'Company' => 7, 'BilltoAddress' => 8, 'BilltoZipcode' => 9, 'BilltoCity' => 10, 'ShiptoAddress' => 11, 'ShiptoZipcode' => 12, 'ShiptoCity' => 13, ),
        self::TYPE_CAMELNAME     => array('idCustomer' => 0, 'firstname' => 1, 'name' => 2, 'email' => 3, 'phone' => 4, 'password' => 5, 'job' => 6, 'company' => 7, 'billtoAddress' => 8, 'billtoZipcode' => 9, 'billtoCity' => 10, 'shiptoAddress' => 11, 'shiptoZipcode' => 12, 'shiptoCity' => 13, ),
        self::TYPE_COLNAME       => array(CustomersTableMap::COL_ID_CUSTOMER => 0, CustomersTableMap::COL_FIRSTNAME => 1, CustomersTableMap::COL_NAME => 2, CustomersTableMap::COL_EMAIL => 3, CustomersTableMap::COL_PHONE => 4, CustomersTableMap::COL_PASSWORD => 5, CustomersTableMap::COL_JOB => 6, CustomersTableMap::COL_COMPANY => 7, CustomersTableMap::COL_BILLTO_ADDRESS => 8, CustomersTableMap::COL_BILLTO_ZIPCODE => 9, CustomersTableMap::COL_BILLTO_CITY => 10, CustomersTableMap::COL_SHIPTO_ADDRESS => 11, CustomersTableMap::COL_SHIPTO_ZIPCODE => 12, CustomersTableMap::COL_SHIPTO_CITY => 13, ),
        self::TYPE_FIELDNAME     => array('id_customer' => 0, 'firstname' => 1, 'name' => 2, 'email' => 3, 'phone' => 4, 'password' => 5, 'job' => 6, 'company' => 7, 'billto_address' => 8, 'billto_zipcode' => 9, 'billto_city' => 10, 'shipto_address' => 11, 'shipto_zipcode' => 12, 'shipto_city' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('customers');
        $this->setPhpName('Customers');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Propel\\Customers');
        $this->setPackage('Model.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_customer', 'IdCustomer', 'INTEGER', true, 8, null);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', true, 255, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 255, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('job', 'Job', 'VARCHAR', true, 255, null);
        $this->addColumn('company', 'Company', 'VARCHAR', true, 255, null);
        $this->addColumn('billto_address', 'BilltoAddress', 'VARCHAR', true, 255, null);
        $this->addColumn('billto_zipcode', 'BilltoZipcode', 'VARCHAR', true, 255, null);
        $this->addColumn('billto_city', 'BilltoCity', 'VARCHAR', true, 255, null);
        $this->addColumn('shipto_address', 'ShiptoAddress', 'VARCHAR', true, 255, null);
        $this->addColumn('shipto_zipcode', 'ShiptoZipcode', 'VARCHAR', true, 255, null);
        $this->addColumn('shipto_city', 'ShiptoCity', 'VARCHAR', true, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Orders', '\\Model\\Propel\\Orders', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_customer',
    1 => ':id_customer',
  ),
), null, null, 'Orderss', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CustomersTableMap::CLASS_DEFAULT : CustomersTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Customers object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CustomersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CustomersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CustomersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CustomersTableMap::OM_CLASS;
            /** @var Customers $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CustomersTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CustomersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CustomersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Customers $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CustomersTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CustomersTableMap::COL_ID_CUSTOMER);
            $criteria->addSelectColumn(CustomersTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(CustomersTableMap::COL_NAME);
            $criteria->addSelectColumn(CustomersTableMap::COL_EMAIL);
            $criteria->addSelectColumn(CustomersTableMap::COL_PHONE);
            $criteria->addSelectColumn(CustomersTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(CustomersTableMap::COL_JOB);
            $criteria->addSelectColumn(CustomersTableMap::COL_COMPANY);
            $criteria->addSelectColumn(CustomersTableMap::COL_BILLTO_ADDRESS);
            $criteria->addSelectColumn(CustomersTableMap::COL_BILLTO_ZIPCODE);
            $criteria->addSelectColumn(CustomersTableMap::COL_BILLTO_CITY);
            $criteria->addSelectColumn(CustomersTableMap::COL_SHIPTO_ADDRESS);
            $criteria->addSelectColumn(CustomersTableMap::COL_SHIPTO_ZIPCODE);
            $criteria->addSelectColumn(CustomersTableMap::COL_SHIPTO_CITY);
        } else {
            $criteria->addSelectColumn($alias . '.id_customer');
            $criteria->addSelectColumn($alias . '.firstname');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.job');
            $criteria->addSelectColumn($alias . '.company');
            $criteria->addSelectColumn($alias . '.billto_address');
            $criteria->addSelectColumn($alias . '.billto_zipcode');
            $criteria->addSelectColumn($alias . '.billto_city');
            $criteria->addSelectColumn($alias . '.shipto_address');
            $criteria->addSelectColumn($alias . '.shipto_zipcode');
            $criteria->addSelectColumn($alias . '.shipto_city');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CustomersTableMap::DATABASE_NAME)->getTable(CustomersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CustomersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CustomersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CustomersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Customers or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Customers object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Propel\Customers) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CustomersTableMap::DATABASE_NAME);
            $criteria->add(CustomersTableMap::COL_ID_CUSTOMER, (array) $values, Criteria::IN);
        }

        $query = CustomersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CustomersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CustomersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the customers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CustomersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Customers or Criteria object.
     *
     * @param mixed               $criteria Criteria or Customers object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Customers object
        }

        if ($criteria->containsKey(CustomersTableMap::COL_ID_CUSTOMER) && $criteria->keyContainsValue(CustomersTableMap::COL_ID_CUSTOMER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CustomersTableMap::COL_ID_CUSTOMER.')');
        }


        // Set the correct dbName
        $query = CustomersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CustomersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CustomersTableMap::buildTableMap();
