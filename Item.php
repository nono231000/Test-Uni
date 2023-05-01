<?php
class Item {
    private $name;
    private $content;
    private $creationDate;

    public function __construct($name, $content, $creationDate) {
        $this->name = $name;
        $this->content = $content;
        $this->creationDate = $creationDate;
    }

    public function getName() {
        return $this->name;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }
}

?>