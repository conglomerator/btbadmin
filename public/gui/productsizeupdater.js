/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.module('ProductSizeUpdater', ['ngRoute', 'Common']).
    constant('ProductSizeUpdaterProperties', {
        name: 'Product Size Updater',
        basename: 'productsizeupdater',
        title: 'Product Size Updater',
        category: 'Products'
    }).
    config(['$routeProvider', 'ProductSizeUpdaterProperties', function ($routeProvider, ProductSizeUpdaterProperties) {
        $routeProvider.otherwise({templateUrl: 'gui/'+ProductSizeUpdaterProperties.basename+'.html'});
    }]).
    run(['CommonService', 'ProductSizeUpdaterProperties', function (CommonService, ProductSizeUpdaterProperties) {
        CommonService.registerModule(ProductSizeUpdaterProperties);
    }]).
    controller('ProductSizeUpdaterController', ['ProductSizeUpdaterProperties', 'CommonService', '$http', function (ProductSizeUpdaterProperties, CommonService, $http) {
        var self = this;
        CommonService.changeCurrentModule(ProductSizeUpdaterProperties);
        self.update = function() {
            $http.get('api/productupdatesizes.php').then(function(response){
                CommonService.alert('info', response.data);
            },function(response){});            
        };
    }]);