<?php

namespace App\Models;

class JobModel
{

    // variables
    private $id;
    private $name;
    private $description;
    private $organization;
	private $startDate;
    private $type;
    private $author;

    // constructor
    function __construct($id, $name, $description, $organization, $startDate, $type, $author)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->organization = $organization;
        $this->startDate = $startDate;
        $this->type = $type;
        $this->author = $author;
    }

    /**
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
		}

    /**
     *
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return mixed
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getIdealStartDate() {
        return $this->startDate;
    }

    /**
     *
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     *
     * @param mixed $institution
     */
    public function setOrganization($organization)
    {
        $this->organizatiion = $organization;
    }

    /**
     * @param mixed $idealStartDate
     */
    public function setIdealStartDate($startDate) {
        $this->startDate = $startDate;
    }

    /**
     * @param boolean $type
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     *
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}