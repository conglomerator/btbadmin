<?php

$_CONFIG = array(
    'DB_HOSTNAME'       =>'localhost',
    'DB_PDGDBNAME'      =>'cocheese_pdgcommerce',
    'DB_JWLDBNAME'      =>'cocheese_jwl',
    'DB_USERNAME'       =>'cocheese_1911',
    'DB_PASSWORD'       =>'JxMa2e8',
    'GROUP_COLUMNS'     =>array(
        'PR_SKU'                    =>array('readonly'=>false,'isVisible'=>true),
        'PR_ProductCategory'        =>array('readonly'=>false,'isVisible'=>true),
        'PR_Description'            =>array('readonly'=>false,'isVisible'=>true),
        'PR_Keywords'               =>array('readonly'=>false),
        'PR_Weight'                 =>array('readonly'=>false),
        'PR_DispBasketCrossSale'    =>array('readonly'=>false),
        'PR_CrossSales'             =>array('readonly'=>false),
        'PR_DispTemplateCrossSale'  =>array('readonly'=>false),
        'PR_CrossSaleTemplate'      =>array('readonly'=>false),
        'PR_UDSearch0'              =>array('readonly'=>false,'isVisible'=>true),
        'PR_UDSearch1'              =>array('readonly'=>false),
        'PR_UDSearch8'              =>array('readonly'=>false),
        'PR_URLofImage'             =>array('readonly'=>false)
    ),
    'BRAND_COLUMNS'     =>array(
        'Name'              =>array('readonly'=>false,'isVisible'=>true),
        'Title'             =>array('readonly'=>false),
        'MetaDescription'   =>array('readonly'=>false,'isVisible'=>true),
        'MetaKeywords'      =>array('readonly'=>false),
        'Text'              =>array('readonly'=>false),
        'SearchString'      =>array('readonly'=>false),
        'URL'               =>array('readonly'=>false)
    ),
    'LOG_DESTINATION'  =>'../../log/php.log'
);