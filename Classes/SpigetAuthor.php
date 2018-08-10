<?php
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
     * Create a new SpigetAuthor from the API-result.
     * @param string $author The authors name or id.
     * @return SpigetAuthor
     * @throws SpigetException
     */
    public static function of($author)
    {
        return new SpigetAuthor( SpigetAPI::getInstance()->getAuthor($author) );
    }

}