<?php

return [
    'graphA' => [
        // class of your domain object
        'class' => App\Models\User::class,

        // name of the graph (default is "default")
        'graph' => 'graphA',

        // property of your object holding the actual state (default is "state")
        'property_path' => 'state',

        'metadata' => [
            'title' => 'Graph A',
        ],

        // list of all possible states
        'states' => function () {
            return App\MOdels\OrderStatus::pluck('name')->toArray();
        },

        // list of all possible transitions
        'transitions' => [
            'approve' => [
                'from' => ['pending'],
                'to' => 'approved',
            ],
            'reject' => [
                'from' => ['pending'],
                'to' => 'rejected',
            ],
            // 'start_preparing' => [
            //     'from' => ['approved'],
            //     'to' => 'preparing',
            // ],
            // 'prepare' => [
            //     'from' => ['preparing'],
            //     'to' => 'prepared',
            // ],
            // 'start_delivery' => [
            //     'from' => ['prepared'],
            //     'to' => 'delivering',
            // ],
            'deliver' => [
                'from' => ['approved'],
                'to' => 'delivered',
            ],
        ],

        // list of all callbacks
        'callbacks' => [
            // will be called when testing a transition
            'guard' => [
                'guard_on_submitting' => [
                    // call the callback on a specific transition
                    'on' => 'submit_changes',
                    // will call the method of this class
                    'do' => ['MyClass', 'handle'],
                    // arguments for the callback
                    'args' => ['object'],
                ],
                'guard_on_approving' => [
                    // call the callback on a specific transition
                    'on' => 'approve',
                    // will check the ability on the gate or the class policy
                    'can' => 'approve',
                ],
            ],

            // will be called before applying a transition
            'before' => [],

            // will be called after applying a transition
            'after' => [],
        ],
    ],
];
