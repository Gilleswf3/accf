<?php

namespace Model\Propel\Base;

use \Exception;
use \PDO;
use Model\Propel\Agencies as ChildAgencies;
use Model\Propel\AgenciesQuery as ChildAgenciesQuery;
use Model\Propel\Map\AgenciesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'agencies' table.
 *
 *
 *
 * @method     ChildAgenciesQuery orderByIdAgency($order = Criteria::ASC) Order by the id_agency column
 * @method     ChildAgenciesQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildAgenciesQuery orderByZipcode($order = Criteria::ASC) Order by the zipcode column
 * @method     ChildAgenciesQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildAgenciesQuery orderByArea($order = Criteria::ASC) Order by the area column
 *
 * @method     ChildAgenciesQuery groupByIdAgency() Group by the id_agency column
 * @method     ChildAgenciesQuery groupByAddress() Group by the address column
 * @method     ChildAgenciesQuery groupByZipcode() Group by the zipcode column
 * @method     ChildAgenciesQuery groupByCity() Group by the city column
 * @method     ChildAgenciesQuery groupByArea() Group by the area column
 *
 * @method     ChildAgenciesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAgenciesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAgenciesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAgenciesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAgenciesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAgenciesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAgenciesQuery leftJoinEmployees($relationAlias = null) Adds a LEFT JOIN clause to the query using the Employees relation
 * @method     ChildAgenciesQuery rightJoinEmployees($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Employees relation
 * @method     ChildAgenciesQuery innerJoinEmployees($relationAlias = null) Adds a INNER JOIN clause to the query using the Employees relation
 *
 * @method     ChildAgenciesQuery joinWithEmployees($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Employees relation
 *
 * @method     ChildAgenciesQuery leftJoinWithEmployees() Adds a LEFT JOIN clause and with to the query using the Employees relation
 * @method     ChildAgenciesQuery rightJoinWithEmployees() Adds a RIGHT JOIN clause and with to the query using the Employees relation
 * @method     ChildAgenciesQuery innerJoinWithEmployees() Adds a INNER JOIN clause and with to the query using the Employees relation
 *
 * @method     \Model\Propel\EmployeesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAgencies findOne(ConnectionInterface $con = null) Return the first ChildAgencies matching the query
 * @method     ChildAgencies findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAgencies matching the query, or a new ChildAgencies object populated from the query conditions when no match is found
 *
 * @method     ChildAgencies findOneByIdAgency(int $id_agency) Return the first ChildAgencies filtered by the id_agency column
 * @method     ChildAgencies findOneByAddress(string $address) Return the first ChildAgencies filtered by the address column
 * @method     ChildAgencies findOneByZipcode(string $zipcode) Return the first ChildAgencies filtered by the zipcode column
 * @method     ChildAgencies findOneByCity(string $city) Return the first ChildAgencies filtered by the city column
 * @method     ChildAgencies findOneByArea(string $area) Return the first ChildAgencies filtered by the area column *

 * @method     ChildAgencies requirePk($key, ConnectionInterface $con = null) Return the ChildAgencies by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgencies requireOne(ConnectionInterface $con = null) Return the first ChildAgencies matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAgencies requireOneByIdAgency(int $id_agency) Return the first ChildAgencies filtered by the id_agency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgencies requireOneByAddress(string $address) Return the first ChildAgencies filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgencies requireOneByZipcode(string $zipcode) Return the first ChildAgencies filtered by the zipcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgencies requireOneByCity(string $city) Return the first ChildAgencies filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgencies requireOneByArea(string $area) Return the first ChildAgencies filtered by the area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAgencies[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAgencies objects based on current ModelCriteria
 * @method     ChildAgencies[]|ObjectCollection findByIdAgency(int $id_agency) Return ChildAgencies objects filtered by the id_agency column
 * @method     ChildAgencies[]|ObjectCollection findByAddress(string $address) Return ChildAgencies objects filtered by the address column
 * @method     ChildAgencies[]|ObjectCollection findByZipcode(string $zipcode) Return ChildAgencies objects filtered by the zipcode column
 * @method     ChildAgencies[]|ObjectCollection findByCity(string $city) Return ChildAgencies objects filtered by the city column
 * @method     ChildAgencies[]|ObjectCollection findByArea(string $area) Return ChildAgencies objects filtered by the area column
 * @method     ChildAgencies[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AgenciesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Propel\Base\AgenciesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Propel\\Agencies', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAgenciesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAgenciesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAgenciesQuery) {
            return $criteria;
        }
        $query = new ChildAgenciesQuery();
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
     * @return ChildAgencies|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AgenciesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AgenciesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAgencies A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_agency, address, zipcode, city, area FROM agencies WHERE id_agency = :p0';
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
            /** @var ChildAgencies $obj */
            $obj = new ChildAgencies();
            $obj->hydrate($row);
            AgenciesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAgencies|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAgenciesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AgenciesTableMap::COL_ID_AGENCY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAgenciesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AgenciesTableMap::COL_ID_AGENCY, $keys, Criteria::IN);
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
     * @param     mixed $idAgency The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgenciesQuery The current query, for fluid interface
     */
    public function filterByIdAgency($idAgency = null, $comparison = null)
    {
        if (is_array($idAgency)) {
            $useMinMax = false;
            if (isset($idAgency['min'])) {
                $this->addUsingAlias(AgenciesTableMap::COL_ID_AGENCY, $idAgency['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAgency['max'])) {
                $this->addUsingAlias(AgenciesTableMap::COL_ID_AGENCY, $idAgency['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgenciesTableMap::COL_ID_AGENCY, $idAgency, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgenciesQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgenciesTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByZipcode('fooValue');   // WHERE zipcode = 'fooValue'
     * $query->filterByZipcode('%fooValue%', Criteria::LIKE); // WHERE zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgenciesQuery The current query, for fluid interface
     */
    public function filterByZipcode($zipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgenciesTableMap::COL_ZIPCODE, $zipcode, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgenciesQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgenciesTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the area column
     *
     * Example usage:
     * <code>
     * $query->filterByArea('fooValue');   // WHERE area = 'fooValue'
     * $query->filterByArea('%fooValue%', Criteria::LIKE); // WHERE area LIKE '%fooValue%'
     * </code>
     *
     * @param     string $area The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgenciesQuery The current query, for fluid interface
     */
    public function filterByArea($area = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($area)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgenciesTableMap::COL_AREA, $area, $comparison);
    }

    /**
     * Filter the query by a related \Model\Propel\Employees object
     *
     * @param \Model\Propel\Employees|ObjectCollection $employees the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAgenciesQuery The current query, for fluid interface
     */
    public function filterByEmployees($employees, $comparison = null)
    {
        if ($employees instanceof \Model\Propel\Employees) {
            return $this
                ->addUsingAlias(AgenciesTableMap::COL_ID_AGENCY, $employees->getIdAgency(), $comparison);
        } elseif ($employees instanceof ObjectCollection) {
            return $this
                ->useEmployeesQuery()
                ->filterByPrimaryKeys($employees->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEmployees() only accepts arguments of type \Model\Propel\Employees or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Employees relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAgenciesQuery The current query, for fluid interface
     */
    public function joinEmployees($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Employees');

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
            $this->addJoinObject($join, 'Employees');
        }

        return $this;
    }

    /**
     * Use the Employees relation Employees object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Propel\EmployeesQuery A secondary query class using the current class as primary query
     */
    public function useEmployeesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEmployees($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Employees', '\Model\Propel\EmployeesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAgencies $agencies Object to remove from the list of results
     *
     * @return $this|ChildAgenciesQuery The current query, for fluid interface
     */
    public function prune($agencies = null)
    {
        if ($agencies) {
            $this->addUsingAlias(AgenciesTableMap::COL_ID_AGENCY, $agencies->getIdAgency(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the agencies table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AgenciesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AgenciesTableMap::clearInstancePool();
            AgenciesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AgenciesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AgenciesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AgenciesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AgenciesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AgenciesQuery
