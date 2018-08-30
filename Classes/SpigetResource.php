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
 * Date: 18.07.2018
 * Time: 21:20
 */

namespace de\m4taiori\spiget4php\obj;

use de\m4taiori\spiget4php\SpigetAPI;
use de\m4taiori\spiget4php\exceptions\SpigetException;

/**
 * Class SpigetResource
 * @package de\m4taiori\spiget4php\obj
 */
class SpigetResource
{

    /**
     * The source-array.
     * @var array
     */
    private $resource;

    /**
     * SpigetResource constructor.
     * @param array $resource The source array of this resource.
     */
    function __construct( $resource )
    {
        $this->resource = $resource;
    }

    /**
     * Returns true if this resource is available via external sources.
     * @return bool
     */
    public function getExternal()
    {
        return $this->resource['external'];
    }

    /**
     * Get the resource-file.
     * @return array
     */
    public function getFile()
    {
        return $this->resource['file'];
    }

    /**
     * Get the resource description.
     * @return string
     */
    public function getDescription()
    {
        return $this->resource['description'];
    }

    /**
     * Get the resources like-count.
     * @return int
     */
    public function getLikes()
    {
        return $this->resource['likes'];
    }

    /**
     * Get the versions the resource was tested on.
     * @return array
     */
    public function getTestedVersions()
    {
        return $this->resource['testedversions'];
    }

    /**
     * Get the versions of this resource.
     * @return array
     */
    public function getVersions()
    {
        return $this->resource['versions'];
    }

    /**
     * Get the resource-updates.
     * @return array
     */
    public function getUpdates()
    {
        return $this->resource['updates'];
    }

    /**
     * Get the like count of this resource.
     * @return int
     */
    public function getLinks()
    {
        return $this->resource['links'];
    }

    /**
     * Get the name of this resource.
     * @return string
     */
    public function getName()
    {
        return $this->resource['name'];
    }

    /**
     * Get the tag of this resource.
     * @return string
     */
    public function getTag()
    {
        return $this->resource['tag'];
    }

    /**
     * Get the versions of this resource.
     * @return array
     */
    public function getVersion()
    {
        return $this->resource['version'];
    }

    /**
     * Get the author/s of this resource.
     * @return array
     */
    public function getAuthor()
    {
        return $this->resource['author'];
    }

    /**
     * Get the resource-category.
     * @return array
     */
    public function getCategory()
    {
        return $this->resource['category'];
    }

    /**
     * Get the resource rating.
     * @return int
     */
    public function getRating()
    {
        return $this->resource['rating'];
    }

    /**
     * Get the resource icon.
     * @return array
     */
    public function getIcon()
    {
        return $this->resource['icon'];
    }

    /**
     * Get the release date.
     * @return string
     */
    public function getReleaseDate()
    {
        return $this->resource['releasedate'];
    }

    /**
     * Get the update-date.
     * @return string
     */
    public function getUpdateDate()
    {
        return $this->resource['updatedate'];
    }

    /**
     * Get the download count of this resource.
     * @return int
     */
    public function getDownloads()
    {
        return $this->resource['downloads'];
    }

    /**
     * Get the resource reviews.
     * @return array
     */
    public function getReviews()
    {
        return $this->resource['reviews'];
    }

    /**
     * Get the resource-id.
     * @return string
     */
    public function getId()
    {
        return $this->resource['id'];
    }

    /**
     * Get the resource as json.
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->resource, JSON_PRETTY_PRINT);
    }

    /**
     * Create a new SpigetResource from the API-result.
     * @param string $resource The name or id of a resource.
     * @return SpigetResource
     * @throws SpigetException
     */
    public static function of($resource)
    {
        return new SpigetResource( SpigetAPI::getInstance()->getResource($resource) );
    }

}