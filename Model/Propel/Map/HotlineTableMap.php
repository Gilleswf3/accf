<?php

namespace Model\Propel\Map;

use Model\Propel\Hotline;
use Model\Propel\HotlineQuery;
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
 * This class defines the structure of the 'hotline' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HotlineTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Propel.Map.HotlineTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hotline';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Propel\\Hotline';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Propel.Hotline';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the id_hotline field
     */
    const COL_ID_HOTLINE = 'hotline.id_hotline';

    /**
     * the column name for the hotline_message field
     */
    const COL_HOTLINE_MESSAGE = 'hotline.hotline_message';

    /**
     * the column name for the id_customer field
     */
    const COL_ID_CUSTOMER = 'hotline.id_customer';

    /**
     * the column name for the id_employee field
     */
    const COL_ID_EMPLOYEE = 'hotline.id_employee';

    /**
     * the column name for the type_author field
     */
    const COL_TYPE_AUTHOR = 'hotline.type_author';

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
        self::TYPE_PHPNAME       => array('IdHotline', 'HotlineMessage', 'IdCustomer', 'IdEmployee', 'TypeAuthor', ),
        self::TYPE_CAMELNAME     => array('idHotline', 'hotlineMessage', 'idCustomer', 'idEmployee', 'typeAuthor', ),
        self::TYPE_COLNAME       => array(HotlineTableMap::COL_ID_HOTLINE, HotlineTableMap::COL_HOTLINE_MESSAGE, HotlineTableMap::COL_ID_CUSTOMER, HotlineTableMap::COL_ID_EMPLOYEE, HotlineTableMap::COL_TYPE_AUTHOR, ),
        self::TYPE_FIELDNAME     => array('id_hotline', 'hotline_message', 'id_customer', 'id_employee', 'type_author', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdHotline' => 0, 'HotlineMessage' => 1, 'IdCustomer' => 2, 'IdEmployee' => 3, 'TypeAuthor' => 4, ),
        self::TYPE_CAMELNAME     => array('idHotline' => 0, 'hotlineMessage' => 1, 'idCustomer' => 2, 'idEmployee' => 3, 'typeAuthor' => 4, ),
        self::TYPE_COLNAME       => array(HotlineTableMap::COL_ID_HOTLINE => 0, HotlineTableMap::COL_HOTLINE_MESSAGE => 1, HotlineTableMap::COL_ID_CUSTOMER => 2, HotlineTableMap::COL_ID_EMPLOYEE => 3, HotlineTableMap::COL_TYPE_AUTHOR => 4, ),
        self::TYPE_FIELDNAME     => array('id_hotline' => 0, 'hotline_message' => 1, 'id_customer' => 2, 'id_employee' => 3, 'type_author' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('hotline');
        $this->setPhpName('Hotline');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Propel\\Hotline');
        $this->setPackage('Model.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_hotline', 'IdHotline', 'INTEGER', true, null, null);
        $this->addColumn('hotline_message', 'HotlineMessage', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('id_customer', 'IdCustomer', 'INTEGER', 'customers', 'id_customer', true, null, null);
        $this->addForeignKey('id_employee', 'IdEmployee', 'INTEGER', 'employees', 'id_employee', true, null, null);
        $this->addColumn('type_author', 'TypeAuthor', 'CHAR', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Customers', '\\Model\\Propel\\Customers', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_customer',
    1 => ':id_customer',
  ),
), null, null, null, false);
        $this->addRelation('Employees', '\\Model\\Propel\\Employees', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_employee',
    1 => ':id_employee',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdHotline', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdHotline', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdHotline', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdHotline', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdHotline', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdHotline', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdHotline', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HotlineTableMap::CLASS_DEFAULT : HotlineTableMap::OM_CLASS;
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
     * @return array           (Hotline object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HotlineTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HotlineTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HotlineTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HotlineTableMap::OM_CLASS;
            /** @var Hotline $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HotlineTableMap::addInstanceToPool($obj, $key);
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
            $key = HotlineTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HotlineTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Hotline $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HotlineTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HotlineTableMap::COL_ID_HOTLINE);
            $criteria->addSelectColumn(HotlineTableMap::COL_HOTLINE_MESSAGE);
            $criteria->addSelectColumn(HotlineTableMap::COL_ID_CUSTOMER);
            $criteria->addSelectColumn(HotlineTableMap::COL_ID_EMPLOYEE);
            $criteria->addSelectColumn(HotlineTableMap::COL_TYPE_AUTHOR);
        } else {
            $criteria->addSelectColumn($alias . '.id_hotline');
            $criteria->addSelectColumn($alias . '.hotline_message');
            $criteria->addSelectColumn($alias . '.id_customer');
            $criteria->addSelectColumn($alias . '.id_employee');
            $criteria->addSelectColumn($alias . '.type_author');
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
        return Propel::getServiceContainer()->getDatabaseMap(HotlineTableMap::DATABASE_NAME)->getTable(HotlineTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HotlineTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HotlineTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HotlineTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Hotline or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Hotline object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HotlineTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Propel\Hotline) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HotlineTableMap::DATABASE_NAME);
            $criteria->add(HotlineTableMap::COL_ID_HOTLINE, (array) $values, Criteria::IN);
        }

        $query = HotlineQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HotlineTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HotlineTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hotline table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HotlineQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Hotline or Criteria object.
     *
     * @param mixed               $criteria Criteria or Hotline object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HotlineTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Hotline object
        }

        if ($criteria->containsKey(HotlineTableMap::COL_ID_HOTLINE) && $criteria->keyContainsValue(HotlineTableMap::COL_ID_HOTLINE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HotlineTableMap::COL_ID_HOTLINE.')');
        }


        // Set the correct dbName
        $query = HotlineQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HotlineTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HotlineTableMap::buildTableMap();
