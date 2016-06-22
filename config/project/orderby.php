<?php

return [
    'products_list_dropdown' => [
        'default' => [
            'type' => 'asc', 
            'option' => '<i class="fa fa-arrow-circle-down"></i> Popularność &nbsp; (największa)</a>'
        ],
        'data' => [
            'popular' => [
                'asc' => ['option' => '<i class="fa fa-arrow-circle-up"></i> Popularność &nbsp; (najmniejsza)</a>'],
                'desc' => ['option' => '<i class="fa fa-arrow-circle-down"></i> Popularność &nbsp; (największa)</a>']
            ],
            'price' => [
                'asc' => ['option' => '<i class="fa fa-arrow-circle-up"></i> Cena &nbsp; (od najniższej)</a>'],
                'desc' => ['desc', 'option' => '<i class="fa fa-arrow-circle-down"></i> Cena &nbsp; (od najwyższej)</a>']
            ]
        ]
    ]
];

