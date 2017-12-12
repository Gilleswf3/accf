<?php

namespace Model\Propel\Base;

use \Exception;
use \PDO;
use Model\Propel\Employees as ChildEmployees;
use Model\Propel\EmployeesQuery as ChildEmployeesQuery;
use Model\Propel\Map\EmployeesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'employees' table.
 *
 *
 *
 * @method     ChildEmployeesQuery orderByIdEmployee($order = Criteria::ASC) Order by the id_employee column
 * @method     ChildEmployeesQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     ChildEmployeesQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildEmployeesQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildEmployeesQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildEmployeesQuery orderByJob($order = Criteria::ASC) Order by the job column
 * @method     ChildEmployeesQuery orderByPicture($order = Criteria::ASC) Order by the picture column
 * @method     ChildEmployeesQuery orderByRole($order = Criteria::ASC) Order by the role column
 * @method     ChildEmployeesQuery orderByIdAgency($order = Criteria::ASC) Order by the id_agency column
 *
 * @method     ChildEmployeesQuery groupByIdEmployee() Group by the id_employee column
 * @method     ChildEmployeesQuery groupByFirstname() Group by the firstname column
 * @method     ChildEmployeesQuery groupByLastname() Group by the lastname column
 * @method     ChildEmployeesQuery groupByEmail() Group by the email column
 * @method     ChildEmployeesQuery groupByPhone() Group by the phone column
 * @method     ChildEmployeesQuery groupByJob() Group by the job column
 * @method     ChildEmployeesQuery groupByPicture() Group by the picture column
 * @method     ChildEmployeesQuery groupByRole() Group by the role column
 * @method     ChildEmployeesQuery groupByIdAgency() Group by the id_agency column
 *
 * @method     ChildEmployeesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEmployeesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEmployeesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEmployeesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEmployeesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEmployeesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEmployeesQuery leftJoinAgencies($relationAlias = null) Adds a LEFT JOIN clause to the query using the Agencies relation
 * @method     ChildEmployeesQuery rightJoinAgencies($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Agencies relation
 * @method     ChildEmployeesQuery innerJoinAgencies($relationAlias = null) Adds a INNER JOIN clause to the query using the Agencies relation
 *
 * @method     ChildEmployeesQuery joinWithAgencies($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Agencies relation
 *
 * @method     ChildEmployeesQuery leftJoinWithAgencies() Adds a LEFT JOIN clause and with to the query using the Agencies relation
 * @method     ChildEmployeesQuery rightJoinWithAgencies() Adds a RIGHT JOIN clause and with to the query using the Agencies relation
 * @method     ChildEmployeesQuery innerJoinWithAgencies() Adds a INNER JOIN clause and with to the query using the Agencies relation
 *
 * @method     ChildEmployeesQuery leftJoinStandards($relationAlias = null) Adds a LEFT JOIN clause to the query using the Standards relation
 * @method     ChildEmployeesQuery rightJoinStandards($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Standards relation
 * @method     ChildEmployeesQuery innerJoinStandards($relationAlias = null) Adds a INNER JOIN clause to the query using the Standards relation
 *
 * @method     ChildEmployeesQuery joinWithStandards($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Standards relation
 *
 * @method     ChildEmployeesQuery leftJoinWithStandards() Adds a LEFT JOIN clause and with to the query using the Standards relation
 * @method     ChildEmployeesQuery rightJoinWithStandards() Adds a RIGHT JOIN clause and with to the query using the Standards relation
 * @method     ChildEmployeesQuery innerJoinWithStandards() Adds a INNER JOIN clause and with to the query using the Standards relation
 *
 * @method     \Model\Propel\AgenciesQuery|\Model\Propel\StandardsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEmployees findOne(ConnectionInterface $con = null) Return the first ChildEmployees matching the query
 * @method     ChildEmployees findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEmployees matching the query, or a new ChildEmployees object populated from the query conditions when no match is found
 *
 * @method     ChildEmployees findOneByIdEmployee(int $id_employee) Return the first ChildEmployees filtered by the id_employee column
 * @method     ChildEmployees findOneByFirstname(string $firstname) Return the first ChildEmployees filtered by the firstname column
 * @method     ChildEmployees findOneByLastname(string $lastname) Return the first ChildEmployees filtered by the lastname column
 * @method     ChildEmployees findOneByEmail(string $email) Return the first ChildEmployees filtered by the email column
 * @method     ChildEmployees findOneByPhone(string $phone) Return the first ChildEmployees filtered by the phone column
 * @method     ChildEmployees findOneByJob(string $job) Return the first ChildEmployees filtered by the job column
 * @method     ChildEmployees findOneByPicture(string $picture) Return the first ChildEmployees filtered by the picture column
 * @method     ChildEmployees findOneByRole(string $role) Return the first ChildEmployees filtered by the role column
 * @method     ChildEmployees findOneByIdAgency(int $id_agency) Return the first ChildEmployees filtered by the id_agency column *

 * @method     ChildEmployees requirePk($key, ConnectionInterface $con = null) Return the ChildEmployees by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployees requireOne(ConnectionInterface $con = null) Return the first ChildEmployees matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployees requireOneByIdEmployee(int $id_employee) Return the first ChildEmployees filtered by the id_employee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployees requireOneByFirstname(string $firstname) Return the first ChildEmployees filtered by the firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployees requireOneByLastname(string $lastname) Return the first ChildEmployees filtered by the lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployees requireOneByEmail(string $email) Return the first ChildEmployees filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployees requireOneByPhone(string $phone) Return the first ChildEmployees filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployees requireOneByJob(string $job) Return the first ChildEmployees filtered by the job column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployees requireOneByPicture(string $picture) Return the first ChildEmployees filtered by the picture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployees requireOneByRole(string $role) Return the first ChildEmployees filtered by the role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployees requireOneByIdAgency(int $id_agency) Return the first ChildEmployees filtered by the id_agency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployees[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEmployees objects based on current ModelCriteria
 * @method     ChildEmployees[]|ObjectCollection findByIdEmployee(int $id_employee) Return ChildEmployees objects filtered by the id_employee column
 * @method     ChildEmployees[]|ObjectCollection findByFirstname(string $firstname) Return ChildEmployees objects filtered by the firstname column
 * @method     ChildEmployees[]|ObjectCollection findByLastname(string $lastname) Return ChildEmployees objects filtered by the lastname column
 * @method     ChildEmployees[]|ObjectCollection findByEmail(string $email) Return ChildEmployees objects filtered by the email column
 * @method     ChildEmployees[]|ObjectCollection findByPhone(string $phone) Return ChildEmployees objects filtered by the phone column
 * @method     ChildEmployees[]|ObjectCollection findByJob(string $job) Return ChildEmployees objects filtered by the job column
 * @method     ChildEmployees[]|ObjectCollection findByPicture(string $picture) Return ChildEmployees objects filtered by the picture column
 * @method     ChildEmployees[]|ObjectCollection findByRole(string $role) Return ChildEmployees objects filtered by the role column
 * @method     ChildEmployees[]|ObjectCollection findByIdAgency(int $id_agency) Return ChildEmployees objects filtered by the id_agency column
 * @method     ChildEmployees[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EmployeesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Propel\Base\EmployeesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Propel\\Employees', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEmployeesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEmployeesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEmployeesQuery) {
            return $criteria;
        }
        $query = new ChildEmployeesQuery();
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
     * @return ChildEmployees|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EmployeesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EmployeesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEmployees A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_employee, firstname, lastname, email, phone, job, picture, role, id_agency FROM employees WHERE id_employee = :p0';
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
            /** @var ChildEmployees $obj */
            $obj = new ChildEmployees();
            $obj->hydrate($row);
            EmployeesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEmployees|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EmployeesTableMap::COL_ID_EMPLOYEE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EmployeesTableMap::COL_ID_EMPLOYEE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_employee column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEmployee(1234); // WHERE id_employee = 1234
     * $query->filterByIdEmployee(array(12, 34)); // WHERE id_employee IN (12, 34)
     * $query->filterByIdEmployee(array('min' => 12)); // WHERE id_employee > 12
     * </code>
     *
     * @param     mixed $idEmployee The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByIdEmployee($idEmployee = null, $comparison = null)
    {
        if (is_array($idEmployee)) {
            $useMinMax = false;
            if (isset($idEmployee['min'])) {
                $this->addUsingAlias(EmployeesTableMap::COL_ID_EMPLOYEE, $idEmployee['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEmployee['max'])) {
                $this->addUsingAlias(EmployeesTableMap::COL_ID_EMPLOYEE, $idEmployee['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::COL_ID_EMPLOYEE, $idEmployee, $comparison);
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
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::COL_FIRSTNAME, $firstname, $comparison);
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
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::COL_LASTNAME, $lastname, $comparison);
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
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::COL_PHONE, $phone, $comparison);
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
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByJob($job = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($job)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::COL_JOB, $job, $comparison);
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
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByPicture($picture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($picture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::COL_PICTURE, $picture, $comparison);
    }

    /**
     * Filter the query on the role column
     *
     * Example usage:
     * <code>
     * $query->filterByRole('fooValue');   // WHERE role = 'fooValue'
     * $query->filterByRole('%fooValue%', Criteria::LIKE); // WHERE role LIKE '%fooValue%'
     * </code>
     *
     * @param     string $role The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByRole($role = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($role)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::COL_ROLE, $role, $comparison);
    }

    /**
     * Filter the query on the id_agency column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAgency(1234); // WHERE id_agency = 1234
     * $query->filterByIdAgency(array(12, 34)); // WHERE id_agency IN (12, 34)
     * $query->filterByIdAgency(array('min' => 12)); // WHERE id_agency > 12
     * </code>
     *
     * @see       filterByAgencies()
     *
     * @param     mixed $idAgency The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByIdAgency($idAgency = null, $comparison = null)
    {
        if (is_array($idAgency)) {
            $useMinMax = false;
            if (isset($idAgency['min'])) {
                $this->addUsingAlias(EmployeesTableMap::COL_ID_AGENCY, $idAgency['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAgency['max'])) {
                $this->addUsingAlias(EmployeesTableMap::COL_ID_AGENCY, $idAgency['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::COL_ID_AGENCY, $idAgency, $comparison);
    }

    /**
     * Filter the query by a related \Model\Propel\Agencies object
     *
     * @param \Model\Propel\Agencies|ObjectCollection $agencies The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByAgencies($agencies, $comparison = null)
    {
        if ($agencies instanceof \Model\Propel\Agencies) {
            return $this
                ->addUsingAlias(EmployeesTableMap::COL_ID_AGENCY, $agencies->getIdAgency(), $comparison);
        } elseif ($agencies instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EmployeesTableMap::COL_ID_AGENCY, $agencies->toKeyValue('PrimaryKey', 'IdAgency'), $comparison);
        } else {
            throw new PropelException('filterByAgencies() only accepts arguments of type \Model\Propel\Agencies or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Agencies relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function joinAgencies($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Agencies');

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
            $this->addJoinObject($join, 'Agencies');
        }

        return $this;
    }

    /**
     * Use the Agencies relation Agencies object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Propel\AgenciesQuery A secondary query class using the current class as primary query
     */
    public function useAgenciesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAgencies($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Agencies', '\Model\Propel\AgenciesQuery');
    }

    /**
     * Filter the query by a related \Model\Propel\Standards object
     *
     * @param \Model\Propel\Standards|ObjectCollection $standards the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByStandards($standards, $comparison = null)
    {
        if ($standards instanceof \Model\Propel\Standards) {
            return $this
                ->addUsingAlias(EmployeesTableMap::COL_ID_EMPLOYEE, $standards->getIdEmployee(), $comparison);
        } elseif ($standards instanceof ObjectCollection) {
            return $this
                ->useStandardsQuery()
                ->filterByPrimaryKeys($standards->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStandards() only accepts arguments of type \Model\Propel\Standards or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Standards relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function joinStandards($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Standards');

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
            $this->addJoinObject($join, 'Standards');
        }

        return $this;
    }

    /**
     * Use the Standards relation Standards object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Propel\StandardsQuery A secondary query class using the current class as primary query
     */
    public function useStandardsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStandards($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Standards', '\Model\Propel\StandardsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEmployees $employees Object to remove from the list of results
     *
     * @return $this|ChildEmployeesQuery The current query, for fluid interface
     */
    public function prune($employees = null)
    {
        if ($employees) {
            $this->addUsingAlias(EmployeesTableMap::COL_ID_EMPLOYEE, $employees->getIdEmployee(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the employees table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EmployeesTableMap::clearInstancePool();
            EmployeesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EmployeesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EmployeesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EmployeesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EmployeesQuery
