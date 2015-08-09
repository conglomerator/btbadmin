/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.module('RandomNumberTest', ['ngRoute', 'Common']).
    constant('RandomNumberTestProperties', {
        name: 'RandomNumberTest',
        basename: 'randomnumbertest',
        title: 'Random Number Test',
        category: 'Tests'
    }).
    config(['$routeProvider', 'RandomNumberTestProperties', function ($routeProvider, RandomNumberTestProperties) {
        $routeProvider.when('/'+RandomNumberTestProperties.basename, {templateUrl: '/gui/'+RandomNumberTestProperties.basename+'.html', caseInsensitiveMatch: true});
    }]).
    run(['CommonService', 'RandomNumberTestProperties', function (CommonService, RandomNumberTestProperties) {
        CommonService.registerModule(RandomNumberTestProperties);
    }]).
    controller('RandomNumberTestController', ['RandomNumberTestProperties', 'CommonService', '$http', function (RandomNumberTestProperties, CommonService, $http) {
        var self = this;
        CommonService.changeCurrentModule(RandomNumberTestProperties);    
        self.refresh = function(){
            $http.get("api/randomnumber.php").then(function(response){
                self.val = response.data;
            },function(response){});
        };
        self.refresh();
    }]);