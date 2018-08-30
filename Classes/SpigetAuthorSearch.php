<?php
/**
 * Copyright (c) 2018 Jens F.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 * Created by Jens F. https://m4taiori.de
 * GitHub: https://github.com/th3shadowbroker
 * Date: 29.08.2018
 * Time: 22:14
 */

namespace de\m4taiori\spiget4php\obj;

use de\m4taiori\spiget4php\exceptions\SpigetException;
use de\m4taiori\spiget4php\SpigetAPI;

/**
 * A class to manage search results.
 * @package de\m4taiori\spiget4php\obj
 */
class SpigetAuthorSearch
{

    /**
     * Contains the result as SpigetAuthor-array.
     * @var array
     */
    private $results = [];

    /**
     * SpigetAuthorSearch constructor.
     * @param array $arr The array the instance is created from.
     */
    private function __construct( $arr )
    {
        foreach ( $arr as $item ) array_push( $this->results, SpigetAuthor::fromArray($item) );
    }

    /**
     * Get the search-result.
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Counts the results.
     * @return int
     */
    public function count()
    {
        return sizeof( $this->results );
    }

    /**
     * Get the results as json.
     * @return array
     */
    public function toJson()
    {
        $arr = [];
        foreach ( $this->results as $result ) array_push($arr, $result->toArray() );
        return json_encode($arr, JSON_PRETTY_PRINT);
    }

    /**
     * Create a new instance from the API-result.
     * @param string $author The authors name or id.
     * @param string $field The field you want to search in.
     * @param int $size The results max. size.
     * @param int $page The page you want to get.
     * @param string $sort Sort the list with + for ascending and - for descending in front of the field you want to sort by.
     * @param array $fields The fields you want to receive.
     * @return SpigetAuthorSearch
     * @throws SpigetException
     */
    public static function of( $author, $field = SPIGET4PHP_DEFAULT, $size = SPIGET4PHP_DEFAULT, $page =  SPIGET4PHP_DEFAULT, $sort = SPIGET4PHP_DEFAULT, $fields = SPIGET4PHP_DEFAULT )
    {
        return new SpigetAuthorSearch( SpigetAPI::getInstance()->getSearchAuthors($author, $field, $size, $page, $sort, $fields) );
    }

    /**
     * Create a new instance from an array.
     * @param array $arr The array the instance is created from.
     * @return SpigetAuthorSearch
     */
    public static function fromJson( $arr )
    {
        return new SpigetAuthorSearch( $arr );
    }

}