<?php

namespace Base;

use \Customers as ChildCustomers;
use \CustomersQuery as ChildCustomersQuery;
use \Exception;
use \PDO;
use Map\CustomersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'customers' table.
 *
 *
 *
 * @method     ChildCustomersQuery orderByIdCustomer($order = Criteria::ASC) Order by the id_customer column
 * @method     ChildCustomersQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     ChildCustomersQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildCustomersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildCustomersQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildCustomersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildCustomersQuery orderByJob($order = Criteria::ASC) Order by the job column
 * @method     ChildCustomersQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildCustomersQuery orderByBilltoAddress($order = Criteria::ASC) Order by the billto_address column
 * @method     ChildCustomersQuery orderByBilltoZipcode($order = Criteria::ASC) Order by the billto_zipcode column
 * @method     ChildCustomersQuery orderByBilltoCity($order = Criteria::ASC) Order by the billto_city column
 * @method     ChildCustomersQuery orderByShiptoAddress($order = Criteria::ASC) Order by the shipto_address column
 * @method     ChildCustomersQuery orderByShiptoZipcode($order = Criteria::ASC) Order by the shipto_zipcode column
 * @method     ChildCustomersQuery orderByShiptoCity($order = Criteria::ASC) Order by the shipto_city column
 *
 * @method     ChildCustomersQuery groupByIdCustomer() Group by the id_customer column
 * @method     ChildCustomersQuery groupByFirstname() Group by the firstname column
 * @method     ChildCustomersQuery groupByLastname() Group by the lastname column
 * @method     ChildCustomersQuery groupByEmail() Group by the email column
 * @method     ChildCustomersQuery groupByPhone() Group by the phone column
 * @method     ChildCustomersQuery groupByPassword() Group by the password column
 * @method     ChildCustomersQuery groupByJob() Group by the job column
 * @method     ChildCustomersQuery groupByCompany() Group by the company column
 * @method     ChildCustomersQuery groupByBilltoAddress() Group by the billto_address column
 * @method     ChildCustomersQuery groupByBilltoZipcode() Group by the billto_zipcode column
 * @method     ChildCustomersQuery groupByBilltoCity() Group by the billto_city column
 * @method     ChildCustomersQuery groupByShiptoAddress() Group by the shipto_address column
 * @method     ChildCustomersQuery groupByShiptoZipcode() Group by the shipto_zipcode column
 * @method     ChildCustomersQuery groupByShiptoCity() Group by the shipto_city column
 *
 * @method     ChildCustomersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustomersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustomersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustomersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCustomersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCustomersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCustomersQuery leftJoinHotline($relationAlias = null) Adds a LEFT JOIN clause to the query using the Hotline relation
 * @method     ChildCustomersQuery rightJoinHotline($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Hotline relation
 * @method     ChildCustomersQuery innerJoinHotline($relationAlias = null) Adds a INNER JOIN clause to the query using the Hotline relation
 *
 * @method     ChildCustomersQuery joinWithHotline($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Hotline relation
 *
 * @method     ChildCustomersQuery leftJoinWithHotline() Adds a LEFT JOIN clause and with to the query using the Hotline relation
 * @method     ChildCustomersQuery rightJoinWithHotline() Adds a RIGHT JOIN clause and with to the query using the Hotline relation
 * @method     ChildCustomersQuery innerJoinWithHotline() Adds a INNER JOIN clause and with to the query using the Hotline relation
 *
 * @method     ChildCustomersQuery leftJoinOrders($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orders relation
 * @method     ChildCustomersQuery rightJoinOrders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orders relation
 * @method     ChildCustomersQuery innerJoinOrders($relationAlias = null) Adds a INNER JOIN clause to the query using the Orders relation
 *
 * @method     ChildCustomersQuery joinWithOrders($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Orders relation
 *
 * @method     ChildCustomersQuery leftJoinWithOrders() Adds a LEFT JOIN clause and with to the query using the Orders relation
 * @method     ChildCustomersQuery rightJoinWithOrders() Adds a RIGHT JOIN clause and with to the query using the Orders relation
 * @method     ChildCustomersQuery innerJoinWithOrders() Adds a INNER JOIN clause and with to the query using the Orders relation
 *
 * @method     \HotlineQuery|\OrdersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCustomers findOne(ConnectionInterface $con = null) Return the first ChildCustomers matching the query
 * @method     ChildCustomers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCustomers matching the query, or a new ChildCustomers object populated from the query conditions when no match is found
 *
 * @method     ChildCustomers findOneByIdCustomer(int $id_customer) Return the first ChildCustomers filtered by the id_customer column
 * @method     ChildCustomers findOneByFirstname(string $firstname) Return the first ChildCustomers filtered by the firstname column
 * @method     ChildCustomers findOneByLastname(string $lastname) Return the first ChildCustomers filtered by the lastname column
 * @method     ChildCustomers findOneByEmail(string $email) Return the first ChildCustomers filtered by the email column
 * @method     ChildCustomers findOneByPhone(string $phone) Return the first ChildCustomers filtered by the phone column
 * @method     ChildCustomers findOneByPassword(string $password) Return the first ChildCustomers filtered by the password column
 * @method     ChildCustomers findOneByJob(string $job) Return the first ChildCustomers filtered by the job column
 * @method     ChildCustomers findOneByCompany(string $company) Return the first ChildCustomers filtered by the company column
 * @method     ChildCustomers findOneByBilltoAddress(string $billto_address) Return the first ChildCustomers filtered by the billto_address column
 * @method     ChildCustomers findOneByBilltoZipcode(string $billto_zipcode) Return the first ChildCustomers filtered by the billto_zipcode column
 * @method     ChildCustomers findOneByBilltoCity(string $billto_city) Return the first ChildCustomers filtered by the billto_city column
 * @method     ChildCustomers findOneByShiptoAddress(string $shipto_address) Return the first ChildCustomers filtered by the shipto_address column
 * @method     ChildCustomers findOneByShiptoZipcode(string $shipto_zipcode) Return the first ChildCustomers filtered by the shipto_zipcode column
 * @method     ChildCustomers findOneByShiptoCity(string $shipto_city) Return the first ChildCustomers filtered by the shipto_city column *

 * @method     ChildCustomers requirePk($key, ConnectionInterface $con = null) Return the ChildCustomers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOne(ConnectionInterface $con = null) Return the first ChildCustomers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustomers requireOneByIdCustomer(int $id_customer) Return the first ChildCustomers filtered by the id_customer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByFirstname(string $firstname) Return the first ChildCustomers filtered by the firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByLastname(string $lastname) Return the first ChildCustomers filtered by the lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByEmail(string $email) Return the first ChildCustomers filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByPhone(string $phone) Return the first ChildCustomers filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByPassword(string $password) Return the first ChildCustomers filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByJob(string $job) Return the first ChildCustomers filtered by the job column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByCompany(string $company) Return the first ChildCustomers filtered by the company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByBilltoAddress(string $billto_address) Return the first ChildCustomers filtered by the billto_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByBilltoZipcode(string $billto_zipcode) Return the first ChildCustomers filtered by the billto_zipcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByBilltoCity(string $billto_city) Return the first ChildCustomers filtered by the billto_city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByShiptoAddress(string $shipto_address) Return the first ChildCustomers filtered by the shipto_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByShiptoZipcode(string $shipto_zipcode) Return the first ChildCustomers filtered by the shipto_zipcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustomers requireOneByShiptoCity(string $shipto_city) Return the first ChildCustomers filtered by the shipto_city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustomers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCustomers objects based on current ModelCriteria
 * @method     ChildCustomers[]|ObjectCollection findByIdCustomer(int $id_customer) Return ChildCustomers objects filtered by the id_customer column
 * @method     ChildCustomers[]|ObjectCollection findByFirstname(string $firstname) Return ChildCustomers objects filtered by the firstname column
 * @method     ChildCustomers[]|ObjectCollection findByLastname(string $lastname) Return ChildCustomers objects filtered by the lastname column
 * @method     ChildCustomers[]|ObjectCollection findByEmail(string $email) Return ChildCustomers objects filtered by the email column
 * @method     ChildCustomers[]|ObjectCollection findByPhone(string $phone) Return ChildCustomers objects filtered by the phone column
 * @method     ChildCustomers[]|ObjectCollection findByPassword(string $password) Return ChildCustomers objects filtered by the password column
 * @method     ChildCustomers[]|ObjectCollection findByJob(string $job) Return ChildCustomers objects filtered by the job column
 * @method     ChildCustomers[]|ObjectCollection findByCompany(string $company) Return ChildCustomers objects filtered by the company column
 * @method     ChildCustomers[]|ObjectCollection findByBilltoAddress(string $billto_address) Return ChildCustomers objects filtered by the billto_address column
 * @method     ChildCustomers[]|ObjectCollection findByBilltoZipcode(string $billto_zipcode) Return ChildCustomers objects filtered by the billto_zipcode column
 * @method     ChildCustomers[]|ObjectCollection findByBilltoCity(string $billto_city) Return ChildCustomers objects filtered by the billto_city column
 * @method     ChildCustomers[]|ObjectCollection findByShiptoAddress(string $shipto_address) Return ChildCustomers objects filtered by the shipto_address column
 * @method     ChildCustomers[]|ObjectCollection findByShiptoZipcode(string $shipto_zipcode) Return ChildCustomers objects filtered by the shipto_zipcode column
 * @method     ChildCustomers[]|ObjectCollection findByShiptoCity(string $shipto_city) Return ChildCustomers objects filtered by the shipto_city column
 * @method     ChildCustomers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CustomersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CustomersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Customers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustomersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustomersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCustomersQuery) {
            return $criteria;
        }
        $query = new ChildCustomersQuery();
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
     * @return ChildCustomers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustomersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CustomersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCustomers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_customer, firstname, lastname, email, phone, password, job, company, billto_address, billto_zipcode, billto_city, shipto_address, shipto_zipcode, shipto_city FROM customers WHERE id_customer = :p0';
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
            /** @var ChildCustomers $obj */
            $obj = new ChildCustomers();
            $obj->hydrate($row);
            CustomersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCustomers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CustomersTableMap::COL_ID_CUSTOMER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CustomersTableMap::COL_ID_CUSTOMER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCustomer(1234); // WHERE id_customer = 1234
     * $query->filterByIdCustomer(array(12, 34)); // WHERE id_customer IN (12, 34)
     * $query->filterByIdCustomer(array('min' => 12)); // WHERE id_customer > 12
     * </code>
     *
     * @param     mixed $idCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByIdCustomer($idCustomer = null, $comparison = null)
    {
        if (is_array($idCustomer)) {
            $useMinMax = false;
            if (isset($idCustomer['min'])) {
                $this->addUsingAlias(CustomersTableMap::COL_ID_CUSTOMER, $idCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCustomer['max'])) {
                $this->addUsingAlias(CustomersTableMap::COL_ID_CUSTOMER, $idCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_ID_CUSTOMER, $idCustomer, $comparison);
    }

    /**
     * Filter the query on the firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstname = 'fooValue'
     * $query->filterByFirstname('%fooValue%', Criteria::LIKE); // WHERE firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%', Criteria::LIKE); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the job column
     *
     * Example usage:
     * <code>
     * $query->filterByJob('fooValue');   // WHERE job = 'fooValue'
     * $query->filterByJob('%fooValue%', Criteria::LIKE); // WHERE job LIKE '%fooValue%'
     * </code>
     *
     * @param     string $job The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByJob($job = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($job)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_JOB, $job, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%', Criteria::LIKE); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $company The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_COMPANY, $company, $comparison);
    }

    /**
     * Filter the query on the billto_address column
     *
     * Example usage:
     * <code>
     * $query->filterByBilltoAddress('fooValue');   // WHERE billto_address = 'fooValue'
     * $query->filterByBilltoAddress('%fooValue%', Criteria::LIKE); // WHERE billto_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billtoAddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByBilltoAddress($billtoAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billtoAddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_BILLTO_ADDRESS, $billtoAddress, $comparison);
    }

    /**
     * Filter the query on the billto_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBilltoZipcode('fooValue');   // WHERE billto_zipcode = 'fooValue'
     * $query->filterByBilltoZipcode('%fooValue%', Criteria::LIKE); // WHERE billto_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billtoZipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByBilltoZipcode($billtoZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billtoZipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_BILLTO_ZIPCODE, $billtoZipcode, $comparison);
    }

    /**
     * Filter the query on the billto_city column
     *
     * Example usage:
     * <code>
     * $query->filterByBilltoCity('fooValue');   // WHERE billto_city = 'fooValue'
     * $query->filterByBilltoCity('%fooValue%', Criteria::LIKE); // WHERE billto_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billtoCity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByBilltoCity($billtoCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billtoCity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_BILLTO_CITY, $billtoCity, $comparison);
    }

    /**
     * Filter the query on the shipto_address column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoAddress('fooValue');   // WHERE shipto_address = 'fooValue'
     * $query->filterByShiptoAddress('%fooValue%', Criteria::LIKE); // WHERE shipto_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoAddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByShiptoAddress($shiptoAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoAddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_SHIPTO_ADDRESS, $shiptoAddress, $comparison);
    }

    /**
     * Filter the query on the shipto_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoZipcode('fooValue');   // WHERE shipto_zipcode = 'fooValue'
     * $query->filterByShiptoZipcode('%fooValue%', Criteria::LIKE); // WHERE shipto_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoZipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByShiptoZipcode($shiptoZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoZipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_SHIPTO_ZIPCODE, $shiptoZipcode, $comparison);
    }

    /**
     * Filter the query on the shipto_city column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoCity('fooValue');   // WHERE shipto_city = 'fooValue'
     * $query->filterByShiptoCity('%fooValue%', Criteria::LIKE); // WHERE shipto_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoCity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByShiptoCity($shiptoCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoCity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomersTableMap::COL_SHIPTO_CITY, $shiptoCity, $comparison);
    }

    /**
     * Filter the query by a related \Hotline object
     *
     * @param \Hotline|ObjectCollection $hotline the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByHotline($hotline, $comparison = null)
    {
        if ($hotline instanceof \Hotline) {
            return $this
                ->addUsingAlias(CustomersTableMap::COL_ID_CUSTOMER, $hotline->getIdCustomer(), $comparison);
        } elseif ($hotline instanceof ObjectCollection) {
            return $this
                ->useHotlineQuery()
                ->filterByPrimaryKeys($hotline->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHotline() only accepts arguments of type \Hotline or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Hotline relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function joinHotline($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Hotline');

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
            $this->addJoinObject($join, 'Hotline');
        }

        return $this;
    }

    /**
     * Use the Hotline relation Hotline object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HotlineQuery A secondary query class using the current class as primary query
     */
    public function useHotlineQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHotline($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Hotline', '\HotlineQuery');
    }

    /**
     * Filter the query by a related \Orders object
     *
     * @param \Orders|ObjectCollection $orders the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomersQuery The current query, for fluid interface
     */
    public function filterByOrders($orders, $comparison = null)
    {
        if ($orders instanceof \Orders) {
            return $this
                ->addUsingAlias(CustomersTableMap::COL_ID_CUSTOMER, $orders->getIdCustomer(), $comparison);
        } elseif ($orders instanceof ObjectCollection) {
            return $this
                ->useOrdersQuery()
                ->filterByPrimaryKeys($orders->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrders() only accepts arguments of type \Orders or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orders relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
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
     * @return \OrdersQuery A secondary query class using the current class as primary query
     */
    public function useOrdersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrders($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orders', '\OrdersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCustomers $customers Object to remove from the list of results
     *
     * @return $this|ChildCustomersQuery The current query, for fluid interface
     */
    public function prune($customers = null)
    {
        if ($customers) {
            $this->addUsingAlias(CustomersTableMap::COL_ID_CUSTOMER, $customers->getIdCustomer(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the customers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CustomersTableMap::clearInstancePool();
            CustomersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CustomersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustomersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CustomersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustomersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CustomersQuery
