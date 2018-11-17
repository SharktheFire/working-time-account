<?php

class Variables {
    public function getVariables()
    {
        return [
            'main' => [
                'tableHead' => 'Stundenerfassung',
                'action' => '/addWorkingTime',
                'search' => 'Suche',
                'times' => []
            ],
            'navbar' => [
                'profile' => 'Profil',
                'hours' => 'Stunden',
                'search' => 'Suche'
            ]
        ];
    }
}

