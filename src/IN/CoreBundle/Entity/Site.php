<?php
/**
 * @copyright  Copyright (c) 2020 Sekou Assane Sidibe  - www.malinova.tech
 * @package    IN\AdminBundle\Entity
 * @author     Sekou Assane Sidibe <contact@malinova.tech> <+223 78 45 60 45>
 */

namespace IN\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity(repositoryClass="IN\CoreBundle\Repository\SiteRepository")
 */
class Site
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="code_site",  type="string", nullable=true,  length=255)
     */
    private $codeSite;

    /**
     * @var string
     *
     * @ORM\Column(name="type_trans", type="string", nullable=true,  length=255)
     */
    private $typeTrans;

    /**
     * @var bool
     *
     * @ORM\Column(name="presence_edm",  type="string", nullable=true,  length=255)
     */
    private $presenceEdm;

    /**
     * @var string
     *
     * @ORM\Column(name="type_nrj", type="string", nullable=true,  length=255)
     */
    private $typeNrj;

    /**
     * @var string
     *
     * @ORM\Column(name="g900", type="string", nullable=true,  length=255)
     */
    private $g900;

    /**
     * @var string
     *
     * @ORM\Column(name="g1800", type="string", nullable=true,  length=255)
     */
    private $g1800;

    /**
     * @var string
     *
     * @ORM\Column(name="u2100", type="string", nullable=true,  length=255)
     */
    private $u2100;

    /**
     * @var string
     *
     * @ORM\Column(name="u900", type="string", nullable=true,  length=255)
     */
    private $u900;

    /**
     * @var string
     *
     * @ORM\Column(name="l800", type="string", nullable=true,  length=255)
     */
    private $l800;

    /**
     * @var string
     *
     * @ORM\Column(name="l1800", type="string", nullable=true,  length=255)
     */
    private $l1800;

    /**
     * @var string
     *
     * @ORM\Column(name="t46s", type="string", nullable=true,  length=255)
     */
    private $t46s;

    /**
     * @var string
     *
     * @ORM\Column(name="tdd", type="string", nullable=true,  length=255)
     */
    private $tdd;

    /**
     * @var string
     *
     * @ORM\Column(name="site_name", type="string", nullable=true,  length=255)
     */
    private $siteName;

    /**
     * @var string
     *
     * @ORM\Column(name="quartier",  type="string", nullable=true,  length=255)
     */
    private $quartier;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", nullable=true,  length=255)
     */
    private $district;

    /**
     * @var string
     *
     * @ORM\Column(name="on_air_date", type="string", nullable=true)
     */
    private $onAirDate;

    /**
     * @var string
     *
     * @ORM\Column(name="site_operational_status", type="string", nullable=true,  length=255)
     */
    private $siteOperationalStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="site_de_deplacement", type="string", nullable=true,  length=255)
     */
    private $siteDeDeplacement;

    /**
     * @var string
     *
     * @ORM\Column(name="date_de_deplacement", type="string", nullable=true)
     */
    private $dateDeDeplacement;

    /**
     * @var string
     *
     * @ORM\Column(name="type_structure", type="string", nullable=true,  length=255)
     */
    private $typeStructure;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer", type="string", nullable=true,  length=255)
     */
    private $manufacturer;

    /**
     * @var string
     *
     * @ORM\Column(name="network_topology", type="string", nullable=true,  length=255)
     */
    private $NetwordTopology;

    /**
     * @var string
     *
     * @ORM\Column(name="structure_owner", type="string", nullable=true,  length=255)
     */
    private $structureOwner;

    /**
     * @var string
     *
     * @ORM\Column(name="reason_if_not_available_for_sharing", type="string", nullable=true,  length=255)
     */
    private $reasonIfNotAvailableForSharing;

    /**
     * @var string
     *
     * @ORM\Column(name="sharing_status", type="string", nullable=true,  length=255)
     */
    private $sharingStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="street_address", type="string", nullable=true,  length=255)
     */
    private $streetAddress;


    /**
     * @var string
     *
     * @ORM\Column(name="commune", type="string", nullable=true,  length=255)
     */
    private $commune;

    /**
     * @var string
     *
     * @ORM\Column(name="cercle", type="string", nullable=true,  length=255)
     */
    private $cercle;

    /**
     * @var string
     *
     * @ORM\Column(name="kout", type="string", nullable=true,  length=255)
     */
    private $kout;

    /**
     * @var string
     *
     * @ORM\Column(name="type_of_covered_area", type="string", nullable=true,  length=255)
     */
    private $typeOfCoveredArea;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude_decimal", type="string", nullable=true,  length=255)
     */
    private $latitudeDecimal;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude_decimal", type="string", nullable=true,  length=255)
     */
    private $longitudeDecimal;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude_dms", type="string", nullable=true,  length=255)
     */
    private $latitudeDMS;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude_dms", type="string", nullable=true,  length=255)
     */
    private $longitudeDMS;

    /**
     * @var string
     *
     * @ORM\Column(name="typo", type="string", nullable=true,  length=255)
     */
    private $typo;

    /**
     * @var string
     *
     * @ORM\Column(name="tower_manufacturer", type="string", nullable=true,  length=255)
     */
    private $toweManufacturer;

    /**
     * @ORM\OneToMany(targetEntity="IN\CoreBundle\Entity\Incident", mappedBy="site")
     */
    private $incidents;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ttNumber
     *
     * @param string $ttNumber
     *
     * @return Site
     */
    public function setTtNumber($ttNumber)
    {
        $this->ttNumber = $ttNumber;

        return $this;
    }



    /**
     * Set codeSite
     *
     * @param string $codeSite
     *
     * @return Site
     */
    public function setCodeSite($codeSite)
    {
        $this->codeSite = $codeSite;

        return $this;
    }

    /**
     * Get codeSite
     *
     * @return string
     */
    public function getCodeSite()
    {
        return $this->codeSite;
    }

    /**
     * Set typeTrans
     *
     * @param string $typeTrans
     *
     * @return Site
     */
    public function setTypeTrans($typeTrans)
    {
        $this->typeTrans = $typeTrans;

        return $this;
    }

    /**
     * Get typeTrans
     *
     * @return string
     */
    public function getTypeTrans()
    {
        return $this->typeTrans;
    }

    /**
     * Set presenceEdm
     *
     * @param boolean $presenceEdm
     *
     * @return Site
     */
    public function setPresenceEdm($presenceEdm)
    {
        $this->presenceEdm = $presenceEdm;

        return $this;
    }

    /**
     * Get presenceEdm
     *
     * @return bool
     */
    public function getPresenceEdm()
    {
        return $this->presenceEdm;
    }

    /**
     * Set typeNrj
     *
     * @param string $typeNrj
     *
     * @return Site
     */
    public function setTypeNrj($typeNrj)
    {
        $this->typeNrj = $typeNrj;

        return $this;
    }

    /**
     * Get typeNrj
     *
     * @return string
     */
    public function getTypeNrj()
    {
        return $this->typeNrj;
    }

    /**
     * Set g900
     *
     * @param string $g900
     *
     * @return Site
     */
    public function setG900($g900)
    {
        $this->g900 = $g900;

        return $this;
    }

    /**
     * Get g900
     *
     * @return string
     */
    public function getG900()
    {
        return $this->g900;
    }

    /**
     * Set g1800
     *
     * @param string $g1800
     *
     * @return Site
     */
    public function setG1800($g1800)
    {
        $this->g1800 = $g1800;

        return $this;
    }

    /**
     * Get g1800
     *
     * @return string
     */
    public function getG1800()
    {
        return $this->g1800;
    }

    /**
     * Set u2100
     *
     * @param string $u2100
     *
     * @return Site
     */
    public function setU2100($u2100)
    {
        $this->u2100 = $u2100;

        return $this;
    }

    /**
     * Get u2100
     *
     * @return string
     */
    public function getU2100()
    {
        return $this->u2100;
    }

    /**
     * Set u900
     *
     * @param string $u900
     *
     * @return Site
     */
    public function setU900($u900)
    {
        $this->u900 = $u900;

        return $this;
    }

    /**
     * Get u900
     *
     * @return string
     */
    public function getU900()
    {
        return $this->u900;
    }

    /**
     * Set l800
     *
     * @param string $l800
     *
     * @return Site
     */
    public function setL800($l800)
    {
        $this->l800 = $l800;

        return $this;
    }

    /**
     * Get l800
     *
     * @return string
     */
    public function getL800()
    {
        return $this->l800;
    }

    /**
     * Set l1800
     *
     * @param string $l1800
     *
     * @return Site
     */
    public function setL1800($l1800)
    {
        $this->l1800 = $l1800;

        return $this;
    }

    /**
     * Get l1800
     *
     * @return string
     */
    public function getL1800()
    {
        return $this->l1800;
    }

    /**
     * @return string
     */
    public function getT46s()
    {
        return $this->t46s;
    }

    /**
     * @param string $t46s
     */
    public function setT46s($t46s)
    {
        $this->t46s = $t46s;
    }

    /**
     * @return string
     */
    public function getTdd()
    {
        return $this->tdd;
    }

    /**
     * @param string $tdd
     */
    public function setTdd($tdd)
    {
        $this->tdd = $tdd;
    }

    /**
     * @return string
     */
    public function getSiteName()
    {
        return $this->siteName;
    }

    /**
     * @param string $siteName
     */
    public function setSiteName($siteName)
    {
        $this->siteName = $siteName;
    }

    /**
     * @return string
     */
    public function getQuartier()
    {
        return $this->quartier;
    }

    /**
     * @param string $quartier
     */
    public function setQuartier($quartier)
    {
        $this->quartier = $quartier;
    }

    /**
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param string $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return string
     */
    public function getOnAirDate()
    {
        return $this->onAirDate;
    }

    /**
     * @param string $onAirDate
     */
    public function setOnAirDate($onAirDate)
    {
        $this->onAirDate = $onAirDate;
    }

    /**
     * @return string
     */
    public function getSiteOperationalStatus()
    {
        return $this->siteOperationalStatus;
    }

    /**
     * @param string $siteOperationalStatus
     */
    public function setSiteOperationalStatus($siteOperationalStatus)
    {
        $this->siteOperationalStatus = $siteOperationalStatus;
    }

    /**
     * @return string
     */
    public function getSiteDeDeplacement()
    {
        return $this->siteDeDeplacement;
    }

    /**
     * @param string $siteDeDeplacement
     */
    public function setSiteDeDeplacement($siteDeDeplacement)
    {
        $this->siteDeDeplacement = $siteDeDeplacement;
    }

    /**
     * @return string
     */
    public function getTypeStructure()
    {
        return $this->typeStructure;
    }

    /**
     * @param string $typeStructure
     */
    public function setTypeStructure($typeStructure)
    {
        $this->typeStructure = $typeStructure;
    }

    /**
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getNetwordTopology()
    {
        return $this->NetwordTopology;
    }

    /**
     * @param string $NetwordTopology
     */
    public function setNetwordTopology($NetwordTopology)
    {
        $this->NetwordTopology = $NetwordTopology;
    }

    /**
     * @return string
     */
    public function getStructureOwner()
    {
        return $this->structureOwner;
    }

    /**
     * @param string $structureOwner
     */
    public function setStructureOwner($structureOwner)
    {
        $this->structureOwner = $structureOwner;
    }

    /**
     * @return string
     */
    public function getReasonIfNotAvailableForSharing()
    {
        return $this->reasonIfNotAvailableForSharing;
    }

    /**
     * @param string $reasonIfNotAvailableForSharing
     */
    public function setReasonIfNotAvailableForSharing($reasonIfNotAvailableForSharing)
    {
        $this->reasonIfNotAvailableForSharing = $reasonIfNotAvailableForSharing;
    }

    /**
     * @return string
     */
    public function getSharingStatus()
    {
        return $this->sharingStatus;
    }

    /**
     * @param string $sharingStatus
     */
    public function setSharingStatus($sharingStatus)
    {
        $this->sharingStatus = $sharingStatus;
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param string $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * @return string
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * @param string $commune
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;
    }

    /**
     * @return string
     */
    public function getCercle()
    {
        return $this->cercle;
    }

    /**
     * @param string $cercle
     */
    public function setCercle($cercle)
    {
        $this->cercle = $cercle;
    }

    /**
     * @return string
     */
    public function getKout()
    {
        return $this->kout;
    }

    /**
     * @param string $kout
     */
    public function setKout($kout)
    {
        $this->kout = $kout;
    }

    /**
     * @return string
     */
    public function getTypeOfCoveredArea()
    {
        return $this->typeOfCoveredArea;
    }

    /**
     * @param string $typeOfCoveredArea
     */
    public function setTypeOfCoveredArea($typeOfCoveredArea)
    {
        $this->typeOfCoveredArea = $typeOfCoveredArea;
    }

    /**
     * @return string
     */
    public function getLatitudeDecimal()
    {
        return $this->latitudeDecimal;
    }

    /**
     * @param string $latitudeDecimal
     */
    public function setLatitudeDecimal($latitudeDecimal)
    {
        $this->latitudeDecimal = $latitudeDecimal;
    }

    /**
     * @return string
     */
    public function getLongitudeDecimal()
    {
        return $this->longitudeDecimal;
    }

    /**
     * @param string $longitudeDecimal
     */
    public function setLongitudeDecimal($longitudeDecimal)
    {
        $this->longitudeDecimal = $longitudeDecimal;
    }

    /**
     * @return string
     */
    public function getLatitudeDMS()
    {
        return $this->latitudeDMS;
    }

    /**
     * @param string $latitudeDMS
     */
    public function setLatitudeDMS($latitudeDMS)
    {
        $this->latitudeDMS = $latitudeDMS;
    }

    /**
     * @return string
     */
    public function getLongitudeDMS()
    {
        return $this->longitudeDMS;
    }

    /**
     * @param string $longitudeDMS
     */
    public function setLongitudeDMS($longitudeDMS)
    {
        $this->longitudeDMS = $longitudeDMS;
    }

    /**
     * @return string
     */
    public function getTypo()
    {
        return $this->typo;
    }

    /**
     * @param string $typo
     */
    public function setTypo($typo)
    {
        $this->typo = $typo;
    }

    /**
     * @return string
     */
    public function getToweManufacturer()
    {
        return $this->toweManufacturer;
    }

    /**
     * @param string $toweManufacturer
     */
    public function setToweManufacturer($toweManufacturer)
    {
        $this->toweManufacturer = $toweManufacturer;
    }

    /**
     * @return string
     */
    public function getDateDeDeplacement()
    {
        return $this->dateDeDeplacement;
    }

    /**
     * @param string $dateDeDeplacement
     */
    public function setDateDeDeplacement($dateDeDeplacement)
    {
        $this->dateDeDeplacement = $dateDeDeplacement;
    }




}

