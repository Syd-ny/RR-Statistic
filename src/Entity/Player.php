<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     * 
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=32)
     * 
     */
    private $lastname;

    /**
     * @ORM\Column(type="float", nullable=true)
     * 
     */
    private $ability;

    /**
     * @ORM\Column(type="float", nullable=true)
     * 
     */
    private $strenght;

    /**
     * @ORM\Column(type="float", nullable=true)
     * 
     */
    private $serve;

    /**
     * @ORM\Column(type="float", nullable=true)
     * 
     */
    private $speed;

    /**
     * @ORM\Column(type="float", nullable=true)
     * 
     */
    private $mentality;

    /**
     * @ORM\Column(type="float", nullable=true)
     * 
     */
    private $doubles;

    /**
     * @ORM\Column(type="float", nullable=true)
     * 
     */
    private $talent;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $hard;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $clay;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $grass;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $indoor;

    /**
     * @ORM\Column(type="integer")
     * 
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     * 
     */
    private $globalAgeFactor;

    /**
     * @ORM\Column(type="integer")
     * 
     */
    private $actualAgeFactor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $bestRankingSingle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $bestRankingDouble;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $weeksN1Single;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $weeksN1Double;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $atpSingleLow;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $atpDoubleLow;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $atpSingleMid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $atpDoubleMid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $atpSingleHigh;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $atpDoubleHigh;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $tmcSingle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $tmcDouble;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $gsSingle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     */
    private $gsDouble;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="players")
     * 
     */
    private $statuses;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="players")
     * 
     */
    private $countries;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $endurance;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $bgColor;

    /**
     * @ORM\Column(type="integer")
     */
    private $rank;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAbility(): ?float
    {
        return $this->ability;
    }

    public function setAbility(?float $ability): self
    {
        $this->ability = $ability;

        return $this;
    }

    public function getStrenght(): ?float
    {
        return $this->strenght;
    }

    public function setStrenght(?float $strenght): self
    {
        $this->strenght = $strenght;

        return $this;
    }

    public function getServe(): ?float
    {
        return $this->serve;
    }

    public function setServe(?float $serve): self
    {
        $this->serve = $serve;

        return $this;
    }

    public function getSpeed(): ?float
    {
        return $this->speed;
    }

    public function setSpeed(?float $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getMentality(): ?float
    {
        return $this->mentality;
    }

    public function setMentality(?float $mentality): self
    {
        $this->mentality = $mentality;

        return $this;
    }

    public function getDoubles(): ?float
    {
        return $this->doubles;
    }

    public function setDoubles(?float $doubles): self
    {
        $this->doubles = $doubles;

        return $this;
    }

    public function getTalent(): ?float
    {
        return $this->talent;
    }

    public function setTalent(?float $talent): self
    {
        $this->talent = $talent;

        return $this;
    }

    public function getHard(): ?int
    {
        return $this->hard;
    }

    public function setHard(?int $hard): self
    {
        $this->hard = $hard;

        return $this;
    }

    public function getClay(): ?int
    {
        return $this->clay;
    }

    public function setClay(?int $clay): self
    {
        $this->clay = $clay;

        return $this;
    }

    public function getGrass(): ?int
    {
        return $this->grass;
    }

    public function setGrass(?int $grass): self
    {
        $this->grass = $grass;

        return $this;
    }

    public function getIndoor(): ?int
    {
        return $this->indoor;
    }

    public function setIndoor(?int $indoor): self
    {
        $this->indoor = $indoor;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getGlobalAgeFactor(): ?int
    {
        return $this->globalAgeFactor;
    }

    public function setGlobalAgeFactor(int $globalAgeFactor): self
    {
        $this->globalAgeFactor = $globalAgeFactor;

        return $this;
    }

    public function getActualAgeFactor(): ?int
    {
        return $this->actualAgeFactor;
    }

    public function setActualAgeFactor(int $actualAgeFactor): self
    {
        $this->actualAgeFactor = $actualAgeFactor;

        return $this;
    }

    public function getBestRankingSingle(): ?int
    {
        return $this->bestRankingSingle;
    }

    public function setBestRankingSingle(?int $bestRankingSingle): self
    {
        $this->bestRankingSingle = $bestRankingSingle;

        return $this;
    }

    public function getBestRankingDouble(): ?int
    {
        return $this->bestRankingDouble;
    }

    public function setBestRankingDouble(?int $bestRankingDouble): self
    {
        $this->bestRankingDouble = $bestRankingDouble;

        return $this;
    }

    public function getWeeksN1Single(): ?int
    {
        return $this->weeksN1Single;
    }

    public function setWeeksN1Single(?int $weeksN1Single): self
    {
        $this->weeksN1Single = $weeksN1Single;

        return $this;
    }

    public function getWeeksN1Double(): ?int
    {
        return $this->weeksN1Double;
    }

    public function setWeeksN1Double(?int $weeksN1Double): self
    {
        $this->weeksN1Double = $weeksN1Double;

        return $this;
    }

    public function getAtpSingleLow(): ?int
    {
        return $this->atpSingleLow;
    }

    public function setAtpSingleLow(?int $atpSingleLow): self
    {
        $this->atpSingleLow = $atpSingleLow;

        return $this;
    }

    public function getAtpDoubleLow(): ?int
    {
        return $this->atpDoubleLow;
    }

    public function setAtpDoubleLow(?int $atpDoubleLow): self
    {
        $this->atpDoubleLow = $atpDoubleLow;

        return $this;
    }

    public function getAtpSingleMid(): ?int
    {
        return $this->atpSingleMid;
    }

    public function setAtpSingleMid(?int $atpSingleMid): self
    {
        $this->atpSingleMid = $atpSingleMid;

        return $this;
    }

    public function getAtpDoubleMid(): ?int
    {
        return $this->atpDoubleMid;
    }

    public function setAtpDoubleMid(?int $atpDoubleMid): self
    {
        $this->atpDoubleMid = $atpDoubleMid;

        return $this;
    }

    public function getAtpSingleHigh(): ?int
    {
        return $this->atpSingleHigh;
    }

    public function setAtpSingleHigh(?int $atpSingleHigh): self
    {
        $this->atpSingleHigh = $atpSingleHigh;

        return $this;
    }

    public function getAtpDoubleHigh(): ?int
    {
        return $this->atpDoubleHigh;
    }

    public function setAtpDoubleHigh(?int $atpDoubleHigh): self
    {
        $this->atpDoubleHigh = $atpDoubleHigh;

        return $this;
    }

    public function getTmcSingle(): ?int
    {
        return $this->tmcSingle;
    }

    public function setTmcSingle(?int $tmcSingle): self
    {
        $this->tmcSingle = $tmcSingle;

        return $this;
    }

    public function getTmcDouble(): ?int
    {
        return $this->tmcDouble;
    }

    public function setTmcDouble(?int $tmcDouble): self
    {
        $this->tmcDouble = $tmcDouble;

        return $this;
    }

    public function getGsSingle(): ?int
    {
        return $this->gsSingle;
    }

    public function setGsSingle(?int $gsSingle): self
    {
        $this->gsSingle = $gsSingle;

        return $this;
    }

    public function getGsDouble(): ?int
    {
        return $this->gsDouble;
    }

    public function setGsDouble(?int $gsDouble): self
    {
        $this->gsDouble = $gsDouble;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getStatuses(): ?Status
    {
        return $this->statuses;
    }

    public function setStatuses(?Status $Statuses): self
    {
        $this->statuses = $Statuses;

        return $this;
    }

    public function getCountries(): ?Country
    {
        return $this->countries;
    }

    public function setCountries(?Country $countries): self
    {
        $this->countries = $countries;

        return $this;
    }

    public function getEndurance(): ?float
    {
        return $this->endurance;
    }

    public function setEndurance(?float $endurance): self
    {
        $this->endurance = $endurance;

        return $this;
    }

    public function setBgColor(string $color)
    {
    $this->bgColor = $color;
    }

    public function getBgColor(): ?string
    {
        return $this->bgColor;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function setRank(int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

}
