<?php

return [
    'graphA' => [
        // class of your domain object
        'class' => App\Models\Order::class,

        // name of the graph (default is "default")
        'graph' => 'order',

        // property of your object holding the actual state (default is "state")
        'property_path' => 'status',

        'metadata' => [
            'title' => 'Graph A',
        ],

        // list of all possible states
        'states' => [
            'pending',
            'approved',
            'rejected',
            'delivered',
        ],

        // list of all possible transitions
        'transitions' => [
            // ! IMPORTANT: Use verb forms for transition names (e.g., "approve," "reject").
            // * This ensures consistency with permission naming conventions.
            'approve' => [
                'from' => ['pending'],
                'to' => 'approved',
            ],
            'reject' => [
                'from' => ['pending'],
                'to' => 'rejected',
            ],
            'deliver' => [
                'from' => ['approved'],
                'to' => 'delivered',
            ],
        ],

        // list of all callbacks
        // 'callbacks' => [
        //     // will be called when testing a transition
        //     'guard' => [
        //         'guard_on_submitting' => [
        //             // call the callback on a specific transition
        //             'on' => 'submit_changes',
        //             // will call the method of this class
        //             'do' => ['MyClass', 'handle'],
        //             // arguments for the callback
        //             'args' => ['object'],
        //         ],
        //         'guard_on_approving' => [
        //             // call the callback on a specific transition
        //             'on' => 'approve',
        //             // will check the ability on the gate or the class policy
        //             'can' => 'approve',
        //         ],
        //         'guard_on_rejecting' => [
        //             'on' => 'reject',
        //             'can' => 'reject',
        //         ],
        //     ],

        //     // will be called before applying a transition
        //     'before' => [],

        //     // will be called after applying a transition
        //     'after' => [],
        // ],
    ],
];
