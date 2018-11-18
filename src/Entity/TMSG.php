<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TMSGRepository")
 */
class TMSG
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=36)
     *
     * @Assert\NotBlank
     * @Assert\Uuid
     */
    private $cid;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=36, nullable=true)
     *
     * @Assert\Uuid
     */
    private $sid;

    /**
     * @ORM\Column(type="string", length=36, nullable=true)
     *
     * @Assert\Uuid
     */
    private $uid;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\VST", mappedBy="tmsg", cascade={"persist", "remove"})
     *
     * @Assert\NotBlank
     * @Assert\Valid
     */
    private $vst;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCid(): ?string
    {
        return $this->cid;
    }

    public function setCid(string $cid): self
    {
        $this->cid = $cid;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getSid(): ?string
    {
        return $this->sid;
    }

    public function setSid(?string $sid): self
    {
        $this->sid = $sid;

        return $this;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function setUid(?string $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    public function getVST(): ?VST
    {
        return $this->vst;
    }

    public function setVST(VST $vst): self
    {
        $this->vst = $vst;

        // set the owning side of the relation if necessary
        if ($this !== $vst->getTmsg()) {
            $vst->setTmsg($this);
        }

        return $this;
    }
}
