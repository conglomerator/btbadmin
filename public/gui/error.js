/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.module('Error', ['ngRoute', 'Common']).
    constant('ErrorProperties', {
        name: 'Error',
        basename: 'error',
        title: 'Error'
    }).
    config(['$routeProvider', 'ErrorProperties', function ($routeProvider, ErrorProperties) {
        $routeProvider.otherwise({templateUrl: 'gui/'+ErrorProperties.basename+'.html'});
    }]).
    run(['CommonService', 'ErrorProperties', function (CommonService, ErrorProperties) {
        CommonService.registerModule(ErrorProperties);
    }]).
    controller('ErrorController', ['ErrorProperties', 'CommonService', function (ErrorProperties, CommonService) {
        var self = this;
        CommonService.changeCurrentModule(ErrorProperties);    
    }]);