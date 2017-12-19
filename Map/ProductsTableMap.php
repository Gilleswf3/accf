<?php

namespace Map;

use \Products;
use \ProductsQuery;
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
 * This class defines the structure of the 'products' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ProductsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ProductsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'products';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Products';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Products';

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
     * the column name for the id_product field
     */
    const COL_ID_PRODUCT = 'products.id_product';

    /**
     * the column name for the manufacturer field
     */
    const COL_MANUFACTURER = 'products.manufacturer';

    /**
     * the column name for the product_main_category field
     */
    const COL_PRODUCT_MAIN_CATEGORY = 'products.product_main_category';

    /**
     * the column name for the product_sub_category field
     */
    const COL_PRODUCT_SUB_CATEGORY = 'products.product_sub_category';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'products.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'products.description';

    /**
     * the column name for the picture field
     */
    const COL_PICTURE = 'products.picture';

    /**
     * the column name for the price_vat_excluded field
     */
    const COL_PRICE_VAT_EXCLUDED = 'products.price_vat_excluded';

    /**
     * the column name for the price_vat_included field
     */
    const COL_PRICE_VAT_INCLUDED = 'products.price_vat_included';

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
        self::TYPE_PHPNAME       => array('IdProduct', 'Manufacturer', 'ProductMainCategory', 'ProductSubCategory', 'Title', 'Description', 'Picture', 'PriceVatExcluded', 'PriceVatIncluded', ),
        self::TYPE_CAMELNAME     => array('idProduct', 'manufacturer', 'productMainCategory', 'productSubCategory', 'title', 'description', 'picture', 'priceVatExcluded', 'priceVatIncluded', ),
        self::TYPE_COLNAME       => array(ProductsTableMap::COL_ID_PRODUCT, ProductsTableMap::COL_MANUFACTURER, ProductsTableMap::COL_PRODUCT_MAIN_CATEGORY, ProductsTableMap::COL_PRODUCT_SUB_CATEGORY, ProductsTableMap::COL_TITLE, ProductsTableMap::COL_DESCRIPTION, ProductsTableMap::COL_PICTURE, ProductsTableMap::COL_PRICE_VAT_EXCLUDED, ProductsTableMap::COL_PRICE_VAT_INCLUDED, ),
        self::TYPE_FIELDNAME     => array('id_product', 'manufacturer', 'product_main_category', 'product_sub_category', 'title', 'description', 'picture', 'price_vat_excluded', 'price_vat_included', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdProduct' => 0, 'Manufacturer' => 1, 'ProductMainCategory' => 2, 'ProductSubCategory' => 3, 'Title' => 4, 'Description' => 5, 'Picture' => 6, 'PriceVatExcluded' => 7, 'PriceVatIncluded' => 8, ),
        self::TYPE_CAMELNAME     => array('idProduct' => 0, 'manufacturer' => 1, 'productMainCategory' => 2, 'productSubCategory' => 3, 'title' => 4, 'description' => 5, 'picture' => 6, 'priceVatExcluded' => 7, 'priceVatIncluded' => 8, ),
        self::TYPE_COLNAME       => array(ProductsTableMap::COL_ID_PRODUCT => 0, ProductsTableMap::COL_MANUFACTURER => 1, ProductsTableMap::COL_PRODUCT_MAIN_CATEGORY => 2, ProductsTableMap::COL_PRODUCT_SUB_CATEGORY => 3, ProductsTableMap::COL_TITLE => 4, ProductsTableMap::COL_DESCRIPTION => 5, ProductsTableMap::COL_PICTURE => 6, ProductsTableMap::COL_PRICE_VAT_EXCLUDED => 7, ProductsTableMap::COL_PRICE_VAT_INCLUDED => 8, ),
        self::TYPE_FIELDNAME     => array('id_product' => 0, 'manufacturer' => 1, 'product_main_category' => 2, 'product_sub_category' => 3, 'title' => 4, 'description' => 5, 'picture' => 6, 'price_vat_excluded' => 7, 'price_vat_included' => 8, ),
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
        $this->setName('products');
        $this->setPhpName('Products');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Products');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_product', 'IdProduct', 'INTEGER', true, 8, null);
        $this->addColumn('manufacturer', 'Manufacturer', 'VARCHAR', true, 255, null);
        $this->addColumn('product_main_category', 'ProductMainCategory', 'CHAR', true, null, null);
        $this->addColumn('product_sub_category', 'ProductSubCategory', 'CHAR', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', true, null, null);
        $this->addColumn('picture', 'Picture', 'VARCHAR', true, 255, null);
        $this->addColumn('price_vat_excluded', 'PriceVatExcluded', 'FLOAT', true, null, null);
        $this->addColumn('price_vat_included', 'PriceVatIncluded', 'FLOAT', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Orders', '\\Orders', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_product',
    1 => ':id_product',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProduct', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProduct', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProduct', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProduct', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProduct', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProduct', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdProduct', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ProductsTableMap::CLASS_DEFAULT : ProductsTableMap::OM_CLASS;
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
     * @return array           (Products object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ProductsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProductsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProductsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProductsTableMap::OM_CLASS;
            /** @var Products $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProductsTableMap::addInstanceToPool($obj, $key);
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
            $key = ProductsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProductsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Products $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProductsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ProductsTableMap::COL_ID_PRODUCT);
            $criteria->addSelectColumn(ProductsTableMap::COL_MANUFACTURER);
            $criteria->addSelectColumn(ProductsTableMap::COL_PRODUCT_MAIN_CATEGORY);
            $criteria->addSelectColumn(ProductsTableMap::COL_PRODUCT_SUB_CATEGORY);
            $criteria->addSelectColumn(ProductsTableMap::COL_TITLE);
            $criteria->addSelectColumn(ProductsTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ProductsTableMap::COL_PICTURE);
            $criteria->addSelectColumn(ProductsTableMap::COL_PRICE_VAT_EXCLUDED);
            $criteria->addSelectColumn(ProductsTableMap::COL_PRICE_VAT_INCLUDED);
        } else {
            $criteria->addSelectColumn($alias . '.id_product');
            $criteria->addSelectColumn($alias . '.manufacturer');
            $criteria->addSelectColumn($alias . '.product_main_category');
            $criteria->addSelectColumn($alias . '.product_sub_category');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.picture');
            $criteria->addSelectColumn($alias . '.price_vat_excluded');
            $criteria->addSelectColumn($alias . '.price_vat_included');
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
        return Propel::getServiceContainer()->getDatabaseMap(ProductsTableMap::DATABASE_NAME)->getTable(ProductsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ProductsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ProductsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ProductsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Products or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Products object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Products) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProductsTableMap::DATABASE_NAME);
            $criteria->add(ProductsTableMap::COL_ID_PRODUCT, (array) $values, Criteria::IN);
        }

        $query = ProductsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ProductsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ProductsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the products table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ProductsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Products or Criteria object.
     *
     * @param mixed               $criteria Criteria or Products object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Products object
        }

        if ($criteria->containsKey(ProductsTableMap::COL_ID_PRODUCT) && $criteria->keyContainsValue(ProductsTableMap::COL_ID_PRODUCT) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductsTableMap::COL_ID_PRODUCT.')');
        }


        // Set the correct dbName
        $query = ProductsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ProductsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ProductsTableMap::buildTableMap();
