<?php

include_once ('Patient.php');
class PatientQueue
{
    public $limit;
    public $queue;

    public function __construct($limit)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    public function isEmpty()
    {
        return empty($this->queue);
    }

    public function enqueue($patient)
    {
        if (count($this->queue) > $this->limit) {
            echo "full patient";
        } else {
            array_push($this->queue, $patient);
            usort($this->queue, function ($a, $b) {
                if ($a->code == $b->code) {
                    return 1;
                }
                return ($a->code > $b->code) ? -1 : 1;
            });

        }
    }

    public function getQueue()
    {
        return $this->queue;
    }

}

$patient = new Patient("nam", 23);
$patient1 = new Patient("thang", 10);
$patient2 = new Patient("lien", 25);
$patient3 = new Patient("long", 45);
$patient4 = new Patient("truong", 10);
$patient5 = new Patient("son", 100);
$list = new PatientQueue(10);

$list->enqueue($patient);
$list->enqueue($patient1);
$list->enqueue($patient2);
$list->enqueue($patient3);
$list->enqueue($patient4);
$list->enqueue($patient5);
//print_r($list->dequeue());

echo "<pre>";
print_r($list->getQueue());