<?php

namespace Model\Propel\Map;

use Model\Propel\Orderdetails;
use Model\Propel\OrderdetailsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'orderdetails' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OrderdetailsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Propel.Map.OrderdetailsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'orderdetails';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Propel\\Orderdetails';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Propel.Orderdetails';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id_order_details field
     */
    const COL_ID_ORDER_DETAILS = 'orderdetails.id_order_details';

    /**
     * the column name for the id_order field
     */
    const COL_ID_ORDER = 'orderdetails.id_order';

    /**
     * the column name for the id_product field
     */
    const COL_ID_PRODUCT = 'orderdetails.id_product';

    /**
     * the column name for the product_unit_price field
     */
    const COL_PRODUCT_UNIT_PRICE = 'orderdetails.product_unit_price';

    /**
     * the column name for the product_quantity field
     */
    const COL_PRODUCT_QUANTITY = 'orderdetails.product_quantity';

    /**
     * the column name for the id_service field
     */
    const COL_ID_SERVICE = 'orderdetails.id_service';

    /**
     * the column name for the service_unit_price field
     */
    const COL_SERVICE_UNIT_PRICE = 'orderdetails.service_unit_price';

    /**
     * the column name for the service_quantity field
     */
    const COL_SERVICE_QUANTITY = 'orderdetails.service_quantity';

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
        self::TYPE_PHPNAME       => array('IdOrderDetails', 'IdOrder', 'IdProduct', 'ProductUnitPrice', 'ProductQuantity', 'IdService', 'ServiceUnitPrice', 'ServiceQuantity', ),
        self::TYPE_CAMELNAME     => array('idOrderDetails', 'idOrder', 'idProduct', 'productUnitPrice', 'productQuantity', 'idService', 'serviceUnitPrice', 'serviceQuantity', ),
        self::TYPE_COLNAME       => array(OrderdetailsTableMap::COL_ID_ORDER_DETAILS, OrderdetailsTableMap::COL_ID_ORDER, OrderdetailsTableMap::COL_ID_PRODUCT, OrderdetailsTableMap::COL_PRODUCT_UNIT_PRICE, OrderdetailsTableMap::COL_PRODUCT_QUANTITY, OrderdetailsTableMap::COL_ID_SERVICE, OrderdetailsTableMap::COL_SERVICE_UNIT_PRICE, OrderdetailsTableMap::COL_SERVICE_QUANTITY, ),
        self::TYPE_FIELDNAME     => array('id_order_details', 'id_order', 'id_product', 'product_unit_price', 'product_quantity', 'id_service', 'service_unit_price', 'service_quantity', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdOrderDetails' => 0, 'IdOrder' => 1, 'IdProduct' => 2, 'ProductUnitPrice' => 3, 'ProductQuantity' => 4, 'IdService' => 5, 'ServiceUnitPrice' => 6, 'ServiceQuantity' => 7, ),
        self::TYPE_CAMELNAME     => array('idOrderDetails' => 0, 'idOrder' => 1, 'idProduct' => 2, 'productUnitPrice' => 3, 'productQuantity' => 4, 'idService' => 5, 'serviceUnitPrice' => 6, 'serviceQuantity' => 7, ),
        self::TYPE_COLNAME       => array(OrderdetailsTableMap::COL_ID_ORDER_DETAILS => 0, OrderdetailsTableMap::COL_ID_ORDER => 1, OrderdetailsTableMap::COL_ID_PRODUCT => 2, OrderdetailsTableMap::COL_PRODUCT_UNIT_PRICE => 3, OrderdetailsTableMap::COL_PRODUCT_QUANTITY => 4, OrderdetailsTableMap::COL_ID_SERVICE => 5, OrderdetailsTableMap::COL_SERVICE_UNIT_PRICE => 6, OrderdetailsTableMap::COL_SERVICE_QUANTITY => 7, ),
        self::TYPE_FIELDNAME     => array('id_order_details' => 0, 'id_order' => 1, 'id_product' => 2, 'product_unit_price' => 3, 'product_quantity' => 4, 'id_service' => 5, 'service_unit_price' => 6, 'service_quantity' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('orderdetails');
        $this->setPhpName('Orderdetails');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Propel\\Orderdetails');
        $this->setPackage('Model.Propel');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('id_order_details', 'IdOrderDetails', 'INTEGER', true, 8, null);
        $this->addForeignKey('id_order', 'IdOrder', 'INTEGER', 'orders', 'id_order', true, 8, null);
        $this->addForeignKey('id_product', 'IdProduct', 'INTEGER', 'products', 'id_product', true, 8, null);
        $this->addColumn('product_unit_price', 'ProductUnitPrice', 'FLOAT', true, null, null);
        $this->addColumn('product_quantity', 'ProductQuantity', 'INTEGER', true, 8, null);
        $this->addForeignKey('id_service', 'IdService', 'INTEGER', 'services', 'id_service', true, 8, null);
        $this->addColumn('service_unit_price', 'ServiceUnitPrice', 'FLOAT', true, null, null);
        $this->addColumn('service_quantity', 'ServiceQuantity', 'INTEGER', true, 8, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Orders', '\\Model\\Propel\\Orders', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_order',
    1 => ':id_order',
  ),
), null, null, null, false);
        $this->addRelation('Products', '\\Model\\Propel\\Products', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_product',
    1 => ':id_product',
  ),
), null, null, null, false);
        $this->addRelation('Services', '\\Model\\Propel\\Services', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_service',
    1 => ':id_service',
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
        return null;
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
        return '';
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
        return $withPrefix ? OrderdetailsTableMap::CLASS_DEFAULT : OrderdetailsTableMap::OM_CLASS;
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
     * @return array           (Orderdetails object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OrderdetailsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrderdetailsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrderdetailsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrderdetailsTableMap::OM_CLASS;
            /** @var Orderdetails $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrderdetailsTableMap::addInstanceToPool($obj, $key);
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
            $key = OrderdetailsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrderdetailsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Orderdetails $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrderdetailsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OrderdetailsTableMap::COL_ID_ORDER_DETAILS);
            $criteria->addSelectColumn(OrderdetailsTableMap::COL_ID_ORDER);
            $criteria->addSelectColumn(OrderdetailsTableMap::COL_ID_PRODUCT);
            $criteria->addSelectColumn(OrderdetailsTableMap::COL_PRODUCT_UNIT_PRICE);
            $criteria->addSelectColumn(OrderdetailsTableMap::COL_PRODUCT_QUANTITY);
            $criteria->addSelectColumn(OrderdetailsTableMap::COL_ID_SERVICE);
            $criteria->addSelectColumn(OrderdetailsTableMap::COL_SERVICE_UNIT_PRICE);
            $criteria->addSelectColumn(OrderdetailsTableMap::COL_SERVICE_QUANTITY);
        } else {
            $criteria->addSelectColumn($alias . '.id_order_details');
            $criteria->addSelectColumn($alias . '.id_order');
            $criteria->addSelectColumn($alias . '.id_product');
            $criteria->addSelectColumn($alias . '.product_unit_price');
            $criteria->addSelectColumn($alias . '.product_quantity');
            $criteria->addSelectColumn($alias . '.id_service');
            $criteria->addSelectColumn($alias . '.service_unit_price');
            $criteria->addSelectColumn($alias . '.service_quantity');
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
        return Propel::getServiceContainer()->getDatabaseMap(OrderdetailsTableMap::DATABASE_NAME)->getTable(OrderdetailsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OrderdetailsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OrderdetailsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OrderdetailsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Orderdetails or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Orderdetails object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrderdetailsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Propel\Orderdetails) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Orderdetails object has no primary key');
        }

        $query = OrderdetailsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrderdetailsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrderdetailsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the orderdetails table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OrderdetailsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Orderdetails or Criteria object.
     *
     * @param mixed               $criteria Criteria or Orderdetails object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderdetailsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Orderdetails object
        }


        // Set the correct dbName
        $query = OrderdetailsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OrderdetailsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OrderdetailsTableMap::buildTableMap();
