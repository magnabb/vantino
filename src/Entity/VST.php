<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VSTRepository")
 */
class VST
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     * @Assert\Ip
     */
    private $ip;

    /**
     * @ORM\Column(type="string", length=5)
     *
     * @Assert\NotBlank
     * @Assert\Locale
     */
    private $lg;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $rf;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     */
    private $ua;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TMSG", inversedBy="vst", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tmsg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getLg(): ?string
    {
        return $this->lg;
    }

    public function setLg(string $lg): self
    {
        $this->lg = $lg;

        return $this;
    }

    public function getRf(): ?string
    {
        return $this->rf;
    }

    public function setRf(string $rf): self
    {
        $this->rf = $rf;

        return $this;
    }

    public function getUa(): ?string
    {
        return $this->ua;
    }

    public function setUa(string $ua): self
    {
        $this->ua = $ua;

        return $this;
    }

    public function getTmsg(): ?TMSG
    {
        return $this->tmsg;
    }

    public function setTmsg(TMSG $tmsg): self
    {
        $this->tmsg = $tmsg;

        return $this;
    }
}
