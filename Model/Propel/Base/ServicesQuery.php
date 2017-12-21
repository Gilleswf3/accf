<?php

namespace Model\Propel\Base;

use \Exception;
use \PDO;
use Model\Propel\Services as ChildServices;
use Model\Propel\ServicesQuery as ChildServicesQuery;
use Model\Propel\Map\ServicesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'services' table.
 *
 *
 *
 * @method     ChildServicesQuery orderByIdService($order = Criteria::ASC) Order by the id_service column
 * @method     ChildServicesQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildServicesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildServicesQuery orderByPriceVatExcluded($order = Criteria::ASC) Order by the price_vat_excluded column
 * @method     ChildServicesQuery orderByPriceVatIncluded($order = Criteria::ASC) Order by the price_vat_included column
 *
 * @method     ChildServicesQuery groupByIdService() Group by the id_service column
 * @method     ChildServicesQuery groupByTitle() Group by the title column
 * @method     ChildServicesQuery groupByDescription() Group by the description column
 * @method     ChildServicesQuery groupByPriceVatExcluded() Group by the price_vat_excluded column
 * @method     ChildServicesQuery groupByPriceVatIncluded() Group by the price_vat_included column
 *
 * @method     ChildServicesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildServicesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildServicesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildServicesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildServicesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildServicesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildServicesQuery leftJoinOrderdetails($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orderdetails relation
 * @method     ChildServicesQuery rightJoinOrderdetails($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orderdetails relation
 * @method     ChildServicesQuery innerJoinOrderdetails($relationAlias = null) Adds a INNER JOIN clause to the query using the Orderdetails relation
 *
 * @method     ChildServicesQuery joinWithOrderdetails($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Orderdetails relation
 *
 * @method     ChildServicesQuery leftJoinWithOrderdetails() Adds a LEFT JOIN clause and with to the query using the Orderdetails relation
 * @method     ChildServicesQuery rightJoinWithOrderdetails() Adds a RIGHT JOIN clause and with to the query using the Orderdetails relation
 * @method     ChildServicesQuery innerJoinWithOrderdetails() Adds a INNER JOIN clause and with to the query using the Orderdetails relation
 *
 * @method     ChildServicesQuery leftJoinOrders($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orders relation
 * @method     ChildServicesQuery rightJoinOrders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orders relation
 * @method     ChildServicesQuery innerJoinOrders($relationAlias = null) Adds a INNER JOIN clause to the query using the Orders relation
 *
 * @method     ChildServicesQuery joinWithOrders($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Orders relation
 *
 * @method     ChildServicesQuery leftJoinWithOrders() Adds a LEFT JOIN clause and with to the query using the Orders relation
 * @method     ChildServicesQuery rightJoinWithOrders() Adds a RIGHT JOIN clause and with to the query using the Orders relation
 * @method     ChildServicesQuery innerJoinWithOrders() Adds a INNER JOIN clause and with to the query using the Orders relation
 *
 * @method     \Model\Propel\OrderdetailsQuery|\Model\Propel\OrdersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildServices findOne(ConnectionInterface $con = null) Return the first ChildServices matching the query
 * @method     ChildServices findOneOrCreate(ConnectionInterface $con = null) Return the first ChildServices matching the query, or a new ChildServices object populated from the query conditions when no match is found
 *
 * @method     ChildServices findOneByIdService(int $id_service) Return the first ChildServices filtered by the id_service column
 * @method     ChildServices findOneByTitle(string $title) Return the first ChildServices filtered by the title column
 * @method     ChildServices findOneByDescription(string $description) Return the first ChildServices filtered by the description column
 * @method     ChildServices findOneByPriceVatExcluded(double $price_vat_excluded) Return the first ChildServices filtered by the price_vat_excluded column
 * @method     ChildServices findOneByPriceVatIncluded(double $price_vat_included) Return the first ChildServices filtered by the price_vat_included column *

 * @method     ChildServices requirePk($key, ConnectionInterface $con = null) Return the ChildServices by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildServices requireOne(ConnectionInterface $con = null) Return the first ChildServices matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildServices requireOneByIdService(int $id_service) Return the first ChildServices filtered by the id_service column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildServices requireOneByTitle(string $title) Return the first ChildServices filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildServices requireOneByDescription(string $description) Return the first ChildServices filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildServices requireOneByPriceVatExcluded(double $price_vat_excluded) Return the first ChildServices filtered by the price_vat_excluded column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildServices requireOneByPriceVatIncluded(double $price_vat_included) Return the first ChildServices filtered by the price_vat_included column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildServices[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildServices objects based on current ModelCriteria
 * @method     ChildServices[]|ObjectCollection findByIdService(int $id_service) Return ChildServices objects filtered by the id_service column
 * @method     ChildServices[]|ObjectCollection findByTitle(string $title) Return ChildServices objects filtered by the title column
 * @method     ChildServices[]|ObjectCollection findByDescription(string $description) Return ChildServices objects filtered by the description column
 * @method     ChildServices[]|ObjectCollection findByPriceVatExcluded(double $price_vat_excluded) Return ChildServices objects filtered by the price_vat_excluded column
 * @method     ChildServices[]|ObjectCollection findByPriceVatIncluded(double $price_vat_included) Return ChildServices objects filtered by the price_vat_included column
 * @method     ChildServices[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ServicesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Propel\Base\ServicesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Propel\\Services', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildServicesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildServicesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildServicesQuery) {
            return $criteria;
        }
        $query = new ChildServicesQuery();
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
     * @return ChildServices|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ServicesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ServicesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildServices A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_service, title, description, price_vat_excluded, price_vat_included FROM services WHERE id_service = :p0';
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
            /** @var ChildServices $obj */
            $obj = new ChildServices();
            $obj->hydrate($row);
            ServicesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildServices|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildServicesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ServicesTableMap::COL_ID_SERVICE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildServicesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ServicesTableMap::COL_ID_SERVICE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_service column
     *
     * Example usage:
     * <code>
     * $query->filterByIdService(1234); // WHERE id_service = 1234
     * $query->filterByIdService(array(12, 34)); // WHERE id_service IN (12, 34)
     * $query->filterByIdService(array('min' => 12)); // WHERE id_service > 12
     * </code>
     *
     * @param     mixed $idService The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildServicesQuery The current query, for fluid interface
     */
    public function filterByIdService($idService = null, $comparison = null)
    {
        if (is_array($idService)) {
            $useMinMax = false;
            if (isset($idService['min'])) {
                $this->addUsingAlias(ServicesTableMap::COL_ID_SERVICE, $idService['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idService['max'])) {
                $this->addUsingAlias(ServicesTableMap::COL_ID_SERVICE, $idService['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::COL_ID_SERVICE, $idService, $comparison);
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
     * @return $this|ChildServicesQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildServicesQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildServicesQuery The current query, for fluid interface
     */
    public function filterByPriceVatExcluded($priceVatExcluded = null, $comparison = null)
    {
        if (is_array($priceVatExcluded)) {
            $useMinMax = false;
            if (isset($priceVatExcluded['min'])) {
                $this->addUsingAlias(ServicesTableMap::COL_PRICE_VAT_EXCLUDED, $priceVatExcluded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceVatExcluded['max'])) {
                $this->addUsingAlias(ServicesTableMap::COL_PRICE_VAT_EXCLUDED, $priceVatExcluded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::COL_PRICE_VAT_EXCLUDED, $priceVatExcluded, $comparison);
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
     * @return $this|ChildServicesQuery The current query, for fluid interface
     */
    public function filterByPriceVatIncluded($priceVatIncluded = null, $comparison = null)
    {
        if (is_array($priceVatIncluded)) {
            $useMinMax = false;
            if (isset($priceVatIncluded['min'])) {
                $this->addUsingAlias(ServicesTableMap::COL_PRICE_VAT_INCLUDED, $priceVatIncluded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceVatIncluded['max'])) {
                $this->addUsingAlias(ServicesTableMap::COL_PRICE_VAT_INCLUDED, $priceVatIncluded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicesTableMap::COL_PRICE_VAT_INCLUDED, $priceVatIncluded, $comparison);
    }

    /**
     * Filter the query by a related \Model\Propel\Orderdetails object
     *
     * @param \Model\Propel\Orderdetails|ObjectCollection $orderdetails the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByOrderdetails($orderdetails, $comparison = null)
    {
        if ($orderdetails instanceof \Model\Propel\Orderdetails) {
            return $this
                ->addUsingAlias(ServicesTableMap::COL_ID_SERVICE, $orderdetails->getIdService(), $comparison);
        } elseif ($orderdetails instanceof ObjectCollection) {
            return $this
                ->useOrderdetailsQuery()
                ->filterByPrimaryKeys($orderdetails->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrderdetails() only accepts arguments of type \Model\Propel\Orderdetails or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orderdetails relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildServicesQuery The current query, for fluid interface
     */
    public function joinOrderdetails($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orderdetails');

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
            $this->addJoinObject($join, 'Orderdetails');
        }

        return $this;
    }

    /**
     * Use the Orderdetails relation Orderdetails object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Propel\OrderdetailsQuery A secondary query class using the current class as primary query
     */
    public function useOrderdetailsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderdetails($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orderdetails', '\Model\Propel\OrderdetailsQuery');
    }

    /**
     * Filter the query by a related \Model\Propel\Orders object
     *
     * @param \Model\Propel\Orders|ObjectCollection $orders the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildServicesQuery The current query, for fluid interface
     */
    public function filterByOrders($orders, $comparison = null)
    {
        if ($orders instanceof \Model\Propel\Orders) {
            return $this
                ->addUsingAlias(ServicesTableMap::COL_ID_SERVICE, $orders->getIdService(), $comparison);
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
     * @return $this|ChildServicesQuery The current query, for fluid interface
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
     * @param   ChildServices $services Object to remove from the list of results
     *
     * @return $this|ChildServicesQuery The current query, for fluid interface
     */
    public function prune($services = null)
    {
        if ($services) {
            $this->addUsingAlias(ServicesTableMap::COL_ID_SERVICE, $services->getIdService(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the services table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ServicesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ServicesTableMap::clearInstancePool();
            ServicesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ServicesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ServicesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ServicesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ServicesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ServicesQuery
