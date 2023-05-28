<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '8fdb885912a8a08f2e3e28c22a212eab6995e92c',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '8fdb885912a8a08f2e3e28c22a212eab6995e92c',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'mongodb/mongodb' => array(
            'pretty_version' => '1.4.3',
            'version' => '1.4.3.0',
            'reference' => '18fca8cc8d0c2cc07f76605760d20632bb3dab96',
            'type' => 'library',
            'install_path' => __DIR__ . '/../mongodb/mongodb',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twbs/bootstrap' => array(
            'pretty_version' => 'v5.2.3',
            'version' => '5.2.3.0',
            'reference' => 'cb021439c683d9805e2864c58095b92d405e9b11',
            'type' => 'library',
            'install_path' => __DIR__ . '/../twbs/bootstrap',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twitter/bootstrap' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v5.2.3',
            ),
        ),
    ),
);
