<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * videos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class videos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fetch_date", type="datetime")
     */
    private $fetchDate;

    /**
     * @var string
     *
     * @ORM\Column(name="labels", type="string", length=255)
     */
    private $labels;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fetchDate
     *
     * @param \DateTime $fetchDate
     * @return videos
     */
    public function setFetchDate($fetchDate)
    {
        $this->fetchDate = $fetchDate;

        return $this;
    }

    /**
     * Get fetchDate
     *
     * @return \DateTime 
     */
    public function getFetchDate()
    {
        return $this->fetchDate;
    }

    /**
     * Set labels
     *
     * @param string $labels
     * @return videos
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * Get labels
     *
     * @return string 
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return videos
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return videos
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    public function saveData($videos) {
        // ($videos);
        $return = [];
        foreach ($videos as $v) {
            $return[] = $v; 
            //echo 'importing: "science experiment goes wrong"; Url: http://glorf.com/videos/3; Tags: microwave,cats,peanutbutter';
        }
        return $return; //The list of the imported files
    }
}
