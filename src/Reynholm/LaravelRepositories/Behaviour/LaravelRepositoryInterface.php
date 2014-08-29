<?php

namespace Reynholm\LaravelRepositories\Behaviour;

use Reynholm\LaravelRepositories\Exception\ColumnNotFoundException;
use Reynholm\LaravelRepositories\Exception\DataNotValidException;
use Reynholm\LaravelRepositories\Exception\EntityNotFoundException;
use Rodamoto\Repository\Exception\InvalidCriteriaParametersException;

interface LaravelRepositoryInterface
{

    /**
     * @param int $id
     * @param array $columns Restrict columns that you want to retrieve
     * @return array
     * @throws ColumnNotFoundException
     */
    public function find($id, array $columns = array());

    /**
     * @param int $id
     * @param array $columns Restrict columns that you want to retrieve
     * @return array
     * @throws ColumnNotFoundException
     * @throws EntityNotFoundException
     */
    public function findOrFail($id, array $columns = array());

    /**
     * @param array $criteria
     * Ex.:
     * array(
     *     array('name', '=', 'carlos'),
     *     array('age',  '>', 20),
     * )
     * @param array $columns Restrict columns that you want to retrieve
     * @return array
     * @throws ColumnNotFoundException
     * @throws InvalidCriteriaParametersException
     */
    public function findOne(array $criteria, array $columns = array());

    /**
     * Validates the input array and stores all the errors,
     * them, you can get them with the getErrors() method
     * @param array $data
     * @return boolean
     */
    public function validate(array $data);

    /**
     * Validates the input array or throws exception
     * It also stores all the errors. Then you can retrieve them with the
     * getValidationErrors() method
     * @param array $data
     * @throws DataNotValidException
     */
    public function validateOrFail(array $data);

    /**
     * Validates a multidimensional
     * It also stores all the errors. Then you can retrieve them with the
     * getValidationErrors() method
     * @param array $data
     * @return boolean
     */
    public function validateMany(array $data);

    /**
     * Validates a multidimensional or throws exception
     * It also stores all the errors. Then you can retrieve them with the
     * getValidationErrors() method
     * @param array $data
     * @throws DataNotValidException
     */
    public function validateManyOrFail(array $data);

    /**
     * Returns the errors generated by the validate methods
     * @return array
     */
    public function getValidationErrors();

    /**
     * @param int $id
     * @return boolean
     */
    public function delete($id);

    /**
     * @param int $id
     * @throw EntityNotFoundException
     */
    public function deleteOrFail($id);
} 