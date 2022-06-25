<?php
    class Tournament
    {
        private array $players = [];
        private string $title;
        private DateTime $date;

        public function __construct(string $title, string $date = null)
        {
            $this->title = $title;

            if (is_null($date))
            {
                $this->date = new DateTime('now +1 day');
            }
            else{
                $this->date = DateTime::createFromFormat('Y.m.d', $date);
                }
        }

        public function addPlayer($player)
        {
            $this->players[] = $player;
            return $this;
        }

        private function halfReverse()
        {
            $h = count($this->players)/2;
            $rev = array_splice($this->players, $h);
            $rev = array_reverse($rev);
            $this->players =  array_merge($this->players, $rev);
        }

        private function shiftPlayer()
        {

            $h = count($this->players)/2;

            $item = array_splice($this->players, $h,1);
            array_splice($this->players, 1,0, $item);

            $i = array_splice($this->players, $h,1);
            $this->players =  array_merge($this->players, $i);

        }

        public function createPairs()
        {
           $n = 0;
           if (count($this->players) % 2)
           {
               $this->players[] = "x";
               $n = count($this->players) - 1;
           }
           else
           {
               $n = count($this->players) -1;
           }
           $this->halfReverse();
           for($i = 0; $i < $n; $i++)
           {

               $this->date = $this->date->modify(' + 1 day');

               echo $this->title . " " . $this->date->format('Y.m.d') . "<br>";
               for($j=0; $j < count($this->players)/2; $j++)
               {
                    if($this->players[$j]!="x" && $this->players[(count($this->players)/2)+$j]!="x")
                   echo $this->players[$j]->getName() . $this->players[$j]->getCity()
                       . " + " . $this->players[(count($this->players)/2)+$j]->getName()
                       .  $this->players[(count($this->players)/2)+$j]->getCity() . "<br>";
               }
               $this->shiftPlayer();
           }

        }

    }

