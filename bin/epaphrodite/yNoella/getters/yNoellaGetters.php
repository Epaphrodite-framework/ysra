<?php

namespace bin\epaphrodite\yNoella\getters;

trait yNoellaGetters{

    public string $setter;
    public string $getter;

    public function yNoellaGetters(string $getter){

        $this->setter = $getter;
    }

}