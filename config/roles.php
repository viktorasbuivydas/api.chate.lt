<?php

return [
    'super admin' => [
        // user
        'change status',
        'delete user',
        'change user email',
        'change user name',
        'change user topic',

        // chat
        'create chat room',
        'update chat room',
        'delete chat room',

        // tutorials
        'create tutorial category',
        'update tutorial category',
        'delete tutorial category',
    ],
    'admin' => [
        // tutorials
        'approve tutorial',
        'cancel tutorial',
        'create tutorial',
        'edit tutorial',
        'delete tutorial',
        'delete tutorial comment',

        // logo
        'update logo',

        // chat
        'pin message',
        'clear chat',

        // logs
        'view logs',
        'view rep logs',
        'view new users',

        // votes
        'create vote',
        'delete vote',
        'see vote stats',

        // topics
        'change chat topic',
        'change file topic',
        'change forum topic',

        // quiz
        'create quiz',
        'enable quiz',
        'disable quiz',
        'delete quiz',
        'edit quiz',

        // avatar
        'approve avatar',
        'cancel avatar',
        'delete avatar',

        // forum
        'create forum category',
        'edit forum category',
        'create forum subject',
        'update forum subject',
        'delete forum subject',

        'lock forum post'
    ],
    'moderator' => [
        'ban',
        'unban',
        'mute user',
        'approve request',
        'cancel request',
        'invite user',
        'remove chat message'
    ],
    'vip' => [
        'change topic',
    ]
];
