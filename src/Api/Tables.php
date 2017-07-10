<?php

/*
 * A php library for using the Emarsys API.
 *
 * @link      https://github.com/quitoque/emarsys-php-client
 * @package   emarsys-php-client
 * @license   MIT
 * @copyright Copyright (c) 2017 Quitoque <tech@quitoque.com>
 */

namespace Emarsys\Api;

use Http\Promise\Promise;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Tables.
 *
 * @author Claude Khedhiri <claude@khedhiri.com>
 */
class Tables extends AbstractApi
{
    /**
     * @param $table
     * @param array $rows
     *
     * @return ResponseInterface
     */
    public function insertInTo($table, array $rows)
    {
        return $this->sendRequest($this->createInsertInToRequest($table, $rows));
    }

    /**
     * @param string $table
     * @param array  $rows
     *
     * @return Promise
     */
    public function asyncInsertInTo($table, array $rows)
    {
        return $this->sendAsyncRequest($this->createInsertInToRequest($table, $rows));
    }

    /**
     * @param $table
     * @param array $row
     * @param array $newRow
     *
     * @return ResponseInterface
     */
    public function replaceInTo($table, array $row, array $newRow)
    {
        return $this->sendRequest($this->createReplaceInToRequest($table, $row, $newRow));
    }

    /**
     * @param string $table
     * @param array  $row
     * @param array  $newRow
     *
     * @return Promise
     */
    public function asyncReplaceInTo($table, array $row, array $newRow)
    {
        return $this->sendAsyncRequest($this->createReplaceInToRequest($table, $row, $newRow));
    }

    /**
     * @param $table
     * @param array $search
     * @param array $update
     *
     * @return ResponseInterface
     */
    public function updateInTo($table, array $search, array $update)
    {
        return $this->sendRequest($this->createUpdateInToRequest($table, $search, $update));
    }

    /**
     * @param string $table
     * @param array  $search
     * @param array  $update
     *
     * @return Promise
     */
    public function asyncUpdateInTo($table, array $search, array $update)
    {
        return $this->sendAsyncRequest($this->createUpdateInToRequest($table, $search, $update));
    }

    /**
     * @param string $table
     * @param array  $rows
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function createInsertInToRequest($table, array $rows)
    {
        return $this->createRequest('POST', "/api/rds/tables/$table/records", $rows);
    }

    /**
     * @param string $table
     * @param array  $row
     * @param array  $newRow
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function createReplaceInToRequest($table, array $row, array $newRow)
    {
        return $this->createRequest('PUT', "/api/rds/tables/$table/records", array($row, $newRow));
    }

    /**
     * @param string $table
     * @param array  $search
     * @param array  $update
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function createUpdateInToRequest($table, array $search, array $update)
    {
        return $this->createRequest('POST', "/api/rds/tables/$table/records", array(array($search, $update)));
    }
}
