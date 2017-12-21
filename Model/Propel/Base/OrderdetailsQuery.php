<?php

namespace Model\Propel\Base;

use \Exception;
use Model\Propel\Orderdetails as ChildOrderdetails;
use Model\Propel\OrderdetailsQuery as ChildOrderdetailsQuery;
use Model\Propel\Map\OrderdetailsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'orderdetails' table.
 *
 *
 *
 * @method     ChildOrderdetailsQuery orderByIdOrderDetails($order = Criteria::ASC) Order by the id_order_details column
 * @method     ChildOrderdetailsQuery orderByIdOrder($order = Criteria::ASC) Order by the id_order column
 * @method     ChildOrderdetailsQuery orderByIdProduct($order = Criteria::ASC) Order by the id_product column
 * @method     ChildOrderdetailsQuery orderByProductUnitPrice($order = Criteria::ASC) Order by the product_unit_price column
 * @method     ChildOrderdetailsQuery orderByProductQuantity($order = Criteria::ASC) Order by the product_quantity column
 * @method     ChildOrderdetailsQuery orderByIdService($order = Criteria::ASC) Order by the id_service column
 * @method     ChildOrderdetailsQuery orderByServiceUnitPrice($order = Criteria::ASC) Order by the service_unit_price column
 * @method     ChildOrderdetailsQuery orderByServiceQuantity($order = Criteria::ASC) Order by the service_quantity column
 *
 * @method     ChildOrderdetailsQuery groupByIdOrderDetails() Group by the id_order_details column
 * @method     ChildOrderdetailsQuery groupByIdOrder() Group by the id_order column
 * @method     ChildOrderdetailsQuery groupByIdProduct() Group by the id_product column
 * @method     ChildOrderdetailsQuery groupByProductUnitPrice() Group by the product_unit_price column
 * @method     ChildOrderdetailsQuery groupByProductQuantity() Group by the product_quantity column
 * @method     ChildOrderdetailsQuery groupByIdService() Group by the id_service column
 * @method     ChildOrderdetailsQuery groupByServiceUnitPrice() Group by the service_unit_price column
 * @method     ChildOrderdetailsQuery groupByServiceQuantity() Group by the service_quantity column
 *
 * @method     ChildOrderdetailsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderdetailsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderdetailsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderdetailsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrderdetailsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrderdetailsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrderdetailsQuery leftJoinOrders($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orders relation
 * @method     ChildOrderdetailsQuery rightJoinOrders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orders relation
 * @method     ChildOrderdetailsQuery innerJoinOrders($relationAlias = null) Adds a INNER JOIN clause to the query using the Orders relation
 *
 * @method     ChildOrderdetailsQuery joinWithOrders($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Orders relation
 *
 * @method     ChildOrderdetailsQuery leftJoinWithOrders() Adds a LEFT JOIN clause and with to the query using the Orders relation
 * @method     ChildOrderdetailsQuery rightJoinWithOrders() Adds a RIGHT JOIN clause and with to the query using the Orders relation
 * @method     ChildOrderdetailsQuery innerJoinWithOrders() Adds a INNER JOIN clause and with to the query using the Orders relation
 *
 * @method     ChildOrderdetailsQuery leftJoinProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the Products relation
 * @method     ChildOrderdetailsQuery rightJoinProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Products relation
 * @method     ChildOrderdetailsQuery innerJoinProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the Products relation
 *
 * @method     ChildOrderdetailsQuery joinWithProducts($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Products relation
 *
 * @method     ChildOrderdetailsQuery leftJoinWithProducts() Adds a LEFT JOIN clause and with to the query using the Products relation
 * @method     ChildOrderdetailsQuery rightJoinWithProducts() Adds a RIGHT JOIN clause and with to the query using the Products relation
 * @method     ChildOrderdetailsQuery innerJoinWithProducts() Adds a INNER JOIN clause and with to the query using the Products relation
 *
 * @method     ChildOrderdetailsQuery leftJoinServices($relationAlias = null) Adds a LEFT JOIN clause to the query using the Services relation
 * @method     ChildOrderdetailsQuery rightJoinServices($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Services relation
 * @method     ChildOrderdetailsQuery innerJoinServices($relationAlias = null) Adds a INNER JOIN clause to the query using the Services relation
 *
 * @method     ChildOrderdetailsQuery joinWithServices($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Services relation
 *
 * @method     ChildOrderdetailsQuery leftJoinWithServices() Adds a LEFT JOIN clause and with to the query using the Services relation
 * @method     ChildOrderdetailsQuery rightJoinWithServices() Adds a RIGHT JOIN clause and with to the query using the Services relation
 * @method     ChildOrderdetailsQuery innerJoinWithServices() Adds a INNER JOIN clause and with to the query using the Services relation
 *
 * @method     \Model\Propel\OrdersQuery|\Model\Propel\ProductsQuery|\Model\Propel\ServicesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildOrderdetails findOne(ConnectionInterface $con = null) Return the first ChildOrderdetails matching the query
 * @method     ChildOrderdetails findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrderdetails matching the query, or a new ChildOrderdetails object populated from the query conditions when no match is found
 *
 * @method     ChildOrderdetails findOneByIdOrderDetails(int $id_order_details) Return the first ChildOrderdetails filtered by the id_order_details column
 * @method     ChildOrderdetails findOneByIdOrder(int $id_order) Return the first ChildOrderdetails filtered by the id_order column
 * @method     ChildOrderdetails findOneByIdProduct(int $id_product) Return the first ChildOrderdetails filtered by the id_product column
 * @method     ChildOrderdetails findOneByProductUnitPrice(double $product_unit_price) Return the first ChildOrderdetails filtered by the product_unit_price column
 * @method     ChildOrderdetails findOneByProductQuantity(int $product_quantity) Return the first ChildOrderdetails filtered by the product_quantity column
 * @method     ChildOrderdetails findOneByIdService(int $id_service) Return the first ChildOrderdetails filtered by the id_service column
 * @method     ChildOrderdetails findOneByServiceUnitPrice(double $service_unit_price) Return the first ChildOrderdetails filtered by the service_unit_price column
 * @method     ChildOrderdetails findOneByServiceQuantity(int $service_quantity) Return the first ChildOrderdetails filtered by the service_quantity column *

 * @method     ChildOrderdetails requirePk($key, ConnectionInterface $con = null) Return the ChildOrderdetails by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderdetails requireOne(ConnectionInterface $con = null) Return the first ChildOrderdetails matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderdetails requireOneByIdOrderDetails(int $id_order_details) Return the first ChildOrderdetails filtered by the id_order_details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderdetails requireOneByIdOrder(int $id_order) Return the first ChildOrderdetails filtered by the id_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderdetails requireOneByIdProduct(int $id_product) Return the first ChildOrderdetails filtered by the id_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderdetails requireOneByProductUnitPrice(double $product_unit_price) Return the first ChildOrderdetails filtered by the product_unit_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderdetails requireOneByProductQuantity(int $product_quantity) Return the first ChildOrderdetails filtered by the product_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderdetails requireOneByIdService(int $id_service) Return the first ChildOrderdetails filtered by the id_service column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderdetails requireOneByServiceUnitPrice(double $service_unit_price) Return the first ChildOrderdetails filtered by the service_unit_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderdetails requireOneByServiceQuantity(int $service_quantity) Return the first ChildOrderdetails filtered by the service_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderdetails[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrderdetails objects based on current ModelCriteria
 * @method     ChildOrderdetails[]|ObjectCollection findByIdOrderDetails(int $id_order_details) Return ChildOrderdetails objects filtered by the id_order_details column
 * @method     ChildOrderdetails[]|ObjectCollection findByIdOrder(int $id_order) Return ChildOrderdetails objects filtered by the id_order column
 * @method     ChildOrderdetails[]|ObjectCollection findByIdProduct(int $id_product) Return ChildOrderdetails objects filtered by the id_product column
 * @method     ChildOrderdetails[]|ObjectCollection findByProductUnitPrice(double $product_unit_price) Return ChildOrderdetails objects filtered by the product_unit_price column
 * @method     ChildOrderdetails[]|ObjectCollection findByProductQuantity(int $product_quantity) Return ChildOrderdetails objects filtered by the product_quantity column
 * @method     ChildOrderdetails[]|ObjectCollection findByIdService(int $id_service) Return ChildOrderdetails objects filtered by the id_service column
 * @method     ChildOrderdetails[]|ObjectCollection findByServiceUnitPrice(double $service_unit_price) Return ChildOrderdetails objects filtered by the service_unit_price column
 * @method     ChildOrderdetails[]|ObjectCollection findByServiceQuantity(int $service_quantity) Return ChildOrderdetails objects filtered by the service_quantity column
 * @method     ChildOrderdetails[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrderdetailsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Propel\Base\OrderdetailsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Propel\\Orderdetails', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrderdetailsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrderdetailsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrderdetailsQuery) {
            return $criteria;
        }
        $query = new ChildOrderdetailsQuery();
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
     * @return ChildOrderdetails|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Orderdetails object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Orderdetails object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Orderdetails object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Orderdetails object has no primary key');
    }

    /**
     * Filter the query on the id_order_details column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOrderDetails(1234); // WHERE id_order_details = 1234
     * $query->filterByIdOrderDetails(array(12, 34)); // WHERE id_order_details IN (12, 34)
     * $query->filterByIdOrderDetails(array('min' => 12)); // WHERE id_order_details > 12
     * </code>
     *
     * @param     mixed $idOrderDetails The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByIdOrderDetails($idOrderDetails = null, $comparison = null)
    {
        if (is_array($idOrderDetails)) {
            $useMinMax = false;
            if (isset($idOrderDetails['min'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_ID_ORDER_DETAILS, $idOrderDetails['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOrderDetails['max'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_ID_ORDER_DETAILS, $idOrderDetails['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderdetailsTableMap::COL_ID_ORDER_DETAILS, $idOrderDetails, $comparison);
    }

    /**
     * Filter the query on the id_order column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOrder(1234); // WHERE id_order = 1234
     * $query->filterByIdOrder(array(12, 34)); // WHERE id_order IN (12, 34)
     * $query->filterByIdOrder(array('min' => 12)); // WHERE id_order > 12
     * </code>
     *
     * @see       filterByOrders()
     *
     * @param     mixed $idOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByIdOrder($idOrder = null, $comparison = null)
    {
        if (is_array($idOrder)) {
            $useMinMax = false;
            if (isset($idOrder['min'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_ID_ORDER, $idOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOrder['max'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_ID_ORDER, $idOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderdetailsTableMap::COL_ID_ORDER, $idOrder, $comparison);
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
     * @see       filterByProducts()
     *
     * @param     mixed $idProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByIdProduct($idProduct = null, $comparison = null)
    {
        if (is_array($idProduct)) {
            $useMinMax = false;
            if (isset($idProduct['min'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_ID_PRODUCT, $idProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProduct['max'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_ID_PRODUCT, $idProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderdetailsTableMap::COL_ID_PRODUCT, $idProduct, $comparison);
    }

    /**
     * Filter the query on the product_unit_price column
     *
     * Example usage:
     * <code>
     * $query->filterByProductUnitPrice(1234); // WHERE product_unit_price = 1234
     * $query->filterByProductUnitPrice(array(12, 34)); // WHERE product_unit_price IN (12, 34)
     * $query->filterByProductUnitPrice(array('min' => 12)); // WHERE product_unit_price > 12
     * </code>
     *
     * @param     mixed $productUnitPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByProductUnitPrice($productUnitPrice = null, $comparison = null)
    {
        if (is_array($productUnitPrice)) {
            $useMinMax = false;
            if (isset($productUnitPrice['min'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_PRODUCT_UNIT_PRICE, $productUnitPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productUnitPrice['max'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_PRODUCT_UNIT_PRICE, $productUnitPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderdetailsTableMap::COL_PRODUCT_UNIT_PRICE, $productUnitPrice, $comparison);
    }

    /**
     * Filter the query on the product_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByProductQuantity(1234); // WHERE product_quantity = 1234
     * $query->filterByProductQuantity(array(12, 34)); // WHERE product_quantity IN (12, 34)
     * $query->filterByProductQuantity(array('min' => 12)); // WHERE product_quantity > 12
     * </code>
     *
     * @param     mixed $productQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByProductQuantity($productQuantity = null, $comparison = null)
    {
        if (is_array($productQuantity)) {
            $useMinMax = false;
            if (isset($productQuantity['min'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_PRODUCT_QUANTITY, $productQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productQuantity['max'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_PRODUCT_QUANTITY, $productQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderdetailsTableMap::COL_PRODUCT_QUANTITY, $productQuantity, $comparison);
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
     * @see       filterByServices()
     *
     * @param     mixed $idService The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByIdService($idService = null, $comparison = null)
    {
        if (is_array($idService)) {
            $useMinMax = false;
            if (isset($idService['min'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_ID_SERVICE, $idService['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idService['max'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_ID_SERVICE, $idService['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderdetailsTableMap::COL_ID_SERVICE, $idService, $comparison);
    }

    /**
     * Filter the query on the service_unit_price column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceUnitPrice(1234); // WHERE service_unit_price = 1234
     * $query->filterByServiceUnitPrice(array(12, 34)); // WHERE service_unit_price IN (12, 34)
     * $query->filterByServiceUnitPrice(array('min' => 12)); // WHERE service_unit_price > 12
     * </code>
     *
     * @param     mixed $serviceUnitPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByServiceUnitPrice($serviceUnitPrice = null, $comparison = null)
    {
        if (is_array($serviceUnitPrice)) {
            $useMinMax = false;
            if (isset($serviceUnitPrice['min'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_SERVICE_UNIT_PRICE, $serviceUnitPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceUnitPrice['max'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_SERVICE_UNIT_PRICE, $serviceUnitPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderdetailsTableMap::COL_SERVICE_UNIT_PRICE, $serviceUnitPrice, $comparison);
    }

    /**
     * Filter the query on the service_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceQuantity(1234); // WHERE service_quantity = 1234
     * $query->filterByServiceQuantity(array(12, 34)); // WHERE service_quantity IN (12, 34)
     * $query->filterByServiceQuantity(array('min' => 12)); // WHERE service_quantity > 12
     * </code>
     *
     * @param     mixed $serviceQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByServiceQuantity($serviceQuantity = null, $comparison = null)
    {
        if (is_array($serviceQuantity)) {
            $useMinMax = false;
            if (isset($serviceQuantity['min'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_SERVICE_QUANTITY, $serviceQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceQuantity['max'])) {
                $this->addUsingAlias(OrderdetailsTableMap::COL_SERVICE_QUANTITY, $serviceQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderdetailsTableMap::COL_SERVICE_QUANTITY, $serviceQuantity, $comparison);
    }

    /**
     * Filter the query by a related \Model\Propel\Orders object
     *
     * @param \Model\Propel\Orders|ObjectCollection $orders The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByOrders($orders, $comparison = null)
    {
        if ($orders instanceof \Model\Propel\Orders) {
            return $this
                ->addUsingAlias(OrderdetailsTableMap::COL_ID_ORDER, $orders->getIdOrder(), $comparison);
        } elseif ($orders instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderdetailsTableMap::COL_ID_ORDER, $orders->toKeyValue('PrimaryKey', 'IdOrder'), $comparison);
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
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function joinOrders($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useOrdersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrders($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orders', '\Model\Propel\OrdersQuery');
    }

    /**
     * Filter the query by a related \Model\Propel\Products object
     *
     * @param \Model\Propel\Products|ObjectCollection $products The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByProducts($products, $comparison = null)
    {
        if ($products instanceof \Model\Propel\Products) {
            return $this
                ->addUsingAlias(OrderdetailsTableMap::COL_ID_PRODUCT, $products->getIdProduct(), $comparison);
        } elseif ($products instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderdetailsTableMap::COL_ID_PRODUCT, $products->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
        } else {
            throw new PropelException('filterByProducts() only accepts arguments of type \Model\Propel\Products or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Products relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function joinProducts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Products');

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
            $this->addJoinObject($join, 'Products');
        }

        return $this;
    }

    /**
     * Use the Products relation Products object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Propel\ProductsQuery A secondary query class using the current class as primary query
     */
    public function useProductsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProducts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Products', '\Model\Propel\ProductsQuery');
    }

    /**
     * Filter the query by a related \Model\Propel\Services object
     *
     * @param \Model\Propel\Services|ObjectCollection $services The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function filterByServices($services, $comparison = null)
    {
        if ($services instanceof \Model\Propel\Services) {
            return $this
                ->addUsingAlias(OrderdetailsTableMap::COL_ID_SERVICE, $services->getIdService(), $comparison);
        } elseif ($services instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderdetailsTableMap::COL_ID_SERVICE, $services->toKeyValue('PrimaryKey', 'IdService'), $comparison);
        } else {
            throw new PropelException('filterByServices() only accepts arguments of type \Model\Propel\Services or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Services relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function joinServices($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Services');

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
            $this->addJoinObject($join, 'Services');
        }

        return $this;
    }

    /**
     * Use the Services relation Services object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Propel\ServicesQuery A secondary query class using the current class as primary query
     */
    public function useServicesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinServices($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Services', '\Model\Propel\ServicesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrderdetails $orderdetails Object to remove from the list of results
     *
     * @return $this|ChildOrderdetailsQuery The current query, for fluid interface
     */
    public function prune($orderdetails = null)
    {
        if ($orderdetails) {
            throw new LogicException('Orderdetails object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the orderdetails table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderdetailsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrderdetailsTableMap::clearInstancePool();
            OrderdetailsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrderdetailsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrderdetailsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrderdetailsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrderdetailsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrderdetailsQuery
