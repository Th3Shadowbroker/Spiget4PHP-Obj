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
 * Date: 10.08.2018
 * Time: 14:51
 */

namespace de\m4taiori\spiget4php\obj;

use de\m4taiori\spiget4php\SpigetAPI;

use de\m4taiori\spiget4php\exceptions\SpigetException;

/**
 * Class SpigetAuthor
 * @package de\m4taiori\spiget4php\obj
 */
class SpigetAuthor
{

    /**
     * The author source-array.
     * @var array
     */
    private $author;

    /**
     * SpigetAuthor constructor.
     * @param array $author The author source array.
     */
    function __construct( $author )
    {
        $this->author = $author;
    }

    /**
     * Get the authors name.
     * @return string
     */
    public function getName()
    {
        return $this->author['name'];
    }

    /**
     * Get the authors icon.
     * @return array
     */
    public function getIcon()
    {
        return $this->author['icon'];
    }

    /**
     * Get the authors id.
     * @return string
     */
    public function getId()
    {
        return $this->author['id'];
    }

    /**
     * Get the author as json.
     * @return string
     */
    public function toJson()
    {
        return json_encode( $this->author, JSON_PRETTY_PRINT );
    }

    /**
     * Get the array this object is based on.
     * @return array
     */
    public function toArray()
    {
        return $this->author;
    }

    /**
     * Create a new SpigetAuthor from the API-result.
     * @param string $author The authors name or id.
     * @return SpigetAuthor
     * @throws SpigetException
     */
    public static function of($author)
    {
        return new SpigetAuthor( SpigetAPI::getInstance()->getAuthor($author) );
    }

    /**
     * Create a new SpigetAuthor from an array.
     * @param array $arr The array the instance is created from.
     * @return SpigetAuthor
     */
    public static function fromArray($arr)
    {
        return new SpigetAuthor( $arr );
    }

}