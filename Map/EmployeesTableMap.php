<?php

namespace Map;

use \Employees;
use \EmployeesQuery;
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
 * This class defines the structure of the 'employees' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EmployeesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EmployeesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'employees';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Employees';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Employees';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id_employee field
     */
    const COL_ID_EMPLOYEE = 'employees.id_employee';

    /**
     * the column name for the firstname field
     */
    const COL_FIRSTNAME = 'employees.firstname';

    /**
     * the column name for the lastname field
     */
    const COL_LASTNAME = 'employees.lastname';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'employees.email';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'employees.phone';

    /**
     * the column name for the job field
     */
    const COL_JOB = 'employees.job';

    /**
     * the column name for the picture field
     */
    const COL_PICTURE = 'employees.picture';

    /**
     * the column name for the role field
     */
    const COL_ROLE = 'employees.role';

    /**
     * the column name for the id_agency field
     */
    const COL_ID_AGENCY = 'employees.id_agency';

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
        self::TYPE_PHPNAME       => array('IdEmployee', 'Firstname', 'Lastname', 'Email', 'Phone', 'Job', 'Picture', 'Role', 'IdAgency', ),
        self::TYPE_CAMELNAME     => array('idEmployee', 'firstname', 'lastname', 'email', 'phone', 'job', 'picture', 'role', 'idAgency', ),
        self::TYPE_COLNAME       => array(EmployeesTableMap::COL_ID_EMPLOYEE, EmployeesTableMap::COL_FIRSTNAME, EmployeesTableMap::COL_LASTNAME, EmployeesTableMap::COL_EMAIL, EmployeesTableMap::COL_PHONE, EmployeesTableMap::COL_JOB, EmployeesTableMap::COL_PICTURE, EmployeesTableMap::COL_ROLE, EmployeesTableMap::COL_ID_AGENCY, ),
        self::TYPE_FIELDNAME     => array('id_employee', 'firstname', 'lastname', 'email', 'phone', 'job', 'picture', 'role', 'id_agency', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdEmployee' => 0, 'Firstname' => 1, 'Lastname' => 2, 'Email' => 3, 'Phone' => 4, 'Job' => 5, 'Picture' => 6, 'Role' => 7, 'IdAgency' => 8, ),
        self::TYPE_CAMELNAME     => array('idEmployee' => 0, 'firstname' => 1, 'lastname' => 2, 'email' => 3, 'phone' => 4, 'job' => 5, 'picture' => 6, 'role' => 7, 'idAgency' => 8, ),
        self::TYPE_COLNAME       => array(EmployeesTableMap::COL_ID_EMPLOYEE => 0, EmployeesTableMap::COL_FIRSTNAME => 1, EmployeesTableMap::COL_LASTNAME => 2, EmployeesTableMap::COL_EMAIL => 3, EmployeesTableMap::COL_PHONE => 4, EmployeesTableMap::COL_JOB => 5, EmployeesTableMap::COL_PICTURE => 6, EmployeesTableMap::COL_ROLE => 7, EmployeesTableMap::COL_ID_AGENCY => 8, ),
        self::TYPE_FIELDNAME     => array('id_employee' => 0, 'firstname' => 1, 'lastname' => 2, 'email' => 3, 'phone' => 4, 'job' => 5, 'picture' => 6, 'role' => 7, 'id_agency' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('employees');
        $this->setPhpName('Employees');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Employees');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_employee', 'IdEmployee', 'INTEGER', true, 8, null);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', true, 255, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', true, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 255, null);
        $this->addColumn('job', 'Job', 'VARCHAR', true, 255, null);
        $this->addColumn('picture', 'Picture', 'VARCHAR', true, 255, null);
        $this->addColumn('role', 'Role', 'VARCHAR', true, 255, null);
        $this->addForeignKey('id_agency', 'IdAgency', 'INTEGER', 'agencies', 'id_agency', true, 8, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Agencies', '\\Agencies', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_agency',
    1 => ':id_agency',
  ),
), null, null, null, false);
        $this->addRelation('Hotline', '\\Hotline', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_employee',
    1 => ':id_employee',
  ),
), null, null, 'Hotlines', false);
        $this->addRelation('Standards', '\\Standards', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_employee',
    1 => ':id_employee',
  ),
), null, null, 'Standardss', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEmployee', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEmployee', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEmployee', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEmployee', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEmployee', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEmployee', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdEmployee', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EmployeesTableMap::CLASS_DEFAULT : EmployeesTableMap::OM_CLASS;
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
     * @return array           (Employees object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EmployeesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EmployeesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EmployeesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EmployeesTableMap::OM_CLASS;
            /** @var Employees $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EmployeesTableMap::addInstanceToPool($obj, $key);
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
            $key = EmployeesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EmployeesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Employees $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EmployeesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EmployeesTableMap::COL_ID_EMPLOYEE);
            $criteria->addSelectColumn(EmployeesTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(EmployeesTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(EmployeesTableMap::COL_EMAIL);
            $criteria->addSelectColumn(EmployeesTableMap::COL_PHONE);
            $criteria->addSelectColumn(EmployeesTableMap::COL_JOB);
            $criteria->addSelectColumn(EmployeesTableMap::COL_PICTURE);
            $criteria->addSelectColumn(EmployeesTableMap::COL_ROLE);
            $criteria->addSelectColumn(EmployeesTableMap::COL_ID_AGENCY);
        } else {
            $criteria->addSelectColumn($alias . '.id_employee');
            $criteria->addSelectColumn($alias . '.firstname');
            $criteria->addSelectColumn($alias . '.lastname');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.job');
            $criteria->addSelectColumn($alias . '.picture');
            $criteria->addSelectColumn($alias . '.role');
            $criteria->addSelectColumn($alias . '.id_agency');
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
        return Propel::getServiceContainer()->getDatabaseMap(EmployeesTableMap::DATABASE_NAME)->getTable(EmployeesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EmployeesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EmployeesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EmployeesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Employees or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Employees object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Employees) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EmployeesTableMap::DATABASE_NAME);
            $criteria->add(EmployeesTableMap::COL_ID_EMPLOYEE, (array) $values, Criteria::IN);
        }

        $query = EmployeesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EmployeesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EmployeesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the employees table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EmployeesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Employees or Criteria object.
     *
     * @param mixed               $criteria Criteria or Employees object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Employees object
        }

        if ($criteria->containsKey(EmployeesTableMap::COL_ID_EMPLOYEE) && $criteria->keyContainsValue(EmployeesTableMap::COL_ID_EMPLOYEE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EmployeesTableMap::COL_ID_EMPLOYEE.')');
        }


        // Set the correct dbName
        $query = EmployeesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EmployeesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EmployeesTableMap::buildTableMap();
