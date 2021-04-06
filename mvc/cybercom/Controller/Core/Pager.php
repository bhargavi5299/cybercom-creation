<?php
namespace Controller\Core;

class Pager
{
    protected $totalRecords = null;
    protected $numberOfPages = null;
    protected $recordPerPage = 5;
    protected $currentPage = null;
    protected $start = 1;
    protected $previous = null;
    protected $next = null;
    protected $end = null;

    public function getNumberOfPages()
    {
        return $this->numberOfPages;
    }

    public function setNumberOfPages($numberOfPages)
    {
        $this->numberOfPages = $numberOfPages;

        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    public function getPrevious()
    {
        return $this->previous;
    }

    public function setPrevious($previous)
    {
        $this->previous = $previous;

        return $this;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    public function getTotalRecords()
    {
        return $this->totalRecords;
    }

    public function setTotalRecords($totalRecords)
    {
        $this->totalRecords = $totalRecords;

        return $this;
    }

    public function getRecordPerPage()
    {
        return $this->recordPerPage;
    }

    public function setRecordPerPage($recordPerPage)
    {
        $this->recordPerPage = $recordPerPage;

        return $this;
    }
    public function calculate()
    {

        $page = ceil($this->getTotalRecords() / $this->getRecordPerPage());
        $this->setNumberOfPages($page);

        if ($this->getTotalRecords() <= $this->getRecordPerPage()) {
            $this->setStart(1);
            $this->setNext(null);
            $this->setPrevious(null);
            $this->setEnd(null);

            return $this;
        }
        if ($this->getCurrentPage() < $this->getStart()) {
            $this->setCurrentPage($this->getStart());
            $this->setNext($this->getCurrentPage() + 1);
            $this->setEnd($this->getNumberOfPages());
            $this->setPrevious(null);
            return $this;
        }
        if ($this->getCurrentPage() > $this->getNumberOfPages()) {
            $this->setCurrentPage($this->getNumberOfPages());
            $this->setPrevious($this->getCurrentPage() - 1);
            $this->setEnd($this->getNumberOfPages());
            $this->setNext(null);
            return $this;
        }

        if ($this->getCurrentPage() == $this->getNumberOfPages()) {
            $this->setNext(null);
            $this->setStart($this->getStart());
            $this->setEnd($this->getNumberOfPages());
            $this->setPrevious($this->getCurrentPage() - 1);
            return $this;
        }
        if ($this->getCurrentPage() == $this->getStart()) {
            $this->setPrevious(null);
            $this->setEnd($this->getNumberOfPages());
            $this->setNext($this->getCurrentPage() + 1);
            return $this;
        }
        if ($this->getCurrentPage() != $this->getNumberOfPages() && $this->getCurrentPage() != $this->getStart()) {
            $this->setEnd($this->getNumberOfPages());
            $this->setPrevious($this->getCurrentPage() - 1);
            $this->setNext($this->getCurrentPage() + 1);
            return $this;
        }
    }
}

// echo "<pre>";
// $obj = new Pager;
// $product =
// $obj->setTotalRecords(25);
// $obj->setCurrentPage($_GET['page']);
// $obj->calculate();
// print_r($obj);
