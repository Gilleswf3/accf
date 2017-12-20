<?php

namespace Model\Propel\Base;

use \Exception;
use \PDO;
use Model\Propel\Products as ChildProducts;
use Model\Propel\ProductsQuery as ChildProductsQuery;
use Model\Propel\Map\ProductsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'products' table.
 *
 *
 *
 * @method     ChildProductsQuery orderByIdProduct($order = Criteria::ASC) Order by the id_product column
 * @method     ChildProductsQuery orderByManufacturer($order = Criteria::ASC) Order by the manufacturer column
 * @method     ChildProductsQuery orderByProductMainCategory($order = Criteria::ASC) Order by the product_main_category column
 * @method     ChildProductsQuery orderByProductSubCategory($order = Criteria::ASC) Order by the product_sub_category column
 * @method     ChildProductsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildProductsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildProductsQuery orderByPicture($order = Criteria::ASC) Order by the picture column
 * @method     ChildProductsQuery orderByPriceVatExcluded($order = Criteria::ASC) Order by the price_vat_excluded column
 * @method     ChildProductsQuery orderByPriceVatIncluded($order = Criteria::ASC) Order by the price_vat_included column
 *
 * @method     ChildProductsQuery groupByIdProduct() Group by the id_product column
 * @method     ChildProductsQuery groupByManufacturer() Group by the manufacturer column
 * @method     ChildProductsQuery groupByProductMainCategory() Group by the product_main_category column
 * @method     ChildProductsQuery groupByProductSubCategory() Group by the product_sub_category column
 * @method     ChildProductsQuery groupByTitle() Group by the title column
 * @method     ChildProductsQuery groupByDescription() Group by the description column
 * @method     ChildProductsQuery groupByPicture() Group by the picture column
 * @method     ChildProductsQuery groupByPriceVatExcluded() Group by the price_vat_excluded column
 * @method     ChildProductsQuery groupByPriceVatIncluded() Group by the price_vat_included column
 *
 * @method     ChildProductsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProductsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProductsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProductsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProductsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProductsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProductsQuery leftJoinOrders($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orders relation
 * @method     ChildProductsQuery rightJoinOrders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orders relation
 * @method     ChildProductsQuery innerJoinOrders($relationAlias = null) Adds a INNER JOIN clause to the query using the Orders relation
 *
 * @method     ChildProductsQuery joinWithOrders($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Orders relation
 *
 * @method     ChildProductsQuery leftJoinWithOrders() Adds a LEFT JOIN clause and with to the query using the Orders relation
 * @method     ChildProductsQuery rightJoinWithOrders() Adds a RIGHT JOIN clause and with to the query using the Orders relation
 * @method     ChildProductsQuery innerJoinWithOrders() Adds a INNER JOIN clause and with to the query using the Orders relation
 *
 * @method     \Model\Propel\OrdersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildProducts findOne(ConnectionInterface $con = null) Return the first ChildProducts matching the query
 * @method     ChildProducts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProducts matching the query, or a new ChildProducts object populated from the query conditions when no match is found
 *
 * @method     ChildProducts findOneByIdProduct(int $id_product) Return the first ChildProducts filtered by the id_product column
 * @method     ChildProducts findOneByManufacturer(string $manufacturer) Return the first ChildProducts filtered by the manufacturer column
 * @method     ChildProducts findOneByProductMainCategory(string $product_main_category) Return the first ChildProducts filtered by the product_main_category column
 * @method     ChildProducts findOneByProductSubCategory(string $product_sub_category) Return the first ChildProducts filtered by the product_sub_category column
 * @method     ChildProducts findOneByTitle(string $title) Return the first ChildProducts filtered by the title column
 * @method     ChildProducts findOneByDescription(string $description) Return the first ChildProducts filtered by the description column
 * @method     ChildProducts findOneByPicture(string $picture) Return the first ChildProducts filtered by the picture column
 * @method     ChildProducts findOneByPriceVatExcluded(double $price_vat_excluded) Return the first ChildProducts filtered by the price_vat_excluded column
 * @method     ChildProducts findOneByPriceVatIncluded(double $price_vat_included) Return the first ChildProducts filtered by the price_vat_included column *

 * @method     ChildProducts requirePk($key, ConnectionInterface $con = null) Return the ChildProducts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOne(ConnectionInterface $con = null) Return the first ChildProducts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProducts requireOneByIdProduct(int $id_product) Return the first ChildProducts filtered by the id_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByManufacturer(string $manufacturer) Return the first ChildProducts filtered by the manufacturer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByProductMainCategory(string $product_main_category) Return the first ChildProducts filtered by the product_main_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByProductSubCategory(string $product_sub_category) Return the first ChildProducts filtered by the product_sub_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByTitle(string $title) Return the first ChildProducts filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByDescription(string $description) Return the first ChildProducts filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByPicture(string $picture) Return the first ChildProducts filtered by the picture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByPriceVatExcluded(double $price_vat_excluded) Return the first ChildProducts filtered by the price_vat_excluded column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByPriceVatIncluded(double $price_vat_included) Return the first ChildProducts filtered by the price_vat_included column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProducts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProducts objects based on current ModelCriteria
 * @method     ChildProducts[]|ObjectCollection findByIdProduct(int $id_product) Return ChildProducts objects filtered by the id_product column
 * @method     ChildProducts[]|ObjectCollection findByManufacturer(string $manufacturer) Return ChildProducts objects filtered by the manufacturer column
 * @method     ChildProducts[]|ObjectCollection findByProductMainCategory(string $product_main_category) Return ChildProducts objects filtered by the product_main_category column
 * @method     ChildProducts[]|ObjectCollection findByProductSubCategory(string $product_sub_category) Return ChildProducts objects filtered by the product_sub_category column
 * @method     ChildProducts[]|ObjectCollection findByTitle(string $title) Return ChildProducts objects filtered by the title column
 * @method     ChildProducts[]|ObjectCollection findByDescription(string $description) Return ChildProducts objects filtered by the description column
 * @method     ChildProducts[]|ObjectCollection findByPicture(string $picture) Return ChildProducts objects filtered by the picture column
 * @method     ChildProducts[]|ObjectCollection findByPriceVatExcluded(double $price_vat_excluded) Return ChildProducts objects filtered by the price_vat_excluded column
 * @method     ChildProducts[]|ObjectCollection findByPriceVatIncluded(double $price_vat_included) Return ChildProducts objects filtered by the price_vat_included column
 * @method     ChildProducts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProductsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Propel\Base\ProductsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Propel\\Products', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProductsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProductsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProductsQuery) {
            return $criteria;
        }
        $query = new ChildProductsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildProducts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProductsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProductsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProducts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_product, manufacturer, product_main_category, product_sub_category, title, description, picture, price_vat_excluded, price_vat_included FROM products WHERE id_product = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildProducts $obj */
            $obj = new ChildProducts();
            $obj->hydrate($row);
            ProductsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildProducts|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductsTableMap::COL_ID_PRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductsTableMap::COL_ID_PRODUCT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_product column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProduct(1234); // WHERE id_product = 1234
     * $query->filterByIdProduct(array(12, 34)); // WHERE id_product IN (12, 34)
     * $query->filterByIdProduct(array('min' => 12)); // WHERE id_product > 12
     * </code>
     *
     * @param     mixed $idProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByIdProduct($idProduct = null, $comparison = null)
    {
        if (is_array($idProduct)) {
            $useMinMax = false;
            if (isset($idProduct['min'])) {
                $this->addUsingAlias(ProductsTableMap::COL_ID_PRODUCT, $idProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProduct['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_ID_PRODUCT, $idProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductsTableMap::COL_ID_PRODUCT, $idProduct, $comparison);
    }

    /**
     * Filter the query on the manufacturer column
     *
     * Example usage:
     * <code>
     * $query->filterByManufacturer('fooValue');   // WHERE manufacturer = 'fooValue'
     * $query->filterByManufacturer('%fooValue%', Criteria::LIKE); // WHERE manufacturer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $manufacturer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByManufacturer($manufacturer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($manufacturer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductsTableMap::COL_MANUFACTURER, $manufacturer, $comparison);
    }

    /**
     * Filter the query on the product_main_category column
     *
     * Example usage:
     * <code>
     * $query->filterByProductMainCategory('fooValue');   // WHERE product_main_category = 'fooValue'
     * $query->filterByProductMainCategory('%fooValue%', Criteria::LIKE); // WHERE product_main_category LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productMainCategory The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByProductMainCategory($productMainCategory = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productMainCategory)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductsTableMap::COL_PRODUCT_MAIN_CATEGORY, $productMainCategory, $comparison);
    }

    /**
     * Filter the query on the product_sub_category column
     *
     * Example usage:
     * <code>
     * $query->filterByProductSubCategory('fooValue');   // WHERE product_sub_category = 'fooValue'
     * $query->filterByProductSubCategory('%fooValue%', Criteria::LIKE); // WHERE product_sub_category LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productSubCategory The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByProductSubCategory($productSubCategory = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productSubCategory)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductsTableMap::COL_PRODUCT_SUB_CATEGORY, $productSubCategory, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductsTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductsTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the picture column
     *
     * Example usage:
     * <code>
     * $query->filterByPicture('fooValue');   // WHERE picture = 'fooValue'
     * $query->filterByPicture('%fooValue%', Criteria::LIKE); // WHERE picture LIKE '%fooValue%'
     * </code>
     *
     * @param     string $picture The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByPicture($picture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($picture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductsTableMap::COL_PICTURE, $picture, $comparison);
    }

    /**
     * Filter the query on the price_vat_excluded column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceVatExcluded(1234); // WHERE price_vat_excluded = 1234
     * $query->filterByPriceVatExcluded(array(12, 34)); // WHERE price_vat_excluded IN (12, 34)
     * $query->filterByPriceVatExcluded(array('min' => 12)); // WHERE price_vat_excluded > 12
     * </code>
     *
     * @param     mixed $priceVatExcluded The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByPriceVatExcluded($priceVatExcluded = null, $comparison = null)
    {
        if (is_array($priceVatExcluded)) {
            $useMinMax = false;
            if (isset($priceVatExcluded['min'])) {
                $this->addUsingAlias(ProductsTableMap::COL_PRICE_VAT_EXCLUDED, $priceVatExcluded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceVatExcluded['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_PRICE_VAT_EXCLUDED, $priceVatExcluded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductsTableMap::COL_PRICE_VAT_EXCLUDED, $priceVatExcluded, $comparison);
    }

    /**
     * Filter the query on the price_vat_included column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceVatIncluded(1234); // WHERE price_vat_included = 1234
     * $query->filterByPriceVatIncluded(array(12, 34)); // WHERE price_vat_included IN (12, 34)
     * $query->filterByPriceVatIncluded(array('min' => 12)); // WHERE price_vat_included > 12
     * </code>
     *
     * @param     mixed $priceVatIncluded The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function filterByPriceVatIncluded($priceVatIncluded = null, $comparison = null)
    {
        if (is_array($priceVatIncluded)) {
            $useMinMax = false;
            if (isset($priceVatIncluded['min'])) {
                $this->addUsingAlias(ProductsTableMap::COL_PRICE_VAT_INCLUDED, $priceVatIncluded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceVatIncluded['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_PRICE_VAT_INCLUDED, $priceVatIncluded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductsTableMap::COL_PRICE_VAT_INCLUDED, $priceVatIncluded, $comparison);
    }

    /**
     * Filter the query by a related \Model\Propel\Orders object
     *
     * @param \Model\Propel\Orders|ObjectCollection $orders the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductsQuery The current query, for fluid interface
     */
    public function filterByOrders($orders, $comparison = null)
    {
        if ($orders instanceof \Model\Propel\Orders) {
            return $this
                ->addUsingAlias(ProductsTableMap::COL_ID_PRODUCT, $orders->getIdProduct(), $comparison);
        } elseif ($orders instanceof ObjectCollection) {
            return $this
                ->useOrdersQuery()
                ->filterByPrimaryKeys($orders->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrders() only accepts arguments of type \Model\Propel\Orders or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orders relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function joinOrders($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orders');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Orders');
        }

        return $this;
    }

    /**
     * Use the Orders relation Orders object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Propel\OrdersQuery A secondary query class using the current class as primary query
     */
    public function useOrdersQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrders($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orders', '\Model\Propel\OrdersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProducts $products Object to remove from the list of results
     *
     * @return $this|ChildProductsQuery The current query, for fluid interface
     */
    public function prune($products = null)
    {
        if ($products) {
            $this->addUsingAlias(ProductsTableMap::COL_ID_PRODUCT, $products->getIdProduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the products table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProductsTableMap::clearInstancePool();
            ProductsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProductsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProductsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProductsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProductsQuery
