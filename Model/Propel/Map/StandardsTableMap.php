<?php

namespace Model\Propel\Map;

use Model\Propel\Standards;
use Model\Propel\StandardsQuery;
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
 * This class defines the structure of the 'standards' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class StandardsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Propel.Map.StandardsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'standards';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Propel\\Standards';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Propel.Standards';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id_standard field
     */
    const COL_ID_STANDARD = 'standards.id_standard';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'standards.title';

    /**
     * the column name for the subtitle field
     */
    const COL_SUBTITLE = 'standards.subtitle';

    /**
     * the column name for the picture field
     */
    const COL_PICTURE = 'standards.picture';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'standards.description';

    /**
     * the column name for the id_employee field
     */
    const COL_ID_EMPLOYEE = 'standards.id_employee';

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
        self::TYPE_PHPNAME       => array('IdStandard', 'Title', 'Subtitle', 'Picture', 'Description', 'IdEmployee', ),
        self::TYPE_CAMELNAME     => array('idStandard', 'title', 'subtitle', 'picture', 'description', 'idEmployee', ),
        self::TYPE_COLNAME       => array(StandardsTableMap::COL_ID_STANDARD, StandardsTableMap::COL_TITLE, StandardsTableMap::COL_SUBTITLE, StandardsTableMap::COL_PICTURE, StandardsTableMap::COL_DESCRIPTION, StandardsTableMap::COL_ID_EMPLOYEE, ),
        self::TYPE_FIELDNAME     => array('id_standard', 'title', 'subtitle', 'picture', 'description', 'id_employee', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdStandard' => 0, 'Title' => 1, 'Subtitle' => 2, 'Picture' => 3, 'Description' => 4, 'IdEmployee' => 5, ),
        self::TYPE_CAMELNAME     => array('idStandard' => 0, 'title' => 1, 'subtitle' => 2, 'picture' => 3, 'description' => 4, 'idEmployee' => 5, ),
        self::TYPE_COLNAME       => array(StandardsTableMap::COL_ID_STANDARD => 0, StandardsTableMap::COL_TITLE => 1, StandardsTableMap::COL_SUBTITLE => 2, StandardsTableMap::COL_PICTURE => 3, StandardsTableMap::COL_DESCRIPTION => 4, StandardsTableMap::COL_ID_EMPLOYEE => 5, ),
        self::TYPE_FIELDNAME     => array('id_standard' => 0, 'title' => 1, 'subtitle' => 2, 'picture' => 3, 'description' => 4, 'id_employee' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('standards');
        $this->setPhpName('Standards');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Propel\\Standards');
        $this->setPackage('Model.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_standard', 'IdStandard', 'INTEGER', true, 8, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('subtitle', 'Subtitle', 'VARCHAR', true, 255, null);
        $this->addColumn('picture', 'Picture', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('id_employee', 'IdEmployee', 'INTEGER', 'employees', 'id_employee', true, 8, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdStandard', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdStandard', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdStandard', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdStandard', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdStandard', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdStandard', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdStandard', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? StandardsTableMap::CLASS_DEFAULT : StandardsTableMap::OM_CLASS;
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
     * @return array           (Standards object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = StandardsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = StandardsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + StandardsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = StandardsTableMap::OM_CLASS;
            /** @var Standards $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            StandardsTableMap::addInstanceToPool($obj, $key);
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
            $key = StandardsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = StandardsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Standards $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                StandardsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(StandardsTableMap::COL_ID_STANDARD);
            $criteria->addSelectColumn(StandardsTableMap::COL_TITLE);
            $criteria->addSelectColumn(StandardsTableMap::COL_SUBTITLE);
            $criteria->addSelectColumn(StandardsTableMap::COL_PICTURE);
            $criteria->addSelectColumn(StandardsTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(StandardsTableMap::COL_ID_EMPLOYEE);
        } else {
            $criteria->addSelectColumn($alias . '.id_standard');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.subtitle');
            $criteria->addSelectColumn($alias . '.picture');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.id_employee');
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
        return Propel::getServiceContainer()->getDatabaseMap(StandardsTableMap::DATABASE_NAME)->getTable(StandardsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(StandardsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(StandardsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new StandardsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Standards or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Standards object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(StandardsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Propel\Standards) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(StandardsTableMap::DATABASE_NAME);
            $criteria->add(StandardsTableMap::COL_ID_STANDARD, (array) $values, Criteria::IN);
        }

        $query = StandardsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            StandardsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                StandardsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the standards table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return StandardsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Standards or Criteria object.
     *
     * @param mixed               $criteria Criteria or Standards object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StandardsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Standards object
        }

        if ($criteria->containsKey(StandardsTableMap::COL_ID_STANDARD) && $criteria->keyContainsValue(StandardsTableMap::COL_ID_STANDARD) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.StandardsTableMap::COL_ID_STANDARD.')');
        }


        // Set the correct dbName
        $query = StandardsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // StandardsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
StandardsTableMap::buildTableMap();
