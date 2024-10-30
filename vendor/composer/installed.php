<?php return array(
    'root' => array(
        'name' => 'brand-carousel/brand-carousel',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'project',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'brand-carousel/brand-carousel' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'project',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'htmlburger/carbon-fields' => array(
            'pretty_version' => 'v3.5.1',
            'version' => '3.5.1.0',
            'reference' => '3cef3de167181870ccf675b0a5fd82d9ba32072f',
            'type' => 'library',
            'install_path' => __DIR__ . '/../htmlburger/carbon-fields',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'htmlburger/carbon-fields-plugin' => array(
            'pretty_version' => 'v3.5.1',
            'version' => '3.5.1.0',
            'reference' => 'e09ceb120570ac3b60261adcc7f4778a89559282',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../wp-content/plugins/carbon-fields-plugin',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
    ),
);
