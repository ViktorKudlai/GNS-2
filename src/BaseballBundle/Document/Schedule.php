<?php

namespace BaseballBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as UniqueDocument;

/**
 * @MongoDB\Document(
 *     collection="schedule",
 *     repositoryClass="BaseballBundle\Document\ScheduleRepository"
 * )
 * @UniqueDocument(fields={"gameId"})
 */
class Schedule
{
    /**
     * @MongoDB\Id
     *
     * @var String
     */
    protected $id;

    /**
     * @MongoDB\Integer
     * @MongoDB\UniqueIndex
     *
     * @var Integer
     */
    protected $gameId;

    /**
     * @MongoDB\Integer
     *
     * @var Integer
     */
    protected $stadiumId;

    /**
     * @MongoDB\Integer
     *
     * @var Integer
     */
    protected $season;

    /**
     * @MongoDB\String
     *
     * @var String
     */
    protected $status;

    /**
     * @MongoDB\String
     *
     * @var String
     */
    protected $homeTeam;

    /**
     * @MongoDB\String
     *
     * @var String
     */
    protected $awayTeam;

    /**
     * @MongoDB\Date
     *
     * @var Date
     */
    protected $dateTime;

    /**
     * @MongoDB\Date
     *
     * @var Date
     */
    protected $created;

    /**
     * @MongoDB\Date
     *
     * @var Date
     */
    protected $updated;

    /**
     * Get id.
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gameId.
     *
     * @param integer $gameId
     *
     * @return $this
     */
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
        return $this;
    }

    /**
     * Get gameId.
     *
     * @return integer $gameId
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * Set stadiumId.
     *
     * @param integer $stadiumId
     *
     * @return $this
     */
    public function setStadiumId($stadiumId)
    {
        $this->stadiumId = $stadiumId;
        return $this;
    }

    /**
     * Get stadiumId.
     *
     * @return integer $stadiumId
     */
    public function getStadiumId()
    {
        return $this->stadiumId;
    }

    /**
     * Set season.
     *
     * @param integer $season
     *
     * @return $this
     */
    public function setSeason($season)
    {
        $this->season = $season;
        return $this;
    }

    /**
     * Get season.
     *
     * @return integer $season
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status.
     *
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set homeTeam.
     *
     * @param string $homeTeam
     *
     * @return $this
     */
    public function setHomeTeam($homeTeam)
    {
        $this->homeTeam = $homeTeam;
        return $this;
    }

    /**
     * Get homeTeam.
     *
     * @return string $homeTeam
     */
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Set awayTeam.
     *
     * @param string $awayTeam
     *
     * @return $this
     */
    public function setAwayTeam($awayTeam)
    {
        $this->awayTeam = $awayTeam;
        return $this;
    }

    /**
     * Get awayTeam.
     *
     * @return string $awayTeam
     */
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Set dateTime.
     *
     * @param date $dateTime
     *
     * @return $this
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     * Get dateTime.
     *
     * @return date $dateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set created.
     *
     * @param date $created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created.
     *
     * @return date $created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated.
     *
     * @param date $updated
     *
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Get updated.
     *
     * @return date $updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}